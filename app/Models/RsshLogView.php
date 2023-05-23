<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RsshLogView
 * 
 * @property int $id
 * @property string $log
 * @property string $is_error
 * @property Carbon|null $created_at
 * @property int $rssh_connection_id
 * @property string $rssh_connection_server_port
 * @property string $device_name
 * @property string $device_unique_code
 * @property string $device_active_status
 * @property string $client_name
 *
 * @package App\Models
 */
class RsshLogView extends Model
{
	protected $table = 'rssh_log_view';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'rssh_connection_id' => 'int'
	];

	protected $fillable = [
		'id',
		'log',
		'is_error',
		'rssh_connection_id',
		'rssh_connection_server_port',
		'device_name',
		'device_unique_code',
		'device_active_status',
		'client_name'
	];
}
