<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterItem extends Model
{
    use HasFactory;
    protected $table='master_item';
    protected $fillable = [
        'menu_id',
        'item_desc',
    ];

    public function data()
    {
        return $this->hasOne(MasterData::class);
    }

}
