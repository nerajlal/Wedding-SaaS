<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhonePe Checkout — Velvet Vows</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --phonepe-purple: #5F259F;
            --phonepe-light: #F2E8FB;
            --phonepe-green: #14B870;
            --cream-2: #F7F3EB;
            --text: #1E1812;
            --muted: #7A7065;
            --ease: cubic-bezier(0.16,1,0.3,1);
            --body: 'Inter', sans-serif;
            --display: 'Outfit', sans-serif;
        }
        body { 
            font-family: var(--body); 
            background: #F8F9FA;
            color: var(--text);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .checkout-wrapper {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4rem 1rem;
        }

        .phonepe-container {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 15px 50px rgba(95, 37, 159, 0.1);
            border: 1px solid rgba(95, 37, 159, 0.1);
            width: 100%;
            max-width: 900px;
            display: flex;
            overflow: hidden;
            flex-direction: row;
        }

        /* LEFT SIDE */
        .pp-left {
            width: 40%;
            background: linear-gradient(135deg, var(--phonepe-purple) 0%, #481a7a 100%);
            padding: 3rem;
            color: #fff;
            display: flex;
            flex-direction: column;
            position: relative;
        }
        .pp-left::before {
            content: '';
            position: absolute; top: 0; left: 0; right: 0; bottom: 0;
            background: radial-gradient(circle at top right, rgba(255,255,255,0.1) 0%, transparent 60%);
        }
        
        .pp-brand { position: relative; z-index: 1; margin-bottom: auto; }
        .pp-brand img { height: 35px; opacity: 0.9; margin-bottom: 2rem; filter: brightness(0) invert(1); }
        .pp-merchant { font-family: var(--display); font-size: 1.5rem; font-weight: 700; margin-bottom: .2rem; }
        .pp-desc { font-size: .9rem; color: rgba(255,255,255,0.7); }

        .pp-amount-box { position: relative; z-index: 1; margin-top: 3rem; }
        .pp-amount-label { font-size: 1rem; color: rgba(255,255,255,0.8); margin-bottom: .2rem; }
        .pp-amount-val { font-size: 2.5rem; font-weight: 800; font-family: var(--display); letter-spacing: -1px; }
        
        .pp-timer { display: inline-flex; align-items: center; gap: .5rem; background: rgba(255,255,255,0.15); padding: .5rem 1rem; border-radius: 99px; font-size: .85rem; margin-top: 2rem; font-weight: 600; width: max-content; }

        /* RIGHT SIDE */
        .pp-right {
            width: 60%;
            padding: 3.5rem;
            background: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .pp-qr-section { text-align: center; }
        .pp-qr-wrapper {
            background: #fff; padding: 1rem; border-radius: 16px; border: 1px solid #eaeaea; display: inline-block; margin-bottom: 1.5rem; box-shadow: 0 4px 20px rgba(0,0,0,0.03);
        }
        .pp-qr-wrapper img { width: 180px; height: 180px; }
        .pp-qr-text { font-weight: 600; color: var(--text); font-size: 1.1rem; margin-bottom: .3rem; }
        .pp-qr-sub { font-size: .9rem; color: var(--muted); margin-bottom: 2rem; }

        .pp-divider { display: flex; align-items: center; text-align: center; color: #aaa; font-size: .85rem; margin: 2rem 0; }
        .pp-divider::before, .pp-divider::after { content: ''; flex: 1; border-bottom: 1px solid #eaeaea; }
        .pp-divider:not(:empty)::before { margin-right: 1em; }
        .pp-divider:not(:empty)::after { margin-left: 1em; }

        .pp-form-group { text-align: left; margin-bottom: 1rem; }
        .pp-input-wrapper { display: flex; border: 1px solid #ddd; border-radius: 8px; overflow: hidden; transition: all .2s; }
        .pp-input-wrapper:focus-within { border-color: var(--phonepe-purple); box-shadow: 0 0 0 3px var(--phonepe-light); }
        .pp-input { border: none; padding: .8rem 1rem; flex: 1; outline: none; font-size: .95rem; }
        .pp-input-suffix { background: #f8f9fa; padding: .8rem 1rem; color: #555; font-weight: 500; border-left: 1px solid #ddd; }

        .btn-pp {
            width: 100%; background: var(--phonepe-purple); color: #fff; border: none; padding: .9rem; border-radius: 8px; font-weight: 600; font-size: 1rem; margin-top: .5rem; transition: all .2s;
        }
        .btn-pp:hover { background: #481a7a; }

        @media (max-width: 768px) {
            .phonepe-container { flex-direction: column; }
            .pp-left, .pp-right { width: 100%; padding: 2rem; }
            .pp-left { border-radius: 20px 20px 0 0; }
        }
    </style>
</head>
<body>

    @include('partials.header')

    <div class="checkout-wrapper">
        <div class="phonepe-container">
            <!-- Left Side -->
            <div class="pp-left">
                <div class="pp-brand">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c5/PhonePe_Logo.svg/1024px-PhonePe_Logo.svg.png" alt="PhonePe">
                    <div class="pp-merchant">Velvet Vows</div>
                    <div class="pp-desc">Premium Wedding Invitation (Lifetime Access)</div>
                </div>
                
                <div class="pp-amount-box">
                    <div class="pp-amount-label">Amount to pay</div>
                    <div class="pp-amount-val">₹999</div>
                </div>

                <div class="pp-timer">
                    <i class="bi bi-clock-history"></i> <span id="timer">04:59</span>
                </div>
            </div>

            <!-- Right Side -->
            <div class="pp-right">
                
                <div class="pp-qr-section">
                    <div class="pp-qr-wrapper">
                        <!-- Dummy QR Code -->
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=upi://pay?pa=velvetvows@ybl&pn=VelvetVows&am=999.00&cu=INR" alt="QR Code">
                    </div>
                    <div class="pp-qr-text">Scan & Pay</div>
                    <div class="pp-qr-sub">Scan QR code using PhonePe or any UPI app</div>
                </div>

                <div class="pp-divider">OR</div>

                <form action="{{ route('wedding.payment.process') }}" method="POST">
                    @csrf
                    <div class="pp-form-group">
                        <div class="pp-input-wrapper">
                            <input type="text" class="pp-input" placeholder="Enter UPI ID (e.g. 9876543210)" required>
                            <div class="pp-input-suffix">@ybl</div>
                        </div>
                    </div>
                    <button type="submit" class="btn-pp" onclick="this.innerHTML = '<span class=\'spinner-border spinner-border-sm me-2\'></span> Requesting...'; this.style.pointerEvents = 'none';">
                        Verify & Pay
                    </button>
                </form>

            </div>
        </div>
    </div>

    @include('partials.popups')
    @include('partials.footer')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple countdown timer
        let time = 299; // 4:59
        const timerEl = document.getElementById('timer');
        setInterval(() => {
            if (time <= 0) return;
            time--;
            const m = Math.floor(time / 60);
            const s = time % 60;
            timerEl.textContent = `0${m}:${s < 10 ? '0'+s : s}`;
        }, 1000);
    </script>
</body>
</html>
