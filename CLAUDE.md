# Projektregeln — Westerwald-Pianoservice Website

Gilt für jeden Agent, der in diesem Repo arbeitet.

## Ordnerstruktur

- **Root** (`index.html`, `impressum.html`, `datenschutz.html`, `agb.html`, `robots.txt`,
  `.htaccess`, `assets/`) — **client-facing**, das ist die eigentliche Website. Alles hier landet
  auf GitHub Pages **und** FTP.
- **`docs/`** — interne Projektdokumentation (`TODO.md`, `WEBSITE_PLAN.md`,
  `ARTUR_WEBSITE_REVIEW.md`, `webseite-offene-baustellen.md`, `email-uebersicht-fuer-artur.md`).
  Nicht client-facing, **nie auf FTP hochladen**.
- **`CLAUDE.md`** (dieses File) bleibt bewusst im Root, nicht in `docs/` — Tooling-Konvention, wird
  automatisch geladen. Ebenfalls nie auf FTP.
- **`archiv-alte-webseite-2014/`** — Altbestand der alten Website, nicht mehr verlinkt/genutzt.
  Bleibt aus Referenzgründen im Repo, gehört aber ebenfalls nicht auf FTP.
- **Gitignored** (nie im Git-Repo, nie auf FTP): `.claude/`, `secrets/`, `email-backup/`,
  `.sync-tools/`.

## Regel: nur client-facing Dateien auf FTP

Das lima-city-FTP-Webspace ist die **öffentliche Produktivseite** — dort darf ausschließlich landen,
was tatsächlich Teil der ausgelieferten Website ist (Root-Dateien + `assets/`). Alles andere
(Projektdocs, Sync-Tools, Secrets, Archive, `.git`-Metadaten) bleibt lokal/in GitHub, **niemals**
per FTP hochladen. Vor jedem FTP-Deploy kurz prüfen, dass nur die client-facing Dateien im
Upload-Set sind — nicht versehentlich den ganzen Ordner synchronisieren.

## Offene-Baustellen-Datei immer aktuell halten

`docs/webseite-offene-baustellen.md` ist die zentrale, kategorisierte Übersicht über alle offenen
Punkte im Projekt (Rechtliches, Content, SEO, Sicherheit, Deployment-Status, E-Mail). **Nach jeder
Entscheidung oder Code-Änderung** in diesem Repo diese Datei aktualisieren:

- Erledigte Punkte in den "Bereits erledigt"-Abschnitt verschieben (nicht einfach löschen).
- Neu gefundene Probleme/offene Fragen in die passende Kategorie einsortieren.
- Bei größeren Audits (wie der Erstversion) ruhig auch den "Stand: DD.MM.YYYY"-Hinweis oben
  aktualisieren.

Diese Datei wird 1:1 mit einem Google Doc gesynct und an Artur weitergegeben — sie muss also für
sich verständlich und aktuell sein, nicht nur im Kontext des Chats.

### Google-Doc-Sync — wie es funktioniert

Google Doc: https://docs.google.com/document/d/1279KnXk6Lo_Cg64SrvxRv_ZHT8umytUOPUhtFdM6ikQ/edit
mit drei Tabs: **"Offene Baustellen"** (Spiegel von `docs/webseite-offene-baustellen.md`),
**"Übersicht Emails"** (Spiegel von `docs/email-uebersicht-fuer-artur.md`; hieß früher
"Referenzen", von Daniel umbenannt) und **"Thielemann Vergleich und Analyse"** (Spiegel von
`docs/vergleich-fuer-artur.md` — der laienverständlichen Fassung von
`docs/vergleich-piano-thilemann.md`; Schreibweise "Thielemann" mit ie stammt vom User, beim
Tab-Lookup exakt so verwenden).

Es gab bis 19.07.2026 einen vierten Tab **"Fragen an Artur"** (Checkbox-Fragebogen für offene
Entscheidungen, gebaut von `push_fragebogen.py`) — der ist entfernt. Grund: der angekreuzt/nicht-
angekreuzt-Zustand der Checkbox-Pills ließ sich über die Docs API nicht auslesen (`paragraph.bullet`
hat laut API-Schema nur `listId`/`nestingLevel`/`textStyle`, kein "checked"-Feld, und auch kein
Strikethrough-Signal wie bei Googles nativer Checklist-Funktion) — Artur musste seine Antworten
daher händisch beschreiben. Alle 10 Fragebogen-Fragen sind beantwortet und jetzt direkt als normale
Bullet-Punkte (mit Dringlichkeits-Emoji) in die passenden Abschnitte von
`webseite-offene-baustellen.md` integriert; `push_fragebogen.py` wurde gelöscht. Neue offene Fragen
an Artur künftig direkt als Freitext-Bullet in der passenden Kategorie stellen, nicht mehr über ein
separates Checkbox-Format — das ist zuverlässig auslesbar.

Sync-Tools liegen in `.sync-tools/` (nicht im Git-Repo, siehe `.gitignore` — enthält u. a.
`token.json` mit dem OAuth-Refresh-Token):

- **`push_baustellen.py`** — schreibt `docs/webseite-offene-baustellen.md` in den Doc-Tab "Offene
  Baustellen". **Nach jeder Aktualisierung der .md-Datei ausführen**, damit das Doc synchron
  bleibt (`cd ".sync-tools" && python push_baustellen.py`). Enthält außerdem: farbige
  Kategorie-Überschriften, klickbares Inhaltsverzeichnis, und die Keep-Together-Regel (siehe unten).
- **`push_referenzen.py`** — schreibt `docs/email-uebersicht-fuer-artur.md` in den Tab
  "Übersicht Emails" (Markdown-Tabellen werden dabei zu einzeiligen Bullet-Listen konvertiert, da
  native Docs-Tabellen bei dieser Menge an Zeilen nicht praktikabel sind).
- **`push_vergleich.py`** — schreibt `docs/vergleich-fuer-artur.md` (Laienfassung des
  Thilemann-Vergleichs) in den Tab "Thielemann Vergleich und Analyse". Die technische Analyse
  bleibt in `docs/vergleich-piano-thilemann.md`; bei inhaltlichen Änderungen beide Fassungen
  pflegen und danach dieses Script ausführen.
- **`check_and_pull.py`** — vergleicht `modifiedTime` des Docs mit dem letzten bekannten Stand in
  `sync_state.json`. Falls jemand (Artur/Daniel) direkt im Doc editiert hat, zieht es den Inhalt
  automatisch zurück in `docs/webseite-offene-baustellen.md`.
- **Wichtig:** jedes `push_*.py`-Script ruft am Ende `record_own_push()` auf (aus
  `gdocs_common.py`) — das aktualisiert `sync_state.json` mit dem neuen `modifiedTime`, damit der
  *eigene* Push nicht fälschlich als "Artur hat editiert" erkannt und die lokale Datei mit einer
  verlustbehafteten Rückkonvertierung überschrieben wird, falls `check_and_pull.py` danach läuft.
  Bei neuen Push-Scripts diesen Aufruf nicht vergessen.
- Der automatische Scheduled Task (`baustellen-doc-sync-check`) wurde von Daniel am 19.07.2026
  deaktiviert und gelöscht (nicht mehr gebraucht). `check_and_pull.py` existiert weiterhin und kann
  bei Bedarf **manuell** ausgeführt werden, um Doc-Änderungen von Artur/Daniel zurückzuziehen — es
  läuft aber nicht mehr automatisch im Hintergrund.
- Google Cloud Projekt "Baustellen-Sync", Credentials/Doc-ID in `my_secrets.md` unter "Google Cloud
  Baustellen-Sync" dokumentiert.
- Bekannte Einschränkung: Markdown ↔ Google Docs ist keine perfekte 1:1-Konvertierung (Tabellen,
  verschachtelte Listen etc. können bei größeren Strukturänderungen Fidelity verlieren) — für die
  aktuelle Struktur der Dateien (Überschriften, Bullet-Listen, Absätze) funktioniert es sauber.

### Regel: Abschnitte dürfen nicht über einen Seitenumbruch auseinanderreißen

Im "Offene Baustellen"-Tab gilt: eine logische Einheit (eine H2-Sektion inkl. all ihrer Bullets)
bekommt `keepLinesTogether` auf jedem Absatz und `keepWithNext` auf allen Absätzen außer dem
letzten im Block — verhindert, dass Google Docs die Einheit mittendrin über eine Seite verteilt.
Bei künftigen Erweiterungen von `push_baustellen.py` (neue Abschnitte) dieses Muster beibehalten,
siehe `block_ranges`-Logik dort. Falls ein expliziter Seitenumbruch nötig ist (`insertPageBreak`),
diesen immer als **eigenen, abgeschlossenen Absatz** einfügen (Page-Break-Request + eigenes `\n`)
— landet er im selben Absatz wie nachfolgender Text, rendert der leere Rest des Absatzes noch auf
der vorherigen Seite.

## Deploy-Regel

### Zwei Zielsysteme, beide müssen synchron sein

1. **GitHub Repo** (`danielzaiser91/arturs-webseite`, origin) → **GitHub Pages**, live unter
   `https://danielzaiser91.github.io/arturs-webseite/`
2. **lima-city FTP-Webspace** (`ace2001.lima-ftp.de`, FTPS Port 21) → **Produktivseite**, live unter
   `https://westerwald-pianoservice.de`. Zugangsdaten: `C:\code\ai\ai helper files\my_secrets.md`,
   Abschnitt "Arturs Website (Westerwald-Pianoservice) — FTP Filehost lima-city.de".

**Standardfall:** Nach jeder fertigen, funktionierenden Änderung an client-facing Dateien →
`git push` **und** FTP-Upload (nur der client-facing Dateien, siehe "Regel: nur client-facing
Dateien auf FTP" oben). Beide Systeme sollen denselben Code-Stand zeigen — nicht auseinanderdriften
lassen. `docs/`-Änderungen brauchen keinen FTP-Upload, nur `git push`.

### Ausnahme beim Testen/Experimentieren

- Erstmal nur lokal arbeiten (kein Push, kein FTP-Upload).
- Falls ein Zwischenstand auf GitHub gebraucht wird (Review, GitHub-Pages-Vorschau) → nur GitHub
  pushen, FTP noch nicht anfassen.
- Erst **nachdem** der Test bestätigt funktioniert wie erwartet → FTP-Upload nachziehen, damit beide
  Systeme wieder gleichauf sind.

### Wenn ein Grund gegen Sync auf beiden Systemen spricht

Nicht eigenmächtig entscheiden, etwas nur auf einem System zu lassen. Stattdessen dem User die
Details vorlegen (was, warum, welche Konsequenz) und ihn entscheiden lassen.

## Wichtige Einschränkung: PHP läuft nur auf lima-city, nicht auf GitHub Pages

GitHub Pages ist **reines statisches Hosting** — kein Server-Backend, keine PHP-Ausführung. Das
Kontaktformular (`assets/php/kontakt.php`) nutzt PHP `mail()`:

- läuft nur auf einem PHP-fähigen Webserver (lima-city)
- ist lima-city-spezifisch konfiguriert (Mailserver-Anbindung an `mail.lima-city.de`)
- wird auf GitHub Pages **nie** funktionieren, unabhängig vom Code — GitHub Pages führt die Datei
  einfach nicht aus (kein Fehler, sie liegt nur ungenutzt im Repo)

**Konsequenz:**
- `kontakt.php` bleibt im Repo, das ist kein Problem.
- Kontaktformular-Funktionalität hat auf GitHub Pages **niedrigere Priorität** als auf lima-city
  (Prod) — GitHub Pages ist hier primär Code-Spiegel/statische Vorschau, nicht die funktionale
  Live-Version.
- Es gibt im Code bereits eine auskommentierte Alternative (Web3Forms, Drittanbieter, kein PHP
  nötig) in `assets/js/main.js` — nur bei explizitem Wunsch des Users aktivieren/ausbauen, kein
  Aufwand investieren, PHP-Funktionalität "für GitHub" nachzubauen ohne Auftrag.
