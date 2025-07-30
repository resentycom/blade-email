@php
    // Handle preview text like React Email
    $PREVIEW_MAX_LENGTH = 150;
    $previewText = (string) $slot;
    $text = substr($previewText, 0, $PREVIEW_MAX_LENGTH);
    
    // White space codes for padding (matching React Email)
    $whiteSpaceCodes = "\u{00A0}\u{200C}\u{200B}\u{200D}\u{200E}\u{200F}\u{FEFF}";
    $whiteSpacePadding = str_repeat($whiteSpaceCodes, max(0, $PREVIEW_MAX_LENGTH - strlen($text)));
@endphp

<div
    {{ $attributes->merge([
        'style' => 'display: none; overflow: hidden; line-height: 1px; opacity: 0; max-height: 0; max-width: 0',
        'data-skip-in-text' => 'true'
    ]) }}>
    {{ $text }}
    @if(strlen($text) < $PREVIEW_MAX_LENGTH)
        <div>{{ $whiteSpacePadding }}</div>
    @endif
</div>