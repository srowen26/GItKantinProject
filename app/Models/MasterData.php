<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterData extends Model
{
    use HasFactory;
    protected $table='master_data';
    protected $fillable = [
        'listmenu',
    ];

    public function user()
    {
        return $this->belongsTo(MasterItem::class);
    }

}
