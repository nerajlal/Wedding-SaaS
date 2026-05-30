<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Cards — Velvet Vows</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Great+Vibes&family=Inter:wght@400;500;600;700&family=Cinzel:wght@600&family=Outfit:wght@400;600;700;800;900&display=swap" rel="stylesheet">
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
        body { 
            font-family: var(--body); 
            background: linear-gradient(135deg, #F9F6F0 0%, #FFFDF9 50%, #F4ECE1 100%);
            min-height: 100vh;
            color: var(--text);
            padding-bottom: 4rem;
        }

        /* ── Header overrides ───────────────────── */
        .premium-nav { background: rgba(255,255,255,0.7) !important; backdrop-filter: blur(20px); }
        
        /* ── Dashboard Layout ───────────────────── */
        .dashboard-container { max-width: 1100px; margin: 3rem auto; padding: 0 1.5rem; }
        
        .dash-header {
            display: flex; align-items: flex-end; justify-content: space-between;
            margin-bottom: 2.5rem; padding-bottom: 1.5rem; border-bottom: 1px solid var(--border);
        }
        .dash-title { font-family: var(--display); font-size: 2.4rem; font-weight: 800; color: var(--text); letter-spacing: -0.5px; margin: 0; }
        .dash-subtitle { font-size: .95rem; color: var(--muted); margin-top: .4rem; }
        
        .btn-create {
            background: linear-gradient(135deg, var(--gold-dk), var(--gold));
            color: #fff; text-decoration: none; font-weight: 700; padding: .8rem 1.6rem;
            border-radius: 99px; display: inline-flex; align-items: center; gap: .5rem;
            box-shadow: 0 10px 25px rgba(184,144,71,0.25); transition: all .3s var(--ease);
        }
        .btn-create:hover { color: #fff; transform: translateY(-2px); box-shadow: 0 15px 35px rgba(184,144,71,0.35); }

        /* ── Empty State ────────────────────────── */
        .empty-state {
            background: rgba(255,255,255,0.6); backdrop-filter: blur(10px);
            border: 1px dashed var(--gold); border-radius: 24px;
            padding: 4rem 2rem; text-align: center;
        }
        .empty-icon { font-size: 3rem; color: var(--gold); margin-bottom: 1rem; opacity: 0.8; }
        .empty-title { font-family: var(--display); font-weight: 700; font-size: 1.4rem; margin-bottom: .5rem; }
        .empty-text { color: var(--muted); font-size: .95rem; margin-bottom: 1.5rem; }

        /* ── Grid & Cards ───────────────────────── */
        .cards-grid {
            display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 1.5rem;
        }
        
        .inv-card {
            background: rgba(255,255,255,0.7); backdrop-filter: blur(15px);
            border: 1px solid rgba(255,255,255,1); border-radius: 20px;
            box-shadow: 0 15px 35px rgba(140,109,59,0.06);
            overflow: hidden; transition: all .3s var(--ease);
            display: flex; flex-direction: column;
        }
        .inv-card:hover { transform: translateY(-5px); box-shadow: 0 25px 50px rgba(140,109,59,0.12); }
        
        .inv-card-visual {
            height: 140px;
            display: flex; align-items: center; justify-content: center;
            position: relative;
        }
        .inv-card-visual::before { content: ''; position: absolute; inset: 0; opacity: 0.8; }
        /* Theme backgrounds */
        .theme-royal-scroll .inv-card-visual { background: #1A1A1A; }
        .theme-royal-scroll .inv-card-visual::before { background: radial-gradient(circle, rgba(184,144,71,0.2) 0%, transparent 70%); }
        .theme-golden-minimalist .inv-card-visual { background: #FDFBF7; }
        .theme-golden-minimalist .inv-card-visual::before { background: linear-gradient(135deg, rgba(223,202,155,0.3) 0%, transparent 100%); }
        .theme-garden-celestial .inv-card-visual { background: #0A1628; }
        .theme-garden-celestial .inv-card-visual::before { background: radial-gradient(circle, rgba(232,197,90,0.15) 0%, transparent 70%); }

        .inv-theme-badge {
            position: absolute; top: 1rem; left: 1rem;
            background: rgba(255,255,255,0.9); backdrop-filter: blur(4px);
            padding: .3rem .8rem; border-radius: 99px;
            font-size: .65rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; color: var(--gold-dk);
        }
        
        .inv-names { position: relative; z-index: 1; font-family: 'Great Vibes', cursive; font-size: 2.2rem; color: #fff; text-shadow: 0 2px 4px rgba(0,0,0,0.3); }
        .theme-golden-minimalist .inv-names { color: var(--text); text-shadow: none; }

        .inv-card-body { padding: 1.5rem; flex: 1; display: flex; flex-direction: column; }
        .inv-date { font-weight: 700; color: var(--text); font-size: .95rem; margin-bottom: .2rem; }
        .inv-venue { font-size: .8rem; color: var(--muted); margin-bottom: 1rem; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
        
        .inv-actions { display: flex; gap: .6rem; margin-top: auto; }
        .btn-card-action {
            flex: 1; text-align: center; padding: .65rem; border-radius: 12px;
            font-size: .85rem; font-weight: 700; text-decoration: none; transition: all .2s;
        }
        .btn-view { background: rgba(184,144,71,0.1); color: var(--gold-dk); border: 1px solid transparent; }
        .btn-view:hover { background: var(--gold-dk); color: #fff; }
        .btn-share { background: #fff; color: var(--text); border: 1px solid var(--border); box-shadow: 0 4px 10px rgba(0,0,0,0.02); }
        .btn-share:hover { border-color: var(--gold); color: var(--gold-dk); }
        
    </style>
</head>
<body>

    @include('partials.header')

    <div class="dashboard-container">
        <div class="dash-header">
            <div>
                <h1 class="dash-title">My Cards</h1>
                <p class="dash-subtitle">Manage and share your created invitations</p>
            </div>
            <a href="{{ url('/') }}#categories" class="btn-create">
                <i class="bi bi-plus-lg"></i> Create New
            </a>
        </div>

        @if($invitations->isEmpty())
            <div class="empty-state">
                <i class="bi bi-envelope-paper empty-icon"></i>
                <h3 class="empty-title">No Invitations Yet</h3>
                <p class="empty-text">You haven't created any wedding invitations. Choose a beautiful theme to get started!</p>
                <a href="{{ url('/') }}#categories" class="btn-create">Browse Themes</a>
            </div>
        @else
            <div class="cards-grid">
                @foreach($invitations as $inv)
                    <div class="inv-card theme-{{ $inv->template }}">
                        <div class="inv-card-visual">
                            <div class="inv-theme-badge">{{ ucwords(str_replace('-', ' ', $inv->template)) }}</div>
                            <form action="{{ route('wedding.destroy', $inv->slug) }}" method="POST" style="position: absolute; top: 1rem; right: 1rem; z-index: 10;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: rgba(220,53,69,0.9); color: white; border: none; border-radius: 50%; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 10px rgba(0,0,0,0.1); cursor: pointer; transition: transform 0.2s;" onclick="return confirm('Are you sure you want to delete this invitation?');" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                            <div class="inv-names">{{ $inv->bride_name }} & {{ $inv->groom_name }}</div>
                        </div>
                        <div class="inv-card-body">
                            <div class="inv-date">
                                <i class="bi bi-calendar-event me-2 text-muted"></i>
                                {{ \Carbon\Carbon::parse($inv->wedding_date)->format('M j, Y') }} at {{ $inv->time }}
                            </div>
                            <div class="inv-venue">
                                <i class="bi bi-geo-alt me-2 text-muted"></i>
                                {{ $inv->venue_name }}
                            </div>
                            
                            <div class="inv-actions">
                                <a href="{{ route('wedding.edit', $inv->slug) }}" class="btn-card-action btn-view" style="flex: 0.5;">
                                    <i class="bi bi-pencil"></i> 
                                </a>
                                @if($inv->is_paid)
                                    <a href="{{ route('wedding.published.show', ['slug' => $inv->slug]) }}" class="btn-card-action btn-view">
                                        <i class="bi bi-eye"></i> View
                                    </a>
                                    <button onclick="navigator.clipboard.writeText('{{ url('/invite/'.$inv->slug) }}'); alert('Link copied!');" class="btn-card-action btn-share">
                                        <i class="bi bi-link-45deg"></i> Copy
                                    </button>
                                @else
                                    <a href="{{ route('wedding.payment.initiate', $inv->slug) }}" class="btn-card-action" style="background: linear-gradient(135deg, #8C6D3B, #B89047); color: #fff; flex: 1.5; border: none; box-shadow: 0 4px 15px rgba(184,144,71,0.2);">
                                        <i class="bi bi-lock-fill"></i> Pay ₹999 to Publish
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Need to include bootstrap bundle for header modal if used -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
