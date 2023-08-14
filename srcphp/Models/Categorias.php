<?php
    namespace proyecto\Models;


    use PDO;
    use function json_encode;
    use proyecto\Models\Table;
    use proyecto\Response\Success;
    /**
     * Class categorias
     */

    class Categorias extends Models
    {
        /**
         * @var array
         */
        protected $filleable = [
            "id",
             "categoria",
            ];
            public $id = "";
            public $categoria = "";
            
            protected $table = "categorias";


        public function cate (){
        $cate = Table::query("select * from " .$this->table);
        $cates = new Success ($cate);
        $cates->Send();
    }  

    }
