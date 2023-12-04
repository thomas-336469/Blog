<x-app-layout>
    <div class="max-w-5xl mx-auto py-4">
        <h2 class="text-2xl font-semibold text-blue-500 mb-4">Edit Blog Post</h2>

        <form action="{{ route('posts.update', $post) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" class="mt-1 p-2 border rounded w-full">
            </div>

            <div class="mb-4">
                <label for="body" class="block text-sm font-medium text-gray-700">Body</label>
                <textarea name="body" id="body" rows="4" class="mt-1 p-2 border rounded w-full">{{ old('body', $post->body) }}</textarea>
            </div>

            <div>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Update Post</button>
            </div>
        </form>
    </div>
</x-app-layout>