<?php


namespace DefStudio\Components;


use DefStudio\Components\View\Components\Button;
use DefStudio\Components\View\Components\Card;
use DefStudio\Components\View\Components\Checkbox;
use DefStudio\Components\View\Components\CheckboxSwitch;
use DefStudio\Components\View\Components\Datatable;
use DefStudio\Components\View\Components\Hidden;
use DefStudio\Components\View\Components\Icon;
use DefStudio\Components\View\Components\Multiselect;
use DefStudio\Components\View\Components\Password;
use DefStudio\Components\View\Components\Text;
use Illuminate\Support\ServiceProvider;

class ComponentServiceProvider extends ServiceProvider
{
    public function boot(){

        $this->loadViewComponentsAs('def', [
            Button::class,
            Card::class,
            Checkbox::class,
            CheckboxSwitch::class,
            Datatable::class,
            Hidden::class,
            Icon::class,
            Multiselect::class,
            Password::class,
            Text::class,
        ]);

        $this->loadViewsFrom(__DIR__ . "/../resources/views", 'def-components');


        $this->publishes([
            __DIR__ . "/../resources/views" => resource_path('views/vendor/def-components'),
        ]);


    }
}
