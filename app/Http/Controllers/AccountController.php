<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AccountRequest;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of accounts.
     *
     * @param \Illuminate\Http\Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->query('sort')) {
            $accounts = Account::orderBy('username')->paginate(15);
        } else {
            $accounts = Account::orderBy($request->query('by'), $request->query('sort'))
                ->paginate(15)
                ->withQueryString();
        }
        return view('account.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new account.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account.create');
    }

    /**
     * Store a newly created account in storage.
     *
     * @param  \App\Http\Requests\AccountRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        Account::create($data);
        return redirect()->route('accounts.index')->with('success', 'Account was created successfully.');
    }

    /**
     * Display the specified account.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        return view('account.show', compact('account'));
    }

    /**
     * Show the form for editing the specified account.
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
     * @param  \App\Models\Account $account
     * @return \Illuminate\Http\Response
     */
    public function update(AccountRequest $request, Account $account)
    {
        $data = $request->validated();
        if ($data['password'] != null) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $account->update($data);

        return redirect()->route('accounts.index')->with('success', 'Account was updated successfully.');
    }

    /**
     * Remove the specified account from storage.
     *
     * @param  \App\Models\Account $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        $account->delete();
        return redirect()->route('accounts.index')->with('success', 'Account was deleted successfully.');
    }
}
