<?php

namespace BladeEmail\BladeEmail\Components;

class Divider extends BaseComponent
{
    public string $styleString;

    public function __construct(array|string $style = [])
    {
        // Default styles for divider
        $defaultStyle = [
            'width' => '100%',
            'border' => 'none',
            'border-top' => '1px solid #e0e0e0',
            'margin' => '20px 0',
        ];

        $this->styleString = $this->mergeStyles($defaultStyle, $style);
    }

    public function render()
    {
        return view('blade-email::components.divider');
    }
}
