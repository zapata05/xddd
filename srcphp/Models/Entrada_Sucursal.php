<?php

namespace proyecto\Models;

use PDO;
use function json_decode;
use proyecto\Models\Table;
use proyecto\Response\Success;

class entrada_sucursal extends Models 
{
    public $id = "";
    public $detalle_orden_salida = "";
    public $producto = "";
    public $cantidad = "";
    public $sucursal = "";
    public $fecha = "";
    
    protected $filleable = [
        "id",
        "detalle_orden_compra",
        "producto",
        "cantidad",
        "fecha",
    ];

    protected $table = "entrada_sucursal";


    public function entradasu(){
        $entradasu = Table::query("select * from " .$this->table);
        $entradasus = new Success ($entradasu);
        $entradasus->Send();
        return $entradasus;
         try{
            $pdo = new PDO('mysql:host=localhost;dbname=lagupan', 'Angel', 'Angel');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Error al conectar a la base de datos: ' . $e->getMessage();
  }
    }
}