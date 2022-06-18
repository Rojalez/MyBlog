@extends('layouts.main')
@section('page.title', 'Изменение поста')

@section('main.content')
    <x-title>
        {{__('Изменение поста')}}
        <x-slot name="link">
            <a href="{{route('post.show', $post->id)}}">
                {{__('Назад')}}
            </a>
        </x-slot>
    </x-title>
    <x-post.form action="{{route('post.update', $post->id)}}" method="put" :post="$post">
        <x-form-item>
            <x-my-label required>{{__('Категория')}}</x-my-label>
            <select name="category_id" class="form-select" aria-label="Default select example">
                @foreach($categories as $category)

                    <option
                        value="{{$category->id}}"
                        {{$category->id === $post->category->id ? ' selected' : ''}}
                    >
                        {{$category->title}}
                    </option>
                @endforeach
            </select>
        </x-form-item>
        <x-form-item>
            <x-my-label required>{{__('Теги')}}</x-my-label>
            <select name="tags[]" multiple class="form-select" size="3">
                @foreach($tags as $tag)
                    <option
                        @foreach($post->tags as $postTag)
                            {{$tag->id === $postTag->id ? ' selected' : ''}}
                        @endforeach
                        value="{{$tag->id}}"
                    >{{$tag->title}}</option>
                @endforeach
            </select>
        </x-form-item>
        <x-my-button type="submit">
            {{__('Сохранить')}}
        </x-my-button>
    </x-post.form>

@endsection
