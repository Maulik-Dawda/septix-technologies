<?php
require_once __DIR__ . '/config.php';
$base_url = get_base_url();
?>
    <!-- Global Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <!-- Brand Info -->
                <div class="footer-brand">
                    <a href="<?php echo $base_url; ?>/index">
                        <img src="<?php echo $base_url; ?>/assets/images/logo.png" alt="Septix Technologies" style="height: 75px; width: auto; object-fit: contain;">
                    </a>
                    <p>Septix Technologies is an enterprise IT consulting & software engineering firm serving Dubai, the UAE, and global markets. We build high-impact web apps, custom ERPs, mobile platforms, AI models, and secure IT infrastructure.</p>
                    <div class="social-links">
                        <a href="https://linkedin.com/company/septix-technologies" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="https://x.com/septixtech" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="X Twitter"><i class="fa-brands fa-x-twitter"></i></a>
                        <a href="https://facebook.com/septixtechnologies" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://instagram.com/septixtechnologies" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                        <a href="https://youtube.com/@septixtechnologies" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
                        <a href="https://github.com/Maulik-Dawda/septix-technologies" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="GitHub"><i class="fa-brands fa-github"></i></a>
                    </div>
                </div>

                <!-- Quick Navigation -->
                <div>
                    <h4 class="footer-title">Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="<?php echo $base_url; ?>/index"><i class="fa-solid fa-angle-right"></i> Home</a></li>
                        <li><a href="<?php echo $base_url; ?>/about"><i class="fa-solid fa-angle-right"></i> About Us</a></li>
                        <li><a href="<?php echo $base_url; ?>/services"><i class="fa-solid fa-angle-right"></i> All Services</a></li>
                        <li><a href="<?php echo $base_url; ?>/portfolio"><i class="fa-solid fa-angle-right"></i> Case Studies</a></li>
                        <li><a href="<?php echo $base_url; ?>/blog"><i class="fa-solid fa-angle-right"></i> Tech Blog</a></li>
                        <li><a href="<?php echo $base_url; ?>/contact"><i class="fa-solid fa-angle-right"></i> Contact Us</a></li>
                    </ul>
                </div>

                <!-- Our Services -->
                <div>
                    <h4 class="footer-title">Our Services</h4>
                    <ul class="footer-links">
                        <li><a href="<?php echo $base_url; ?>/services/website-development">Website Development</a></li>
                        <li><a href="<?php echo $base_url; ?>/services/mobile-app-development">Mobile Applications</a></li>
                        <li><a href="<?php echo $base_url; ?>/services/custom-erp-software">Custom ERP Systems</a></li>
                        <li><a href="<?php echo $base_url; ?>/services/digital-marketing">Digital Marketing</a></li>
                        <li><a href="<?php echo $base_url; ?>/services/ai-ml-solutions">AI & ML Solutions</a></li>
                        <li><a href="<?php echo $base_url; ?>/services/it-networking-solutions">IT Networking</a></li>
                    </ul>
                </div>

                <!-- Regional & Global Reach Info -->
                <div>
                    <h4 class="footer-title">Dubai Headquarters</h4>
                    <div style="margin-bottom: 16px;">
                        <a href="<?php echo HQ_MAPS_URL; ?>" target="_blank" rel="noopener noreferrer" style="color: var(--clr-text-muted); font-size: 0.875rem; line-height: 1.5; display: flex; align-items: flex-start; gap: 8px; text-decoration: none;" title="Open in Google Maps">
                            <i class="fa-solid fa-location-dot" style="color: var(--clr-brand-light); font-size: 1rem; margin-top: 3px; flex-shrink: 0;"></i>
                            <span><?php echo HQ_ADDRESS; ?> <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 0.75rem; margin-left: 4px; color: var(--clr-brand-light);"></i></span>
                        </a>
                    </div>
                    <ul class="footer-links" style="gap: 10px;">
                        <li style="font-size: 0.875rem; font-weight: 600;">
                            <a href="mailto:<?php echo CONTACT_EMAIL; ?>" style="color: var(--clr-brand-dark); display: flex; align-items: center; gap: 8px; text-decoration: none;" title="Send an Email">
                                <i class="fa-solid fa-envelope" style="color: var(--clr-brand-light);"></i> <?php echo CONTACT_EMAIL; ?>
                            </a>
                        </li>
                        <li style="font-size: 0.875rem; font-weight: 600;">
                            <a href="tel:<?php echo CONTACT_PHONE_RAW; ?>" style="color: var(--clr-brand-dark); display: flex; align-items: center; gap: 8px; text-decoration: none;" title="Call Us Directly">
                                <i class="fa-solid fa-phone" style="color: var(--clr-brand-light);"></i> <?php echo CONTACT_PHONE; ?>
                            </a>
                        </li>
                        <li style="font-size: 0.875rem; font-weight: 600;">
                            <a href="<?php echo CONTACT_WHATSAPP_URL; ?>" target="_blank" rel="noopener noreferrer" style="color: #128c7e; display: flex; align-items: center; gap: 8px; text-decoration: none;" title="Chat with Us on WhatsApp">
                                <i class="fa-brands fa-whatsapp" style="color: #25d366; font-size: 1.1rem;"></i> WhatsApp: +971-527621316
                            </a>
                        </li>
                        <li style="color: var(--clr-text-muted); font-size: 0.825rem; font-weight: 600; display: flex; align-items: center; gap: 8px;">
                            <i class="fa-solid fa-clock" style="color: var(--clr-brand-light);"></i> 24/7 GCC (GST) & Global SLA
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Footer Bottom Bar -->
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> Septix Technologies. All Rights Reserved. Empowering Enterprise Innovation Worldwide.</p>
                <div style="display: flex; gap: 20px;">
                    <a href="<?php echo $base_url; ?>/contact" style="color: var(--clr-text-dim);">Privacy Policy</a>
                    <a href="<?php echo $base_url; ?>/contact" style="color: var(--clr-text-dim);">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating Direct WhatsApp Quick Action Button -->
    <a href="<?php echo CONTACT_WHATSAPP_URL; ?>" target="_blank" rel="noopener noreferrer" class="floating-whatsapp-btn" title="Chat directly on WhatsApp (+971-527621316)" aria-label="Direct Chat on WhatsApp">
        <i class="fa-brands fa-whatsapp"></i>
    </a>

    <!-- Main JavaScript File -->
    <script src="<?php echo $base_url; ?>/assets/js/main.js"></script>
</body>
</html>
