<?php namespace App\Http\Controllers\Auth;

/**
 * Use to control process of EmailController
 * @date 10/21/2016
 * @author Nasir Mehmood <oknasir@gmail.com>
 */

use App\Http\Controllers\Controller;
use App\LoginToken;
use App\Services\AuthenticateEmailUser;

class EmailController extends Controller
{
    /**
     * Load view for login using email
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        return view('auth.email');
    }

    /**
     * Send email with token
     *
     * @param AuthenticateEmailUser $auth
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postLogin(AuthenticateEmailUser $auth)
    {
        $auth->invite();

        session()->flash('info', 'Invitation sent, Please check your email.');

        return redirect('/');
    }

    /**
     * Confirm token and login user
     *
     * @param LoginToken $token
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function confirmLogin(LoginToken $token)
    {
        $user = $token->user;

        auth()->login($user);

        $user->loginTokens->map(function ($token) {

            $token->delete();

        });

        return redirect('/');
    }

}