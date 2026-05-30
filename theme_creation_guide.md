# Velvet Vows — Theme Development Guide

This guide outlines the architecture and requirements for building a new theme template for the Velvet Vows Wedding SaaS platform. By following these rules, your new template will automatically support the platform's Live Preview editor and data synchronization.

## 1. Where do themes live?
All themes are standalone Blade templates stored in:
`resources/views/templates/[theme-name].blade.php`

Themes are rendered in two places:
1. **Live Preview Editor:** Rendered inside a scaled-down iframe on the editing screen (`/wedding/live-preview/{theme}`).
2. **Public Published Page:** Rendered full-screen for the guests (`/invite/{slug}`).

Because it serves both purposes, **do not hardcode any CSS that limits it specifically to a phone screen.** Use responsive design (e.g., `min-height: 100vh; width: 100%;`) and the iframe in the editor will scale it down automatically.

## 2. Data Architecture
Your blade file will receive two primary variables:
- `$invitation` (Object): The Eloquent model representing the saved invitation.
- `$details` (Array): A fallback array of placeholder text if the user hasn't typed anything yet.

Always use the **null coalescing operator (`??`)** to ensure data loads gracefully in all scenarios:
```blade
{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Default Bride' }}
```

## 3. Text Live-Preview Hooks (CRITICAL)
When the user types their name in the sidebar of the editor, JavaScript instantly updates the text inside the iframe template. 

For this to work, you **MUST** add `data-preview` attributes to the HTML elements wrapping the text variables.

**Required `data-preview` hooks:**
- `data-preview="bride_name"`
- `data-preview="groom_name"`
- `data-preview="wedding_date"`
- `data-preview="time"`
- `data-preview="venue_name"`
- `data-preview="venue_address"`
- `data-preview="rsvp_contact"`
- `data-preview="personal_message"`

*Example:*
```html
<h1 data-preview="bride_name">{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Bride' }}</h1>
```

## 4. Image Live-Preview Hooks
Images also update live when a user uploads a photo. To ensure your new template intercepts these updates, you must use these exact standardized CSS classes on your `<img>` tags:

- **Hero/Main Image:** class `pv-main-img-src`
- **Bride Image:** class `pv-bride-img-src`
- **Groom Image:** class `pv-groom-img-src`

*Example:*
```html
<img src="{{ $invitation->main_image_url ?? '' }}" class="hero-img pv-main-img-src" style="width: 100%; height: 100%; object-fit: cover;">
```
*(Note: If no image exists in the database, the `src` will be empty, so handle the fallback styling either via CSS backgrounds behind the image, or opacity transitions).*

## 5. Gallery Section Rules
The gallery section has a specific requirement: the live preview JavaScript searches for a container with the class `.gallery-grid` and an ancestor with the class `.gallery-section`. 

If the user hasn't uploaded any photos yet, the container **must still exist in the HTML** (but be hidden via CSS) so the JavaScript can target it and inject the images live.

*Boilerplate Gallery Code:*
```blade
<div class="gallery-section" style="{{ (isset($invitation) && $invitation->galleries && $invitation->galleries->count() > 0) ? '' : 'display:none;' }}">
    <h2>Memories</h2>
    
    <div class="gallery-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 0.5rem;">
        @if(isset($invitation) && $invitation->galleries)
            @foreach($invitation->galleries as $gallery)
                <div class="gallery-item">
                    <img src="{{ $gallery->image_url }}" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            @endforeach
        @endif
    </div>
</div>
```

## 6. Minimal Theme Boilerplate

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $invitation->bride_name ?? 'Bride' }} & {{ $invitation->groom_name ?? 'Groom' }}</title>
    <style>
        body { margin: 0; padding: 0; font-family: sans-serif; }
        .theme-wrapper { min-height: 100vh; display: flex; flex-direction: column; text-align: center; }
    </style>
</head>
<body>
    <div class="theme-wrapper">
        <!-- Hero Image -->
        <div style="height: 40vh; position: relative;">
            <img class="pv-main-img-src" src="{{ $invitation->main_image_url ?? '' }}" style="width: 100%; height: 100%; object-fit: cover;">
        </div>

        <!-- Names -->
        <h1 data-preview="bride_name">{{ $invitation->bride_name ?? $details['bride_name'] ?? 'Bride' }}</h1>
        <h2>&</h2>
        <h1 data-preview="groom_name">{{ $invitation->groom_name ?? $details['groom_name'] ?? 'Groom' }}</h1>

        <!-- Details -->
        <p>
            <span data-preview="wedding_date">{{ \Carbon\Carbon::parse($invitation->wedding_date ?? $details['wedding_date'] ?? now())->format('F j, Y') }}</span> 
            at <span data-preview="time">{{ $invitation->time ?? $details['time'] ?? '12:00 PM' }}</span>
        </p>

        <!-- Gallery -->
        <div class="gallery-section" style="{{ (isset($invitation) && $invitation->galleries && $invitation->galleries->count() > 0) ? '' : 'display:none;' }}">
            <div class="gallery-grid">
                <!-- Loop goes here -->
            </div>
        </div>
    </div>
</body>
</html>
```

## 7. Registering the Theme
Once the blade file is created, add the new theme ID (the filename without `.blade.php`) to the allowed templates array in `TemplateController.php` so it appears in the marketplace!

## 8. Updating the UI (Theme Selection)
To allow users to actually pick the new theme when building an invitation, you must add it to the theme selection grid.

Open `resources/views/wedding-flow.blade.php`, find the `<div class="tpl-grid">` around line 775, and add a new tile block for your theme:

```html
<div class="tpl-tile" id="tpl-[your-theme-id]" onclick="pickTpl('[your-theme-id]', this)">
    <img src="URL_TO_YOUR_PREVIEW_THUMBNAIL" alt="Your Theme Name">
    <div class="tpl-check-badge"><i class="bi bi-check-lg"></i></div>
    <div class="tpl-tile-foot">
        <div class="tpl-tile-name">Theme Name</div>
        <div class="tpl-tile-hint">Short catchphrase</div>
    </div>
</div>
```
