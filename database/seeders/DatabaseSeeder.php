<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Admin::updateOrCreate(
            ['email' => 'admin@barnabaskoncept.com'],
            ['name' => 'Barnabas Koncept Admin', 'password' => 'password']
        );

        $services = [
            ['title' => 'Brand Identity Design', 'description' => 'Professional logos, brand guidelines and visual identity systems that make businesses memorable.', 'icon' => 'bi-palette', 'sort_order' => 1],
            ['title' => 'Flyer & Poster Design', 'description' => 'Creative promotional flyers, posters and campaign graphics designed to capture attention.', 'icon' => 'bi-file-earmark-image', 'sort_order' => 2],
            ['title' => 'Social Media Graphics', 'description' => 'Modern social media designs that keep your brand consistent and engaging across platforms.', 'icon' => 'bi-phone', 'sort_order' => 3],
            ['title' => 'Business & Marketing Design', 'description' => 'Business cards, brochures, banners and marketing materials for professional communication.', 'icon' => 'bi-briefcase', 'sort_order' => 4],
            ['title' => 'Event Graphics', 'description' => 'Eye-catching graphics for birthdays, weddings, conferences, church programmes and special events.', 'icon' => 'bi-calendar-event', 'sort_order' => 5],
            ['title' => 'Custom Design Solutions', 'description' => 'Tailored graphic design solutions built around your exact business or personal project needs.', 'icon' => 'bi-stars', 'sort_order' => 6],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['title' => $service['title']], $service + ['is_active' => true]);
        }

        $settings = [
            'company_name' => 'Barnabas Koncept',
            'tagline' => 'Creative designs. Strong brands. Better impressions.',
            'email' => 'hello@barnabaskoncept.com',
            'phone' => '+234 000 000 0000',
            'address' => 'Abuja, Nigeria',
            'whatsapp' => '+2340000000000',
            'facebook' => 'https://facebook.com/',
            'instagram' => 'https://instagram.com/',
            'tiktok' => 'https://tiktok.com/',
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        if (Portfolio::count() === 0) {
            Portfolio::create([
                'title' => 'Brand Identity Concept',
                'category' => 'Branding',
                'description' => 'A sample portfolio project. Replace this with one of your real completed designs from the admin dashboard.',
                'client_name' => 'Sample Client',
                'project_date' => now()->toDateString(),
                'is_featured' => true,
            ]);
        }
    }
}
