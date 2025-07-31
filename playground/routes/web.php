<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/email-preview', function () {
    return view('email-preview');
});

Route::get('/plaid-verify', function () {
    return view('plaid-verify-identity', [
        'validationCode' => '144833',
        'logoUrl' => '/static/plaid-logo.png',
    ]);
});

Route::get('/vercel-invite', function () {
    return view('vercel-invite-user', [
        'teamName' => 'Enigma',
        'inviterName' => 'Alan',
        'inviterEmail' => 'alan.turing@example.com',
        'invitedUsername' => 'alanturing',
        'inviteUrl' => 'https://vercel.com',
        'vercelLogoUrl' => '/static/vercel-logo.png',
        'userImageUrl' => '/static/vercel-user.png',
        'arrowImageUrl' => '/static/vercel-arrow.png',
        'teamImageUrl' => '/static/vercel-team.png',
        'ipAddress' => '204.13.186.218',
        'location' => 'São Paulo, Brazil',
    ]);
});

Route::get('/font-example', function () {
    return view('font-example');
});

Route::get('/dropbox-reset', function () {
    return view('dropbox-reset-password', [
        'userFirstname' => 'Alan',
        'resetPasswordLink' => 'https://www.dropbox.com/reset-password',
        'helpCenterLink' => 'https://help.dropbox.com/security',
        'logoUrl' => '/static/dropbox-logo.png',
    ]);
});

Route::get('/nike-receipt', function () {
    return view('nike-receipt', [
        'trackingNumber' => '1ZV218970300071628',
        'trackingUrl' => 'https://www.nike.com/orders/tracking',
        'nikeLogoUrl' => '/static/nike-logo.png',
        'customerName' => 'Alan Turing',
        'shippingAddress' => '2125 Chestnut St, San Francisco, CA 94123',
        'productImageUrl' => '/static/nike-product.png',
        'productName' => 'Brazil 2022/23 Stadium Away Women\'s Nike Dri-FIT Soccer Jersey',
        'productSize' => 'Size L (12–14)',
        'orderNumber' => 'C0106373851',
        'orderDate' => 'Sep 22, 2022',
        'orderStatusUrl' => 'https://www.nike.com/orders',
        'recommendation1Image' => '/static/nike-recomendation-1.png',
        'recommendation2Image' => '/static/nike-recomendation-2.png',
        'recommendation3Image' => '/static/nike-recomendation-3.png',
        'recommendation4Image' => '/static/nike-recomendation-4.png',
        'phoneIconUrl' => '/static/nike-phone.png',
    ]);
});

Route::get('/code-example', function () {
    return view('code-example');
});

// Email testing routes
Route::get('/test-email/{template}', function ($template) {
    $templates = [
        'vercel-invite' => [
            'view' => 'vercel-invite-user',
            'data' => [
                'teamName' => 'Enigma',
                'inviterName' => 'Alan',
                'inviterEmail' => 'alan.turing@example.com',
                'invitedUsername' => 'alanturing',
                'inviteUrl' => 'https://vercel.com',
                'vercelLogoUrl' => '/static/vercel-logo.png',
                'userImageUrl' => '/static/vercel-user.png',
                'arrowImageUrl' => '/static/vercel-arrow.png',
                'teamImageUrl' => '/static/vercel-team.png',
                'ipAddress' => '204.13.186.218',
                'location' => 'São Paulo, Brazil',
            ],
        ],
        'plaid-verify' => [
            'view' => 'plaid-verify-identity',
            'data' => [
                'validationCode' => '144833',
                'logoUrl' => '/static/plaid-logo.png',
            ],
        ],
        'font-example' => [
            'view' => 'font-example',
            'data' => [],
        ],
        'nike-receipt' => [
            'view' => 'nike-receipt',
            'data' => [
                'trackingNumber' => '1ZV218970300071628',
                'trackingUrl' => 'https://www.nike.com/orders/tracking',
                'nikeLogoUrl' => '/static/nike-logo.png',
                'customerName' => 'Test Customer',
                'shippingAddress' => '123 Test St, Test City, CA 12345',
                'productImageUrl' => '/static/nike-product.png',
                'productName' => 'Brazil 2022/23 Stadium Away Women\'s Nike Dri-FIT Soccer Jersey',
                'productSize' => 'Size L (12–14)',
                'orderNumber' => 'C0106373851',
                'orderDate' => 'Nov 15, 2024',
                'orderStatusUrl' => 'https://www.nike.com/orders',
                'recommendation1Image' => '/static/nike-recomendation-1.png',
                'recommendation2Image' => '/static/nike-recomendation-2.png',
                'recommendation3Image' => '/static/nike-recomendation-3.png',
                'recommendation4Image' => '/static/nike-recomendation-4.png',
                'phoneIconUrl' => '/static/nike-phone.png',
            ],
        ],
        'code-example' => [
            'view' => 'code-example',
            'data' => [],
        ],
    ];

    if (! isset($templates[$template])) {
        abort(404, 'Template not found');
    }

    $config = $templates[$template];
    $html = view($config['view'], $config['data'])->render();

    // Add testing info
    $testingInfo = "
    <!-- EMAIL TESTING INFO -->
    <!-- Template: {$template} -->
    <!-- Generated: ".now().' -->
    <!-- Test URL: '.request()->url().' -->
    <!-- Send URL: '.url("/send-test-email/{$template}").' -->
    ';

    return str_replace('</head>', $testingInfo.'</head>', $html);
});
