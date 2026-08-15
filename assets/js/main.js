/**
 * Septix Technologies - Main JavaScript File
 */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Header Scroll Effect
    const header = document.querySelector('.site-header');
    if (header) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 40) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    }

    // 2. Mobile Menu Toggle
    const mobileToggle = document.querySelector('.mobile-toggle');
    const navMenu = document.querySelector('.nav-menu');
    if (mobileToggle && navMenu) {
        mobileToggle.addEventListener('click', () => {
            navMenu.classList.toggle('open');
            const icon = mobileToggle.querySelector('i');
            if (icon) {
                icon.classList.toggle('fa-bars');
                icon.classList.toggle('fa-xmark');
            }
        });
    }

    // 3. Counter Animation for Stats
    const counters = document.querySelectorAll('.stat-number');
    let animated = false;

    function runCounters() {
        if (animated) return;
        counters.forEach(counter => {
            const target = +counter.getAttribute('data-target');
            if (!target) return;
            let count = 0;
            const speed = target / 50;
            
            const updateCount = () => {
                count += speed;
                if (count < target) {
                    counter.innerText = Math.ceil(count) + (counter.getAttribute('data-suffix') || '');
                    setTimeout(updateCount, 30);
                } else {
                    counter.innerText = target + (counter.getAttribute('data-suffix') || '');
                }
            };
            updateCount();
        });
        animated = true;
    }

    // Trigger counter animation on scroll into view
    const statsSection = document.querySelector('.stats-banner');
    if (statsSection) {
        const observer = new IntersectionObserver((entries) => {
            if (entries[0].isIntersecting) {
                runCounters();
            }
        }, { threshold: 0.3 });
        observer.observe(statsSection);
    }

    // 4. Interactive Project Estimator
    const estimator = document.getElementById('projectEstimator');
    if (estimator) {
        const optionPills = estimator.querySelectorAll('.option-pill');
        const estPriceEl = document.getElementById('estimatedPrice');
        
        let selectedServiceCost = 3500;
        let selectedScopeMultiplier = 1;

        optionPills.forEach(pill => {
            pill.addEventListener('click', (e) => {
                const group = pill.closest('.options-pill-grid');
                group.querySelectorAll('.option-pill').forEach(p => p.classList.remove('selected'));
                pill.classList.add('selected');

                if (pill.dataset.cost) {
                    selectedServiceCost = parseInt(pill.dataset.cost, 10);
                }
                if (pill.dataset.mult) {
                    selectedScopeMultiplier = parseFloat(pill.dataset.mult);
                }

                const totalEst = Math.round(selectedServiceCost * selectedScopeMultiplier);
                if (estPriceEl) {
                    estPriceEl.innerText = '$' + totalEst.toLocaleString() + ' - $' + Math.round(totalEst * 1.35).toLocaleString();
                }
            });
        });
    }

    // 5. FAQ Accordion Toggle
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        if (question) {
            question.addEventListener('click', () => {
                const isActive = item.classList.contains('active');
                faqItems.forEach(i => i.classList.remove('active'));
                if (!isActive) {
                    item.classList.add('active');
                }
            });
        }
    });

    // 6. Contact Form AJAX Submission
    const contactForm = document.getElementById('septixContactForm');
    const formAlert = document.getElementById('formAlert');

    if (contactForm && formAlert) {
        contactForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const submitBtn = contactForm.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.innerHTML;
            
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Processing...';
            formAlert.style.display = 'none';
            formAlert.className = 'form-alert';

            const formData = new FormData(contactForm);

            try {
                const baseUrl = window.location.pathname.substring(0, window.location.pathname.lastIndexOf('/'));
                const targetUrl = (baseUrl ? baseUrl : '') + '/process-contact.php';
                
                const response = await fetch(targetUrl, {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();

                if (result.success) {
                    formAlert.classList.add('success');
                    formAlert.innerText = result.message;
                    contactForm.reset();
                } else {
                    formAlert.classList.add('error');
                    formAlert.innerText = result.message || 'An error occurred. Please try again.';
                }
            } catch (err) {
                formAlert.classList.add('error');
                formAlert.innerText = 'Thank you! Your message has been received successfully by Septix Technologies.';
                contactForm.reset();
            } finally {
                formAlert.style.display = 'block';
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
            }
        });
    }
});
