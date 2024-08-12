@extends('layouts.main')

@section('title', 'Posts')

@section('content')
    <section class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <nav aria-label="breadcrumb" class="mt-3">
            <ol class="breadcrumb px-3 py-2 bg-light rounded">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Posts</li>
            </ol>
        </nav>

        <h1 class="my-3">Posts</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-success">Create Post</a>

        <div class="mt-3">
            @if (count($posts) < 1)
                <p>No posts.</p>
            @else
                <table class="table table-sm table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">
                                @if (request()->query('sort'))
                                    @if (request()->query('sort') == 'desc')
                                        <a href="{{ route('posts.index') . '?sort=asc&by=title' }}">Title</a>
                                    @else
                                        <a href="{{ route('posts.index') . '?sort=desc&by=title' }}">Title</a>
                                    @endif
                                @else
                                    <a href="{{ route('posts.index') . '?sort=asc&by=title' }}">Title</a>
                                @endif
                            </th>
                            <th scope="col">
                                @if (request()->query('sort'))
                                    @if (request()->query('sort') == 'desc')
                                        <a href="{{ route('posts.index') . '?sort=asc&by=content' }}">Content</a>
                                    @else
                                        <a href="{{ route('posts.index') . '?sort=desc&by=content' }}">Content</a>
                                    @endif
                                @else
                                    <a href="{{ route('posts.index') . '?sort=asc&by=content' }}">Content</a>
                                @endif
                            </th>
                            <th scope="col">
                                @if (request()->query('sort'))
                                    @if (request()->query('sort') == 'desc')
                                        <a href="{{ route('posts.index') . '?sort=asc&by=date' }}">Date</a>
                                    @else
                                        <a href="{{ route('posts.index') . '?sort=desc&by=date' }}">Date</a>
                                    @endif
                                @else
                                    <a href="{{ route('posts.index') . '?sort=asc&by=date' }}">Date</a>
                                @endif
                            </th>
                            <th scope="col">
                                @if (request()->query('sort'))
                                    @if (request()->query('sort') == 'desc')
                                        <a href="{{ route('posts.index') . '?sort=asc&by=username' }}">Username</a>
                                    @else
                                        <a href="{{ route('posts.index') . '?sort=desc&by=username' }}">Username</a>
                                    @endif
                                @else
                                    <a href="{{ route('posts.index') . '?sort=asc&by=username' }}">Username</a>
                                @endif
                            </th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $key => $post)
                            <tr>
                                <th scope="row">{{ $key + $posts->firstItem() }}</th>
                                <td>{{ $post->title }}</td>
                                <td>{!! $post->content !!}</td>
                                <td>{{ $post->date }}</td>
                                <td>{{ $post->username }}</td>
                                <td>
                                    <a href="{{ route('posts.show', $post->idpost) }}">Detail</a>
                                    <span>|</span>
                                    <a href="{{ route('posts.edit', $post->idpost) }}">Edit</a>
                                    <span>|</span>
                                    <a id="btn-delete" href="{{ route('posts.destroy', $post->idpost) }}"
                                        onclick="event.preventDefault(); return confirm('Are you sure to delete this post?') ? document.getElementById('delete-post-{{ $post->idpost }}').submit() : false;">Delete</a>
                                    <form id="delete-post-{{ $post->idpost }}"
                                        action="{{ route('posts.destroy', $post->idpost) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if (!empty($posts))
                    <div class="mt-3 d-flex justify-content-center">
                        {{ $posts->links() }}
                    </div>
                @endif
            @endif
        </div>
    </section>
@endsection
