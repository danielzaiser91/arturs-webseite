# Offene Punkte — Westerwald-Pianoservice Website

Stand: 11.07.2026. Die Seite ist live unter `https://ace2001.lima-city.de/` (und per Weiterleitung
über `westerwald-pianoservice.de`).

Aufgeteilt in drei Teile: kritische Prüfpunkte vor dem Launch, was nur Artur entscheiden/liefern
kann, und was wir technisch selbst erledigen können.

---

## 🔴 Kritische Prüfpunkte (vor dem Launch abarbeiten)

Die „Entwurf — noch nicht rechtsverbindlich"-Banner auf Impressum/Datenschutz und der „Seite im
Aufbau"-Hinweis im Footer wurden am 11.07.2026 von der Website entfernt — solche Hinweise wirken
auf Besucher unfertig und gehören nicht auf eine Kundenseite. Die eigentlichen Prüfaufgaben stehen
jetzt verbindlich hier. Ziel dabei: Anwaltskosten sparen bzw. auf das eine Thema begrenzen, wo sich
Beratung wirklich lohnt.

1. **Widerrufsbelehrung klären — der einzige Punkt, für den sich anwaltliche Hilfe wirklich
   lohnt.** Wenn Aufträge mit Privatkunden per Telefon, E-Mail oder WhatsApp zustande kommen
   (Fernabsatz, §§ 312c, 312g BGB), steht Kunden ein 14-tägiges Widerrufsrecht zu, über das
   belehrt werden muss. Ohne Belehrung verlängert sich die Frist auf bis zu 12 Monate und
   14 Tage, und es drohen Abmahnungen. Günstige Alternativen zum Anwalt: die bereits angefragte
   Muster-AGB der Handwerkskammer Koblenz (enthält üblicherweise eine Widerrufsbelehrung) oder
   das amtliche Muster aus Anlage 1 zu Art. 246a EGBGB. Zuerst mit Artur klären, **wie** seine
   Aufträge tatsächlich zustande kommen (vor Ort per Handschlag = kein Fernabsatz-Problem;
   telefonisch/schriftlich = Belehrung nötig).
2. **Verbraucherstreitbeilegung bestätigen — kostenlos, nur eine Entscheidung.** Im Impressum
   steht jetzt die Standard-Erklärung „weder verpflichtet noch bereit" (für einen Kleinbetrieb
   die übliche Wahl; die Informationspflicht nach § 36 VSBG greift ohnehin erst ab mehr als
   10 Beschäftigten). Artur muss das nur einmal absegnen — Frage 3 im Fragebogen.
3. **Rechtstexte wurden am 11.07.2026 inhaltlich modernisiert — Restprüfung optional.**
   Durchgeführt: Impressum von § 5 TMG auf § 5 DDG umgestellt (das TMG ist seit Mai 2024 außer
   Kraft), den EU-Streitschlichtungs-Absatz samt Link entfernt (die ODR-Plattform der EU wurde
   zum 20.07.2025 eingestellt — der Link wäre tot und der Hinweis gegenstandslos), veraltete
   TMG-Paragraphen im Disclaimer ersetzt. Datenschutzerklärung deutlich ausgebaut:
   Rechtsgrundlagen (Art. 6 DSGVO), WhatsApp-/Meta-Hinweis, Spamschutz-Erläuterung, „keine
   Cookies/kein Tracking"-Klarstellung, zuständige Aufsichtsbehörde (RLP), Verschlüsselung.
   Alles Standard-Formulierungen nach bestem Wissen, aber ohne anwaltliche Prüfung — wer auf
   Nummer sicher gehen will, lässt nur Punkt 1 (Widerruf) professionell prüfen, der Rest ist
   risikoarm.

---

## Teil A — Fragen an Artur

*(Dieser Abschnitt kann 1:1 an Artur weitergeleitet werden.)*

1. **Hast du eine echte Kundenbewertung?** Das erfundene Beispiel-Zitat wurde am 11.07.2026 von
   der Seite entfernt (stattdessen steht dort jetzt ein echter „Über uns"-Text). Wenn du eine
   zufriedene Kundin oder einen Kunden kennst, der 1-2 Sätze schreiben würde, bauen wir die
   Stimme gerne prominent ein — das überzeugt Besucher mehr als alles andere.

2. **Hast du noch mehr Fotos?** Von dir bei der Arbeit, von Instrumenten, von der Werkstatt, vom
   Transport? Aktuell sind 3 von 6 Bildern auf der Seite noch generische Stockfotos (beim Verkauf,
   beim Ankauf und im großen Titelbild), keine echten Aufnahmen von dir. Je mehr echte Fotos, desto
   besser — das ist der Punkt, der Kunden am meisten überzeugt.

3. **Möchtest du an einem Streit-Schlichtungsverfahren teilnehmen?** Kurz erklärt: Falls es mal
   Streit mit einem Kunden gibt, gibt es die Möglichkeit, das über eine neutrale Schlichtungsstelle
   zu klären statt vor Gericht. Das ist freiwillig. Im Impressum muss stehen, ob du daran
   teilnimmst oder nicht — bisher ist das noch offen.

4. **Was sagt die Handwerkskammer Koblenz zur Muster-AGB?** Sobald du eine Antwort hast, sag
   Bescheid, dann bauen wir das ein. Bis dahin steht auf der Seite ehrlich "wir haben aktuell keine
   eigenen AGB, es gilt das gesetzliche Recht" — das ist rechtlich in Ordnung, AGB sind freiwillig.

5. **Wie kommen deine Aufträge normalerweise zustande?** Vereinbarst du alles vor Ort beim
   Kunden, oder wird ein Auftrag auch mal komplett am Telefon oder per E-Mail/WhatsApp fest
   gemacht? Davon hängt ab, ob die Website eine Widerrufsbelehrung braucht — Details siehe
   „Kritische Prüfpunkte" oben. (Die frühere Frage „Anwalt gegenlesen lassen?" ist damit
   präzisiert: Impressum und Datenschutz sind inzwischen modernisiert und risikoarm, nur das
   Widerrufs-Thema verdient ggf. professionelle Prüfung.)

6. **Falls das Problem mit der Adresse "westerwald-pianoservice.de" bestehen bleibt:** Eine mögliche
   Lösung wäre, die Domain zu deinem lima-city-Konto umzuziehen (dauert bei .de-Domains meist nur
   ein paar Stunden). Dafür brauchst du einen "AuthCode" von deinem bisherigen Domain-Anbieter —
   das ist wie ein Passwort, das man dort anfordern kann. Sag Bescheid, falls du das angehen willst,
   dann helfen wir beim Rest.

---

## Teil B — Können wir selbst erledigen (technisch, kein Artur-Input nötig)

- [ ] `noindex`-Meta-Tag entfernen, damit Google die Seite überhaupt in den Suchergebnissen zeigen
  kann — sinnvoll, sobald die „Kritischen Prüfpunkte" oben geklärt sind (v. a. Punkt 1).
- [ ] WhatsApp-Link-Vorschau mit einer frischen Test-URL erneut verifizieren (Discord funktioniert
  bereits, mehrere technische Fixes sind schon live: robots.txt, og:url-Mismatch, fehlendes
  charset).

## Potenzielle Verbesserungen

- [ ] **Schutz vor Werbe-/KI-/Spam-Mails über das Kontaktformular** — aktuell kein Honeypot-Feld und
  kein Rate-Limiting/Captcha (z. B. Cloudflare Turnstile) auf `kontakt`-Formular. Im E-Mail-Backup
  finden sich mehrere Wellen SEO-Cold-Outreach, gefälschte "KI-Ranking"-Angebote und automatisierte
  Fake-Antwort-Bots. Mailto-Links auf der Seite wurden bereits obfuskiert (siehe main.js), das
  Formular selbst ist aber noch offen für automatisierten Bot-Spam.

## ✅ Bereits erledigt (zur Referenz)

- Echte Kontaktdaten (Adresse, Telefon, Mobil, E-Mail, Steuernummer) im Impressum, Datenschutz, AGB
  und auf der Startseite.
- Kleinunternehmerregelung (§ 19 UStG) statt Umsatzsteuer-ID-Platzhalter korrekt ausgewiesen.
- Kontaktformular läuft über einen eigenen PHP-Mailer (kein Drittanbieter), live getestet.
- PHP-Version von 5.6 (EOL, keine Sicherheitsupdates) auf 8.3 (aktiv unterstützt) angehoben.
- Open-Graph-/Twitter-Card-Tags samt eigenem Vorschaubild für Link-Previews ergänzt.
- `robots.txt` von pauschalem `Disallow: /` auf `Allow: /` umgestellt.
- Alle Website-Texte überarbeitet (11.07.2026): natürlichere, persönlichere Sprache im Stil des
  Familienbetriebs statt formelhafter Aufzählungen; „Über uns" mit echtem Text statt
  Platzhalter-Testimonial; Kontakt-Sektion einladender formuliert.
- „Entwurf"-Banner (Impressum/Datenschutz), „Seite im Aufbau"-Footer-Hinweis und
  „Wir prüfen aktuell…"-Vermerk (AGB) von der Website entfernt — Prüfaufgaben stehen jetzt oben
  unter „Kritische Prüfpunkte".
- Impressum auf § 5 DDG aktualisiert, toten EU-ODR-Absatz entfernt; Datenschutzerklärung
  ausgebaut (Rechtsgrundlagen, WhatsApp, Spamschutz, keine Cookies, Aufsichtsbehörde).
- Bildnachweis im Footer neutral formuliert, CC-Lizenzen jetzt klickbar verlinkt.
