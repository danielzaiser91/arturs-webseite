# Offene Baustellen — Westerwald-Pianoservice Website
### Inhaltsverzeichnis
- 1. Rechtliches (nur Artur kann entscheiden)
- 1b. Neue Fragen an Artur (aus dem Thilemann-Vergleich, siehe vergleich-piano-thilemann.md)
- 2. Content & Fotos (Artur muss liefern)
- 3. SEO & Sichtbarkeit
- 4. Sicherheit / Spam-Schutz
- 5. Deployment-Status (aktueller Sync-Zustand zwischen GitHub und lima-city-FTP)
- 6. E-Mail-Postfach (Details siehe email-uebersicht-fuer-artur.md)
- 7. Bereits erledigt (Referenz)


Stand: 11.07.2026. Vollständige Durchsicht aller Repo-Dateien (HTML, CSS, JS, PHP, Konfig, Rechtstexte). Ersetzt/konsolidiert die Punkte aus TODO.md und ARTUR_WEBSITE_REVIEW.md in einer kategorisierten Übersicht — die beiden Dateien bleiben als Detail-Historie bestehen, diese hier ist der aktuelle Gesamtstatus.

Diese Datei wird nach jeder Entscheidung/Code-Änderung am Projekt aktualisiert — siehe CLAUDE.md.


## 1. Rechtliches (nur Artur kann entscheiden)

- 🔴 Widerrufsbelehrung klären — wichtigster offener Rechtspunkt. Kommen Aufträge mit Privatkunden per Telefon/E-Mail/WhatsApp zustande (Fernabsatz), braucht es eine Widerrufsbelehrung — ohne sie verlängert sich die Widerrufsfrist auf über ein Jahr und es drohen Abmahnungen. Zuerst mit Artur klären, wie seine Aufträge tatsächlich geschlossen werden; günstige Lösungen: HWK-Muster-AGB (bereits angefragt) oder das amtliche Muster aus Anlage 1 zu Art. 246a EGBGB. Juristische Details in TODO.md → „Kritische Prüfpunkte".
- Verbraucherstreitbeilegung: Im Impressum steht jetzt die Standard-Erklärung „weder verpflichtet noch bereit" (Platzhalter-Vermerk entfernt) — Artur muss diese Wahl nur noch bestätigen (Frage 3 im Fragebogen).
- Rechtstexte modernisiert (11.07.2026), Restprüfung optional: Impressum auf § 5 DDG umgestellt (TMG außer Kraft), toter EU-ODR-Absatz entfernt (Plattform seit 20.07.2025 eingestellt), Datenschutzerklärung deutlich ausgebaut (Rechtsgrundlagen, WhatsApp-Hinweis, Spamschutz, keine Cookies, Aufsichtsbehörde RLP). Die „Entwurf"-Banner sind von der Website entfernt; eine anwaltliche Komplettprüfung ist aus unserer Sicht nur noch für das Widerrufs-Thema (Punkt oben) sinnvoll.
- Eigene AGB: aktuell keine, es gilt gesetzliches Recht (rechtlich zulässig; steht so jetzt auch selbstbewusst formuliert auf der AGB-Seite, ohne „wir prüfen noch"-Vermerk). Wartet auf Antwort der Handwerkskammer Koblenz zu einer möglichen Muster-AGB.
- Echte Kundenbewertung fehlt weiterhin: Das erfundene Platzhalter-Zitat wurde komplett von der Seite entfernt; die „Über uns"-Sektion hat stattdessen jetzt einen echten Text über den Familienbetrieb. Sobald Artur eine echte Kundenstimme liefert, bauen wir sie ein.

## 1b. Neue Fragen an Artur (aus dem Thilemann-Vergleich, siehe vergleich-piano-thilemann.md)

- Seit wann im Klavierhandwerk? Eine Trust-Zeile wie „Klavierhandwerk seit 19xx" (Vorbild Thilemann: „seit 1924") wäre das stärkste fehlende Vertrauenssignal — wird nur mit echter Jahreszahl eingetragen, nichts erfinden. → Frage 9 im Fragebogen.
- Telefonische Erreichbarkeitszeiten? Für Kontaktbereich + Schema.org openingHours. → Frage 10 im Fragebogen.

## 2. Content & Fotos (Artur muss liefern)

- 3 von 6 Bildern sind Stock-/Platzhalterfotos (Hero, "Verkauf", "Ankauf & Taxierung") — Wikimedia-Commons-Bilder, keine echten Aufnahmen von Artur/seiner Arbeit. Die anderen 3 ("Klavierstimmung", "Restaurierung", "Über uns") sind bereits echte Fotos. Der Footer weist die Herkunft weiterhin korrekt aus (neutraler Bildnachweis mit verlinkten CC-Lizenzen).
- "Im Aufbau"-Hinweis im Footer ist inzwischen von der Website entfernt (Teil des Text-Überhauls) — hängt trotzdem weiterhin an den fehlenden echten Fotos oben, falls er später wieder gebraucht wird.

## 3. SEO & Sichtbarkeit

- 🔴 Kritisch, aktiv: <meta name="robots" content="noindex, nofollow"> steht auf allen 4 Seiten — Google indexiert die Seite aktuell überhaupt nicht. Bewusst gesetzt, bis die Widerrufsbelehrung (siehe Punkt 1) geklärt ist — alle anderen Rechtstexte sind bereits modernisiert. Blockiert komplett die in WEBSITE_PLAN.md beschriebene Local-SEO-Strategie, solange es aktiv bleibt. Einziger noch offener Punkt in dieser Kategorie.
## 4. Sicherheit / Spam-Schutz

- ✅ Kontaktformular-Spamschutz (Honeypot-Feld, Timing-Check, IP-Rate-Limit) implementiert, deployed und end-to-end verifiziert. Ein Bug im Timing-Check wurde gefunden und behoben: der ursprüngliche Check verglich einen Client-Zeitstempel gegen die Server-Uhr — bei Uhrzeitversatz zwischen beiden (hier ca. 6-7 Sekunden) wurden dadurch ausnahmslos alle Einsendungen als "zu schnell" erkannt und per Fake-Success verworfen, auch echte Nutzer wären betroffen gewesen. Fix: Dauer wird jetzt komplett auf der Client-Uhr gemessen (performance.now()), kein Uhr-Vergleich mehr. Test-Mail über das echte Formular erfolgreich zugestellt und wieder gelöscht.

## 5. Deployment-Status (aktueller Sync-Zustand zwischen GitHub und lima-city-FTP)

✅ GitHub und lima-city-FTP sind synchron — letzter Stand auf beiden: Text-Überhaul (Branch text-ueberarbeitung, gemergt) + Timing-Check-Fix.

## 6. E-Mail-Postfach (Details siehe email-uebersicht-fuer-artur.md)

- ✅ Speicherlimit-Problem behoben (vorläufig): Postfach war zu 98,5% voll (1033/1049 MB) — denkbare (aber nicht bestätigte) Teilursache dafür, dass Test-Mails über das Kontaktformular nicht ankamen. 987 alte, isolierte Sent-Nachrichten (vor 2020, keine Antwortkette in ein späteres Jahr) vom Server gelöscht — bleiben vollständig im lokalen Backup erhalten. Sent-Ordner dadurch von ~845 MB auf ~502 MB reduziert.
- Grundsätzliche Frage nach dauerhafter Speicherlimit-Erhöhung (vermutlich Reseller-Modell, ~0,20 €/GB/Monat) bleibt trotzdem offen — die Löschaktion ist ein Puffer, kein Ersatz für eine Entscheidung, falls das Postfach weiter wächst.
- Postfach wurde bereits einmal aufgeräumt (Spam/Werbung entfernt, Papierkorb geleert) — siehe Report für vollständige, nach Kontakt sortierte Übersicht aller verbliebenen Mails.

## 7. Bereits erledigt (Referenz)

- Echte Kontaktdaten (Adresse, Telefon, Mobil, E-Mail, Steuernummer) im Impressum, Datenschutz, AGB und auf der Startseite.
- Kleinunternehmerregelung (§ 19 UStG) statt Umsatzsteuer-ID-Platzhalter korrekt ausgewiesen.
- Kontaktformular läuft über einen eigenen PHP-Mailer (kein Drittanbieter), live getestet.
- PHP-Version von 5.6 (EOL) auf 8.3 angehoben.
- Open-Graph-/Twitter-Card-Tags samt eigenem Vorschaubild ergänzt.
- robots.txt von pauschalem Disallow: / auf Allow: / umgestellt (die eigentliche Indexierungs-Sperre sitzt bewusst nur im <meta robots>-Tag, siehe Punkt 3) + Sitemap-Verweis ergänzt.
- Domain-Umzug IONOS → lima-city abgeschlossen, DNS läuft über lima-city.
- E-Mail-Postfach bei lima-city eingerichtet, alle Backup-Mails migriert, Test-Mail über das Kontaktformular end-to-end verifiziert.
- Mailto-Links per JS obfuskiert (main.js + data-mail-user/data-mail-domain).
- og:url/og:image auf allen 4 Seiten von der alten ace2001.lima-city.de-Adresse auf die echte Domain westerwald-pianoservice.de korrigiert.
- Schema.org LocalBusiness-Structured-Data eingebaut (ohne E-Mail-Adresse, um die Mailto-Obfuskierung nicht zu unterlaufen).
- sitemap.xml erstellt.
- Bildoptimierung: WebP-Varianten + responsive srcset/<picture> für alle Content-Bilder.
- Kontaktformular: Honeypot-Feld + Timing-Check + IP-Rate-Limit gegen automatisierten Spam, Timing-Check-Bug (Client-/Server-Uhrzeitversatz) gefunden und behoben, end-to-end verifiziert.
- Mailbox-Speicherlimit-Engpass behoben: 987 alte, isolierte Sent-Mails (vor 2020) vom Server entfernt, ~343 MB freigegeben, lokales Backup bleibt vollständig.
- Kompletter Text-Überhaul aller 4 Seiten (11.07.2026, Branch text-ueberarbeitung): natürlichere, persönlichere Sprache im Ton des Familienbetriebs; „Über uns" mit echtem Text statt Platzhalter-Testimonial; „Entwurf"-Banner, „im Aufbau"-Hinweis und „wir prüfen noch"-Vermerke von der Website entfernt und als Prüfliste nach TODO.md überführt; Impressum auf § 5 DDG, EU-ODR-Absatz entfernt; Datenschutzerklärung ausgebaut; Bildnachweis mit klickbaren CC-Lizenz-Links.
- Professionalisierungs-Pass nach Wettbewerbsvergleich (11.07.2026, siehe vergleich-piano-thilemann.md): alle „Artur Zaiser"-Nennungen aus den Website-Texten entfernt (Meta-Tags, Hero, „Über uns", Bild-Alt-Texte) — durchgehende „Wir"-Sprache wie im Branchenstandard, Name nur noch im Impressum und als Datenschutz-Verantwortlicher; Bildnachweis vom Startseiten-Footer in einen eigenen Impressum-Abschnitt verlegt (branchenübliche Praxis, CC-BY-SA-konform); interne Hinweis-Kommentare (TODO-Verweis, Spamschutz-Begründung) aus dem öffentlichen HTML-Quelltext entfernt; Fragebogen um Fragen 9 (seit wann im Handwerk) und 10 (Erreichbarkeitszeiten) erweitert.
- WhatsApp-Link-Vorschau am 13.07.2026 mit frischer Test-URL erneut geprüft — funktioniert (Discord bereits zuvor bestätigt).




