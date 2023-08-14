<?php
    namespace proyecto\Models;

use PDO;
use function json_encode;
use proyecto\Models\Table;
use proyecto\Response\Success;


class orden_compra extends Models
{
    protected $filleable = [
        "id",
        "fecha",
        "proveedor",
        
    
    ];
    public $id = "";
    public $fecha = "";
    public $proveedor = "";
     

    protected $table = "orden_compra";

    public function order(){
        $order = Table::query("select * from " .$this->table);
        $orders = new Success ($order);
        $orders->Send();
    }

}