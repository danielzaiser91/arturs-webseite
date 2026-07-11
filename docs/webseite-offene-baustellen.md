# Offene Baustellen — Westerwald-Pianoservice Website

Stand: 11.07.2026. Vollständige Durchsicht aller Repo-Dateien (HTML, CSS, JS, PHP, Konfig, Rechtstexte).
Ersetzt/konsolidiert die Punkte aus `TODO.md` und `ARTUR_WEBSITE_REVIEW.md` in einer kategorisierten
Übersicht — die beiden Dateien bleiben als Detail-Historie bestehen, diese hier ist der aktuelle
Gesamtstatus.

**Diese Datei wird nach jeder Entscheidung/Code-Änderung am Projekt aktualisiert — siehe `CLAUDE.md`.**

---

## 1. Rechtliches (nur Artur kann entscheiden)

- **EU-Streitschlichtung / Verbraucherstreitbeilegung** (`impressum.html`): Absatz ist noch als
  Platzhalter markiert (`[Bitte gemeinsam mit Artur final prüfen/anpassen]`) — Artur muss
  entscheiden, ob er an einem Streitschlichtungsverfahren teilnimmt.
- **Alle drei Rechtstexte** (Impressum, Datenschutz, AGB) sind fachlich vollständig (alle Fakten
  korrekt drin), aber noch nicht anwaltlich geprüft — "Entwurf, nicht rechtsverbindlich"-Banner ist
  noch aktiv.
- **Eigene AGB**: aktuell keine, es gilt gesetzliches Recht (rechtlich zulässig). Wartet auf Antwort
  der Handwerkskammer Koblenz zu einer möglichen Muster-AGB.
- **Echte Kundenbewertung fehlt**: "Über uns"-Sektion zeigt noch ein erfundenes, klar als
  Platzhalter markiertes Beispiel-Zitat.

## 2. Content & Fotos (Artur muss liefern)

- **3 von 6 Bildern sind Stock-/Platzhalterfotos** (Hero, "Verkauf", "Ankauf & Taxierung") —
  Wikimedia-Commons-Bilder, keine echten Aufnahmen von Artur/seiner Arbeit. Die anderen 3
  ("Klavierstimmung", "Restaurierung", "Über uns") sind bereits echte Fotos.
- **"Im Aufbau"-Hinweis im Footer** hängt direkt an obigem Punkt — kann erst raus, wenn die
  restlichen Fotos da sind.

## 3. SEO & Sichtbarkeit

- 🔴 **Kritisch, aktiv:** `<meta name="robots" content="noindex, nofollow">` steht auf **allen 4
  Seiten** — Google indexiert die Seite aktuell überhaupt nicht. Bewusst gesetzt, bis die
  Rechtstexte final geprüft sind (siehe Kommentar im `<head>` von `index.html`), blockiert aber
  komplett die in `WEBSITE_PLAN.md` beschriebene Local-SEO-Strategie, solange es aktiv bleibt.
- 🆕 **Neu gefunden, jetzt veraltet:** `og:url` und `og:image` zeigen auf allen 4 Seiten noch auf
  `https://ace2001.lima-city.de/...` statt auf die seit dem Domain-Umzug aktive eigene Domain
  `https://westerwald-pianoservice.de/...`. Link-Vorschauen (WhatsApp, Discord, etc.) verlinken
  seit dem Umzug auf die falsche URL.
- **Kein Schema.org/`LocalBusiness`-Structured-Data** — in `WEBSITE_PLAN.md` explizit als
  SEO-Maßnahme vorgesehen (Google-Maps/Local-Pack-Eligibility), nie umgesetzt.
- **Keine `sitemap.xml`.**
- **Keine responsiven Bilder** (kein `srcset`, keine WebP-Varianten) — `WEBSITE_PLAN.md` wollte das
  "from day one", ist nicht passiert. `hero.jpg` allein 220 KB als reines JPEG ohne Kompression/
  moderneres Format.

## 4. Sicherheit / Spam-Schutz

- **Kontaktformular (`assets/php/kontakt.php`) hat kein Honeypot-Feld, kein Rate-Limiting/Captcha**
  — offen, siehe auch `TODO.md` → "Potenzielle Verbesserungen".
- **Mailto-Links wurden per JS obfuskiert** (`main.js` + `data-mail-user`/`data-mail-domain` in
  `index.html`, `impressum.html`, `datenschutz.html`), um Scraper-Bots zu erschweren — Code ist
  fertig, aber **noch nicht deployed** (siehe Punkt 5).
- **Greylisting auf dem lima-city-Postfach aktiviert** (server-seitig, kein Repo-Code) — erledigt.

## 5. Deployment-Status (aktueller Sync-Zustand zwischen GitHub und lima-city-FTP)

Laut Deploy-Regel in `CLAUDE.md` müssen GitHub (Pages) und lima-city-FTP (Produktivseite) immer
denselben Stand zeigen. Aktuell **nicht synchron**:

- Uncommitted lokal: `TODO.md`, `assets/js/main.js`, `datenschutz.html`, `impressum.html`,
  `index.html` (Mailto-Obfuskierung + TODO-Notiz zu Kontaktformular-Spamschutz)
- Neu, noch nicht getrackt: `CLAUDE.md`, `email-uebersicht-fuer-artur.md`,
  `webseite-offene-baustellen.md` (diese Datei)
- Letzter Commit: `05e3690` (10.07.2026) — "email-backup/ zur .gitignore hinzufuegen"
- → Änderungen sind lokal getestet (Formular-Test war live erfolgreich), warten auf Freigabe zum
  Deployen auf beide Systeme.

## 6. E-Mail-Postfach (Details siehe `email-uebersicht-fuer-artur.md`)

- Speicherlimit (1 GB) war durch die IONOS→lima-city-Migration voll ausgelastet — Erhöhung möglich
  (vermutlich Reseller-Modell, ~0,20 €/GB/Monat), noch keine Entscheidung/Aktion.
- Postfach wurde bereits aufgeräumt (Spam/Werbung entfernt, Papierkorb geleert) — siehe Report für
  vollständige, nach Kontakt sortierte Übersicht aller verbliebenen Mails.

## 7. Bereits erledigt (Referenz)

- Echte Kontaktdaten (Adresse, Telefon, Mobil, E-Mail, Steuernummer) im Impressum, Datenschutz, AGB
  und auf der Startseite.
- Kleinunternehmerregelung (§ 19 UStG) statt Umsatzsteuer-ID-Platzhalter korrekt ausgewiesen.
- Kontaktformular läuft über einen eigenen PHP-Mailer (kein Drittanbieter), live getestet.
- PHP-Version von 5.6 (EOL) auf 8.3 angehoben.
- Open-Graph-/Twitter-Card-Tags samt eigenem Vorschaubild ergänzt (URL-Feld selbst aber veraltet,
  siehe Punkt 3).
- `robots.txt` von pauschalem `Disallow: /` auf `Allow: /` umgestellt (die eigentliche Indexierungs-
  Sperre sitzt bewusst nur im `<meta robots>`-Tag, siehe Punkt 3).
- Domain-Umzug IONOS → lima-city abgeschlossen, DNS läuft über lima-city.
- E-Mail-Postfach bei lima-city eingerichtet, alle Backup-Mails migriert, Test-Mail über das
  Kontaktformular end-to-end verifiziert.
