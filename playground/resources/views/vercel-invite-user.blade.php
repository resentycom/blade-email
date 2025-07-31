<x-email-html>
    <x-email-head>
        {{-- Preload fonts for better performance --}}
        <link rel="preload" href="https://fonts.gstatic.com/s/inter/v13/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa1ZL7.woff2" as="font" type="font/woff2" crossorigin />
        <link rel="preload" href="https://fonts.gstatic.com/s/inter/v13/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa2JL7.woff2" as="font" type="font/woff2" crossorigin />

        {{-- Preload images for better performance --}}
        <link rel="preload" href="{{ $vercelLogoUrl ?? '/static/vercel-logo.png' }}" as="image" />
        <link rel="preload" href="{{ $userImageUrl ?? '/static/vercel-user.png' }}" as="image" />
        <link rel="preload" href="{{ $arrowImageUrl ?? '/static/vercel-arrow.png' }}" as="image" />
        <link rel="preload" href="{{ $teamImageUrl ?? '/static/vercel-team.png' }}" as="image" />

        {{-- Load Google Fonts: Inter --}}
        <x-email-font
            fontFamily="Inter"
            fallbackFontFamily="Arial, sans-serif"
            :webFont="[
                'url' => 'https://fonts.gstatic.com/s/inter/v13/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa1ZL7.woff2',
                'format' => 'woff2'
            ]"
            :fontWeight="400"
            fontStyle="normal" />

        {{-- Load Inter Bold --}}
        <x-email-font
            fontFamily="Inter"
            fallbackFontFamily="Arial, sans-serif"
            :webFont="[
                'url' => 'https://fonts.gstatic.com/s/inter/v13/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa2JL7.woff2',
                'format' => 'woff2'
            ]"
            :fontWeight="700"
            fontStyle="normal" />
    </x-email-head>
    <x-email-html-body :style="['font-family' => 'Inter, Arial, sans-serif']">

        <x-email-container :style="[
            'margin-left' => 'auto',
            'margin-right' => 'auto',
            'margin-top' => '40px',
            'margin-bottom' => '40px',
            'max-width' => '465px',
            'border-width' => '1px',
            'border-color' => 'rgb(234,234,234)',
            'border-style' => 'solid',
            'padding' => '20px'
        ]">

            <x-email-section :style="['margin-top' => '32px']">
                <x-email-img
                    src="{{ $vercelLogoUrl ?? '/static/vercel-logo.png' }}"
                    alt="Vercel Logo"
                    width="40"
                    height="37"
                    align="center"
                    :style="[
                        'margin-left' => 'auto',
                        'margin-right' => 'auto',
                        'margin-top' => '0',
                        'margin-bottom' => '0'
                    ]" />
            </x-email-section>

            <x-email-heading :level="1">
                Join <strong>{{ $teamName ?? 'Enigma' }}</strong> on <strong>Vercel</strong>
            </x-email-heading>

            <x-email-text :style="[
                'font-size' => '14px',
                'color' => 'rgb(0,0,0)',
                'line-height' => '24px',
                'margin-top' => '16px',
                'margin-bottom' => '16px'
            ]">
                Hello {{ $invitedUsername ?? 'alanturing' }},
            </x-email-text>

            <x-email-text :style="[
                'font-size' => '14px',
                'color' => 'rgb(0,0,0)',
                'line-height' => '24px',
                'margin-top' => '16px',
                'margin-bottom' => '16px'
            ]">
                <strong>{{ $inviterName ?? 'Alan' }}</strong> (<x-email-link
                    href="mailto:{{ $inviterEmail ?? 'alan.turing@example.com' }}">{{ $inviterEmail ?? 'alan.turing@example.com' }}</x-email-link>) has invited you to the <strong>{{ $teamName ?? 'Enigma' }}</strong> team on <strong>Vercel</strong>.
            </x-email-text>

            <x-email-section>
                <x-email-row>
                    <x-email-column width="33%" align="right">
                        <x-email-img
                            src="{{ $userImageUrl ?? '/static/vercel-user.png' }}"
                            alt="{{ $invitedUsername ?? 'alanturing' }}'s profile picture"
                            width="64"
                            height="64" />
                    </x-email-column>
                    <x-email-column width="33%" align="center">
                        <x-email-img
                            src="{{ $arrowImageUrl ?? '/static/vercel-arrow.png' }}"
                            alt="Arrow indicating invitation"
                            width="12"
                            height="9" />
                    </x-email-column>
                    <x-email-column width="33%" align="left">
                        <x-email-img
                            src="{{ $teamImageUrl ?? '/static/vercel-team.png' }}"
                            alt="{{ $teamName ?? 'Enigma' }} team logo"
                            width="64"
                            height="64" />
                    </x-email-column>
                </x-email-row>
            </x-email-section>

            <x-email-section :style="['margin-top' => '32px', 'margin-bottom' => '32px', 'text-align' => 'center']">
                <x-email-button
                    href="{{ $inviteUrl ?? 'https://vercel.com' }}"
                    :style="[
                        'background-color' => 'rgb(0,0,0)',
                        'border' => '2px solid rgb(0,0,0)',
                        'padding-left' => '20px',
                        'padding-right' => '20px',
                        'padding-top' => '12px',
                        'padding-bottom' => '12px',
                        'text-align' => 'center',
                        'font-weight' => '600',
                        'font-size' => '12px',
                        'color' => 'rgb(255,255,255)',
                        'text-decoration-line' => 'none',
                        'line-height' => '100%',
                        'text-decoration' => 'none',
                        'display' => 'inline-block',
                        'max-width' => '100%',
                        'mso-padding-alt' => '0px'
                    ]">
                    Join the team
                </x-email-button>
            </x-email-section>

            <x-email-text :style="[
                'font-size' => '14px',
                'color' => 'rgb(0,0,0)',
                'line-height' => '24px',
                'margin-top' => '16px',
                'margin-bottom' => '16px'
            ]">
                or copy and paste this URL into your browser:
                <x-email-link href="{{ $inviteUrl ?? 'https://vercel.com' }}">{{ $inviteUrl ?? 'https://vercel.com' }}</x-email-link>
            </x-email-text>

            <x-email-hr />

            <x-email-text :style="[
                'color' => 'rgb(102,102,102)',
                'font-size' => '12px',
                'line-height' => '24px',
                'margin-top' => '16px',
                'margin-bottom' => '16px'
            ]">
                This invitation was intended for
                <span style="color:rgb(0,0,0)">{{ $invitedUsername ?? 'alanturing' }}</span>. This invite was
                sent from <span style="color:rgb(0,0,0)">{{ $ipAddress ?? '204.13.186.218' }}</span>
                located in
                <span style="color:rgb(0,0,0)">{{ $location ?? 'São Paulo, Brazil' }}</span>. If you
                were not expecting this invitation, you can ignore this email. If
                you are concerned about your account's safety, please reply
                to this email to get in touch with us.
            </x-email-text>

        </x-email-container>
    </x-email-html-body>
</x-email-html>
