<?php

namespace BladeEmail\BladeEmail\Components;

class Font extends BaseComponent
{
    public string $fontFamily;

    public string $fallbackFontFamily;

    public string|int $fontWeight;

    public string $fontStyle;

    public ?array $webFont;

    public bool $preload;

    public string $fontStack;

    public function __construct(
        string $fontFamily = 'Arial',
        string $fallbackFontFamily = 'sans-serif',
        string|int $fontWeight = 400,
        string $fontStyle = 'normal',
        ?array $webFont = null,
        bool $preload = true
    ) {
        $this->fontFamily = $fontFamily;
        $this->fallbackFontFamily = $fallbackFontFamily;
        $this->fontWeight = $fontWeight;
        $this->fontStyle = $fontStyle;
        $this->webFont = $webFont;
        $this->preload = $preload;

        // Build the full font stack
        $this->fontStack = $this->fallbackFontFamily;
        if ($this->webFont && isset($this->webFont['url'])) {
            $this->fontStack = "{$this->fontFamily}, {$this->fallbackFontFamily}";
        }
    }

    public function render()
    {
        return view('blade-email::components.font');
    }
}
