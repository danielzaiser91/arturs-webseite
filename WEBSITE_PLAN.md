# Piano Zaiser — New Website Plan

## Goal
A modern, trustworthy, lead-generating website for a professional piano specialist. Primary conversion action: **get visitors to call or fill out a contact form** (tuning appointment, sales inquiry, sell-your-piano inquiry, repair/restoration inquiry). Complete rebuild — no styling, copy, or images carried over from the old repo.

## Positioning against local competition
Most small piano-service sites in Germany look exactly like the old repo: a generic template, a stock photo, a wall of unstructured text, no clear call-to-action. We win by doing the opposite:
1. **Services are the hero**, not an afterthought — visible and clickable within the first screen.
2. **One obvious next step everywhere** — a persistent "Termin/Anfrage" CTA, not just a buried contact page.
3. **Real trust signals** — Artur's own photo, real instrument photos, years of experience, brand partnerships, service area map — instead of stock imagery.
4. **Fast, mobile-first, legally correct** — most searches for "Klavierstimmung Neuwied" happen on a phone; the old site wasn't even responsive.

## Sitemap
- **Startseite (Home)** — hero + service overview + trust signals + CTA + service-area map/list
- **Leistungen (Services)** — one detailed section per service, each with its own CTA:
  - Klavierstimmung & Wartung (tuning & maintenance)
  - Verkauf (neu & gebraucht) — Klaviere, Flügel, Digitalpianos
  - Ankauf (we buy your piano)
  - Restaurierung & Reparatur
- **Über Artur (About)** — personal story, credentials/training, photo, why-trust-me
- **Kontakt** — working contact form + phone/email/address + map + opening hours
- **Impressum / Datenschutz** — real, legally complete text (required in Germany — currently missing entirely)

Could be built as a single long-scroll page with anchored sections (home/services/about/contact) for a small business like this, or as separate pages if content grows. Recommend **single-page with anchors** for v1 — simpler, faster, better for a focused local-lead-gen site — with Impressum/Datenschutz kept as separate pages (legally standard practice, keeps them out of the main flow).

## Design direction
- Warm, premium, "handcraft meets modern" feel — dark wood tones / deep charcoal + warm gold or brass accent (echoes piano lacquer & brass hardware) on a clean white/light base. Avoid the cliché all-black "luxury site" look — this should feel approachable, not intimidating.
- Real photography over stock: Artur at work, tools, an actual instrument he's serviced. If unavailable yet, use higher-quality piano macro shots than the old repo's, until real photos exist.
- Generous whitespace, large legible type, clear visual hierarchy — the opposite of the old cramped template.
- Sticky header with a visible phone number / CTA button at all times on both desktop and mobile.
- Fully responsive (the old site had zero breakpoints).

## Content/SEO strategy (this is how it actually beats competitors, not just looks)
- Local SEO: page title/meta + on-page content explicitly naming Neuwied + every town in the service radius (Bad Honnef, Siegen, Koblenz, Winningen, Ahrweiler), structured as real sentences, not a tag dump.
- Schema.org `LocalBusiness` structured data → eligible for Google Maps/local pack results.
- Separate, keyword-clear service sections so Google can match specific searches ("Klavier verkaufen Neuwied", "Flügel stimmen lassen") to specific content blocks.
- Fast load (static site, optimized images, no heavy frameworks needed) — page speed is a ranking + conversion factor.
- Google Business Profile alignment (same name/address/phone everywhere) — outside the repo, but worth flagging to Artur.

## Tech approach
Keep it simple and cheap to host — this doesn't need a framework:
- Static HTML/CSS + a small amount of vanilla JS (mobile nav toggle, form handling), OR a lightweight static-site setup if we want reusable components (e.g. Astro/11ty) without SSR overhead.
- Contact form: needs a real backend — since there's no server here, use a form service (e.g. Formspree/Web3Forms) or a tiny serverless function, instead of the old broken PHP mailer.
- Hosting: GitHub Pages / Netlify / Vercel static hosting — free, fast, matches the existing GitHub-based workflow.
- Image optimization (WebP, responsive `srcset`) from day one.

## Phased rollout
1. **Content gathering** — get real facts from Artur (see open questions in [ARTUR_WEBSITE_REVIEW.md](ARTUR_WEBSITE_REVIEW.md)): phone, email, address, hours, brand partnerships, real photos.
2. **Design + build v1** — single-page site with the 4 services prominent, working contact form, real Impressum/Datenschutz text, mobile-first.
3. **Local SEO pass** — structured data, meta content, Google Business Profile alignment.
4. **Launch + measure** — track form submissions/calls, iterate on copy/CTAs based on real inquiries.

## Preview
A first-draft visual concept (desktop, single-page hero + services layout) has been shared separately as an interactive preview — not final copy, meant to validate direction (tone, layout, color) before we invest in full content and real photography.
