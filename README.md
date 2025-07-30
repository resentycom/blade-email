# Blade Email Components

High-quality unstyled Blade components for creating beautiful emails in Laravel 12. Inspired by [React Email](https://react.email/components), this package provides a comprehensive set of email-safe components that work across all major email clients.

## Installation

```bash
composer require blade-email/blade-email
```

The package will automatically register itself via Laravel's package discovery.

## Usage

### Basic Email Structure

```blade
<x-blade-email::layout title="Welcome Email" preheader="Thanks for joining us!">
    <x-blade-email::header
        logo="https://example.com/logo.png"
        title="Welcome to Our Platform"
    />

    <x-blade-email::body>
        <x-blade-email::text>
            Hello {{ $user->name }},
        </x-blade-email::text>

        <x-blade-email::text>
            Welcome to our platform! We're excited to have you on board.
        </x-blade-email::text>

        <x-blade-email::button href="https://example.com/get-started" backgroundColor="#007bff">
            Get Started
        </x-blade-email::button>
    </x-blade-email::body>

    <x-blade-email::footer>
        <x-blade-email::text fontSize="12px" color="#666666">
            © 2024 Your Company. All rights reserved.
        </x-blade-email::text>
    </x-blade-email::footer>
</x-blade-email::layout>
```

## Components

### Layout
The main email wrapper with proper HTML email structure.

**Props:**
- `title` - Email title for `<title>` tag
- `preheader` - Preview text shown in email clients
- `styles` - Additional CSS styles

### Header
Email header section with optional logo and title.

**Props:**
- `logo` - Logo image URL
- `logoAlt` - Logo alt text
- `logoWidth` - Logo width (default: 200px)
- `title` - Header title text
- `titleSize` - Title font size (default: 24px)
- `titleColor` - Title color (default: #333333)
- `align` - Alignment (default: center)
- `padding` - Padding (default: 40px 40px 20px 40px)

### Body
Main content area with typography styling.

**Props:**
- `padding` - Padding (default: 20px 40px)
- `fontSize` - Font size (default: 16px)
- `lineHeight` - Line height (default: 1.6)
- `textColor` - Text color (default: #333333)

### Button
Email-safe button component with Outlook compatibility.

**Props:**
- `href` - Button URL
- `backgroundColor` - Background color (default: #007bff)
- `textColor` - Text color (default: #ffffff)
- `borderRadius` - Border radius (default: 4px)
- `padding` - Button padding (default: 12px 24px)
- `fontSize` - Font size (default: 16px)
- `fontWeight` - Font weight (default: bold)
- `align` - Alignment (default: center)

### Text
Typography component for paragraphs and headings.

**Props:**
- `tag` - HTML tag (default: p)
- `fontSize` - Font size (default: 16px)
- `lineHeight` - Line height (default: 1.6)
- `color` - Text color (default: #333333)
- `fontFamily` - Font family (default: Arial, sans-serif)
- `fontWeight` - Font weight (default: normal)
- `textAlign` - Text alignment (default: left)
- `margin` - Margin (default: 0 0 16px 0)

### Footer
Email footer section.

**Props:**
- `align` - Alignment (default: left)
- `padding` - Padding (default: 20px 40px 40px 40px)
- `borderTop` - Top border (default: none)
- `fontSize` - Font size (default: 14px)
- `lineHeight` - Line height (default: 1.4)
- `textColor` - Text color (default: #666666)

### Container
Responsive container with max-width constraints.

**Props:**
- `maxWidth` - Maximum width (default: 600px)
- `padding` - Padding (default: 0)
- `backgroundColor` - Background color (default: transparent)
- `align` - Alignment (default: center)

### Row & Column
Layout components for creating multi-column layouts.

**Row Props:**
- `backgroundColor` - Background color (default: transparent)

**Column Props:**
- `width` - Column width (default: 100%)
- `align` - Alignment (default: left)
- `verticalAlign` - Vertical alignment (default: top)
- `padding` - Padding (default: 0)

### Spacer
Adds vertical spacing between elements.

**Props:**
- `height` - Spacer height (default: 20px)

### Divider
Horizontal divider line.

**Props:**
- `padding` - Padding (default: 20px 40px)
- `thickness` - Line thickness (default: 1px)
- `style` - Line style (default: solid)
- `color` - Line color (default: #e0e0e0)

### Font
Web font loader with email client compatibility and fallbacks.

**Props:**
- `fontFamily` - The font family name (default: Arial)
- `fallbackFontFamily` - Fallback font family (default: sans-serif)
- `webFont` - Array with 'url' and 'format' keys for web font
- `fontWeight` - Font weight (default: 400)
- `fontStyle` - Font style (default: normal)
- `preload` - Whether to preload the font (default: true)

### Section
Generic section wrapper.

**Props:**
- `backgroundColor` - Background color (default: transparent)
- `padding` - Padding (default: 0)

## Advanced Usage

### Two-Column Layout

```blade
<x-blade-email::layout title="Newsletter">
    <x-blade-email::body>
        <x-blade-email::row>
            <x-blade-email::column width="50%" padding="0 10px 0 0">
                <x-blade-email::text>Left column content</x-blade-email::text>
            </x-blade-email::column>
            <x-blade-email::column width="50%" padding="0 0 0 10px">
                <x-blade-email::text>Right column content</x-blade-email::text>
            </x-blade-email::column>
        </x-blade-email::row>
    </x-blade-email::body>
</x-blade-email::layout>
```

### Custom Styling

```blade
<x-blade-email::layout
    title="Styled Email"
    styles="
        .custom-header { background: linear-gradient(45deg, #ff6b6b, #4ecdc4); }
        .highlight { background-color: #fff3cd; padding: 15px; border-radius: 4px; }
    "
>
    <x-blade-email::section backgroundColor="#f8f9fa" padding="40px">
        <x-blade-email::text class="highlight">
            This is a highlighted message!
        </x-blade-email::text>
    </x-blade-email::section>
</x-blade-email::layout>
```

### Using Web Fonts

```blade
<x-blade-email::layout title="Beautiful Typography">
    {{-- Load Google Fonts in the head --}}
    <x-slot name="head">
        <x-blade-email::font
            fontFamily="Roboto"
            fallbackFontFamily="Arial, sans-serif"
            :webFont="[
                'url' => 'https://fonts.gstatic.com/s/roboto/v30/KFOmCnqEu92Fr1Mu4mxKKTU1Kg.woff2',
                'format' => 'woff2'
            ]"
            :fontWeight="400" />

        <x-blade-email::font
            fontFamily="Roboto"
            fallbackFontFamily="Arial, sans-serif"
            :webFont="[
                'url' => 'https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmEU9fBBc4AQ.woff2',
                'format' => 'woff2'
            ]"
            :fontWeight="700" />
    </x-slot>

    <x-blade-email::body style="font-family: Roboto, Arial, sans-serif;">
        <x-blade-email::text style="font-weight: 700;">
            This text uses Roboto Bold with Arial fallback!
        </x-blade-email::text>
    </x-blade-email::body>
</x-blade-email::layout>
```

## Publishing Views

To customize the component views, publish them to your application:

```bash
php artisan vendor:publish --tag=blade-email-views
```

This will copy all component views to `resources/views/vendor/blade-email/components/`.

## Email Client Compatibility

This package is designed to work across all major email clients including:

- Gmail
- Outlook (all versions)
- Apple Mail
- Yahoo Mail
- Thunderbird
- Mobile email clients

The components use table-based layouts and inline styles for maximum compatibility.

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This package is open-sourced software licensed under the [MIT license](LICENSE).
