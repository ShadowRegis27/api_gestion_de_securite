<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Incident;
use Illuminate\Support\Facades\Auth;
use App\Models\PrioriteIncident;
use App\Models\StatuIncident;
use App\Http\Controllers\Api\StatutIncidentController;
use App\Http\Controllers\Api\pIncident;


class IncidentController extends Controller
{
    public function index()
    {
        $incident=  Incident::all();
        return response()->json([
            'incidents'=> $incident,
            'status'=>200
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // API Fonction d'ajout d'un incident
        $request->validate([
            "description_Incident"=>"required",
            "id_Statut_Incident"=>"required",
            "id_Priorite_Incident"=>"required",
            "id_Utilisateur"=>"required"
        ]);
        $incident = new Incident();
        $incident->description_Incident = $request->description_Incident;
        $incident->id_Statut_Incident = $request->id_Statut_Incident;
        $incident->id_Priorite_Incident = $request->id_Priorite_Incident;
        $incident->id_Utilisateur = $request->id_Utilisateur;
        $incident->save();
        return response()->json([
            "statut"=>1,
            "message"=>"Incident enregistré"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // API Recuperer et afficher une instance de l'incident
        $incident = Incident::where("id_Incident",$id)->get();

        if($incident){
            return response()->json([
                "statu"=>1,
                "message"=>"Incident trouvée",
                "data"=> $incident
            ],200,);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // API Fonction de modification d'un incident
        $incident = Incident::where("id_Incident",$id)->first();
        if($incident){
            $incident->description_Incident = $request->description_Incident;
            $incident->id_Statut_Incident = $request->id_Statut_Incident;
            $incident->id_Priorite_Incident = $request->id_Priorite_Incident;
            $incident->id_Utilisateur = $request->id_Utilisateur;
            $incident->save();
            return response()->json([
                "statut"=>1,
                "message"=>"Incident modifié",
                "data"=> $incident
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // API Fonction de suppression d'un incident
        $incident = Incident::where("id_Incident",$id)->first();
        if($incident){
            $incident->delete();
            return response()->json([
                "statut"=>1,
                "message"=>"Incident supprimé",
                "data"=> $incident
            ], 200);
        }
    }
}
