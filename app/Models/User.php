<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Jobs\SendEmailCodeJob;
use App\Jobs\SendEmailVerifyJob;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function generateCode()
    {
        $code = rand(1000, 9999);
        UserCode::updateOrCreate(

            ['user_id' => auth()->user()->id],

            ['code' => $code]

        );

        try {

            $details = [

                'title' => 'Mail from Abrites',

                'code' => $code,
                'email' => auth()->user()->email

            ];

            dispatch((new SendEmailCodeJob($details))->allOnQueue('codemail'));
        } catch (Exception $e) {

            info("Error: " . $e->getMessage());
        }
    }

    public function sendVerificationMail()
    {
        try {

            $details = [

                'title' => 'Mail from Abrites',
                'email' => $this->email,
                'url'   => url('http://abrites.test/users/verify/mail/' . $this->id )

            ];

            dispatch((new SendEmailVerifyJob($details))->allOnQueue('verifymail'));
        } catch (Exception $e) {

            info("Error: " . $e->getMessage());
        }
    }
}
