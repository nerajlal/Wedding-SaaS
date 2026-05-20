<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Velvet Vows - Select Template (Step 2)</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Lato:wght@300;400;700&family=Great+Vibes&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #FFFFFF;
        }
        .template-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        /* Style for active select cards */
        .template-card.active-royal {
            border-color: #C59B27 !important;
            ring-width: 4px !important;
            --tw-ring-color: #C59B27 !important;
            box-shadow: 0 10px 25px -5px rgba(197, 155, 39, 0.25) !important;
        }
        .template-card.active-minimalist {
            border-color: #C59B27 !important;
            border-width: 2px !important;
            ring-width: 4px !important;
            --tw-ring-color: #C59B27 !important;
            box-shadow: 0 10px 25px -5px rgba(197, 155, 39, 0.25) !important;
        }
        .template-card.active-celestial {
            border-color: #C59B27 !important;
            border-width: 2px !important;
            ring-width: 4px !important;
            --tw-ring-color: #C59B27 !important;
            box-shadow: 0 10px 25px -5px rgba(197, 155, 39, 0.25) !important;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 antialiased">

    <!-- Device Frame / Main Container -->
    <div class="w-full max-w-[420px] bg-[#FDF9F1] rounded-[2.5rem] shadow-2xl overflow-hidden relative border-8 border-[#1A1A1A]">
        
        <!-- Header Section -->
        <div class="bg-[#1A1A1A] pt-10 pb-4 px-6 text-center">
            <h1 class="font-['Playfair_Display'] text-[1.4rem] font-bold text-[#C59B27] tracking-wide mb-1">Choose Your Template</h1>
            <p class="font-['Lato'] text-[#857B72] text-xs mb-4">Step 2 of 3</p>
            
            <!-- Progress Bar -->
            <div class="flex gap-2 w-full max-w-[280px] mx-auto">
                <div class="h-1 flex-1 bg-[#C59B27] rounded-full"></div>
                <div class="h-1 flex-1 bg-[#C59B27] rounded-full"></div>
                <div class="h-1 flex-1 bg-[#3A3324] rounded-full"></div>
            </div>
        </div>

        <!-- Form Section -->
        <form action="{{ route('wedding.template.store') }}" method="POST" class="p-6 pb-28 space-y-4">
            @csrf
            
            <!-- Subtitle -->
            <p class="text-xs text-[#857B72] italic font-semibold font-['Lato'] text-center">Your details are shown inside each design</p>
            
            <!-- Hidden Input for selected template -->
            <input type="hidden" name="template" id="selected-template" value="royal-scroll">

            <!-- Card 1: The Royal Scroll (Full Width, Large Card) -->
            <div onclick="selectTemplate('royal-scroll')" id="card-royal-scroll" class="template-card relative w-full bg-[#1A1A1A] border-2 border-dashed border-[#C59B27] rounded-2xl p-6 cursor-pointer text-center text-[#E4D1A6] font-['Playfair_Display'] shadow-lg active-royal">
                
                <!-- Selected Badge (Shown conditionally) -->
                <span id="badge-royal-scroll" class="absolute top-3 right-3 bg-[#C59B27] text-black text-[0.6rem] font-bold py-1 px-3 rounded-full uppercase tracking-wider shadow">Selected</span>
                
                <!-- Card Header -->
                <p class="text-[0.65rem] uppercase tracking-[0.25em] text-[#C59B27] font-semibold mb-2">✦ The Royal Scroll ✦</p>
                
                <!-- Bride Name -->
                <h3 class="text-3xl font-bold tracking-wide mt-1 text-[#FFFDF9]">{{ $details['bride_name'] }}</h3>
                
                <!-- "weds" text -->
                <p class="text-sm italic font-light text-[#C59B27] my-1">weds</p>
                
                <!-- Groom Name -->
                <h3 class="text-3xl font-bold tracking-wide text-[#FFFDF9]">{{ $details['groom_name'] }}</h3>
                
                <!-- Subtitle with Live Details -->
                <p class="text-[0.65rem] text-[#C59B27] tracking-wider mt-4">
                    {{ \Carbon\Carbon::parse($details['wedding_date'])->format('j F Y') }} &bull; {{ $details['venue_name'] }} &bull; {{ $details['time'] }}
                </p>
            </div>

            <!-- Two-Column Grid for bottom cards -->
            <div class="grid grid-cols-2 gap-4">
                
                <!-- Card 2: Golden Minimalist (Half-width, Vertical Card) -->
                <div onclick="selectTemplate('golden-minimalist')" id="card-golden-minimalist" class="template-card relative bg-white border border-[#E4D1A6] rounded-2xl p-4 cursor-pointer text-center flex flex-col justify-between shadow h-[200px]">
                    
                    <!-- Selected Badge -->
                    <span id="badge-golden-minimalist" class="absolute top-2 right-2 bg-[#C59B27] text-black text-[0.5rem] font-bold py-0.5 px-2 rounded-full uppercase tracking-wider shadow hidden">Selected</span>

                    <!-- Monogram Initials -->
                    <p class="text-[0.65rem] font-bold text-[#C59B27] tracking-widest uppercase">
                        {{ substr($details['bride_name'], 0, 1) }} &amp; {{ substr($details['groom_name'], 0, 1) }}
                    </p>

                    <!-- Vertical Names block -->
                    <div class="my-2">
                        <h4 class="font-['Playfair_Display'] font-bold text-gray-900 text-sm leading-tight">{{ $details['bride_name'] }}</h4>
                        <p class="text-[0.65rem] text-[#C59B27] my-0.5">&amp;</p>
                        <h4 class="font-['Playfair_Display'] font-bold text-gray-900 text-sm leading-tight">{{ $details['groom_name'] }}</h4>
                    </div>

                    <!-- Date & Template Footer -->
                    <div>
                        <p class="text-[0.6rem] text-gray-400 font-['Lato']">{{ \Carbon\Carbon::parse($details['wedding_date'])->format('j F Y') }}</p>
                        <p class="text-[0.55rem] text-gray-400 uppercase tracking-wider font-semibold mt-1 font-['Lato']">Golden Minimalist</p>
                    </div>
                </div>

                <!-- Card 3: Garden Celestial (Half-width, Vertical Card) -->
                <div onclick="selectTemplate('garden-celestial')" id="card-garden-celestial" class="template-card relative bg-[#0A1628] border border-[#E4D1A6] rounded-2xl p-4 cursor-pointer text-center flex flex-col justify-between shadow h-[200px]">
                    
                    <!-- Selected Badge -->
                    <span id="badge-garden-celestial" class="absolute top-2 right-2 bg-[#C59B27] text-black text-[0.5rem] font-bold py-0.5 px-2 rounded-full uppercase tracking-wider shadow hidden">Selected</span>

                    <!-- Monogram Motif -->
                    <div class="text-[#E8C55A] text-[0.65rem] select-none">🌙 ✨</div>

                    <!-- Vertical Names block (Elegant Serif Gold/White) -->
                    <div class="my-2 text-[#E8C55A]">
                        <h4 class="font-['Playfair_Display'] font-bold text-white text-sm italic leading-tight">{{ $details['bride_name'] }}</h4>
                        <p class="text-[0.65rem] text-[#E8C55A] my-0.5">&amp;</p>
                        <h4 class="font-['Playfair_Display'] font-bold text-white text-sm italic leading-tight">{{ $details['groom_name'] }}</h4>
                    </div>

                    <!-- Date & Template Footer -->
                    <div>
                        <p class="text-[0.6rem] text-white/60 font-['Lato']">{{ \Carbon\Carbon::parse($details['wedding_date'])->format('j F Y') }}</p>
                        <p class="text-[0.55rem] text-white/50 uppercase tracking-wider font-semibold mt-1 font-['Lato']">Garden Celestial</p>
                    </div>
                </div>

            </div>

            <!-- Hint text -->
            <p class="text-[0.7rem] text-[#857B72] italic font-semibold text-center mt-2">Tap a template to select it</p>

            <!-- Bottom Navigation CTA Button -->
            <div class="pt-4 pb-2 flex justify-center">
                <button type="submit" class="w-full max-w-[280px] bg-[#C59B27] hover:bg-[#B58B22] text-black font-extrabold py-3.5 px-6 rounded-full shadow-lg transition duration-200 uppercase tracking-wide text-sm font-['Playfair_Display']">
                    Preview This Invitation →
                </button>
            </div>

        </form>
    </div>

    <script>
        function selectTemplate(templateName) {
            // Update hidden input field
            document.getElementById('selected-template').value = templateName;

            // 1. Reset all cards to their default inactive styling
            const royalCard = document.getElementById('card-royal-scroll');
            const minimalistCard = document.getElementById('card-golden-minimalist');
            const celestialCard = document.getElementById('card-garden-celestial');

            royalCard.className = "template-card relative w-full bg-[#1A1A1A] border-2 border-dashed border-[#C59B27] rounded-2xl p-6 cursor-pointer text-center text-[#E4D1A6] font-['Playfair_Display'] shadow-lg";
            minimalistCard.className = "template-card relative bg-white border border-[#E4D1A6] rounded-2xl p-4 cursor-pointer text-center flex flex-col justify-between shadow h-[200px]";
            celestialCard.className = "template-card relative bg-[#0A1628] border border-[#E4D1A6] rounded-2xl p-4 cursor-pointer text-center flex flex-col justify-between shadow h-[200px]";

            // Hide all selected badges
            document.getElementById('badge-royal-scroll').classList.add('hidden');
            document.getElementById('badge-golden-minimalist').classList.add('hidden');
            document.getElementById('badge-garden-celestial').classList.add('hidden');

            // 2. Add active classes and show badge on the selected card
            const activeCard = document.getElementById('card-' + templateName);
            const activeBadge = document.getElementById('badge-' + templateName);

            if (templateName === 'royal-scroll') {
                activeCard.classList.add('active-royal', 'border-solid');
            } else if (templateName === 'golden-minimalist') {
                activeCard.classList.add('active-minimalist');
            } else if (templateName === 'garden-celestial') {
                activeCard.classList.add('active-celestial');
            }

            activeBadge.classList.remove('hidden');
        }

        // Initialize template selection to 'royal-scroll' on load
        document.addEventListener('DOMContentLoaded', function() {
            selectTemplate('royal-scroll');
        });
    </script>
</body>
</html>
