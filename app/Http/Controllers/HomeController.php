<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $viewer = \App\Invoice::select(\DB::raw("COUNT(invoice) as count"))
            ->groupBy(\DB::raw("year(billing_date)"))
            ->pluck('count');

        $click = \App\Invoice::select(\DB::raw("COUNT(invoice) as count"))
            ->groupBy(\DB::raw("year(billing_date)"))
            ->pluck('count');

        return view('home',compact('viewer','click'));
    }

    public function showChangePasswordForm(){
        return view('auth.passwords.change');
    }

    public function changePassword(Request $request){
        $rules = [
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
            'new-password-confirmation' => 'required',
        ];

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->withErrors([
                'error' => trans('Your current password does not matches with the password you provided. Please try again.')]);
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->withErrors([
                'error' => trans('New Password cannot be same as your current password. Please choose a different password.')]);
        }

        $this->validatevalidate($request, $rules);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("status","Password changed successfully !");
    }
}
