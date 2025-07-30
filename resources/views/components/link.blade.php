@php
    // Default props matching React Email
    $target = $target ?? '_blank';
    
    // Default styles for better usability
    $defaultStyle = [
        'color' => '#067df7',
        'text-decoration' => 'none'
    ];
    
    // Merge with provided styles (array-first approach)
    $providedStyle = $style ?? [];
    if (is_string($providedStyle)) {
        // If string provided, keep it as is for backward compatibility
        $styleString = $providedStyle;
    } else {
        // Array approach - merge with defaults
        $mergedStyle = array_merge($defaultStyle, $providedStyle);
        $styleString = collect($mergedStyle)
            ->map(fn($value, $key) => "{$key}: {$value}")
            ->implode('; ');
    }
@endphp

<a
    {{ $attributes->except(['style'])->merge([
        'href' => $href ?? '',
        'target' => $target,
        'style' => $styleString
    ]) }}>{{ $slot }}</a>