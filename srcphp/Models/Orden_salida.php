<?php

namespace proyecto\Models;

use PDO;
use function json_encode;
use proyecto\Models\Table;
use proyecto\Response\Success;


class orden_salida extends Models
{
    public $id = "";
    public $sucursales = "";
    public $fecha = "";
     

    protected $filleable = [
        "id",
        "sucursal",
        "fecha",
        
    
    ];

    protected $table = "Orden_salida";

    public function orden(){
        $orden = Table::query("select * from " .$this->table);
        $ordens = new Success ($orden);
        $ordens->Send();
    }

}