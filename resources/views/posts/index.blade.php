@extends('layouts.main')
@section('page.title', 'Мои посты')

@section('main.content')
    @if(empty($posts))
        {{__('Нет ни одного поста.')}}
    @else
        <div class="relative bg-gray-50 rounded-2xl pt-16 pb-20 px-4 w-full sm:px-6 lg:pb-28 lg:px-8">
            <x-form class="mb-3 flex flex-row justify-end space-x-4">
                <select name="category_id"
                        class="mt-1 block w-max pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option disabled selected>Фильтр по категории</option>
                    @foreach($categories as $category)
                        <option
                            {{ request()->get("category_id") == $category->id  ? "selected" : "" }} value="{{$category->id}}">
                            {{$category->title}}
                        </option>
                    @endforeach
                </select>
                <select name="user_id"
                        class="mt-1 block w-max pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option disabled selected>Фильтр по автору</option>
                    @foreach($users as $user)
                        <option
                            {{ request()->get("user_id") == $user->id  ? "selected" : "" }} value="{{$user->id}}">
                            {{$user->name}}
                        </option>
                    @endforeach
                </select>
                <x-my-button color="indigo-400" type="submit">
                    Применить
                </x-my-button>
            </x-form>
            <div class="relative max-w-7xl mx-auto">
                <div class="text-center">
                    <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl">Посты</h2>
                    <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">Lorem ipsum dolor sit amet
                        consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed.</p>
                </div>
                <div class="mt-12 max-w-lg mx-auto grid gap-5 lg:grid-cols-3 lg:max-w-none">
                    @foreach($posts as $post)
                        <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                            <div class="flex-shrink-0">
                                <img class="h-48 w-full object-cover"
                                     src="{{$post->image}}"
                                     alt="">
                            </div>
                            <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-indigo-600">
                                        <a href="#" class="hover:underline"> {{$post->category->title}} </a>
                                    </p>
                                    <a href="{{ route('post.show', $post->id) }}" class="block mt-2">
                                        <p class="text-xl font-semibold text-gray-900">{{$post->title}}</p>
                                        <p class="mt-3 text-base text-gray-500">{!! $post->content !!}</p>
                                    </a>
                                </div>
                                <div class="mt-6 flex items-center">
                                    <div class="flex-shrink-0">
                                        <a href="#">
                                            <span class="sr-only">{{$post->user->name}}</span>
                                            <img class="h-10 w-10 rounded-full"
                                                 src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                 alt="">
                                        </a>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">
                                            <a href="#" class="hover:underline"> {{$post->user->name}} </a>
                                        </p>
                                        <div class="flex space-x-1 text-sm text-gray-500">
                                            <time datetime="2020-03-16"> {{$post->created_at}} </time>
                                            <span aria-hidden="true"> &middot; </span>
                                            <span> 6 min read </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="mt-3">
            {{$posts->withQueryString()->links()}}
        </div>
    @endif
@endsection
