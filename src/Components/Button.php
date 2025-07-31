<?php

namespace BladeEmail\BladeEmail\Components;

use InvalidArgumentException;

class Button extends BaseComponent
{
    public string $href;
    public string $target;
    public string $styleString;

    public function __construct(
        string $href = '',
        string $target = '_blank',
        array|string $style = []
    ) {
        // Validate and sanitize required attributes
        if (empty($href)) {
            throw new InvalidArgumentException('Button component requires a href attribute');
        }
        $this->href = $href;
        
        // Validate target attribute
        $this->target = $this->validateEnum($target, ['_blank', '_self', '_parent', '_top'], '_blank');

        // Default styles for better usability
        $defaultStyle = [
            'color' => '#fff',
            'text-decoration' => 'none',
            'display' => 'inline-block',
            'padding' => '12px 20px',
            'border-radius' => '3px',
            'font-weight' => '600',
            'background-color' => '#000'
        ];

        $this->styleString = $this->mergeStyles($defaultStyle, $style);
    }


    public function render()
    {
        return view('blade-email::components.button');
    }
}