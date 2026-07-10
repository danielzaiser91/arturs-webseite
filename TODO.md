# Offene Punkte — Westerwald-Pianoservice Website

Stand: 10.07.2026. Die Seite ist live unter `https://ace2001.lima-city.de/` (und per Weiterleitung
über `westerwald-pianoservice.de`).

Aufgeteilt in zwei Teile: was nur Artur entscheiden/liefern kann, und was wir technisch selbst
erledigen können.

---

## Teil A — Fragen an Artur

*(Dieser Abschnitt kann 1:1 an Artur weitergeleitet werden.)*

1. **Hast du eine echte Kundenbewertung?** Auf der Seite steht aktuell noch ein erfundenes
   Beispiel-Zitat als Platzhalter (klar als solcher markiert, aber sollte weg). Wenn du eine
   zufriedene Kundin oder einen Kunden kennst, der 1-2 Sätze schreiben würde — perfekt. Wenn nicht,
   entfernen wir den Platzhalter einfach ersatzlos.

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

5. **Möchtest du Impressum und Datenschutzerklärung einmal von einem Anwalt gegenlesen lassen?**
   Alle Fakten (Adresse, Telefon, Steuernummer etc.) sind korrekt und vollständig drin — es geht nur
   noch darum, ob die Formulierungen selbst juristisch wasserdicht sind. Optional, aber empfohlen,
   bevor viel Traffic auf die Seite kommt.

6. **Falls das Problem mit der Adresse "westerwald-pianoservice.de" bestehen bleibt:** Eine mögliche
   Lösung wäre, die Domain zu deinem lima-city-Konto umzuziehen (dauert bei .de-Domains meist nur
   ein paar Stunden). Dafür brauchst du einen "AuthCode" von deinem bisherigen Domain-Anbieter —
   das ist wie ein Passwort, das man dort anfordern kann. Sag Bescheid, falls du das angehen willst,
   dann helfen wir beim Rest.

---

## Teil B — Können wir selbst erledigen (technisch, kein Artur-Input nötig)

- [ ] `noindex`-Meta-Tag entfernen, damit Google die Seite überhaupt in den Suchergebnissen zeigen
  kann — sinnvoll, sobald Punkt 1+2 aus Teil A einigermaßen geklärt sind.
- [ ] "Im Aufbau"-Hinweis im Footer entfernen, sobald die Fotos aus Punkt 2 (Teil A) eingebaut sind.
- [ ] WhatsApp-Link-Vorschau mit einer frischen Test-URL erneut verifizieren (Discord funktioniert
  bereits, mehrere technische Fixes sind schon live: robots.txt, og:url-Mismatch, fehlendes
  charset).

## ✅ Bereits erledigt (zur Referenz)

- Echte Kontaktdaten (Adresse, Telefon, Mobil, E-Mail, Steuernummer) im Impressum, Datenschutz, AGB
  und auf der Startseite.
- Kleinunternehmerregelung (§ 19 UStG) statt Umsatzsteuer-ID-Platzhalter korrekt ausgewiesen.
- Kontaktformular läuft über einen eigenen PHP-Mailer (kein Drittanbieter), live getestet.
- PHP-Version von 5.6 (EOL, keine Sicherheitsupdates) auf 8.3 (aktiv unterstützt) angehoben.
- Open-Graph-/Twitter-Card-Tags samt eigenem Vorschaubild für Link-Previews ergänzt.
- `robots.txt` von pauschalem `Disallow: /` auf `Allow: /` umgestellt.
