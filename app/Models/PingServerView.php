<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PingServerView
 *
 * @property int $id
 * @property Carbon $date_time
 * @property int $device_id
 * @property Carbon|null $created_at
 * @property string $device_name
 * @property string $device_unique_code
 * @property string $device_active_status
 * @property string $client_name
 */
class PingServerView extends Model
{
    public $incrementing = false;

    public $timestamps = false;

    protected $table = 'ping_server_view';

    protected $casts = [
        'id' => 'int',
        'date_time' => 'datetime',
        'device_id' => 'int',
    ];

    protected $fillable = [
        'id',
        'date_time',
        'device_id',
        'device_name',
        'device_unique_code',
        'device_active_status',
        'client_name',
    ];
}
