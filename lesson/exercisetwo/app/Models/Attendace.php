<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendace extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "posts";
    protected $fillable = [
        "classdate",
        "post_id",
        "attcode",
        "user_id"
    ];

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }



}
