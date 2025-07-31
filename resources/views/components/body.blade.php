<table border="0" cellpadding="0" cellspacing="0" width="100%" {{ $attributes->except(['style']) }}>
    <tr>
        <td style="{{ $styleString }}">
            {{ $slot }}
        </td>
    </tr>
</table>