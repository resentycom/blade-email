@php
    // Handle style array like other components
    $providedStyle = $style ?? [];
    if (is_string($providedStyle)) {
        $styleString = $providedStyle;
    } else {
        // Convert array to CSS string
        $styleString = collect($providedStyle)
            ->map(fn($value, $key) => "{$key}: {$value}")
            ->implode('; ');
    }
@endphp

<body {{ $attributes->except(['style'])->merge(['style' => $styleString]) }}>
    {{ $slot }}
</body>
