<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\BackEndModel;
use App\Models\ApiModel;

class MainDealerModel extends Model
{
    use SoftDeletes;

    protected $table = 'main_dealers';
    protected $dateFormat = "Y-m-d H:i:s";
    protected $fillable = [
        'name',
        'is_active'
    ];

    protected $hidden = ['deleted_at'];

    public function back_ends()
    {
        return $this->hasMany(BackEndModel::class, 'main_dealer_id', 'id');
    }

    public function apis()
    {
        return $this->hasMany(ApiModel::class, 'main_dealer_id', 'id');
    }
}
