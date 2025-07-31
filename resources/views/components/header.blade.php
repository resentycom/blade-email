@php
    // Array-first style handling
    $providedStyle = $style ?? [];
    if (is_string($providedStyle)) {
        // If string provided, keep it as is for backward compatibility
        $styleString = $providedStyle;
    } else {
        // Array approach
        $styleString = collect($providedStyle)
            ->map(fn($value, $key) => "{$key}: {$value}")
            ->implode('; ');
    }
@endphp

<div {{ $attributes->except(['style'])->merge(['style' => $styleString]) }}>
    {{ $slot }}
</div>
