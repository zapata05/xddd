<?php
    namespace proyecto\Models;


    use PDO;
    use function json_encode;
    use proyecto\Models\Table;
    use proyecto\Response\Success;
    /**
     * Class proveedores
     */

    class proveedores extends Models
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
            
            protected $table = "proveedores";


        public function prov (){
        $prov = Table::query("select * from " .$this->table);
        $provs = new Success ($prov);
        $provs->Send();
    }  

    }
