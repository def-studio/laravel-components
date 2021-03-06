<?php


namespace DefStudio\Components\View\Components;

class CheckboxSwitch extends Checkbox
{
    public function __construct(
        string $name,
        string $label = null,
        $value = '1',
        $checked = false,
        bool $inline = false,
        string $id = '',
        string $modelField = 'id',
        bool $readonly = false,
        string $containerClass = ''
    )
    {
        parent::__construct($name, $label, $value, $checked, $inline, $id, $modelField, $readonly, $containerClass);
        $this->custom_class = 'custom-switch';
    }
}
