<?php

namespace App\Models\Configuration;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Configuration\Sector;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'surname',
        'sexe',
        'cni',
        'date_of_issue',
        'delivered_in'
    ];

    public function collector() {
        
        return $this->belongsTo(Collector::class);
    }

    public function sector() {
        
        return $this->belongsTo(Sector::class);
    }

    public function account() {
        
        return $this->belongsTo(Account::class);
    }
}
