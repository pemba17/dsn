<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class OrderComment extends Model
{
    use HasFactory;
    protected $fillable=['user_id','comment','order_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
