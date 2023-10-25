<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StatuIncident;

class StatutIncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return StatuIncident::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // API Fonction d'ajout d'un statut d'incident
        $request->validate([
            "nom_Statut_Incident"=>"required"
        ]);
        $statuIncident = new StatuIncident();
        $statuIncident->nom_Statut_Incident = $request->nom_Statut_Incident;
        $statuIncident->save();
        return response()->json([
            "statut"=>1,
            "message"=>"Statut d'incident enregistré"
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        // API Fonction d'affichage d'un statut d'incident
        $statuIncident = StatuIncident::where("id_Statut_Incident",$id)->get();

        if($statuIncident)
        {
            return response()->json([
                "statut"=>1,
                "message"=>"Statut d'incident trouvée",
                "data"=> $statuIncident
            ],200,);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // API Fonction de modification d'un statut d'incident
        $statuIncident = StatuIncident::where("id_Statut_Incident",$id)->first();
        if($statuIncident)
        {
            $statuIncident->nom_Statut_Incident = $request->nom_Statut_Incident;
            $statuIncident->save();
            return response()->json([
                "statut"=>1,
                "message"=>"Statut d'incident modifié"
            ],200,);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // API Fonction de suppression d'un statut d'incident
        $statuIncident = StatuIncident::where("id_Statut_Incident",$id)->first();
        if($statuIncident)
        {
            $statuIncident->delete();
            return response()->json([
                "statut"=>1,
                "message"=>"Statut d'incident supprimé"
            ],200,);
        }
    }
}
