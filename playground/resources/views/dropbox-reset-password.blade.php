<x-email-html>
    <x-email-head>
        {{-- Preload fonts for better performance --}}
        <link rel="preload" href="https://fonts.gstatic.com/s/inter/v13/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa1ZL7.woff2" as="font" type="font/woff2" crossorigin />
        <link rel="preload" href="https://fonts.gstatic.com/s/inter/v13/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa2JL7.woff2" as="font" type="font/woff2" crossorigin />

        {{-- Preload Dropbox logo --}}
        <link rel="preload" href="{{ $logoUrl ?? '/static/dropbox-logo.png' }}" as="image" />

        {{-- Load Google Fonts: Inter --}}
        <x-email-font
            fontFamily="Inter"
            fallbackFontFamily="'Open Sans', 'HelveticaNeue-Light', 'Helvetica Neue Light', 'Helvetica Neue', Helvetica, Arial, sans-serif"
            :webFont="[
                'url' => 'https://fonts.gstatic.com/s/inter/v13/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa1ZL7.woff2',
                'format' => 'woff2'
            ]"
            :fontWeight="400"
            fontStyle="normal" />

        {{-- Load Inter Medium for headings --}}
        <x-email-font
            fontFamily="Inter"
            fallbackFontFamily="'Open Sans', 'HelveticaNeue-Light', 'Helvetica Neue Light', 'Helvetica Neue', Helvetica, Arial, sans-serif"
            :webFont="[
                'url' => 'https://fonts.gstatic.com/s/inter/v13/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa2JL7.woff2',
                'format' => 'woff2'
            ]"
            :fontWeight="500"
            fontStyle="normal" />
    </x-email-head>

    <x-email-html-body :style="[
        'background-color' => '#f6f9fc',
        'padding' => '10px 0',
        'font-family' => 'Inter, \'Open Sans\', \'HelveticaNeue-Light\', \'Helvetica Neue Light\', \'Helvetica Neue\', Helvetica, Arial, sans-serif'
    ]">
        <x-email-preview>Dropbox reset your password</x-email-preview>

        <x-email-container :style="[
            'background-color' => '#ffffff',
            'border' => '1px solid #f0f0f0',
            'padding' => '45px',
            'max-width' => '600px'
        ]">

            {{-- Dropbox Logo --}}
            <x-email-img
                src="{{ $logoUrl ?? '/static/dropbox-logo.png' }}"
                width="40"
                height="33"
                alt="Dropbox"
                :style="[
                    'margin-bottom' => '32px'
                ]" />

            <x-email-section>
                {{-- Greeting --}}
                <x-email-text :style="[
                    'font-size' => '16px',
                    'font-family' => 'Inter, \'Open Sans\', \'HelveticaNeue-Light\', \'Helvetica Neue Light\', \'Helvetica Neue\', Helvetica, Arial, sans-serif',
                    'font-weight' => '300',
                    'color' => '#404040',
                    'line-height' => '26px',
                    'margin' => '0 0 16px 0'
                ]">
                    Hi {{ $userFirstname ?? 'there' }},
                </x-email-text>

                {{-- Main message --}}
                <x-email-text :style="[
                    'font-size' => '16px',
                    'font-family' => 'Inter, \'Open Sans\', \'HelveticaNeue-Light\', \'Helvetica Neue Light\', \'Helvetica Neue\', Helvetica, Arial, sans-serif',
                    'font-weight' => '300',
                    'color' => '#404040',
                    'line-height' => '26px',
                    'margin' => '0 0 24px 0'
                ]">
                    Someone recently requested a password change for your Dropbox account. If this was you, you can set a new password here:
                </x-email-text>

                {{-- Reset button --}}
                <x-email-section :style="[
                    'text-align' => 'left',
                    'margin' => '24px 0'
                ]">
                    <x-email-button
                        href="{{ $resetPasswordLink ?? 'https://www.dropbox.com' }}"
                        :style="[
                            'background-color' => '#007ee6',
                            'color' => '#fff',
                            'font-family' => 'Inter, \'Open Sans\', \'Helvetica Neue\', Arial, sans-serif',
                            'font-size' => '15px',
                            'font-weight' => '500',
                            'text-decoration' => 'none',
                            'text-align' => 'center',
                            'display' => 'inline-block',
                            'width' => '210px',
                            'padding' => '14px 7px',
                            'border' => '2px solid #007ee6'
                        ]">
                        Reset password
                    </x-email-button>
                </x-email-section>

                {{-- Security message --}}
                <x-email-text :style="[
                    'font-size' => '16px',
                    'font-family' => 'Inter, \'Open Sans\', \'HelveticaNeue-Light\', \'Helvetica Neue Light\', \'Helvetica Neue\', Helvetica, Arial, sans-serif',
                    'font-weight' => '300',
                    'color' => '#404040',
                    'line-height' => '26px',
                    'margin' => '0 0 16px 0'
                ]">
                    If you don't want to change your password or didn't request this, just ignore and delete this message.
                </x-email-text>

                {{-- Help Center link --}}
                <x-email-text :style="[
                    'font-size' => '16px',
                    'font-family' => 'Inter, \'Open Sans\', \'HelveticaNeue-Light\', \'Helvetica Neue Light\', \'Helvetica Neue\', Helvetica, Arial, sans-serif',
                    'font-weight' => '300',
                    'color' => '#404040',
                    'line-height' => '26px',
                    'margin' => '0 0 16px 0'
                ]">
                    To keep your account secure, please don't forward this email to anyone. See our Help Center for <x-email-link
                        href="{{ $helpCenterLink ?? 'https://help.dropbox.com/security' }}"
                        :style="[
                            'text-decoration' => 'underline',
                            'color' => '#007ee6'
                        ]">more security tips</x-email-link>.
                </x-email-text>

                {{-- Closing --}}
                <x-email-text :style="[
                    'font-size' => '16px',
                    'font-family' => 'Inter, \'Open Sans\', \'HelveticaNeue-Light\', \'Helvetica Neue Light\', \'Helvetica Neue\', Helvetica, Arial, sans-serif',
                    'font-weight' => '300',
                    'color' => '#404040',
                    'line-height' => '26px',
                    'margin' => '24px 0 0 0'
                ]">
                    Happy Dropboxing!
                </x-email-text>
            </x-email-section>
        </x-email-container>
    </x-email-html-body>
</x-email-html>
