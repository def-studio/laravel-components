<?php

use Illuminate\View\ComponentAttributeBag;

/**
 * @var ComponentAttributeBag $attributes
 * @var array $options
 * @var string $label
 * @var string|null $size
 */

$wire_model = $attributes->get('wire:model', $attributes->get('wire:model.defer'), $attributes->get('wire:model.lazy'))

?>


@unless(empty($label))
    <label for="{{$computed_id()}}">{{$label}}</label>
@endunless

@if($multiple && !empty($wire_model))
    <div wire:ignore>
        @endif

        <x-input-group :content-id="$computed_id()" :append="$append ?? null" :prepend="$prepend ?? null">
            <select
                name="{{$name()}}"
                    id="{{$computed_id()}}"
                    {{$attributes->merge(['class' => 'form-control'])
                                 ->merge(['class' => 'custom-select' . (empty($size)?'':"-$size")])
                                 ->merge($error_attributes($errors))}}
                    {{$multiple?'multiple':''}}>

                    @if(!empty($unselected))
                        <option value="">{{$unselected}}</option>
                    @endif

                    @foreach($options as $key=>$value)
                        <option value="{{$key}}" {{$is_selected($key)?'selected':''}}>{{$value}}</option>
                    @endforeach
                </select>
                {{$error_snippet($errors)}}
        </x-input-group>

        @if($multiple && !empty($wire_model))
    </div>
    {{$error_snippet($errors, true)}}
@endif


@push('x-scripts')
    <script>
        //@formatter:off
        document.addEventListener('livewire:load', function () {
            $('#{{$computed_id()}}').on('changed.bs.select', function () {
                const $this = $(this)
                let key = '{{$wire_model}}';
            @this.set(key, $this.val());
            })
        });
        //@formatter:on
    </script>
@endpush
