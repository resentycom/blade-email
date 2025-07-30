@php
    // Default height
    $height = $height ?? '20px';
    
    // Default styles
    $defaultStyles = [
        'height' => $height,
        'line-height' => '1px',
        'font-size' => '1px',
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

<table border="0" cellpadding="0" cellspacing="0" width="100%" {{ $attributes->except(['style', 'height']) }}>
    <tr>
        <td style="{{ $styleString }}">&nbsp;</td>
    </tr>
</table>