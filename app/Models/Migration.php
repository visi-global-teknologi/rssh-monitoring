<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Migration
 *
 * @property int $id
 * @property string $migration
 * @property int $batch
 */
class Migration extends Model
{
    public $timestamps = false;

    protected $table = 'migrations';

    protected $casts = [
        'batch' => 'int',
    ];

    protected $fillable = [
        'migration',
        'batch',
    ];
}
