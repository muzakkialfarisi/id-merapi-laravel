<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use SoftDeletes;

    protected $table = 'user_roles';
    protected $dateFormat = "Y-m-d H:i:s";
    protected $fillable = [
        'name'
    ];

    protected $hidden = ['deleted_at'];
}
