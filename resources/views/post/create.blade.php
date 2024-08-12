@extends('layouts.main')

@section('title', 'Create Post')

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
                <li class="breadcrumb-item active" aria-current="page">Create Post</li>
            </ol>
        </nav>

        <h1 class="my-3">Create Post</h1>

        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    name="title" value="{{ old('title', '') }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content_post" class="form-label">Content</label>
                <x-forms.tinymce-editor />
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
