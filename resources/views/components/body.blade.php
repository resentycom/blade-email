@php
    // Default styles for body wrapper
    $defaultStyles = [
        'padding' => '20px 40px',
        'font-family' => 'Arial, sans-serif',
        'font-size' => '16px',
        'line-height' => '1.6',
        'color' => '#333333',
    ];

    // Handle style attribute - could be array or string
    $providedStyles = [];
    if (isset($style)) {
        $providedStyles = is_array($style) ? $style : [];
    }

    // Merge with provided styles
    $inlineStyles = array_merge($defaultStyles, $providedStyles);
    
    // Build style string
    $styleString = collect($inlineStyles)
        ->map(fn($value, $key) => "{$key}: {$value}")
        ->implode('; ');
@endphp

<table border="0" cellpadding="0" cellspacing="0" width="100%" {{ $attributes->except(['style']) }}>
    <tr>
        <td style="{{ $styleString }}">
            {{ $slot }}
        </td>
    </tr>
</table>