<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DeviceView
 *
 * @property int $id
 * @property string $name
 * @property string $unique_code
 * @property string|null $description
 * @property string $active_status
 * @property Carbon|null $created_at
 * @property int $client_id
 * @property string $client_name
 */
class DeviceView extends Model
{
    public $incrementing = false;

    public $timestamps = false;

    protected $table = 'device_view';

    protected $casts = [
        'id' => 'int',
        'client_id' => 'int',
        'created_at' => 'datetime',
    ];

    protected $fillable = [
        'id',
        'name',
        'unique_code',
        'description',
        'active_status',
        'client_id',
        'client_name',
    ];
}
