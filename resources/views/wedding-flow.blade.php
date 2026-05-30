<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Your Dream Wedding Website — Velvet Vows</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@300;400;500;600;700;800;900&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400;1,600&family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <style>
        /* ══════════════════════════════════════════
           DESIGN TOKENS
           ══════════════════════════════════════════ */
        :root {
            --gold:        #B89047;
            --gold-dk:     #8C6D3B;
            --gold-lt:     #DFCA9B;
            --gold-pale:   #F5EDD8;
            --cream:       #FFFDF9;
            --cream-2:     #F7F3EB;
            --text:        #1E1812;
            --muted:       #7A7065;
            --border:      rgba(184,144,71,0.18);
            --ease:        cubic-bezier(0.16,1,0.3,1);
            --serif:       'Cormorant Garamond', serif;
            --display:     'Outfit', sans-serif;
            --body:        'Inter', sans-serif;
        }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        body {
            font-family: var(--body);
            background: var(--cream-2);
            color: var(--text);
            overflow-x: hidden;
            min-height: 100vh;
        }

        /* ── Rich background texture ─────────────────── */
        body::before {
            content: '';
            position: fixed; inset: 0; z-index: 0;
            background:
                radial-gradient(ellipse 80% 60% at 75% 15%, rgba(184,144,71,0.09) 0%, transparent 60%),
                radial-gradient(ellipse 60% 50% at 15% 85%, rgba(184,144,71,0.07) 0%, transparent 55%),
                radial-gradient(ellipse 40% 40% at 90% 70%, rgba(140,109,59,0.05) 0%, transparent 50%);
            pointer-events: none;
        }

        /* ── Floating hearts ─────────────────────────── */
        .hearts-bg {
            position: fixed; inset: 0; pointer-events: none; z-index: 0; overflow: hidden;
        }
        .heart-p {
            position: absolute; bottom: -60px; opacity: 0;
            animation: floatUp linear infinite;
            color: var(--gold);
        }
        @keyframes floatUp {
            0%   { transform: translateY(0) rotate(-15deg) scale(.8); opacity: 0; }
            8%   { opacity: 0.3; }
            92%  { opacity: 0.12; }
            100% { transform: translateY(-110vh) rotate(25deg) scale(1.3); opacity: 0; }
        }

        /* ══════════════════════════════════════════
           HEADER
           ══════════════════════════════════════════ */
        .wf-nav {
            position: sticky; top: 0; z-index: 300;
            background: rgba(255,253,249,0.88);
            backdrop-filter: blur(24px) saturate(180%);
            border-bottom: 1px solid var(--border);
            padding: .85rem 2rem;
            display: flex; align-items: center; justify-content: space-between;
        }
        .wf-brand {
            font-family: var(--display); font-weight: 800; font-size: 1.15rem;
            color: var(--text); text-decoration: none;
            display: flex; align-items: center; gap: .5rem;
        }
        .wf-brand-icon {
            width: 32px; height: 32px; border-radius: 10px;
            background: linear-gradient(135deg, var(--gold-dk), var(--gold));
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-size: .85rem;
            box-shadow: 0 3px 10px rgba(184,144,71,0.3);
        }
        .wf-brand em { color: var(--gold); font-style: normal; }
        .wf-progress-wrap { display: flex; align-items: center; gap: .6rem; }
        .wf-dot {
            height: 5px; border-radius: 99px;
            background: rgba(184,144,71,0.18);
            transition: all .4s var(--ease);
            width: 22px;
        }
        .wf-dot.done   { background: rgba(184,144,71,0.45); }
        .wf-dot.active { background: var(--gold); width: 38px; }
        .wf-step-txt {
            font-size: .73rem; font-weight: 700; color: var(--muted);
            text-transform: uppercase; letter-spacing: .9px;
            margin-left: .2rem;
        }

        /* ══════════════════════════════════════════
           STEP SHELL — full viewport height hero
           ══════════════════════════════════════════ */
        .wf-page { position: relative; z-index: 1; }

        .wf-step { display: none; animation: stepSlide .55s var(--ease) both; }
        .wf-step.active { display: block; }
        .wf-step.back { animation-name: stepSlideBack; }
        @keyframes stepSlide     { from{opacity:0;transform:translateX(36px)}  to{opacity:1;transform:translateX(0)} }
        @keyframes stepSlideBack { from{opacity:0;transform:translateX(-36px)} to{opacity:1;transform:translateX(0)} }

        /* ══════════════════════════════════════════
           STEP 0 — HERO (full-screen two-column)
           ══════════════════════════════════════════ */
        .hero-wrap {
            min-height: calc(100vh - 58px);
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0;
            align-items: center;
        }
        .hero-left {
            padding: 5rem 3rem 5rem 5%;
            display: flex; flex-direction: column; align-items: flex-start;
        }
        .hero-right {
            display: flex; align-items: center; justify-content: center;
            padding: 4rem 5% 4rem 2rem;
            position: relative;
        }

        .hero-badge {
            display: inline-flex; align-items: center; gap: .5rem;
            background: rgba(184,144,71,0.1);
            border: 1px solid rgba(184,144,71,0.28);
            border-radius: 99px;
            padding: .42rem 1.1rem;
            font-size: .73rem; font-weight: 800;
            color: var(--gold-dk); text-transform: uppercase; letter-spacing: 1.2px;
            margin-bottom: 1.6rem;
            animation: fadeUp .6s var(--ease) .1s both;
        }
        @keyframes fadeUp { from{opacity:0;transform:translateY(16px)} to{opacity:1;transform:translateY(0)} }

        .hero-h1 {
            font-family: var(--display);
            font-size: clamp(2.4rem, 4.5vw, 3.6rem);
            font-weight: 900; line-height: 1.08;
            letter-spacing: -2px; color: var(--text);
            margin-bottom: 1.1rem;
            animation: fadeUp .6s var(--ease) .2s both;
        }
        .hero-h1 .hi {
            display: block;
            background: linear-gradient(135deg, var(--gold-dk) 0%, var(--gold) 50%, #D4A855 100%);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-sub {
            font-family: var(--serif);
            font-size: clamp(1rem, 1.6vw, 1.2rem);
            line-height: 1.7; color: var(--muted);
            font-style: italic;
            margin-bottom: 2.2rem; max-width: 440px;
            animation: fadeUp .6s var(--ease) .3s both;
        }
        .hero-sub strong { color: var(--gold-dk); font-style: normal; font-weight: 700; }

        .hero-pills {
            display: flex; flex-wrap: wrap; gap: .6rem;
            margin-bottom: 2.6rem;
            animation: fadeUp .6s var(--ease) .4s both;
        }
        .hero-pill {
            display: flex; align-items: center; gap: .45rem;
            background: var(--cream);
            border: 1.5px solid var(--border);
            border-radius: 99px; padding: .5rem 1.1rem;
            font-size: .8rem; font-weight: 600; color: var(--text);
            box-shadow: 0 2px 8px rgba(184,144,71,0.06);
            transition: all .25s;
        }
        .hero-pill:hover { border-color: var(--gold); box-shadow: 0 4px 14px rgba(184,144,71,0.12); }
        .hero-pill i { color: var(--gold); font-size: .95rem; }

        .hero-cta-wrap { animation: fadeUp .6s var(--ease) .5s both; }
        .btn-hero-cta {
            display: inline-flex; align-items: center; gap: .6rem;
            padding: 1.05rem 2.2rem;
            background: linear-gradient(135deg, var(--gold-dk), var(--gold));
            border: none; border-radius: 99px; color: #fff;
            font-family: var(--display); font-weight: 800; font-size: 1.05rem;
            cursor: pointer; letter-spacing: -.2px;
            box-shadow: 0 6px 24px rgba(184,144,71,0.32), 0 1px 3px rgba(0,0,0,0.1);
            transition: all .35s var(--ease);
        }
        .btn-hero-cta:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 12px 32px rgba(184,144,71,0.42);
        }
        .btn-hero-cta i { font-size: 1.2rem; }
        .hero-cta-note {
            font-size: .75rem; color: var(--muted); margin-top: .75rem;
            display: flex; align-items: center; gap: .4rem;
        }
        .hero-cta-note::before { content: '✦'; color: var(--gold-lt); }

        /* ── Phone mockup ──────────────────────────────── */
        .phone-scene {
            position: relative; width: 260px; height: 490px;
            animation: fadeUp .7s var(--ease) .3s both;
        }
        .phone-glow {
            position: absolute; inset: -40px;
            background: radial-gradient(circle, rgba(184,144,71,0.14) 0%, transparent 70%);
            pointer-events: none; z-index: 0;
        }
        .phone-outer {
            position: relative; z-index: 1;
            width: 100%; height: 100%;
            background: #111;
            border-radius: 44px;
            box-shadow:
                0 0 0 2px #2A2A2A,
                0 0 0 4px #1A1A1A,
                0 32px 80px rgba(0,0,0,0.45),
                inset 0 1px 0 rgba(255,255,255,0.08);
            overflow: hidden;
            display: flex; flex-direction: column;
        }
        .phone-island {
            width: 80px; height: 26px;
            background: #000; border-radius: 0 0 18px 18px;
            align-self: center; flex-shrink: 0; margin-top: 0;
        }
        .phone-screen {
            flex: 1; display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            background: linear-gradient(160deg, #1A1208 0%, #0E0A04 100%);
            padding: 1.2rem 1rem;
            text-align: center; overflow: hidden;
        }
        .ps-border-deco {
            position: absolute; inset: 8px;
            border: 1px solid rgba(184,144,71,0.22);
            border-radius: 36px; pointer-events: none;
        }
        .ps-header { font-size: .46rem; letter-spacing: 3.5px; color: var(--gold); text-transform: uppercase; margin-bottom: .5rem; }
        .ps-names  { font-family: 'Great Vibes', cursive; font-size: 2rem; color: #FFFDF9; line-height: 1.1; }
        .ps-weds   { font-size: .55rem; font-style: italic; color: rgba(184,144,71,.8); margin: .3rem 0; }
        .ps-divider { width: 55%; height: 1px; background: linear-gradient(90deg, transparent, rgba(184,144,71,.5), transparent); margin: .5rem auto; }
        .ps-date   { font-size: .47rem; color: var(--gold); text-transform: uppercase; letter-spacing: 2px; }
        .ps-venue  { font-size: .52rem; font-weight: 700; color: rgba(255,255,255,.85); margin-top: .3rem; }
        .ps-addr   { font-size: .42rem; color: rgba(255,255,255,.4); margin-top: .1rem; }
        .ps-badge  { margin-top: .7rem; background: var(--gold); color: #fff; font-size: .4rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px; padding: .25rem .6rem; border-radius: 99px; }

        /* Side floating cards */
        .float-stat {
            position: absolute; z-index: 2;
            background: var(--cream);
            border: 1.5px solid var(--border);
            border-radius: 16px;
            padding: .7rem 1rem;
            box-shadow: 0 8px 24px rgba(140,109,59,0.12);
            font-family: var(--body); font-size: .75rem;
            animation: floatBob 4s ease-in-out infinite;
        }
        .float-stat.fs-1 { top: 10%;  right: -18%; animation-delay: 0s;   }
        .float-stat.fs-2 { bottom: 22%; left: -22%; animation-delay: 1.5s; }
        .float-stat .fs-num { font-family: var(--display); font-weight: 900; font-size: 1.3rem; color: var(--gold); line-height: 1; }
        .float-stat .fs-lbl { color: var(--muted); font-size: .62rem; margin-top: .1rem; }
        @keyframes floatBob {
            0%,100% { transform: translateY(0); }
            50%      { transform: translateY(-8px); }
        }

        /* ══════════════════════════════════════════
           FORM STEP WRAPPER
           ══════════════════════════════════════════ */
        .form-step-wrap {
            min-height: calc(100vh - 58px);
            display: flex; flex-direction: column; align-items: center;
            justify-content: center;
            padding: 3rem 1.5rem 5rem;
        }
        .form-step-inner { width: 100%; max-width: 640px; }

        /* ── Card shell ─────────────────────────────── */
        .fs-card {
            background: var(--cream);
            border: 1.5px solid var(--border);
            border-radius: 28px;
            box-shadow: 0 20px 60px rgba(140,109,59,0.08), 0 1px 3px rgba(0,0,0,0.03);
            overflow: hidden;
        }
        .fs-card-head {
            padding: 2rem 2.4rem 1.6rem;
            border-bottom: 1px solid var(--border);
            background: linear-gradient(to bottom, rgba(184,144,71,0.04), transparent);
        }
        .fs-card-head .step-num {
            font-size: .68rem; font-weight: 800; text-transform: uppercase;
            letter-spacing: 1.4px; color: var(--gold);
            margin-bottom: .5rem;
        }
        .fs-card-head h2 {
            font-family: var(--display); font-size: 1.65rem; font-weight: 900;
            letter-spacing: -.5px; color: var(--text);
            margin-bottom: .25rem; line-height: 1.1;
        }
        .fs-card-head h2 em { color: var(--gold); font-style: normal; }
        .fs-card-head p {
            font-family: var(--serif); font-style: italic;
            font-size: .95rem; color: var(--muted);
        }
        .fs-card-body { padding: 2rem 2.4rem 2.4rem; }

        /* ── Field styles ───────────────────────────── */
        .f-section {
            font-size: .67rem; font-weight: 800;
            text-transform: uppercase; letter-spacing: 1.3px;
            color: var(--gold-dk);
            display: flex; align-items: center; gap: .5rem;
            margin: 1.6rem 0 1rem;
        }
        .f-section::after { content: ''; flex: 1; height: 1px; background: var(--border); }
        .f-section:first-child { margin-top: 0; }

        .f-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem; }
        .f-full    { margin-bottom: 1rem; }

        .f-label {
            display: block; font-size: .71rem; font-weight: 700;
            color: var(--gold-dk); text-transform: uppercase;
            letter-spacing: .8px; margin-bottom: .38rem;
        }
        .f-label .opt { text-transform: none; font-weight: 400; font-style: italic; color: var(--muted); }

        .f-wrap { position: relative; }
        .f-in {
            width: 100%;
            padding: .84rem 1.1rem .84rem 2.7rem;
            border: 1.5px solid var(--border);
            border-radius: 13px; background: #fff;
            font-family: var(--body); font-size: .94rem; color: var(--text);
            outline: none; transition: all .28s var(--ease);
        }
        .f-in.no-pad { padding-left: 1.1rem; }
        .f-in::placeholder { color: var(--muted); opacity: .55; }
        .f-in:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 4px rgba(184,144,71,0.1);
            background: var(--cream);
        }
        .f-ico {
            position: absolute; left: .9rem; top: 0; height: 100%;
            display: flex; align-items: center;
            color: var(--gold-lt); font-size: .9rem; pointer-events: none;
            transition: color .25s;
        }
        .f-wrap:focus-within .f-ico { color: var(--gold); }
        textarea.f-in { padding-left: 1.1rem; resize: none; }
        select.f-in   { padding-left: 1.1rem; appearance: none; cursor: pointer; }
        .f-sel-wrap { position: relative; }
        .f-caret {
            position: absolute; right: 1rem; top: 50%;
            transform: translateY(-50%); pointer-events: none;
            color: var(--gold-lt); font-size: .75rem;
        }

        /* Name live preview */
        .name-preview {
            text-align: center;
            padding: 1.4rem 1rem;
            margin-top: .6rem;
            background: linear-gradient(135deg, rgba(184,144,71,0.05), rgba(184,144,71,0.02));
            border: 1px solid rgba(184,144,71,0.14);
            border-radius: 16px;
            font-family: 'Great Vibes', cursive;
            font-size: 2.2rem; color: var(--gold-dk);
            opacity: 0; transition: opacity .4s var(--ease);
        }

        /* ── Template gallery ───────────────────────── */
        .tpl-grid {
            display: grid; grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
        }
        .tpl-tile {
            border: 2.5px solid var(--border); border-radius: 18px;
            overflow: hidden; cursor: pointer; position: relative;
            transition: all .35s var(--ease);
            background: var(--cream-2);
        }
        .tpl-tile:hover { transform: translateY(-5px); box-shadow: 0 14px 32px rgba(140,109,59,0.14); }
        .tpl-tile.sel {
            border-color: var(--gold);
            box-shadow: 0 0 0 4px rgba(184,144,71,0.15), 0 14px 32px rgba(140,109,59,0.14);
        }
        .tpl-tile img { width: 100%; aspect-ratio: 2/3; object-fit: cover; display: block; }
        .tpl-tile-foot {
            padding: .65rem .8rem;
            background: var(--cream); border-top: 1px solid var(--border);
        }
        .tpl-tile-name { font-size: .72rem; font-weight: 800; color: var(--gold-dk); }
        .tpl-tile-hint { font-size: .62rem; color: var(--muted); font-style: italic; }
        .tpl-check-badge {
            position: absolute; top: .55rem; right: .55rem;
            width: 24px; height: 24px; border-radius: 50%;
            background: var(--gold); color: #fff; font-size: .7rem;
            display: flex; align-items: center; justify-content: center;
            opacity: 0; transform: scale(.5); transition: all .25s var(--ease);
        }
        .tpl-tile.sel .tpl-check-badge { opacity: 1; transform: scale(1); }

        /* ── Photo dropzone ─────────────────────────── */
        .dropzone {
            border: 2px dashed rgba(184,144,71,0.3);
            border-radius: 18px; background: rgba(184,144,71,0.025);
            padding: 2.5rem 1.5rem;
            display: flex; flex-direction: column; align-items: center; gap: .75rem;
            cursor: pointer; transition: all .3s var(--ease); text-align: center;
        }
        .dropzone:hover, .dropzone.drag { background: rgba(184,144,71,0.07); border-color: var(--gold); }
        .dz-icon {
            width: 56px; height: 56px; border-radius: 16px;
            background: linear-gradient(135deg, rgba(184,144,71,0.15), rgba(184,144,71,0.07));
            display: flex; align-items: center; justify-content: center;
            color: var(--gold); font-size: 1.5rem;
        }
        .dz-text { font-size: .92rem; font-weight: 700; color: var(--gold-dk); }
        .dz-hint { font-size: .74rem; color: var(--muted); }
        .dz-prev { width: 100px; height: 100px; border-radius: 50%; object-fit: cover; border: 3px solid var(--gold); display: none; }
        .skip-txt { text-align: center; font-size: .78rem; color: var(--muted); margin-top: .6rem; cursor: pointer; text-decoration: underline; text-underline-offset: 3px; transition: color .2s; }
        .skip-txt:hover { color: var(--gold-dk); }

        /* ── Publishing loader ──────────────────────── */
        .pub-wrap {
            display: flex; flex-direction: column; align-items: center;
            gap: 1.6rem; padding: 3.5rem 2rem; text-align: center;
        }
        .pub-ring {
            width: 72px; height: 72px;
            border: 4px solid rgba(184,144,71,0.15);
            border-top-color: var(--gold);
            border-radius: 50%; animation: spin 1s linear infinite;
        }
        @keyframes spin { to { transform: rotate(360deg); } }
        .pub-bar-wrap { width: 220px; height: 5px; border-radius: 99px; background: rgba(184,144,71,0.12); overflow: hidden; }
        .pub-bar-fill { height: 100%; width: 0; border-radius: 99px; background: linear-gradient(90deg, var(--gold-dk), var(--gold)); transition: width .5s var(--ease); }
        .pub-items { list-style: none; width: 100%; max-width: 300px; }
        .pub-item {
            display: flex; align-items: center; gap: .75rem;
            font-size: .85rem; color: var(--muted); font-weight: 500;
            padding: .35rem 0; transition: color .3s;
        }
        .pub-item i { color: rgba(184,144,71,0.25); font-size: 1rem; transition: all .3s; }
        .pub-item.done { color: var(--text); }
        .pub-item.done i { color: var(--gold); transform: scale(1.1); }

        /* ── Navigation buttons ─────────────────────── */
        .step-nav {
            display: flex; gap: .8rem; margin-top: 1.6rem;
        }
        .btn-back {
            display: flex; align-items: center; gap: .35rem;
            padding: .88rem 1.5rem;
            border: 1.5px solid var(--border); border-radius: 99px;
            background: transparent; color: var(--gold-dk);
            font-family: var(--body); font-weight: 700; font-size: .92rem;
            cursor: pointer; transition: all .25s;
        }
        .btn-back:hover { border-color: var(--gold); box-shadow: 0 3px 12px rgba(184,144,71,0.08); }
        .btn-next {
            flex: 1; padding: .92rem;
            background: linear-gradient(135deg, var(--gold-dk), var(--gold));
            border: none; border-radius: 99px; color: #fff;
            font-family: var(--display); font-weight: 800; font-size: 1rem;
            cursor: pointer;
            box-shadow: 0 5px 20px rgba(184,144,71,0.28);
            display: flex; align-items: center; justify-content: center; gap: .45rem;
            transition: all .3s var(--ease);
        }
        .btn-next:hover { transform: translateY(-2px); box-shadow: 0 9px 28px rgba(184,144,71,0.36); }
        .btn-next:active { transform: scale(.98); }

        /* ── Flatpickr override ─────────────────────── */
        .flatpickr-calendar {
            background: var(--cream) !important;
            border: 1.5px solid var(--border) !important;
            box-shadow: 0 12px 30px rgba(140,109,59,0.14) !important;
            border-radius: 16px !important; font-family: var(--body);
        }
        .flatpickr-months .flatpickr-month { background: var(--text) !important; color: var(--gold) !important; border-radius: 14px 14px 0 0; }
        .flatpickr-current-month .flatpickr-monthDropdown-months { background: var(--text) !important; color: var(--gold) !important; }
        .flatpickr-current-month input.cur-year { color: var(--gold) !important; }
        .flatpickr-months .flatpickr-prev-month, .flatpickr-months .flatpickr-next-month { fill: var(--gold) !important; }
        .flatpickr-day.selected { background: var(--gold) !important; border-color: var(--gold) !important; color: #fff !important; }
        .flatpickr-day:hover { background: rgba(184,144,71,0.1) !important; }
        span.flatpickr-weekday { color: var(--muted) !important; font-weight: 700; }

        /* ══════════════════════════════════════════
           RESPONSIVE
           ══════════════════════════════════════════ */
        @media (max-width: 900px) {
            .hero-wrap { grid-template-columns: 1fr; }
            .hero-left { padding: 3rem 1.5rem 1.5rem; align-items: center; text-align: center; }
            .hero-left .hero-pills { justify-content: center; }
            .hero-left .hero-sub { text-align: center; }
            .hero-right { padding: 1rem 1.5rem 3rem; }
            .float-stat { display: none; }
        }
        @media (max-width: 560px) {
            .fs-card-head { padding: 1.5rem 1.3rem 1.1rem; }
            .fs-card-body { padding: 1.3rem 1.3rem 1.8rem; }
            .f-grid-2     { grid-template-columns: 1fr; }
            .tpl-grid     { grid-template-columns: repeat(3,1fr); gap: .55rem; }
            .form-step-wrap { padding: 2rem 1rem 4rem; }
        }

        @keyframes shakeF { 0%,100%{transform:translateX(0)} 25%,75%{transform:translateX(-6px)} 50%{transform:translateX(6px)} }
    </style>
</head>
<body>

<!-- Floating hearts -->
<div class="hearts-bg" id="hearts-bg"></div>

<!-- ══════════════════════════════════════════
     NAVIGATION
     ══════════════════════════════════════════ -->
<nav class="wf-nav">
    <a class="wf-brand" href="{{ url('/') }}">
        <div class="wf-brand-icon"><i class="bi bi-heart-fill"></i></div>
        <em>Velvet</em>&nbsp;Vows
    </a>
    <div class="wf-progress-wrap" id="prog-wrap" style="display:none">
        <div id="prog-dots" style="display:flex;gap:.4rem"></div>
        <span class="wf-step-txt" id="prog-lbl"></span>
    </div>
</nav>

<div class="wf-page">
<form id="wf-form" action="{{ route('wedding.store.all') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
@csrf

<!-- ══════════════════════════════════════════════════
     STEP 0 — HERO (bigdates.ai style full-screen)
     ══════════════════════════════════════════════════ -->
<div class="wf-step active" id="step-0">
    <div class="hero-wrap">

        <!-- Left: Copy -->
        <div class="hero-left">
            <div class="hero-badge">
                <i class="bi bi-heart-fill"></i> Wedding Season 2026
            </div>

            <h1 class="hero-h1">
                Create Your Dream<br>
                <span class="hi">Wedding Website</span>
            </h1>

            <p class="hero-sub">
                Join <strong>12,000+</strong> happy couples who made their invitations more personal, modern, and unforgettable.
            </p>

            <div class="hero-pills">
                <div class="hero-pill"><i class="bi bi-lightning-charge-fill"></i> Start Now</div>
                <div class="hero-pill"><i class="bi bi-clock-fill"></i> 5 Min Setup</div>
                <div class="hero-pill"><i class="bi bi-phone-fill"></i> Mobile Ready</div>
                <div class="hero-pill"><i class="bi bi-share-fill"></i> Instant Share</div>
            </div>

            <div class="hero-cta-wrap">
                <button type="button" class="btn-hero-cta" onclick="goNext(0)">
                    <i class="bi bi-heart-fill"></i>
                    Create My Invitation Website
                </button>
                <p class="hero-cta-note">No payment needed to start · Ready in minutes</p>
            </div>
        </div>

        <!-- Right: Phone mockup -->
        <div class="hero-right">
            <div class="phone-scene">
                <div class="phone-glow"></div>
                <div class="phone-outer">
                    <div class="phone-island"></div>
                    <div class="phone-screen" style="position:relative">
                        <div class="ps-border-deco"></div>
                        <p class="ps-header">✦ The Honour of Your Presence ✦</p>
                        <p style="font-size:.4rem;color:rgba(197,155,39,.65);margin-bottom:.5rem;font-style:italic">at the marriage of</p>
                        <p class="ps-names" id="hp-bride">Bride</p>
                        <p class="ps-weds">&amp;</p>
                        <p class="ps-names" id="hp-groom">Groom</p>
                        <div class="ps-divider"></div>
                        <p class="ps-date" id="hp-date">Your Wedding Date</p>
                        <p class="ps-venue" id="hp-venue">Your Venue</p>
                        <p class="ps-addr">Join us for a celebration of love</p>
                        <div class="ps-badge">Velvet Vows Invitation</div>
                    </p>
                </div>
                <!-- Floating stat cards -->
                <div class="float-stat fs-1">
                    <div class="fs-num">12K+</div>
                    <div class="fs-lbl">Couples served</div>
                </div>
                <div class="float-stat fs-2">
                    <div class="fs-num">4.9⭐</div>
                    <div class="fs-lbl">Average rating</div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- ══════════════════════════════════════════════════
     STEP 1 — Couple Names
     ══════════════════════════════════════════════════ -->
<div class="wf-step" id="step-1">
    <div class="form-step-wrap">
    <div class="form-step-inner">
        <div class="fs-card">
            <div class="fs-card-head">
                <div class="step-num">Step 1 of 4</div>
                <h2>The <em>Couple</em></h2>
                <p>Who are the two souls joining in love?</p>
            </div>
            <div class="fs-card-body">
                <div class="f-section">Bride &amp; Groom</div>
                <div class="f-grid-2">
                    <div>
                        <label class="f-label">Bride's Name *</label>
                        <div class="f-wrap">
                            <i class="bi bi-person-heart f-ico"></i>
                            <input type="text" name="bride_name" id="bride_name" class="f-in" placeholder="e.g. Priya Sharma" required>
                        </div>
                    </div>
                    <div>
                        <label class="f-label">Groom's Name *</label>
                        <div class="f-wrap">
                            <i class="bi bi-person-heart f-ico"></i>
                            <input type="text" name="groom_name" id="groom_name" class="f-in" placeholder="e.g. Rahul Verma" required>
                        </div>
                    </div>
                </div>
                <!-- Live preview -->
                <div class="name-preview" id="name-preview">
                    <span id="pv-bride">Bride</span> &amp; <span id="pv-groom">Groom</span>
                </div>
            </div>
        </div>
        <div class="step-nav">
            <button type="button" class="btn-back" onclick="goBack(1)"><i class="bi bi-arrow-left-short fs-5"></i> Back</button>
            <button type="button" class="btn-next" onclick="validateStep(1)">Continue <i class="bi bi-arrow-right-short fs-5"></i></button>
        </div>
    </div>
    </div>
</div>

<!-- ══════════════════════════════════════════════════
     STEP 2 — Event Details
     ══════════════════════════════════════════════════ -->
<div class="wf-step" id="step-2">
    <div class="form-step-wrap">
    <div class="form-step-inner">
        <div class="fs-card">
            <div class="fs-card-head">
                <div class="step-num">Step 2 of 4</div>
                <h2>Event <em>Details</em></h2>
                <p>When and where is the celebration?</p>
            </div>
            <div class="fs-card-body">
                <div class="f-section">Date &amp; Time</div>
                <div class="f-grid-2">
                    <div>
                        <label class="f-label">Wedding Date *</label>
                        <div class="f-wrap">
                            <i class="bi bi-calendar-heart f-ico"></i>
                            <input type="text" name="wedding_date" class="f-in datepicker" placeholder="Pick a date…" required>
                        </div>
                    </div>
                    <div>
                        <label class="f-label">Start Time *</label>
                        <div class="f-wrap">
                            <i class="bi bi-clock f-ico"></i>
                            <input type="text" name="time" class="f-in timepicker" placeholder="7:00 PM" required>
                        </div>
                    </div>
                </div>

                <div class="f-section">Venue</div>
                <div class="f-full">
                    <label class="f-label">Venue Name *</label>
                    <div class="f-wrap">
                        <i class="bi bi-geo-alt f-ico"></i>
                        <input type="text" name="venue_name" id="venue_name" class="f-in" placeholder="e.g. The Grand Palace" required>
                    </div>
                </div>
                <div class="f-full">
                    <label class="f-label">Full Address *</label>
                    <textarea name="venue_address" class="f-in no-pad" rows="2" placeholder="Street · City · State" required></textarea>
                </div>

                <div class="f-section">RSVP &amp; Details</div>
                <div class="f-grid-2">
                    <div>
                        <label class="f-label">RSVP Contact *</label>
                        <div class="f-wrap">
                            <i class="bi bi-telephone f-ico"></i>
                            <input type="text" name="rsvp_contact" class="f-in" placeholder="+91 98765…" required>
                        </div>
                    </div>
                    <div>
                        <label class="f-label">RSVP Deadline <span class="opt">(optional)</span></label>
                        <div class="f-wrap">
                            <i class="bi bi-calendar-check f-ico"></i>
                            <input type="text" name="rsvp_deadline" class="f-in datepicker" placeholder="Deadline…">
                        </div>
                    </div>
                </div>
                <div class="f-full">
                    <label class="f-label">Dress Code <span class="opt">(optional)</span></label>
                    <div class="f-sel-wrap">
                        <select name="dress_code" class="f-in no-pad">
                            <option value="">— Select —</option>
                            <option value="formal">Formal / Black Tie</option>
                            <option value="smart_casual">Smart Casual</option>
                            <option value="traditional">Traditional Attire</option>
                            <option value="casual">Casual</option>
                        </select>
                        <i class="bi bi-chevron-down f-caret"></i>
                    </div>
                </div>
                <div class="f-full">
                    <label class="f-label">Personal Message <span class="opt">(optional · 200 chars)</span></label>
                    <textarea name="personal_message" class="f-in no-pad" rows="2" maxlength="200" placeholder="A warm note from the couple…"></textarea>
                </div>
            </div>
        </div>
        <div class="step-nav">
            <button type="button" class="btn-back" onclick="goBack(2)"><i class="bi bi-arrow-left-short fs-5"></i> Back</button>
            <button type="button" class="btn-next" onclick="validateStep(2)">Continue <i class="bi bi-arrow-right-short fs-5"></i></button>
        </div>
    </div>
    </div>
</div>

<!-- ══════════════════════════════════════════════════
     STEP 3 — Template Gallery
     ══════════════════════════════════════════════════ -->
<div class="wf-step" id="step-3">
    <div class="form-step-wrap">
    <div class="form-step-inner" style="max-width:720px">
        <div class="fs-card">
            <div class="fs-card-head">
                <div class="step-num">Step 3 of 4</div>
                <h2>Choose Your <em>Template</em></h2>
                <p>Tap to select your invitation design</p>
            </div>
            <div class="fs-card-body">
                <input type="hidden" name="template" id="tpl-val" value="{{ session('wedding_template', 'premium-vintage') }}">
                <div class="tpl-grid">
                    <div class="tpl-tile sel" id="tpl-premium-vintage" onclick="pickTpl('premium-vintage', this)">
                        <img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=400&q=80" alt="Premium Vintage">
                        <div class="tpl-check-badge"><i class="bi bi-check-lg"></i></div>
                        <div class="tpl-tile-foot">
                            <div class="tpl-tile-name">Premium Vintage</div>
                            <div class="tpl-tile-hint">Classic and elegant</div>
                        </div>
                    </div>
                </div>
                <p style="text-align:center;font-size:.74rem;color:var(--muted);font-style:italic;margin-top:1rem">✦ More designs launching soon</p>
            </div>
        </div>
        <div class="step-nav">
            <button type="button" class="btn-back" onclick="goBack(3)"><i class="bi bi-arrow-left-short fs-5"></i> Back</button>
            <button type="button" class="btn-next" onclick="goNext(3)">Continue <i class="bi bi-arrow-right-short fs-5"></i></button>
        </div>
    </div>
    </div>
</div>

<!-- ══════════════════════════════════════════════════
     STEP 4 — Photo Upload
     ══════════════════════════════════════════════════ -->
<div class="wf-step" id="step-4">
    <div class="form-step-wrap">
    <div class="form-step-inner">
        <div class="fs-card">
            <div class="fs-card-head">
                <div class="step-num">Step 4 of 4</div>
                <h2>Couple's <em>Photo</em></h2>
                <p>A picture worth a thousand invitations</p>
            </div>
            <div class="fs-card-body">
                <div class="dropzone" id="dz" onclick="document.getElementById('photo-inp').click()">
                    <img src="" alt="" class="dz-prev" id="dz-prev">
                    <div class="dz-icon" id="dz-icon"><i class="bi bi-image-fill"></i></div>
                    <p class="dz-text" id="dz-text">Tap to upload your couple photo</p>
                    <p class="dz-hint">PNG, JPG — up to 5MB</p>
                    <input type="file" id="photo-inp" name="couples_photo" accept="image/*" style="display:none" onchange="handleDrop(this)">
                </div>
                <p class="skip-txt" onclick="goNext(4)">Skip for now &rarr;</p>
            </div>
        </div>
        <div class="step-nav">
            <button type="button" class="btn-back" onclick="goBack(4)"><i class="bi bi-arrow-left-short fs-5"></i> Back</button>
            <button type="button" class="btn-next" onclick="goNext(4)">Publish Invitation <i class="bi bi-arrow-right-short fs-5"></i></button>
        </div>
    </div>
    </div>
</div>

<!-- ══════════════════════════════════════════════════
     STEP 5 — Publishing
     ══════════════════════════════════════════════════ -->
<div class="wf-step" id="step-5">
    <div class="form-step-wrap">
    <div class="form-step-inner">
        <div class="fs-card">
            <div class="pub-wrap">
                <div class="pub-ring"></div>
                <div>
                    <p style="font-family:var(--display);font-size:1.3rem;font-weight:900;color:var(--text);margin-bottom:.4rem">Creating Your Invitation</p>
                    <p style="font-family:var(--serif);font-style:italic;font-size:.95rem;color:var(--muted)">Crafting something beautiful…</p>
                </div>
                <div class="pub-bar-wrap"><div class="pub-bar-fill" id="pub-fill"></div></div>
                <ul class="pub-items">
                    <li class="pub-item" id="pi-1"><i class="bi bi-circle"></i> Saving your details</li>
                    <li class="pub-item" id="pi-2"><i class="bi bi-circle"></i> Applying your template</li>
                    <li class="pub-item" id="pi-3"><i class="bi bi-circle"></i> Generating invitation link</li>
                    <li class="pub-item" id="pi-4"><i class="bi bi-circle"></i> Getting everything ready</li>
                </ul>
            </div>
        </div>
    </div>
    </div>
</div>

</form>
</div>

<script>
/* ── State ─────────────────────────────────────── */
let cur = 0;

/* ── Progress bar ──────────────────────────────── */
function renderProg() {
    const wrap = document.getElementById('prog-wrap');
    const dots = document.getElementById('prog-dots');
    const lbl  = document.getElementById('prog-lbl');
    if (cur === 0) { wrap.style.display = 'none'; return; }
    wrap.style.display = 'flex';
    dots.innerHTML = '';
    for (let i = 1; i <= 4; i++) {
        const d = document.createElement('div');
        d.className = 'wf-dot' + (i < cur ? ' done' : '') + (i === cur ? ' active' : '');
        dots.appendChild(d);
    }
    lbl.textContent = `Step ${cur} of 4`;
}

/* ── Navigation ─────────────────────────────────── */
function goNext(from) {
    let to = from + 1;
    const hasSessionTpl = "{{ session('wedding_template') }}" !== "";
    if (to === 3 && hasSessionTpl) to = 4;
    
    if (to > 5) return;
    transition(from, to, false);
    if (to === 5) startPublish();
}
function goBack(from) {
    let to = from - 1;
    const hasSessionTpl = "{{ session('wedding_template') }}" !== "";
    if (to === 3 && hasSessionTpl) to = 2;
    
    if (to < 0) return;
    transition(from, to, true);
}
function transition(from, to, back) {
    const old = document.getElementById('step-' + from);
    const nw  = document.getElementById('step-' + to);
    old.classList.remove('active');
    nw.classList.remove('back');
    if (back) nw.classList.add('back');
    nw.classList.add('active');
    cur = to;
    renderProg();
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

/* ── Validate + next ────────────────────────────── */
function validateStep(step) {
    const reqs = document.querySelectorAll('#step-' + step + ' [required]');
    let ok = true;
    reqs.forEach(f => { if (!f.value.trim()) { ok = false; shake(f); } });
    if (ok) goNext(step);
}
function shake(el) {
    el.style.borderColor = 'var(--gold)';
    el.style.animation = 'none';
    void el.offsetWidth;
    el.style.animation = 'shakeF .42s ease';
    el.addEventListener('animationend', () => { el.style.animation = ''; el.style.borderColor = ''; }, { once: true });
}

/* ── Name live preview ──────────────────────────── */
function nameWatch(id, pvId, phoneId) {
    document.getElementById(id).addEventListener('input', function() {
        const v = this.value || (id === 'bride_name' ? 'Bride' : 'Groom');
        document.getElementById(pvId).textContent = v;
        document.getElementById(phoneId).textContent = v;
        const bv = document.getElementById('bride_name').value;
        const gv = document.getElementById('groom_name').value;
        document.getElementById('name-preview').style.opacity = (bv || gv) ? '1' : '0';
    });
}
nameWatch('bride_name', 'pv-bride', 'hp-bride');
nameWatch('groom_name', 'pv-groom', 'hp-groom');

/* Venue live update on phone mockup */
document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('[name="venue_name"]').addEventListener('input', function() {
        document.getElementById('hp-venue').textContent = this.value || 'Your Venue';
    });
    const dateFld = document.querySelector('[name="wedding_date"]');
    if (dateFld) {
        dateFld.addEventListener('change', function() {
            document.getElementById('hp-date').textContent = this.value ? new Date(this.value).toLocaleDateString('en-IN',{day:'numeric',month:'long',year:'numeric'}) : 'Your Wedding Date';
        });
    }
});

/* ── Template pick ──────────────────────────────── */
function pickTpl(id, el) {
    document.querySelectorAll('.tpl-tile').forEach(t => t.classList.remove('sel'));
    el.classList.add('sel');
    document.getElementById('tpl-val').value = id;
}

/* ── Photo upload ───────────────────────────────── */
function handleDrop(inp) {
    if (!inp.files || !inp.files[0]) return;
    const r = new FileReader();
    r.onload = e => {
        const prev = document.getElementById('dz-prev');
        prev.src = e.target.result; prev.style.display = 'block';
        document.getElementById('dz-icon').style.display = 'none';
        document.getElementById('dz-text').textContent = inp.files[0].name;
        document.getElementById('dz').classList.add('drag');
    };
    r.readAsDataURL(inp.files[0]);
}
const dz = document.getElementById('dz');
['dragenter','dragover'].forEach(ev => dz.addEventListener(ev, e => { e.preventDefault(); dz.classList.add('drag'); }));
['dragleave','drop'].forEach(ev => dz.addEventListener(ev, e => {
    e.preventDefault(); dz.classList.remove('drag');
    if (ev === 'drop' && e.dataTransfer.files[0]) {
        document.getElementById('photo-inp').files = e.dataTransfer.files;
        handleDrop(document.getElementById('photo-inp'));
    }
}));

/* ── Publishing animation → submit ─────────────── */
function startPublish() {
    const steps = [
        { id:'pi-1', pct:25,  d:400  },
        { id:'pi-2', pct:55,  d:950  },
        { id:'pi-3', pct:80,  d:1500 },
        { id:'pi-4', pct:100, d:2050 },
    ];
    steps.forEach(({ id, pct, d }) => {
        setTimeout(() => {
            const li = document.getElementById(id);
            li.classList.add('done');
            li.querySelector('i').className = 'bi bi-check-circle-fill';
            document.getElementById('pub-fill').style.width = pct + '%';
        }, d);
    });
    setTimeout(() => document.getElementById('wf-form').submit(), 2700);
}

/* ── Flatpickr ──────────────────────────────────── */
document.addEventListener('DOMContentLoaded', () => {
    flatpickr('.datepicker', { altInput:true, altFormat:'F j, Y', dateFormat:'Y-m-d', minDate:'today' });
    flatpickr('.timepicker', { enableTime:true, noCalendar:true, dateFormat:'h:i K', defaultDate:'19:00' });
});

/* ── Floating hearts ────────────────────────────── */
(function spawnHearts() {
    const bg = document.getElementById('hearts-bg');
    const glyphs = ['♥','✦','✿','❋','♡','❤','✾'];
    for (let i = 0; i < 20; i++) {
        const el = document.createElement('div');
        el.className = 'heart-p';
        el.textContent = glyphs[i % glyphs.length];
        el.style.left = Math.random() * 100 + 'vw';
        el.style.fontSize = (Math.random() * 1.4 + 0.5) + 'rem';
        el.style.animationDuration = (Math.random() * 16 + 10) + 's';
        el.style.animationDelay    = (Math.random() * 12) + 's';
        bg.appendChild(el);
    }
})();

/* Init */
renderProg();
</script>
</body>
</html>
