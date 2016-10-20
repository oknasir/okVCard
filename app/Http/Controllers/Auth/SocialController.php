<?php namespace App\Http\Controllers\Auth;

/**
 * Use to control process of Socialite Authentication
 * @date 10/20/2016
 * @author Nasir Mehmood <oknasir@gmail.com>
 */

use App\Http\Controllers\Controller;
use App\Provider;
use App\User;
use Socialite;

class SocialController extends Controller
{
    /**
     * All social providers for authentication
     *
     * @var array
     */
    protected $providers = ['github', 'facebook', 'twitter', 'google', 'linkedin'];

    /**
     * Redirect the user to the provider authentication page.
     *
     * @param $social
     * @return
     */
    public function redirectToProvider($social)
    {
        if (!in_array($social, $this->providers))
            abort(404);

        info('Call redirectToProvider for Socialite: ' . $social);

        return Socialite::driver($social)->redirect();
    }

    /**
     * Obtain the user information from provider.
     *
     * @param $social
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleProviderCallback($social)
    {
        if (!in_array($social, $this->providers))
            abort(404);

        info('Call handleProviderCallback for Socialite: ' . $social);

        $user = $this->findOrCreateSocialUser(
            $social,
            Socialite::driver($social)->user()
        );

        auth()->login($user);

        info('User created or fetch and authorized.');

        return redirect('/');
    }

    /**
     * Create or get user information.
     *
     * @param $social
     * @param $providerUser
     * @return mixed
     */
    private function findOrCreateSocialUser($social, $providerUser)
    {
        $provider = Provider::firstOrNew(['provider_id' => $providerUser->id]);

        if ($provider->exists) return $provider->user;

        $providerFiller = [
            'provider' => $social,
            'nickname' => $providerUser->nickname,
            'avatar' => $providerUser->avatar,
            'email' => $providerUser->email,
            'name' => $providerUser->name,
        ];

        if ($social == 'github')
            $providerFiller['bio'] = $providerUser->user['bio'];
        else if ($social == 'twitter')
            $providerFiller['bio'] = $providerUser->user['description'];
        else if ($social == 'google')
            $providerFiller['bio'] = $providerUser->user['aboutMe'];
        else if ($social == 'linkedin')
            $providerFiller['bio'] = $providerUser->user['headline'];

        $provider->fill($providerFiller);

        $userP = User::firstOrNew(['username' => $providerUser->nickname]);

        $userFiller = ['name' => $providerUser->name];
        if (!$userP->exists && $providerUser->email) {
            $userP = User::firstOrNew(['email' => $providerUser->email]);
            $userFiller['username'] = $providerUser->nickname;
        } else
            $userFiller['email'] = $providerUser->email;

        if ($userP->exists) {

            $userP->providers()->save($provider);

            return $userP;
        }

        $userP->fill($userFiller)->save();

        $userP->providers()->save($provider);

        return $userP;
    }
}
