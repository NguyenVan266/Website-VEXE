<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';
    public $timestamps = True;
    protected $fillable = [
        'name','display_name',
    ];
    public function permissions()
    {
        return $this->belongsToMany(Permissions::class,'permission_role','role_id','permission_id');
    }
}
