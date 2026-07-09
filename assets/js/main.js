(function () {
  'use strict';

  // TODO: durch Arturs echte Geschäfts-E-Mail ersetzen, sobald bekannt.
  var CONTACT_EMAIL = 'kontakt@piano-zaiser.de';

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
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      var name = form.querySelector('#p-name').value.trim();
      var kontakt = form.querySelector('#p-kontakt').value.trim();
      var anliegen = form.querySelector('#p-anliegen').value;
      var nachricht = form.querySelector('#p-nachricht').value.trim();

      var subject = 'Anfrage über die Website: ' + anliegen;
      var body = 'Name: ' + name + '\nKontakt: ' + kontakt + '\nAnliegen: ' + anliegen + '\n\n' + nachricht;
      var mailto = 'mailto:' + CONTACT_EMAIL + '?subject=' + encodeURIComponent(subject) + '&body=' + encodeURIComponent(body);

      if (note) {
        note.textContent = 'Ihr E-Mail-Programm öffnet sich mit einer vorausgefüllten Nachricht an uns.';
        note.setAttribute('data-state', 'sent');
      }
      window.location.href = mailto;
    });
  }
})();
