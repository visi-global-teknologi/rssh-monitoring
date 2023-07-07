<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RsshConnection
 *
 * @property int $id
 * @property string $server_port
 * @property int $device_id
 * @property int $connection_status_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property ConnectionStatus $connection_status
 * @property Device $device
 * @property Collection|CronLog[] $cron_logs
 * @property Collection|RsshLog[] $rssh_logs
 */
class RsshConnection extends Model
{
    protected $table = 'rssh_connections';

    protected $casts = [
        'device_id' => 'int',
        'connection_status_id' => 'int',
    ];

    protected $fillable = [
        'server_port',
        'device_id',
        'connection_status_id',
    ];

    public function connection_status()
    {
        return $this->belongsTo(ConnectionStatus::class);
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function cron_logs()
    {
        return $this->hasMany(CronLog::class);
    }

    public function rssh_logs()
    {
        return $this->hasMany(RsshLog::class);
    }
}
