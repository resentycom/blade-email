<?php

namespace BladeEmail\BladeEmail\Components;

class Body extends BaseComponent
{
    public string $styleString;

    public function __construct(array|string $style = [])
    {
        // Default styles for body wrapper
        $defaultStyle = [
            'padding' => '20px 40px',
            'font-family' => 'Arial, sans-serif',
            'font-size' => '16px',
            'line-height' => '1.6',
            'color' => '#333333',
        ];

        $this->styleString = $this->mergeStyles($defaultStyle, $style);
    }

    public function render()
    {
        return view('blade-email::components.body');
    }
}
