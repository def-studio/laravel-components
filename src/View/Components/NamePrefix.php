<?php
/*
 * Copyright (C) 2021. Def Studio
 *  Unauthorized copying of this file, via any medium is strictly prohibited
 *  Authors: Fabio Ivona <fabio.ivona@defstudio.it> & Daniele Romeo <danieleromeo@defstudio.it>
 */

namespace DefStudio\Components\View\Components;

class NamePrefix extends Context
{

    public function __construct(public string $val = '')
    {
        $current_prefix = $this->context()->read('def_name_prefix');
        if (!empty($current_prefix)) {
            if (!str($this->val)->startsWith('[')) {
                $first_token = str($this->val)->before('[');
                $this->val = str($this->val)->replaceFirst($first_token, "[{$first_token}]");
            }
            $this->val = "{$current_prefix}{$this ->val}";
        }
        parent::__construct(['def_name_prefix' => $this->val]);
    }
}
