<?php

namespace BladeEmail\BladeEmail\Components;

class Hr extends BaseComponent
{
    public string $styleString;

    public function __construct(array|string $style = [])
    {
        // Default styles matching React Email Hr
        $defaultStyle = [
            'width' => '100%',
            'border' => 'none',
            'border-top' => '1px solid #eaeaea',
        ];

        $this->styleString = $this->mergeStyles($defaultStyle, $style);
    }

    public function render()
    {
        return view('blade-email::components.hr');
    }
}
