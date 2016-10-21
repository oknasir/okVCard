<?php namespace App\Services;

/**
 * Use to control process of AuthenticateEmailUser
 * @date 10/21/2016
 * @author Nasir Mehmood <oknasir@gmail.com>
 */

use App\User;
use App\LoginToken;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class AuthenticateEmailUser
{
    use ValidatesRequests;

    /**
     * Request for get token
     *
     * @var Request
     */
    protected $request;

    /**
     * AuthenticateEmailUser constructor.
     *
     * @param $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * send invitation to user
     */
    public function invite()
    {
        $this->validateRequest()
            ->createToken()
            ->send();
    }

    /**
     * Validate request for token
     *
     * @return $this
     */
    protected function validateRequest()
    {
        $this->validate($this->request, [
            'email' => 'required|email|exists:users'
        ]);

        return $this;
    }

    /**
     * generate token for user
     *
     * @return LoginToken
     */
    protected function createToken()
    {
        $user = User::where(['email' => $this->request->email])->firstOrFail();

        return LoginToken::generateFor($user);
    }
}