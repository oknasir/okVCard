<?php namespace App;

use App\Mail\EmailLoginUser;
use Illuminate\Database\Eloquent\Model;
use Mail;

class LoginToken extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'token',
    ];

    /**
     * Override the wildcard column
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'token';
    }

    /**
     * create token for user
     *
     * @param User $user
     * @return static
     */
    public static function generateFor(User $user)
    {
        return static::create([
            'user_id' => $user->id,
            'token' => str_random(50)
        ]);
    }

    /**
     * Send generated token to user
     */
    public function send()
    {
        Mail::to($this->user->email)->send(new EmailLoginUser(
            url('/login/email', $this->token)
        ));
    }

    /**
     * Get the user that owns the token.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
