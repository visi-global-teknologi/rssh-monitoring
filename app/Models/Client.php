<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Client
 *
 * @property int $id
 * @property string $name
 * @property string $active_status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Collection|Device[] $devices
 */
class Client extends Model
{
    protected $table = 'clients';

    protected $fillable = [
        'name',
        'active_status',
    ];

    public function devices()
    {
        return $this->hasMany(Device::class);
    }
}
