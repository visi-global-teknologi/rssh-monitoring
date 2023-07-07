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
 * @property Carbon|null $updated_at
 * @property int $device_id
 * @property string $device_name
 * @property string $device_unique_code
 * @property string $device_active_status
 * @property string|null $device_description
 * @property int $connection_status_id
 * @property string $connection_status_name
 * @property int $client_id
 * @property string $client_name
 */
class RsshConnectionView extends Model
{
    public $incrementing = false;

    protected $table = 'rssh_connection_view';

    protected $casts = [
        'id' => 'int',
        'device_id' => 'int',
        'connection_status_id' => 'int',
        'client_id' => 'int',
    ];

    protected $fillable = [
        'id',
        'server_port',
        'device_id',
        'device_name',
        'device_unique_code',
        'device_active_status',
        'device_description',
        'connection_status_id',
        'connection_status_name',
        'client_id',
        'client_name',
    ];
}
