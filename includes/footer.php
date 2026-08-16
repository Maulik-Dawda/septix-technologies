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
                    <p>Septix Technologies is a premier global IT consulting & software engineering firm. We build high-impact web apps, enterprise ERPs, mobile platforms, AI models, and secure IT infrastructure for companies worldwide.</p>
                    <div class="social-links">
                        <a href="https://linkedin.com" target="_blank" class="social-link" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="https://twitter.com" target="_blank" class="social-link" aria-label="Twitter"><i class="fa-brands fa-x-twitter"></i></a>
                        <a href="https://github.com/Maulik-Dawda/septix-technologies" target="_blank" class="social-link" aria-label="GitHub"><i class="fa-brands fa-github"></i></a>
                        <a href="https://facebook.com" target="_blank" class="social-link" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
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

                <!-- Global Contact Info -->
                <div>
                    <h4 class="footer-title">Global Presence</h4>
                    <p style="color: var(--clr-text-muted); font-size: 0.9rem; margin-bottom: 16px;">
                        <i class="fa-solid fa-earth-americas" style="color: var(--clr-brand-light);"></i> Proudly serving enterprises globally across 50+ countries.
                    </p>
                    <ul class="footer-links" style="gap: 10px;">
                        <li style="color: var(--clr-brand-dark); font-size: 0.875rem; font-weight: 600;"><i class="fa-solid fa-envelope" style="color: var(--clr-brand-light);"></i> <?php echo CONTACT_EMAIL; ?></li>
                        <li style="color: var(--clr-brand-dark); font-size: 0.875rem; font-weight: 600;"><i class="fa-solid fa-phone" style="color: var(--clr-brand-light);"></i> <?php echo CONTACT_PHONE; ?></li>
                        <li style="color: var(--clr-brand-dark); font-size: 0.875rem; font-weight: 600;"><i class="fa-solid fa-clock" style="color: var(--clr-brand-light);"></i> 24/7 Global IT Support SLA</li>
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

    <!-- Main JavaScript File -->
    <script src="<?php echo $base_url; ?>/assets/js/main.js"></script>
</body>
</html>
