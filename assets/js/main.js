(function () {
  'use strict';

  // Web3Forms Access Key. Aktuell auf ein Test-Postfach eingerichtet;
  // wird auf Arturs echte E-Mail umgestellt, sobald der Testlauf bestätigt ist.
  var WEB3FORMS_ACCESS_KEY = 'd3c32ed6-727e-4d51-ac45-f017d0893dbe';

  var navToggle = document.querySelector('.nav-toggle');
  var topnav = document.querySelector('.topnav');
  if (navToggle && topnav) {
    navToggle.addEventListener('click', function () {
      var open = topnav.classList.toggle('mobile-open');
      navToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
    topnav.querySelectorAll('a').forEach(function (a) {
      a.addEventListener('click', function () {
        topnav.classList.remove('mobile-open');
        navToggle.setAttribute('aria-expanded', 'false');
      });
    });
  }

  if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches && 'IntersectionObserver' in window) {
    var obs = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          obs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15 });
    document.querySelectorAll('[data-reveal]').forEach(function (el) { obs.observe(el); });
  } else {
    document.querySelectorAll('[data-reveal]').forEach(function (el) { el.classList.add('is-visible'); });
  }

  var form = document.querySelector('.leadform');
  if (form) {
    var note = form.querySelector('.form-note');
    var submitBtn = form.querySelector('button[type="submit"]');

    form.addEventListener('submit', function (e) {
      e.preventDefault();
      var name = form.querySelector('#p-name').value.trim();
      var kontakt = form.querySelector('#p-kontakt').value.trim();
      var anliegen = form.querySelector('#p-anliegen').value;
      var nachricht = form.querySelector('#p-nachricht').value.trim();

      if (note) {
        note.textContent = 'Wird gesendet …';
        note.removeAttribute('data-state');
      }
      submitBtn.disabled = true;

      fetch('https://api.web3forms.com/submit', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', Accept: 'application/json' },
        body: JSON.stringify({
          access_key: WEB3FORMS_ACCESS_KEY,
          subject: 'Anfrage über die Website: ' + anliegen,
          name: name,
          message: 'Kontaktmöglichkeit: ' + kontakt + '\nAnliegen: ' + anliegen + '\n\n' + nachricht
        })
      })
        .then(function (res) { return res.json(); })
        .then(function (data) {
          submitBtn.disabled = false;
          if (data.success) {
            form.reset();
            if (note) {
              note.textContent = 'Danke! Ihre Anfrage wurde gesendet, wir melden uns zeitnah zurück.';
              note.setAttribute('data-state', 'sent');
            }
          } else {
            if (note) note.textContent = 'Senden fehlgeschlagen. Bitte versuchen Sie es später erneut oder schreiben Sie uns direkt per E-Mail.';
          }
        })
        .catch(function () {
          submitBtn.disabled = false;
          if (note) note.textContent = 'Senden fehlgeschlagen (Netzwerkfehler). Bitte versuchen Sie es später erneut.';
        });
    });
  }
})();
