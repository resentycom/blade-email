<?php

use BladeEmail\BladeEmail\Components\Text;

describe('Text Component', function () {
    it('creates text with default tag', function () {
        $text = new Text();

        expect($text->tag)->toBe('p');
        expect($text->styleString)->toContain('font-size: 14px');
        expect($text->styleString)->toContain('line-height: 24px');
        expect($text->styleString)->toContain('margin: 16px 0');
    });

    it('accepts valid HTML tags', function () {
        $validTags = ['p', 'span', 'div', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'];

        foreach ($validTags as $tag) {
            $text = new Text(tag: $tag);
            expect($text->tag)->toBe($tag);
        }
    });

    it('falls back to default tag for invalid tags', function () {
        $text = new Text(tag: 'invalid');
        expect($text->tag)->toBe('p');
    });

    it('merges custom styles with defaults', function () {
        $text = new Text(style: ['color' => 'red', 'font-weight' => 'bold']);

        expect($text->styleString)->toContain('color: red');
        expect($text->styleString)->toContain('font-weight: bold');
        expect($text->styleString)->toContain('font-size: 14px'); // default preserved
    });

    it('handles margin logic for arrays', function () {
        $text = new Text(style: ['margin-top' => '20px']);

        expect($text->styleString)->toContain('margin-top: 20px');
        expect($text->styleString)->toContain('margin-bottom: 16px');
        expect($text->styleString)->not->toContain('margin: 16px 0');
    });

    it('preserves general margin when no specific margins provided', function () {
        $text = new Text(style: ['color' => 'blue']);

        expect($text->styleString)->toContain('margin: 16px 0');
        expect($text->styleString)->toContain('margin-top: 16px');
        expect($text->styleString)->toContain('margin-bottom: 16px');
    });

    it('removes general margin when specific margins are set', function () {
        $text = new Text(style: ['margin-top' => '10px', 'margin-bottom' => '20px']);

        expect($text->styleString)->not->toContain('margin: 16px 0');
        expect($text->styleString)->toContain('margin-top: 10px');
        expect($text->styleString)->toContain('margin-bottom: 20px');
    });

    it('accepts string styles', function () {
        $text = new Text(style: 'color: green; font-size: 18px;');

        expect($text->styleString)->toBe('color: green; font-size: 18px;');
    });

    it('renders view', function () {
        $text = new Text();
        $view = $text->render();

        expect($view->name())->toBe('blade-email::components.text');
    });
});