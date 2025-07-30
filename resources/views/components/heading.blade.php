@php
    // Determine heading level
    $as = $as ?? $level ?? 'h1';
    $tag = is_numeric($as) ? "h{$as}" : $as;
    
    // Handle margins - only add defaults if not provided
    $providedStyle = is_array($style ?? null) ? $style : [];
    $margins = [];
    
    // React Email doesn't add default margins to headings, just handle what's provided
    
    // Merge with provided styles
    $mergedStyle = array_merge($margins, $providedStyle);
    
    // Convert to CSS string
    $styleString = collect($mergedStyle)
        ->map(fn($value, $key) => "{$key}: {$value}")
        ->implode('; ');
@endphp

<{{ $tag }} {{ $attributes->except(['style', 'as', 'level'])->merge(['style' => $styleString]) }}>
    {{ $slot }}
</{{ $tag }}>