<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\MainDealerModel;

class BackEndModel extends Model
{
    use SoftDeletes;

    protected $table = 'back_ends';
    protected $dateFormat = "Y-m-d H:i:s";
    protected $fillable = [
        'main_dealer_id',
        'base_url',
        'name',
        'is_active'
    ];

    protected $hidden = ['deleted_at'];

    public function main_dealer()
    {
        return $this->hasOne(MainDealerModel::class, 'id', 'main_dealer_id');
    }

    public function apis()
    {
        return $this->hasMany(ApiModel::class, 'back_end_id', 'id');
    }
}
