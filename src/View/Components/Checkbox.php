<?php
/*
 * Copyright (C) 2021. Def Studio
 *  Unauthorized copying of this file, via any medium is strictly prohibited
 *  Authors: Fabio Ivona <fabio.ivona@defstudio.it> & Daniele Romeo <danieleromeo@defstudio.it>
 */

namespace DefStudio\Components\View\Components;


use DefStudio\Components\Traits\ChecksErrors;
use DefStudio\Components\Traits\HasId;
use DefStudio\Components\Traits\HasName;
use DefStudio\Components\Traits\HasValue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class Checkbox extends Component
{

    use HasName;
    use HasValue;
    use HasId;
    use ChecksErrors;

    public string $containerClass;
    public string $custom_class = 'custom-checkbox';
    private bool $checked;
    public bool $inline;
    public bool $readonly;
    public string $value_unchecked = '';
    public string $value_checked;
    public string $modelField;
    public ?string $label;


    public function __construct(
        string $name,
        string $label = null,
        $value = [1, 0],
        $checked = false,
        bool $inline = false,
        string $id = '',
        string $modelField = 'id',
        bool $readonly = false,
        string $containerClass = ''
    ) {
        $this->modelField = $modelField;
        $this->name = $name;
        $this->label = $label;
        $this->checked = (bool)$checked;
        $this->inline = $inline;
        $this->readonly = $readonly;
        $this->id = $id;
        $this->containerClass = $containerClass;

        if (is_array($value)) {
            $this->value_unchecked = $value[1];
            $this->value_checked = $value[0];
        } else {
            $this->value_checked = $value;
        }

    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        return view('def-components::checkbox');
    }

    public function is_checked(): bool
    {

        if ($this->checked) return true;

        $computed_value = $this->computed_value($this->checked);

        if ($computed_value instanceof Collection) {
            return $computed_value->contains($this->modelField, $this->value_checked);
        } else if ($this->is_array()) {
            $computed_values = Arr::wrap($computed_value);

            return in_array($this->value_checked, $computed_values);
        } else {
            return (bool)$computed_value;
        }
    }

    public function is_array(): bool
    {
        return Str::endsWith($this->name ?? '', '[]');
    }


}
