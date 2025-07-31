<{{ $tag }} {{ $attributes->except(['style', 'as', 'level'])->merge(['style' => $styleString]) }}>
    {{ $slot }}
</{{ $tag }}>