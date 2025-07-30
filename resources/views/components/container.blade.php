@php
    // Default styles matching React Email
    $defaultStyle = [
        'max-width' => '37.5em'
    ];
    
    // Merge default styles with provided styles
    $mergedStyle = is_array($style ?? null) 
        ? array_merge($defaultStyle, $style) 
        : $defaultStyle;
    
    // Convert to CSS string
    $styleString = collect($mergedStyle)
        ->map(fn($value, $key) => "{$key}: {$value}")
        ->implode('; ');
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
    <tbody>
        <tr style="width: 100%">
            <td>{{ $slot }}</td>
        </tr>
    </tbody>
</table>