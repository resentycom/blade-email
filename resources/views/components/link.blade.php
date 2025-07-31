<a
    {{ $attributes->except(['style', 'href', 'target'])->merge([
        'href' => $href,
        'target' => $target,
        'style' => $styleString
    ]) }}>{{ $slot->isNotEmpty() ? $slot : $href }}</a>