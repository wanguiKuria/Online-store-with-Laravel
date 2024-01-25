<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    use HasFactory;
    protected $table="users";
    protected $primary_key="id";
    protected $fillable=['surname','other_names','username','gender','phone','email','password','otp','role_id','town_id'];

    //Juma ,customer
    public function role(){
        $this->belongsTo(Role::class);
    }

}
