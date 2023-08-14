<?php

namespace proyecto\Models;

use PDO;
use function json_encode;
use proyecto\Models\Table;
use proyecto\Response\Success;


class detalle_orden_compra extends Models
{
    public $orden_compra = "";
    public $producto = "";
    public $cantidad = "";
    public $precio_compra = "";
     

    protected $filleable = [
        "orden_compra",
        "producto",
        "cantidad",
        "precio_compra",    
    ];

    protected $table = "detalle_orden_compra";

    public function dorden() {
        $dorden = Table::query("select * from " .$this->table);
        $dordens = new Success ($dorden);
        $dordens->Send();
    }

}