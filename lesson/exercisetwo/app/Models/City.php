<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "cities";
    protected $fillable = [
        'name',
        'slug',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
