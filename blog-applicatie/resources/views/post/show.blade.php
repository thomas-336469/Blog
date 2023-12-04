<x-app-layout>
    <div>
        <a href="{{ route('posts.index') }}" class="text-blue-500 hover:underline">Back to all posts</a>
    </div>
    <div class="max-w-5xl mx-auto px-4 py-6">

        <div class="mb-8">
            <h1 class="text-3xl text-blue-500 hover:underline font-semibold mb-2">{{ $post->title }}</h1>
            <p class="text-sm text-white">
                {{ $post->created_at->diffForHumans() }} by {{ $post->user->name }}
            </p>
        </div>

        <div class="prose mt-6 text-blue-500">
            {!! $post->html !!}
        </div>

        <div class="mt-12">
            <h2 id="comments" class="text-2xl font-semibold mb-4 text-blue-500">Comments</h2>
            @auth
            <form action="{{route('posts.comments.store' , $post)}}" method="post">
                @csrf
                <textarea name="body" id="body" cols="30" rows="5" class="w-full"></textarea>

                <x-primary-button type="submit">Add comment</x-primary-button>
            </form>

            @endauth

            <ul class="list-none">
                @foreach ($comments as $comment)
                <li class="border-b border-blue-200 py-4">
                    <p class="text-blue-800">{{$comment->body}}</p>
                    <p class="text-sm text-blue-500">
                        {{ $comment->created_at->diffForHumans() }} by {{ $comment->user->name }}
                    </p>

                    <form action="{{ route('comments.destroy', ['comment' => $comment]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-sm text-red-500">Delete</button>
                    </form>

                </li>
                @endforeach
            </ul>
            <div class="mt-12">
                <p class="text-blue-500">
                    {{$comments->fragment('comments')->links()}}
                </p>
            </div>
        </div>

    </div>
</x-app-layout>