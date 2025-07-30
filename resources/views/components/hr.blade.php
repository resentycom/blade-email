@php
    // Default styles matching React Email Hr
    $defaultStyle = [
        'width' => '100%',
        'border' => 'none',
        'border-top' => '1px solid #eaeaea'
    ];
    
    $mergedStyle = is_array($style ?? null) ? array_merge($defaultStyle, $style) : $defaultStyle;
    $styleString = collect($mergedStyle)->map(fn($value, $key) => "{$key}: {$value}")->implode('; ');
@endphp

<hr {{ $attributes->except(['style'])->merge(['style' => $styleString]) }} />