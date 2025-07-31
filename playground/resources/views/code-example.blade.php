<x-email::html>
    <x-email::head>
        {{-- Preload fonts for better performance --}}
        <link rel="preload" href="https://fonts.gstatic.com/s/inter/v13/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa1ZL7.woff2" as="font" type="font/woff2" crossorigin />
        <link rel="preload" href="https://fonts.gstatic.com/s/inter/v13/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa2JL7.woff2" as="font" type="font/woff2" crossorigin />

        {{-- Load Google Fonts: Inter --}}
        <x-email::font
            fontFamily="Inter"
            fallbackFontFamily="-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif"
            :webFont="[
                'url' => 'https://fonts.gstatic.com/s/inter/v13/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa1ZL7.woff2',
                'format' => 'woff2'
            ]"
            :fontWeight="400"
            fontStyle="normal" />

        {{-- Load Inter Medium --}}
        <x-email::font
            fontFamily="Inter"
            fallbackFontFamily="-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif"
            :webFont="[
                'url' => 'https://fonts.gstatic.com/s/inter/v13/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa2JL7.woff2',
                'format' => 'woff2'
            ]"
            :fontWeight="500"
            fontStyle="normal" />
    </x-email::head>

    <x-email::html-body :style="[
        'background-color' => '#f6f9fc',
        'font-family' => 'Inter, -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, sans-serif'
    ]">
        <x-email::preview>Code Examples with Syntax Highlighting</x-email::preview>

        <x-email::container :style="[
            'background-color' => '#ffffff',
            'max-width' => '700px',
            'margin' => '40px auto',
            'padding' => '40px',
            'border' => '1px solid #e1e5e9'
        ]">

            {{-- Header --}}
            <x-email::heading :level="1" :style="[
                'font-family' => 'Inter, -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, sans-serif',
                'font-weight' => '700',
                'font-size' => '28px',
                'color' => '#1f2937',
                'text-align' => 'center',
                'margin' => '0 0 32px 0'
            ]">
                Developer Newsletter
            </x-email::heading>

            {{-- Introduction --}}
            <x-email::text :style="[
                'font-family' => 'Inter, -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, sans-serif',
                'font-size' => '16px',
                'line-height' => '1.6',
                'color' => '#374151',
                'margin' => '0 0 32px 0'
            ]">
                Welcome to our developer newsletter! Here's an example showcasing how to include beautifully formatted code in your email templates using the Blade Email code block component.
            </x-email::text>

            {{-- PHP Example --}}
            <x-email::heading :level="2" :style="[
                'font-family' => 'Inter, -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, sans-serif',
                'font-weight' => '600',
                'font-size' => '20px',
                'color' => '#1f2937',
                'margin' => '32px 0 16px 0'
            ]">
                Code Examples with Syntax Highlighting
            </x-email::heading>

            {{-- Footer --}}
            <x-email::spacer height="40px" />

            <x-email::hr :style="[
                'border-color' => '#e5e7eb',
                'margin' => '0 0 32px 0'
            ]" />

            @php
                $phpCode = '<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function send(Request $request)
    {
        $user = $request->user();

        // Send welcome email
        Mail::to($user->email)->send(new WelcomeEmail($user));

        return response()->json([
            \'message\' => \'Email sent successfully!\',
            \'status\' => \'success\'
        ]);
    }
}';
            @endphp

            <x-email::code-block
                language="php"
                theme="github-light"
                :code="$phpCode" />

            {{-- Add a dark theme example --}}
            <x-email::heading :level="2" :style="[
                'font-family' => 'Inter, -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, sans-serif',
                'font-weight' => '600',
                'font-size' => '20px',
                'color' => '#1f2937',
                'margin' => '32px 0 16px 0'
            ]">
                Dark Theme Example
            </x-email::heading>

            <x-email::code-block
                language="php"
                theme="github-dark"
                title="EmailService.php (Dark Theme)"
                :code="$phpCode" />

            {{-- Add JavaScript Example --}}
            <x-email::heading :level="2" :style="[
                'font-family' => 'Inter, -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, sans-serif',
                'font-weight' => '600',
                'font-size' => '20px',
                'color' => '#1f2937',
                'margin' => '32px 0 16px 0'
            ]">
                JavaScript API Client
            </x-email::heading>

            @php
                $jsCode = 'const sendEmail = async (emailData) => {
  try {
    const response = await fetch(\'/api/emails\', {
      method: \'POST\',
      headers: {
        \'Content-Type\': \'application/json\',
        \'Authorization\': `Bearer ${getAuthToken()}`
      },
      body: JSON.stringify(emailData)
    });

    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }

    const result = await response.json();
    console.log(\'Email sent:\', result.message);
    return result;
  } catch (error) {
    console.error(\'Failed to send email:\', error);
    throw error;
  }
};';
            @endphp

            <x-email::code-block
                language="javascript"
                theme="github-light"
                title="api-client.js"
                :code="$jsCode" />

            {{-- Test different themes --}}
            <x-email::heading :level="2" :style="[
                'font-family' => 'Inter, -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, sans-serif',
                'font-weight' => '600',
                'font-size' => '20px',
                'color' => '#1f2937',
                'margin' => '32px 0 16px 0'
            ]">
                Monokai Theme Example
            </x-email::heading>

            <x-email::code-block
                language="python"
                theme="monokai"
                title="example.py (Monokai Theme)"
                code="def send_email(to, subject, body):
    import smtplib
    from email.mime.text import MIMEText

    msg = MIMEText(body)
    msg['Subject'] = subject
    msg['To'] = to

    with smtplib.SMTP('localhost') as server:
        server.send_message(msg)

    print(f'Email sent to {to}!')" />

            <x-email::text :style="[
                'font-family' => 'Inter, -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, sans-serif',
                'font-size' => '14px',
                'line-height' => '1.5',
                'color' => '#6b7280',
                'text-align' => 'center',
                'margin' => '0'
            ]">
                Happy coding! 🚀<br>
                Built with <x-email::link href="https://github.com/phikiphp/phiki" style="color: #3b82f6; text-decoration: underline;">Phiki</x-email::link> syntax highlighting
            </x-email::text>

        </x-email::container>
    </x-email::html-body>
</x-email::html>
