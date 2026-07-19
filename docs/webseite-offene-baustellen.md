# Offene Baustellen — Westerwald-Pianoservice Website

Legende: ✅ erledigt · 🔴 kritisch/blockierend · 🟡 offen, Aktion nötig · ⚪ offen, keine Dringlichkeit (wartet auf Artur/Dritte)

### Inhaltsverzeichnis
- 0. Kurzübersicht — alle offenen Punkte auf einen Blick
- 1. Rechtliches (nur Artur kann entscheiden)
- 2. Content & Fotos (Artur muss liefern)
- 3. SEO & Sichtbarkeit
- 4. Sicherheit / Spam-Schutz
- 5. Deployment-Status (aktueller Sync-Zustand zwischen GitHub und lima-city-FTP)
- 6. E-Mail-Postfach (Details siehe `email-uebersicht-fuer-artur.md`)
- 7. Bereits erledigt (Referenz)


Stand: 11.07.2026, Struktur aktualisiert 19.07.2026 (Kurzübersicht ergänzt, Fragebogen-Antworten direkt in die Abschnitte integriert, separate Fragebogen-Ansicht aufgelöst). Ursprünglich: vollständige Durchsicht aller Website-Inhalte (Texte, Rechtstexte, Technik). Diese Übersicht ist der aktuelle Gesamtstatus des Projekts, kategorisiert nach Themen.

Diese Datei wird nach jeder Entscheidung oder Code-Änderung am Projekt aktualisiert.


## 0. Kurzübersicht — alle offenen Punkte

- ✅ Widerrufsbelehrung geklärt und eingebaut, noindex kann entfernt werden — Details unter 1. Rechtliches
- 🟡 E-Mail-Speicherlimit dauerhaft erhöhen (Artur will das, noch nicht umgesetzt) — Details unter 6. E-Mail-Postfach
- ⚪ Antwort der Handwerkskammer Koblenz zur Muster-AGB steht noch aus — Details unter 1. Rechtliches
- ⚪ Echte Kundenbewertung steht aus, Artur meldet sich „später" — Details unter 1. Rechtliches
- ⚪ Echte Fotos (Hero, Ankauf) stehen aus, Stockfotos sind für jetzt ok — Details unter 2. Content & Fotos
- ⚪ Widerrufsrecht bei Ankauf-Ferngeschäften (Artur kauft Klavier von Privatperson per Telefon/WhatsApp) rechtlich nicht abschließend geprüft — Details unter 1. Rechtliches

## 1. Rechtliches (nur Artur kann entscheiden)

- ✅ Widerrufsbelehrung geklärt und eingebaut (19.07.2026) — wichtigster Rechtspunkt, jetzt erledigt. Kommen Aufträge mit Privatkunden per Telefon/E-Mail/WhatsApp zustande (Fernabsatz, §§ 312c, 312g BGB), braucht es eine Widerrufsbelehrung — ohne sie verlängert sich die Widerrufsfrist auf über ein Jahr und es drohen Abmahnungen. Artur bestätigt, dass Aufträge auf beide Arten zustande kommen (persönlich vor Ort **und** telefonisch/per WhatsApp) — Belehrung war also nötig. Auf Arturs Nachfrage, ob man das nicht günstig fertig kaufen kann: das kostenlose Trusted-Shops-Tool ließ sich technisch nicht nutzen (Rendering-Fehler), daher wurde stattdessen das amtliche gesetzliche Muster (Anlage 1 zu Art. 246a EGBGB) direkt für Arturs Fall ausformuliert und in `agb.html` eingebaut (Widerrufsrecht, Folgen des Widerrufs, Muster-Widerrufsformular). Ursprünglich gab es hier einen offenen Punkt zur Kostentragung bei Abholung widerrufener Klavier-/Flügelkäufe — hat sich erübrigt, da Westerwald-Pianoservice keinen Klavierverkauf an Kunden anbietet (auf Rückfrage von Daniel bestätigt, 19.07.2026); der komplette „Verkauf"-Service samt Erwähnungen wurde deshalb von der Website entfernt (Leistungskarte, Formular-Option, Meta-Texte, Bilder). Die Widerrufsbelehrung deckt jetzt nur noch Dienstleistungsverträge ab (Stimmung, Reparatur, Restaurierung, Wartung) — das passt zum tatsächlichen Angebot.
- ✅ Verbraucherstreitbeilegung bestätigt (19.07.2026): Artur will nicht an einem Streitschlichtungsverfahren teilnehmen — die Standard-Erklärung „weder verpflichtet noch bereit" im Impressum bleibt so, keine Änderung nötig.
- ✅ Anwaltliche Prüfung bestätigt (19.07.2026): Artur möchte Impressum/Datenschutz/AGB vor dem Live-Gang **nicht** zusätzlich anwaltlich prüfen lassen — reicht ihm so. Rechtstexte modernisiert (11.07.2026): Impressum auf § 5 DDG umgestellt (TMG außer Kraft), toter EU-ODR-Absatz entfernt (Plattform seit 20.07.2025 eingestellt), Datenschutzerklärung deutlich ausgebaut (Rechtsgrundlagen, WhatsApp-Hinweis, Spamschutz, keine Cookies, Aufsichtsbehörde RLP). Die „Entwurf"-Banner sind von der Website entfernt. Einzige verbleibende offene Rechtsfrage bleibt die Widerrufsbelehrung oben.
- ⚪ Eigene AGB: aktuell keine, es gilt gesetzliches Recht (rechtlich zulässig; steht so jetzt auch selbstbewusst formuliert auf der AGB-Seite, ohne „wir prüfen noch"-Vermerk). Wartet weiterhin auf Antwort der Handwerkskammer Koblenz zu einer möglichen Muster-AGB (Stand 19.07.2026: noch keine Antwort da, unverändert).
- ⚪ Echte Kundenbewertung fehlt weiterhin: Das erfundene Platzhalter-Zitat wurde komplett von der Seite entfernt; die „Über uns"-Sektion hat stattdessen jetzt einen echten Text über den Familienbetrieb. Stand 19.07.2026: aktuell keine Bewertung zum Einbauen („Später") — Artur schickt evtl. später eine echte Kundenstimme, dann bauen wir sie ein.
- ⚪ Neu entdeckt (19.07.2026), niedrige Priorität, nicht blockierend: Die Widerrufsbelehrung deckt jetzt nur noch Dienstleistungsverträge ab. Beim „Ankauf"-Service (Artur kauft ein Klavier einer Privatperson ab, Vertrag ggf. per Telefon/WhatsApp) ist rechtlich nicht abschließend geklärt, ob auch hier ein Widerrufsrecht des Verkäufers (= der Privatkunde) besteht — die gängige Praxis bei Ankaufsgeschäften (z. B. Goldankauf per Post) ist uneinheitlich. Da Ankauf-Ferngeschäfte bei Artur voraussichtlich selten sind, wird das vorerst nicht blockierend behandelt; bei Bedarf später gezielt prüfen.
- 🟡 Praxis-Absicherung gegen kostenlose Arbeit bei Widerruf (19.07.2026): Daniel hat nachgefragt, ob und wie ein Kunde nach abgeschlossener Arbeit noch kostenlos widerrufen könnte — ja, theoretisch, wenn Artur vorher keine Zustimmung zum vorzeitigen Arbeitsbeginn eingeholt hat (§ 356 Abs. 5, § 357a Abs. 2 BGB). Ausführliche Recherche mit echten Quellen (Gesetzestexte, ZDH/Handwerkskammer-Musterformulare, BGH/EuGH-Urteile) in `docs/widerrufsrecht-dienstleister-recherche.md`. Empfehlung: Artur schickt vor jedem Fernabsatz-Termin (Telefon/WhatsApp-Buchung) zwei kurze, vorformulierte Sätze per WhatsApp — (1) Zustimmung des Kunden zum vorzeitigen Arbeitsbeginn einholen, (2) Anfahrtspauschale vorab als eigenständig fällig ankündigen. Wortlaut wurde Daniel als kopierbarer Block zur Weitergabe an Artur ausgegeben (19.07.2026). Noch offen: Ob/wie Artur das im Alltag tatsächlich umsetzt — das ist eine Prozessänderung, keine Website-Änderung, daher hier nur als Merkposten, nicht als Code-Task.

## 2. Content & Fotos (Artur muss liefern)

- ⚪ 2 von 5 Bildern sind Stock-/Platzhalterfotos (Hero, "Ankauf & Taxierung") — Wikimedia-Commons-Bilder, keine echten Aufnahmen von Artur/seiner Arbeit. Die anderen 3 ("Klavierstimmung", "Restaurierung", "Über uns") sind bereits echte Fotos. Der Footer weist die Herkunft weiterhin korrekt aus (neutraler Bildnachweis mit verlinkten CC-Lizenzen). Stand 19.07.2026: Artur hat aktuell keine weiteren echten Fotos und ist mit den Stockfotos vorerst einverstanden — keine Dringlichkeit, Punkt bleibt aber offen für später. (Der "Verkauf"-Service samt Bild wurde 19.07.2026 komplett entfernt, siehe Punkt 1 — Artur bietet keinen Klavierverkauf an, daher jetzt 5 statt 6 Leistungsbilder.)
- ✅ "Im Aufbau"-Hinweis im Footer ist inzwischen von der Website entfernt (Teil des Text-Überhauls) — hängt trotzdem weiterhin an den fehlenden echten Fotos oben, falls er später wieder gebraucht wird.

## 3. SEO & Sichtbarkeit

- ✅ <meta name="robots" content="noindex, nofollow"> war auf allen 4 Seiten aktiv, solange die Widerrufsbelehrung fehlte. Jetzt entfernt (19.07.2026), da die Widerrufsbelehrung geklärt ist (siehe Punkt 1) — Artur hatte dafür bereits grünes Licht gegeben, keine weitere Rückfrage nötig. Die Seite kann jetzt von Google gefunden werden.

## 4. Sicherheit / Spam-Schutz

- ✅ Kontaktformular-Spamschutz (Honeypot-Feld, Timing-Check, IP-Rate-Limit) implementiert, deployed und end-to-end verifiziert. Ein Bug im Timing-Check wurde gefunden und behoben: der ursprüngliche Check verglich einen Client-Zeitstempel gegen die Server-Uhr — bei Uhrzeitversatz zwischen beiden (hier ca. 6-7 Sekunden) wurden dadurch ausnahmslos alle Einsendungen als "zu schnell" erkannt und per Fake-Success verworfen, auch echte Nutzer wären betroffen gewesen. Fix: Dauer wird jetzt komplett auf der Client-Uhr gemessen (performance.now()), kein Uhr-Vergleich mehr. Test-Mail über das echte Formular erfolgreich zugestellt und wieder gelöscht.

## 5. Deployment-Status (aktueller Sync-Zustand zwischen GitHub und lima-city-FTP)

✅ GitHub und lima-city-FTP sind synchron — letzter Stand auf beiden: Text-Überhaul (Branch text-ueberarbeitung, gemergt) + Timing-Check-Fix.

## 6. E-Mail-Postfach (Details siehe `email-uebersicht-fuer-artur.md`)

- ✅ Speicherlimit-Problem behoben (vorläufig): Postfach war zu 98,5% voll (1033/1049 MB) — denkbare (aber nicht bestätigte) Teilursache dafür, dass Test-Mails über das Kontaktformular nicht ankamen. 987 alte, isolierte Sent-Nachrichten (vor 2020, keine Antwortkette in ein späteres Jahr) vom Server gelöscht — bleiben vollständig im lokalen Backup erhalten. Sent-Ordner dadurch von ~845 MB auf ~502 MB reduziert. Stand 19.07.2026: Artur hat diese Archivierung nachträglich bestätigt.
- 🟡 Offen, jetzt priorisiert: dauerhafte Speicherlimit-Erhöhung (vermutlich Reseller-Modell, ~0,20 €/GB/Monat) — Artur will das Limit erhöhen lassen (Stand 19.07.2026). Braucht eine Aktion im lima-city-Kundenbereich (Tarif/Reseller-Einstellung), keine Website-Änderung — noch nicht umgesetzt.
- ✅ Postfach wurde bereits einmal aufgeräumt (Spam/Werbung entfernt, Papierkorb geleert) — siehe Report für vollständige, nach Kontakt sortierte Übersicht aller verbliebenen Mails.

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
- Kompletter Text-Überhaul aller 4 Seiten (11.07.2026, Branch text-ueberarbeitung): natürlichere, persönlichere Sprache im Ton des Familienbetriebs; „Über uns" mit echtem Text statt Platzhalter-Testimonial; „Entwurf"-Banner, „im Aufbau"-Hinweis und „wir prüfen noch"-Vermerke von der Website entfernt und als interne Prüfliste festgehalten; Impressum auf § 5 DDG, EU-ODR-Absatz entfernt; Datenschutzerklärung ausgebaut; Bildnachweis mit klickbaren CC-Lizenz-Links.
- Professionalisierungs-Pass nach Wettbewerbsvergleich (11.07.2026, Details im Tab „Thielemann Vergleich und Analyse"): alle „Artur Zaiser"-Nennungen aus den Website-Texten entfernt (Meta-Tags, Hero, „Über uns", Bild-Alt-Texte) — durchgehende „Wir"-Sprache wie im Branchenstandard, Name nur noch im Impressum und als Datenschutz-Verantwortlicher; Bildnachweis vom Startseiten-Footer in einen eigenen Impressum-Abschnitt verlegt (branchenübliche Praxis, CC-BY-SA-konform); interne Hinweis-Kommentare (TODO-Verweis, Spamschutz-Begründung) aus dem öffentlichen HTML-Quelltext entfernt.
- WhatsApp-Link-Vorschau am 13.07.2026 mit frischer Test-URL erneut geprüft — funktioniert (Discord bereits zuvor bestätigt).
- Beantwortet (18.07.2026, per WhatsApp): Seit 2008 Klavierbauer, seit 2010 selbstständig — als Trust-Zeile in „Über uns" eingebaut.
- Beantwortet (18.07.2026, per WhatsApp): Keine festen Erreichbarkeitszeiten, aber „wenn das wichtig wäre, dann von 9 bis 19 Uhr, denke ich" — bewusst unverbindlich als „Meist zwischen 9 und 19 Uhr" im Kontaktbereich eingebaut, kein Schema.org `openingHours` (das wäre eine zu feste Zusage für eine von Artur selbst unsicher formulierte Angabe).
- Fragebogen aufgelöst (19.07.2026): Die separate Checkbox-Fragebogen-Ansicht (Google-Doc-Tab „Fragen an Artur") wurde entfernt — alle Antworten sind jetzt direkt in den jeweiligen Abschnitten oben vermerkt, mit Dringlichkeits-Symbol markiert (siehe Legende oben) und in die Kurzübersicht (Abschnitt 0) aufgenommen, falls noch offen.
