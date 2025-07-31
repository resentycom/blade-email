<?php

namespace BladeEmail\BladeEmail\Components;

class Spacer extends BaseComponent
{
    public string $height;
    public string $styleString;

    public function __construct(
        string $height = '20px',
        array|string $style = []
    ) {
        // Validate height (basic validation for CSS units)
        $this->height = !empty($height) ? $height : '20px';
        
        // Default styles
        $defaultStyle = [
            'height' => $this->height,
            'line-height' => '1px',
            'font-size' => '1px'
        ];

        $this->styleString = $this->mergeStyles($defaultStyle, $style);
    }


    public function render()
    {
        return view('blade-email::components.spacer');
    }
}