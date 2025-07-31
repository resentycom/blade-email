<?php

namespace BladeEmail\BladeEmail\Components;

use InvalidArgumentException;

class Img extends BaseComponent
{
    public string $src;

    public string $alt;

    public ?int $width;

    public ?int $height;

    public string $styleString;

    public function __construct(
        string $src = '',
        string $alt = '',
        int|string|null $width = null,
        int|string|null $height = null,
        array|string $style = []
    ) {
        // Validate required attributes
        if (empty($src)) {
            throw new InvalidArgumentException('Image component requires a src attribute');
        }

        $this->src = $src;
        $this->alt = $alt;

        // Validate dimensions if provided
        $this->width = $this->validateNumeric($width, 1);
        $this->height = $this->validateNumeric($height, 1);

        // Default styles matching React Email exactly
        $defaultStyle = [
            'display' => 'block',
            'outline' => 'none',
            'border' => 'none',
            'text-decoration' => 'none',
        ];

        $this->styleString = $this->mergeStyles($defaultStyle, $style);
    }

    public function render()
    {
        return view('blade-email::components.img');
    }
}
