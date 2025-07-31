<?php

namespace BladeEmail\BladeEmail\Components;

class Column extends BaseComponent
{
    public string $styleString;

    public function __construct(array|string $style = [])
    {
        // Default styles for email table cell compatibility
        $defaultStyle = [
            'vertical-align' => 'top',
        ];

        $this->styleString = $this->mergeStyles($defaultStyle, $style);
    }

    public function render()
    {
        return view('blade-email::components.column');
    }
}
