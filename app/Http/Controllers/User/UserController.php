<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Str;

class UserController extends Controller
{

    public function index($id = null){

        if(!$id){

            $users = User::all();
            return response()->json([
                "status" => "Ok",
                "usuarios" => $users
            ],200);
        }
        
        $user = User::find($id);

        return (!$user) ? 
        response()->json(["status" => "Info","message" => "Usuário não encontrado..."],404) :
        response()->json(["status" => "Ok","usuario" => $user],200);
    }

    public function storage(Request $request){

        $validator = Validator::make($request->all(), [
            "nome" => "required|string",
            "e_mail" => "required|string",
            "password" => "required|string",
        ]);

        if($validator->fails()){

            return response()->json(["status"=> "error_validate", "message" => $validator->errors()], 400);
        }

        if(Str::length($request["password"]) != "8")
            return response()->json([
                "status" => "Info",
                "message" => "A senha deve ter até 8 caracteres..."
            ],200);

        if(count(User::where("e_mail", $request["e_mail"])->get()) > 0)
            return response()->json([
                "status" => "Info",
                "message" => "e_mail já registrado..."
            ],200);


        try {

            $senha_hash = password_hash($request["password"],PASSWORD_DEFAULT);

            $newUser = User::create(array_merge($validator->validated(),
            [
                "senha" => $senha_hash,
                "data_de_nascimento" =>$request->data_de_nascimento??null
            ]));

            return response()->json([
                "status" => "Ok",
                "message" => "Usuário registrado com sucesso!...",
                "usuario" => $newUser
            ],201);

        } catch (\Throwable $th) {
            
            return response()->json([
                "status" => "error",
                "message" => "Houve um erro inisperado. Tente mais tarde...",
            ],400);
        }
    }

    public function edit($id,Request $request){ 

        $validator = Validator::make($request->all(), [
            "nome" => "string",
            "e_mail" => "string",
        ]);

        if($validator->fails()){

            return response()->json(["status"=> "error_validate", "message" => $validator->errors()], 400);
        }

        $user = User::find($id);

        if(!$user)
            return response()->json([
                "status" => "Info",
                "message" => "Usuário não encontrado..."
            ],404);
        
        //e_mail Verify
        if((isset($request["e_mail"])) && (!empty($request["e_mail"])))
            $check_email = User::where("e_mail",$request["e_mail"])->get();
            if((isset($check_email[0])) && ($check_email[0]->id != $user->id)){
                return response()->json([
                    "status" => "Info",
                    "message" => "e_mail já registrado..."
                ],200);
            }
                
        try {

            //Password Hash
            if((isset($request["password"])) && (!empty($request["password"]))){
                if(Str::length($request["password"]) != "8")
                    return response()->json([
                        "status" => "Info",
                        "message" => "A senha deve ter até 8 caracteres..."
                    ],200);

                $senha_hash = password_hash($request["password"],PASSWORD_DEFAULT);
                $user->update(array_merge($validator->validated(),
                [
                    "senha" => $senha_hash,
                    "data_de_nascimento" => $request->data_de_nascimento
                ]));
            }
            else{

                $user->update($request->all());
            }

            return response()->json([
                "status" => "Ok",
                "message" => "Dados do Usuário editados com sucesso!..."
            ],200);

        } catch (\Throwable $th) {
           
            return response()->json([
                "status" => "error",
                "message" => $th,
            ],400);
        }           
    }

    public function delete($id)
    {
        $user = User::find($id);

        if(!$user){
            return response()->json([
                "status" => "Info",
                "message" => "Usuário não encontrado..."
            ],404);
        }
        else{

            try {

                $user->delete();
                return response()->json([
                    "status" => "Ok",
                    "message" => "Usuário eliminado com sucesso!..."
                ],200);

            } catch (\Throwable $th) {
                
                return response()->json([
                    "status" => "error",
                    "message" => "Houve um erro inisperado. Tente mais tarde...",
                ],400);
            }
        }
    }
}
