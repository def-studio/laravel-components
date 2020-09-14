<?php

use Illuminate\View\ComponentAttributeBag;

/**
 * @var ComponentAttributeBag $attributes
 * @var string $name
 * @var string $id
 * @var string $value
 * @var bool $inline
 * @var bool $checked
 *
 */
?>

@if($inline)
    @if(is_array($value))
        <input type="hidden" name="{{$name}}" value="{{$value[1]}}">
        <?php $value = $value[0] ?>
    @endif
    {{h()->custom_switch($name, $slot, $checked, $value, $id)->classIf($inline, 'custom-control-inline')}}
@else
    <div class="form-group">
        @if(is_array($value))
            <input type="hidden" name="{{$name}}" value="{{$value[1]}}">
            <?php $value = $value[0] ?>
        @endif
        {{h()->custom_switch($name, $slot, $checked, $value, $id)->classIf($inline, 'custom-control-inline')}}
    </div>
@endif



