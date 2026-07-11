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
  **Einziger noch offener Punkt in dieser Kategorie** — alles andere unten ist erledigt.

## 4. Sicherheit / Spam-Schutz

- **Kontaktformular-Spamschutz** (Honeypot-Feld, Timing-Check, IP-Rate-Limit) implementiert und
  deployed — aber gerade in Verifikation: Test-Anfragen kamen nicht im Postfach an. Ursache wird
  untersucht, naheliegendster Verdacht war die zu 98,5% volle Mailbox (siehe Punkt 6, inzwischen
  behoben) — Debug läuft weiter, siehe unten.

## 5. Deployment-Status (aktueller Sync-Zustand zwischen GitHub und lima-city-FTP)

✅ GitHub und lima-city-FTP sind synchron — letzter Stand auf beiden: Schema.org, Sitemap,
WebP-Bilder, Kontaktformular-Spamschutz.

## 6. E-Mail-Postfach (Details siehe `email-uebersicht-fuer-artur.md`)

- ✅ **Speicherlimit-Problem behoben (vorläufig):** Postfach war zu 98,5% voll (1033/1049 MB) —
  vermutlich Ursache dafür, dass Test-Mails über das Kontaktformular nicht ankamen (Zustellung an
  volles Postfach kann serverseitig ohne sichtbaren Fehler scheitern). 987 alte, isolierte
  Sent-Nachrichten (vor 2020, keine Antwortkette in ein späteres Jahr) vom Server gelöscht — bleiben
  vollständig im lokalen Backup erhalten. Sent-Ordner dadurch von ~845 MB auf ~502 MB reduziert.
- Grundsätzliche Frage nach dauerhafter Speicherlimit-Erhöhung (vermutlich Reseller-Modell,
  ~0,20 €/GB/Monat) bleibt trotzdem offen — die Löschaktion ist ein Puffer, kein Ersatz für eine
  Entscheidung, falls das Postfach weiter wächst.
- Postfach wurde bereits einmal aufgeräumt (Spam/Werbung entfernt, Papierkorb geleert) — siehe
  Report für vollständige, nach Kontakt sortierte Übersicht aller verbliebenen Mails.

## 7. Bereits erledigt (Referenz)

- Echte Kontaktdaten (Adresse, Telefon, Mobil, E-Mail, Steuernummer) im Impressum, Datenschutz, AGB
  und auf der Startseite.
- Kleinunternehmerregelung (§ 19 UStG) statt Umsatzsteuer-ID-Platzhalter korrekt ausgewiesen.
- Kontaktformular läuft über einen eigenen PHP-Mailer (kein Drittanbieter), live getestet.
- PHP-Version von 5.6 (EOL) auf 8.3 angehoben.
- Open-Graph-/Twitter-Card-Tags samt eigenem Vorschaubild ergänzt.
- `robots.txt` von pauschalem `Disallow: /` auf `Allow: /` umgestellt (die eigentliche Indexierungs-
  Sperre sitzt bewusst nur im `<meta robots>`-Tag, siehe Punkt 3) + Sitemap-Verweis ergänzt.
- Domain-Umzug IONOS → lima-city abgeschlossen, DNS läuft über lima-city.
- E-Mail-Postfach bei lima-city eingerichtet, alle Backup-Mails migriert.
- Mailto-Links per JS obfuskiert (`main.js` + `data-mail-user`/`data-mail-domain`).
- `og:url`/`og:image` auf allen 4 Seiten von der alten `ace2001.lima-city.de`-Adresse auf die echte
  Domain `westerwald-pianoservice.de` korrigiert.
- Schema.org `LocalBusiness`-Structured-Data eingebaut (ohne E-Mail-Adresse, um die
  Mailto-Obfuskierung nicht zu unterlaufen).
- `sitemap.xml` erstellt.
- Bildoptimierung: WebP-Varianten + responsive `srcset`/`<picture>` für alle Content-Bilder.
- Kontaktformular: Honeypot-Feld + Timing-Check + IP-Rate-Limit gegen automatisierten Spam.
- Mailbox-Speicherlimit-Engpass behoben: 987 alte, isolierte Sent-Mails (vor 2020) vom Server
  entfernt, ~343 MB freigegeben, lokales Backup bleibt vollständig.
