<?php

namespace proyecto\Models;

use PDO;
use function json_encode;
use proyecto\Models\Table;
use proyecto\Response\Success;

class Productos extends Models
{
    public $id = "";
    public $producto = "";
    public $categoria = "";
    public $existencias = ""; 

    protected $filleable = [
        "id",
        "producto",
        "categoria",
        "existencias",
    ];

    protected $table = "productos";

    public function prod (){
        try {
         $prod = Table::query("select * from " .$this->table);
        $prods = new Success ($prod);
        $prods->Send();
        return $prods;

        $r = new Success($prods);
        return $r->Send();
    }catch (\Exception $e){
        $r = new Failure(401, $e->getMessage());
        return $r->Send();
    }
        // Ruta para obtener los datos de los productos
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['endpoint']) && $_GET['endpoint'] === 'productos') {
            $query = 'SELECT * FROM productos';
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Devolver los datos de los productos en formato JSON
            header('Content-Type: application/json');
            echo json_encode($productos);
            exit;
        }
    }
     function produ (){
        try {
            $JSONData = file_get_contents("php://input");
            $dataObject = json_decode($JSONData);

            $resultados = Table::query("SELECT * FROM view_productos_categorias");

            $r = new Success($resultados);
            return $r->Send();
        }catch (\Exception $e){
            $r = new Failure(401, $e->getMessage());
            return $r->Send();
        }
   }
};

//$JSONData = file_get_contents("php://input");
//$dataObject = json_decode($JSONData);

//$resultados = Table::query("SELECT * FROM view_productos_categorias");
