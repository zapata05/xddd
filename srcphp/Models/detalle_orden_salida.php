<?php

namespace proyecto\Models;

use PDO;
use function json_encode;
use proyecto\Models\Table;
use proyecto\Response\Success;


class detalle_orden_salida extends Models
{
    public $orden_salida = "";
    public $producto = "";
    public $sucursal = "";
    public $cantidad = "";
     

    protected $filleable = [
        "orden_salida",
        "producto",
        "sucursal", 
        "cantidad",   
    ];

    protected $table = "detalle_orden_salida";

    public function deorden() {
        $deorden = Table::query("select * from " .$this->table);
        $deordens = new Success ($deorden);
        $deordens->Send();
    }

}