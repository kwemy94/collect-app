<?php

namespace App\Models\Configuration;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'period',
        'rate'
    ];

    public function account() {
        
        return $this->belongsTo(Account::class);
    }
}
