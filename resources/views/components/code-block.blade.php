{{-- Email-safe code block container --}}
<div {{ $attributes->merge([
    'style' => 'border: 1px solid #e1e5e9; overflow: hidden; background-color: ' . (in_array($theme, ['github-dark', 'vs-code-dark', 'monokai', 'dracula', 'one-dark', 'tokyo-night', 'catppuccin', 'nord', 'solarized-dark']) ? '#0d1117' : '#f6f8fa') . ';'
]) }}>
    @if($title)
        <div style="background-color: {{ in_array($theme, ['github-dark', 'vs-code-dark', 'monokai', 'dracula', 'one-dark', 'tokyo-night', 'catppuccin', 'nord', 'solarized-dark']) ? '#21262d' : '#f1f3f4' }}; padding: 12px 16px; border-bottom: 1px solid {{ in_array($theme, ['github-dark', 'vs-code-dark', 'monokai', 'dracula', 'one-dark', 'tokyo-night', 'catppuccin', 'nord', 'solarized-dark']) ? '#30363d' : '#d0d7de' }}; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; font-size: 14px; font-weight: 600; color: {{ in_array($theme, ['github-dark', 'vs-code-dark', 'monokai', 'dracula', 'one-dark', 'tokyo-night', 'catppuccin', 'nord', 'solarized-dark']) ? '#f0f6fc' : '#24292f' }};">
            {{ $title }}
        </div>
    @endif

    {!! $highlightedCode !!}

    @if($showLineNumbers)
        <style>
            /* Line numbers for email clients that support CSS */
            pre[style*="counter-reset"] span[data-line]::before {
                content: attr(data-line);
                position: absolute;
                left: 0;
                top: 0;
                width: 2.5em;
                text-align: right;
                color: #656d76;
                font-size: 12px;
                line-height: inherit;
                pointer-events: none;
                user-select: none;
            }

            /* Enhanced line number styling for better visibility */
            pre[style*="counter-reset"] span[data-line] {
                position: relative;
                padding-left: 3.5em;
                display: block;
            }

            /* Line number background for better readability */
            pre[style*="counter-reset"]::before {
                content: "";
                position: absolute;
                left: 0;
                top: 0;
                bottom: 0;
                width: 3em;
                background-color: {{ in_array($theme, ['github-dark', 'vs-code-dark', 'monokai', 'dracula', 'one-dark', 'tokyo-night', 'catppuccin', 'nord', 'solarized-dark']) ? '#21262d' : '#f6f8fa' }};
                border-right: 1px solid {{ in_array($theme, ['github-dark', 'vs-code-dark', 'monokai', 'dracula', 'one-dark', 'tokyo-night', 'catppuccin', 'nord', 'solarized-dark']) ? '#30363d' : '#d0d7de' }};
            }
        </style>
    @endif
</div>