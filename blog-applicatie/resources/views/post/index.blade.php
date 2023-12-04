<x-app-layout>
    <div class="mt-4">
        <a href="{{ route('posts.create') }}" class="text-blue-500 hover:underline">Create a new blog post</a>
    </div>
    <div class="max-w-5xl mx-auto py-4">
        <ul class="divide-y">
            @foreach ($posts as $post)
            <li class="py-4 px-2">
                <a href="{{ route('posts.show', $post)}}" class="text-xl text-blue-500 hover:underline font-semibold block">{{ $post->title }}</a>
                <p class="text-sm text-white">
                    {{ $post->created_at->diffForHumans() }} by {{ $post->user->name }}
                </p>

                {{-- Edit link --}}
                @if(auth()->user() && auth()->user()->id === $post->user_id)
                <a href="{{ route('posts.edit', $post) }}" class="text-blue-500 hover:underline">Edit</a>
                @endif

                {{-- Delete button --}}
                @if(auth()->user() && auth()->user()->id === $post->user_id)
                <form action="{{ route('posts.destroy', $post) }}" method="post" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                </form>
                @endif
            </li>
            @endforeach
        </ul>
        <div>
            {{$posts->links()}}
        </div>
    </div>
</x-app-layout>