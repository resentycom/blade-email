@php
    // Default styles matching React Email exactly
    $defaultStyle = [
        'display' => 'block',
        'outline' => 'none', 
        'border' => 'none',
        'text-decoration' => 'none'
    ];
    
    // Merge with provided styles
    $providedStyle = is_array($style ?? null) ? $style : [];
    $mergedStyle = array_merge($defaultStyle, $providedStyle);
    
    // Convert to CSS string
    $styleString = collect($mergedStyle)
        ->map(fn($value, $key) => "{$key}: {$value}")
        ->implode('; ');
@endphp

<img
    {{ $attributes->except(['style'])->merge([
        'alt' => $alt ?? '',
        'src' => $src ?? '',
        'width' => $width ?? null,
        'height' => $height ?? null,
        'style' => $styleString
    ]) }} />