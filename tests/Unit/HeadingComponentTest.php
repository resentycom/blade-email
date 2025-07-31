<?php

use BladeEmail\BladeEmail\Components\Heading;

describe('Heading Component', function () {
    it('creates heading with default level', function () {
        $heading = new Heading;

        expect($heading->tag)->toBe('h1');
        expect($heading->styleString)->toContain('margin: 0');
        expect($heading->styleString)->toContain('font-weight: bold');
    });

    it('accepts numeric levels', function () {
        for ($level = 1; $level <= 6; $level++) {
            $heading = new Heading(as: $level);
            expect($heading->tag)->toBe("h{$level}");
        }
    });

    it('accepts string levels', function () {
        $validTags = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'];

        foreach ($validTags as $tag) {
            $heading = new Heading(as: $tag);
            expect($heading->tag)->toBe($tag);
        }
    });

    it('falls back to h1 for invalid numeric levels', function () {
        $heading = new Heading(as: 0);
        expect($heading->tag)->toBe('h1');

        $heading = new Heading(as: 7);
        expect($heading->tag)->toBe('h1');
    });

    it('falls back to h1 for invalid string levels', function () {
        $heading = new Heading(as: 'invalid');
        expect($heading->tag)->toBe('h1');
    });

    it('uses numeric as parameter correctly', function () {
        $heading = new Heading(as: 3);
        expect($heading->tag)->toBe('h3');
    });

    it('prefers as parameter over level parameter', function () {
        $heading = new Heading(as: 2, level: 5);
        expect($heading->tag)->toBe('h2');
    });

    it('handles level parameter when as is default', function () {
        // The constructor logic shows level is used as fallback when as ?? level ?? 'h1'
        // Since as has a default of 'h1', level won't override it
        $heading = new Heading(level: 4);
        expect($heading->tag)->toBe('h1'); // as='h1' takes precedence
    });

    it('uses level when as is explicitly null', function () {
        // Only way level takes effect is if as is explicitly null
        $heading = new Heading(as: null, level: 'h5');
        expect($heading->tag)->toBe('h5');
    });

    it('merges custom styles with defaults', function () {
        $heading = new Heading(style: ['color' => 'blue', 'font-size' => '24px']);

        expect($heading->styleString)->toContain('color: blue');
        expect($heading->styleString)->toContain('font-size: 24px');
        expect($heading->styleString)->toContain('margin: 0'); // default preserved
        expect($heading->styleString)->toContain('font-weight: bold'); // default preserved
    });

    it('accepts string styles', function () {
        $heading = new Heading(style: 'color: red; text-align: center;');

        expect($heading->styleString)->toBe('color: red; text-align: center;');
    });

    it('renders view', function () {
        $heading = new Heading;
        $view = $heading->render();

        expect($view->name())->toBe('blade-email::components.heading');
    });
});
