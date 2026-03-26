/* ═══════════════════════════════════════════════════════
   HP-SECTIONS-V2 — Animations for "What We Do" & "Our Methodology"
   Vanilla JS — no dependencies beyond IntersectionObserver
   ═══════════════════════════════════════════════════════ */

(function () {
  'use strict';

  /* ─── Utilities ─── */
  function qs(sel, ctx) { return (ctx || document).querySelector(sel); }
  function qsa(sel, ctx) { return Array.from((ctx || document).querySelectorAll(sel)); }

  /* ─── Particle Canvas (shared) ─── */
  function initParticleCanvas(canvas, opts) {
    if (!canvas) return;
    var ctx = canvas.getContext('2d');
    var particles = [];
    var w, h;
    var color = opts.color || 'rgba(42,180,115,0.15)';
    var count = opts.count || 60;
    var maxSize = opts.maxSize || 2;
    var speed = opts.speed || 0.3;
    var connectDist = opts.connectDist || 120;

    function resize() {
      w = canvas.width = canvas.parentElement.offsetWidth;
      h = canvas.height = canvas.parentElement.offsetHeight;
    }

    function createParticles() {
      particles = [];
      for (var i = 0; i < count; i++) {
        particles.push({
          x: Math.random() * w,
          y: Math.random() * h,
          vx: (Math.random() - 0.5) * speed,
          vy: (Math.random() - 0.5) * speed,
          r: Math.random() * maxSize + 0.5,
        });
      }
    }

    function draw() {
      ctx.clearRect(0, 0, w, h);
      for (var i = 0; i < particles.length; i++) {
        var p = particles[i];
        p.x += p.vx;
        p.y += p.vy;
        if (p.x < 0) p.x = w;
        if (p.x > w) p.x = 0;
        if (p.y < 0) p.y = h;
        if (p.y > h) p.y = 0;

        ctx.beginPath();
        ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
        ctx.fillStyle = color;
        ctx.fill();

        // Connect nearby particles
        for (var j = i + 1; j < particles.length; j++) {
          var p2 = particles[j];
          var dx = p.x - p2.x;
          var dy = p.y - p2.y;
          var dist = Math.sqrt(dx * dx + dy * dy);
          if (dist < connectDist) {
            ctx.beginPath();
            ctx.moveTo(p.x, p.y);
            ctx.lineTo(p2.x, p2.y);
            ctx.strokeStyle = color.replace(/[\d.]+\)$/, (1 - dist / connectDist) * 0.12 + ')');
            ctx.lineWidth = 0.5;
            ctx.stroke();
          }
        }
      }
      requestAnimationFrame(draw);
    }

    resize();
    createParticles();
    draw();
    window.addEventListener('resize', function () {
      resize();
      createParticles();
    });
  }


  /* ─── Word-by-word reveal ─── */
  function wrapWords(el) {
    if (!el || el.dataset.wrapped) return;
    el.dataset.wrapped = '1';
    var html = el.innerHTML;
    // Keep <strong> tags intact but wrap each word inside them
    var tempDiv = document.createElement('div');
    tempDiv.innerHTML = html;
    var result = '';
    function processNode(node) {
      if (node.nodeType === 3) {
        // Text node
        var words = node.textContent.split(/(\s+)/);
        words.forEach(function (w) {
          if (w.trim()) {
            result += '<span class="word">' + w + '</span>';
          } else {
            result += w;
          }
        });
      } else if (node.nodeType === 1) {
        result += '<' + node.tagName.toLowerCase();
        for (var i = 0; i < node.attributes.length; i++) {
          result += ' ' + node.attributes[i].name + '="' + node.attributes[i].value + '"';
        }
        result += '>';
        node.childNodes.forEach(processNode);
        result += '</' + node.tagName.toLowerCase() + '>';
      }
    }
    tempDiv.childNodes.forEach(processNode);
    el.innerHTML = result;
  }

  function revealWords(el, baseDelay) {
    var words = qsa('.word', el);
    words.forEach(function (word, i) {
      setTimeout(function () {
        word.classList.add('is-visible');
      }, baseDelay + i * 80);
    });
  }


  /* ─── 3D Tilt on mouse move ─── */
  function initTilt(cards) {
    cards.forEach(function (card) {
      card.addEventListener('mousemove', function (e) {
        var rect = card.getBoundingClientRect();
        var x = (e.clientX - rect.left) / rect.width;
        var y = (e.clientY - rect.top) / rect.height;
        var tiltX = (0.5 - y) * 8;
        var tiltY = (x - 0.5) * 8;
        card.style.transform = 'perspective(800px) rotateX(' + tiltX + 'deg) rotateY(' + tiltY + 'deg) translateY(-4px) scale(1.01)';
        card.style.setProperty('--mouse-x', (x * 100) + '%');
        card.style.setProperty('--mouse-y', (y * 100) + '%');
      });
      card.addEventListener('mouseleave', function () {
        card.style.transform = '';
      });
    });
  }


  /* ─── "What We Do" Section ─── */
  function initWWD() {
    var section = qs('.hp-wwd');
    if (!section) return;

    // Particle canvas
    initParticleCanvas(qs('.hp-wwd__canvas', section), {
      color: 'rgba(42,180,115,0.12)',
      count: 50,
      maxSize: 1.8,
      speed: 0.25,
      connectDist: 100,
    });

    // Wrap title words
    var title = qs('.hp-wwd__title', section);
    wrapWords(title);

    // Observe section
    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;

        // Label
        var label = qs('.hp-wwd__label', section);
        if (label) label.classList.add('is-visible');

        // Title words
        revealWords(title, 200);

        // Subtitle
        var sub = qs('.hp-wwd__subtitle', section);
        if (sub) setTimeout(function () { sub.classList.add('is-visible'); }, 600);

        observer.disconnect();
      });
    }, { threshold: 0.15 });
    observer.observe(section);

    // Cards staggered entrance
    var cards = qsa('.hp-wwd__card', section);
    var cardObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          var card = entry.target;
          var delay = parseInt(card.dataset.delay || '0', 10);
          setTimeout(function () {
            card.classList.add('is-visible');
          }, delay);
          cardObserver.unobserve(card);
        }
      });
    }, { threshold: 0.1 });

    cards.forEach(function (card, i) {
      card.dataset.delay = i * 150;
      cardObserver.observe(card);
    });

    // 3D tilt
    initTilt(cards);
  }


  /* ─── "Our Methodology" Section ─── */
  function initOSOF() {
    var section = qs('.hp-osof-v2');
    if (!section) return;

    // Particle canvas (different colour)
    initParticleCanvas(qs('.hp-osof-v2__canvas', section), {
      color: 'rgba(139,197,63,0.10)',
      count: 40,
      maxSize: 1.5,
      speed: 0.2,
      connectDist: 90,
    });

    // Wrap title words
    var title = qs('.hp-osof-v2__title', section);
    wrapWords(title);

    // Observe header
    var headerObs = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;

        var label = qs('.hp-osof-v2__label', section);
        if (label) label.classList.add('is-visible');

        revealWords(title, 200);

        var intro = qs('.hp-osof-v2__intro', section);
        if (intro) setTimeout(function () { intro.classList.add('is-visible'); }, 600);

        headerObs.disconnect();
      });
    }, { threshold: 0.15 });
    headerObs.observe(section);

    // Steps
    var steps = qsa('.hp-osof-v2__step', section);
    var progressBar = qs('.hp-osof-v2__progress', section);
    var timeline = qs('.hp-osof-v2__timeline', section);
    var arrow = qs('.hp-osof-v2__arrow', section);

    // Step entrance observer (low threshold so they appear easily)
    var stepObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          var step = entry.target;
          var delay = parseInt(step.dataset.delay || '0', 10);
          setTimeout(function () {
            step.classList.add('is-visible');
          }, delay);
          stepObserver.unobserve(step);
        }
      });
    }, { threshold: 0.1 });

    steps.forEach(function (step, i) {
      step.dataset.delay = i * 200;
      stepObserver.observe(step);
    });

    // Smooth scroll-driven progress bar + active step detection
    var ticking = false;
    function updateProgress() {
      if (!timeline || !progressBar) return;
      var timelineRect = timeline.getBoundingClientRect();
      var viewMid = window.innerHeight * 0.55; // slightly above centre

      // Progress bar follows scroll position through the timeline
      var scrollProgress = (viewMid - timelineRect.top) / timelineRect.height;
      scrollProgress = Math.max(0, Math.min(1, scrollProgress));
      progressBar.style.height = (scrollProgress * timelineRect.height) + 'px';

      // Activate the step closest to the viewport midpoint
      var closestStep = null;
      var closestDist = Infinity;
      steps.forEach(function (step) {
        var rect = step.getBoundingClientRect();
        var stepMid = rect.top + rect.height / 2;
        var dist = Math.abs(stepMid - viewMid);
        // Only consider steps that are at least partially visible
        if (rect.bottom > 0 && rect.top < window.innerHeight && dist < closestDist) {
          closestDist = dist;
          closestStep = step;
        }
      });

      steps.forEach(function (s) { s.classList.remove('is-active'); });
      if (closestStep) {
        closestStep.classList.add('is-active');
      }

      // Show arrow once the last step is visible
      if (arrow && scrollProgress > 0.85) {
        arrow.classList.add('is-visible');
      }

      ticking = false;
    }

    function onScroll() {
      if (!ticking) {
        requestAnimationFrame(updateProgress);
        ticking = true;
      }
    }
    window.addEventListener('scroll', onScroll, { passive: true });
    // Initial call
    updateProgress();

    // CTA + arrow
    var cta = qs('.hp-osof-v2__cta', section);
    if (cta) {
      var ctaObs = new IntersectionObserver(function (entries) {
        if (entries[0].isIntersecting) {
          cta.classList.add('is-visible');
          if (arrow) arrow.classList.add('is-visible');
          ctaObs.disconnect();
        }
      }, { threshold: 0.3 });
      ctaObs.observe(cta);
    }
  }


  /* ─── Init on DOM ready ─── */
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function () {
      initWWD();
      initOSOF();
    });
  } else {
    initWWD();
    initOSOF();
  }

})();
