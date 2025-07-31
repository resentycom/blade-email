<?php

namespace BladeEmail\BladeEmail\Components;

class Container extends BaseComponent
{
    public string $styleString;

    public function __construct(array|string $style = [])
    {
        // Default styles matching React Email
        $defaultStyle = [
            'max-width' => '37.5em',
            'margin' => '0 auto',
            'width' => '100%'
        ];
        
        $this->styleString = $this->mergeStyles($defaultStyle, $style);
    }


    public function render()
    {
        return view('blade-email::components.container');
    }
}