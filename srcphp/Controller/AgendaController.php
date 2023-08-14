<?php

namespace proyecto\Controller;

use proyecto\Models\Table;
use proyecto\Models\Empleados;
use proyecto\Response\Failure;
use proyecto\Response\Success;

class ProductosController
{
    //private $conexion;

   public function construct($conexion)
   {
    $this->conexion = $conexion;
    }

    public function Insertaremplead()
    {
        
        try {
            $JSONData = file_get_contents("php://input");
            $dataObject = json_decode($JSONData);

            $prod = new Productos();
            $prod->id = $dataObject->id;
            $prod->producto = $dataObject->producto;
            $prod->categoria = $dataObject->categoria;
            $prod->existencias = $dataObject->existencias;
            $prod->save();

            $s = new Success($prod);
            return $s->Send();
        } catch (\Exception $e) {
            $s = new Failure(401, $e->getMessage());
            return $s->Send();
        }
    }

    public function actualizarEmplead()
    {

        try {
            $JSONData = file_get_contents("php://input");
            $dataObject = json_decode($JSONData);
    
            // Checking if id is provided
            if (!property_exists($dataObject, 'id')) {
                throw new \Exception("Debe proporcionar el ID del producto para actualizar");
            }
    
            $id = $dataObject->id;
    
            $sql = "UPDATE productos SET ";
            $values = [];

            if (property_exists($dataObject, 'producto')) {
                $sql .= "producto = :producto, ";
                $values[':producto'] = $dataObject->producto;
            }
            if (property_exists($dataObject, 'categoria')) {
                $sql .= "categoria = :categoria, ";
                $values[':categoria'] = $dataObject->categoria;
            }
            if (property_exists($dataObject, 'existencias')) {
                $sql .= "existencias = :existencias, ";
                $values[':existencias'] = $dataObject->existencias;
            }
    
            // Remove trailing comma and add WHERE clause
            $sql = rtrim($sql, ', ') . " WHERE id = :id";
            $values[':id'] = $id;
    
            $stmt = $this->conexion->getPDO()->prepare($sql);
            $stmt->execute($values);
    
            $rowsAffected = $stmt->rowCount();
    
            if ($rowsAffected === 0) {
                throw new \Exception("No se encontró el producto con el ID proporcionado");
            }
    
            header('Content-Type: application/json');
            echo json_encode(['message' => 'Producto actualizado exitosamente.']);
            http_response_code(200);
    
        } catch (\Exception $e) {
            $errorResponse = ['message' => "Error en el servidor: " . $e->getMessage()];
            header('Content-Type: application/json');
            echo json_encode($errorResponse);
            http_response_code(500);
        }
    }
}