<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Choose Your Template — Velvet Vows</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --gold:        #B89047;
            --gold-dk:     #8C6D3B;
            --cream:       #FFFDF9;
            --cream-2:     #F7F3EB;
            --text:        #1E1812;
            --muted:       #7A7065;
            --border:      rgba(184,144,71,0.18);
            --ease:        cubic-bezier(0.16,1,0.3,1);
            --display:     'Outfit', sans-serif;
            --body:        'Inter', sans-serif;
        }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: var(--body); background: var(--cream-2); color: var(--text); -webkit-font-smoothing: antialiased; }

        /* Header */
        .header {
            position: sticky; top: 0; z-index: 100;
            background: rgba(255,253,249,0.9); backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            padding: 1rem 5%; display: flex; align-items: center; justify-content: space-between;
        }
        .header-brand {
            font-family: var(--display); font-weight: 800; font-size: 1.1rem;
            color: var(--text); text-decoration: none; display: flex; align-items: center; gap: .5rem;
        }
        .header-brand i { color: var(--gold); }
        .btn-back {
            display: flex; align-items: center; gap: .4rem; font-size: .85rem; font-weight: 600;
            color: var(--muted); text-decoration: none; transition: color .2s;
        }
        .btn-back:hover { color: var(--gold-dk); }

        /* Page Content */
        .page-content { padding: 4rem 5% 6rem; max-width: 1200px; margin: 0 auto; text-align: center; }
        .page-title { font-family: var(--display); font-size: 2.4rem; font-weight: 900; letter-spacing: -.5px; margin-bottom: .5rem; }
        .page-title span { color: var(--gold); }
        .page-sub { font-size: 1.05rem; color: var(--muted); margin-bottom: 3.5rem; }

        /* Gallery Grid */
        .tpl-grid {
            display: grid; grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
        }
        .tpl-card {
            background: var(--cream); border: 2px solid var(--border);
            border-radius: 20px; overflow: hidden; cursor: pointer;
            transition: all .35s var(--ease); text-align: left;
            position: relative;
        }
        .tpl-card:hover { transform: translateY(-6px); box-shadow: 0 16px 40px rgba(184,144,71,0.12); border-color: var(--gold); }
        .tpl-img { width: 100%; aspect-ratio: 2/3; object-fit: cover; display: block; }
        .tpl-info { padding: 1rem 1.2rem; border-top: 1px solid var(--border); }
        .tpl-name { font-family: var(--display); font-size: 1.05rem; font-weight: 700; color: var(--text); }
        .tpl-hint { font-size: .8rem; color: var(--muted); margin-top: .2rem; }
        
        .tpl-overlay {
            position: absolute; inset: 0; background: rgba(30,24,18,0.4);
            display: flex; align-items: center; justify-content: center;
            opacity: 0; transition: opacity .3s var(--ease); backdrop-filter: blur(2px);
        }
        .tpl-card:hover .tpl-overlay { opacity: 1; }
        .btn-use {
            background: #fff; color: var(--text); font-weight: 700; font-size: .9rem;
            padding: .75rem 1.5rem; border-radius: 99px; border: none;
            box-shadow: 0 8px 24px rgba(0,0,0,0.2); transform: translateY(15px);
            transition: all .3s var(--ease);
        }
        .tpl-card:hover .btn-use { transform: translateY(0); }

        /* Signin Modal (Reused from welcome) */
        .signin-overlay {
            position: fixed; inset: 0; z-index: 9999;
            background: rgba(30,24,18,0.5); backdrop-filter: blur(12px);
            display: flex; align-items: center; justify-content: center;
            opacity: 0; pointer-events: none; transition: opacity .4s var(--ease);
        }
        .signin-overlay.open { opacity: 1; pointer-events: auto; }
        .signin-modal {
            background: #FFFDF9; border: 1.5px solid rgba(184,144,71,0.2);
            border-radius: 28px; width: 100%; max-width: 440px;
            box-shadow: 0 24px 64px rgba(0,0,0,0.15); position: relative;
            transform: translateY(40px) scale(0.96); transition: all .4s var(--ease);
            overflow: hidden; padding: 2.5rem 2rem 2rem;
        }
        .signin-overlay.open .signin-modal { transform: translateY(0) scale(1); }
        .modal-close {
            position: absolute; top: 1.5rem; right: 1.5rem;
            background: transparent; border: none; font-size: 1.8rem; color: #7A7065; cursor: pointer;
        }
        .modal-brand { text-align: center; margin-bottom: 2rem; }
        .modal-brand h2 { font-family: var(--display); font-weight: 800; font-size: 1.5rem; }
        .modal-brand h2 span { color: var(--gold); }
        .modal-brand p { font-size: .85rem; color: var(--muted); margin-top: .3rem; }
        .f-wrap { position: relative; margin-bottom: 1rem; }
        .f-label { display: block; font-size: .75rem; font-weight: 700; color: var(--gold-dk); text-transform: uppercase; margin-bottom: .4rem; }
        .f-in {
            width: 100%; padding: .85rem 1rem .85rem 2.8rem;
            border: 1.5px solid var(--border); border-radius: 12px; font-family: var(--body); font-size: .95rem; outline: none; transition: all .3s;
        }
        .f-in:focus { border-color: var(--gold); box-shadow: 0 0 0 4px rgba(184,144,71,0.1); }
        .f-ico { position: absolute; left: 1rem; top: 2rem; color: var(--gold); font-size: 1.1rem; }
        .btn-submit {
            width: 100%; padding: 1rem; background: linear-gradient(135deg, var(--gold-dk), var(--gold));
            border: none; border-radius: 99px; color: #fff; font-weight: 700; font-size: 1rem; cursor: pointer;
            box-shadow: 0 8px 24px rgba(184,144,71,0.25); margin-top: 1rem; transition: transform .2s;
        }
        .btn-submit:hover { transform: translateY(-2px); }

        @media (max-width: 992px) {
            .tpl-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 600px) {
            .page-title { font-size: 2rem; }
            .tpl-grid { grid-template-columns: repeat(1, 1fr); gap: 1rem; }
        }
    </style>
</head>
<body>

    @include('partials.header')

    <main class="page-content">
        <h1 class="page-title">Select Your <span>Design</span></h1>
        <p class="page-sub">Choose from our collection of premium, handcrafted invitation templates.</p>

        <div class="tpl-grid">
            @foreach($templates as $tpl)
            <a href="{{ route('templates.show', $tpl['id']) }}" class="tpl-card" style="text-decoration: none;">
                <img src="{{ $tpl['image'] }}" alt="{{ $tpl['name'] }}" class="tpl-img" loading="lazy">
                <div class="tpl-info">
                    <div class="tpl-name">{{ $tpl['name'] }}</div>
                    <div class="tpl-hint">{{ $tpl['hint'] }}</div>
                </div>
                <div class="tpl-overlay">
                    <button class="btn-use">Preview & Use</button>
                </div>
            </a>
            @endforeach
        </div>
    </main>

    @include('partials.footer')
    @include('partials.popups')

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
