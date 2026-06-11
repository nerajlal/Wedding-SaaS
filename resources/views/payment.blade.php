<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Payment — Velvet Vows</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@400;600;700;800;900&display=swap" rel="stylesheet">
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
        
        body { 
            font-family: var(--body); 
            background: var(--cream-2);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .payment-wrapper {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem 1rem;
        }

        .payment-container {
            background: var(--cream);
            border-radius: 24px;
            border: 1.5px solid var(--border);
            box-shadow: 0 20px 60px rgba(184,144,71,0.08);
            width: 100%;
            max-width: 700px;
            padding: 3.5rem;
        }

        /* Header */
        .payment-header {
            text-align: center;
            margin-bottom: 3rem;
            border-bottom: 2px solid var(--border);
            padding-bottom: 2rem;
        }
        
        .payment-header h1 {
            font-family: var(--display);
            font-size: 2rem;
            font-weight: 900;
            letter-spacing: -0.5px;
            margin-bottom: 0.5rem;
        }
        
        .payment-header h1 span {
            color: var(--gold);
        }
        
        .payment-header p {
            font-size: 0.95rem;
            color: var(--muted);
            margin: 0;
        }

        /* Order Summary */
        .order-summary {
            background: rgba(184,144,71,0.04);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 2rem;
            margin-bottom: 2.5rem;
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 2rem;
            align-items: center;
        }

        .summary-item {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .summary-label {
            font-size: 0.8rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--gold-dk);
            font-weight: 700;
        }

        .summary-value {
            font-size: 1rem;
            color: var(--text);
            font-weight: 600;
        }

        .summary-amount {
            text-align: right;
        }

        .summary-price {
            font-family: var(--display);
            font-size: 2.5rem;
            font-weight: 900;
            color: var(--gold-dk);
            letter-spacing: -1px;
        }

        .summary-duration {
            font-size: 0.75rem;
            color: var(--muted);
            font-weight: 500;
        }

        /* Payment Methods */
        .payment-methods {
            margin-bottom: 2.5rem;
        }

        .methods-title {
            font-family: var(--display);
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--text);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .payment-option {
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
            padding: 1.5rem;
            border: 2px solid var(--border);
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s var(--ease);
            align-items: center;
        }

        .payment-option:hover {
            border-color: var(--gold);
            background: rgba(184,144,71,0.02);
        }

        .payment-option input[type="radio"] {
            cursor: pointer;
            width: 20px;
            height: 20px;
            accent-color: var(--gold);
        }

        .option-details h3 {
            font-family: var(--display);
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 0.3rem;
            color: var(--text);
        }

        .option-details p {
            font-size: 0.85rem;
            color: var(--muted);
            margin: 0;
        }

        /* QR Code Section */
        .qr-section {
            text-align: center;
            margin: 2rem 0;
        }

        .qr-wrapper {
            background: #fff;
            padding: 1.5rem;
            border-radius: 16px;
            border: 2px dashed var(--border);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.03);
        }

        .qr-wrapper img {
            width: 160px;
            height: 160px;
        }

        .qr-text {
            font-family: var(--display);
            font-weight: 700;
            font-size: 1rem;
            margin-bottom: 0.3rem;
            color: var(--text);
        }

        .qr-sub {
            font-size: 0.85rem;
            color: var(--muted);
        }

        /* Form Section */
        .form-section {
            margin-top: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-size: 0.75rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--gold-dk);
            font-weight: 700;
            margin-bottom: 0.6rem;
        }

        .form-input {
            width: 100%;
            padding: 0.9rem 1.2rem;
            border: 1.5px solid var(--border);
            border-radius: 10px;
            font-family: var(--body);
            font-size: 0.95rem;
            color: var(--text);
            transition: all 0.3s;
            box-sizing: border-box;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(184,144,71,0.1);
        }

        /* Divider */
        .divider-or {
            display: flex;
            align-items: center;
            text-align: center;
            color: var(--muted);
            font-size: 0.85rem;
            margin: 2rem 0;
            font-weight: 600;
        }

        .divider-or::before,
        .divider-or::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid var(--border);
        }

        .divider-or::before {
            margin-right: 1rem;
        }

        .divider-or::after {
            margin-left: 1rem;
        }

        /* Button */
        .btn-payment {
            width: 100%;
            padding: 1.1rem;
            background: linear-gradient(135deg, var(--gold-dk), var(--gold));
            color: #fff;
            border: none;
            border-radius: 10px;
            font-family: var(--display);
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s var(--ease);
            box-shadow: 0 8px 24px rgba(184,144,71,0.25);
            letter-spacing: 0.5px;
        }

        .btn-payment:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(184,144,71,0.35);
        }

        .btn-payment:active {
            transform: translateY(0);
        }

        .btn-payment:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            pointer-events: none;
        }

        .btn-spinner {
            display: none;
            margin-right: 0.6rem;
        }

        /* Timer */
        .timer-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(184,144,71,0.12);
            color: var(--gold-dk);
            padding: 0.5rem 1rem;
            border-radius: 99px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-top: 1.5rem;
        }

        /* Responsive */
        @media (max-width: 640px) {
            .payment-container {
                padding: 2rem;
            }

            .payment-header h1 {
                font-size: 1.6rem;
            }

            .order-summary {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .summary-amount {
                text-align: left;
            }

            .summary-price {
                font-size: 2rem;
            }

            .payment-option {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .payment-option input[type="radio"] {
                order: -1;
            }

            .qr-wrapper img {
                width: 140px;
                height: 140px;
            }
        }
    </style>
</head>
<body>

    @include('partials.header')

    <div class="payment-wrapper">
        <div class="payment-container">
            
            <!-- Header -->
            <div class="payment-header">
                <h1>Complete Your <span>Purchase</span></h1>
                <p>Secure payment to unlock your premium invitation</p>
            </div>

            <!-- Order Summary -->
            <div class="order-summary">
                <div class="summary-item">
                    <div class="summary-label"><i class="bi bi-gift me-2"></i> Package</div>
                    <div class="summary-value">Premium Invitation (Lifetime)</div>
                </div>
                <div class="summary-item summary-amount">
                    <div class="summary-label">Amount</div>
                    <div class="summary-price">₹999</div>
                    <div class="summary-duration">One-time payment</div>
                </div>
            </div>

            <!-- Payment Methods -->
            <div class="payment-methods">
                <div class="methods-title">
                    <i class="bi bi-wallet2"></i> Select Payment Method
                </div>

                <!-- QR Code Option -->
                <label class="payment-option">
                    <input type="radio" name="paymentMethod" value="qr" checked>
                    <div class="option-details">
                        <h3>Scan & Pay</h3>
                        <p>Use any UPI app to scan and pay instantly</p>
                    </div>
                </label>

                <!-- Manual UPI Option -->
                <label class="payment-option">
                    <input type="radio" name="paymentMethod" value="upi">
                    <div class="option-details">
                        <h3>Enter UPI ID</h3>
                        <p>Pay directly from your UPI account</p>
                    </div>
                </label>
            </div>

            <!-- QR Section -->
            <div class="qr-section" id="qrSection">
                <div class="qr-wrapper">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=upi://pay?pa=velvetvows@ybl&pn=VelvetVows&am=999.00&cu=INR" alt="QR Code">
                </div>
                <div class="qr-text">Scan with PhonePe, Google Pay, or any UPI App</div>
                <div class="qr-sub">Payment will be verified automatically</div>
            </div>

            <!-- Divider -->
            <div class="divider-or">OR</div>

            <!-- Form Section -->
            <form action="{{ route('wedding.payment.process') }}" method="POST" class="form-section">
                @csrf
                <div class="form-group" id="upiFormGroup" style="display: none;">
                    <label class="form-label" for="upiId">UPI ID</label>
                    <input type="text" id="upiId" name="upi_id" class="form-input" placeholder="9876543210@ybl" pattern="[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+" title="Enter valid UPI ID">
                </div>

                <button type="submit" class="btn-payment">
                    <span class="btn-spinner"></span>
                    <span>Proceed to Payment</span>
                </button>
            </form>

            <!-- Timer -->
            <div style="text-align: center;">
                <div class="timer-badge">
                    <i class="bi bi-clock-history"></i> 
                    <span>Session expires in <span id="timer">04:59</span></span>
                </div>
            </div>

        </div>
    </div>

    @include('partials.footer')
    @include('partials.popups')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle between payment methods
        document.querySelectorAll('input[name="paymentMethod"]').forEach(radio => {
            radio.addEventListener('change', function() {
                const qrSection = document.getElementById('qrSection');
                const upiFormGroup = document.getElementById('upiFormGroup');
                
                if (this.value === 'qr') {
                    qrSection.style.display = 'block';
                    upiFormGroup.style.display = 'none';
                } else {
                    qrSection.style.display = 'none';
                    upiFormGroup.style.display = 'block';
                }
            });
        });

        // Handle form submission
        document.querySelector('form').addEventListener('submit', function(e) {
            const btn = this.querySelector('.btn-payment');
            const spinner = btn.querySelector('.btn-spinner');
            const text = btn.querySelector('span:last-child');
            
            spinner.style.display = 'inline-block';
            text.textContent = 'Processing...';
            btn.disabled = true;
        });

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

