<x-email::html>
    <x-email::head :preload="[$logoUrl ?? '/static/plaid-logo.png']" />
    <x-email::html-body :style="[
        'background-color' => '#ffffff',
        'font-family' => 'HelveticaNeue,Helvetica,Arial,sans-serif'
    ]">
        <x-email::container :style="[
            'max-width' => '360px',
            'background-color' => '#ffffff',
            'border' => '1px solid #eee',
            'border-radius' => '5px',
            'box-shadow' => '0 5px 10px rgba(20,50,70,.2)',
            'margin-top' => '20px',
            'margin' => '0 auto',
            'padding' => '68px 0 130px'
        ]">

            <x-email::img
                src="{{ $logoUrl ?? '/static/plaid-logo.png' }}"
                alt="Plaid"
                width="212"
                height="88"
                align="center"
                :style="['margin' => '0 auto']" />

            <x-email::text :style="[
                'font-size' => '11px',
                'line-height' => '16px',
                'color' => '#0a85ea',
                'font-weight' => '700',
                'font-family' => 'HelveticaNeue,Helvetica,Arial,sans-serif',
                'height' => '16px',
                'letter-spacing' => '0',
                'margin' => '16px 8px 8px 8px',
                'text-transform' => 'uppercase',
                'text-align' => 'center'
            ]">
                Verify Your Identity
            </x-email::text>

            <x-email::heading :level="1" :style="[
                'color' => '#000',
                'display' => 'inline-block',
                'font-family' => 'HelveticaNeue-Medium,Helvetica,Arial,sans-serif',
                'font-size' => '20px',
                'font-weight' => '500',
                'line-height' => '24px',
                'margin-bottom' => '0',
                'margin-top' => '0',
                'text-align' => 'center'
            ]">
                Enter the following code to finish linking Venmo.
            </x-email::heading>

            <x-email::section :style="[
                'background' => 'rgba(0,0,0,.05)',
                'border-radius' => '4px',
                'margin' => '16px auto 14px',
                'vertical-align' => 'middle',
                'width' => '280px'
            ]">
                <x-email::text :style="[
                    'font-size' => '32px',
                    'line-height' => '40px',
                    'color' => '#000',
                    'font-family' => 'HelveticaNeue-Bold',
                    'font-weight' => '700',
                    'letter-spacing' => '6px',
                    'padding-bottom' => '8px',
                    'padding-top' => '8px',
                    'margin' => '0 auto',
                    'display' => 'block',
                    'text-align' => 'center'
                ]">
                    {{ $validationCode ?? '144833' }}
                </x-email::text>
            </x-email::section>

            <x-email::text :style="[
                'font-size' => '15px',
                'line-height' => '23px',
                'color' => '#444',
                'font-family' => 'HelveticaNeue,Helvetica,Arial,sans-serif',
                'letter-spacing' => '0',
                'padding' => '0 40px',
                'margin' => '0',
                'text-align' => 'center'
            ]">
                Not expecting this email?
            </x-email::text>

            <x-email::text :style="[
                'font-size' => '15px',
                'line-height' => '23px',
                'color' => '#444',
                'font-family' => 'HelveticaNeue,Helvetica,Arial,sans-serif',
                'letter-spacing' => '0',
                'padding' => '0 40px',
                'margin' => '0',
                'text-align' => 'center'
            ]">
                Contact
                <x-email::link
                    href="mailto:login@plaid.com"
                    :style="[
                        'color' => '#444',
                        'text-decoration-line' => 'none',
                        'text-decoration' => 'underline'
                    ]">login@plaid.com</x-email::link>
                if you did not request this code.
            </x-email::text>

        </x-email::container>

        <x-email::text :style="[
            'font-size' => '12px',
            'line-height' => '23px',
            'color' => '#000',
            'font-weight' => '800',
            'letter-spacing' => '0',
            'margin' => '0',
            'margin-top' => '20px',
            'font-family' => 'HelveticaNeue,Helvetica,Arial,sans-serif',
            'text-align' => 'center',
            'text-transform' => 'uppercase'
        ]">
            Securely powered by Plaid.
        </x-email::text>

    </x-email::html-body>
</x-email::html>
