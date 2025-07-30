@php
    // Simple divider matching React Email Hr pattern
    $defaultStyle = [
        'width' => '100%',
        'border' => 'none',
        'border-top' => '1px solid #e0e0e0',
        'margin' => '20px 0'
    ];
    
    $mergedStyle = is_array($style ?? null) ? array_merge($defaultStyle, $style) : $defaultStyle;
    $styleString = collect($mergedStyle)->map(fn($value, $key) => "{$key}: {$value}")->implode('; ');
@endphp

<hr {{ $attributes->except(['style'])->merge(['style' => $styleString]) }} />