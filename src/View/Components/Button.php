<?php


namespace DefStudio\Components\View\Components;



class Button extends Component
{
    public string $href;
    public string $color;
    public string $type;
    public string $method;

    public function __construct(string $url = '', string $route = '', string $color = 'primary', string $type = 'button', string $method = 'GET')
    {
        $this->href = empty($route) ? $url : route($route);
        $this->color = $color;
        $this->type = $type;
        $this->method = $method;
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        return view('def-components::button');
    }
}
