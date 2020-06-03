<!-- html5 range input -->
<div  >
    <label>{!! $field['label'] !!}</label>
    {{-- @include('crud::inc.field_translatable_icon') --}}
    <input 
        style="-webkit-appearance: slider-horizontal;" 
        min="{{ $field['min'] }}"
        max="{{ $field['max'] }}"
        type="range"
        name="{{ $field['name'] }}"
        value="{{ old($field['name']) ? old($field['name']) : (isset($field['value']) ? $field['value'] : (isset($field['default']) ? $field['default'] : '' )) }}"
        @include('crud::inc.field_attributes')
        >

    {{-- HINT --}}
    @if (isset($field['hint']))
        <p class="help-block">{!! $field['hint'] !!}</p>
    @endif
</div>
