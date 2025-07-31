<div
    {{ $attributes->merge([
        'style' => 'display: none; overflow: hidden; line-height: 1px; opacity: 0; max-height: 0; max-width: 0',
        'data-skip-in-text' => 'true'
    ]) }}>
    {{ $text }}
    @if(strlen($text) < $maxLength)
        <div>{{ $whiteSpacePadding }}</div>
    @endif
</div>