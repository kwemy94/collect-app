<?php

namespace App\Models\Configuration;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'account_title',
        'account_balance'
    ];

    
    public function client() {
        
        return $this->hasOne(Client::class);
    }

    public function commissions() {

        return $this->hasMany(Commission::class);
    }

    public function operation() {

        return $this->belongsTo(Operation::class);
    }
}
