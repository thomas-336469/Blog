<!-- create.blade.php -->

<x-app-layout>
    <div class="max-w-5xl mx-auto py-4">
        <h2 class="text-2xl font-semibold text-blue-500 mb-4">Create a New Blog Post</h2>

        <form action="{{ route('posts.store') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-white text-sm font-medium">Title</label>
                <input type="text" name="title" id="title" class="w-full rounded-md bg-gray-800 border border-gray-700 text-white py-2 px-3">
            </div>

            <div class="mb-4">
                <label for="body" class="block text-white text-sm font-medium">body</label>
                <textarea name="body" id="body" rows="8" class="w-full rounded-md bg-gray-800 border border-gray-700 text-white py-2 px-3"></textarea>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Submit</button>
        </form>
    </div>
</x-app-layout>