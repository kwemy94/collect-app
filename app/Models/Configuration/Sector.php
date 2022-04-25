<?php

namespace App\Models\Configuration;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'locality'
    ];

    public function collectors() {
        
        return $this->belongsToMany(Collector::class);
    }

    public function clients() {
        
        return $this->hasMany(Client::class);
    }
}
