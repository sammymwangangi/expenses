<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','category_id', 'amount', 'from', 'to'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }
}
