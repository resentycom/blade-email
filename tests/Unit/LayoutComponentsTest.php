<?php

use BladeEmail\BladeEmail\Components\Container;
use BladeEmail\BladeEmail\Components\Section;
use BladeEmail\BladeEmail\Components\Row;
use BladeEmail\BladeEmail\Components\Column;

describe('Layout Components', function () {
    describe('Container Component', function () {
        it('creates container with default styles', function () {
            $container = new Container();

            expect($container->styleString)->toContain('max-width: 37.5em');
            expect($container->styleString)->toContain('margin: 0 auto');
            expect($container->styleString)->toContain('width: 100%');
        });

        it('merges custom styles with defaults', function () {
            $container = new Container(style: ['padding' => '20px', 'background-color' => '#f5f5f5']);

            expect($container->styleString)->toContain('padding: 20px');
            expect($container->styleString)->toContain('background-color: #f5f5f5');
            expect($container->styleString)->toContain('max-width: 37.5em'); // default preserved
        });

        it('overrides default styles', function () {
            $container = new Container(style: ['max-width' => '600px']);

            expect($container->styleString)->toContain('max-width: 600px');
            expect($container->styleString)->not->toContain('max-width: 37.5em');
        });

        it('accepts string styles', function () {
            $container = new Container(style: 'max-width: 500px; padding: 10px;');

            expect($container->styleString)->toBe('max-width: 500px; padding: 10px;');
        });

        it('renders view', function () {
            $container = new Container();
            $view = $container->render();

            expect($view->name())->toBe('blade-email::components.container');
        });
    });

    describe('Section Component', function () {
        it('creates section with default styles', function () {
            $section = new Section();

            expect($section->styleString)->toContain('width: 100%');
        });

        it('merges custom styles with defaults', function () {
            $section = new Section(style: ['padding' => '15px', 'background' => 'white']);

            expect($section->styleString)->toContain('padding: 15px');
            expect($section->styleString)->toContain('background: white');
            expect($section->styleString)->toContain('width: 100%'); // default preserved
        });

        it('accepts string styles', function () {
            $section = new Section(style: 'background: #eee; border: 1px solid #ccc;');

            expect($section->styleString)->toBe('background: #eee; border: 1px solid #ccc;');
        });

        it('renders view', function () {
            $section = new Section();
            $view = $section->render();

            expect($view->name())->toBe('blade-email::components.section');
        });
    });

    describe('Row Component', function () {
        it('creates row with default styles', function () {
            $row = new Row();

            expect($row->styleString)->toContain('width: 100%');
        });

        it('merges custom styles with defaults', function () {
            $row = new Row(style: ['margin-bottom' => '10px', 'border-spacing' => '0']);

            expect($row->styleString)->toContain('margin-bottom: 10px');
            expect($row->styleString)->toContain('border-spacing: 0');
            expect($row->styleString)->toContain('width: 100%'); // default preserved
        });

        it('accepts string styles', function () {
            $row = new Row(style: 'border-collapse: collapse; margin: 0;');

            expect($row->styleString)->toBe('border-collapse: collapse; margin: 0;');
        });

        it('renders view', function () {
            $row = new Row();
            $view = $row->render();

            expect($view->name())->toBe('blade-email::components.row');
        });
    });

    describe('Column Component', function () {
        it('creates column with default styles', function () {
            $column = new Column();

            expect($column->styleString)->toContain('vertical-align: top');
        });

        it('merges custom styles with defaults', function () {
            $column = new Column(style: ['width' => '50%', 'padding' => '10px']);

            expect($column->styleString)->toContain('width: 50%');
            expect($column->styleString)->toContain('padding: 10px');
            expect($column->styleString)->toContain('vertical-align: top'); // default preserved
        });

        it('overrides default vertical-align', function () {
            $column = new Column(style: ['vertical-align' => 'middle']);

            expect($column->styleString)->toContain('vertical-align: middle');
            expect($column->styleString)->not->toContain('vertical-align: top');
        });

        it('accepts string styles', function () {
            $column = new Column(style: 'width: 25%; text-align: center;');

            expect($column->styleString)->toBe('width: 25%; text-align: center;');
        });

        it('renders view', function () {
            $column = new Column();
            $view = $column->render();

            expect($view->name())->toBe('blade-email::components.column');
        });
    });
});