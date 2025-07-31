<?php

namespace BladeEmail\BladeEmail\Components;

class CodeBlock extends BaseComponent
{
    public string $code;
    public string $language;
    public string $theme;
    public bool $showLineNumbers;
    public ?string $title;
    public string $highlightedCode;

    public function __construct(
        string $code = '',
        string $language = 'php',
        string $theme = 'github-light',
        bool $showLineNumbers = true,
        ?string $title = null
    ) {
        $this->code = $code;
        $this->language = $language;
        $this->theme = $theme;
        $this->showLineNumbers = $showLineNumbers;
        $this->title = $title;
        
        $this->highlightedCode = $this->processCode();
    }

    private function processCode(): string
    {
        try {
            // Try to use Phiki if available
            if (class_exists(\Phiki\Phiki::class)) {
                return $this->highlightWithPhiki();
            }
        } catch (\Throwable $e) {
            // Fall through to fallback
        }
        
        return $this->fallbackHighlight();
    }

    private function highlightWithPhiki(): string
    {
        $phiki = new \Phiki\Phiki();
        
        // Language mapping
        $languageMap = [
            'php' => \Phiki\Grammar\Grammar::Php,
            'javascript' => \Phiki\Grammar\Grammar::Javascript,
            'js' => \Phiki\Grammar\Grammar::Javascript,
            'typescript' => \Phiki\Grammar\Grammar::Typescript,
            'ts' => \Phiki\Grammar\Grammar::Typescript,
            'html' => \Phiki\Grammar\Grammar::Html,
            'css' => \Phiki\Grammar\Grammar::Css,
            'json' => \Phiki\Grammar\Grammar::Json,
        ];
        
        // Theme mapping
        $themeMap = [
            'github-light' => \Phiki\Theme\Theme::GithubLight,
            'github-dark' => \Phiki\Theme\Theme::GithubDark,
            'vs-code-light' => \Phiki\Theme\Theme::LightPlus,
            'vs-code-dark' => \Phiki\Theme\Theme::DarkPlus,
        ];
        
        $grammarEnum = $languageMap[$this->language] ?? \Phiki\Grammar\Grammar::Php;
        $themeEnum = $themeMap[$this->theme] ?? \Phiki\Theme\Theme::GithubLight;
        
        return $phiki->codeToHtml($this->code, $grammarEnum, $themeEnum);
    }

    private function fallbackHighlight(): string
    {
        $isDark = in_array($this->theme, ['github-dark', 'vs-code-dark', 'monokai', 'dracula']);
        
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

        return '<pre style="' . $fallbackStyleString . '"><code>' . htmlspecialchars($this->code) . '</code></pre>';
    }

    public function render()
    {
        return view('blade-email::components.code-block');
    }
}