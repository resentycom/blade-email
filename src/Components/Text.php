<?php

namespace BladeEmail\BladeEmail\Components;

class Text extends BaseComponent
{
    public string $tag;
    public string $styleString;

    public function __construct(
        string $tag = 'p',
        array|string $style = []
    ) {
        // Validate and sanitize tag
        $this->tag = $this->validateEnum($tag, ['p', 'span', 'div', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'], 'p');
        
        // Default styles matching React Email
        $defaultStyle = [
            'font-size' => '14px',
            'line-height' => '24px',
            'margin' => '16px 0'
        ];
        
        $this->styleString = $this->mergeStyles($defaultStyle, $style);
    }

    protected function mergeStyles(array $defaultStyle, array|string $providedStyle): string
    {
        if (is_string($providedStyle)) {
            return trim($providedStyle) ?: $this->arrayToStyleString($defaultStyle);
        }
        
        if (is_array($providedStyle)) {
            // Handle margin logic for arrays only
            if (!isset($providedStyle['margin-top']) && !isset($providedStyle['margin'])) {
                $defaultStyle['margin-top'] = '16px';
            }
            if (!isset($providedStyle['margin-bottom']) && !isset($providedStyle['margin'])) {
                $defaultStyle['margin-bottom'] = '16px';
            }
            
            // Remove general margin if specific margins are being set
            if (isset($providedStyle['margin-top']) || isset($providedStyle['margin-bottom'])) {
                unset($defaultStyle['margin']);
            }
            
            $mergedStyle = array_merge($defaultStyle, $providedStyle);
            
            return collect($mergedStyle)
                ->filter(fn($value) => !is_null($value) && $value !== '')
                ->map(fn($value, $key) => "{$key}: {$value}")
                ->implode('; ');
        }
        
        return $this->arrayToStyleString($defaultStyle);
    }

    public function render()
    {
        return view('blade-email::components.text');
    }
}