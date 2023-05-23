<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RsshConnectionView
 *
 * @property int $id
 * @property string $server_port
 * @property string $local_port
 * @property Carbon|null $updated_at
 * @property string $device_name
 * @property string $device_unique_code
 * @property string $device_active_status
 * @property string $connection_status_name
 * @property string $client_name
 */
class RsshConnectionView extends Model
{
    public $incrementing = false;

    public $timestamps = false;

    protected $table = 'rssh_connection_view';

    protected $casts = [
        'id' => 'int',
        'updated_at' => 'datetime',
    ];

    protected $fillable = [
        'id',
        'server_port',
        'local_port',
        'device_name',
        'device_unique_code',
        'device_active_status',
        'connection_status_name',
        'client_name',
    ];
}
