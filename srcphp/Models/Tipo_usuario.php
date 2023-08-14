<?php
    namespace proyecto\Models;


    use PDO;
    use function json_encode;
    use proyecto\Models\Table;
    use proyecto\Response\Success;
    /**
     * Class Sucursales
     */

    class Tipo_usuario extends Models
    {
        /**
         * @var array
         */
        protected $filleable = [
            "id",
             "nivel",
            ];
            public $id = "";
            public $nivel = "";
            
            protected $table = "tipo_usuario";


        public function user(){
        $user = Table::query("select * from " .$this->table);
        $users = new Success ($user);
        $users->Send();
    }  

    }
