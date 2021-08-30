<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterUser extends Model
{
    use HasFactory;
    protected $connection = 'pgsql2';
    protected $table = 'master_users';
    protected $guarded = [];

}
