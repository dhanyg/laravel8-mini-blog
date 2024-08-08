@extends('layouts.main')

@section('title', 'Author')

@section('content')
    <section class="container">
        <h1 class="my-3">Author</h1>
        <div>
            <a href="{{ route('account.edit', $account->username) }}" class="btn btn-primary">Update</a>
            <a href="#" class="btn btn-danger">Delete</a>
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
