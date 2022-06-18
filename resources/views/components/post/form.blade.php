@props(['post'=> null])

<x-form {{$attributes}} >
    <x-form-item>
        <x-my-label required>{{__('Название поста')}}</x-my-label>
        <x-my-input name="title" value="{{ $post->title ?? '' }}" autofocus/>
        <x-error name="title"/>
    </x-form-item>
    <x-form-item>
        <x-my-label required>{{__('Текст поста')}}</x-my-label>
        <x-trix name="content" value="{{ $post->content ?? '' }}"/>
        <x-error name="content"/>
    </x-form-item>
    <x-form-item>
        <x-my-label required>{{__('Картинка поста')}}</x-my-label>
        <x-my-input name="image" value="{{ $post->image ?? '' }}"/>
        <x-error name="image"/>
    </x-form-item>
    {{$slot}}
</x-form>
