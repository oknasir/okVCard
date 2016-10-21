<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class LoginToken extends Model
{
    use Notifiable;
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
     * Get the user that owns the token.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Route notifications for the mail channel.
     *
     * @return string
     */
    public function routeNotificationForMail()
    {
        return $this->user->email;
    }
}
