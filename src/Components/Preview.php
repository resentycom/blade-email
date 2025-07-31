<?php

namespace BladeEmail\BladeEmail\Components;

class Preview extends BaseComponent
{
    public string $text;
    public string $whiteSpacePadding;
    public int $maxLength;

    public function __construct(string $text = '', int $maxLength = 150)
    {
        $this->maxLength = max(1, $maxLength);
        $this->text = substr($text, 0, $this->maxLength);
        
        // White space codes for padding (matching React Email)
        $whiteSpaceCodes = "\u{00A0}\u{200C}\u{200B}\u{200D}\u{200E}\u{200F}\u{FEFF}";
        $this->whiteSpacePadding = str_repeat($whiteSpaceCodes, max(0, $this->maxLength - strlen($this->text)));
    }

    public function render()
    {
        return view('blade-email::components.preview');
    }
}