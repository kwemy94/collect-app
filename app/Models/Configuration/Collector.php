<?php

namespace App\Models\Configuration;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collector extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'phone',
        'email',
        'cni',
        'date_of_issue',
        'delivered_in'
    ];

    public function sectors() {
        
        return $this->hasMany(Sector::class);
    }


    public function operations() {
        
        return $this->hasMany(Operation::class);
    }

    public function clients() {
        
        return $this->hasMany(Clients::class);
    }
}
