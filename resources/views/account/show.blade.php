@extends('layouts.main')

@section('title', 'Author')

@section('content')
    <section class="container">
        <nav aria-label="breadcrumb" class="mt-3">
            <ol class="breadcrumb px-3 py-2 bg-light rounded">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('accounts.index') }}">Accounts</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $account->name }}</li>
            </ol>
        </nav>

        <h1 class="my-3">Author</h1>

        <div>
            <a href="{{ route('accounts.edit', $account->username) }}" class="btn btn-primary">Update</a>
            <a href="#" class="btn btn-danger"
                onclick="event.preventDefault(); return confirm('Are you sure to delete this user?') ? document.getElementById('delete-{{ $account->username }}').submit() : false;">Delete</a>
            <form id="delete-{{ $account->username }}" action="{{ route('accounts.destroy', $account->username) }}"
                method="POST" class="d-none">
                @csrf
                @method('delete')
            </form>
        </div>
        <div class="mt-3">
            <table class="table table-bordered table-striped">
                <tr>
                    <td>
                        <strong>Username</strong>
                    </td>
                    <td>{{ $account->username }}</td>
                </tr>
                <tr>
                    <td>
                        <strong>Name</strong>
                    </td>
                    <td>{{ $account->name }}</td>
                </tr>
                <tr>
                    <td>
                        <strong>Role</strong>
                    </td>
                    <td>{{ ucfirst($account->role) }}</td>
                </tr>
            </table>
        </div>
    </section>
@endsection
