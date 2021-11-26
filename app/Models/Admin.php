<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Http\Controllers\AdminLoginController;
class Admin extends Authenticatable
{
    use HasFactory, Notifiable ;
protected $guard = 'admin';

protected $fillable = [
    
    'name','email','password','image','phone','role_id','status',
];
protected $hidden=[
'password',
];
}
