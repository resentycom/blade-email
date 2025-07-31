<?php

use BladeEmail\BladeEmail\Components\BaseComponent;

class TestableBaseComponent extends BaseComponent
{
    public function testMergeStyles(array $defaultStyle, array|string $providedStyle): string
    {
        return $this->mergeStyles($defaultStyle, $providedStyle);
    }

    public function testArrayToStyleString(array $styles): string
    {
        return $this->arrayToStyleString($styles);
    }

    public function testValidateEnum(string $value, array $allowedValues, string $fallback): string
    {
        return $this->validateEnum($value, $allowedValues, $fallback);
    }

    public function testValidateNumeric(mixed $value, int $min = 0, ?int $max = null): ?int
    {
        return $this->validateNumeric($value, $min, $max);
    }

    public function render()
    {
        return view('blade-email::components.test');
    }
}

describe('BaseComponent', function () {
    beforeEach(function () {
        $this->component = new TestableBaseComponent;
    });

    describe('mergeStyles', function () {
        it('merges array styles correctly', function () {
            $defaultStyles = ['color' => 'red', 'font-size' => '14px'];
            $providedStyles = ['color' => 'blue', 'margin' => '10px'];

            $result = $this->component->testMergeStyles($defaultStyles, $providedStyles);

            expect($result)->toBe('color: blue; font-size: 14px; margin: 10px');
        });

        it('returns string styles when provided as string', function () {
            $defaultStyles = ['color' => 'red'];
            $providedStyles = 'color: blue; margin: 10px;';

            $result = $this->component->testMergeStyles($defaultStyles, $providedStyles);

            expect($result)->toBe('color: blue; margin: 10px;');
        });

        it('falls back to default styles when empty string provided', function () {
            $defaultStyles = ['color' => 'red', 'font-size' => '14px'];
            $providedStyles = '';

            $result = $this->component->testMergeStyles($defaultStyles, $providedStyles);

            expect($result)->toBe('color: red; font-size: 14px');
        });

        it('falls back to default styles when whitespace string provided', function () {
            $defaultStyles = ['color' => 'red', 'font-size' => '14px'];
            $providedStyles = '   ';

            $result = $this->component->testMergeStyles($defaultStyles, $providedStyles);

            expect($result)->toBe('color: red; font-size: 14px');
        });

        it('filters out null and empty values from arrays', function () {
            $defaultStyles = ['color' => 'red'];
            $providedStyles = ['color' => 'blue', 'margin' => null, 'padding' => '', 'font-size' => '16px'];

            $result = $this->component->testMergeStyles($defaultStyles, $providedStyles);

            expect($result)->toBe('color: blue; font-size: 16px');
        });
    });

    describe('arrayToStyleString', function () {
        it('converts array to CSS string', function () {
            $styles = ['color' => 'red', 'font-size' => '14px', 'margin' => '10px'];

            $result = $this->component->testArrayToStyleString($styles);

            expect($result)->toBe('color: red; font-size: 14px; margin: 10px');
        });

        it('filters out null values', function () {
            $styles = ['color' => 'red', 'margin' => null, 'font-size' => '14px'];

            $result = $this->component->testArrayToStyleString($styles);

            expect($result)->toBe('color: red; font-size: 14px');
        });

        it('filters out empty string values', function () {
            $styles = ['color' => 'red', 'margin' => '', 'font-size' => '14px'];

            $result = $this->component->testArrayToStyleString($styles);

            expect($result)->toBe('color: red; font-size: 14px');
        });

        it('handles empty array', function () {
            $result = $this->component->testArrayToStyleString([]);

            expect($result)->toBe('');
        });
    });

    describe('validateEnum', function () {
        it('returns value when valid', function () {
            $result = $this->component->testValidateEnum('blue', ['red', 'blue', 'green'], 'red');

            expect($result)->toBe('blue');
        });

        it('returns fallback when invalid', function () {
            $result = $this->component->testValidateEnum('yellow', ['red', 'blue', 'green'], 'red');

            expect($result)->toBe('red');
        });

        it('is case sensitive', function () {
            $result = $this->component->testValidateEnum('Blue', ['red', 'blue', 'green'], 'red');

            expect($result)->toBe('red');
        });
    });

    describe('validateNumeric', function () {
        it('returns numeric value when valid', function () {
            $result = $this->component->testValidateNumeric(5);

            expect($result)->toBe(5);
        });

        it('returns null for non-numeric values', function () {
            $result = $this->component->testValidateNumeric('abc');

            expect($result)->toBeNull();
        });

        it('converts string numbers to integers', function () {
            $result = $this->component->testValidateNumeric('42');

            expect($result)->toBe(42);
        });

        it('returns null when below minimum', function () {
            $result = $this->component->testValidateNumeric(5, 10);

            expect($result)->toBeNull();
        });

        it('returns null when above maximum', function () {
            $result = $this->component->testValidateNumeric(15, 0, 10);

            expect($result)->toBeNull();
        });

        it('returns value when within range', function () {
            $result = $this->component->testValidateNumeric(5, 0, 10);

            expect($result)->toBe(5);
        });

        it('handles negative values', function () {
            $result = $this->component->testValidateNumeric(-5, -10, 10);

            expect($result)->toBe(-5);
        });
    });
});
