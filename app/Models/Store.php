<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $fillable = ['status'];

    /*
    * return a belo,gs to relationship
    */
    public function seller(){
        return $this->belongsTo(User::class);
    }
}
