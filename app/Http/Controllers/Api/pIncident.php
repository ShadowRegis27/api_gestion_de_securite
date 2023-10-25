<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrioriteIncident;


class pIncident extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PrioriteIncident::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nom_Priorite_Incident"=>"required",
            "niveau_Priorite_Incident"=>"required"

        ]);
        $prioriteincident = new PrioriteIncident();
        $prioriteincident->nom_Priorite_Incident = $request->nom_Priorite_Incident;
        $prioriteincident->niveau_Priorite_Incident = $request->niveau_Priorite_Incident;
        $prioriteincident->save();
        return response()->json([
            "statut"=>1,
            "message"=>"priorite incident enregistré"
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prioriteincident = PrioriteIncident::where("id_Priorite_Incident",$id)->get();

        if($prioriteincident)
        {
            return response()->json([
                "statu"=>1,
                "message"=>"prioriteincident trouvée",
                "data"=> $prioriteincident
            ],200,);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $prioriteincident = PrioriteIncident::where("id_Priorite_Incident",$id)->first();
        if($prioriteincident)
        {
            $prioriteincident->nom_Priorite_Incident = $request->nom_Priorite_Incident;
            $prioriteincident->niveau_Priorite_Incident = $request->niveau_Priorite_Incident;
            $prioriteincident->save();
            return response()->json([
                "statu"=>1,
                "message"=>"Mise à jour reussi",
                "data"=> $prioriteincident
            ],200,);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prioriteincident = PrioriteIncident::where("id_Priorite_Incident",$id)->first();
        if($prioriteincident)
        {
            $prioriteincident->delete();
            return response()->json([
                "statu"=>1,
                  "message"=>"Suppression réussi",
                  "data"=> $prioriteincident
              ],200,);
        }
        }
    }
