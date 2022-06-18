@props(['value' => ''])
<input type="text" {{$attributes->class([
    'form-control',
])->merge([
    'type'=> 'text',
    'value' => (old($attributes->get('name')) ?: $value),
])}}>
