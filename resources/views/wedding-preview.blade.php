<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Velvet Vows - Live Invitation Preview (Step 3)</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Lato:wght@300;400;700&family=Great+Vibes&family=Cinzel:wght@400;600;700&family=Cormorant+Garamond:ital,wght@0,300;0,600;0,700;1,300&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #FFFFFF;
        }
        /* Custom scrollbar styling inside the preview container */
        .preview-scroll::-webkit-scrollbar {
            width: 4px;
        }
        .preview-scroll::-webkit-scrollbar-track {
            background: transparent;
        }
        .preview-scroll::-webkit-scrollbar-thumb {
            background: rgba(197, 155, 39, 0.3);
            border-radius: 2px;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 antialiased">

    <!-- Device Frame / Main Container -->
    <div class="w-full max-w-[420px] bg-[#FDF9F1] rounded-[2.5rem] shadow-2xl overflow-hidden relative border-8 border-[#1A1A1A]">
        
        <!-- Header Section -->
        <div class="bg-[#1A1A1A] pt-10 pb-4 px-6 text-center">
            <h1 class="font-['Playfair_Display'] text-[1.4rem] font-bold text-[#C59B27] tracking-wide mb-1">Preview & Publish</h1>
            <p class="font-['Lato'] text-[#857B72] text-xs mb-4">Step 3 of 3</p>
            
            <!-- Progress Bar (Fully Filled) -->
            <div class="flex gap-2 w-full max-w-[280px] mx-auto">
                <div class="h-1 flex-1 bg-[#C59B27] rounded-full"></div>
                <div class="h-1 flex-1 bg-[#C59B27] rounded-full"></div>
                <div class="h-1 flex-1 bg-[#C59B27] rounded-full"></div>
            </div>
        </div>

        <!-- Ultra-Premium Payment Alert Banner -->
        <div class="bg-[#C59B27]/10 border-y border-[#C59B27]/30 py-2.5 px-4 text-center">
            <p class="text-[0.65rem] font-bold tracking-wider text-[#C59B27] uppercase animate-pulse flex items-center justify-center gap-1.5">
                ⚠️ Preview only — payment required to publish
            </p>
        </div>

        <!-- Preview Canvas Container (Scrollable) -->
        <div class="h-[430px] overflow-y-auto preview-scroll relative p-4 space-y-6">
            
            @if($template === 'royal-scroll')
                <!-- THE ROYAL SCROLL PREVIEW CARD -->
                <div class="bg-[#1A1A1A] border-2 border-dashed border-[#C59B27] rounded-2xl p-6 text-center text-[#E4D1A6] font-['Playfair_Display'] shadow-lg relative">
                    
                    <!-- Header -->
                    <p class="text-[0.65rem] uppercase tracking-[0.2em] text-[#C59B27] font-semibold mb-2">✦ Request the Honour ✦</p>
                    <p class="text-xs italic text-[#C59B27]/80 font-light mb-6">of your presence at the marriage of</p>
                    
                    <!-- Names -->
                    <h2 class="text-3xl font-bold tracking-wide text-[#FFFDF9] leading-tight mb-2">{{ $details['bride_name'] }}</h2>
                    <p class="text-lg italic text-[#C59B27] my-1">&amp;</p>
                    <h2 class="text-3xl font-bold tracking-wide text-[#FFFDF9] leading-tight mb-6">{{ $details['groom_name'] }}</h2>
                    
                    <!-- Horizontal Divider -->
                    <div class="w-full h-px bg-gradient-to-r from-transparent via-[#C59B27] to-transparent my-4"></div>

                    <!-- Date & Time -->
                    <p class="text-sm font-semibold tracking-wide text-[#FFFDF9]">
                        {{ \Carbon\Carbon::parse($details['wedding_date'])->format('l · j F Y') }}
                    </p>
                    <p class="text-xs text-[#C59B27] mt-1">{{ $details['time'] }} onwards</p>

                    <!-- Horizontal Divider -->
                    <div class="w-full h-px bg-gradient-to-r from-transparent via-[#C59B27] to-transparent my-4"></div>

                    <!-- Venue -->
                    <p class="text-sm font-bold text-[#FFFDF9]">{{ $details['venue_name'] }}</p>
                    <p class="text-[0.65rem] text-[#857B72] tracking-wide mt-1 leading-relaxed max-w-[240px] mx-auto">{{ $details['venue_address'] }}</p>

                    <!-- Additional Details -->
                    <div class="mt-6 space-y-2 text-[0.65rem] text-[#C59B27]/90 font-sans tracking-wide">
                        @if(isset($details['rsvp_deadline']))
                            <p>RSVP by {{ \Carbon\Carbon::parse($details['rsvp_deadline'])->format('j F') }} &bull; {{ $details['rsvp_contact'] }}</p>
                        @else
                            <p>RSVP: {{ $details['rsvp_contact'] }}</p>
                        @endif

                        @if(isset($details['dress_code']))
                            <p class="uppercase font-semibold tracking-widest text-[0.55rem] text-[#FFFDF9] mt-2">Dress Code: {{ str_replace('_', ' ', $details['dress_code']) }}</p>
                        @endif
                    </div>

                    <!-- Bottom Filigree Message -->
                    @if(isset($details['personal_message']))
                        <p class="text-[0.65rem] text-[#C59B27] italic mt-6 font-serif">✦ {{ $details['personal_message'] }} ✦</p>
                    @else
                        <p class="text-[0.65rem] text-[#C59B27] italic mt-6 font-serif">✦ With joy in our hearts, we welcome you ✦</p>
                    @endif
                </div>

            @elseif($template === 'golden-minimalist')
                <!-- GOLDEN MINIMALIST PREVIEW CARD -->
                <div class="bg-white border border-[#E4D1A6] rounded-2xl p-6 text-center text-gray-900 font-['Playfair_Display'] shadow-lg relative">
                    
                    <!-- Monogram Initials -->
                    <div class="w-12 h-12 rounded-full border border-[#C59B27] flex items-center justify-center mx-auto mb-4 text-xs font-bold text-[#C59B27]">
                        {{ substr($details['bride_name'], 0, 1) }} &amp; {{ substr($details['groom_name'], 0, 1) }}
                    </div>

                    <p class="text-[0.55rem] uppercase tracking-[0.25em] text-[#C8A882] font-semibold mb-3 font-['Lato']">JOIN US TO CELEBRATE THE WEDDING OF</p>

                    <!-- Names -->
                    <h2 class="text-2xl font-black text-gray-900 leading-tight">{{ $details['bride_name'] }}</h2>
                    <p class="text-sm font-['Great_Vibes'] text-[#C59B27] my-1">&amp;</p>
                    <h2 class="text-2xl font-black text-gray-900 leading-tight mb-4">{{ $details['groom_name'] }}</h2>
                    
                    <div class="border-y border-gray-100 py-3 my-4 flex justify-around items-center font-['Lato']">
                        <div>
                            <p class="text-[0.55rem] uppercase tracking-wider text-gray-400">DATE</p>
                            <p class="text-xs font-bold text-gray-800 mt-0.5">{{ \Carbon\Carbon::parse($details['wedding_date'])->format('M j, Y') }}</p>
                        </div>
                        <div class="h-5 w-px bg-gray-200"></div>
                        <div>
                            <p class="text-[0.55rem] uppercase tracking-wider text-gray-400">TIME</p>
                            <p class="text-xs font-bold text-gray-800 mt-0.5">{{ $details['time'] }}</p>
                        </div>
                    </div>

                    <!-- Venue -->
                    <div class="my-4">
                        <p class="text-[0.6rem] uppercase tracking-wider text-[#C8A882] font-bold font-['Lato'] mb-0.5">THE VENUE</p>
                        <p class="font-bold text-xs text-gray-800">{{ $details['venue_name'] }}</p>
                        <p class="text-[0.65rem] text-gray-500 max-w-[220px] mx-auto mt-0.5 leading-relaxed font-['Lato']">{{ $details['venue_address'] }}</p>
                    </div>

                    <!-- RSVP & Info details -->
                    <div class="bg-gray-50 rounded-xl p-3 border border-gray-100 my-4 text-[0.65rem] text-gray-600 font-['Lato'] space-y-1">
                        @if(isset($details['rsvp_deadline']))
                            <p><span class="font-bold text-gray-400">RSVP BY:</span> {{ \Carbon\Carbon::parse($details['rsvp_deadline'])->format('d M Y') }}</p>
                        @endif
                        <p><span class="font-bold text-gray-400">RSVP TO:</span> {{ $details['rsvp_contact'] }}</p>
                    </div>

                    @if(isset($details['dress_code']))
                        <div class="my-3 font-['Lato']">
                            <span class="inline-block text-[0.6rem] font-bold text-gray-700 border border-gray-300 px-3 py-1 rounded-full uppercase tracking-wider">
                                Dress Code: {{ str_replace('_', ' ', $details['dress_code']) }}
                            </span>
                        </div>
                    @endif

                    @if(isset($details['personal_message']))
                        <p class="text-[0.65rem] text-gray-500 italic mt-6">"{{ $details['personal_message'] }}"</p>
                    @endif
                </div>

            @elseif($template === 'garden-celestial')
                <!-- GARDEN CELESTIAL PREVIEW CARD -->
                <div class="bg-[#0A1628] border-2 border-[#E8C55A] rounded-2xl p-6 text-center text-[#E8C55A] font-['Cinzel'] shadow-lg relative overflow-hidden">
                    
                    <!-- Celestial Header Motif -->
                    <div class="text-lg mb-3 select-none">🌙 ✨ ⭐</div>

                    <p class="text-[0.55rem] uppercase tracking-[0.25em] text-white/70 mb-3">Under the starlit sky, join the wedding of</p>

                    <!-- Names -->
                    <h2 class="font-['Great_Vibes'] text-4xl font-normal text-white leading-tight capitalize my-1">{{ $details['bride_name'] }}</h2>
                    <p class="text-xs uppercase text-[#E8C55A] my-2">&amp;</p>
                    <h2 class="font-['Great_Vibes'] text-4xl font-normal text-white leading-tight capitalize mb-4">{{ $details['groom_name'] }}</h2>
                    
                    <div class="w-10 h-px bg-[#E8C55A] mx-auto my-3"></div>

                    <!-- Date & Time -->
                    <h3 class="text-xs font-bold text-white tracking-widest uppercase mb-0.5">
                        {{ \Carbon\Carbon::parse($details['wedding_date'])->format('l · F j, Y') }}
                    </h3>
                    <p class="text-[0.65rem] text-white/80 font-sans tracking-wide">at {{ $details['time'] }} onwards</p>

                    <!-- Venue -->
                    <div class="border border-[#E8C55A]/30 rounded-xl p-3 bg-[#0A1628]/60 backdrop-blur-sm my-4">
                        <p class="text-[0.55rem] uppercase tracking-widest text-[#E8C55A] font-bold mb-0.5">CELESTIAL VENUE</p>
                        <p class="text-white font-bold text-xs">{{ $details['venue_name'] }}</p>
                        <p class="text-[0.65rem] text-white/70 mt-1 leading-relaxed font-sans">{{ $details['venue_address'] }}</p>
                    </div>

                    <!-- Details -->
                    <div class="text-[0.6rem] text-white/80 font-sans tracking-wide space-y-1 mt-4">
                        @if(isset($details['rsvp_deadline']))
                            <p>RSVP BY: {{ \Carbon\Carbon::parse($details['rsvp_deadline'])->format('M d, Y') }} &bull; {{ $details['rsvp_contact'] }}</p>
                        @else
                            <p>RSVP TO: {{ $details['rsvp_contact'] }}</p>
                        @endif

                        @if(isset($details['dress_code']))
                            <span class="inline-block text-[0.65rem] font-bold text-white border border-[#E8C55A] px-2.5 py-0.5 rounded-full uppercase tracking-widest bg-[#E8C55A]/10 mt-2">
                                Dress: {{ str_replace('_', ' ', $details['dress_code']) }}
                            </span>
                        @endif
                    </div>

                    @if(isset($details['personal_message']))
                        <p class="text-[0.65rem] text-white/60 font-sans italic mt-6 leading-relaxed">"{{ $details['personal_message'] }}"</p>
                    @endif
                </div>
            @endif

            <!-- Navigation Buttons Container (scrolls naturally below content card) -->
            <div class="flex gap-4 pt-2 justify-center">
                
                <!-- Back / Change Template Button -->
                <a href="{{ route('wedding.template.show') }}" class="flex-1 max-w-[160px] bg-transparent border border-[#C59B27] text-[#C59B27] hover:bg-[#C59B27]/10 font-bold py-3.5 px-4 rounded-full text-center shadow transition duration-200 text-xs font-['Playfair_Display'] flex items-center justify-center gap-1">
                    ← Change Template
                </a>
                
                <!-- Proceed to Payment Button (Triggers simulated Razorpay overlay) -->
                <button onclick="openPaymentModal()" type="button" class="flex-1 max-w-[160px] bg-[#C59B27] hover:bg-[#B58B22] text-black font-extrabold py-3.5 px-4 rounded-full shadow-lg transition duration-200 text-xs font-['Playfair_Display'] uppercase tracking-wider cursor-pointer">
                    Proceed to Payment →
                </button>

            </div>

            <!-- Hint text -->
            <p class="text-[0.7rem] text-[#857B72] italic font-semibold text-center mt-2 font-['Lato']">This is exactly how your guests will see it</p>

        </div>
    </div>

    <!-- Razorpay Checkout Simulator Modal -->
    <div id="razorpay-modal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[999] hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl w-full max-w-sm overflow-hidden shadow-2xl relative border border-gray-100 flex flex-col">
            
            <!-- Razorpay Header -->
            <div class="bg-[#0F1C3F] p-5 text-white flex justify-between items-center">
                <div class="flex items-center gap-2">
                    <span class="bg-blue-600 px-2 py-1 rounded-lg text-white font-black text-[0.6rem] tracking-wider font-mono">RP</span>
                    <div>
                        <h3 class="font-bold text-xs leading-tight font-sans">Velvet Vows</h3>
                        <p class="text-[0.55rem] text-gray-300 font-sans font-light">Premium Invitation Publishing</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-[0.5rem] text-gray-400 uppercase tracking-wider font-semibold font-sans">Amount</p>
                    <p class="text-base font-bold text-[#E8C55A] font-sans">₹499.00</p>
                </div>
            </div>

            <!-- Razorpay Form Body -->
            <div class="p-6 space-y-4 flex-grow font-sans" id="checkout-form-body">
                <div class="flex justify-between items-center pb-2 border-b border-gray-100">
                    <p class="text-[0.65rem] uppercase tracking-wider font-bold text-gray-400">Simulated Payment Method</p>
                    <button onclick="closePaymentModal()" class="text-gray-400 hover:text-gray-600 text-xs font-bold font-sans">✕ Cancel</button>
                </div>
                
                <!-- Payment methods options -->
                <div class="space-y-2.5">
                    <label class="flex items-center justify-between p-3 rounded-xl border-2 border-blue-500 bg-blue-50/20 cursor-pointer hover:bg-blue-50/40 transition">
                        <div class="flex items-center gap-3">
                            <span class="text-base">💳</span>
                            <div class="text-left">
                                <p class="text-[0.7rem] font-bold text-gray-800">Credit / Debit Card</p>
                                <p class="text-[0.55rem] text-gray-500">Visa, Mastercard, RuPay</p>
                            </div>
                        </div>
                        <input type="radio" name="payment_method" value="card" checked class="accent-blue-600">
                    </label>

                    <label class="flex items-center justify-between p-3 rounded-xl border border-gray-100 cursor-pointer hover:bg-gray-50 transition">
                        <div class="flex items-center gap-3">
                            <span class="text-base">⚡</span>
                            <div class="text-left">
                                <p class="text-[0.7rem] font-bold text-gray-800">UPI / QR Code</p>
                                <p class="text-[0.55rem] text-gray-500">Google Pay, PhonePe, Paytm</p>
                            </div>
                        </div>
                        <input type="radio" name="payment_method" value="upi" class="accent-blue-600">
                    </label>

                    <label class="flex items-center justify-between p-3 rounded-xl border border-gray-100 cursor-pointer hover:bg-gray-50 transition">
                        <div class="flex items-center gap-3">
                            <span class="text-base">🏦</span>
                            <div class="text-left">
                                <p class="text-[0.7rem] font-bold text-gray-800">Net Banking</p>
                                <p class="text-[0.55rem] text-gray-500">All major Indian banks</p>
                            </div>
                        </div>
                        <input type="radio" name="payment_method" value="netbanking" class="accent-blue-600">
                    </label>
                </div>

                <div class="pt-2">
                    <button onclick="startSimulatedPayment()" type="button" class="w-full bg-[#3399FF] hover:bg-blue-600 text-white font-extrabold py-3.5 px-4 rounded-xl shadow-md transition duration-200 text-xs uppercase tracking-wider flex items-center justify-center gap-2 cursor-pointer">
                        Pay ₹499.00 Securely →
                    </button>
                </div>
            </div>

            <!-- Razorpay Processing Loader (Hidden initially) -->
            <div class="p-8 hidden flex flex-col items-center justify-center text-center space-y-6 flex-grow" id="checkout-loader-body">
                <div class="w-10 h-10 border-[3px] border-blue-100 border-t-blue-600 rounded-full animate-spin"></div>
                <div>
                    <h4 class="font-bold text-gray-800 text-xs font-sans">Processing Simulated Payment...</h4>
                    <p class="text-[0.6rem] text-gray-400 mt-1 font-sans">Please do not close this window or refresh</p>
                </div>
            </div>

            <!-- Razorpay Footer -->
            <div class="bg-gray-50 py-3.5 text-center border-t border-gray-100 flex items-center justify-center gap-1 text-[0.55rem] font-bold text-gray-400 uppercase tracking-widest font-sans">
                🛡️ Secured by Razorpay
            </div>
            
        </div>
    </div>

    <script>
        function openPaymentModal() {
            document.getElementById('razorpay-modal').classList.remove('hidden');
        }

        function closePaymentModal() {
            document.getElementById('razorpay-modal').classList.add('hidden');
        }

        function startSimulatedPayment() {
            // Hide form and show loader
            document.getElementById('checkout-form-body').classList.add('hidden');
            document.getElementById('checkout-loader-body').classList.remove('hidden');
            
            // Wait 2.2 seconds to simulate processing, then redirect to the published invitation page
            setTimeout(() => {
                window.location.href = "wedding-published.blade.php";
            }, 2200);
        }
    </script>
</body>
</html>
