<?php

use BladeEmail\BladeEmail\Components\Divider;
use BladeEmail\BladeEmail\Components\Hr;
use BladeEmail\BladeEmail\Components\Preview;
use BladeEmail\BladeEmail\Components\Spacer;

describe('Utility Components', function () {
    describe('Spacer Component', function () {
        it('creates spacer with default height', function () {
            $spacer = new Spacer;

            expect($spacer->height)->toBe('20px');
            expect($spacer->styleString)->toContain('height: 20px');
            expect($spacer->styleString)->toContain('line-height: 1px');
            expect($spacer->styleString)->toContain('font-size: 1px');
        });

        it('accepts custom height', function () {
            $spacer = new Spacer(height: '40px');

            expect($spacer->height)->toBe('40px');
            expect($spacer->styleString)->toContain('height: 40px');
        });

        it('falls back to default for empty height', function () {
            $spacer = new Spacer(height: '');

            expect($spacer->height)->toBe('20px');
            expect($spacer->styleString)->toContain('height: 20px');
        });

        it('accepts different CSS units', function () {
            $spacer = new Spacer(height: '2rem');
            expect($spacer->height)->toBe('2rem');

            $spacer = new Spacer(height: '50%');
            expect($spacer->height)->toBe('50%');

            $spacer = new Spacer(height: '100vh');
            expect($spacer->height)->toBe('100vh');
        });

        it('merges custom styles with defaults', function () {
            $spacer = new Spacer(style: ['background-color' => 'transparent', 'width' => '100%']);

            expect($spacer->styleString)->toContain('background-color: transparent');
            expect($spacer->styleString)->toContain('width: 100%');
            expect($spacer->styleString)->toContain('height: 20px'); // default preserved
        });

        it('renders view', function () {
            $spacer = new Spacer;
            $view = $spacer->render();

            expect($view->name())->toBe('blade-email::components.spacer');
        });
    });

    describe('Hr Component', function () {
        it('creates hr with default styles', function () {
            $hr = new Hr;

            expect($hr->styleString)->toContain('width: 100%');
            expect($hr->styleString)->toContain('border: none');
            expect($hr->styleString)->toContain('border-top: 1px solid #eaeaea');
        });

        it('merges custom styles with defaults', function () {
            $hr = new Hr(style: ['border-top' => '2px solid red', 'margin' => '30px 0']);

            expect($hr->styleString)->toContain('border-top: 2px solid red');
            expect($hr->styleString)->toContain('margin: 30px 0');
            expect($hr->styleString)->toContain('width: 100%'); // default preserved
            expect($hr->styleString)->toContain('border: none'); // default preserved
        });

        it('accepts string styles', function () {
            $hr = new Hr(style: 'border-top: 3px dashed blue; opacity: 0.5;');

            expect($hr->styleString)->toBe('border-top: 3px dashed blue; opacity: 0.5;');
        });

        it('renders view', function () {
            $hr = new Hr;
            $view = $hr->render();

            expect($view->name())->toBe('blade-email::components.hr');
        });
    });

    describe('Divider Component', function () {
        it('creates divider with default styles', function () {
            $divider = new Divider;

            expect($divider->styleString)->toContain('width: 100%');
            expect($divider->styleString)->toContain('border: none');
            expect($divider->styleString)->toContain('border-top: 1px solid #e0e0e0');
            expect($divider->styleString)->toContain('margin: 20px 0');
        });

        it('merges custom styles with defaults', function () {
            $divider = new Divider(style: ['border-top' => '1px solid #ccc', 'margin' => '40px 0']);

            expect($divider->styleString)->toContain('border-top: 1px solid #ccc');
            expect($divider->styleString)->toContain('margin: 40px 0');
            expect($divider->styleString)->toContain('width: 100%'); // default preserved
        });

        it('renders view', function () {
            $divider = new Divider;
            $view = $divider->render();

            expect($view->name())->toBe('blade-email::components.divider');
        });
    });

    describe('Preview Component', function () {
        it('creates preview with default settings', function () {
            $preview = new Preview;

            expect($preview->text)->toBe('');
            expect($preview->maxLength)->toBe(150);
            expect($preview->whiteSpacePadding)->toHaveLength(150 * 7); // 7 unicode chars per repeat
        });

        it('accepts custom text', function () {
            $preview = new Preview(text: 'This is a preview text');

            expect($preview->text)->toBe('This is a preview text');
        });

        it('truncates text to max length', function () {
            $longText = str_repeat('a', 200);
            $preview = new Preview(text: $longText, maxLength: 100);

            expect($preview->text)->toHaveLength(100);
            expect($preview->maxLength)->toBe(100);
        });

        it('pads with white space characters', function () {
            $preview = new Preview(text: 'Short', maxLength: 10);

            expect($preview->text)->toBe('Short');
            expect($preview->whiteSpacePadding)->toHaveLength((10 - 5) * 7); // 5 remaining chars * 7 unicode chars
        });

        it('handles zero max length gracefully', function () {
            $preview = new Preview(text: 'Test', maxLength: 0);

            expect($preview->maxLength)->toBe(1); // min 1
            expect($preview->text)->toHaveLength(1);
        });

        it('handles negative max length gracefully', function () {
            $preview = new Preview(text: 'Test', maxLength: -10);

            expect($preview->maxLength)->toBe(1); // min 1
            expect($preview->text)->toHaveLength(1);
        });

        it('renders view', function () {
            $preview = new Preview;
            $view = $preview->render();

            expect($view->name())->toBe('blade-email::components.preview');
        });
    });
});
