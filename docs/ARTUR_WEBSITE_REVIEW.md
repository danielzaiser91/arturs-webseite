# Artur / Piano Zaiser — Repo Review & Current State

## Source
Repo: [danielzaiser91/arturs-webseite](https://github.com/danielzaiser91/arturs-webseite)
2 commits total, both from **Feb 2, 2021** ("initial commit" + a tiny "test" tweak). No activity since. No README, no CMS, no build tooling — plain static HTML/CSS/JS.

## What's actually in the repo

| File | Content |
|---|---|
| [index.html](index.html) | Hero banner + one text block |
| [kontakt.html](kontakt.html) | A contact form (Anrede, Vorname, Nachname, E-Mail, Nachricht) |
| [impressum.html](impressum.html) | Empty `<main>` — legally required page, never filled in |
| [datenschutz.html](datenschutz.html) | Empty `<main>` — same, never filled in |
| [styles.css](styles.css) | ~65 lines, very basic flex layout, no responsive breakpoints |
| [main.js](main.js) | Empty file |
| [kontakt.js](kontakt.js) | 4 lines; `chkForm()` just logs and **returns `false` unconditionally** — the form cannot actually submit |
| `images/logo.png` | **Logo reads "Piano Thilemann"** — a real, unrelated piano dealer in Neuwied |
| `images/piano.jpg`, `images/a1.jpg` | Generic stock photos (grand piano interior, a piano-painted Fiat 500) |

## ⚠️ Important red flag

The homepage headline says **"Piano Zaiser"**, but directly underneath, the body copy ("Tastenkompetenz seit 1924 in der Familie... Haus Thilemann... Klavierbaumeister... Name Piano Thilemann...") and the logo are **copy-pasted from the real company Piano Thilemann** (an actual, unrelated Neuwied piano dealer). This looks like old placeholder/scaffolding text that was never replaced — it was **never real content about Artur's business**, and must not carry over to a new site (factually wrong, and copying a real competitor's marketing copy is a genuine liability, not just bad style).

## What we can reliably infer

- **Business name:** Piano Zaiser
- **Location:** Neuwied (Rhineland-Palatinate, Germany)
- **Service region (from the old subheadline):** Neuwied, Bad Honnef, Siegen, Koblenz, Winningen, Ahrweiler — i.e. a multi-city radius, not just one town
- **Contact:** meant to work via a contact form — currently non-functional (JS always returns `false`; form posts to a PHP endpoint `files/mail_p001_8_00.php` that doesn't exist in this repo)
- **Legal pages exist as stubs** (Impressum, Datenschutz) but contain no actual legal text — currently non-compliant if this ever went live as-is

## Services (confirmed by you, not by the repo)

- Piano tuning & maintenance
- Sales — new **and** used pianos, grands, digital pianos
- Restoration & repair
- **Buying** pianos (Ankauf) from private sellers
- *Not* offered: piano lessons

## Bottom line

There is effectively **no reusable content, branding, or design** in this repo. It's an abandoned 2021 scaffold with a broken form, empty legal pages, and a competitor's copy pasted in by mistake. The rebuild is a clean slate — the only things worth carrying forward are the business name, the general service area, and the four-page structure (home / contact / legal x2) as a baseline, plus the service list you confirmed above.

## Still open / worth confirming with Artur before final copy goes live

- Phone number, email, street address, opening hours (needed for Impressum + contact CTA + local SEO)
- Exact service radius / list of towns to target for local SEO
- Any brand names he carries (e.g. Yamaha, Kawai, Steinway dealer/partner status) — big trust signal if true
- Photos of Artur, his workshop, and real instruments (stock photos won't build trust for a personal/professional service brand)
- Pricing approach (flat tuning fee? "on request"?) and typical response time for leads
