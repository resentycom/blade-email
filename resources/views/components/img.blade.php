<img
    {{ $attributes->except(['style', 'alt', 'src', 'width', 'height'])->merge([
        'alt' => $alt,
        'src' => $src,
        'width' => $width,
        'height' => $height,
        'style' => $styleString
    ])->filter(fn($value) => !is_null($value)) }} />