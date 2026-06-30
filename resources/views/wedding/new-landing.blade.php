<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Invitely — Luxury Digital Invitations</title>
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&family=Jost:wght@200;300;400;500&family=Great+Vibes&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

<style>
/* ── CSS Variables ── */
:root {
  --white:        #ffffff;
  --ivory:        #fdfaf4;
  --cream:        #f7f2e8;
  --parchment:    #ede8da;
  --gold-pale:    #f5e9c8;
  --gold-light:   #d4af6a;
  --gold:         #b8922a;
  --gold-dark:    #8a6a18;
  --gold-deep:    #5c4510;
  --champagne:    #f2e0a0;
  --warm-gray:    #9b9490;
  --text-dark:    #2a2318;
  --text-mid:     #5a5044;
  --text-light:   #9b9490;

  --ff-serif:   'Cormorant Garamond', Georgia, serif;
  --ff-script:  'Great Vibes', cursive;
  --ff-sans:    'Jost', sans-serif;

  --ease-gold: cubic-bezier(0.22, 0.68, 0, 1.2);
  --ease-silk: cubic-bezier(0.4, 0, 0.2, 1);
}

/* ── Reset ── */
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; max-width: 100vw; overflow-x: hidden; }
body {
  font-family: var(--ff-sans);
  background: var(--ivory);
  color: var(--text-dark);
  max-width: 100vw;
  overflow-x: hidden;
}
img { display: block; max-width: 100%; }
a { text-decoration: none; color: inherit; }
button { cursor: pointer; border: none; background: none; font-family: inherit; }

/* ── Scrollbar ── */
::-webkit-scrollbar { width: 6px; }
::-webkit-scrollbar-track { background: var(--cream); }
::-webkit-scrollbar-thumb { background: var(--gold-light); border-radius: 3px; }

/* ── Gold divider ── */
.gold-line {
  display: flex; align-items: center; gap: 16px;
  margin: 0 auto;
}
.gold-line span {
  flex: 1; height: 1px;
  background: linear-gradient(90deg, transparent, var(--gold-light), transparent);
}
.gold-line i { color: var(--gold-light); font-size: 1rem; font-style: normal; }

/* ── Section Labels ── */
.section-eyebrow {
  font-family: var(--ff-sans);
  font-size: 0.68rem;
  font-weight: 400;
  letter-spacing: 0.28em;
  text-transform: uppercase;
  color: var(--gold);
  display: block;
  margin-bottom: 14px;
}

/* ── Buttons ── */
.btn-primary {
  display: inline-flex; align-items: center; gap: 10px;
  padding: 14px 38px;
  background: linear-gradient(135deg, var(--gold-light) 0%, var(--gold) 60%, var(--gold-dark) 100%);
  color: var(--white);
  font-family: var(--ff-sans);
  font-size: 0.72rem;
  font-weight: 400;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  border-radius: 0;
  position: relative;
  overflow: hidden;
  transition: transform 0.3s var(--ease-silk), box-shadow 0.3s var(--ease-silk);
  box-shadow: 0 4px 28px rgba(184,146,42,0.28);
}
.btn-primary::before {
  content: '';
  position: absolute; inset: 0;
  background: linear-gradient(135deg, var(--gold) 0%, var(--gold-light) 100%);
  opacity: 0;
  transition: opacity 0.4s;
}
.btn-primary:hover { transform: translateY(-2px); box-shadow: 0 8px 40px rgba(184,146,42,0.4); }
.btn-primary:hover::before { opacity: 1; }
.btn-primary span { position: relative; z-index: 1; }

.btn-outline {
  display: inline-flex; align-items: center; gap: 10px;
  padding: 13px 36px;
  border: 1px solid var(--gold-light);
  color: var(--gold-dark);
  font-family: var(--ff-sans);
  font-size: 0.72rem;
  font-weight: 400;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  background: transparent;
  transition: all 0.3s var(--ease-silk);
}
.btn-outline:hover {
  background: var(--gold-pale);
  border-color: var(--gold);
  color: var(--gold-dark);
}

/* ═══════════════════════════════════════════
   HEADER / NAV
═══════════════════════════════════════════ */
header {
  position: fixed; top: 0; left: 0; right: 0; z-index: 1000;
  padding: 0 60px;
  height: 76px;
  display: flex; align-items: center; justify-content: space-between;
  background: rgba(253,250,244,0.85);
  backdrop-filter: blur(18px) saturate(1.4);
  border-bottom: 1px solid rgba(212,175,106,0.18);
  transition: box-shadow 0.3s;
}
header.scrolled { box-shadow: 0 2px 30px rgba(90,70,20,0.08); }

.nav-logo {
  display: flex; flex-direction: column; align-items: flex-start; line-height: 1;
}
.nav-logo-name {
  font-family: var(--ff-script);
  font-size: 2rem;
  color: var(--gold-dark);
  line-height: 1;
}
.nav-logo-tagline {
  font-family: var(--ff-sans);
  font-size: 0.55rem;
  letter-spacing: 0.25em;
  text-transform: uppercase;
  color: var(--warm-gray);
  margin-top: 2px;
}

nav ul {
  list-style: none;
  display: flex; gap: 42px;
}
nav ul li a {
  font-family: var(--ff-sans);
  font-size: 0.72rem;
  font-weight: 300;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  color: var(--text-mid);
  position: relative;
  transition: color 0.3s;
}
nav ul li a::after {
  content: '';
  position: absolute; bottom: -4px; left: 0; right: 0;
  height: 1px;
  background: var(--gold-light);
  transform: scaleX(0);
  transform-origin: left;
  transition: transform 0.3s var(--ease-silk);
}
nav ul li a:hover { color: var(--gold-dark); }
nav ul li a:hover::after { transform: scaleX(1); }

.nav-cta {
  display: flex; align-items: center; gap: 20px;
}
.nav-login {
  font-size: 0.72rem;
  letter-spacing: 0.15em;
  text-transform: uppercase;
  color: var(--text-mid);
  transition: color 0.3s;
}
.nav-login:hover { color: var(--gold); }

/* ═══════════════════════════════════════════
   HERO
═══════════════════════════════════════════ */
.hero {
  min-height: 100vh;
  display: grid;
  grid-template-columns: 1fr 1fr;
  position: relative;
  overflow: hidden;
  padding-top: 76px;
}

.hero-bg-ornament {
  position: absolute; inset: 0; pointer-events: none;
  overflow: hidden;
}
.hero-bg-ornament::before {
  content: '';
  position: absolute;
  top: -20%; right: -10%;
  width: 70vw; height: 120vh;
  background: radial-gradient(ellipse at 60% 40%, rgba(212,175,106,0.12) 0%, transparent 65%),
              radial-gradient(ellipse at 30% 80%, rgba(245,233,200,0.25) 0%, transparent 55%);
  pointer-events: none;
}

/* Decorative SVG corner motifs */
.hero-bg-ornament::after {
  content: '';
  position: absolute;
  top: 76px; right: 0;
  width: 50%;
  height: calc(100vh - 76px);
  background: var(--cream);
  clip-path: polygon(8% 0, 100% 0, 100% 100%, 0% 100%);
  z-index: 0;
}

.hero-left {
  position: relative; z-index: 2;
  display: flex; flex-direction: column; justify-content: center;
  padding: 80px 70px 80px 80px;
}

.hero-left-top {
  display: flex; align-items: center; gap: 12px;
  margin-bottom: 32px;
}
.hero-badge {
  display: inline-flex; align-items: center; gap: 8px;
  padding: 6px 16px;
  border: 1px solid rgba(212,175,106,0.4);
  background: rgba(245,233,200,0.3);
  font-size: 0.62rem;
  letter-spacing: 0.22em;
  text-transform: uppercase;
  color: var(--gold-dark);
}
.hero-badge-dot {
  width: 5px; height: 5px;
  background: var(--gold-light);
  border-radius: 50%;
  animation: pulse-gold 2s ease-in-out infinite;
}
@keyframes pulse-gold {
  0%, 100% { opacity: 1; transform: scale(1); }
  50% { opacity: 0.5; transform: scale(1.4); }
}

.hero-script {
  font-family: var(--ff-script);
  font-size: 3.8rem;
  color: var(--gold-light);
  line-height: 1;
  margin-bottom: -10px;
  animation: fadeUp 0.9s var(--ease-silk) 0.1s both;
}
.hero-heading {
  font-family: var(--ff-serif);
  font-size: clamp(2.8rem, 5vw, 4.4rem);
  font-weight: 300;
  line-height: 1.08;
  color: var(--text-dark);
  animation: fadeUp 0.9s var(--ease-silk) 0.2s both;
}
.hero-heading em {
  font-style: italic;
  font-weight: 400;
  color: var(--gold-dark);
}
.hero-sub {
  margin-top: 24px;
  font-size: 0.88rem;
  font-weight: 300;
  line-height: 1.85;
  color: var(--text-mid);
  max-width: 420px;
  animation: fadeUp 0.9s var(--ease-silk) 0.35s both;
}
.hero-actions {
  margin-top: 42px;
  display: flex; align-items: center; gap: 22px;
  animation: fadeUp 0.9s var(--ease-silk) 0.45s both;
}
.hero-watch {
  display: flex; align-items: center; gap: 10px;
  font-size: 0.72rem;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  color: var(--text-mid);
  transition: color 0.3s;
  cursor: pointer;
}
.hero-watch:hover { color: var(--gold); }
.hero-watch-icon {
  width: 40px; height: 40px;
  border-radius: 50%;
  border: 1px solid var(--gold-light);
  display: flex; align-items: center; justify-content: center;
  color: var(--gold);
  font-size: 0.8rem;
  transition: background 0.3s, border-color 0.3s;
}
.hero-watch:hover .hero-watch-icon { background: var(--gold-pale); border-color: var(--gold); }

.hero-stats {
  margin-top: 60px;
  display: flex; gap: 48px;
  animation: fadeUp 0.9s var(--ease-silk) 0.55s both;
}
.hero-stat-num {
  font-family: var(--ff-serif);
  font-size: 2.2rem;
  font-weight: 300;
  color: var(--gold-dark);
  line-height: 1;
}
.hero-stat-label {
  font-size: 0.65rem;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  color: var(--text-light);
  margin-top: 4px;
}

.hero-right {
  position: relative; z-index: 2;
  display: flex; align-items: center; justify-content: center;
  padding: 60px 60px 60px 40px;
}

.hero-card-stack {
  position: relative;
  width: 340px; height: 460px;
}
.invite-card {
  position: absolute;
  width: 280px; height: 380px;
  border-radius: 2px;
  background: var(--white);
  box-shadow: 0 20px 60px rgba(90,70,20,0.12), 0 4px 16px rgba(90,70,20,0.06);
  overflow: hidden;
  display: flex; flex-direction: column; align-items: center; justify-content: center;
  padding: 40px 30px;
  text-align: center;
}
.invite-card-1 {
  right: 0; bottom: 0;
  transform: rotate(6deg);
  background: linear-gradient(145deg, #fdf8f0 0%, #f5ead6 100%);
  border: 1px solid rgba(212,175,106,0.3);
  animation: floatCard1 6s ease-in-out infinite;
}
.invite-card-2 {
  left: 0; top: 0;
  transform: rotate(-4deg);
  background: linear-gradient(145deg, var(--white), var(--cream));
  border: 1px solid rgba(212,175,106,0.2);
  animation: floatCard2 7s ease-in-out infinite;
}
.invite-card-main {
  left: 50%; top: 50%;
  transform: translate(-50%, -50%);
  width: 290px; height: 400px;
  background: linear-gradient(160deg, #fffdf8 0%, #fdf5e0 50%, #f5e8c0 100%);
  border: 1px solid rgba(212,175,106,0.5);
  box-shadow: 0 30px 80px rgba(90,70,20,0.18), 0 6px 20px rgba(90,70,20,0.08);
  animation: floatCardMain 8s ease-in-out infinite;
  z-index: 3;
}
@keyframes floatCard1 {
  0%, 100% { transform: rotate(6deg) translateY(0); }
  50% { transform: rotate(6deg) translateY(-8px); }
}
@keyframes floatCard2 {
  0%, 100% { transform: rotate(-4deg) translateY(0); }
  50% { transform: rotate(-4deg) translateY(6px); }
}
@keyframes floatCardMain {
  0%, 100% { transform: translate(-50%, -50%) translateY(0); }
  50% { transform: translate(-50%, -50%) translateY(-10px); }
}

.invite-card-inner { text-align: center; }
.card-ornament {
  font-size: 1.6rem; color: var(--gold-light);
  margin-bottom: 10px;
}
.card-together { font-family: var(--ff-script); font-size: 1rem; color: var(--gold); margin-bottom: 6px; }
.card-names { font-family: var(--ff-serif); font-size: 1.6rem; font-weight: 400; color: var(--text-dark); line-height: 1.2; }
.card-amp { font-family: var(--ff-script); font-size: 2.4rem; color: var(--gold-light); line-height: 1; }
.card-date-line {
  width: 60px; height: 1px;
  background: linear-gradient(90deg, transparent, var(--gold-light), transparent);
  margin: 12px auto;
}
.card-date { font-size: 0.65rem; letter-spacing: 0.25em; text-transform: uppercase; color: var(--text-mid); }
.card-venue { font-family: var(--ff-serif); font-style: italic; font-size: 0.82rem; color: var(--warm-gray); margin-top: 6px; }

/* Floating petals */
.petal {
  position: absolute;
  width: 8px; height: 12px;
  background: linear-gradient(135deg, rgba(212,175,106,0.4), rgba(245,233,200,0.6));
  border-radius: 50% 0 50% 0;
  pointer-events: none;
  animation: petalFall linear infinite;
}
@keyframes petalFall {
  0% { transform: translateY(-20px) rotate(0deg); opacity: 0; }
  10% { opacity: 1; }
  90% { opacity: 0.5; }
  100% { transform: translateY(110vh) rotate(720deg); opacity: 0; }
}

@keyframes fadeUp {
  from { opacity: 0; transform: translateY(24px); }
  to { opacity: 1; transform: translateY(0); }
}

/* ═══════════════════════════════════════════
   TRUSTED BY
═══════════════════════════════════════════ */
.trust-bar {
  background: var(--cream);
  border-top: 1px solid rgba(212,175,106,0.18);
  border-bottom: 1px solid rgba(212,175,106,0.18);
  padding: 28px 80px;
  display: flex; align-items: center; justify-content: space-between;
  gap: 40px;
}
.trust-label {
  font-size: 0.63rem;
  letter-spacing: 0.22em;
  text-transform: uppercase;
  color: var(--text-light);
  white-space: nowrap;
}
.trust-logos {
  display: flex; align-items: center; gap: 48px; flex: 1;
  justify-content: center;
}
.trust-logo {
  font-family: var(--ff-serif);
  font-size: 1rem;
  font-weight: 400;
  color: var(--parchment);
  letter-spacing: 0.1em;
  opacity: 0.55;
  filter: sepia(20%);
}
.trust-logo b { color: var(--warm-gray); font-weight: 500; }

/* ═══════════════════════════════════════════
   HOW IT WORKS
═══════════════════════════════════════════ */
.how-section {
  padding: 120px 80px;
  background: var(--ivory);
  position: relative;
}
.how-section::before {
  content: 'How';
  position: absolute;
  top: 40px; left: 80px;
  font-family: var(--ff-serif);
  font-size: 16rem;
  font-weight: 300;
  color: rgba(212,175,106,0.05);
  line-height: 1;
  pointer-events: none;
  user-select: none;
}
.section-header { text-align: center; margin-bottom: 72px; }
.section-title {
  font-family: var(--ff-serif);
  font-size: clamp(2.2rem, 4vw, 3.2rem);
  font-weight: 300;
  color: var(--text-dark);
  line-height: 1.15;
}
.section-title em { font-style: italic; color: var(--gold-dark); }
.section-desc {
  margin-top: 16px;
  font-size: 0.88rem;
  font-weight: 300;
  line-height: 1.8;
  color: var(--text-mid);
  max-width: 540px;
  margin-left: auto; margin-right: auto;
}

.steps-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 0;
  position: relative;
}
.steps-grid::before {
  content: '';
  position: absolute;
  top: 44px; left: calc(12.5%);
  right: calc(12.5%);
  height: 1px;
  background: linear-gradient(90deg, transparent, var(--gold-light) 20%, var(--gold-light) 80%, transparent);
}
.step {
  padding: 0 32px;
  text-align: center;
  position: relative;
}
.step-num-wrap {
  width: 88px; height: 88px;
  margin: 0 auto 28px;
  position: relative;
  display: flex; align-items: center; justify-content: center;
}
.step-num-ring {
  position: absolute; inset: 0;
  border-radius: 50%;
  border: 1px solid rgba(212,175,106,0.4);
  background: var(--white);
  box-shadow: 0 4px 20px rgba(212,175,106,0.12);
  transition: box-shadow 0.3s, border-color 0.3s;
}
.step:hover .step-num-ring {
  border-color: var(--gold-light);
  box-shadow: 0 8px 32px rgba(212,175,106,0.25);
}
.step-icon {
  font-size: 1.6rem;
  position: relative; z-index: 1;
}
.step-label {
  font-size: 0.6rem;
  letter-spacing: 0.25em;
  text-transform: uppercase;
  color: var(--gold);
  margin-bottom: 10px;
}
.step-title {
  font-family: var(--ff-serif);
  font-size: 1.3rem;
  font-weight: 400;
  color: var(--text-dark);
  margin-bottom: 12px;
}
.step-desc {
  font-size: 0.82rem;
  font-weight: 300;
  line-height: 1.8;
  color: var(--text-mid);
}

/* ═══════════════════════════════════════════
   EVENT TYPES
═══════════════════════════════════════════ */
.events-section {
  padding: 120px 80px;
  background: var(--cream);
  position: relative;
  overflow: hidden;
}
.events-section::after {
  content: '';
  position: absolute;
  bottom: -40%; right: -10%;
  width: 60vw; height: 60vw;
  background: radial-gradient(circle, rgba(245,233,200,0.5) 0%, transparent 60%);
  pointer-events: none;
}
.events-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
  margin-top: 60px;
}
.event-card {
  background: var(--white);
  border: 1px solid rgba(212,175,106,0.2);
  padding: 44px 36px;
  position: relative;
  overflow: hidden;
  cursor: pointer;
  transition: transform 0.4s var(--ease-silk), box-shadow 0.4s var(--ease-silk);
  group: true;
}
.event-card::before {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 3px;
  background: linear-gradient(90deg, var(--gold-light), var(--gold));
  transform: scaleX(0);
  transform-origin: left;
  transition: transform 0.4s var(--ease-silk);
}
.event-card:hover { transform: translateY(-6px); box-shadow: 0 20px 60px rgba(90,70,20,0.1); }
.event-card:hover::before { transform: scaleX(1); }

.event-card-large {
  grid-column: span 2;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 0;
  padding: 0;
  overflow: hidden;
}
.event-card-large .event-card-img {
  background: linear-gradient(135deg, #f5e9c8 0%, #d4af6a 100%);
  min-height: 300px;
  display: flex; align-items: center; justify-content: center;
  font-size: 5rem;
  position: relative;
  overflow: hidden;
}
.event-card-large .event-card-img::before {
  content: '';
  position: absolute; inset: 0;
  background: linear-gradient(135deg, rgba(255,255,255,0.3), transparent);
}
.event-card-large .event-card-content { padding: 44px 40px; display: flex; flex-direction: column; justify-content: center; }

.event-icon {
  font-size: 2.2rem;
  margin-bottom: 20px;
  display: block;
}
.event-tag {
  font-size: 0.6rem;
  letter-spacing: 0.25em;
  text-transform: uppercase;
  color: var(--gold);
  margin-bottom: 10px;
  display: block;
}
.event-name {
  font-family: var(--ff-serif);
  font-size: 1.6rem;
  font-weight: 400;
  color: var(--text-dark);
  margin-bottom: 12px;
}
.event-desc {
  font-size: 0.82rem;
  font-weight: 300;
  line-height: 1.8;
  color: var(--text-mid);
  margin-bottom: 20px;
}
.event-count {
  font-size: 0.68rem;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  color: var(--gold-light);
  display: flex; align-items: center; gap: 8px;
}
.event-count::before {
  content: '';
  width: 24px; height: 1px;
  background: var(--gold-light);
}

/* ═══════════════════════════════════════════
   TEMPLATE GALLERY
═══════════════════════════════════════════ */
.templates-section {
  padding: 120px 80px;
  background: var(--ivory);
}
.template-filters {
  display: flex; align-items: center; gap: 0;
  margin-top: 48px; margin-bottom: 52px;
  border-bottom: 1px solid rgba(212,175,106,0.2);
}
.filter-btn {
  padding: 10px 28px;
  font-size: 0.7rem;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  color: var(--text-light);
  border-bottom: 2px solid transparent;
  margin-bottom: -1px;
  transition: all 0.3s;
  background: none;
  cursor: pointer;
}
.filter-btn:hover { color: var(--gold-dark); }
.filter-btn.active {
  color: var(--gold-dark);
  border-bottom-color: var(--gold);
  font-weight: 500;
}

.templates-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 24px;
}
.template-card {
  cursor: pointer;
  group: true;
}
.template-preview {
  aspect-ratio: 3/4;
  position: relative;
  overflow: hidden;
  border: 1px solid rgba(212,175,106,0.18);
  transition: box-shadow 0.4s var(--ease-silk);
}
.template-card:hover .template-preview { box-shadow: 0 20px 50px rgba(90,70,20,0.14); }

/* Simulated template cards */
.tmpl-bg { width: 100%; height: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 24px; text-align: center; }
.tmpl-1 { background: linear-gradient(160deg, #fffdf8, #f5e8cc); }
.tmpl-2 { background: linear-gradient(160deg, #f8f4ee, #ede0c8); }
.tmpl-3 { background: linear-gradient(160deg, #fafaf8, #ece6d8); }
.tmpl-4 { background: linear-gradient(160deg, #fff8f0, #f0dfc0); }
.tmpl-5 { background: linear-gradient(160deg, #fdf5e8, #e8d4a8); }
.tmpl-6 { background: linear-gradient(160deg, #f8f2ec, #ddd0b8); }
.tmpl-7 { background: linear-gradient(160deg, #fffbf2, #f5e4b8); }
.tmpl-8 { background: linear-gradient(160deg, #f5f0e8, #dfd0b0); }

.tmpl-inner-ornament { color: rgba(184,146,42,0.5); font-size: 1.4rem; margin-bottom: 8px; }
.tmpl-inner-script { font-family: var(--ff-script); font-size: 1.2rem; color: var(--gold-dark); margin-bottom: 4px; }
.tmpl-inner-title { font-family: var(--ff-serif); font-size: 0.9rem; color: var(--text-dark); margin-bottom: 2px; }
.tmpl-inner-line { width: 30px; height: 1px; background: var(--gold-light); margin: 8px auto; }
.tmpl-inner-date { font-size: 0.55rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--text-light); }

.template-overlay {
  position: absolute; inset: 0;
  background: rgba(90,70,20,0.65);
  display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 12px;
  opacity: 0;
  transition: opacity 0.3s;
}
.template-card:hover .template-overlay { opacity: 1; }
.template-overlay .btn-outline { border-color: rgba(255,255,255,0.7); color: var(--white); font-size: 0.65rem; padding: 10px 24px; }
.template-overlay .btn-outline:hover { background: rgba(255,255,255,0.15); }

.template-info { padding: 16px 4px 0; }
.template-name {
  font-family: var(--ff-serif);
  font-size: 1rem;
  font-weight: 400;
  color: var(--text-dark);
  margin-bottom: 4px;
}
.template-meta {
  display: flex; align-items: center; justify-content: space-between;
}
.template-style { font-size: 0.65rem; letter-spacing: 0.15em; text-transform: uppercase; color: var(--warm-gray); }
.template-fav {
  font-size: 0.75rem;
  color: var(--gold-light);
  cursor: pointer;
}

.templates-cta { text-align: center; margin-top: 56px; }

/* ═══════════════════════════════════════════
   FEATURES
═══════════════════════════════════════════ */
.features-section {
  padding: 120px 80px;
  background: var(--cream);
}
.features-inner {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 80px;
  align-items: center;
}
.features-visual {
  position: relative;
}
.features-phone-mock {
  width: 260px;
  height: 520px;
  background: linear-gradient(160deg, #fffdf8, #f0e4c4);
  border: 1px solid rgba(212,175,106,0.4);
  border-radius: 32px;
  box-shadow: 0 40px 100px rgba(90,70,20,0.15), 0 8px 30px rgba(90,70,20,0.08);
  margin: 0 auto;
  display: flex; flex-direction: column; align-items: center; justify-content: center;
  padding: 30px 20px;
  text-align: center;
  animation: floatPhone 6s ease-in-out infinite;
  position: relative;
}
@keyframes floatPhone {
  0%, 100% { transform: translateY(0) rotate(-2deg); }
  50% { transform: translateY(-12px) rotate(-2deg); }
}
.phone-notch {
  position: absolute;
  top: 16px; left: 50%; transform: translateX(-50%);
  width: 80px; height: 10px;
  background: rgba(212,175,106,0.3);
  border-radius: 5px;
}
.phone-content { width: 100%; }
.phone-invite-preview {
  background: var(--white);
  border: 1px solid rgba(212,175,106,0.3);
  border-radius: 4px;
  padding: 20px 16px;
  margin-bottom: 12px;
  text-align: center;
}
.phone-ornament { font-size: 1rem; color: var(--gold-light); }
.phone-name { font-family: var(--ff-script); font-size: 1.6rem; color: var(--gold-dark); line-height: 1.1; }
.phone-date-line { width: 40px; height: 1px; background: var(--gold-light); margin: 8px auto; }
.phone-detail { font-size: 0.6rem; letter-spacing: 0.15em; text-transform: uppercase; color: var(--text-light); }
.phone-btn-mock {
  display: block; width: 100%;
  padding: 8px;
  background: linear-gradient(135deg, var(--gold-light), var(--gold));
  border-radius: 2px;
  font-size: 0.58rem;
  letter-spacing: 0.15em;
  text-transform: uppercase;
  color: var(--white);
  text-align: center;
  margin-top: 10px;
}
.phone-rsvp-mock {
  background: var(--white);
  border: 1px solid rgba(212,175,106,0.2);
  border-radius: 4px;
  padding: 12px 14px;
  text-align: left;
}
.phone-rsvp-title { font-size: 0.58rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--gold); margin-bottom: 8px; }
.phone-rsvp-row { display: flex; align-items: center; gap: 8px; margin-bottom: 4px; }
.phone-rsvp-avatar { width: 18px; height: 18px; border-radius: 50%; background: var(--gold-pale); display: flex; align-items: center; justify-content: center; font-size: 0.5rem; }
.phone-rsvp-name { font-size: 0.6rem; color: var(--text-mid); }
.phone-rsvp-check { margin-left: auto; font-size: 0.55rem; color: var(--gold); }

.features-badges {
  position: absolute;
  right: -20px; top: 60px;
  display: flex; flex-direction: column; gap: 12px;
}
.feature-badge {
  background: var(--white);
  border: 1px solid rgba(212,175,106,0.25);
  border-radius: 2px;
  padding: 12px 16px;
  box-shadow: 0 4px 20px rgba(90,70,20,0.08);
  font-size: 0.7rem;
  color: var(--text-mid);
  display: flex; align-items: center; gap: 10px;
  min-width: 160px;
  animation: fadeInRight 0.6s var(--ease-silk) both;
}
.feature-badge-icon { font-size: 1rem; }
.feature-badge b { display: block; color: var(--text-dark); font-size: 0.75rem; margin-bottom: 1px; font-weight: 500; }

.features-list {
  display: flex; flex-direction: column; gap: 32px;
}
.feature-item {
  display: flex; gap: 20px;
}
.feature-icon-wrap {
  width: 48px; height: 48px;
  flex-shrink: 0;
  background: var(--gold-pale);
  border: 1px solid rgba(212,175,106,0.3);
  display: flex; align-items: center; justify-content: center;
  font-size: 1.2rem;
}
.feature-item-title {
  font-family: var(--ff-serif);
  font-size: 1.1rem;
  font-weight: 400;
  color: var(--text-dark);
  margin-bottom: 6px;
}
.feature-item-desc {
  font-size: 0.82rem;
  font-weight: 300;
  line-height: 1.8;
  color: var(--text-mid);
}

@keyframes fadeInRight {
  from { opacity: 0; transform: translateX(20px); }
  to { opacity: 1; transform: translateX(0); }
}

.coming-soon-badge {
  position: absolute;
  top: 16px;
  right: 16px;
  background: linear-gradient(135deg, var(--gold-light), var(--gold-dark));
  color: var(--white);
  padding: 4px 12px;
  font-size: 0.55rem;
  font-weight: 500;
  letter-spacing: 0.15em;
  text-transform: uppercase;
  border-radius: 2px;
  z-index: 10;
  box-shadow: 0 4px 12px rgba(90, 70, 20, 0.2);
}
.event-card.coming-soon {
  opacity: 0.6;
  filter: grayscale(80%);
  cursor: not-allowed;
  pointer-events: none;
}
.event-card.coming-soon:hover {
  transform: none;
  box-shadow: none;
}

/* ═══════════════════════════════════════════
   TESTIMONIALS
═══════════════════════════════════════════ */
.testimonials-section {
  padding: 120px 80px;
  background: var(--text-dark);
  position: relative;
  overflow: hidden;
}
.testimonials-section::before {
  content: '"';
  position: absolute;
  top: -40px; left: 60px;
  font-family: var(--ff-serif);
  font-size: 30rem;
  color: rgba(212,175,106,0.04);
  line-height: 1;
  pointer-events: none;
}
.testimonials-section .section-eyebrow { color: var(--gold-light); }
.testimonials-section .section-title { color: var(--white); }
.testimonials-section .section-title em { color: var(--gold-light); }

.testimonials-slider-container {
  overflow: hidden;
  position: relative;
  width: 100%;
  margin-top: 60px;
  padding: 10px 0;
}
.testimonials-slider {
  display: flex;
  gap: 24px;
  width: max-content;
  animation: marquee 35s linear infinite;
}
.testimonials-slider:hover {
  animation-play-state: paused;
}
@keyframes marquee {
  0% { transform: translateX(0); }
  100% { transform: translateX(calc(-50% - 12px)); }
}
.testimonial-card {
  width: 400px;
  flex-shrink: 0;
  background: rgba(255,255,255,0.04);
  border: 1px solid rgba(212,175,106,0.15);
  padding: 44px 36px;
  position: relative;
  transition: background 0.3s, border-color 0.3s, transform 0.3s, box-shadow 0.3s;
}
.testimonial-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 15px 40px rgba(0,0,0,0.4);
}
.testimonial-card:hover {
  background: rgba(212,175,106,0.06);
  border-color: rgba(212,175,106,0.3);
}
.testimonial-stars {
  display: flex; gap: 4px;
  margin-bottom: 24px;
}
.star { color: var(--gold-light); font-size: 0.8rem; }
.testimonial-quote {
  font-family: var(--ff-serif);
  font-size: 1.1rem;
  font-weight: 300;
  line-height: 1.75;
  color: rgba(255,255,255,0.85);
  font-style: italic;
  margin-bottom: 28px;
}
.testimonial-author {
  display: flex; align-items: center; gap: 14px;
  padding-top: 24px;
  border-top: 1px solid rgba(212,175,106,0.1);
}
.author-avatar {
  width: 44px; height: 44px;
  border-radius: 50%;
  background: linear-gradient(135deg, var(--gold-light), var(--gold-dark));
  display: flex; align-items: center; justify-content: center;
  font-family: var(--ff-serif);
  font-size: 1.1rem;
  color: var(--white);
  font-weight: 300;
  flex-shrink: 0;
}
.author-name {
  font-family: var(--ff-serif);
  font-size: 1rem;
  color: var(--white);
  font-weight: 400;
  margin-bottom: 2px;
}
.author-event {
  font-size: 0.65rem;
  letter-spacing: 0.15em;
  text-transform: uppercase;
  color: rgba(212,175,106,0.6);
}
.testimonial-card-featured {
  background: linear-gradient(145deg, rgba(212,175,106,0.12), rgba(184,146,42,0.06));
  border-color: rgba(212,175,106,0.35);
  grid-row: span 1;
}

/* ═══════════════════════════════════════════
   SAMPLES / SHOWCASE
═══════════════════════════════════════════ */
.samples-section {
  padding: 120px 80px;
  background: var(--ivory);
  overflow: hidden;
}
.samples-scroll-track {
  display: flex; gap: 32px;
  margin-top: 60px;
  overflow-x: auto;
  scrollbar-width: none;
  padding-bottom: 20px;
}
.samples-scroll-track::-webkit-scrollbar { display: none; }
.sample-item {
  flex-shrink: 0;
  width: 260px;
}
.sample-preview {
  width: 260px; height: 360px;
  background: var(--cream);
  border: 1px solid rgba(212,175,106,0.2);
  display: flex; flex-direction: column; align-items: center; justify-content: center;
  padding: 30px;
  text-align: center;
  position: relative;
  overflow: hidden;
  cursor: pointer;
  transition: transform 0.3s var(--ease-silk), box-shadow 0.3s;
}
.sample-preview:hover { transform: translateY(-8px); box-shadow: 0 20px 50px rgba(90,70,20,0.12); }
.sample-bg-1 { background: linear-gradient(160deg, #fffdf8 0%, #f5e6c8 100%); }
.sample-bg-2 { background: linear-gradient(160deg, #fdfaf0 0%, #e8d4a0 100%); }
.sample-bg-3 { background: linear-gradient(160deg, #f8f5ee 0%, #dccfa0 100%); }
.sample-bg-4 { background: linear-gradient(160deg, #fffbf2 0%, #f0e0b0 100%); }
.sample-bg-5 { background: linear-gradient(160deg, #fdf8f0 0%, #e4d8b8 100%); }

.sample-corner {
  position: absolute; top: 12px; left: 12px;
  width: 30px; height: 30px;
  border-top: 1px solid rgba(184,146,42,0.4);
  border-left: 1px solid rgba(184,146,42,0.4);
}
.sample-corner-br {
  position: absolute; bottom: 12px; right: 12px;
  width: 30px; height: 30px;
  border-bottom: 1px solid rgba(184,146,42,0.4);
  border-right: 1px solid rgba(184,146,42,0.4);
}
.sample-script { font-family: var(--ff-script); font-size: 1.8rem; color: var(--gold-dark); margin-bottom: 4px; }
.sample-line { width: 40px; height: 1px; background: linear-gradient(90deg, transparent, var(--gold-light), transparent); margin: 10px auto; }
.sample-title { font-family: var(--ff-serif); font-size: 0.95rem; color: var(--text-dark); margin-bottom: 6px; }
.sample-date { font-size: 0.6rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--warm-gray); }

.sample-info { padding: 14px 4px 0; }
.sample-name { font-family: var(--ff-serif); font-size: 0.95rem; color: var(--text-dark); margin-bottom: 3px; }
.sample-event { font-size: 0.65rem; letter-spacing: 0.15em; text-transform: uppercase; color: var(--warm-gray); }

/* ═══════════════════════════════════════════
   PRICING
═══════════════════════════════════════════ */
.pricing-section {
  padding: 120px 80px;
  background: var(--cream);
}
.pricing-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
  margin-top: 60px;
  max-width: 960px;
  margin-left: auto; margin-right: auto;
}
.pricing-card {
  background: var(--white);
  border: 1px solid rgba(212,175,106,0.2);
  padding: 48px 40px;
  position: relative;
  overflow: hidden;
  transition: transform 0.3s var(--ease-silk), box-shadow 0.3s;
}
.pricing-card:hover { transform: translateY(-6px); box-shadow: 0 20px 60px rgba(90,70,20,0.1); }
.pricing-card-featured {
  background: linear-gradient(160deg, #fffdf8, #fdf0d0);
  border-color: rgba(212,175,106,0.5);
  transform: scale(1.03);
  box-shadow: 0 20px 60px rgba(90,70,20,0.12);
}
.pricing-card-featured:hover { transform: scale(1.03) translateY(-6px); }
.pricing-popular {
  position: absolute; top: 20px; right: 20px;
  padding: 4px 14px;
  background: linear-gradient(135deg, var(--gold-light), var(--gold));
  font-size: 0.55rem;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  color: var(--white);
}
.pricing-plan {
  font-size: 0.65rem;
  letter-spacing: 0.25em;
  text-transform: uppercase;
  color: var(--gold);
  margin-bottom: 12px;
}
.pricing-price {
  display: flex; align-items: flex-start; gap: 4px;
  margin-bottom: 6px;
}
.pricing-currency { font-family: var(--ff-serif); font-size: 1.4rem; color: var(--text-mid); margin-top: 8px; }
.pricing-amount { font-family: var(--ff-serif); font-size: 4rem; font-weight: 300; color: var(--text-dark); line-height: 1; }
.pricing-period { font-size: 0.75rem; color: var(--text-light); align-self: flex-end; margin-bottom: 8px; letter-spacing: 0.1em; }
.pricing-desc { font-size: 0.82rem; font-weight: 300; color: var(--text-mid); line-height: 1.7; margin-bottom: 32px; padding-bottom: 32px; border-bottom: 1px solid rgba(212,175,106,0.18); }
.pricing-features { list-style: none; margin-bottom: 36px; }
.pricing-features li {
  display: flex; align-items: flex-start; gap: 10px;
  font-size: 0.82rem; font-weight: 300;
  color: var(--text-mid);
  padding: 7px 0;
}
.pricing-features li::before { content: '\f00c'; font-family: 'Font Awesome 6 Free'; font-weight: 900; color: var(--gold-light); font-size: 0.65rem; margin-top: 5px; flex-shrink: 0; }

/* ═══════════════════════════════════════════
   CTA BANNER
═══════════════════════════════════════════ */
.cta-section {
  padding: 120px 80px;
  background: linear-gradient(135deg, var(--gold-deep) 0%, var(--gold-dark) 40%, var(--gold) 100%);
  position: relative;
  overflow: hidden;
  text-align: center;
}
.cta-section::before {
  content: '';
  position: absolute; inset: 0;
  background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M30 0L60 30L30 60L0 30z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
  pointer-events: none;
}
.cta-script {
  font-family: var(--ff-script);
  font-size: 3rem;
  color: rgba(255,255,255,0.4);
  margin-bottom: -10px;
}
.cta-title {
  font-family: var(--ff-serif);
  font-size: clamp(2.4rem, 4.5vw, 3.8rem);
  font-weight: 300;
  color: var(--white);
  margin-bottom: 20px;
  position: relative;
}
.cta-desc {
  font-size: 0.92rem;
  font-weight: 300;
  color: rgba(255,255,255,0.75);
  max-width: 480px;
  margin: 0 auto 44px;
  line-height: 1.8;
  position: relative;
}
.cta-actions {
  display: flex; align-items: center; justify-content: center; gap: 20px;
  position: relative;
}
.btn-white {
  display: inline-flex; align-items: center; gap: 10px;
  padding: 14px 38px;
  background: var(--white);
  color: var(--gold-dark);
  font-family: var(--ff-sans);
  font-size: 0.72rem;
  font-weight: 400;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  transition: all 0.3s;
  box-shadow: 0 4px 24px rgba(0,0,0,0.15);
}
.btn-white:hover { background: var(--ivory); transform: translateY(-2px); box-shadow: 0 8px 36px rgba(0,0,0,0.2); }
.btn-ghost {
  display: inline-flex; align-items: center; gap: 10px;
  padding: 13px 36px;
  border: 1px solid rgba(255,255,255,0.5);
  color: var(--white);
  font-family: var(--ff-sans);
  font-size: 0.72rem;
  font-weight: 300;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  transition: all 0.3s;
}
.btn-ghost:hover { background: rgba(255,255,255,0.1); border-color: rgba(255,255,255,0.8); }

/* ═══════════════════════════════════════════
   FOOTER
═══════════════════════════════════════════ */
footer {
  background: var(--text-dark);
  padding: 80px 80px 0;
}
.footer-top {
  display: grid;
  grid-template-columns: 2fr 1fr 1fr 1fr;
  gap: 60px;
  padding-bottom: 60px;
  border-bottom: 1px solid rgba(212,175,106,0.1);
}
.footer-brand-name {
  font-family: var(--ff-script);
  font-size: 2.8rem;
  color: var(--gold-light);
  line-height: 1;
  margin-bottom: 6px;
}
.footer-brand-sub {
  font-size: 0.58rem;
  letter-spacing: 0.28em;
  text-transform: uppercase;
  color: rgba(212,175,106,0.4);
  margin-bottom: 20px;
}
.footer-brand-desc {
  font-size: 0.82rem;
  font-weight: 300;
  line-height: 1.85;
  color: rgba(255,255,255,0.4);
  margin-bottom: 28px;
}
.footer-social { display: flex; gap: 12px; }
.social-btn {
  width: 38px; height: 38px;
  border: 1px solid rgba(212,175,106,0.2);
  display: flex; align-items: center; justify-content: center;
  font-size: 0.75rem;
  color: rgba(212,175,106,0.6);
  transition: all 0.3s;
  cursor: pointer;
}
.social-btn:hover { border-color: var(--gold-light); color: var(--gold-light); background: rgba(212,175,106,0.08); }

.footer-col-title {
  font-size: 0.62rem;
  letter-spacing: 0.28em;
  text-transform: uppercase;
  color: var(--gold-light);
  margin-bottom: 24px;
}
.footer-links { list-style: none; }
.footer-links li { margin-bottom: 12px; }
.footer-links a {
  font-size: 0.82rem;
  font-weight: 300;
  color: rgba(255,255,255,0.45);
  transition: color 0.3s;
  letter-spacing: 0.04em;
}
.footer-links a:hover { color: var(--gold-light); }

.footer-bottom {
  padding: 28px 0;
  display: flex; align-items: center; justify-content: space-between;
}
.footer-copy {
  font-size: 0.72rem;
  color: rgba(255,255,255,0.25);
  letter-spacing: 0.08em;
}
.footer-bottom-links {
  display: flex; gap: 28px;
}
.footer-bottom-links a {
  font-size: 0.68rem;
  letter-spacing: 0.12em;
  color: rgba(255,255,255,0.25);
  text-transform: uppercase;
  transition: color 0.3s;
}
.footer-bottom-links a:hover { color: var(--gold-light); }
.footer-newsletter {
  display: flex; gap: 0;
  margin-top: 0;
}
.footer-newsletter input {
  background: rgba(255,255,255,0.05);
  border: 1px solid rgba(212,175,106,0.2);
  border-right: none;
  padding: 10px 16px;
  font-family: var(--ff-sans);
  font-size: 0.75rem;
  font-weight: 300;
  color: var(--white);
  outline: none;
  width: 200px;
  transition: border-color 0.3s;
}
.footer-newsletter input::placeholder { color: rgba(255,255,255,0.25); }
.footer-newsletter input:focus { border-color: rgba(212,175,106,0.5); }
.footer-newsletter button {
  padding: 10px 18px;
  background: linear-gradient(135deg, var(--gold-light), var(--gold));
  font-family: var(--ff-sans);
  font-size: 0.6rem;
  letter-spacing: 0.15em;
  text-transform: uppercase;
  color: var(--white);
  cursor: pointer;
  transition: opacity 0.3s;
}
.footer-newsletter button:hover { opacity: 0.88; }

/* ═══════════════════════════════════════════
   SCROLL ANIMATIONS
═══════════════════════════════════════════ */
.reveal {
  opacity: 0;
  transform: translateY(30px);
  transition: opacity 0.7s var(--ease-silk), transform 0.7s var(--ease-silk);
}
.reveal.visible {
  opacity: 1;
  transform: none;
}
.reveal-delay-1 { transition-delay: 0.1s; }
.reveal-delay-2 { transition-delay: 0.2s; }
.reveal-delay-3 { transition-delay: 0.3s; }
.reveal-delay-4 { transition-delay: 0.4s; }

/* Gold shimmer on section bg */
.shimmer-border {
  position: relative;
}
.shimmer-border::after {
  content: '';
  position: absolute;
  top: 0; left: 0; right: 0;
  height: 1px;
  background: linear-gradient(90deg, transparent, var(--gold-light) 50%, transparent);
}

/* ═══════════════════════════════════════════
   MOBILE
═══════════════════════════════════════════ */
@media (max-width: 1024px) {
  header { padding: 0 30px; }
  nav ul { gap: 24px; }
  .hero { grid-template-columns: 1fr; min-height: auto; }
  .hero-bg-ornament::after { display: none; }
  .hero-left { padding: 60px 30px 40px; }
  .hero-right { padding: 0 30px 60px; }
  .hero-card-stack { width: 280px; height: 380px; margin: 0 auto; }
  .steps-grid, .events-grid, .templates-grid, .pricing-grid { grid-template-columns: 1fr 1fr; }
  .event-card-large { grid-column: span 2; }
  .features-inner { grid-template-columns: 1fr; }
  .footer-top { grid-template-columns: 1fr 1fr; }
  section { padding: 80px 30px !important; }
  .trust-bar { padding: 20px 30px; flex-wrap: wrap; }
  .hero-stats { gap: 30px; }
  .steps-grid::before { display: none; }
}

@media (max-width: 640px) {
  header { padding: 0 20px; height: 64px; }
  .nav-logo-name { font-size: 1.4rem; }
  .nav-logo-tagline { display: none; }
  nav { display: none; }
  .nav-cta { gap: 10px; }
  .nav-cta .nav-login { display: none; }
  .nav-cta .btn-primary { padding: 8px 12px; font-size: 0.6rem; letter-spacing: 0.1em; }
  .hero-left { padding: 40px 20px 20px; }
  .hero-right { padding: 0 20px 40px; }
  .hero-heading { font-size: 2.2rem; }
  .hero-script { font-size: 2.4rem; }
  .hero-actions { flex-direction: column; align-items: flex-start; gap: 16px; }
  .hero-stats { flex-wrap: wrap; gap: 16px; justify-content: flex-start; }
  .trust-bar { gap: 20px; padding: 20px; justify-content: flex-start; }
  section { padding: 60px 20px !important; }
  .steps-grid, .events-grid, .templates-grid, .pricing-grid { grid-template-columns: 1fr; }
  .event-card-large { grid-column: span 1; display: block; }
  .event-card-large .event-card-img { min-height: 180px; }
  .footer-top { grid-template-columns: 1fr; }
  .footer-bottom { flex-direction: column; gap: 16px; text-align: center; }
  .cta-actions { flex-direction: column; }
}
</style>
</head>
<body>

<!-- Petals -->
<div class="hero-bg-ornament" id="petals"></div>

<!-- ── HEADER ── -->
<header id="header">
  <div class="nav-logo">
    <span class="nav-logo-name">Invitely</span>
    <span class="nav-logo-tagline">Luxury Digital Invitations</span>
  </div>
  <nav>
    <ul>
      <li><a href="#events">Events</a></li>
      <li><a href="#templates">Templates</a></li>
      <li><a href="#features">Features</a></li>
      <li><a href="#pricing">Pricing</a></li>
      <li><a href="#samples">Samples</a></li>
    </ul>
  </nav>
  <div class="nav-cta">
    <a href="#" class="nav-login">Sign In</a>
    <a href="#" class="btn-primary"><span>Get Started</span></a>
  </div>
</header>

<!-- ── HERO ── -->
<section class="hero" id="home">
  <div class="hero-left">
    <div class="hero-left-top">
      <div class="hero-badge">
        <span class="hero-badge-dot"></span>
        Now with AI-Powered Design
      </div>
    </div>
    <div class="hero-script">Celebrate</div>
    <h1 class="hero-heading">Beautiful<br>Digital <em>Invitations.</em></h1>
    <p class="hero-sub">Create elegant digital invitations for your special day. Send instantly via WhatsApp or Email.</p>
    <div class="hero-actions">
      <a href="#templates" class="btn-primary"><span>Explore Templates</span></a>
      <div class="hero-watch">
        <div class="hero-watch-icon"><i class="fa-solid fa-play"></i></div>
        Watch Demo
      </div>
    </div>
    <div class="hero-stats">
      <div>
        <div class="hero-stat-num">120K+</div>
        <div class="hero-stat-label">Invitations Sent</div>
      </div>
      <div>
        <div class="hero-stat-num">4.9<i class="fa-solid fa-star" style="font-size:0.7em; margin-left:4px;"></i></div>
        <div class="hero-stat-label">Average Rating</div>
      </div>
      <div>
        <div class="hero-stat-num">340+</div>
        <div class="hero-stat-label">Templates</div>
      </div>
    </div>
  </div>

  <div class="hero-right">
    <div class="hero-card-stack">
      <div class="invite-card invite-card-2">
        <div class="invite-card-inner">
          <div class="card-ornament"><i class="fa-solid fa-gem"></i></div>
          <div class="card-together">together with their families</div>
          <div class="card-names">Priya</div>
          <div class="card-amp">&</div>
          <div class="card-names">Arjun</div>
          <div class="card-date-line"></div>
          <div class="card-date">18 · January · 2025</div>
          <div class="card-venue">The Leela Palace, Udaipur</div>
        </div>
      </div>
      <div class="invite-card invite-card-1">
        <div class="invite-card-inner">
          <div class="card-ornament"><i class="fa-solid fa-seedling"></i></div>
          <div class="card-together">joyfully invite you to</div>
          <div class="card-names">Golden Jubilee</div>
          <div class="card-date-line"></div>
          <div class="card-date">12 · March · 2025</div>
          <div class="card-venue">Grand Ballroom, Chennai</div>
        </div>
      </div>
      <div class="invite-card invite-card-main">
        <div class="invite-card-inner">
          <div class="card-ornament"><i class="fa-solid fa-crown"></i></div>
          <div class="card-together">request the pleasure of your company</div>
          <div class="card-names">Sofia</div>
          <div class="card-amp">&</div>
          <div class="card-names">Rahul</div>
          <div class="card-date-line"></div>
          <div class="card-date">14 · February · 2025</div>
          <div class="card-venue">The Oberoi Amarvilas, Agra</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── TRUST BAR ── -->
<div class="trust-bar shimmer-border">
  <span class="trust-label">Trusted by couples at</span>
  <div class="trust-logos">
    <span class="trust-logo"><b>The Leela</b> Palace</span>
    <span class="trust-logo"><b>Taj</b> Hotels</span>
    <span class="trust-logo"><b>Oberoi</b> Resorts</span>
    <span class="trust-logo"><b>ITC</b> Luxury</span>
    <span class="trust-logo"><b>Fairmont</b></span>
  </div>
</div>

<!-- ── HOW IT WORKS ── -->
<section class="how-section" id="how">
  <div class="section-header reveal">
    <span class="section-eyebrow">The Process</span>
    <h2 class="section-title">Simple & Fast<br><em>Process</em></h2>
    <p class="section-desc">Create and send your invitation in minutes.</p>
  </div>
  <div class="steps-grid">
    <div class="step reveal reveal-delay-1">
      <div class="step-num-wrap">
        <div class="step-num-ring"></div>
        <span class="step-icon"><i class="fa-solid fa-palette"></i></span>
      </div>
      <div class="step-label">Step 01</div>
      <div class="step-title">Pick a Design</div>
      <p class="step-desc">Browse our curated gallery of premium templates.</p>
    </div>
    <div class="step reveal reveal-delay-2">
      <div class="step-num-wrap">
        <div class="step-num-ring"></div>
        <span class="step-icon"><i class="fa-solid fa-pen-nib"></i></span>
      </div>
      <div class="step-label">Step 02</div>
      <div class="step-title">Customize</div>
      <p class="step-desc">Add your details, photos, and music easily.</p>
    </div>
    <div class="step reveal reveal-delay-3">
      <div class="step-num-wrap">
        <div class="step-num-ring"></div>
        <span class="step-icon"><i class="fa-solid fa-paper-plane"></i></span>
      </div>
      <div class="step-label">Step 03</div>
      <div class="step-title">Send Instantly</div>
      <p class="step-desc">Share via WhatsApp or email. No app needed.</p>
    </div>
    <div class="step reveal reveal-delay-4">
      <div class="step-num-wrap">
        <div class="step-num-ring"></div>
        <span class="step-icon"><i class="fa-solid fa-chart-line"></i></span>
      </div>
      <div class="step-label">Step 04</div>
      <div class="step-title">Track RSVPs</div>
      <p class="step-desc">Manage responses in real-time from your dashboard.</p>
    </div>
  </div>
</section>

<!-- ── EVENTS ── -->
<section class="events-section shimmer-border" id="events">
  <div class="section-header reveal">
    <span class="section-eyebrow">Event Types</span>
    <h2 class="section-title">Perfect for Any <em>Occasion</em></h2>
    <p class="section-desc">Find the right design for your next event.</p>
  </div>
  <div class="events-grid">
    <div class="event-card event-card-large reveal">
      <div class="event-card-img">
        <i class="fa-solid fa-ring"></i>
      </div>
      <div class="event-card-content">
        <span class="event-tag">Most Popular</span>
        <div class="event-name">Wedding Invitation</div>
        <p class="event-desc">Elegant designs for your special day.</p>
        <div class="event-count">120+ designs</div>
        <a href="#" class="btn-outline" style="margin-top:24px;font-size:0.65rem;padding:10px 24px;">Browse Wedding Designs</a>
      </div>
    </div>
    <div class="event-card coming-soon reveal reveal-delay-1">
      <div class="coming-soon-badge">Coming Soon</div>
      <span class="event-icon"><i class="fa-solid fa-heart"></i></span>
      <span class="event-tag">Trending</span>
      <div class="event-name">Engagement</div>
      <p class="event-desc">Celebrate your new beginning.</p>
      <div class="event-count">60+ designs</div>
    </div>
    <div class="event-card coming-soon reveal reveal-delay-1">
      <div class="coming-soon-badge">Coming Soon</div>
      <span class="event-icon"><i class="fa-solid fa-cake-candles"></i></span>
      <span class="event-tag">Celebration</span>
      <div class="event-name">Birthday</div>
      <p class="event-desc">Fun and elegant birthday templates.</p>
      <div class="event-count">80+ designs</div>
    </div>
    <div class="event-card coming-soon reveal reveal-delay-2">
      <div class="coming-soon-badge">Coming Soon</div>
      <span class="event-icon"><i class="fa-solid fa-moon"></i></span>
      <span class="event-tag">Cultural</span>
      <div class="event-name">Naming Ceremony</div>
      <p class="event-desc">Beautiful designs for your little one.</p>
      <div class="event-count">35+ designs</div>
    </div>
    <div class="event-card coming-soon reveal reveal-delay-2">
      <div class="coming-soon-badge">Coming Soon</div>
      <span class="event-icon"><i class="fa-solid fa-house"></i></span>
      <span class="event-tag">New Beginning</span>
      <div class="event-name">Housewarming</div>
      <p class="event-desc">Invite loved ones to your new home.</p>
      <div class="event-count">28+ designs</div>
    </div>
    <!-- <div class="event-card coming-soon reveal reveal-delay-3">
      <div class="coming-soon-badge">Coming Soon</div>
      <span class="event-icon">🎓</span>
      <span class="event-tag">Achievement</span>
      <div class="event-name">Graduation</div>
      <p class="event-desc">Celebrate a chapter closed and a bright future ahead.</p>
      <div class="event-count">22+ designs</div>
    </div> -->
  </div>
</section>

<!-- ── TEMPLATES ── -->
<section class="templates-section" id="templates">
  <div class="section-header reveal">
    <span class="section-eyebrow">Template Gallery</span>
    <h2 class="section-title">340+ <em>Curated</em> Designs,<br>Each One Handcrafted</h2>
    <p class="section-desc">Every template is designed by our in-house studio — a blend of traditional elegance and contemporary refinement.</p>
  </div>
  <div class="template-filters">
    <button class="filter-btn active" onclick="setFilter(this)">All Designs</button>
    <button class="filter-btn" onclick="setFilter(this)">Wedding</button>
    <button class="filter-btn" onclick="setFilter(this)">Engagement</button>
    <button class="filter-btn" onclick="setFilter(this)">Birthday</button>
    <button class="filter-btn" onclick="setFilter(this)">Cultural</button>
    <button class="filter-btn" onclick="setFilter(this)">Minimalist</button>
    <button class="filter-btn" onclick="setFilter(this)">Floral</button>
  </div>
  <div class="templates-grid">
    <!-- Card 1 -->
    <div class="template-card reveal">
      <div class="template-preview">
        <div class="tmpl-bg tmpl-1">
          <div class="tmpl-inner-ornament">✦</div>
          <div class="tmpl-inner-script">Eternal Love</div>
          <div class="tmpl-inner-title">Anika & Dev</div>
          <div class="tmpl-inner-line"></div>
          <div class="tmpl-inner-date">Together Forever</div>
        </div>
        <div class="template-overlay">
          <a href="#" class="btn-outline">Preview</a>
          <a href="#" class="btn-outline">Use This</a>
        </div>
      </div>
      <div class="template-info">
        <div class="template-name">Gilded Romance</div>
        <div class="template-meta">
          <span class="template-style">Wedding · Classic</span>
          <span class="template-fav">♡ 2.4k</span>
        </div>
      </div>
    </div>
    <!-- Card 2 -->
    <div class="template-card reveal reveal-delay-1">
      <div class="template-preview">
        <div class="tmpl-bg tmpl-2">
          <div class="tmpl-inner-ornament">❧</div>
          <div class="tmpl-inner-script">Together</div>
          <div class="tmpl-inner-title">Meera & Rohan</div>
          <div class="tmpl-inner-line"></div>
          <div class="tmpl-inner-date">Winter Wedding 2025</div>
        </div>
        <div class="template-overlay">
          <a href="#" class="btn-outline">Preview</a>
          <a href="#" class="btn-outline">Use This</a>
        </div>
      </div>
      <div class="template-info">
        <div class="template-name">Ivory Veil</div>
        <div class="template-meta">
          <span class="template-style">Wedding · Minimal</span>
          <span class="template-fav">♡ 1.8k</span>
        </div>
      </div>
    </div>
    <!-- Card 3 -->
    <div class="template-card reveal reveal-delay-2">
      <div class="template-preview">
        <div class="tmpl-bg tmpl-3">
          <div class="tmpl-inner-ornament">🌸</div>
          <div class="tmpl-inner-script">In Bloom</div>
          <div class="tmpl-inner-title">Kavya & Aryan</div>
          <div class="tmpl-inner-line"></div>
          <div class="tmpl-inner-date">Spring Engagement</div>
        </div>
        <div class="template-overlay">
          <a href="#" class="btn-outline">Preview</a>
          <a href="#" class="btn-outline">Use This</a>
        </div>
      </div>
      <div class="template-info">
        <div class="template-name">Blossom Garden</div>
        <div class="template-meta">
          <span class="template-style">Engagement · Floral</span>
          <span class="template-fav">♡ 3.1k</span>
        </div>
      </div>
    </div>
    <!-- Card 4 -->
    <div class="template-card reveal reveal-delay-3">
      <div class="template-preview">
        <div class="tmpl-bg tmpl-4">
          <div class="tmpl-inner-ornament">✦ ✦</div>
          <div class="tmpl-inner-script">Celebrate</div>
          <div class="tmpl-inner-title">Turning Fifty</div>
          <div class="tmpl-inner-line"></div>
          <div class="tmpl-inner-date">A Golden Milestone</div>
        </div>
        <div class="template-overlay">
          <a href="#" class="btn-outline">Preview</a>
          <a href="#" class="btn-outline">Use This</a>
        </div>
      </div>
      <div class="template-info">
        <div class="template-name">Golden Milestone</div>
        <div class="template-meta">
          <span class="template-style">Birthday · Luxury</span>
          <span class="template-fav">♡ 1.2k</span>
        </div>
      </div>
    </div>
    <!-- Card 5 -->
    <div class="template-card reveal reveal-delay-1">
      <div class="template-preview">
        <div class="tmpl-bg tmpl-5">
          <div class="tmpl-inner-ornament">☽</div>
          <div class="tmpl-inner-script">Blessed</div>
          <div class="tmpl-inner-title">Baby Naming</div>
          <div class="tmpl-inner-line"></div>
          <div class="tmpl-inner-date">A New Soul Arrives</div>
        </div>
        <div class="template-overlay">
          <a href="#" class="btn-outline">Preview</a>
          <a href="#" class="btn-outline">Use This</a>
        </div>
      </div>
      <div class="template-info">
        <div class="template-name">Moonlight Blessing</div>
        <div class="template-meta">
          <span class="template-style">Naming · Cultural</span>
          <span class="template-fav">♡ 980</span>
        </div>
      </div>
    </div>
    <!-- Card 6 -->
    <div class="template-card reveal reveal-delay-2">
      <div class="template-preview">
        <div class="tmpl-bg tmpl-6">
          <div class="tmpl-inner-ornament">◆</div>
          <div class="tmpl-inner-script">Classic</div>
          <div class="tmpl-inner-title">Black Tie Gala</div>
          <div class="tmpl-inner-line"></div>
          <div class="tmpl-inner-date">An Evening of Elegance</div>
        </div>
        <div class="template-overlay">
          <a href="#" class="btn-outline">Preview</a>
          <a href="#" class="btn-outline">Use This</a>
        </div>
      </div>
      <div class="template-info">
        <div class="template-name">Champagne Gala</div>
        <div class="template-meta">
          <span class="template-style">Event · Formal</span>
          <span class="template-fav">♡ 1.5k</span>
        </div>
      </div>
    </div>
    <!-- Card 7 -->
    <div class="template-card reveal reveal-delay-3">
      <div class="template-preview">
        <div class="tmpl-bg tmpl-7">
          <div class="tmpl-inner-ornament">🕊</div>
          <div class="tmpl-inner-script">New Home</div>
          <div class="tmpl-inner-title">Housewarming</div>
          <div class="tmpl-inner-line"></div>
          <div class="tmpl-inner-date">Come Warm Our Home</div>
        </div>
        <div class="template-overlay">
          <a href="#" class="btn-outline">Preview</a>
          <a href="#" class="btn-outline">Use This</a>
        </div>
      </div>
      <div class="template-info">
        <div class="template-name">Warm Welcome</div>
        <div class="template-meta">
          <span class="template-style">Housewarming · Warm</span>
          <span class="template-fav">♡ 760</span>
        </div>
      </div>
    </div>
    <!-- Card 8 -->
    <div class="template-card reveal reveal-delay-4">
      <div class="template-preview">
        <div class="tmpl-bg tmpl-8">
          <div class="tmpl-inner-ornament">🎓</div>
          <div class="tmpl-inner-script">Achieved</div>
          <div class="tmpl-inner-title">Graduation Party</div>
          <div class="tmpl-inner-line"></div>
          <div class="tmpl-inner-date">Class of 2025</div>
        </div>
        <div class="template-overlay">
          <a href="#" class="btn-outline">Preview</a>
          <a href="#" class="btn-outline">Use This</a>
        </div>
      </div>
      <div class="template-info">
        <div class="template-name">Laureate Gold</div>
        <div class="template-meta">
          <span class="template-style">Graduation · Modern</span>
          <span class="template-fav">♡ 840</span>
        </div>
      </div>
    </div>
  </div>
  <div class="templates-cta reveal">
    <a href="#" class="btn-primary"><span>View All 340+ Templates</span></a>
  </div>
</section>

<!-- ── FEATURES ── -->
<section class="features-section shimmer-border" id="features">
  <div class="section-header reveal">
    <span class="section-eyebrow">Features</span>
    <h2 class="section-title">Everything You Need,<br><em>Nothing You Don't</em></h2>
  </div>
  <div class="features-inner" style="margin-top:60px">
    <div class="features-visual reveal">
      <div class="features-phone-mock">
        <div class="phone-notch"></div>
        <div class="phone-content">
          <div class="phone-invite-preview">
            <div class="phone-ornament">✦</div>
            <div class="phone-name">Priya<br>&amp;<br>Arjun</div>
            <div class="phone-date-line"></div>
            <div class="phone-detail">18 January 2025</div>
            <div class="phone-detail">The Leela Palace, Udaipur</div>
            <div class="phone-btn-mock">RSVP Now</div>
          </div>
          <div class="phone-rsvp-mock">
            <div class="phone-rsvp-title">Recent RSVPs</div>
            <div class="phone-rsvp-row">
              <div class="phone-rsvp-avatar">S</div>
              <span class="phone-rsvp-name">Sunita Sharma</span>
              <span class="phone-rsvp-check">✓ Attending</span>
            </div>
            <div class="phone-rsvp-row">
              <div class="phone-rsvp-avatar">R</div>
              <span class="phone-rsvp-name">Rohit Verma</span>
              <span class="phone-rsvp-check">✓ Attending</span>
            </div>
            <div class="phone-rsvp-row">
              <div class="phone-rsvp-avatar">M</div>
              <span class="phone-rsvp-name">Mira Patel</span>
              <span class="phone-rsvp-check" style="color:var(--warm-gray)">Maybe</span>
            </div>
          </div>
        </div>
      </div>
      <div class="features-badges">
        <div class="feature-badge" style="animation-delay:0.2s">
          <span class="feature-badge-icon">📲</span>
          <div><b>WhatsApp Ready</b>One-tap sharing</div>
        </div>
        <div class="feature-badge" style="animation-delay:0.4s">
          <span class="feature-badge-icon">🌐</span>
          <div><b>Multi-language</b>12 languages</div>
        </div>
        <div class="feature-badge" style="animation-delay:0.6s">
          <span class="feature-badge-icon">🎵</span>
          <div><b>Background Music</b>Personalised</div>
        </div>
      </div>
    </div>
    <div class="features-list reveal">
      <div class="feature-item">
        <div class="feature-icon-wrap">🖋</div>
        <div>
          <div class="feature-item-title">Intuitive Design Editor</div>
          <p class="feature-item-desc">A drag-and-drop studio with real-time preview. Change fonts, colours, and layouts instantly — no design skills needed.</p>
        </div>
      </div>
      <div class="feature-item">
        <div class="feature-icon-wrap">📊</div>
        <div>
          <div class="feature-item-title">Live RSVP Dashboard</div>
          <p class="feature-item-desc">Watch responses come in live. Track attendance, collect meal preferences, and export guest lists to Excel or PDF.</p>
        </div>
      </div>
      <div class="feature-item">
        <div class="feature-icon-wrap">🎵</div>
        <div>
          <div class="feature-item-title">Music & Animations</div>
          <p class="feature-item-desc">Add ambient background music, animated florals, golden particle effects, and cinematic reveal transitions.</p>
        </div>
      </div>
      <div class="feature-item">
        <div class="feature-icon-wrap">🗺</div>
        <div>
          <div class="feature-item-title">Venue Map Integration</div>
          <p class="feature-item-desc">Embed an interactive map so every guest can find your venue with a single tap, in any city.</p>
        </div>
      </div>
      <div class="feature-item">
        <div class="feature-icon-wrap">🔒</div>
        <div>
          <div class="feature-item-title">Password Protected</div>
          <p class="feature-item-desc">Keep your invitation private. Set a passcode so only your actual guests can view the details.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── SAMPLES ── -->
<section class="samples-section" id="samples">
  <div class="section-header reveal">
    <span class="section-eyebrow">Live Samples</span>
    <h2 class="section-title">Real Invitations,<br><em>Real Moments</em></h2>
    <p class="section-desc">Explore a curated selection of invitations created by couples and families using Invitely.</p>
  </div>
  <div class="samples-scroll-track">
    <div class="sample-item">
      <div class="sample-preview sample-bg-1">
        <div class="sample-corner"></div>
        <div class="sample-corner-br"></div>
        <div class="sample-script">Priya & Arjun</div>
        <div class="sample-line"></div>
        <div class="sample-title">Wedding Invitation</div>
        <div class="sample-date">18 January 2025 · Udaipur</div>
      </div>
      <div class="sample-info">
        <div class="sample-name">Priya & Arjun</div>
        <div class="sample-event">Wedding · Gilded Romance</div>
      </div>
    </div>
    <div class="sample-item">
      <div class="sample-preview sample-bg-2">
        <div class="sample-corner"></div>
        <div class="sample-corner-br"></div>
        <div class="sample-script">Meera & Rohan</div>
        <div class="sample-line"></div>
        <div class="sample-title">Engagement Ceremony</div>
        <div class="sample-date">14 Feb 2025 · Mumbai</div>
      </div>
      <div class="sample-info">
        <div class="sample-name">Meera & Rohan</div>
        <div class="sample-event">Engagement · Ivory Veil</div>
      </div>
    </div>
    <div class="sample-item">
      <div class="sample-preview sample-bg-3">
        <div class="sample-corner"></div>
        <div class="sample-corner-br"></div>
        <div class="sample-script">Sunita's 50th</div>
        <div class="sample-line"></div>
        <div class="sample-title">Golden Birthday</div>
        <div class="sample-date">22 March 2025 · Delhi</div>
      </div>
      <div class="sample-info">
        <div class="sample-name">Sunita Bhat</div>
        <div class="sample-event">Birthday · Golden Milestone</div>
      </div>
    </div>
    <div class="sample-item">
      <div class="sample-preview sample-bg-4">
        <div class="sample-corner"></div>
        <div class="sample-corner-br"></div>
        <div class="sample-script">Baby Aanya</div>
        <div class="sample-line"></div>
        <div class="sample-title">Naming Ceremony</div>
        <div class="sample-date">5 April 2025 · Kochi</div>
      </div>
      <div class="sample-info">
        <div class="sample-name">The Nair Family</div>
        <div class="sample-event">Naming · Moonlight Blessing</div>
      </div>
    </div>
    <div class="sample-item">
      <div class="sample-preview sample-bg-5">
        <div class="sample-corner"></div>
        <div class="sample-corner-br"></div>
        <div class="sample-script">Vikram & Simran</div>
        <div class="sample-line"></div>
        <div class="sample-title">25th Anniversary</div>
        <div class="sample-date">10 May 2025 · Jaipur</div>
      </div>
      <div class="sample-info">
        <div class="sample-name">Vikram & Simran</div>
        <div class="sample-event">Anniversary · Silver Elegance</div>
      </div>
    </div>
  </div>
</section>

<!-- ── TESTIMONIALS ── -->
<section class="testimonials-section" id="testimonials">
  <div class="section-header reveal">
    <span class="section-eyebrow">Love Stories</span>
    <h2 class="section-title">Words from Our<br><em>Happy Couples</em></h2>
  </div>
  <div class="testimonials-slider-container">
    <div class="testimonials-slider">
    <div class="testimonial-card testimonial-card-featured">
      <div class="testimonial-stars">
        <span class="star"><i class="fa-solid fa-star"></i></span><span class="star"><i class="fa-solid fa-star"></i></span><span class="star"><i class="fa-solid fa-star"></i></span><span class="star"><i class="fa-solid fa-star"></i></span><span class="star"><i class="fa-solid fa-star"></i></span>
      </div>
      <p class="testimonial-quote">"Every single guest complimented our digital invitation. It was so stunning people actually screenshotted it. Invitely made our wedding feel premium from the first notification."</p>
      <div class="testimonial-author">
        <div class="author-avatar">P</div>
        <div>
          <div class="author-name">Priya Krishnamurthy</div>
          <div class="author-event">Wedding · Udaipur 2025</div>
        </div>
      </div>
    </div>
    <div class="testimonial-card">
      <div class="testimonial-stars">
        <span class="star"><i class="fa-solid fa-star"></i></span><span class="star"><i class="fa-solid fa-star"></i></span><span class="star"><i class="fa-solid fa-star"></i></span><span class="star"><i class="fa-solid fa-star"></i></span><span class="star"><i class="fa-solid fa-star"></i></span>
      </div>
      <p class="testimonial-quote">"The RSVP dashboard alone saved me hours of chasing people on WhatsApp. I could see responses in real time and send reminders with one click."</p>
      <div class="testimonial-author">
        <div class="author-avatar">R</div>
        <div>
          <div class="author-name">Rahul & Sofia Mehta</div>
          <div class="author-event">Engagement · Mumbai 2025</div>
        </div>
      </div>
    </div>
    <div class="testimonial-card">
      <div class="testimonial-stars">
        <span class="star"><i class="fa-solid fa-star"></i></span><span class="star"><i class="fa-solid fa-star"></i></span><span class="star"><i class="fa-solid fa-star"></i></span><span class="star"><i class="fa-solid fa-star"></i></span><span class="star"><i class="fa-solid fa-star"></i></span>
      </div>
      <p class="testimonial-quote">"I was sceptical about a digital invitation for a traditional ceremony, but Invitely's designs are so luxurious that even my grandparents loved it."</p>
      <div class="testimonial-author">
        <div class="author-avatar">A</div>
        <div>
          <div class="author-name">Ananya Iyer</div>
          <div class="author-event">Naming Ceremony · Chennai</div>
        </div>
      </div>
    </div>
    <div class="testimonial-card">
      <div class="testimonial-stars">
        <span class="star"><i class="fa-solid fa-star"></i></span><span class="star"><i class="fa-solid fa-star"></i></span><span class="star"><i class="fa-solid fa-star"></i></span><span class="star"><i class="fa-solid fa-star"></i></span><span class="star"><i class="fa-solid fa-star"></i></span>
      </div>
      <p class="testimonial-quote">"The background music feature was magical. Our guests opened the invitation and were immediately transported into the mood of our wedding. Absolutely priceless."</p>
      <div class="testimonial-author">
        <div class="author-avatar">N</div>
        <div>
          <div class="author-name">Nandita & Arjun</div>
          <div class="author-event">Wedding · Jaipur 2025</div>
        </div>
      </div>
    </div>
    <div class="testimonial-card">
      <div class="testimonial-stars">
        <span class="star"><i class="fa-solid fa-star"></i></span><span class="star"><i class="fa-solid fa-star"></i></span><span class="star"><i class="fa-solid fa-star"></i></span><span class="star"><i class="fa-solid fa-star"></i></span><span class="star"><i class="fa-solid fa-star"></i></span>
      </div>
      <p class="testimonial-quote">"So easy to use that I designed my daughter's birthday invitation in 20 minutes. It looked like a professional studio made it. The template quality is exceptional."</p>
      <div class="testimonial-author">
        <div class="author-avatar">S</div>
        <div>
          <div class="author-name">Sunita Bhat</div>
          <div class="author-event">Birthday · Delhi 2025</div>
        </div>
      </div>
    </div>
    <div class="testimonial-card">
      <div class="testimonial-stars">
        <span class="star"><i class="fa-solid fa-star"></i></span><span class="star"><i class="fa-solid fa-star"></i></span><span class="star"><i class="fa-solid fa-star"></i></span><span class="star"><i class="fa-solid fa-star"></i></span><span class="star"><i class="fa-solid fa-star"></i></span>
      </div>
      <p class="testimonial-quote">"Switched from printed cards to Invitely and I'll never go back. It's eco-friendly, instant, and honestly more beautiful than any print we could have afforded."</p>
      <div class="testimonial-author">
        <div class="author-avatar">V</div>
        <div>
          <div class="author-name">Vikram Pillai</div>
          <div class="author-event">Anniversary · Kochi 2025</div>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>

<!-- ── PRICING ── -->
<section class="pricing-section shimmer-border" id="pricing">
  <div class="section-header reveal">
    <span class="section-eyebrow">Pricing</span>
    <h2 class="section-title">Simple <em>Pricing</em></h2>
    <p class="section-desc">Pay once per event. Share with unlimited guests. No hidden fees.</p>
  </div>
  <div class="pricing-grid">
    <div class="pricing-card reveal">
      <div class="pricing-plan">Essentials</div>
      <div class="pricing-price">
        <span class="pricing-currency">₹</span>
        <span class="pricing-amount">499</span>
        <span class="pricing-period">/ event</span>
      </div>
      <p class="pricing-desc">Perfect for intimate gatherings and smaller celebrations.</p>
      <ul class="pricing-features">
        <li>1 Event Invitation</li>
        <li>50 Guest Views</li>
        <li>5 Premium Templates</li>
        <li>RSVP Collection</li>
        <li>WhatsApp & Link Sharing</li>
        <li>Valid for 30 days</li>
      </ul>
      <a href="#" class="btn-outline" style="width:100%;text-align:center;justify-content:center;">Get Started</a>
    </div>
    <div class="pricing-card pricing-card-featured reveal reveal-delay-1">
      <div class="pricing-popular">Most Popular</div>
      <div class="pricing-plan">Celebration</div>
      <div class="pricing-price">
        <span class="pricing-currency">₹</span>
        <span class="pricing-amount">999</span>
        <span class="pricing-period">/ event</span>
      </div>
      <p class="pricing-desc">The complete experience for weddings, engagements, and grand occasions.</p>
      <ul class="pricing-features">
        <li>1 Premium Event</li>
        <li>Unlimited Guest Views</li>
        <li>All 340+ Templates</li>
        <li>RSVP + Meal Preferences</li>
        <li>Background Music</li>
        <li>Venue Map Integration</li>
        <li>Password Protection</li>
        <li>Valid for 90 days</li>
      </ul>
      <a href="#" class="btn-primary" style="width:100%;justify-content:center;"><span>Choose Celebration</span></a>
    </div>
    <div class="pricing-card reveal reveal-delay-2">
      <div class="pricing-plan">Studio</div>
      <div class="pricing-price">
        <span class="pricing-currency">₹</span>
        <span class="pricing-amount">2499</span>
        <span class="pricing-period">/ year</span>
      </div>
      <p class="pricing-desc">For event planners, wedding coordinators, and frequent celebrators.</p>
      <ul class="pricing-features">
        <li>Unlimited Events</li>
        <li>Unlimited Guests</li>
        <li>All Templates + New Releases</li>
        <li>Priority Support</li>
        <li>Custom Branding</li>
        <li>Analytics Dashboard</li>
        <li>API Access</li>
        <li>White-label Option</li>
      </ul>
      <a href="#" class="btn-outline" style="width:100%;text-align:center;justify-content:center;">Contact Sales</a>
    </div>
  </div>
</section>

<!-- ── CTA ── -->
<section class="cta-section">
  <div class="cta-script">Begin</div>
  <h2 class="cta-title">Your Story Deserves<br>a Beautiful Beginning</h2>
  <p class="cta-desc">Join over 120,000 couples and families who chose Invitely to announce their most cherished moments — with grace, elegance, and effortless ease.</p>
  <div class="cta-actions">
    <a href="#templates" class="btn-white">Browse All Templates</a>
    <a href="#" class="btn-ghost">Create Free Invitation</a>
  </div>
</section>

<!-- ── FOOTER ── -->
<footer>
  <div class="footer-top">
    <div>
      <div class="footer-brand-name">Invitely</div>
      <div class="footer-brand-sub">Luxury Digital Invitations</div>
      <p class="footer-brand-desc">Crafting digital invitations with the elegance and attention to detail of a luxury stationery studio. Every occasion deserves to be announced beautifully.</p>
      <div class="footer-social">
        <div class="social-btn">in</div>
        <div class="social-btn"><i class="fa-brands fa-x-twitter"></i></div>
        <div class="social-btn"><i class="fa-brands fa-instagram"></i></div>
        <div class="social-btn"><i class="fa-brands fa-youtube"></i></div>
      </div>
    </div>
    <div>
      <div class="footer-col-title">Product</div>
      <ul class="footer-links">
        <li><a href="#">Templates</a></li>
        <li><a href="#">Features</a></li>
        <li><a href="#">Pricing</a></li>
        <li><a href="#">Samples</a></li>
        <li><a href="#">AI Design Studio</a></li>
        <li><a href="#">API Access</a></li>
      </ul>
    </div>
    <div>
      <div class="footer-col-title">Events</div>
      <ul class="footer-links">
        <li><a href="#">Wedding</a></li>
        <li><a href="#">Engagement</a></li>
        <li><a href="#">Birthday</a></li>
        <li><a href="#">Naming Ceremony</a></li>
        <li><a href="#">Housewarming</a></li>
        <li><a href="#">Graduation</a></li>
        <li><a href="#">Anniversary</a></li>
      </ul>
    </div>
    <div>
      <div class="footer-col-title">Company</div>
      <ul class="footer-links">
        <li><a href="#">About Us</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="#">Careers</a></li>
        <li><a href="#">Press Kit</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <div class="footer-col-title" style="margin-top:28px">Newsletter</div>
      <div class="footer-newsletter">
        <input type="email" placeholder="Your email" />
        <button>→</button>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <span class="footer-copy">© 2025 Invitely. All rights reserved. Crafted with love.</span>
    <div class="footer-bottom-links">
      <a href="#">Privacy Policy</a>
      <a href="#">Terms of Service</a>
      <a href="#">Cookie Policy</a>
      <a href="#">Refunds</a>
    </div>
  </div>
</footer>

<script>
// Header scroll effect
const header = document.getElementById('header');
window.addEventListener('scroll', () => {
  header.classList.toggle('scrolled', window.scrollY > 40);
});

// Scroll reveal
const reveals = document.querySelectorAll('.reveal');
const io = new IntersectionObserver((entries) => {
  entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); io.unobserve(e.target); } });
}, { threshold: 0.12 });
reveals.forEach(el => io.observe(el));

// Template filter
function setFilter(btn) {
  document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
}

// Floating petals
const petalContainer = document.getElementById('petals');
function createPetal() {
  const p = document.createElement('div');
  p.className = 'petal';
  p.style.left = Math.random() * 100 + 'vw';
  p.style.width = (6 + Math.random() * 8) + 'px';
  p.style.height = (8 + Math.random() * 10) + 'px';
  p.style.animationDuration = (8 + Math.random() * 12) + 's';
  p.style.animationDelay = (Math.random() * 10) + 's';
  p.style.opacity = (0.2 + Math.random() * 0.4);
  petalContainer.appendChild(p);
  setTimeout(() => p.remove(), 22000);
}
for (let i = 0; i < 18; i++) createPetal();
setInterval(createPetal, 3000);

// Testimonials Slider Clone
const slider = document.querySelector('.testimonials-slider');
if(slider) {
  const cards = slider.innerHTML;
  slider.innerHTML = cards + cards; // Clone for seamless infinite loop
}
</script>
</body>
</html>