<?php

namespace proyecto\Controller;
use proyecto\Models\User;
use proyecto\Response\Failure;
use proyecto\Auth;
use proyecto\Response\Success;

class UserController
{

    function registro()
    {
        try{
            $JSONData = file_get_contents("php://input");
            $dataObject = json_decode($JSONData);
            $user = new User();
            $user->nombre = $dataObject->nombre;
            $user->apellidopa = $dataObject->apellido_paterno;
            $user->apellidoma = $dataObject->apellido_materno;
            $user->correo = $dataObject->correo;
            $user->telefono = $dataObject->telefono;
            $user->contrasena = $dataObject->contrasena;
            $user->save();
            $r = new Success($user);



            return $r->Send();
        }catch (\Exception $e){
            $r = new Failure(401,$e->getMessage());
            return $r->Send();
        }



    }
    function login() {
        $JSONData = file_get_contents("php://input");
        $dataObject = json_decode($JSONData);

        $u=new User();

        $u->auth($dataObject->correo, $dataObject->contrasena);
    }


    function buscar(){
        $JSONData = file_get_contents("php://input");
        $dataObject = json_decode($JSONData);
        if(property_exists($dataObject->nombre)){

           $alluser= User::where("nombre","=",$dataObject->nombre);
           if($alluser){
               $r=new Success($alluser);
           }


        }


    }


    function eliminarAllUsers(){
         User::deleteAll();
    }
    function eliminarUsersbyId($id){
         User::delete($id);
    }
}
