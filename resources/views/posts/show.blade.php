@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <h1 class="card-title">{{ $post->title }}</h1>
                    <hr>
                    <div class="mb-3">
                        <label for="content" class="form-label fw-bold">Content:</label>
                        <p class="card-text">{{ $post->content }}</p>
                    </div>
                    @if($post->image)
                        <div class="mb-3">
                            <label for="image" class="form-label fw-bold">Image:</label>
                            <div>
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid rounded">
                            </div>
                        </div>
                    @endif
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left"></i> Back to Posts</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.1/font/bootstrap-icons.min.css" rel="stylesheet">
<style>
    .card {
        border: none;
    }
    .card-title {
        color: #333;
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }
    hr {
        border-top: 1px solid #ddd;
    }
    .form-label {
        color: #555;
    }
    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }
    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
    }
</style>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" defer></script>
@endsection
