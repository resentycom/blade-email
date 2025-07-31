<x-email::html>
    <x-email::head>
        {{-- Preload fonts for better performance --}}
        <link rel="preload" href="https://fonts.gstatic.com/s/inter/v13/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa1ZL7.woff2" as="font" type="font/woff2" crossorigin />
        <link rel="preload" href="https://fonts.gstatic.com/s/inter/v13/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa2JL7.woff2" as="font" type="font/woff2" crossorigin />

        {{-- Preload Nike images --}}
        <link rel="preload" href="{{ $nikeLogoUrl ?? '/static/nike-logo.png' }}" as="image" />
        <link rel="preload" href="{{ $productImageUrl ?? '/static/nike-product.png' }}" as="image" />

        {{-- Load Google Fonts: Inter --}}
        <x-email::font
            fontFamily="Inter"
            fallbackFontFamily="-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif"
            :webFont="[
                'url' => 'https://fonts.gstatic.com/s/inter/v13/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa1ZL7.woff2',
                'format' => 'woff2'
            ]"
            :fontWeight="400"
            fontStyle="normal" />

        {{-- Load Inter Medium --}}
        <x-email::font
            fontFamily="Inter"
            fallbackFontFamily="-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif"
            :webFont="[
                'url' => 'https://fonts.gstatic.com/s/inter/v13/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa2JL7.woff2',
                'format' => 'woff2'
            ]"
            :fontWeight="500"
            fontStyle="normal" />

        {{-- Load Inter Bold --}}
        <x-email::font
            fontFamily="Inter"
            fallbackFontFamily="-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif"
            :webFont="[
                'url' => 'https://fonts.gstatic.com/s/inter/v13/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa25L7.woff2',
                'format' => 'woff2'
            ]"
            :fontWeight="700"
            fontStyle="normal" />
    </x-email::head>

    <x-email::html-body :style="[
        'background-color' => '#ffffff',
        'font-family' => 'Inter, -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Oxygen-Sans, Ubuntu, Cantarell, \'Helvetica Neue\', sans-serif'
    ]">
        <x-email::preview>Get your order summary, estimated delivery date and more</x-email::preview>

        <x-email::container :style="[
            'margin' => '10px auto',
            'width' => '600px',
            'max-width' => '100%',
            'border' => '1px solid #E5E5E5'
        ]">

            {{-- Tracking Section --}}
            <x-email::section :style="[
                'padding' => '22px 40px',
                'background-color' => '#F7F7F7'
            ]">
                <x-email::row>
                    <x-email::column>
                        <x-email::text :style="[
                            'margin' => '0',
                            'line-height' => '2',
                            'font-weight' => 'bold'
                        ]">
                            Tracking Number
                        </x-email::text>
                        <x-email::text :style="[
                            'margin' => '12px 0 0 0',
                            'font-weight' => '500',
                            'line-height' => '1.4',
                            'color' => '#6F6F6F'
                        ]">
                            {{ $trackingNumber ?? '1ZV218970300071628' }}
                        </x-email::text>
                    </x-email::column>
                    <x-email::column align="right">
                        <x-email::link
                            href="{{ $trackingUrl ?? 'https://www.nike.com/orders/tracking' }}"
                            :style="[
                                'border' => '1px solid #929292',
                                'font-size' => '16px',
                                'text-decoration' => 'none',
                                'padding' => '10px 0px',
                                'width' => '220px',
                                'display' => 'block',
                                'text-align' => 'center',
                                'font-weight' => '500',
                                'color' => '#000'
                            ]">
                            Track Package
                        </x-email::link>
                    </x-email::column>
                </x-email::row>
            </x-email::section>

            {{-- Divider --}}
            <x-email::hr :style="[
                'border-color' => '#E5E5E5',
                'margin' => '0'
            ]" />

            {{-- Main Message Section --}}
            <x-email::section :style="[
                'padding' => '40px 74px',
                'text-align' => 'center'
            ]">
                <x-email::img
                    src="{{ $nikeLogoUrl ?? '/static/nike-logo.png' }}"
                    width="66"
                    height="22"
                    alt="Nike"
                    :style="['margin' => 'auto']" />

                <x-email::heading :level="1" :style="[
                    'font-size' => '32px',
                    'line-height' => '1.3',
                    'font-weight' => '700',
                    'text-align' => 'center',
                    'letter-spacing' => '-1px',
                    'margin' => '24px 0'
                ]">
                    It's On Its Way.
                </x-email::heading>

                <x-email::text :style="[
                    'margin' => '0',
                    'line-height' => '2',
                    'color' => '#747474',
                    'font-weight' => '500'
                ]">
                    You order's is on its way. Use the link above to track its progress.
                </x-email::text>

                <x-email::text :style="[
                    'margin' => '24px 0 0 0',
                    'line-height' => '2',
                    'color' => '#747474',
                    'font-weight' => '500'
                ]">
                    We´ve also charged your payment method for the cost of your order and will be removing any authorization holds. For payment details, please visit your Orders page on Nike.com or in the Nike app.
                </x-email::text>
            </x-email::section>

            {{-- Divider --}}
            <x-email::hr :style="[
                'border-color' => '#E5E5E5',
                'margin' => '0'
            ]" />

            {{-- Shipping Address --}}
            <x-email::section :style="[
                'padding-left' => '40px',
                'padding-right' => '40px',
                'padding-top' => '22px',
                'padding-bottom' => '22px'
            ]">
                <x-email::text :style="[
                    'margin' => '0',
                    'line-height' => '2',
                    'font-size' => '15px',
                    'font-weight' => 'bold'
                ]">
                    Shipping to: {{ $customerName ?? 'Alan Turing' }}
                </x-email::text>
                <x-email::text :style="[
                    'margin' => '0',
                    'line-height' => '2',
                    'color' => '#747474',
                    'font-weight' => '500',
                    'font-size' => '14px'
                ]">
                    {{ $shippingAddress ?? '2125 Chestnut St, San Francisco, CA 94123' }}
                </x-email::text>
            </x-email::section>

            {{-- Divider --}}
            <x-email::hr :style="[
                'border-color' => '#E5E5E5',
                'margin' => '0'
            ]" />

            {{-- Product Section --}}
            <x-email::section :style="[
                'padding-left' => '40px',
                'padding-right' => '40px',
                'padding-top' => '40px',
                'padding-bottom' => '40px'
            ]">
                <x-email::row>
                    <x-email::column>
                        <x-email::img
                            src="{{ $productImageUrl ?? '/static/nike-product.png' }}"
                            alt="{{ $productName ?? 'Brazil 2022/23 Stadium Away Women\'s Nike Dri-FIT Soccer Jersey' }}"
                            width="260"
                            :style="['float' => 'left']" />
                    </x-email::column>
                    <x-email::column :style="[
                        'vertical-align' => 'top',
                        'padding-left' => '12px'
                    ]">
                        <x-email::text :style="[
                            'margin' => '0',
                            'line-height' => '2',
                            'font-weight' => '500'
                        ]">
                            {{ $productName ?? 'Brazil 2022/23 Stadium Away Women\'s Nike Dri-FIT Soccer Jersey' }}
                        </x-email::text>
                        <x-email::text :style="[
                            'margin' => '0',
                            'line-height' => '2',
                            'color' => '#747474',
                            'font-weight' => '500'
                        ]">
                            {{ $productSize ?? 'Size L (12–14)' }}
                        </x-email::text>
                    </x-email::column>
                </x-email::row>
            </x-email::section>

            {{-- Divider --}}
            <x-email::hr :style="[
                'border-color' => '#E5E5E5',
                'margin' => '0'
            ]" />

            {{-- Order Details --}}
            <x-email::section :style="[
                'padding-left' => '40px',
                'padding-right' => '40px',
                'padding-top' => '22px',
                'padding-bottom' => '22px'
            ]">
                <x-email::row :style="[
                    'display' => 'inline-flex',
                    'margin-bottom' => '40px'
                ]">
                    <x-email::column :style="['width' => '170px']">
                        <x-email::text :style="[
                            'margin' => '0',
                            'line-height' => '2',
                            'font-weight' => 'bold'
                        ]">
                            Order Number
                        </x-email::text>
                        <x-email::text :style="[
                            'margin' => '12px 0 0 0',
                            'font-weight' => '500',
                            'line-height' => '1.4',
                            'color' => '#6F6F6F'
                        ]">
                            {{ $orderNumber ?? 'C0106373851' }}
                        </x-email::text>
                    </x-email::column>
                    <x-email::column>
                        <x-email::text :style="[
                            'margin' => '0',
                            'line-height' => '2',
                            'font-weight' => 'bold'
                        ]">
                            Order Date
                        </x-email::text>
                        <x-email::text :style="[
                            'margin' => '12px 0 0 0',
                            'font-weight' => '500',
                            'line-height' => '1.4',
                            'color' => '#6F6F6F'
                        ]">
                            {{ $orderDate ?? 'Sep 22, 2022' }}
                        </x-email::text>
                    </x-email::column>
                </x-email::row>
                <x-email::row>
                    <x-email::column align="center">
                        <x-email::link
                            href="{{ $orderStatusUrl ?? 'https://www.nike.com/orders' }}"
                            :style="[
                                'border' => '1px solid #929292',
                                'font-size' => '16px',
                                'text-decoration' => 'none',
                                'padding' => '10px 0px',
                                'width' => '220px',
                                'display' => 'block',
                                'text-align' => 'center',
                                'font-weight' => '500',
                                'color' => '#000'
                            ]">
                            Order Status
                        </x-email::link>
                    </x-email::column>
                </x-email::row>
            </x-email::section>

            {{-- Divider --}}
            <x-email::hr :style="[
                'border-color' => '#E5E5E5',
                'margin' => '0'
            ]" />

            {{-- Product Recommendations --}}
            <x-email::section :style="[
                'padding-top' => '22px',
                'padding-bottom' => '22px'
            ]">
                <x-email::row>
                    <x-email::heading :level="2" :style="[
                        'font-size' => '32px',
                        'line-height' => '1.3',
                        'font-weight' => '700',
                        'text-align' => 'center',
                        'letter-spacing' => '-1px',
                        'margin' => '0 0 20px 0'
                    ]">
                        Top Picks For You
                    </x-email::heading>
                </x-email::row>
                <x-email::row :style="['padding' => '20px 0']">
                    {{-- Product 1 --}}
                    <x-email::column :style="[
                        'vertical-align' => 'top',
                        'text-align' => 'left',
                        'padding-left' => '6px',
                        'padding-right' => '2px'
                    ]" align="center">
                        <x-email::img
                            src="{{ $recommendation1Image ?? '/static/nike-recomendation-1.png' }}"
                            alt="USWNT 2022/23 Stadium Home"
                            width="100%" />
                        <x-email::text :style="[
                            'margin' => '0',
                            'font-size' => '15px',
                            'line-height' => '1',
                            'padding-left' => '10px',
                            'padding-right' => '10px',
                            'padding-top' => '12px',
                            'font-weight' => '500'
                        ]">
                            USWNT 2022/23 Stadium Home
                        </x-email::text>
                        <x-email::text :style="[
                            'margin' => '0',
                            'font-size' => '15px',
                            'line-height' => '1',
                            'padding-left' => '10px',
                            'padding-right' => '10px',
                            'padding-top' => '4px',
                            'color' => '#747474'
                        ]">
                            Women's Nike Dri-FIT Soccer Jersey
                        </x-email::text>
                    </x-email::column>

                    {{-- Product 2 --}}
                    <x-email::column :style="[
                        'vertical-align' => 'top',
                        'text-align' => 'left',
                        'padding-left' => '2px',
                        'padding-right' => '2px'
                    ]" align="center">
                        <x-email::img
                            src="{{ $recommendation2Image ?? '/static/nike-recomendation-2.png' }}"
                            alt="Brazil 2022/23 Stadium Goalkeeper"
                            width="100%" />
                        <x-email::text :style="[
                            'margin' => '0',
                            'font-size' => '15px',
                            'line-height' => '1',
                            'padding-left' => '10px',
                            'padding-right' => '10px',
                            'padding-top' => '12px',
                            'font-weight' => '500'
                        ]">
                            Brazil 2022/23 Stadium Goalkeeper
                        </x-email::text>
                        <x-email::text :style="[
                            'margin' => '0',
                            'font-size' => '15px',
                            'line-height' => '1',
                            'padding-left' => '10px',
                            'padding-right' => '10px',
                            'padding-top' => '4px',
                            'color' => '#747474'
                        ]">
                            Men's Nike Dri-FIT Short-Sleeve Football Shirt
                        </x-email::text>
                    </x-email::column>

                    {{-- Product 3 --}}
                    <x-email::column :style="[
                        'vertical-align' => 'top',
                        'text-align' => 'left',
                        'padding-left' => '2px',
                        'padding-right' => '2px'
                    ]" align="center">
                        <x-email::img
                            src="{{ $recommendation3Image ?? '/static/nike-recomendation-3.png' }}"
                            alt="FFF Women's Soccer Jacket"
                            width="100%" />
                        <x-email::text :style="[
                            'margin' => '0',
                            'font-size' => '15px',
                            'line-height' => '1',
                            'padding-left' => '10px',
                            'padding-right' => '10px',
                            'padding-top' => '12px',
                            'font-weight' => '500'
                        ]">
                            FFF
                        </x-email::text>
                        <x-email::text :style="[
                            'margin' => '0',
                            'font-size' => '15px',
                            'line-height' => '1',
                            'padding-left' => '10px',
                            'padding-right' => '10px',
                            'padding-top' => '4px',
                            'color' => '#747474'
                        ]">
                            Women's Soccer Jacket
                        </x-email::text>
                    </x-email::column>

                    {{-- Product 4 --}}
                    <x-email::column :style="[
                        'vertical-align' => 'top',
                        'text-align' => 'left',
                        'padding-left' => '2px',
                        'padding-right' => '6px'
                    ]" align="center">
                        <x-email::img
                            src="{{ $recommendation4Image ?? '/static/nike-recomendation-4.png' }}"
                            alt="FFF Women's Nike Pre-Match Football Top"
                            width="100%" />
                        <x-email::text :style="[
                            'margin' => '0',
                            'font-size' => '15px',
                            'line-height' => '1',
                            'padding-left' => '10px',
                            'padding-right' => '10px',
                            'padding-top' => '12px',
                            'font-weight' => '500'
                        ]">
                            FFF
                        </x-email::text>
                        <x-email::text :style="[
                            'margin' => '0',
                            'font-size' => '15px',
                            'line-height' => '1',
                            'padding-left' => '10px',
                            'padding-right' => '10px',
                            'padding-top' => '4px',
                            'color' => '#747474'
                        ]">
                            Women's Nike Pre-Match Football Top
                        </x-email::text>
                    </x-email::column>
                </x-email::row>
            </x-email::section>

            {{-- Divider --}}
            <x-email::hr :style="[
                'border-color' => '#E5E5E5',
                'margin' => '0'
            ]" />

            {{-- Help Menu --}}
            <x-email::section :style="[
                'padding-left' => '20px',
                'padding-right' => '20px',
                'padding-top' => '20px',
                'background-color' => '#F7F7F7'
            ]">
                <x-email::row>
                    <x-email::text :style="[
                        'padding-left' => '20px',
                        'padding-right' => '20px',
                        'font-weight' => 'bold',
                        'margin' => '0'
                    ]">
                        Get Help
                    </x-email::text>
                </x-email::row>
                <x-email::row :style="[
                    'padding-top' => '22px',
                    'padding-bottom' => '22px',
                    'padding-left' => '20px',
                    'padding-right' => '20px'
                ]">
                    <x-email::column :style="['width' => '33%']">
                        <x-email::link href="https://www.nike.com/" :style="[
                            'font-size' => '13.5px',
                            'margin-top' => '0',
                            'font-weight' => '500',
                            'color' => '#000',
                            'text-decoration' => 'underline'
                        ]">
                            Shipping Status
                        </x-email::link>
                    </x-email::column>
                    <x-email::column :style="['width' => '33%']">
                        <x-email::link href="https://www.nike.com/" :style="[
                            'font-size' => '13.5px',
                            'margin-top' => '0',
                            'font-weight' => '500',
                            'color' => '#000',
                            'text-decoration' => 'underline'
                        ]">
                            Shipping & Delivery
                        </x-email::link>
                    </x-email::column>
                    <x-email::column :style="['width' => '33%']">
                        <x-email::link href="https://www.nike.com/" :style="[
                            'font-size' => '13.5px',
                            'margin-top' => '0',
                            'font-weight' => '500',
                            'color' => '#000',
                            'text-decoration' => 'underline'
                        ]">
                            Returns & Exchanges
                        </x-email::link>
                    </x-email::column>
                </x-email::row>
                <x-email::row :style="[
                    'padding-left' => '20px',
                    'padding-right' => '20px',
                    'padding-top' => '0',
                    'padding-bottom' => '22px'
                ]">
                    <x-email::column :style="['width' => '33%']">
                        <x-email::link href="https://www.nike.com/" :style="[
                            'font-size' => '13.5px',
                            'margin-top' => '0',
                            'font-weight' => '500',
                            'color' => '#000',
                            'text-decoration' => 'underline'
                        ]">
                            How to Return
                        </x-email::link>
                    </x-email::column>
                    <x-email::column :style="['width' => '66%']">
                        <x-email::link href="https://www.nike.com/" :style="[
                            'font-size' => '13.5px',
                            'margin-top' => '0',
                            'font-weight' => '500',
                            'color' => '#000',
                            'text-decoration' => 'underline'
                        ]">
                            Contact Options
                        </x-email::link>
                    </x-email::column>
                </x-email::row>

                {{-- Phone Contact --}}
                <x-email::hr :style="[
                    'border-color' => '#E5E5E5',
                    'margin' => '0'
                ]" />
                <x-email::row :style="[
                    'padding-left' => '20px',
                    'padding-right' => '20px',
                    'padding-top' => '32px',
                    'padding-bottom' => '22px'
                ]">
                    <x-email::column>
                        <x-email::row>
                            <x-email::column :style="['width' => '16px']">
                                <x-email::img
                                    src="{{ $phoneIconUrl ?? '/static/nike-phone.png' }}"
                                    alt="Nike Phone"
                                    width="16"
                                    height="26"
                                    :style="['padding-right' => '14px']" />
                            </x-email::column>
                            <x-email::column>
                                <x-email::text :style="[
                                    'font-size' => '13.5px',
                                    'margin-bottom' => '0',
                                    'margin-top' => '0',
                                    'font-weight' => '500',
                                    'color' => '#000'
                                ]">
                                    1-800-806-6453
                                </x-email::text>
                            </x-email::column>
                        </x-email::row>
                    </x-email::column>
                    <x-email::column>
                        <x-email::text :style="[
                            'font-size' => '13.5px',
                            'margin-bottom' => '0',
                            'margin-top' => '0',
                            'font-weight' => '500',
                            'color' => '#000'
                        ]">
                            4 am - 11 pm PT
                        </x-email::text>
                    </x-email::column>
                </x-email::row>
            </x-email::section>

            {{-- Divider --}}
            <x-email::hr :style="[
                'border-color' => '#E5E5E5',
                'margin' => '0'
            ]" />

            {{-- Categories --}}
            <x-email::section :style="[
                'padding-top' => '22px',
                'padding-bottom' => '22px'
            ]">
                <x-email::row>
                    <x-email::heading :level="2" :style="[
                        'font-size' => '32px',
                        'line-height' => '1.3',
                        'font-weight' => '700',
                        'text-align' => 'center',
                        'letter-spacing' => '-1px',
                        'margin' => '0 0 12px 0'
                    ]">
                        Nike.com
                    </x-email::heading>
                </x-email::row>
                <x-email::row :style="[
                    'width' => '370px',
                    'margin' => 'auto',
                    'padding-top' => '12px'
                ]">
                    <x-email::column align="center">
                        <x-email::link href="https://www.nike.com/" :style="[
                            'font-weight' => '500',
                            'color' => '#000',
                            'text-decoration' => 'underline'
                        ]">
                            Men
                        </x-email::link>
                    </x-email::column>
                    <x-email::column align="center">
                        <x-email::link href="https://www.nike.com/" :style="[
                            'font-weight' => '500',
                            'color' => '#000',
                            'text-decoration' => 'underline'
                        ]">
                            Women
                        </x-email::link>
                    </x-email::column>
                    <x-email::column align="center">
                        <x-email::link href="https://www.nike.com/" :style="[
                            'font-weight' => '500',
                            'color' => '#000',
                            'text-decoration' => 'underline'
                        ]">
                            Kids
                        </x-email::link>
                    </x-email::column>
                    <x-email::column align="center">
                        <x-email::link href="https://www.nike.com/" :style="[
                            'font-weight' => '500',
                            'color' => '#000',
                            'text-decoration' => 'underline'
                        ]">
                            Customize
                        </x-email::link>
                    </x-email::column>
                </x-email::row>
            </x-email::section>

            {{-- Divider --}}
            <x-email::hr :style="[
                'border-color' => '#E5E5E5',
                'margin' => '12px 0 0 0'
            ]" />

            {{-- Footer --}}
            <x-email::section :style="[
                'padding-top' => '22px',
                'padding-bottom' => '22px'
            ]">
                <x-email::row :style="[
                    'width' => '166px',
                    'margin' => 'auto'
                ]">
                    <x-email::column>
                        <x-email::text :style="[
                            'margin' => '0',
                            'color' => '#AFAFAF',
                            'font-size' => '13px',
                            'text-align' => 'center'
                        ]">
                            Web Version
                        </x-email::text>
                    </x-email::column>
                    <x-email::column>
                        <x-email::text :style="[
                            'margin' => '0',
                            'color' => '#AFAFAF',
                            'font-size' => '13px',
                            'text-align' => 'center'
                        ]">
                            Privacy Policy
                        </x-email::text>
                    </x-email::column>
                </x-email::row>

                <x-email::row>
                    <x-email::text :style="[
                        'margin' => '0',
                        'color' => '#AFAFAF',
                        'font-size' => '13px',
                        'text-align' => 'center',
                        'padding-top' => '30px',
                        'padding-bottom' => '30px'
                    ]">
                        Please contact us if you have any questions. (If you reply to this email, we won't be able to see it.)
                    </x-email::text>
                </x-email::row>

                <x-email::row>
                    <x-email::text :style="[
                        'margin' => '0',
                        'color' => '#AFAFAF',
                        'font-size' => '13px',
                        'text-align' => 'center'
                    ]">
                        © 2022 Nike, Inc. All Rights Reserved.
                    </x-email::text>
                </x-email::row>

                <x-email::row>
                    <x-email::text :style="[
                        'margin' => '0',
                        'color' => '#AFAFAF',
                        'font-size' => '13px',
                        'text-align' => 'center'
                    ]">
                        NIKE, INC. One Bowerman Drive, Beaverton, Oregon 97005, USA.
                    </x-email::text>
                </x-email::row>
            </x-email::section>
        </x-email::container>
    </x-email::html-body>
</x-email::html>
