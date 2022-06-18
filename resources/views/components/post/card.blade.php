<x-card>
    <x-card-body>
        <h2 class="h6">
            <a href={{route('blog.show', $post->id)}}>
                {{$post->title}}
            </a>
        </h2>
        <div class="small text-muted">
            {{$post->created_at}}
        </div>
        <div class="small text-muted">
            Автор: {{$post->user_id}}
        </div>
    </x-card-body>
</x-card>
