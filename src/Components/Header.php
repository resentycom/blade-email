<?php

namespace BladeEmail\BladeEmail\Components;

class Header extends BaseComponent
{
    public string $styleString;

    public function __construct(array|string $style = [])
    {
        $this->styleString = $this->mergeStyles([], $style);
    }

    public function render()
    {
        return view('blade-email::components.header');
    }
}
