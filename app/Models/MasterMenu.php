<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterMenu extends Model
{
    protected $table='master_all_menu';

    protected $fillable = [
        'kode_katering',
        'hari',
        'menu_utama',
        'menu_add_on',
        'harga_add_on',
    ];

    public function setHariAttribute($value)
    {
        $this->attributes['hari'] = json_encode($value);
    }

    public function getHariAttribute($value)
    {
        return $this->attributes['hari'] = json_decode($value);
    }
    
    protected $casts = [
        'hari' => 'json',
    ];

    /*
    protected $table='test';
    protected $fillable = [
        'list',
    ];
    */
}
