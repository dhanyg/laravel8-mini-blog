<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AccountRequest;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::orderBy('username')->paginate(20);
        return view('account.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AccountRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountRequest $request)
    {
        $data = $request->validated();
        Account::create($data);
        return redirect()->route('account.index')->with('success', 'Account was created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        return view('account.show', compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        return view('account.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AccountRequest  $request
     * @param  string  $username
     * @return \Illuminate\Http\Response
     */
    public function update(AccountRequest $request, string $username)
    {
        $data = $request->validated();
        if ($data['password'] != null) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        Account::where('username', $username)->update($data);
        return redirect()->route('account.index')->with('success', 'Account was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string $username
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $username)
    {
        Account::where('username', $username)->delete();
        return redirect()->route('account.index')->with('success', 'Account was deleted successfully.');
    }
}
