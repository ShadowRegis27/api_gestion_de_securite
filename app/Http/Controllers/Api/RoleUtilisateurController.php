<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoleUtilisateur;
use App\Http\Controllers\Api\RoleUtilisateurController;

class RoleUtilisateurController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return RoleUtilisateur::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // API Fonction d'ajout d'un role d'utilisateur
        $request->validate([
            "nom_Role_Utilisateur"=>"required"
        ]);
        $roleUtilisateur = new RoleUtilisateur();
        $roleUtilisateur->nom_Role_Utilisateur = $request->nom_Role_Utilisateur;
        $roleUtilisateur->save();
        return response()->json([
            "statut"=>1,
            "message"=>"Role d'utilisateur enregistré"
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // API Fonction d'affichage d'un role d'utilisateur
        $roleUtilisateur = RoleUtilisateur::where("id_Role_Utilisateur", $id)->get();
        if($roleUtilisateur){
            return response()->json([
                "statut"=> 1,
                "message"=> "Role d'utilisateur trouvé",
                "data"=> $roleUtilisateur
            ], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // API Fonction de modification d'un role d'utilisateur
        $roleUtilisateur = RoleUtilisateur::where("id_Role_Utilisateur", $id)->first();
        if($roleUtilisateur){
            $roleUtilisateur->nom_Role_Utilisateur = $request->nom_Role_Utilisateur;
            $roleUtilisateur->save();
            return response()->json([
                "statut"=> 1,
                "message"=> "Role d'utilisateur modifié"
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // API Fonction de suppression d'un role d'utilisateur
        $roleUtilisateur = RoleUtilisateur::where("id_Role_Utilisateur", $id)->first();
        if($roleUtilisateur){
            $roleUtilisateur->delete();
            return response()->json([
                "statut"=> 1,
                "message"=> "Role d'utilisateur supprimé"
            ], 200);
        }
    }
}
