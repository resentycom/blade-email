<?php

namespace BladeEmail\BladeEmail\Components;

use InvalidArgumentException;

class Link extends BaseComponent
{
    public string $href;

    public string $target;

    public string $styleString;

    public function __construct(
        string $href = '',
        string $target = '_blank',
        array|string $style = []
    ) {
        // Validate required attributes
        if (empty($href)) {
            throw new InvalidArgumentException('Link component requires a href attribute');
        }
        $this->href = $href;

        // Validate target attribute
        $this->target = $this->validateEnum($target, ['_blank', '_self', '_parent', '_top'], '_blank');

        // Default styles for better usability
        $defaultStyle = [
            'color' => '#067df7',
            'text-decoration' => 'none',
        ];

        $this->styleString = $this->mergeStyles($defaultStyle, $style);
    }

    public function render()
    {
        return view('blade-email::components.link');
    }
}
