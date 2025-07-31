@php
    use Phiki\Phiki;
    use Phiki\Grammar\Grammar;
    use Phiki\Theme\Theme;

    // Get the code content from attribute (fallback to slot for backward compatibility)
    $code = $code ?? trim((string) $slot);

    // Handle props
    $language = $language ?? 'php';
    $theme = $theme ?? 'github-light';
    $showLineNumbers = $showLineNumbers ?? true;

    // Map common language aliases to Phiki grammar enums
    $languageMap = [
        'php' => Grammar::Php,
        'javascript' => Grammar::Javascript,
        'js' => Grammar::Javascript,
        'typescript' => Grammar::Typescript,
        'ts' => Grammar::Typescript,
        'html' => Grammar::Html,
        'css' => Grammar::Css,
        'json' => Grammar::Json,
        'yaml' => Grammar::Yaml,
        'yml' => Grammar::Yaml,
        'bash' => Grammar::Shellscript,
        'shell' => Grammar::Shellscript,
        'sql' => Grammar::Sql,
        'python' => Grammar::Python,
        'py' => Grammar::Python,
        'java' => Grammar::Java,
        'c' => Grammar::C,
        'go' => Grammar::Go,
        'rust' => Grammar::Rust,
        'swift' => Grammar::Swift,
        'kotlin' => Grammar::Kotlin,
        'ruby' => Grammar::Ruby,
        'rb' => Grammar::Ruby,
        'xml' => Grammar::Xml,
        'markdown' => Grammar::Markdown,
        'md' => Grammar::Markdown,
        'docker' => Grammar::Docker,
        'vue' => Grammar::Vue,
        'svelte' => Grammar::Svelte,
        'react' => Grammar::Jsx,
        'jsx' => Grammar::Jsx,
        'tsx' => Grammar::Tsx,
    ];

    // Map theme names to Phiki theme enums
    $themeMap = [
        'github-light' => Theme::GithubLight,
        'github-dark' => Theme::GithubDark,
        'vs-code-light' => Theme::LightPlus,
        'vs-code-dark' => Theme::DarkPlus,
        'monokai' => Theme::Monokai,
        'nord' => Theme::Nord,
        'one-dark' => Theme::OneDarkPro,
        'dracula' => Theme::Dracula,
        'tokyo-night' => Theme::TokyoNight,
        'catppuccin' => Theme::CatppuccinMocha,
        'solarized-light' => Theme::SolarizedLight,
        'solarized-dark' => Theme::SolarizedDark,
    ];

    // Get the grammar and theme enums
    $grammarEnum = $languageMap[$language];
    $themeEnum = $themeMap[$theme] ?? Theme::GithubLight;

    // Initialize Phiki and highlight the code
    $phiki = new Phiki();

    try {
        $highlightedCode = $phiki->codeToHtml($code, $grammarEnum, $themeEnum);

        // Ensure the pre element has email-safe styling
        $emailSafeStyles = [
            'font-family' => 'Menlo, Monaco, Consolas, \'Liberation Mono\', \'Courier New\', monospace',
            'font-size' => '14px',
            'line-height' => '1.5',
            'overflow-x' => 'auto',
            'padding' => '16px',
            'margin' => '0',
            'border' => '1px solid #e1e5e9',
            'white-space' => 'pre',
            'word-wrap' => 'normal',
            'background-color' => $theme === 'github-dark' ? '#0d1117' : '#f6f8fa'
        ];

        // Build email-safe style string
        $emailStyleString = collect($emailSafeStyles)
            ->map(fn($value, $key) => "{$key}: {$value}")
            ->implode('; ');

        $doc = new DOMDocument();

        libxml_use_internal_errors(true);
        $doc->loadHTML($highlightedCode);
        libxml_clear_errors();

        $preItem = $doc->getElementsByTagName('pre')->item(0);

        // Wrap in email-safe container if needed
        if ($showLineNumbers) {
            $preItem->setAttribute('style', sprintf("%s; counter-reset: line-number;", $emailStyleString));

            // Add line number styles to each line
            $highlightedCode = preg_replace_callback(
                '/<span[^>]*data-line="(\d+)"[^>]*>/',
                function($matches) {
                    return str_replace('>', ' style="position: relative; padding-left: 3.5em;">', $matches[0]);
                },
                $highlightedCode
            );

            $highlightedCode = $doc->saveHTML($preItem);
        } else {
            $previousStyles = $preItem->getAttribute('style');
            $preItem->setAttribute(
                'style',
                sprintf("%s; %s", $previousStyles, $emailStyleString),
            );
        }

        $highlightedCode = $doc->saveHTML($preItem);

    } catch (Throwable $e) {
        // Fallback for unsupported languages or themes (e.g., when Phiki isn't installed)
        // Use theme-aware fallback colors
        $isDark = in_array($theme, ['github-dark', 'vs-code-dark', 'monokai', 'dracula', 'one-dark', 'tokyo-night', 'catppuccin', 'nord', 'solarized-dark']);

        $fallbackStyles = [
            'font-family' => 'Menlo, Monaco, Consolas, \'Liberation Mono\', \'Courier New\', monospace',
            'font-size' => '14px',
            'line-height' => '1.5',
            'padding' => '16px',
            'margin' => '0',
            'border' => '1px solid #e1e5e9',
            'white-space' => 'pre-wrap',
            'word-wrap' => 'break-word',
            'background-color' => $isDark ? '#0d1117' : '#f6f8fa',
            'color' => $isDark ? '#f0f6fc' : '#24292f',
            'overflow-x' => 'auto'
        ];

        $fallbackStyleString = collect($fallbackStyles)
            ->map(fn($value, $key) => "{$key}: {$value}")
            ->implode('; ');

        $highlightedCode = '<pre style="' . $fallbackStyleString . '"><code>' . htmlspecialchars($code) . '</code></pre>';
    }
@endphp


{{-- Email-safe code block container --}}
<div {{ $attributes->merge([
    'style' => 'border: 1px solid #e1e5e9; overflow: hidden; background-color: ' . ($theme === 'github-dark' || in_array($theme, ['vs-code-dark', 'monokai', 'dracula', 'one-dark', 'tokyo-night', 'catppuccin', 'nord', 'solarized-dark']) ? '#0d1117' : '#f6f8fa') . ';'
]) }}>
    @if(isset($title))
        <div style="background-color: {{ $theme === 'github-dark' ? '#21262d' : '#f1f3f4' }}; padding: 12px 16px; border-bottom: 1px solid {{ $theme === 'github-dark' ? '#30363d' : '#d0d7de' }}; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; font-size: 14px; font-weight: 600; color: {{ $theme === 'github-dark' ? '#f0f6fc' : '#24292f' }};">
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
                background-color: {{ $theme === 'github-dark' ? '#21262d' : '#f6f8fa' }};
                border-right: 1px solid {{ $theme === 'github-dark' ? '#30363d' : '#d0d7de' }};
            }
        </style>
    @endif
</div>
