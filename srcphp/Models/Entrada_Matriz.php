<?php
    namespace proyecto\Models;

use PDO;
use function json_encode;
use proyecto\Models\Table;
use proyecto\Response\Success;


class entrada_matriz extends Models
{
    protected $filleable = [
      
        "detalle_orden_compra",
        "producto",
        "cantidad",
        "fecha",
    ];

    public $detalle_orden_compra = "";
    public $fecha = "";
    public $producto = "";
    public $cantidad = "";
     

    protected $table = "entrada_matriz";

    public function EntMat(){
        $mat = Table::query("select * from " .$this->table);
        $matri = new Success ($mat);
        $matri->Send();
        return matri;
      try{
            $pdo = new PDO('mysql:host=localhost;dbname=lagupan', 'Angel', 'Angel');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Error al conectar a la base de datos: ' . $e->getMessage();
  }
 }
}