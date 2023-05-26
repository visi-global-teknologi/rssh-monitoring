<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Device
 *
 * @property int $id
 * @property string $name
 * @property string $unique_code
 * @property string|null $description
 * @property string $active_status
 * @property int $client_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Client $client
 * @property Collection|PingServer[] $ping_servers
 * @property Collection|RsshConnection[] $rssh_connections
 */
class Device extends Model
{
    protected $table = 'devices';

    protected $casts = [
        'client_id' => 'int',
    ];

    protected $fillable = [
        'name',
        'unique_code',
        'description',
        'active_status',
        'client_id',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function ping_servers()
    {
        return $this->hasMany(PingServer::class);
    }

    public function rssh_connections()
    {
        return $this->hasMany(RsshConnection::class);
    }

    public function rssh_connection()
    {
        return $this->hasOne(RsshConnection::class);
    }

    /**
     * Interact with the user's first name.
     */
    protected function uniqueCode(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $value,
            set: fn (string $value) => strtolower($value),
        );
    }
}
