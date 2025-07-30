@php
    // Default props matching React Email
    $target = $target ?? '_blank';
    
    // Default styles for better usability
    $defaultStyle = [
        'color' => '#000',
        'text-decoration' => 'none',
        'display' => 'inline-block'
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
    ]) }}>
    <span style="max-width: 100%; display: inline-block; line-height: 120%; mso-padding-alt: 0px; mso-text-raise: 0;">
        {{ $slot }}
    </span>
</a>