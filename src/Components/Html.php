<?php

namespace BladeEmail\BladeEmail\Components;

class Html extends BaseComponent
{
    public string $dir;
    public string $lang;

    public function __construct(
        string $dir = 'ltr',
        string $lang = 'en'
    ) {
        // Validate direction
        $this->dir = $this->validateEnum($dir, ['ltr', 'rtl'], 'ltr');
        
        // Validate language (basic validation)
        $this->lang = !empty($lang) ? $lang : 'en';
    }

    public function render()
    {
        return view('blade-email::components.html');
    }
}