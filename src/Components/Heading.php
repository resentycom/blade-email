<?php

namespace BladeEmail\BladeEmail\Components;

class Heading extends BaseComponent
{
    public string $tag;

    public string $styleString;

    public function __construct(
        string|int|null $as = 'h1',
        string|int|null $level = null,
        array|string $style = []
    ) {
        // Determine and validate heading level
        $as = $as ?? $level ?? 'h1';

        if (is_numeric($as)) {
            $level = $this->validateNumeric($as, 1, 6) ?? 1;
            $this->tag = "h{$level}";
        } else {
            $this->tag = $this->validateEnum($as, ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'], 'h1');
        }

        // Default styles for better email compatibility
        $defaultStyle = [
            'margin' => '0',
            'font-weight' => 'bold',
        ];

        $this->styleString = $this->mergeStyles($defaultStyle, $style);
    }

    public function render()
    {
        return view('blade-email::components.heading');
    }
}
