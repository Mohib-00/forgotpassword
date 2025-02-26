<?php

namespace App\Providers;

use App\Models\Banner;
use App\Models\Join;
use App\Models\Memberships;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use App\Models\Message;

class AppServiceProvider extends ServiceProvider
{
    
    public function register(): void
    {
    }

    
    public function boot(): void
    {
        $count = Message::whereHas('messageStatus', function ($query) {
            $query->where('status', 1);
        })->count();
        $settings = Setting::first() ?? new Setting([
            'name' => '',
            'email' => '',
            'address' => '',
            'phone' => '',
            'about_paragraph' => '',
            'image_1' => '',
        ]);
        $banners = Banner::first() ?? new Banner([
            'heading' => '',
            'paragraph' => '',
            'image' => '',
        ]);

        $joins = Join::first() ?? new Join([
            'heading' => '',
            'paragraph' => '',
            'name' => '',
        ]);

        $memberships = Memberships::first() ?? new Memberships([
            'image' => '',
            'paragraph' => '',
        ]);
    
        view()->share([
            'count' => $count,
            'settings' => $settings,
            'banners' => $banners,
            'joins' => $joins,
            'memberships' => $memberships,
        ]);
    }
}
