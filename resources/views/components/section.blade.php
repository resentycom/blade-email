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
        <tr>
            <td>{{ $slot }}</td>
        </tr>
    </tbody>
</table>