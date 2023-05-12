<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CronLog
 * 
 * @property int $id
 * @property string $name
 * @property string $log
 * @property string $is_error
 * @property int $rssh_connection_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property RsshConnection $rssh_connection
 *
 * @package App\Models
 */
class CronLog extends Model
{
	protected $table = 'cron_logs';

	protected $casts = [
		'rssh_connection_id' => 'int'
	];

	protected $fillable = [
		'name',
		'log',
		'is_error',
		'rssh_connection_id'
	];

	public function rssh_connection()
	{
		return $this->belongsTo(RsshConnection::class);
	}
}
