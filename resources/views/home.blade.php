@extends('layouts.main')

@section('title', 'Beranda')

@section('content')
    <section class="container">
        @if (count($posts) < 1)
            <h1 class="my-3">Beranda</h1>
        @else
            <div class="my-3">
                @foreach ($posts as $post)
                    <article>
                        <h2 class="mb-3">{{ $post->title }}</h2>
                        <div class="mb-3">
                            <span>{{ $post->username }} {{ $post->date }}</span>
                        </div>
                        <div class="mb-3">{!! $post->content !!}</div>
                    </article>
                @endforeach
            </div>
            <div class="mb-3">{{ $posts->links() }}</div>
        @endif
    </section>
@endsection
