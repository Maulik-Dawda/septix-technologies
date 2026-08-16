<?php
/**
 * Septix Technologies - Blog Creator & Editor Suite with Photo Upload
 */

$adminPageKey = 'blog-edit';
$adminTitle = 'Article Editor - Septix Technologies Admin';

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/auth_helper.php';

$pdo = get_db_connection();
$editId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$post = null;
$msg = '';
$error = '';

if ($editId > 0) {
    $stmt = $pdo->prepare("SELECT * FROM blogs WHERE id = ? LIMIT 1");
    $stmt->execute([$editId]);
    $post = $stmt->fetch();
}

$adminPageHeader = $post ? 'Edit Article: ' . htmlspecialchars($post['title']) : 'Create New Technical Article';

require_once __DIR__ . '/includes/admin_header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $userSlug = trim($_POST['slug']);
    $category = trim($_POST['category']);
    $author = trim($_POST['author']);
    $image = trim($_POST['image']);
    $summary = trim($_POST['summary']);
    $content = trim($_POST['content']);
    $read_time = trim($_POST['read_time']);
    $status = trim($_POST['status']);

    // Handle Cover Photograph File Upload
    if (isset($_FILES['blog_image_file']) && $_FILES['blog_image_file']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['blog_image_file']['tmp_name'];
        $fileName = $_FILES['blog_image_file']['name'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp', 'gif', 'svg'];
        if (in_array($fileExtension, $allowedExtensions)) {
            $uploadDir = __DIR__ . '/assets/images/blog/';
            if (!is_dir($uploadDir)) {
                @mkdir($uploadDir, 0777, true);
            }
            $newFileName = 'blog_cover_' . time() . '_' . rand(1000, 9999) . '.' . $fileExtension;
            $destPath = $uploadDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $destPath)) {
                $image = 'assets/images/blog/' . $newFileName;
            } else {
                $error = "Failed to save uploaded image file. Please check folder permissions.";
            }
        } else {
            $error = "Invalid photograph format. Allowed formats: JPG, JPEG, PNG, WEBP, GIF, SVG.";
        }
    }

    // Ensure slug is clean and hypenated
    $slug = !empty($userSlug) ? create_slug($userSlug) : create_slug($title);

    if (empty($error)) {
        if (empty($title) || empty($category) || empty($summary) || empty($content)) {
            $error = "Please fill in all required fields (Title, Category, Summary, Content).";
        } else {
            if ($post) {
                // Check slug uniqueness excluding current ID
                $check = $pdo->prepare("SELECT COUNT(*) FROM blogs WHERE slug = ? AND id != ?");
                $check->execute([$slug, $post['id']]);
                if ($check->fetchColumn() > 0) {
                    $slug .= '-' . time();
                }

                $stmt = $pdo->prepare("UPDATE blogs SET slug = ?, title = ?, category = ?, author = ?, image = ?, summary = ?, content = ?, read_time = ?, status = ?, updated_at = ? WHERE id = ?");
                $stmt->execute([$slug, $title, $category, $author, $image, $summary, $content, $read_time, $status, date('Y-m-d H:i:s'), $post['id']]);
                $msg = "Article & Photograph updated successfully!";
                
                // Reload post
                $stmt = $pdo->prepare("SELECT * FROM blogs WHERE id = ?");
                $stmt->execute([$post['id']]);
                $post = $stmt->fetch();
            } else {
                // Check slug uniqueness
                $check = $pdo->prepare("SELECT COUNT(*) FROM blogs WHERE slug = ?");
                $check->execute([$slug]);
                if ($check->fetchColumn() > 0) {
                    $slug .= '-' . time();
                }

                $stmt = $pdo->prepare("INSERT INTO blogs (slug, title, category, author, image, summary, content, read_time, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$slug, $title, $category, $author, $image, $summary, $content, $read_time, $status]);
                $newId = $pdo->lastInsertId();

                header("Location: " . get_base_url() . "/admin-septix-technologies-blog-edit?id=" . $newId . "&msg=created");
                exit;
            }
        }
    }
}

if (isset($_GET['msg']) && $_GET['msg'] === 'created') {
    $msg = "Article created successfully!";
}

// Categories Preset List
$presetCategories = ['Web Development', 'Mobile Apps', 'Custom ERP Software', 'AI / ML', 'Cybersecurity', 'IT Networking', 'Digital Marketing'];
?>

<?php if ($msg): ?>
    <div style="background: #f0fdf4; border: 1px solid #86efac; color: #166534; padding: 14px 20px; border-radius: var(--radius-lg); font-weight: 600; margin-bottom: 24px;">
        <i class="fa-solid fa-circle-check"></i> <?php echo htmlspecialchars($msg); ?>
    </div>
<?php endif; ?>

<?php if ($error): ?>
    <div style="background: #fef2f2; border: 1px solid #fca5a5; color: #991b1b; padding: 14px 20px; border-radius: var(--radius-lg); font-weight: 600; margin-bottom: 24px;">
        <i class="fa-solid fa-triangle-exclamation"></i> <?php echo htmlspecialchars($error); ?>
    </div>
<?php endif; ?>

<!-- Form Container with File Upload Enctype -->
<form action="" method="POST" enctype="multipart/form-data" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: var(--radius-xl); padding: 36px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);">
    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 32px;" class="editor-grid">
        
        <!-- Left Side: Main Content Fields -->
        <div>
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 700; color: #0f172a; margin-bottom: 8px;">Article Title *</label>
                <input type="text" id="blogTitle" name="title" value="<?php echo htmlspecialchars($post ? $post['title'] : ''); ?>" placeholder="Enter article headline..." required
                       style="width: 100%; padding: 14px; border-radius: var(--radius-md); border: 1px solid #cbd5e1; font-size: 1.1rem; font-weight: 700;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 700; color: #0f172a; margin-bottom: 8px;">URL Slug (Auto-hyphenated)</label>
                <div style="position: relative;">
                    <span style="position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: #94a3b8; font-size: 0.85rem;">/blog/</span>
                    <input type="text" id="blogSlug" name="slug" value="<?php echo htmlspecialchars($post ? $post['slug'] : ''); ?>" placeholder="title-separated-with-hyphens"
                           style="width: 100%; padding: 12px 14px 12px 64px; border-radius: var(--radius-md); border: 1px solid #cbd5e1; font-size: 0.9rem; color: #334155;">
                </div>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 700; color: #0f172a; margin-bottom: 8px;">Short Summary / Excerpt *</label>
                <textarea name="summary" rows="3" placeholder="Brief 2-3 sentence overview..." required
                          style="width: 100%; padding: 14px; border-radius: var(--radius-md); border: 1px solid #cbd5e1; font-size: 0.95rem; line-height: 1.6;"><?php echo htmlspecialchars($post ? $post['summary'] : ''); ?></textarea>
            </div>

            <div style="margin-bottom: 20px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                    <label style="font-weight: 700; color: #0f172a;">Full Article HTML Content *</label>
                    <div style="display: flex; gap: 6px;">
                        <button type="button" onclick="insertTag('<h3>', '</h3>')" class="btn btn-outline btn-sm" style="padding: 4px 8px; font-size: 0.75rem;">H3</button>
                        <button type="button" onclick="insertTag('<p>', '</p>')" class="btn btn-outline btn-sm" style="padding: 4px 8px; font-size: 0.75rem;">Paragraph</button>
                        <button type="button" onclick="insertTag('<strong>', '</strong>')" class="btn btn-outline btn-sm" style="padding: 4px 8px; font-size: 0.75rem;">Bold</button>
                        <button type="button" onclick="insertTag('<ul><li>', '</li></ul>')" class="btn btn-outline btn-sm" style="padding: 4px 8px; font-size: 0.75rem;">List</button>
                    </div>
                </div>
                <textarea id="blogContent" name="content" rows="14" placeholder="Enter HTML body content..." required
                          style="width: 100%; padding: 16px; border-radius: var(--radius-md); border: 1px solid #cbd5e1; font-family: monospace; font-size: 0.95rem; line-height: 1.6;"><?php echo htmlspecialchars($post ? $post['content'] : ''); ?></textarea>
            </div>
        </div>

        <!-- Right Side: Photograph Upload & Publishing Controls -->
        <div style="display: flex; flex-direction: column; gap: 24px;">
            
            <!-- Photograph Upload Section -->
            <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: var(--radius-lg); padding: 24px;">
                <h4 style="font-size: 1.05rem; font-weight: 800; color: #0f172a; margin-bottom: 16px;">
                    <i class="fa-solid fa-camera" style="color: var(--clr-brand-light);"></i> Blog Photograph / Cover Photo
                </h4>
                
                <div id="imagePreviewBox" style="margin-bottom: 14px; text-align: center; background: #ffffff; border: 2px dashed #cbd5e1; border-radius: var(--radius-md); padding: 10px;">
                    <?php 
                        $currentImgUrl = ($post && !empty($post['image'])) ? ((strpos($post['image'], 'http') === 0) ? $post['image'] : (get_base_url() . '/' . ltrim($post['image'], '/'))) : (get_base_url() . '/assets/images/service-web.jpg');
                    ?>
                    <img id="imgPreview" src="<?php echo $currentImgUrl; ?>" alt="Blog Photograph Preview" style="max-height: 180px; width: 100%; object-fit: cover; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
                </div>

                <div style="margin-bottom: 14px;">
                    <label style="display: block; font-weight: 700; font-size: 0.85rem; color: #334155; margin-bottom: 6px;">Upload New Photograph</label>
                    <input type="file" name="blog_image_file" id="blogImageFile" accept="image/*"
                           style="width: 100%; padding: 10px; border-radius: var(--radius-md); border: 1px solid #cbd5e1; font-size: 0.85rem; background: #ffffff;">
                </div>

                <div style="margin-bottom: 16px;">
                    <label style="display: block; font-weight: 600; font-size: 0.775rem; color: #64748b; margin-bottom: 4px;">Or Image Path / URL:</label>
                    <input type="text" id="blogImagePath" name="image" value="<?php echo htmlspecialchars($post ? $post['image'] : 'assets/images/service-web.jpg'); ?>" placeholder="assets/images/..."
                           style="width: 100%; padding: 8px 12px; border-radius: var(--radius-md); border: 1px solid #cbd5e1; font-size: 0.85rem;">
                </div>
            </div>

            <!-- Publishing Options -->
            <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: var(--radius-lg); padding: 24px;">
                <h4 style="font-size: 1.05rem; font-weight: 800; color: #0f172a; margin-bottom: 16px;">Publishing Options</h4>
                
                <div style="margin-bottom: 16px;">
                    <label style="display: block; font-weight: 700; font-size: 0.85rem; color: #334155; margin-bottom: 6px;">Status</label>
                    <select name="status" style="width: 100%; padding: 10px; border-radius: var(--radius-md); border: 1px solid #cbd5e1; font-weight: 700;">
                        <option value="published" <?php echo ($post && $post['status'] === 'published') ? 'selected' : ''; ?>>Published (Live on site)</option>
                        <option value="draft" <?php echo ($post && $post['status'] === 'draft') ? 'selected' : ''; ?>>Draft (Hidden)</option>
                    </select>
                </div>

                <div style="margin-bottom: 16px;">
                    <label style="display: block; font-weight: 700; font-size: 0.85rem; color: #334155; margin-bottom: 6px;">Category *</label>
                    <input type="text" name="category" list="catList" value="<?php echo htmlspecialchars($post ? $post['category'] : 'Web Development'); ?>" required
                           style="width: 100%; padding: 10px; border-radius: var(--radius-md); border: 1px solid #cbd5e1; font-size: 0.9rem;">
                    <datalist id="catList">
                        <?php foreach ($presetCategories as $pc): ?>
                            <option value="<?php echo $pc; ?>">
                        <?php endforeach; ?>
                    </datalist>
                </div>

                <div style="margin-bottom: 16px;">
                    <label style="display: block; font-weight: 700; font-size: 0.85rem; color: #334155; margin-bottom: 6px;">Author Name</label>
                    <input type="text" name="author" value="<?php echo htmlspecialchars($post ? $post['author'] : 'Septix Editorial Team'); ?>"
                           style="width: 100%; padding: 10px; border-radius: var(--radius-md); border: 1px solid #cbd5e1; font-size: 0.9rem;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 700; font-size: 0.85rem; color: #334155; margin-bottom: 6px;">Estimated Read Time</label>
                    <input type="text" name="read_time" value="<?php echo htmlspecialchars($post ? $post['read_time'] : '5 min read'); ?>"
                           style="width: 100%; padding: 10px; border-radius: var(--radius-md); border: 1px solid #cbd5e1; font-size: 0.9rem;">
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%; padding: 14px; border-radius: var(--radius-md);">
                    <i class="fa-solid fa-floppy-disk"></i> <?php echo $post ? 'Save Changes' : 'Publish Article'; ?>
                </button>
            </div>

            <?php if ($post): ?>
                <a href="<?php echo get_base_url(); ?>/blog/<?php echo htmlspecialchars($post['slug']); ?>" target="_blank" class="btn btn-outline" style="text-align: center;">
                    <i class="fa-solid fa-eye"></i> Preview Live Article
                </a>
            <?php endif; ?>

        </div>

    </div>
</form>

<script>
// Live Image Preview on File Selection
document.getElementById('blogImageFile').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(evt) {
            document.getElementById('imgPreview').src = evt.target.result;
        };
        reader.readAsDataURL(file);
    }
});

// Auto Generate Slug on Title Typing
document.getElementById('blogTitle').addEventListener('keyup', function() {
    const slugInput = document.getElementById('blogSlug');
    if (!slugInput.getAttribute('data-manual')) {
        let text = this.value.toLowerCase()
            .replace(/[^\w\s-]/g, '')
            .replace(/[\s_-]+/g, '-')
            .replace(/^-+|-+$/g, '');
        slugInput.value = text;
    }
});

document.getElementById('blogSlug').addEventListener('change', function() {
    this.setAttribute('data-manual', 'true');
});

function insertTag(openTag, closeTag) {
    const textarea = document.getElementById('blogContent');
    const start = textarea.selectionStart;
    const end = textarea.selectionEnd;
    const text = textarea.value;
    const selectedText = text.substring(start, end) || 'Sample text';
    const replacement = openTag + selectedText + closeTag;
    textarea.value = text.substring(0, start) + replacement + text.substring(end);
    textarea.focus();
}
</script>

<?php require_once __DIR__ . '/includes/admin_footer.php'; ?>
