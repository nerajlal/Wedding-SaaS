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



        /* Form Section */
        .form-section {
            margin-top: 1rem;
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

            <!-- Card Details Form -->
            <form action="{{ route('wedding.payment.process') }}" method="POST" class="form-section">
                @csrf
                

                <!-- Form Fields -->
                <div class="form-group">
                    <label class="form-label" for="card_name">Cardholder Name</label>
                    <input type="text" id="card_name" name="card_name" class="form-input" placeholder="Enter name on card" required autocomplete="cc-name">
                </div>

                <div class="form-group">
                    <label class="form-label" for="card_number">Card Number</label>
                    <div class="position-relative">
                        <input type="text" id="card_number" name="card_number" class="form-input" placeholder="0000 0000 0000 0000" maxlength="19" required autocomplete="cc-number">
                        <i class="bi bi-credit-card position-absolute" style="right: 15px; top: 50%; transform: translateY(-50%); color: var(--muted); font-size: 1.15rem;"></i>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 form-group">
                        <label class="form-label" for="card_expiry">Expiry Date</label>
                        <input type="text" id="card_expiry" name="card_expiry" class="form-input" placeholder="MM/YY" maxlength="5" required autocomplete="cc-exp">
                    </div>
                    <div class="col-6 form-group">
                        <label class="form-label" for="card_cvv">CVV</label>
                        <input type="password" id="card_cvv" name="card_cvv" class="form-input" placeholder="•••" maxlength="3" required autocomplete="cc-csc">
                    </div>
                </div>

                <button type="submit" class="btn-payment mt-3">
                    <span class="btn-spinner"></span>
                    <span>Pay ₹999</span>
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
        // Format Input Fields in Real-time
        const cardNumberInput = document.getElementById('card_number');
        const cardExpiryInput = document.getElementById('card_expiry');

        cardNumberInput.addEventListener('input', function() {
            // Remove non-digit characters
            let val = this.value.replace(/\D/g, '');
            // Limit to 16 digits
            if (val.length > 16) {
                val = val.substring(0, 16);
            }
            // Group by 4 digits
            let formatted = val.match(/.{1,4}/g)?.join(' ') || '';
            this.value = formatted;
        });

        cardExpiryInput.addEventListener('input', function() {
            // Remove non-digit characters
            let val = this.value.replace(/\D/g, '');
            if (val.length > 4) {
                val = val.substring(0, 4);
            }
            if (val.length >= 2) {
                val = val.substring(0, 2) + '/' + val.substring(2, 4);
            }
            this.value = val;
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
        const timerInterval = setInterval(() => {
            if (time <= 0) {
                clearInterval(timerInterval);
                return;
            }
            time--;
            const m = Math.floor(time / 60);
            const s = time % 60;
            timerEl.textContent = `0${m}:${s < 10 ? '0'+s : s}`;
        }, 1000);
    </script>
</body>
</html>

