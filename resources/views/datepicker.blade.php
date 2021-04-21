<?php

use Illuminate\View\ComponentAttributeBag;

/**
 * @var ComponentAttributeBag $attributes
 * @var string $label
 */

?>


@unless(empty($label))
    <label for="{{$computed_id()}}">{{$label}}</label>
@endunless


@isset($append)
    <div id="{{$computed_id()}}-input-group" class="input-group">
        @endisset
        <input
            id="{{$computed_id()}}"
            type="date"
            name="{{$name()}}"
            {{$attributes->merge(['class' => 'form-control'])
                         ->merge(['autocomplete' => 'nope'])
                         ->merge($error_attributes($errors))}}
            value="{{carbon($computed_value((string)$slot))?->format('Y-m-d')}}">
        {{$error_snippet($errors)}}

        @isset($append)
            <div class="input-group-append">
                    <span class="input-group-text">
                        {{$append}}
                    </span>
            </div>
    </div>
@endisset

