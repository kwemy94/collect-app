<?php

namespace App\Models\Configuration;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'type',
        'amount',
        'operation_date'
    ];

    public function collector() {
        
        return $this->belongsTo(collector::class);
    }

    public function accounts() {

        return $this->hasMany(Account::class);
    }
}
