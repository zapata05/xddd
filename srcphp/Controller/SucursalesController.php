<?php

namespace proyecto\Controller;

use proyecto\Models\Table;
use proyecto\Models\Sucursales;
use proyecto\Response\Failure;
use proyecto\Response\Success;

class SucursalesController
{
    
    function Insertarsucur() {
        try{
            $JSONData = file_get_contents("php://input");
            $dataObject = json_decode($JSONData);
            
            $sucu = new Sucursal();
            $sucu->id =$dataObject->id;
            $sucu->nombre =$dataObject->nombre;
            $sucu->direccion =$dataObject->direccion;
            $sucu->telefono =$dataObject->telefono;
            $sucu->save();
            
            $s = new Succes($sucu);
            return $s->Send();
        } catch(\Exception $e) {
            $s = new Failure(401,$e->getMessage());
        }
    }
}