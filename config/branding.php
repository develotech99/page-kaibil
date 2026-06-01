<?php

return [
    'name' => env('BRAND_NAME', 'Kaibil Armory'),
    'short_name' => env('BRAND_SHORT_NAME', 'KAIBIL'),
    'tagline' => env('BRAND_TAGLINE', 'Armas y Municiones'),
    'site_title_suffix' => env('BRAND_SITE_TITLE_SUFFIX', 'Tactical Supply'),
    'logo' => env('BRAND_LOGO_PATH', 'images/logo-kaibil.png'),
    'country_label' => env('BRAND_COUNTRY_LABEL', 'Guatemala'),

    'contact' => [
        'wa_e164' => env('BRAND_WHATSAPP_E164', '50251736991'),
        'wa_display' => env('BRAND_WHATSAPP_DISPLAY', '+502 5173 6991'),
        'email' => env('BRAND_EMAIL', 'ventas@kaibilarmory.com'),
    ],

    'social' => [
        'facebook' => env('BRAND_SOCIAL_FACEBOOK', 'https://www.facebook.com/'),
        'instagram' => env('BRAND_SOCIAL_INSTAGRAM', 'https://www.instagram.com/'),
        'tiktok' => env('BRAND_SOCIAL_TIKTOK', 'https://www.tiktok.com/'),
    ],
];

