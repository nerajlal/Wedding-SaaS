<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Velvet Vows - Wedding Details (Step 1)</title>
    <!-- Use Tailwind CSS CDN for quick setup if assets aren't built yet. -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <!-- Flatpickr (beautiful calendar date picker) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #FFFFFF; /* Matches the sign-in page background */
        }
        /* Flatpickr Custom Theme Styling to match Velvet Vows */
        .flatpickr-calendar {
            background: #FDF9F1 !important;
            border: 2px solid #D4AF37 !important;
            box-shadow: 0 10px 25px -5px rgba(212, 175, 55, 0.2) !important;
            font-family: 'Lato', sans-serif;
            border-radius: 1rem !important;
        }
        .flatpickr-day.selected, 
        .flatpickr-day.startRange, 
        .flatpickr-day.endRange, 
        .flatpickr-day.selected.inRange, 
        .flatpickr-day.startRange.inRange, 
        .flatpickr-day.endRange.inRange, 
        .flatpickr-day.selected:focus, 
        .flatpickr-day.startRange:focus, 
        .flatpickr-day.endRange:focus, 
        .flatpickr-day.selected:hover, 
        .flatpickr-day.startRange:hover, 
        .flatpickr-day.endRange:hover, 
        .flatpickr-day.prevMonthDay.selected, 
        .flatpickr-day.nextMonthDay.selected {
            background: #C59B27 !important;
            border-color: #C59B27 !important;
            color: #fff !important;
        }
        .flatpickr-day:hover {
            background: #F5E6A3 !important;
        }
        .flatpickr-months .flatpickr-month {
            background: #1A1A1A !important;
            color: #C59B27 !important;
            border-top-left-radius: 0.8rem;
            border-top-right-radius: 0.8rem;
        }
        .flatpickr-current-month .flatpickr-monthDropdown-months {
            background: #1A1A1A !important;
            color: #C59B27 !important;
        }
        .flatpickr-monthDropdown-month {
            background: #1A1A1A !important;
            color: #C59B27 !important;
        }
        .flatpickr-current-month input.cur-year {
            color: #C59B27 !important;
        }
        .flatpickr-months .flatpickr-prev-month, .flatpickr-months .flatpickr-next-month {
            color: #C59B27 !important;
            fill: #C59B27 !important;
        }
        .flatpickr-months .flatpickr-prev-month:hover, .flatpickr-months .flatpickr-next-month:hover {
            color: #fff !important;
        }
        span.flatpickr-weekday {
            color: #857B72 !important;
            font-weight: bold;
        }
        
        .form-label {
            font-family: 'Playfair Display', serif;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            font-weight: 700;
            color: #C59B27;
            text-transform: uppercase;
            display: block;
            margin-bottom: 0.3rem;
        }
        .form-input {
            font-family: 'Lato', sans-serif;
            width: 100%;
            border: 1px solid #e5e7eb;
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
            color: #4b5563;
            outline: none;
            transition: border-color 0.2s ease;
            background-color: #fff;
        }
        .form-input:focus {
            border-color: #C59B27;
        }
        /* Custom styling for the optional tag */
        .optional-tag {
            color: #9ca3af;
            text-transform: lowercase;
            font-family: 'Lato', sans-serif;
            font-size: 0.7rem;
            letter-spacing: 0;
            font-weight: 400;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 antialiased">

    <!-- Device Frame / Main Container -->
    <div class="w-full max-w-[420px] bg-[#FDF9F1] rounded-[2.5rem] shadow-2xl overflow-hidden relative border-8 border-[#1A1A1A]">
        
        <!-- Header Section -->
        <div class="bg-[#1A1A1A] pt-10 pb-4 px-6 text-center">
            <h1 class="font-['Playfair_Display'] text-[1.4rem] font-bold text-[#C59B27] tracking-wide mb-1">Your Wedding Details</h1>
            <p class="font-['Lato'] text-[#857B72] text-xs mb-4">Step 1 of 3</p>
            
            <!-- Progress Bar -->
            <div class="flex gap-2 w-full max-w-[280px] mx-auto">
                <div class="h-1 flex-1 bg-[#C59B27] rounded-full"></div>
                <div class="h-1 flex-1 bg-[#3A3324] rounded-full"></div>
                <div class="h-1 flex-1 bg-[#3A3324] rounded-full"></div>
            </div>
        </div>

        <!-- Form Section -->
        <form action="{{ route('wedding.details.store') }}" method="POST" enctype="multipart/form-data" class="p-6 pb-28 space-y-5">
            @csrf
            
            @if ($errors->any())
                <div class="bg-red-50 border-2 border-red-200 p-4 rounded-xl">
                    <div class="flex gap-2">
                        <span class="text-red-500 font-bold">⚠️</span>
                        <div>
                            <p class="text-xs font-bold text-red-800 uppercase tracking-wider">Please fill in all required fields:</p>
                            <ul class="mt-1 list-disc list-inside text-[0.7rem] text-red-700 font-medium space-y-0.5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
            
            <div class="grid grid-cols-2 gap-4">
                <!-- Bride's Name -->
                <div>
                    <label class="form-label">Bride's Name</label>
                    <input type="text" name="bride_name" class="form-input border-[#C59B27]" value="{{ old('bride_name') }}" placeholder="Enter name..." autocomplete="new-password" required>
                </div>
                <!-- Groom's Name -->
                <div>
                    <label class="form-label">Groom's Name</label>
                    <input type="text" name="groom_name" class="form-input" value="{{ old('groom_name') }}" placeholder="Enter name..." autocomplete="new-password" required>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <!-- Wedding Date -->
                <div>
                    <label class="form-label">Wedding Date</label>
                    <input type="text" name="wedding_date" class="form-input datepicker" value="{{ old('wedding_date') }}" placeholder="Pick date..." required>
                </div>
                <!-- Time -->
                <div>
                    <label class="form-label">Time</label>
                    <input type="text" name="time" class="form-input timepicker" value="{{ old('time') }}" placeholder="7:00 PM" required>
                </div>
            </div>

            <!-- Venue Name -->
            <div>
                <label class="form-label">Venue Name</label>
                <input type="text" name="venue_name" class="form-input" value="{{ old('venue_name') }}" placeholder="Enter venue name..." autocomplete="new-password" required>
            </div>

            <!-- Venue Address -->
            <div>
                <label class="form-label">Venue Address</label>
                <textarea name="venue_address" rows="2" class="form-input resize-none" placeholder="Street / Area...&#10;City, State" required>{{ old('venue_address') }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <!-- RSVP Deadline -->
                <div>
                    <label class="form-label">RSVP Deadline <span class="optional-tag">(optional)</span></label>
                    <input type="text" name="rsvp_deadline" class="form-input datepicker" value="{{ old('rsvp_deadline') }}" placeholder="Pick date...">
                </div>
                <!-- RSVP Contact -->
                <div>
                    <label class="form-label">RSVP Contact</label>
                    <input type="text" name="rsvp_contact" class="form-input" value="{{ old('rsvp_contact') }}" placeholder="Enter contact..." autocomplete="new-password" required>
                </div>
            </div>

            <!-- Dress Code -->
            <div>
                <label class="form-label">Dress Code <span class="optional-tag">(optional)</span></label>
                <select name="dress_code" class="form-input appearance-none bg-no-repeat" style="background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%239CA3AF%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'); background-position: right 1rem top 50%; background-size: 0.65rem auto;">
                    <option value="formal">Formal</option>
                    <option value="casual">Casual</option>
                    <option value="black_tie">Black Tie</option>
                </select>
            </div>

            <!-- Personal Message -->
            <div>
                <label class="form-label">Personal Message <span class="optional-tag">(optional &middot; 200 chars)</span></label>
                <textarea name="personal_message" rows="3" class="form-input resize-none"></textarea>
            </div>

            <!-- Couple's Photo -->
            <div>
                <label class="form-label">Couple's Photo <span class="optional-tag">(optional)</span></label>
                <div id="photo-dropzone" onclick="document.getElementById('photo-input').click()" class="mt-1 border-2 border-dashed border-[#E4D1A6] rounded-xl bg-[#FCF6E8] flex justify-center items-center py-6 cursor-pointer hover:bg-[#F9F0D9] transition">
                    <span id="photo-placeholder-text" class="text-[#C59B27] font-medium text-sm flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        <span>Drag photo here or tap to upload</span>
                    </span>
                    <input type="file" id="photo-input" name="couples_photo" accept="image/*" class="hidden" onchange="updatePhotoPlaceholder(this)">
                </div>
            </div>
            
            <!-- Sticky Bottom Continue Button Container -->
            <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-[#FDF9F1] via-[#FDF9F1] to-transparent z-50">
                <button type="submit" class="w-full bg-black text-white font-bold py-4 px-4 rounded-xl shadow-lg hover:bg-gray-800 transition duration-200">
                    CONTINUE
                </button>
            </div>

        </form>
    </div>

    <script>
        function updatePhotoPlaceholder(input) {
            const placeholder = document.getElementById('photo-placeholder-text');
            if (input.files && input.files[0]) {
                const fileName = input.files[0].name;
                placeholder.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="text-emerald-700 font-semibold truncate max-w-[250px]">${fileName}</span>
                `;
            } else {
                placeholder.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Drag photo here or tap to upload</span>
                `;
            }
        }

        // Prevent autocomplete suggestions from appearing
        function disableAutocomplete() {
            const nameFields = document.querySelectorAll('input[name="bride_name"], input[name="groom_name"], input[name="rsvp_contact"], input[name="venue_name"]');
            nameFields.forEach(field => {
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
            // Initialize beautiful date picker
            flatpickr(".datepicker", {
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d",
                minDate: "today",
            });

            // Initialize beautiful time picker
            flatpickr(".timepicker", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "h:i K",
                defaultDate: "19:00"
            });

            // Drag and Drop functionality
            const dropzone = document.getElementById('photo-dropzone');
            const fileInput = document.getElementById('photo-input');

            if (dropzone && fileInput) {
                // Prevent default drag behaviors
                ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                    dropzone.addEventListener(eventName, preventDefaults, false);
                });

                // Highlight drop zone when item is dragged over it
                ['dragenter', 'dragover'].forEach(eventName => {
                    dropzone.addEventListener(eventName, highlight, false);
                });

                ['dragleave', 'drop'].forEach(eventName => {
                    dropzone.addEventListener(eventName, unhighlight, false);
                });

                // Handle dropped files
                dropzone.addEventListener('drop', handleDrop, false);

                function preventDefaults(e) {
                    e.preventDefault();
                    e.stopPropagation();
                }

                function highlight(e) {
                    dropzone.classList.add('bg-[#F5E6A3]', 'border-[#C59B27]');
                }

                function unhighlight(e) {
                    dropzone.classList.remove('bg-[#F5E6A3]', 'border-[#C59B27]');
                }

                function handleDrop(e) {
                    const dt = e.dataTransfer;
                    const files = dt.files;
                    if (files && files.length > 0) {
                        fileInput.files = files;
                        updatePhotoPlaceholder(fileInput);
                    }
                }
            }
        });
    </script>
</body>
</html>
