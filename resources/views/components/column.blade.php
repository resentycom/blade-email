<td
    {{ $attributes->except(['style'])->merge([
        'data-id' => '__react-email-column',
        'style' => $styleString
    ]) }}>
    {{ $slot }}
</td>