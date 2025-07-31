<{{ $tag }} {{ $attributes->except(['style', 'tag'])->merge(['style' => $styleString]) }}>
    {{ $slot->isNotEmpty() ? $slot : '' }}
</{{ $tag }}>