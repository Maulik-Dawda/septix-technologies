<?php
$page_title = "Contact Us - Septix Technologies Global HQ";
$page_desc = "Get in touch with Septix Technologies global IT architects. Request a free quote for Website Development, Mobile Apps, ERP, AI/ML, and IT Networking.";
$current_page = "contact";
require_once __DIR__ . '/includes/header.php';

$selected_service = isset($_GET['service']) ? $_GET['service'] : '';
?>

<!-- Contact Hero Header -->
<section class="hero-section" style="padding: 140px 0 70px;">
    <div class="container" style="text-align: center;">
        <div class="section-tag"><i class="fa-solid fa-headset"></i> Contact Us</div>
        <h1 class="hero-headline">Let's Build Something <br><span class="text-gradient">Extraordinary Together</span></h1>
        <p class="hero-description" style="max-width: 760px; margin-left: auto; margin-right: auto;">
            Have a project in mind or need global IT guidance? Our technical team is available 24/7 to discuss your requirements and deliver a customized technical proposal.
        </p>
    </div>
</section>

<!-- Contact Form & Info Grid -->
<section class="section-padding">
    <div class="container">
        <div class="contact-grid">
            <!-- Left Info Column -->
            <div class="contact-info-card">
                <div>
                    <h2 style="font-size: 1.75rem; margin-bottom: 12px; color: var(--clr-brand-dark);">Get In Touch</h2>
                    <p style="color: var(--clr-text-muted); font-size: 0.95rem;">
                        Reach out to our global team directly. We respond to all inquiries within 12 hours.
                    </p>
                </div>

                <div class="info-item">
                    <div class="info-icon"><i class="fa-solid fa-envelope"></i></div>
                    <div>
                        <strong style="display: block; color: var(--clr-brand-dark); font-size: 0.95rem;">Global Inquiries Email:</strong>
                        <a href="mailto:<?php echo CONTACT_EMAIL; ?>" style="color: var(--clr-brand-dark); font-weight: 700; font-size: 0.9rem;"><?php echo CONTACT_EMAIL; ?></a>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon"><i class="fa-solid fa-phone"></i></div>
                    <div>
                        <strong style="display: block; color: var(--clr-brand-dark); font-size: 0.95rem;">Direct Phone & WhatsApp:</strong>
                        <a href="tel:<?php echo CONTACT_PHONE; ?>" style="color: var(--clr-brand-dark); font-weight: 700; font-size: 0.9rem;"><?php echo CONTACT_PHONE; ?></a>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon"><i class="fa-solid fa-location-dot"></i></div>
                    <div>
                        <strong style="display: block; color: var(--clr-brand-dark); font-size: 0.95rem;">Global Headquarters:</strong>
                        <span style="color: var(--clr-text-muted); font-size: 0.9rem;"><?php echo HQ_ADDRESS; ?></span>
                    </div>
                </div>

                <div style="padding-top: 20px; border-top: 1px solid var(--clr-border);">
                    <strong style="display: block; color: var(--clr-brand-dark); font-size: 0.9rem; margin-bottom: 12px;">Global Regional Presence:</strong>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; font-size: 0.85rem; color: var(--clr-text-muted);">
                        <div>🇺🇸 North America</div>
                        <div>🇬🇧 Europe</div>
                        <div>🇦🇪 Middle East</div>
                        <div>🇮🇳 Asia Pacific</div>
                    </div>
                </div>
            </div>

            <!-- Right Interactive Form Column -->
            <div class="form-box">
                <h3 style="font-size: 1.5rem; margin-bottom: 8px; color: var(--clr-brand-dark);">Send Us a Message</h3>
                <p style="color: var(--clr-text-muted); font-size: 0.9rem; margin-bottom: 24px;">Fill out the form below to receive a consultation & custom project quote.</p>

                <div id="formAlert" class="form-alert"></div>

                <form id="septixContactForm" action="<?php echo $base_url; ?>/process-contact.php" method="POST">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                        <div class="form-group">
                            <label class="form-label">Full Name *</label>
                            <input type="text" name="name" class="form-control" placeholder="e.g. Sarah Jenkins" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email Address *</label>
                            <input type="email" name="email" class="form-control" placeholder="name@company.com" required>
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                        <div class="form-group">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" name="phone" class="form-control" placeholder="+1 (555) 000-0000">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Company Name</label>
                            <input type="text" name="company" class="form-control" placeholder="e.g. Global Tech Corp">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Service Required *</label>
                        <select name="service" class="form-control" required>
                            <option value="">-- Select Required Service --</option>
                            <option value="website-development" <?php echo ($selected_service === 'website-development') ? 'selected' : ''; ?>>Website Development</option>
                            <option value="mobile-app-development" <?php echo ($selected_service === 'mobile-app-development') ? 'selected' : ''; ?>>Mobile Application Development</option>
                            <option value="custom-erp-software" <?php echo ($selected_service === 'custom-erp-software') ? 'selected' : ''; ?>>Custom ERP Software</option>
                            <option value="digital-marketing" <?php echo ($selected_service === 'digital-marketing') ? 'selected' : ''; ?>>Digital Marketing</option>
                            <option value="ai-ml-solutions" <?php echo ($selected_service === 'ai-ml-solutions') ? 'selected' : ''; ?>>AI / ML Solutions</option>
                            <option value="it-networking-solutions" <?php echo ($selected_service === 'it-networking-solutions') ? 'selected' : ''; ?>>IT Networking Solutions</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Project Details & Requirements *</label>
                        <textarea name="message" class="form-control" placeholder="Tell us about your project goals, scope, timeline, and target audience..." required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center;">
                        Submit Inquiry <i class="fa-solid fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- General FAQ Accordion -->
<section class="section-padding" style="background: rgba(255, 255, 255, 0.6); border-top: 1px solid var(--clr-border);">
    <div class="container">
        <div style="text-align: center;">
            <div class="section-tag"><i class="fa-solid fa-circle-question"></i> Client FAQ</div>
            <h2 class="section-title">Common Inquiry Questions</h2>
        </div>

        <div class="faq-list">
            <div class="faq-item active">
                <div class="faq-question">How does Septix Technologies manage global client communication? <i class="fa-solid fa-chevron-down"></i></div>
                <div class="faq-answer">We assign dedicated project managers operating across your time zone. Communication is maintained via Slack/Teams, weekly video sprint reviews, and Jira/Trello boards.</div>
            </div>
            <div class="faq-item">
                <div class="faq-question">Do you sign Non-Disclosure Agreements (NDA) before discussing proprietary business ideas? <i class="fa-solid fa-chevron-down"></i></div>
                <div class="faq-answer">Absolutely. Protecting intellectual property and confidential enterprise data is our highest priority. We sign bilateral NDAs before any deep discovery phase.</div>
            </div>
            <div class="faq-item">
                <div class="faq-question">What payment currencies and international transfer methods do you accept? <i class="fa-solid fa-chevron-down"></i></div>
                <div class="faq-answer">We accept USD, EUR, GBP, AED, INR, and major international wire transfers (SWIFT), credit cards, and corporate accounts.</div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
