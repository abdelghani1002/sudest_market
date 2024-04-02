<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerRequest extends Model
{
    protected $fillable = ['user_id', 'status'];

    use HasFactory;

    public function customer() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
