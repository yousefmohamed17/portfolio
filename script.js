// Mobile Menu Toggle
const menuToggle = document.querySelector('.menu-toggle');
const navLinks = document.querySelector('.nav-links');
const menuSpans = document.querySelectorAll('.menu-toggle span');

menuToggle.addEventListener('click', () => {
    navLinks.classList.toggle('active');
    menuToggle.classList.toggle('active');
    
    // Animation for menu toggle
    if (menuToggle.classList.contains('active')) {
        menuSpans[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
        menuSpans[1].style.opacity = '0';
        menuSpans[2].style.transform = 'rotate(-45deg) translate(7px, -6px)';
    } else {
        menuSpans[0].style.transform = 'none';
        menuSpans[1].style.opacity = '1';
        menuSpans[2].style.transform = 'none';
    }
});

// Close menu when clicking on a link
document.querySelectorAll('.nav-links a').forEach(link => {
    link.addEventListener('click', () => {
        navLinks.classList.remove('active');
        menuToggle.classList.remove('active');
        menuSpans[0].style.transform = 'none';
        menuSpans[1].style.opacity = '1';
        menuSpans[2].style.transform = 'none';
    });
});

// Navbar scroll effect
window.addEventListener('scroll', () => {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

// Animate counters when section is in view
const animateCounters = () => {
    const counters = document.querySelectorAll('.counter');
    const speed = 200;
    
    counters.forEach(counter => {
        const target = +counter.getAttribute('data-target');
        const count = +counter.innerText;
        const increment = target / speed;
        
        if (count < target) {
            counter.innerText = Math.ceil(count + increment);
            setTimeout(animateCounters, 1);
        } else {
            counter.innerText = target;
        }
    });
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            animateCounters();
            observer.unobserve(entry.target);
        }
    });
}, { threshold: 0.5 });

const projectsSection = document.querySelector('#projects');
if (projectsSection) {
    observer.observe(projectsSection);
}

// Set current year in footer
document.getElementById('year').textContent = new Date().getFullYear();

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});


// Form submission with AJAX
const contactForm = document.querySelector('.contact-form');
const formResponse = document.getElementById('form-response');

if (contactForm) {
    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const submitBtn = this.querySelector('button[type="submit"]');
        
        // تغيير نص زر الإرسال أثناء المعالجة
        submitBtn.disabled = true;
        submitBtn.textContent = 'جاري الإرسال...';
        
        fetch(this.action, {
            method: this.method,
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            formResponse.style.display = 'block';
            formResponse.textContent = data;
            
            if (data.includes("شكراً")) {
                contactForm.reset();
                formResponse.style.color = 'green';
            } else {
                formResponse.style.color = 'red';
            }
        })
        .catch(error => {
            formResponse.style.display = 'block';
            formResponse.style.color = 'red';
            formResponse.textContent = 'حدث خطأ أثناء الإرسال، يرجى المحاولة مرة أخرى.';
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.textContent = 'أرسل الرسالة';
            
            // إخفاء الرسالة بعد 5 ثواني
            setTimeout(() => {
                formResponse.style.display = 'none';
            }, 5000);
        });
    });
}