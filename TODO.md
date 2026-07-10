# Offene Punkte — Westerwald-Pianoservice Website

Stand: 10.07.2026. Die Seite ist live unter `https://ace2001.lima-city.de/` (und per Weiterleitung
über `westerwald-pianoservice.de`, siehe Punkt unten zum TLS-Problem).

## 🔴 Kritisch — verhindert, dass die Seite bei Google gefunden wird

- [ ] **`noindex`-Meta-Tag entfernen** auf allen 4 Seiten (`index.html`, `impressum.html`,
  `datenschutz.html`, `agb.html`). Aktuell steht `<meta name="robots" content="noindex, nofollow">`
  überall drin — das verhindert, dass Google die Seite in den Suchergebnissen zeigt, unabhängig von
  `robots.txt`. War bewusst gesetzt, solange Kontaktdaten/Rechtstexte noch Platzhalter waren.
  **Empfehlung:** jetzt entfernen, da die wesentlichen Pflichtangaben im Impressum echt sind.

## 🟡 Inhaltlich — braucht echten Content von Artur

- [ ] **Fake-Kundenstimme ersetzen** (`index.html`, Über-uns-Sektion): aktuell ein erfundenes
  Beispiel-Zitat, klar als "Beispieltext — Platzhalter" gekennzeichnet. Braucht eine echte Bewertung
  oder sollte ganz raus.
- [ ] **3 von 6 Fotos sind noch Stock-Bilder** (Hero, "Verkauf", "Ankauf & Taxierung") — Wikimedia-
  Commons-Platzhalter, keine echten Aufnahmen von Artur/seinem Geschäft. Die anderen 3 (Stimmung,
  Restaurierung, Über uns) sind schon echte Fotos aus dem alten Website-Archiv.
- [ ] **"Im Aufbau"-Hinweis im Footer entfernen**, sobald Punkt oben (Fotos) erledigt ist.

## 🟠 Rechtlich offen — braucht Entscheidung/Prüfung, nicht einfach von mir ausfüllbar

- [ ] **Verbraucherstreitbeilegung** (`impressum.html`): Platzhalter `[Bitte gemeinsam mit Artur final
  prüfen/anpassen.]` — Entscheidung nötig, ob Artur an einem Schlichtungsverfahren teilnimmt.
- [ ] **Juristische Prüfung von Impressum & Datenschutz** — Fakten sind vollständig und korrekt,
  aber kein Anwalt hat über die Formulierungen geschaut. Beide Seiten haben noch einen Draft-Banner,
  der das offen so sagt.
- [ ] **AGB-Entscheidung**: aktuell bewusst auf "wir haben keine eigenen AGB, es gilt das BGB"
  gestellt (rechtlich zulässig, da AGB freiwillig sind). Antwort von der **Handwerkskammer Koblenz**
  zu einer passenden Muster-AGB steht noch aus.

## ⚪ Technisch — teilweise außerhalb meiner Kontrolle

- [ ] **TLS-Fehler bei `westerwald-pianoservice.de`**: Die Domain leitet per 302 auf
  `ace2001.lima-city.de` weiter, aber der Weiterleitungsdienst hatte zuletzt einen TLS-Handshake-
  Fehler (unabhängig von unserer Website). Mögliche Lösung: **Domain-Transfer zu lima-city** (siehe
  [lima-city Hilfe: Domain-Transfer](https://www.lima-city.de/hilfe/domain-transfer-zu-lima-city)) —
  braucht einen AuthCode vom aktuellen Domain-Anbieter, dauert bei `.de`-Domains meist nur Stunden.
  Damit würde die Domain direkt bei lima-city liegen statt über einen externen Weiterleitungsdienst.
- [ ] **WhatsApp-Link-Vorschau erneut testen** mit einer frischen URL (z. B. `?v=4`), nachdem
  `og:url`-Mismatch, fehlendes `charset` im Content-Type und die zu strikte `robots.txt` behoben
  wurden — Discord-Vorschau funktioniert bereits, WhatsApp-Bestätigung steht noch aus.

## ✅ Bereits erledigt (zur Referenz)

- Echte Kontaktdaten (Adresse, Telefon, Mobil, E-Mail, Steuernummer) im Impressum, Datenschutz, AGB
  und auf der Startseite.
- Kleinunternehmerregelung (§ 19 UStG) statt Umsatzsteuer-ID-Platzhalter korrekt ausgewiesen.
- Kontaktformular läuft über einen eigenen PHP-Mailer (kein Drittanbieter), live getestet.
- PHP-Version von 5.6 (EOL, keine Sicherheitsupdates) auf 8.3 (aktiv unterstützt) angehoben.
- Open-Graph-/Twitter-Card-Tags samt eigenem Vorschaubild für Link-Previews ergänzt.
- `robots.txt` von pauschalem `Disallow: /` auf `Allow: /` umgestellt.
