@extends('layouts.main')
@section('page.title', 'Создание поста')

@section('main.content')
    <x-title>
        {{__('Создание поста')}}
        <x-slot name="link">
            <a href="{{route('post.index')}}">
                {{__('Назад')}}
            </a>
        </x-slot>
    </x-title>
    <x-post.form action="{{route('post.store')}}" method="post">
        <x-form-item>
            <x-my-label required>{{__('Категория')}}</x-my-label>
            <select name="category_id" class="form-select" aria-label="Default select example">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
            <x-error name="category"/>
        </x-form-item>

        <x-form-item>
            <x-my-label required>{{__('Теги')}}</x-my-label>
            <select name="tags[]" multiple class="form-select" size="3">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>
            <x-error name="tags"/>
        </x-form-item>

        <x-my-button type="submit">
            {{__('Создать пост')}}
        </x-my-button>
    </x-post.form>

{{--    {{$categories}}--}}

@endsection
