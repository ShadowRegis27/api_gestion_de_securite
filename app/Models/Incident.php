<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Models\StatuIncident;
use App\Models\PrioriteIncident;

class Incident extends Model
{
    use HasFactory,HasApiTokens;
    protected $table = "incidents";
    protected $primaryKey="id_Incident";
    protected $fillable = ['description_Incident','id_Statut_Incident','id_Priorite_Incident','id_Utilisateur'];
    public function statutincident()
    {
        return $this->belongsTo(StatuIncident::class);
    }
    public function prioriteincident()
    {
        return $this->belongsTo(PrioriteIncident::class);
    }

}
