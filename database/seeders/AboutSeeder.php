<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{

    public function run(): void
    {
           // Create a new About instance
        $about = About::create([
            'phone' => '+(966) 549267267',
            'email' => 'info@daam.org.sa',
            'location' => ' المملكة العربية السعودية',
            'whatsapp' => '+(966) 549267267',
            'instagram' => 'https://instagram.com/daam-instagram',
            'twitter' => 'https://twitter.com/daam-twitter',
        ]);
        $about->save();

        // Attach logo image from your assets
        $about->addMediaFromUrl(asset('frontend/img/logo/w_logo.png'))->toMediaCollection('logo');
    }
}
