@php
    // Handle font properties
    $fontFamily = $fontFamily ?? 'Arial';
    $fallbackFontFamily = $fallbackFontFamily ?? 'sans-serif';
    $fontWeight = $fontWeight ?? 400;
    $fontStyle = $fontStyle ?? 'normal';

    // Handle webFont object (expects array with 'url' and 'format' keys)
    $webFont = $webFont ?? null;
    $preload = $preload ?? true;

    // Build the full font stack
    $fontStack = $fallbackFontFamily;
    if ($webFont && isset($webFont['url'])) {
        $fontStack = "{$fontFamily}, {$fallbackFontFamily}";
    }
@endphp

@if($webFont && isset($webFont['url']))
    {{-- Preload the web font for better performance --}}
    @if($preload)
        <link rel="preload" href="{{ $webFont['url'] }}" as="font" type="font/{{ $webFont['format'] ?? 'woff2' }}" crossorigin />
    @endif

    {{-- Generate @font-face rule --}}
    <style>
        @font-face {
            font-family: '{{ $fontFamily }}';
            font-style: {{ $fontStyle }};
            font-weight: {{ $fontWeight }};
            src: url('{{ $webFont['url'] }}') format('{{ $webFont['format'] ?? 'woff2' }}');
            font-display: swap;
        }

        {{-- Apply font to common email elements --}}
        body,
        table,
        td,
        p,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: {{ $fontStack }} !important;
        }
    </style>
@else
    {{-- If no web font, just apply the fallback --}}
    <style>
        body,
        table,
        td,
        p,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: {{ $fontStack }} !important;
        }
    </style>
@endif
