<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\role_utilisateur;
use Laravel\Sanctum\HasApiTokens;

class Utilisateur extends Model
{
    use HasFactory,HasApiTokens;
    public function role_utilisateur()
    {
        return $this->belongsTo(RoleUtilisateur::class);
    }
    protected $table = "utilisateurs";
    protected $primaryKey="id_Utilisateur";
    protected $fillable = ['name','email','password','id_Role_Utilisateur'];
}
