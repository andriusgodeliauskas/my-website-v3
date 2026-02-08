document.addEventListener('DOMContentLoaded', function () {

  /* ========================================
     MATRIX RAIN
     ======================================== */
  function initMatrixRain() {
    var canvas = document.getElementById('ag-matrix-canvas');
    if (!canvas) return;
    var ctx = canvas.getContext('2d');
    var fontSize = 14;
    var columns;
    var drops = [];
    var heroVisible = true;

    function resize() {
      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;
      columns = Math.floor(canvas.width / fontSize);
      drops = [];
      for (var i = 0; i < columns; i++) {
        drops[i] = Math.random() * -100;
      }
    }

    resize();
    window.addEventListener('resize', resize);

    var katakanaStart = 0x30A0;
    var katakanaEnd = 0x30FF;
    var chars = '';
    for (var k = katakanaStart; k <= katakanaEnd; k++) {
      chars += String.fromCharCode(k);
    }
    chars += '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

    var heroEl = document.getElementById('hero');
    if (heroEl) {
      var heroObserver = new IntersectionObserver(function (entries) {
        heroVisible = entries[0].isIntersecting;
      }, { threshold: 0.1 });
      heroObserver.observe(heroEl);
    }

    var lastTime = 0;
    var interval = 66;

    function draw(timestamp) {
      requestAnimationFrame(draw);
      if (!heroVisible) return;
      if (timestamp - lastTime < interval) return;
      lastTime = timestamp;

      ctx.fillStyle = 'rgba(10, 10, 15, 0.05)';
      ctx.fillRect(0, 0, canvas.width, canvas.height);
      ctx.fillStyle = '#00f0ff';
      ctx.font = fontSize + 'px monospace';

      for (var i = 0; i < columns; i++) {
        var text = chars.charAt(Math.floor(Math.random() * chars.length));
        var x = i * fontSize;
        var y = drops[i] * fontSize;
        ctx.globalAlpha = Math.random() * 0.4 + 0.2;
        ctx.fillText(text, x, y);
        ctx.globalAlpha = 1;

        if (y > canvas.height && Math.random() > 0.975) {
          drops[i] = 0;
        }
        drops[i]++;
      }
    }

    requestAnimationFrame(draw);
  }

  /* ========================================
     TYPING EFFECT
     ======================================== */
  function initTypingEffect() {
    var target = document.getElementById('ag-typing-target');
    if (!target) return;
    var words = ['Vibe Coder', 'Project Manager', 'AI Builder', 'Digital Creator'];
    var wordIndex = 0;
    var charIndex = 0;
    var isDeleting = false;
    var typeSpeed = 80;
    var deleteSpeed = 40;
    var pauseEnd = 2000;
    var pauseBetween = 500;

    function tick() {
      var current = words[wordIndex];
      if (!isDeleting) {
        target.textContent = current.substring(0, charIndex + 1);
        charIndex++;
        if (charIndex === current.length) {
          isDeleting = true;
          setTimeout(tick, pauseEnd);
          return;
        }
        setTimeout(tick, typeSpeed);
      } else {
        target.textContent = current.substring(0, charIndex - 1);
        charIndex--;
        if (charIndex === 0) {
          isDeleting = false;
          wordIndex = (wordIndex + 1) % words.length;
          setTimeout(tick, pauseBetween);
          return;
        }
        setTimeout(tick, deleteSpeed);
      }
    }

    tick();
  }

  /* ========================================
     GLITCH EFFECT
     ======================================== */
  function initGlitchEffect() {
    var heroName = document.getElementById('ag-hero-name');
    if (!heroName) return;

    function triggerGlitch() {
      heroName.classList.add('ag-glitch--active');
      setTimeout(function () {
        heroName.classList.remove('ag-glitch--active');
      }, 200);
      var nextDelay = 4000 + Math.random() * 2000;
      setTimeout(triggerGlitch, nextDelay);
    }

    setTimeout(triggerGlitch, 3000);
  }

  /* ========================================
     SCROLL REVEAL
     ======================================== */
  function initScrollReveal() {
    var reveals = document.querySelectorAll('.ag-reveal');
    if (!reveals.length) return;

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          var delay = parseInt(entry.target.getAttribute('data-delay')) || 0;
          setTimeout(function () {
            entry.target.classList.add('ag-reveal--visible');
          }, delay);
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15 });

    reveals.forEach(function (el) {
      observer.observe(el);
    });
  }

  /* ========================================
     CURSOR GLOW
     ======================================== */
  function initCursorGlow() {
    if (!window.matchMedia('(hover: hover)').matches) return;

    var glow = document.createElement('div');
    glow.className = 'ag-cursor-glow';
    document.body.appendChild(glow);

    var dot = document.createElement('div');
    dot.className = 'ag-cursor-dot';
    document.body.appendChild(dot);

    var mouseX = 0, mouseY = 0;
    var dotX = 0, dotY = 0;

    document.addEventListener('mousemove', function (e) {
      mouseX = e.clientX;
      mouseY = e.clientY;
      glow.style.left = mouseX + 'px';
      glow.style.top = mouseY + 'px';
    });

    function animateDot() {
      dotX += (mouseX - dotX) * 0.15;
      dotY += (mouseY - dotY) * 0.15;
      dot.style.left = dotX + 'px';
      dot.style.top = dotY + 'px';
      requestAnimationFrame(animateDot);
    }

    animateDot();
  }

  /* ========================================
     TILT EFFECT
     ======================================== */
  function initTiltEffect() {
    if (!window.matchMedia('(hover: hover)').matches) return;

    var tiltElements = document.querySelectorAll('[data-tilt]');
    tiltElements.forEach(function (el) {
      el.addEventListener('mousemove', function (e) {
        var rect = el.getBoundingClientRect();
        var x = e.clientX - rect.left;
        var y = e.clientY - rect.top;
        var centerX = rect.width / 2;
        var centerY = rect.height / 2;
        var rotateX = ((y - centerY) / centerY) * -5;
        var rotateY = ((x - centerX) / centerX) * 5;
        el.style.transform = 'perspective(800px) rotateX(' + rotateX + 'deg) rotateY(' + rotateY + 'deg) translateY(-4px)';
      });

      el.addEventListener('mouseleave', function () {
        el.style.transform = 'perspective(800px) rotateX(0deg) rotateY(0deg) translateY(0)';
        el.style.transition = 'transform 0.4s ease';
        setTimeout(function () {
          el.style.transition = '';
        }, 400);
      });
    });
  }

  /* ========================================
     SMOOTH SCROLL
     ======================================== */
  function initSmoothScroll() {
    var links = document.querySelectorAll('a[href^="#"]');
    var navEl = document.querySelector('.ag-nav');
    var navHeight = navEl ? navEl.offsetHeight : 72;

    links.forEach(function (link) {
      link.addEventListener('click', function (e) {
        e.preventDefault();
        var targetId = link.getAttribute('href');
        var targetEl = document.querySelector(targetId);
        if (!targetEl) return;
        var top = targetEl.getBoundingClientRect().top + window.pageYOffset - navHeight;
        window.scrollTo({ top: top, behavior: 'smooth' });
      });
    });
  }

  /* ========================================
     FILTER TABS
     ======================================== */
  function initFilterTabs() {
    var tabs = document.querySelectorAll('.ag-filter__tab');
    var cards = document.querySelectorAll('.ag-project-card');

    tabs.forEach(function (tab) {
      tab.addEventListener('click', function () {
        tabs.forEach(function (t) { t.classList.remove('ag-filter__tab--active'); });
        tab.classList.add('ag-filter__tab--active');
        var filter = tab.getAttribute('data-filter');

        cards.forEach(function (card) {
          var category = card.getAttribute('data-category');
          if (filter === 'all' || category === filter) {
            card.classList.remove('ag-project-card--hidden');
            card.style.position = '';
            card.style.visibility = '';
          } else {
            card.classList.add('ag-project-card--hidden');
          }
        });
      });
    });
  }

  /* ========================================
     COPY TO CLIPBOARD
     ======================================== */
  function initCopyToClipboard() {
    var copyBtns = document.querySelectorAll('.ag-copy-btn');
    copyBtns.forEach(function (btn) {
      btn.addEventListener('click', function () {
        var text = btn.getAttribute('data-copy');
        navigator.clipboard.writeText(text).then(function () {
          var original = btn.textContent;
          btn.textContent = 'Copied!';
          btn.style.color = 'var(--c-green)';
          btn.style.borderColor = 'var(--c-green)';
          setTimeout(function () {
            btn.textContent = original;
            btn.style.color = '';
            btn.style.borderColor = '';
          }, 2000);
        }).catch(function () {
          btn.textContent = 'Error';
          setTimeout(function () { btn.textContent = 'Copy'; }, 2000);
        });
      });
    });
  }

  /* ========================================
     COUNTERS
     ======================================== */
  function initCounters() {
    var statNumbers = document.querySelectorAll('.ag-stat__number[data-target]');
    if (!statNumbers.length) return;

    function easeOutCubic(t) {
      return 1 - Math.pow(1 - t, 3);
    }

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          var el = entry.target;
          var target = parseInt(el.getAttribute('data-target'));
          var duration = 2000;
          var startTime = null;

          function animate(timestamp) {
            if (!startTime) startTime = timestamp;
            var elapsed = timestamp - startTime;
            var progress = Math.min(elapsed / duration, 1);
            var eased = easeOutCubic(progress);
            var current = Math.floor(eased * target);
            el.textContent = current.toLocaleString() + '+';
            if (progress < 1) {
              requestAnimationFrame(animate);
            } else {
              el.textContent = target.toLocaleString() + '+';
            }
          }

          requestAnimationFrame(animate);
          observer.unobserve(el);
        }
      });
    }, { threshold: 0.5 });

    statNumbers.forEach(function (el) {
      observer.observe(el);
    });
  }

  /* ========================================
     NAV SCROLL
     ======================================== */
  function initNavScroll() {
    var nav = document.getElementById('ag-nav');
    var navLinks = document.querySelectorAll('.ag-nav__link');
    var sections = document.querySelectorAll('section[id]');

    if (!nav) return;

    function onScroll() {
      var scrollY = window.scrollY;

      if (scrollY > 50) {
        nav.classList.add('ag-nav--scrolled');
      } else {
        nav.classList.remove('ag-nav--scrolled');
      }

      var current = '';
      sections.forEach(function (section) {
        var top = section.offsetTop - 150;
        var height = section.offsetHeight;
        if (scrollY >= top && scrollY < top + height) {
          current = section.getAttribute('id');
        }
      });

      navLinks.forEach(function (link) {
        link.classList.remove('ag-nav__link--active');
        if (link.getAttribute('data-section') === current) {
          link.classList.add('ag-nav__link--active');
        }
      });
    }

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }

  /* ========================================
     MAGNETIC BUTTONS
     ======================================== */
  function initMagneticButtons() {
    if (!window.matchMedia('(hover: hover)').matches) return;

    var buttons = document.querySelectorAll('[data-magnetic]');
    buttons.forEach(function (btn) {
      btn.addEventListener('mousemove', function (e) {
        var rect = btn.getBoundingClientRect();
        var x = e.clientX - rect.left - rect.width / 2;
        var y = e.clientY - rect.top - rect.height / 2;
        var maxMove = 4;
        var moveX = (x / rect.width) * maxMove * 2;
        var moveY = (y / rect.height) * maxMove * 2;
        btn.style.transform = 'translate(' + moveX + 'px, ' + moveY + 'px) scale(1.03)';
      });

      btn.addEventListener('mouseleave', function () {
        btn.style.transform = '';
        btn.style.transition = 'transform 0.3s ease';
        setTimeout(function () {
          btn.style.transition = '';
        }, 300);
      });
    });
  }

  /* ========================================
     MOBILE MENU
     ======================================== */
  function initMobileMenu() {
    var burger = document.getElementById('ag-burger');
    var nav = document.getElementById('ag-nav');
    var mobileLinks = document.querySelectorAll('.ag-nav__mobile-link');

    if (!burger || !nav) return;

    burger.addEventListener('click', function () {
      nav.classList.toggle('ag-mobile-open');
      document.body.style.overflow = nav.classList.contains('ag-mobile-open') ? 'hidden' : '';
    });

    mobileLinks.forEach(function (link) {
      link.addEventListener('click', function () {
        nav.classList.remove('ag-mobile-open');
        document.body.style.overflow = '';
      });
    });
  }

  /* ========================================
     BACK TO TOP
     ======================================== */
  function initBackToTop() {
    var btn = document.getElementById('ag-back-to-top');
    if (!btn) return;

    function checkScroll() {
      if (window.scrollY > window.innerHeight) {
        btn.classList.add('ag-back-to-top--visible');
      } else {
        btn.classList.remove('ag-back-to-top--visible');
      }
    }

    window.addEventListener('scroll', checkScroll, { passive: true });
    checkScroll();

    btn.addEventListener('click', function () {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  /* ========================================
     COFFEE CHECKOUT
     ======================================== */
  function initCoffeeCheckout() {
    var overlay = document.getElementById('ag-checkout-overlay');
    var closeBtn = document.getElementById('ag-checkout-close');
    var buyBtns = document.querySelectorAll('.ag-coffee__buy-btn');
    var checkoutForm = document.getElementById('ag-checkout-form');
    var itemNameEl = document.getElementById('ag-checkout-item');
    var itemPriceEl = document.getElementById('ag-checkout-price');
    var totalEl = document.getElementById('ag-checkout-total');
    var payAmountEl = document.getElementById('ag-checkout-pay-amount');

    if (!overlay || !buyBtns.length) return;

    function openCheckout(itemName, amount) {
      if (itemNameEl) itemNameEl.textContent = itemName;
      if (itemPriceEl) itemPriceEl.textContent = '\u20AC' + amount;
      if (totalEl) totalEl.textContent = '\u20AC' + amount;
      if (payAmountEl) payAmountEl.textContent = amount;
      overlay.classList.add('ag-checkout-overlay--open');
      document.body.style.overflow = 'hidden';
    }

    function closeCheckout() {
      overlay.classList.remove('ag-checkout-overlay--open');
      document.body.style.overflow = '';
    }

    buyBtns.forEach(function (btn) {
      btn.addEventListener('click', function () {
        var item = btn.getAttribute('data-item');
        var amount = btn.getAttribute('data-amount');
        openCheckout(item, amount);
      });
    });

    if (closeBtn) {
      closeBtn.addEventListener('click', closeCheckout);
    }

    overlay.addEventListener('click', function (e) {
      if (e.target === overlay) closeCheckout();
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') closeCheckout();
    });

    if (checkoutForm) {
      checkoutForm.addEventListener('submit', function (e) {
        e.preventDefault();
        closeCheckout();

        var toast = document.createElement('div');
        toast.className = 'ag-toast';
        toast.textContent = '\u2615 Thank you for your support!';
        document.body.appendChild(toast);

        setTimeout(function () {
          toast.classList.add('ag-toast--out');
          setTimeout(function () {
            if (toast.parentNode) toast.parentNode.removeChild(toast);
          }, 400);
        }, 3000);

        checkoutForm.reset();
      });
    }
  }

  /* ========================================
     DRAG TO SCROLL (SKILLS)
     ======================================== */
  function initDragScroll() {
    var slider = document.querySelector('.ag-skills__scroll');
    if (!slider) return;
    var isDown = false;
    var startX;
    var scrollLeft;

    slider.addEventListener('mousedown', function (e) {
      isDown = true;
      startX = e.pageX - slider.offsetLeft;
      scrollLeft = slider.scrollLeft;
    });

    slider.addEventListener('mouseleave', function () { isDown = false; });
    slider.addEventListener('mouseup', function () { isDown = false; });

    slider.addEventListener('mousemove', function (e) {
      if (!isDown) return;
      e.preventDefault();
      var x = e.pageX - slider.offsetLeft;
      var walk = (x - startX) * 2;
      slider.scrollLeft = scrollLeft - walk;
    });
  }

  /* ========================================
     INITIALIZE ALL
     ======================================== */
  initDragScroll();
  initMatrixRain();
  initTypingEffect();
  initGlitchEffect();
  initScrollReveal();
  initCursorGlow();
  initTiltEffect();
  initSmoothScroll();
  initFilterTabs();
  initCopyToClipboard();
  initCounters();
  initNavScroll();
  initMagneticButtons();
  initMobileMenu();
  initBackToTop();
  initCoffeeCheckout();

});
