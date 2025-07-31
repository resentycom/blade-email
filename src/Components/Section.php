<?php

namespace BladeEmail\BladeEmail\Components;

class Section extends BaseComponent
{
    public string $styleString;

    public function __construct(array|string $style = [])
    {
        // Default styles for email compatibility
        $defaultStyle = [
            'width' => '100%',
        ];

        $this->styleString = $this->mergeStyles($defaultStyle, $style);
    }

    public function render()
    {
        return view('blade-email::components.section');
    }
}
