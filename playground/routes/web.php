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
        'logoUrl' => '/static/plaid-logo.png'
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
        'location' => 'São Paulo, Brazil'
    ]);
});

Route::get('/font-example', function () {
    return view('font-example');
});
