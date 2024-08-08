@extends('layouts.main')

@section('title', 'Accounts')

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
                <li class="breadcrumb-item active" aria-current="page">Accounts</li>
            </ol>
        </nav>

        <h1 class="my-3">Accounts</h1>
        <a href="{{ route('account.create') }}" class="btn btn-success">Create Account</a>

        <div class="mt-3">
            @if (count($accounts) < 1)
                <p>No accounts.</p>
            @endif
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Name</th>
                        <th scope="col">Role</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($accounts as $key => $account)
                        <tr>
                            <th scope="row">{{ $key + $accounts->firstItem() }}</th>
                            <td>{{ $account->username }}</td>
                            <td>{{ $account->name }}</td>
                            <td>{{ ucfirst($account->role) }}</td>
                            <td>
                                <a href="{{ route('account.show', $account->username) }}">Detail</a>
                                <span>|</span>
                                <a href="{{ route('account.edit', $account->username) }}">Edit</a>
                                <span>|</span>
                                <a id="btn-delete" href="{{ route('account.destroy', $account->username) }}"
                                    onclick="event.preventDefault(); return confirm('Are you sure to delete this user?') ? document.getElementById('delete-account-{{ $account->username }}').submit() : false;">Delete</a>
                                <form id="delete-account-{{ $account->username }}"
                                    action="{{ route('account.destroy', $account->username) }}" method="POST"
                                    class="d-none">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
