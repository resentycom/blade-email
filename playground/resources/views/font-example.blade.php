<x-email::html>
    <x-email::head>
        {{-- Preload font files for better performance --}}
        <link rel="preload" href="https://fonts.gstatic.com/s/inter/v13/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa1ZL7.woff2" as="font" type="font/woff2" crossorigin />
        <link rel="preload" href="https://fonts.gstatic.com/s/inter/v13/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa2JL7.woff2" as="font" type="font/woff2" crossorigin />

        {{-- Load Google Fonts: Inter --}}
        <x-email::font
            fontFamily="Inter"
            fallbackFontFamily="Arial, sans-serif"
            :webFont="[
                'url' => 'https://fonts.gstatic.com/s/inter/v13/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa1ZL7.woff2',
                'format' => 'woff2'
            ]"
            :fontWeight="400"
            fontStyle="normal" />

        {{-- Load another font weight --}}
        <x-email::font
            fontFamily="Inter"
            fallbackFontFamily="Arial, sans-serif"
            :webFont="[
                'url' => 'https://fonts.gstatic.com/s/inter/v13/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa2JL7.woff2',
                'format' => 'woff2'
            ]"
            :fontWeight="700"
            fontStyle="normal" />
    </x-email::head>

    <x-email::html-body :style="[
        'background-color' => '#f6f9fc',
        'font-family' => 'Inter, Arial, sans-serif'
    ]">
        <x-email::preview>Font Component Demo - Inter Font</x-email::preview>

        <x-email::container :style="[
            'max-width' => '600px',
            'background-color' => '#ffffff',
            'margin' => '40px auto',
            'padding' => '40px',
            'border' => '1px solid #e5e5e5'
        ]">

            <x-email::heading :level="1" :style="[
                'font-family' => 'Inter, Arial, sans-serif',
                'font-weight' => '700',
                'font-size' => '32px',
                'color' => '#1a1a1a',
                'margin' => '0 0 24px 0',
                'text-align' => 'center'
            ]">
                Font Component Demo
            </x-email::heading>

            <x-email::text :style="[
                'font-family' => 'Inter, Arial, sans-serif',
                'font-size' => '18px',
                'line-height' => '28px',
                'color' => '#374151',
                'margin' => '0 0 24px 0'
            ]">
                This email demonstrates the <strong>Font component</strong> in action!
                We're using Google's Inter font with proper fallbacks for email clients
                that don't support web fonts.
            </x-email::text>

            <x-email::text :style="[
                'font-family' => 'Inter, Arial, sans-serif',
                'font-size' => '16px',
                'line-height' => '24px',
                'color' => '#6b7280',
                'margin' => '0 0 32px 0'
            ]">
                The font is loaded with:
            </x-email::text>

            <x-email::section :style="[
                'background-color' => '#f3f4f6',
                'padding' => '20px',
                'border' => '1px solid #e5e7eb',
                'margin' => '0 0 32px 0'
            ]">
                <x-email::text :style="[
                    'font-family' => 'Inter, Arial, sans-serif',
                    'font-size' => '14px',
                    'line-height' => '20px',
                    'color' => '#374151',
                    'margin' => '0',
                    'font-style' => 'italic'
                ]">
                    • <strong>Primary:</strong> Inter (web font)<br>
                    • <strong>Fallback:</strong> Arial, sans-serif<br>
                    • <strong>Weights:</strong> 400 (normal) and 700 (bold)<br>
                    • <strong>Format:</strong> WOFF2 for optimal compression<br>
                    • <strong>Performance:</strong> Preloaded for faster rendering
                </x-email::text>
            </x-email::section>

            <x-email::text :style="[
                'font-family' => 'Inter, Arial, sans-serif',
                'font-size' => '16px',
                'line-height' => '24px',
                'color' => '#6b7280',
                'margin' => '0 0 24px 0'
            ]">
                Email clients that support web fonts will see Inter, while others will gracefully fall back to Arial. This ensures consistent readability across all platforms.
            </x-email::text>

            <x-email::button
                href="#"
                :style="[
                    'background-color' => '#3b82f6',
                    'color' => '#ffffff',
                    'font-family' => 'Inter, Arial, sans-serif',
                    'font-weight' => '700',
                    'font-size' => '16px',
                    'padding' => '16px 32px',
                    'border' => '2px solid #3b82f6',
                    'text-decoration' => 'none',
                    'display' => 'inline-block'
                ]">
                Call to Action Button
            </x-email::button>

            <x-email::spacer height="40px" />

            <x-email::text :style="[
                'font-family' => 'Inter, Arial, sans-serif',
                'font-size' => '12px',
                'line-height' => '18px',
                'color' => '#9ca3af',
                'text-align' => 'center',
                'margin' => '0'
            ]">
                This demonstrates how the Font component enables beautiful typography in email templates.
            </x-email::text>

        </x-email::container>
    </x-email::html-body>
</x-email::html>
