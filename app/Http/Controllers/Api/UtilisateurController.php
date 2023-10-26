<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Utilisateur;
use App\Models\RoleUtilisateur;
use App\Http\Controllers\Api\RoleUtilisateurController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $utilisateur= Utilisateur::where("id_Utilisateur",'!=' ,$id)->get();;
        return response()->json([
            'utilisateur'=> $utilisateur,
            'status'=>200,
            'id_courant'=>$id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $utilisateur = new Utilisateur();

            $utilisateur->id_Role_Utilisateur = 1;
            $utilisateur->name = $request->name;
            $utilisateur->email = $request->email;
            $utilisateur->password = Hash::make($request->password);
            $utilisateur->save();
            return response()->json([
                "status"=>200,
                "message"=>"Utilisateur enregistré"
            ]);
    }

    public function create(Request $request)
    {
        $utilisateur = new Utilisateur();

        $utilisateur->id_Role_Utilisateur = $request->id_Role_Utilisateur;
        $utilisateur->name = $request->name;
        $utilisateur->email = $request->email;
        $utilisateur->password = Hash::make($request->password);
        $utilisateur->save();
        return response()->json([
            "status"=>200,
            "message"=>"Utilisateur enregistré"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $utilisateur = Utilisateur::where("id_Utilisateur", $id)->get();
        if($utilisateur)
        {
                return response()->json([
                    "status"=>1,
                    "Utilisateur"=>$utilisateur
                ], 200);

        }

    }

    public function gardien()
    {
        $utilisateur = Utilisateur::where('id_Role_Utilisateur',2)->get();
        if($utilisateur)
        {
                return response()->json([
                    "utilisateurs"=>$utilisateur,
                    "status"=>200

                ]);

        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $utilisateur = Utilisateur::where("id_Utilisateur", $request->id_Role_Utilisateur)->first();;
    //$roleutilisateur = RoleUtilisateur::where("id_Role_Utilisateur", $request->id_Role_Utilisateur)->first();
        if($utilisateur)
        {

            $utilisateur->id_Role_Utilisateur = $request->id_Role_Utilisateur;
            $utilisateur->nom = $request->nom;
            $utilisateur->prenom = $request->prenom;
            $utilisateur->email = $request->email;
            $utilisateur->password = $request->password;
            $utilisateur->save();
            return response()->json([
                "statut"=>1,
                "message"=>"Utilisateur enregistré"
            ], 200);
        }
        else
        {

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $utilisateur = Utilisateur::where("id_Utilisateur", $id)->first();
        if($utilisateur){
            $utilisateur->delete();
            return response()->json(
                [
                    "status"=>200,
                "message"=>"Utilisateur a été supprimer"
                ]
            );
        }
    }

    public function login(Request $request)
    {

        $utilisateur = Utilisateur::where('email','=',$request->email)->first();
        if($utilisateur)
        {
            if(Hash::check($request->password, $utilisateur->password))
            {
                //Création d'un jeton token
                $token = $utilisateur->createToken('auth_token')->plainTextToken;
                return response()->json([
                    'status'=>200,
                    'message'=>"Connection success",
                    'id_u'=>$utilisateur->id_Utilisateur,
                    'nom'=>$utilisateur->name,
                    'access_token'=>$token
                ],200)->cookie('jwt',$token);
            }
            else
            {
                return response()->json([
                    'status'=>0,
                    'message'=> "Email ou Mot de passe Incorrect"
                ]);
            }
        }
        else
        {
            return response()->json([
                'status'=>0,
                'message'=>"l'utilisateur n'existe pas/ introuvable"
            ],404);
        }
    }

    public function logout(Request $request)
    {
        Auth::user()->tokens()->delete();
        return response()->json([
            "status"=>200,
            "message"=>"Deconnexion réussie"
        ]);
    }
    public function etu()
    {
        $utilisateur = Utilisateur::where('id_Role_Utilisateur',3)->get();
        if($utilisateur)
        {
                return response()->json([
                    "utilisateurs"=>$utilisateur,
                    "status"=>200

                ]);

        }
    }
}


