<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PasswordResetToken
 *
 * @property string $email
 * @property string $token
 * @property Carbon|null $created_at
 */
class PasswordResetToken extends Model
{
    public $incrementing = false;

    public $timestamps = false;

    protected $table = 'password_reset_tokens';

    protected $primaryKey = 'email';

    protected $hidden = [
        'token',
    ];

    protected $fillable = [
        'token',
    ];
}
