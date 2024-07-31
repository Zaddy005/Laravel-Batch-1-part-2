<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Status;

class Student extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "students";
    protected $fillable = [
        "regnumber",
        "firstname",
        "lastname",
        "slug",
        "remark",
        "status_id",
        "user_id"
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function status(){
//        return $this->belongsTo(Status::class);
//        return $this->belongsTo(Status::class)->select("id"); // send single column
        return $this->belongsTo(Status::class)->select(['id','name']); // send multi columns
    }


}
