<div {{ $attributes->except(['style'])->merge(['style' => $styleString]) }}>
    {{ $slot }}
</div>