<?php

use BladeEmail\BladeEmail\Components\Button;

describe('Button Component', function () {
    it('creates button with required href', function () {
        $button = new Button(href: 'https://example.com');

        expect($button->href)->toBe('https://example.com');
        expect($button->target)->toBe('_blank');
        expect($button->styleString)->toContain('color: #fff');
        expect($button->styleString)->toContain('background-color: #000');
    });

    it('throws exception when href is empty', function () {
        expect(fn () => new Button(href: ''))
            ->toThrow(\InvalidArgumentException::class, 'Button component requires a href attribute');
    });

    it('validates target attribute', function () {
        $button = new Button(href: 'https://example.com', target: '_self');
        expect($button->target)->toBe('_self');

        $button = new Button(href: 'https://example.com', target: 'invalid');
        expect($button->target)->toBe('_blank'); // fallback
    });

    it('accepts all valid target values', function () {
        $validTargets = ['_blank', '_self', '_parent', '_top'];

        foreach ($validTargets as $target) {
            $button = new Button(href: 'https://example.com', target: $target);
            expect($button->target)->toBe($target);
        }
    });

    it('merges custom styles with defaults', function () {
        $button = new Button(
            href: 'https://example.com',
            style: ['background-color' => 'blue', 'padding' => '10px']
        );

        expect($button->styleString)->toContain('background-color: blue');
        expect($button->styleString)->toContain('padding: 10px');
        expect($button->styleString)->toContain('color: #fff'); // default preserved
    });

    it('accepts string styles', function () {
        $button = new Button(
            href: 'https://example.com',
            style: 'background-color: red; padding: 15px;'
        );

        expect($button->styleString)->toBe('background-color: red; padding: 15px;');
    });

    it('renders view', function () {
        $button = new Button(href: 'https://example.com');
        $view = $button->render();

        expect($view->name())->toBe('blade-email::components.button');
    });
});
