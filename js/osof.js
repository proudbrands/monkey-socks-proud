(function () {
    'use strict';

    // ── Scroll Progress Bar ──
    var progressBar = document.createElement('div');
    progressBar.className = 'osof-progress';
    document.body.appendChild(progressBar);

    function updateProgress() {
        var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        var docHeight = document.documentElement.scrollHeight - window.innerHeight;
        var progress = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
        progressBar.style.width = progress + '%';
    }

    var ticking = false;
    window.addEventListener('scroll', function () {
        if (!ticking) {
            requestAnimationFrame(function () {
                updateProgress();
                ticking = false;
            });
            ticking = true;
        }
    });
    updateProgress();


    // ── Intersection Observer for Section Reveals ──
    // Adds '--visible' modifier class when sections enter viewport
    // CSS handles the actual transitions
    var revealSections = [
        '.osof-compare__col--old',
        '.osof-compare__col--new',
        '.osof-pillars__grid'
    ];

    var revealObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('osof-revealed');
                revealObserver.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.15,
        rootMargin: '0px 0px -50px 0px'
    });

    revealSections.forEach(function (selector) {
        var elements = document.querySelectorAll(selector);
        elements.forEach(function (el) {
            revealObserver.observe(el);
        });
    });


    // ── Workflow Number Scale-In ──
    // Scale in the numbered circles when their step enters viewport
    var stepNumbers = document.querySelectorAll('.osof-workflow__number');
    var numberObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.style.transform = 'scale(1)';
                numberObserver.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.5
    });

    stepNumbers.forEach(function (num) {
        num.style.transform = 'scale(0)';
        num.style.transition = 'transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1)';
        numberObserver.observe(num);
    });

})();
