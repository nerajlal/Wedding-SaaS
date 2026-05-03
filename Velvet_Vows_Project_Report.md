# Velvet Vows - Project Analysis Report

## 1. Executive Summary
**Velvet Vows** is an ultra-premium digital wedding invitation SaaS platform designed to allow couples to create, personalize, and share stunning digital invitations effortlessly. The product aims to replace expensive physical invitations with high-quality, easily shareable digital equivalents that maintain a luxury aesthetic.

## 2. Target Audience & Problem Solved
- **Primary Persona:** Engaged couples (age 24-38) looking for premium, easily shareable wedding invitations without the high cost and wait time of printed cards.
- **Secondary Persona:** Wedding Planners needing efficient, beautiful invitation creation for multiple clients.
- **Core Value Proposition:** Solves the problem of unprofessional WhatsApp invites, difficult guest reach, and high printing costs by providing an instant, shareable, and beautifully designed digital alternative with zero login friction.

## 3. Core Features (MVP)
- **Frictionless Onboarding:** One-click Google OAuth login (no passwords).
- **Invitation Builder:** A step-by-step form to collect wedding details (names, venue, dates, dress code, personal messages, and photos).
- **Template Gallery & Live Preview:** Three premium templates at launch ("The Royal Scroll", "Golden Minimalist", "Garden Celestial") with real-time preview capabilities.
- **Instant Sharing:** Auto-generated unique public URLs and downloadable QR codes.
- **Monetization:** Freemium model transitioning into paid premium templates via Razorpay integration.

## 4. Technical Architecture
The application is built on a robust PHP/Laravel stack designed for performance and rapid development.
- **Frontend:** HTML, Bootstrap (Responsive styling)
- **Backend:** Laravel (PHP)
- **Authentication:** Laravel Socialite (Google OAuth 2.0)
- **Database:** MySQL
- **File Storage:** Laravel Storage (Local/AWS S3 for production)
- **Payment Gateway:** Razorpay (Checkout & Webhooks)
- **Deployment:** Hostinger

## 5. Database Schema Overview
The system relies on a streamlined schema focused on users and their invitations:
- **`users` table:** Stores user data fetched from Google OAuth (ID, Google ID, Email, Name, Avatar URL).
- **`invitations` table:** Stores comprehensive wedding details, template choice, payment/publish status, unique `slug` for the public URL, and an expiration date (valid for 6 months).

## 6. Authentication & Payment Flow
1. **Auth:** User authenticates via Google OAuth; session is maintained securely via HTTP-only cookies. No passwords are ever stored.
2. **Creation:** User fills out the invitation and previews the chosen template.
3. **Payment:** Upon choosing to publish, the user completes payment via Razorpay.
4. **Publishing:** On success, the `is_published` flag is updated, and the user receives a public URL (`/invite/[slug]`) and a QR code.

## 7. UI/UX Design System
- **Aesthetic:** Ultra-premium golden theme across all templates.
- **Color Palette:** Deep Gold (`#B8860B`), Pure White (`#FFFFFF`), Cream (`#FDF8F0`), and accent colors tailored to specific templates (e.g., Deep Navy for "Garden Celestial").
- **Typography:** Classic and elegant fonts including *Cormorant Garamond*, *Playfair Display*, and *Great Vibes*.

## 8. Development Roadmap & KPIs
- **Timeline:** The project spans an 11-week roadmap starting from Foundation (Sprint 1) to Public Launch (Week 10-11).
- **Success Metrics (Post 3-Months):** Target 500 published invitations, 50k guest views, >80% Google Auth conversion, and a >70% invitation completion rate.
- **Future Features:** RSVP management, custom domains, PDF downloads, multiple event invitations, and a premium templates marketplace.

## Conclusion
Velvet Vows is a well-scoped Laravel SaaS project. The MVP is highly focused on user experience, removing traditional friction points (like password creation) while delivering immediate, tangible value through premium design and simple sharing options. The technical choices (Laravel + Bootstrap + Razorpay) are pragmatic and well-suited for the 11-week timeline.
