<body {{ $attributes->except(['style'])->merge(['style' => $styleString]) }}>
    {{ $slot }}
</body>