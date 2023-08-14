<?php

    namespace proyecto\Models;


    use PDO;
    use function json_encode;
    use proyecto\Models\Table;
    use proyecto\Response\Success;
    /**
     * Class empleados
     */

    class empleados extends Models
    {
        /**
         * @var array
         */
        protected $filleable = [
            "nombre",
             "apellido_paterno",
              "apellido_materno",
              "direccion",
              "correo",
              "telefono"
            ];
            public $nombre = "";
            public $apellido_paterno = "";
            public $apellido_materno = "";
            public $direccion = "";
            public $correo = "";
            public $telefono = "";
            
            
            protected $table = "empleados";


        public function emplead (){
        $emplead = Table::query("select * from " .$this->table);
        $empleads = new Success ($emplead);
        $empleads->Send();
    }  

    }

