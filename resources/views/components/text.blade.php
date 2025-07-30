@php
    // Default styles matching React Email
    $defaultStyle = [
        'font-size' => '14px',
        'line-height' => '24px'
    ];
    
    // Handle default margins like React Email does
    $providedStyle = is_array($style ?? null) ? $style : [];
    
    // Add default margins if not provided
    if (!isset($providedStyle['margin-top']) && !isset($providedStyle['margin'])) {
        $defaultStyle['margin-top'] = '16px';
    }
    if (!isset($providedStyle['margin-bottom']) && !isset($providedStyle['margin'])) {
        $defaultStyle['margin-bottom'] = '16px';
    }
    
    // Merge styles
    $mergedStyle = array_merge($defaultStyle, $providedStyle);
    
    // Convert to CSS string
    $styleString = collect($mergedStyle)
        ->map(fn($value, $key) => "{$key}: {$value}")
        ->implode('; ');
    
    // Determine tag
    $tag = $tag ?? 'p';
@endphp

<{{ $tag }} {{ $attributes->except(['style', 'tag'])->merge(['style' => $styleString]) }}>
    {{ $slot }}
</{{ $tag }}>