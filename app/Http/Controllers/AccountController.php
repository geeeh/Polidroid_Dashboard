<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get current user's account.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $account = Account::where('user_id', Auth::user()->id)->get();
        if ($account->isEmpty()) {
            return $this->new();
        }
        return view( 'dashboard.account', ['account'=> $account->toArray()]);

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function new() {
        return view( 'dashboard.create_account');
    }

    /**
     * Create a new account.
     * @param Request $request
     * @return Redirect
     */
    public function create(Request $request)
    {
        $account = new Account();
        $account->company_name = $request->input('company_name');
        $account->phone = $request->input('company_phone');
        $account->latitude = $request->input('latitude');
        $account->longitude = $request->input('longitude');
        $account->service_type = $request->input('service_type');
        $account->user_id = Auth::user()->id;
        $account->save();

        Redirect::to('account')->with('message', 'Account created successfully');
    }

    /**
     * Update an existing account.
     * @param Integer $id
     * @return Redirect
     */
    public function update($id)
    {
        $account =  Account::find($id);
        $account->company_name = $request->input('company_name');
        $account->phone = $request->input('company_phone');
        $account->latitude = $request->input('latitude');
        $account->longitude = $request->input('longitude');
        $account->service_type = $request->input('service_type');
        $account->user_id = Auth::user()->id;
        $account->save();

        Redirect::to('account')->with('message', 'Account updated successfully');
    }
    /**
     * @param $id - account id.
     */
    public function delete($id)
    {
        $account = Account::find($id);
        $account->delete();
        Redirect::to('createaccount')->with('message', 'Account deleted successfully');
    }
}
