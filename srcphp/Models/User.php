<?php

namespace proyecto\Models;


use PDO;
use proyecto\Auth;
use proyecto\Response\Failure;
use proyecto\Response\Response;
use proyecto\Response\Success;
use function json_encode;

class User extends Models
{

    public $nombre = "";
    public $apellidoMa = "";
    public $apellidoPa = "";
    public $correo = "";
    public $telefono = "";
    public $contrasena = "";

    public $id = "";

    /**
     * @var array
     */
    protected $filleable = [
        "nombre",
        "apellidoMa",
        "apellidoPa",
        "correo",
        "telefono",
        "contrasena",
    ];
    protected  $table = "empleados";

    public function emp (){
        try {
         $emp = Table::query("select * from " .$this->table);
        $empl = new Success ($emp);
        $empl->Send();
        return $empl;
        }catch (\Exception $e) {
            $errorResponse = ['message' => "Error en el servidor: " . $e->getMessage()];
            header('Content-Type: application/json');
            echo json_encode($errorResponse);
            http_response_code(500);
        }
    }
    public static function auth($correo, $contrasena):Response
    {
        $class = get_called_class();
        $c = new $class();
        $stmt = self::$pdo->prepare("select *  from $c->table  where  correo =:correo  and contrasena=:contrasena");
        $stmt->bindParam(":correo", $correo);
        $stmt->bindParam(":contrasena", $contrasena);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_CLASS,User::class);

        if ($resultados) {
//            Auth::setUser($resultados[0]);  pendiente
            $r=new Success(["correo"=>$resultados[0],"_token"=>Auth::generateToken([$resultados[0]->id])]);
           return  $r->Send();
        }
        $r=new Failure(401,"correo o contraseña incorrectos");
        return $r->Send();

    }

    public function find_name($name)
    {
        $stmt = self::$pdo->prepare("select *  from $this->table  where  nombre=:name");
        $stmt->bindParam(":name", $name);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
        if ($resultados == null) {
            return json_encode([]);
        }
        return json_encode($resultados[0]);
    }

    public  function reportecitas(){
        $JSONData = file_get_contents("php://input");
        $dataObject = json_decode($JSONData);

        $name=$dataObject->name;
        $d=Table::query("select * from users  where name='".$name."'");
        $r=new Success($d);

    }

}
