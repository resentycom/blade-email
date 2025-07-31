<a
    {{ $attributes->except(['style', 'href', 'target'])->merge([
        'href' => $href,
        'target' => $target,
        'style' => $styleString
    ]) }}>
    <span style="max-width: 100%; display: inline-block; line-height: 120%; mso-padding-alt: 0px; mso-text-raise: 0;">
        {{ $slot->isNotEmpty() ? $slot : 'Button' }}
    </span>
</a>