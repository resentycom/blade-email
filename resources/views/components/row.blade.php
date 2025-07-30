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

<table
    align="center"
    width="100%"
    {{ $attributes->except(['style'])->merge([
        'border' => '0',
        'cellpadding' => '0',
        'cellspacing' => '0',
        'role' => 'presentation',
        'style' => $styleString
    ]) }}>
    <tbody style="width: 100%">
        <tr style="width: 100%">{{ $slot }}</tr>
    </tbody>
</table>