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
        <a href="{{ route('accounts.create') }}" class="btn btn-success">Create Account</a>

        <div class="mt-3">
            @if (count($accounts) < 1)
                <p>No accounts.</p>
            @else
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">
                                @if (request()->query('sort'))
                                    @if (request()->query('sort') == 'desc')
                                        <a href="{{ route('accounts.index') . '?sort=asc&by=username' }}">Username</a>
                                    @else
                                        <a href="{{ route('accounts.index') . '?sort=desc&by=username' }}">Username</a>
                                    @endif
                                @else
                                    <a href="{{ route('accounts.index') . '?sort=asc&by=username' }}">Username</a>
                                @endif
                            </th>
                            <th scope="col">
                                @if (request()->query('sort'))
                                    @if (request()->query('sort') == 'desc')
                                        <a href="{{ route('accounts.index') . '?sort=asc&by=name' }}">Name</a>
                                    @else
                                        <a href="{{ route('accounts.index') . '?sort=desc&by=name' }}">Name</a>
                                    @endif
                                @else
                                    <a href="{{ route('accounts.index') . '?sort=asc&by=name' }}">Name</a>
                                @endif
                            </th>
                            <th scope="col">
                                @if (request()->query('sort'))
                                    @if (request()->query('sort') == 'desc')
                                        <a href="{{ route('accounts.index') . '?sort=asc&by=role' }}">Role</a>
                                    @else
                                        <a href="{{ route('accounts.index') . '?sort=desc&by=role' }}">Role</a>
                                    @endif
                                @else
                                    <a href="{{ route('accounts.index') . '?sort=asc&by=role' }}">Role</a>
                                @endif
                            </th>
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
                                    <a href="{{ route('accounts.show', $account->username) }}" class="text-decoration-none"
                                        title="Detail">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            style="width: 18px; height: 18px">
                                            <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                            <path fill-rule="evenodd"
                                                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                    <a href="{{ route('accounts.edit', $account->username) }}" class="text-decoration-none"
                                        title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            style="width: 18px; height:18px">
                                            <path
                                                d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                                        </svg>
                                    </a>
                                    <a id="btn-delete" href="#"
                                        onclick="event.preventDefault(); return confirm('Are you sure to delete this account?') ? document.getElementById('delete-account-{{ $account->username }}').submit() : false;"
                                        class="text-decoration-none" title="Delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            style="width: 18px; height: 18px">
                                            <path fill-rule="evenodd"
                                                d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                    <form id="delete-account-{{ $account->username }}"
                                        action="{{ route('accounts.destroy', $account->username) }}" method="POST"
                                        class="d-none">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if (!empty($accounts))
                    <div class="mt-3 d-flex justify-content-center">
                        {{ $accounts->links() }}
                    </div>
                @endif
            @endif
        </div>
    </section>
@endsection
