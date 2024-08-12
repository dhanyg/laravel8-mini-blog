@extends('layouts.main')

@section('title', $post->title)

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
                <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
            </ol>
        </nav>

        <h1 class="my-3">Posts</h1>
        <div>
            <a href="{{ route('posts.edit', $post->idpost) }}" class="btn btn-primary">Update</a>
            <a id="btn-delete" href="{{ route('posts.destroy', $post->idpost) }}" class="btn btn-danger"
                onclick="event.preventDefault(); return confirm('Are you sure to delete this post?') ? document.getElementById('delete-post').submit() : false;">Delete</a>
            <form id="delete-post" action="{{ route('posts.destroy', $post->idpost) }}" method="POST" class="d-none">
                @csrf
                @method('delete')
            </form>
        </div>

        <div class="mt-2">
            <table class="table table-bordered table-striped">
                <tr>
                    <td>
                        <strong>Title</strong>
                    </td>
                    <td>{{ $post->title }}</td>
                </tr>
                <tr>
                    <td>
                        <strong>Content</strong>
                    </td>
                    <td>{!! $post->content !!}</td>
                </tr>
                <tr>
                    <td>
                        <strong>Date</strong>
                    </td>
                    <td>
                        {{ $post->date }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Username</strong>
                    </td>
                    <td>{{ $post->username }}</td>
                </tr>
            </table>
        </div>
    </section>
@endsection
