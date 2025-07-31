<?php

namespace BladeEmail\BladeEmail\Components;

use Illuminate\View\Component;

abstract class BaseComponent extends Component
{
    /**
     * Merge default styles with provided styles and return a CSS string
     */
    protected function mergeStyles(array $defaultStyle, array|string $providedStyle): string
    {
        if (is_string($providedStyle)) {
            return trim($providedStyle) ?: $this->arrayToStyleString($defaultStyle);
        }

        if (is_array($providedStyle)) {
            $mergedStyle = array_merge($defaultStyle, $providedStyle);

            return collect($mergedStyle)
                ->filter(fn ($value) => ! is_null($value) && $value !== '')
                ->map(fn ($value, $key) => "{$key}: {$value}")
                ->implode('; ');
        }

        return $this->arrayToStyleString($defaultStyle);
    }

    /**
     * Convert an array of styles to a CSS string
     */
    protected function arrayToStyleString(array $styles): string
    {
        return collect($styles)
            ->filter(fn ($value) => ! is_null($value) && $value !== '')
            ->map(fn ($value, $key) => "{$key}: {$value}")
            ->implode('; ');
    }

    /**
     * Validate that a value is in an allowed list, with fallback
     */
    protected function validateEnum(string $value, array $allowedValues, string $fallback): string
    {
        return in_array($value, $allowedValues) ? $value : $fallback;
    }

    /**
     * Validate and sanitize a numeric value
     */
    protected function validateNumeric(mixed $value, int $min = 0, ?int $max = null): ?int
    {
        if (! is_numeric($value)) {
            return null;
        }

        $numericValue = (int) $value;

        if ($numericValue < $min) {
            return null;
        }

        if ($max !== null && $numericValue > $max) {
            return null;
        }

        return $numericValue;
    }
}
