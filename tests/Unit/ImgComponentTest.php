<?php

use BladeEmail\BladeEmail\Components\Img;

describe('Img Component', function () {
    it('creates image with required src', function () {
        $img = new Img(src: 'https://example.com/image.jpg');

        expect($img->src)->toBe('https://example.com/image.jpg');
        expect($img->alt)->toBe('');
        expect($img->styleString)->toContain('display: block');
        expect($img->styleString)->toContain('outline: none');
        expect($img->styleString)->toContain('border: none');
        expect($img->styleString)->toContain('text-decoration: none');
    });

    it('throws exception when src is empty', function () {
        expect(fn () => new Img(src: ''))
            ->toThrow(\InvalidArgumentException::class, 'Image component requires a src attribute');
    });

    it('sets alt text', function () {
        $img = new Img(src: 'image.jpg', alt: 'Test image');
        expect($img->alt)->toBe('Test image');
    });

    it('validates numeric width and height', function () {
        $img = new Img(src: 'image.jpg', width: 100, height: 200);
        expect($img->width)->toBe(100);
        expect($img->height)->toBe(200);
    });

    it('converts string dimensions to integers', function () {
        $img = new Img(src: 'image.jpg', width: '300', height: '400');
        expect($img->width)->toBe(300);
        expect($img->height)->toBe(400);
    });

    it('rejects invalid dimensions', function () {
        $img = new Img(src: 'image.jpg', width: 0, height: -10);
        expect($img->width)->toBeNull();
        expect($img->height)->toBeNull();

        $img = new Img(src: 'image.jpg', width: 'invalid', height: 'bad');
        expect($img->width)->toBeNull();
        expect($img->height)->toBeNull();
    });

    it('accepts minimum valid dimensions', function () {
        $img = new Img(src: 'image.jpg', width: 1, height: 1);
        expect($img->width)->toBe(1);
        expect($img->height)->toBe(1);
    });

    it('merges custom styles with defaults', function () {
        $img = new Img(
            src: 'image.jpg',
            style: ['border-radius' => '8px', 'margin' => '10px']
        );

        expect($img->styleString)->toContain('border-radius: 8px');
        expect($img->styleString)->toContain('margin: 10px');
        expect($img->styleString)->toContain('display: block'); // default preserved
    });

    it('accepts string styles', function () {
        $img = new Img(
            src: 'image.jpg',
            style: 'border: 1px solid red; padding: 5px;'
        );

        expect($img->styleString)->toBe('border: 1px solid red; padding: 5px;');
    });

    it('renders view', function () {
        $img = new Img(src: 'image.jpg');
        $view = $img->render();

        expect($view->name())->toBe('blade-email::components.img');
    });
});