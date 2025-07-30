@php
    // Handle preload array attribute separately
    $preloadUrls = $preload ?? [];
    $cleanAttributes = $attributes->except(['preload']);
@endphp

<head {{ $cleanAttributes }}>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
    <meta name="x-apple-disable-message-reformatting" />

    @if(!empty($preloadUrls) && is_array($preloadUrls))
        @foreach($preloadUrls as $url)
            <link rel="preload" href="{{ $url }}" as="image" />
        @endforeach
    @endif

    {{ $slot }}
</head>
