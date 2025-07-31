<?php

namespace BladeEmail\BladeEmail;

use BladeEmail\BladeEmail\Components\Body;
use BladeEmail\BladeEmail\Components\Button;
use BladeEmail\BladeEmail\Components\CodeBlock;
use BladeEmail\BladeEmail\Components\Column;
use BladeEmail\BladeEmail\Components\Container;
use BladeEmail\BladeEmail\Components\Divider;
use BladeEmail\BladeEmail\Components\Font;
use BladeEmail\BladeEmail\Components\Footer;
use BladeEmail\BladeEmail\Components\Head;
use BladeEmail\BladeEmail\Components\Header;
use BladeEmail\BladeEmail\Components\Heading;
use BladeEmail\BladeEmail\Components\Hr;
use BladeEmail\BladeEmail\Components\Html;
use BladeEmail\BladeEmail\Components\HtmlBody;
use BladeEmail\BladeEmail\Components\Img;
use BladeEmail\BladeEmail\Components\Layout;
use BladeEmail\BladeEmail\Components\Link;
use BladeEmail\BladeEmail\Components\Preview;
use BladeEmail\BladeEmail\Components\Row;
use BladeEmail\BladeEmail\Components\Section;
use BladeEmail\BladeEmail\Components\Spacer;
use BladeEmail\BladeEmail\Components\Text;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeEmailServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'blade-email');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/blade-email'),
            ], 'blade-email-views');
        }

        // Register class-based components
        Blade::component('email-button', Button::class);
        Blade::component('email-text', Text::class);
        Blade::component('email-img', Img::class);
        Blade::component('email-link', Link::class);
        Blade::component('email-container', Container::class);
        Blade::component('email-section', Section::class);
        Blade::component('email-row', Row::class);
        Blade::component('email-column', Column::class);
        Blade::component('email-heading', Heading::class);
        Blade::component('email-html', Html::class);
        Blade::component('email-head', Head::class);
        Blade::component('email-body', Body::class);
        Blade::component('email-html-body', HtmlBody::class);
        Blade::component('email-spacer', Spacer::class);
        Blade::component('email-hr', Hr::class);
        Blade::component('email-divider', Divider::class);
        Blade::component('email-preview', Preview::class);
        Blade::component('email-font', Font::class);
        Blade::component('email-code-block', CodeBlock::class);
        Blade::component('email-header', Header::class);
        Blade::component('email-footer', Footer::class);
        Blade::component('email-layout', Layout::class);
    }

    public function register()
    {
        //
    }
}
