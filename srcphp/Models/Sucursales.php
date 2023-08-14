<?php
    namespace proyecto\Models;


    use PDO;
    use function json_encode;
    use proyecto\Models\Table;
    use proyecto\Response\Success;
    /**
     * Class Sucursales
     */

    class Sucursales extends Models
    {
        /**
         * @var array
         */
        protected $filleable = [
            "id",
             "nombre",
             "direccion",
             "telefono",
            ];
            public $id = "";
            public $nombre = "";
            public $direccion = "";
            public $telefono = "";
            
            protected $table = "sucursales";


        public function sucu (){
        $sucu = Table::query("select * from " .$this->table);
        $sucus = new Success ($sucu);
        $sucus->Send();
    }  

    }
