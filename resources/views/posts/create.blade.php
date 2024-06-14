@extends('layouts.app')

@section('css')
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container  px-4 py-8">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="max-w-md mx-auto bg-white px-8 border rounded shadow">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold">Create a New Post</h2>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-2">Back to Posts</a>
            </div>

            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" id="postForm">
                @csrf

                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" id="title" name="title"
                        class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                    <textarea id="content" name="content" rows="4"
                        class="form-textarea mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" id="image" name="image" class="form-input mt-1 block w-full"
                        onchange="previewImage(event)">
                    <img id="imagePreview" class="mt-2" style="max-width: 100%; display: none;">
                </div>

                <div class="flex items-center justify-end mt-6">
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary mr-4 mb-4">Cancel</a>
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white rounded-md mb-4 hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" defer></script>

    <!-- JavaScript to preview selected image -->
    <script>
        function previewImage(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imagePreview = document.getElementById('imagePreview');
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
