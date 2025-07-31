# Blade Email

[![Latest Version on Packagist](https://img.shields.io/packagist/v/resenty/blade-email.svg?style=flat-square)](https://packagist.org/packages/resenty/blade-email)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/resentycom/blade-email/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/resentycom/blade-email/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/resentycom/blade-email/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/resentycom/blade-email/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/resenty/blade-email.svg?style=flat-square)](https://packagist.org/packages/resenty/blade-email)

High-quality, unstyled Blade components for creating beautiful emails in Laravel. Inspired by [React Email](https://react.email/), this package provides a comprehensive set of email-safe components that render perfectly across all major email clients.

## Features

- 🎨 **22+ email-safe components** - Everything you need to build professional emails
- 📱 **Perfect cross-client compatibility** - Tested across Gmail, Outlook, Apple Mail, and more
- 🛡️ **Type-safe & validated** - Built-in validation and error handling for reliable email rendering
- 🎯 **Unstyled by default** - Complete control over your email styling
- 🚀 **Laravel-native** - Built specifically for Laravel using modern Blade component architecture
- 📦 **Zero configuration** - Works out of the box with sensible defaults
- 🔧 **Extensible** - Easy to customize and extend for your specific needs

## Installation

You can install the package via composer:

```bash
composer require resenty/blade-email
```

The package will automatically register its service provider.

## Usage

### Basic Example

```blade
<x-email-html>
    <x-email-head>
        <title>Welcome to our platform!</title>
    </x-email-head>
    <x-email-html-body>
        <x-email-container>
            <x-email-heading :level="1">
                Welcome to our platform!
            </x-email-heading>
            
            <x-email-text>
                Thanks for signing up. We're excited to have you on board.
            </x-email-text>
            
            <x-email-button href="https://example.com/verify">
                Verify Your Account
            </x-email-button>
        </x-email-container>
    </x-email-html-body>
</x-email-html>
```

### Advanced Example with Styling

```blade
<x-email-html>
    <x-email-head>
        <title>Order Confirmation</title>
        <x-email-font 
            fontFamily="Inter" 
            fallbackFontFamily="Arial, sans-serif"
            :webFont="[
                'url' => 'https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap',
                'format' => 'woff2'
            ]" />
    </x-email-head>
    <x-email-html-body :style="['background-color' => '#f6f9fc']">
        <x-email-container :style="[
            'max-width' => '600px',
            'background-color' => '#ffffff',
            'padding' => '40px',
            'border-radius' => '8px',
            'margin' => '40px auto'
        ]">
            <x-email-img 
                src="https://example.com/logo.png" 
                alt="Company Logo"
                width="150"
                :style="['margin-bottom' => '32px']" />
            
            <x-email-heading :level="1" :style="[
                'color' => '#1a1a1a',
                'font-size' => '24px',
                'margin-bottom' => '16px'
            ]">
                Order Confirmation #12345
            </x-email-heading>
            
            <x-email-text :style="[
                'color' => '#666666',
                'line-height' => '1.6',
                'margin-bottom' => '24px'
            ]">
                Thank you for your order! We'll send you shipping confirmation when your items are on the way.
            </x-email-text>
            
            <x-email-section :style="[
                'background-color' => '#f8fafc',
                'padding' => '24px',
                'border-radius' => '6px',
                'margin-bottom' => '24px'
            ]">
                <x-email-text :style="['font-weight' => '600', 'margin-bottom' => '8px']">
                    Order Details:
                </x-email-text>
                <x-email-text :style="['margin' => '0']">
                    2x Product Name - $49.99 each
                </x-email-text>
            </x-email-section>
            
            <x-email-button 
                href="https://example.com/order/12345"
                :style="[
                    'background-color' => '#0066cc',
                    'color' => '#ffffff',
                    'padding' => '12px 24px',
                    'border-radius' => '6px',
                    'font-weight' => '600'
                ]">
                View Order Details
            </x-email-button>
            
            <x-email-hr :style="['margin' => '32px 0', 'border-color' => '#e5e7eb']" />
            
            <x-email-text :style="[
                'color' => '#999999',
                'font-size' => '14px',
                'text-align' => 'center'
            ]">
                If you have any questions, reply to this email or contact our 
                <x-email-link href="mailto:support@example.com">support team</x-email-link>.
            </x-email-text>
        </x-email-container>
    </x-email-html-body>
</x-email-html>
```

## Available Components

### Structure Components
- `<x-email-html>` - Root HTML document with email-safe DOCTYPE
- `<x-email-head>` - Document head with essential meta tags
- `<x-email-html-body>` - HTML body element
- `<x-email-body>` - Email body wrapper with table-based layout

### Layout Components
- `<x-email-container>` - Centered container with max-width
- `<x-email-section>` - Content section wrapper
- `<x-email-row>` - Table row for multi-column layouts
- `<x-email-column>` - Table cell for column content

### Content Components
- `<x-email-text>` - Paragraph text with customizable tag
- `<x-email-heading>` - Headings (h1-h6) with level validation
- `<x-email-link>` - Styled anchor links
- `<x-email-button>` - Call-to-action buttons
- `<x-email-img>` - Images with proper email attributes

### Utility Components
- `<x-email-spacer>` - Vertical spacing with customizable height
- `<x-email-hr>` - Horizontal rules/dividers
- `<x-email-divider>` - Styled content dividers
- `<x-email-preview>` - Email preview text (hidden in email clients)

### Advanced Components
- `<x-email-font>` - Web font loading with fallbacks
- `<x-email-code-block>` - Syntax-highlighted code blocks
- `<x-email-header>` - Semantic header sections
- `<x-email-footer>` - Semantic footer sections
- `<x-email-layout>` - Generic layout wrapper

## Component Documentation

### Common Props

All components support standard HTML attributes and these common props:

- `style` - Array or string of CSS styles
- Standard HTML attributes (id, class, data-*, etc.)

### Button Component
```blade
<x-email-button 
    href="https://example.com"     {{-- Required --}}
    target="_blank"                {{-- Optional: _blank, _self, _parent, _top --}}
    :style="['background-color' => '#007bff']">
    Click Me
</x-email-button>
```

### Image Component
```blade
<x-email-img 
    src="https://example.com/image.jpg"  {{-- Required --}}
    alt="Description"                    {{-- Recommended for accessibility --}}
    width="300"                          {{-- Optional --}}
    height="200"                         {{-- Optional --}}
    :style="['border-radius' => '8px']" />
```

### Text Component
```blade
<x-email-text 
    tag="p"                              {{-- Optional: p, span, div, h1-h6 --}}
    :style="['color' => '#333333']">
    Your content here
</x-email-text>
```

### Heading Component
```blade
<x-email-heading 
    :level="2"                           {{-- Optional: 1-6 or h1-h6 --}}
    :style="['color' => '#1a1a1a']">
    Your Heading
</x-email-heading>
```

### Font Component
```blade
<x-email-font 
    fontFamily="Inter"
    fallbackFontFamily="Arial, sans-serif"
    :fontWeight="400"
    :webFont="[
        'url' => 'https://fonts.googleapis.com/css2?family=Inter',
        'format' => 'woff2'
    ]" />
```

### Code Block Component
```blade
<x-email-code-block
    language="php"
    theme="github-light"
    title="Example.php"
    :showLineNumbers="true"
    code="<?php
    
namespace App\Mail;

use Illuminate\Mail\Mailable;

class WelcomeEmail extends Mailable
{
    public function build()
    {
        return $this->view('emails.welcome')
                    ->subject('Welcome!');
    }
}" />
```

**Supported Languages:** PHP, JavaScript, TypeScript, Python, Java, Go, Rust, SQL, HTML, CSS, JSON, YAML, and more.

**Available Themes:** github-light, github-dark, vs-code-light, vs-code-dark, monokai, dracula, one-dark, nord, tokyo-night, catppuccin, solarized-light, solarized-dark.

### Spacer Component
```blade
<x-email-spacer 
    height="32px"                        {{-- Optional: any CSS height value --}}
    :style="['background-color' => 'transparent']" />
```

## Styling

### Array-based Styling (Recommended)
```blade
<x-email-text :style="[
    'color' => '#333333',
    'font-size' => '16px',
    'line-height' => '1.6',
    'margin-bottom' => '16px'
]">
    Content here
</x-email-text>
```

### String-based Styling
```blade
<x-email-text style="color: #333333; font-size: 16px; line-height: 1.6;">
    Content here
</x-email-text>
```

## Advanced Usage

### Two-Column Layout

```blade
<x-email-html>
    <x-email-head>
        <title>Newsletter</title>
    </x-email-head>
    <x-email-html-body>
        <x-email-container>
            <x-email-row>
                <x-email-column :style="['width' => '50%', 'padding' => '0 10px 0 0']">
                    <x-email-text>Left column content</x-email-text>
                </x-email-column>
                <x-email-column :style="['width' => '50%', 'padding' => '0 0 0 10px']">
                    <x-email-text>Right column content</x-email-text>
                </x-email-column>
            </x-email-row>
        </x-email-container>
    </x-email-html-body>
</x-email-html>
```

### Using Web Fonts

```blade
<x-email-html>
    <x-email-head>
        {{-- Preload fonts for better performance --}}
        <link rel="preload" href="https://fonts.gstatic.com/s/inter/v13/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa1ZL7.woff2" as="font" type="font/woff2" crossorigin />
        
        {{-- Load Google Fonts: Inter --}}
        <x-email-font
            fontFamily="Inter"
            fallbackFontFamily="Arial, sans-serif"
            :webFont="[
                'url' => 'https://fonts.gstatic.com/s/inter/v13/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa1ZL7.woff2',
                'format' => 'woff2'
            ]"
            :fontWeight="400" />
    </x-email-head>

    <x-email-html-body :style="['font-family' => 'Inter, Arial, sans-serif']">
        <x-email-container>
            <x-email-text :style="['font-weight' => '400']">
                This text uses Inter with Arial fallback!
            </x-email-text>
        </x-email-container>
    </x-email-html-body>
</x-email-html>
```

## Email Client Compatibility

This package is tested and works perfectly across:

- ✅ Gmail (Web, iOS, Android)
- ✅ Outlook (2016+, Web, iOS, Android) 
- ✅ Apple Mail (macOS, iOS)
- ✅ Yahoo Mail
- ✅ AOL Mail
- ✅ Thunderbird
- ✅ Samsung Email
- ✅ Windows Mail

The components use table-based layouts and inline styles for maximum compatibility.

## Development

### Running the Playground

The package includes a playground for testing components:

```bash
cd playground
composer install
php artisan serve
```

Visit the following URLs to see example emails:
- `http://localhost:8000/plaid-verify` - Identity verification email
- `http://localhost:8000/vercel-invite` - Team invitation email  
- `http://localhost:8000/nike-receipt` - Order receipt email
- `http://localhost:8000/font-example` - Web font example
- `http://localhost:8000/code-example` - Code block example

### Publishing Views

To customize the component views, publish them to your application:

```bash
php artisan vendor:publish --tag=blade-email-views
```

This will copy all component views to `resources/views/vendor/blade-email/components/`.

### Testing

```bash
composer test
```

### Code Style

```bash
composer format
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Your Name](https://github.com/yourusername)
- [All Contributors](../../contributors)

Inspired by [React Email](https://react.email/) - bringing the same developer experience to Laravel.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.