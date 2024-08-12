@extends('layouts.main')

@section('title', 'Update Post: ' . $post->title)

@section('content')
    <section class="container">
        <nav aria-label="breadcrumb" class="mt-3">
            <ol class="breadcrumb px-3 py-2 bg-light rounded">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('posts.index') }}">Posts</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('posts.show', $post->idpost) }}">{{ $post->title }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Update</li>
            </ol>
        </nav>

        <h1 class="my-3">Update Post: {{ $post->title }}</h1>

        <form action="{{ route('posts.update', $post->idpost) }}" method="post">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    name="title" value="{{ old('title', $post->title) }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content_post" class="form-label">Content</label>
                <x-forms.tinymce-editor :content="$post->content" />
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </section>
@endsection

@push('css')
    <x-head.tinymce-config />
@endpush

@push('script')
    <script>
        // let content = document.getElementById('content_post').innerHTML = "<p>Lorem</p>";
        // tinymce.get("content_post").setContent(content);
    </script>
@endpush
