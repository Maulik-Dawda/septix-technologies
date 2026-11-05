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
                    <a href="<?php echo $base_url; ?>/index" aria-label="Septix Technologies Home">
                        <img src="<?php echo $base_url; ?>/assets/images/logo.png" alt="Septix Technologies Logo" width="180" height="50" style="height: 50px; width: auto; object-fit: contain;">
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
                        <li><a href="<?php echo $base_url; ?>/index"><i class="fa-solid fa-angle-right"></i> Home Overview</a></li>
                        <li><a href="<?php echo $base_url; ?>/about"><i class="fa-solid fa-angle-right"></i> About Our Company</a></li>
                        <li><a href="<?php echo $base_url; ?>/services"><i class="fa-solid fa-angle-right"></i> Enterprise Services</a></li>
                        <li><a href="<?php echo $base_url; ?>/portfolio"><i class="fa-solid fa-angle-right"></i> Client Case Studies</a></li>
                        <li><a href="<?php echo $base_url; ?>/blog"><i class="fa-solid fa-angle-right"></i> Tech Insights & Blog</a></li>
                        <li><a href="<?php echo $base_url; ?>/contact"><i class="fa-solid fa-angle-right"></i> Connect With Us</a></li>
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
                    <h4 class="footer-title">UAE Corporate Headquarters</h4>
                    <div class="footer-contact-block">
                        <a href="<?php echo HQ_MAPS_URL; ?>" target="_blank" rel="noopener noreferrer" class="footer-contact-row" title="Open Google Maps Location directly">
                            <span class="footer-icon-box"><i class="fa-solid fa-location-dot"></i></span>
                            <span class="footer-contact-detail"><?php echo HQ_ADDRESS; ?> <i class="fa-solid fa-arrow-up-right-from-square footer-external-icon"></i></span>
                        </a>
                        
                        <a href="mailto:<?php echo CONTACT_EMAIL; ?>" class="footer-contact-row" title="Send an Email directly">
                            <span class="footer-icon-box"><i class="fa-solid fa-envelope"></i></span>
                            <span class="footer-contact-detail">&#105;&#110;&#102;&#111;&#64;&#115;&#101;&#112;&#116;&#105;&#120;&#116;&#101;&#99;&#104;&#110;&#111;&#108;&#111;&#103;&#105;&#101;&#115;&#46;&#99;&#111;&#109;</span>
                        </a>
                        
                        <a href="tel:<?php echo CONTACT_PHONE_RAW; ?>" class="footer-contact-row" title="Direct Phone Call">
                            <span class="footer-icon-box"><i class="fa-solid fa-phone"></i></span>
                            <span class="footer-contact-detail"><?php echo CONTACT_PHONE; ?></span>
                        </a>
                        
                        <a href="<?php echo CONTACT_WHATSAPP_URL; ?>" target="_blank" rel="noopener noreferrer" class="footer-contact-row whatsapp-row" title="Chat directly on WhatsApp">
                            <span class="footer-icon-box whatsapp-icon"><i class="fa-brands fa-whatsapp"></i></span>
                            <span class="footer-contact-detail">WhatsApp: +971-527621316</span>
                        </a>
                        
                        <div class="footer-contact-row sla-row">
                            <span class="footer-icon-box"><i class="fa-solid fa-clock"></i></span>
                            <span class="footer-contact-detail">24/7 GCC (GST) & Global Enterprise SLA</span>
                        </div>
                    </div>
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
