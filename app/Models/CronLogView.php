<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CronLogView
 *
 * @property int $id
 * @property string $log
 * @property string $is_error
 * @property string $file_name
 * @property Carbon|null $created_at
 * @property int $rssh_connection_id
 * @property string $rssh_connection_server_port
 * @property string $device_name
 * @property string $device_unique_code
 * @property string $device_active_status
 * @property string $client_name
 */
class CronLogView extends Model
{
    public $incrementing = false;

    protected $table = 'cron_log_view';

    protected $casts = [
        'id' => 'int',
        'rssh_connection_id' => 'int',
        'created_at' => 'datetime',
    ];

    protected $fillable = [
        'id',
        'log',
        'is_error',
        'file_name',
        'rssh_connection_id',
        'rssh_connection_server_port',
        'device_name',
        'device_unique_code',
        'device_active_status',
        'client_name',
    ];
}
