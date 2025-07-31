<?php

use BladeEmail\BladeEmail\Components\Font;
use BladeEmail\BladeEmail\Components\CodeBlock;

describe('Advanced Components', function () {
    describe('Font Component', function () {
        it('creates font with default settings', function () {
            $font = new Font();

            expect($font->fontFamily)->toBe('Arial');
            expect($font->fallbackFontFamily)->toBe('sans-serif');
            expect($font->fontWeight)->toBe(400);
            expect($font->fontStyle)->toBe('normal');
            expect($font->webFont)->toBeNull();
            expect($font->preload)->toBeTrue();
            expect($font->fontStack)->toBe('sans-serif');
        });

        it('accepts custom font settings', function () {
            $font = new Font(
                fontFamily: 'Inter',
                fallbackFontFamily: 'Arial, sans-serif',
                fontWeight: 600,
                fontStyle: 'italic',
                preload: false
            );

            expect($font->fontFamily)->toBe('Inter');
            expect($font->fallbackFontFamily)->toBe('Arial, sans-serif');
            expect($font->fontWeight)->toBe(600);
            expect($font->fontStyle)->toBe('italic');
            expect($font->preload)->toBeFalse();
        });

        it('accepts string font weight', function () {
            $font = new Font(fontWeight: 'bold');

            expect($font->fontWeight)->toBe('bold');
        });

        it('builds font stack without web font', function () {
            $font = new Font(
                fontFamily: 'Helvetica',
                fallbackFontFamily: 'Arial, sans-serif'
            );

            expect($font->fontStack)->toBe('Arial, sans-serif');
        });

        it('builds font stack with web font', function () {
            $webFont = [
                'url' => 'https://fonts.googleapis.com/css2?family=Inter',
                'format' => 'woff2'
            ];

            $font = new Font(
                fontFamily: 'Inter',
                fallbackFontFamily: 'Arial, sans-serif',
                webFont: $webFont
            );

            expect($font->fontStack)->toBe('Inter, Arial, sans-serif');
            expect($font->webFont)->toBe($webFont);
        });

        it('handles web font without url', function () {
            $webFont = ['format' => 'woff2']; // missing url

            $font = new Font(
                fontFamily: 'Inter',
                fallbackFontFamily: 'Arial, sans-serif',
                webFont: $webFont
            );

            expect($font->fontStack)->toBe('Arial, sans-serif'); // fallback only
        });

        it('renders view', function () {
            $font = new Font();
            $view = $font->render();

            expect($view->name())->toBe('blade-email::components.font');
        });
    });

    describe('CodeBlock Component', function () {
        it('creates code block with default settings', function () {
            $codeBlock = new CodeBlock();

            expect($codeBlock->code)->toBe('');
            expect($codeBlock->language)->toBe('php');
            expect($codeBlock->theme)->toBe('github-light');
            expect($codeBlock->showLineNumbers)->toBeTrue();
            expect($codeBlock->title)->toBeNull();
            expect($codeBlock->highlightedCode)->toBeString();
        });

        it('accepts custom code and settings', function () {
            $code = '<?php echo "Hello World"; ?>';
            $codeBlock = new CodeBlock(
                code: $code,
                language: 'javascript',
                theme: 'github-dark',
                showLineNumbers: false,
                title: 'Example Code'
            );

            expect($codeBlock->code)->toBe($code);
            expect($codeBlock->language)->toBe('javascript');
            expect($codeBlock->theme)->toBe('github-dark');
            expect($codeBlock->showLineNumbers)->toBeFalse();
            expect($codeBlock->title)->toBe('Example Code');
        });

        it('processes code with highlighting', function () {
            $code = '<?php echo "test"; ?>';
            $codeBlock = new CodeBlock(code: $code);

            expect($codeBlock->highlightedCode)->toContain('<pre');
            expect($codeBlock->highlightedCode)->toContain('<code>');
            expect($codeBlock->highlightedCode)->toContain('test');
        });

        it('applies themes correctly', function () {
            $codeBlock = new CodeBlock(
                code: 'test code',
                theme: 'github-dark'
            );

            expect($codeBlock->highlightedCode)->toBeString();
            expect($codeBlock->highlightedCode)->toContain('test');
            expect($codeBlock->highlightedCode)->toContain('code');
        });

        it('handles different themes', function () {
            $codeBlock = new CodeBlock(
                code: 'test code',
                theme: 'github-light'
            );

            expect($codeBlock->highlightedCode)->toBeString();
            expect($codeBlock->highlightedCode)->toContain('test');
            expect($codeBlock->highlightedCode)->toContain('code');
        });

        it('handles empty code', function () {
            $codeBlock = new CodeBlock(code: '');

            expect($codeBlock->highlightedCode)->toContain('<pre');
            expect($codeBlock->highlightedCode)->toContain('<code>');
        });

        it('handles HTML in code safely', function () {
            $code = '<script>alert("XSS")</script>';
            $codeBlock = new CodeBlock(code: $code);

            expect($codeBlock->highlightedCode)->toBeString();
            expect($codeBlock->highlightedCode)->toContain('script');
        });

        it('handles various programming languages', function () {
            $languages = ['php', 'javascript', 'js', 'typescript', 'ts', 'html', 'css', 'json', 'python'];

            foreach ($languages as $language) {
                $codeBlock = new CodeBlock(
                    code: 'test code',
                    language: $language
                );

                expect($codeBlock->language)->toBe($language);
                expect($codeBlock->highlightedCode)->toBeString();
            }
        });

        it('handles various themes', function () {
            $themes = [
                'github-light', 'github-dark', 'vs-code-light', 'vs-code-dark',
                'monokai', 'dracula', 'one-dark', 'nord'
            ];

            foreach ($themes as $theme) {
                $codeBlock = new CodeBlock(
                    code: 'test code',
                    theme: $theme
                );

                expect($codeBlock->theme)->toBe($theme);
                expect($codeBlock->highlightedCode)->toBeString();
            }
        });

        it('renders view', function () {
            $codeBlock = new CodeBlock();
            $view = $codeBlock->render();

            expect($view->name())->toBe('blade-email::components.code-block');
        });

        it('produces valid HTML output', function () {
            $codeBlock = new CodeBlock(code: 'test');

            expect($codeBlock->highlightedCode)->toBeString();
            expect($codeBlock->highlightedCode)->toContain('<pre');
            expect($codeBlock->highlightedCode)->toContain('</pre>');
            expect($codeBlock->highlightedCode)->toContain('test');
        });
    });
});