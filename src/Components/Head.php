<?php

namespace BladeEmail\BladeEmail\Components;

class Head extends BaseComponent
{
    public function render()
    {
        return view('blade-email::components.head');
    }
}