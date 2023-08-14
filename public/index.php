<?php

namespace proyecto;
require("../vendor/autoload.php");

use proyecto\Controller\ProductosController;
use proyecto\Controller\UserController;
use proyecto\Models\User;
use proyecto\Response\Failure;
use proyecto\Response\Success;
use proyecto\Models\Empleados;
use proyecto\Models\Productos;
use proyecto\Models\entrada_matriz;
use proyecto\Models\entrada_sucursal;
use proyecto\Models\detalle_orden_compra;
use proyecto\Models\detalle_orden_salida;
use proyecto\Models\orden_compra;
use proyecto\Models\orden_salida;
use proyecto\Models\Categorias;
use proyecto\Models\Sucursales;
use proyecto\Models\Proveedores;
use proyecto\Models\Tipo_usuario;

Router::post('/login',[UserController::class,"login"]);
Router::post('/productosi',[ProductosController::class,"Insertarprod"]);
Router::post('/usuarioi',[User::class,'auth']);
Router::put('/productosa',[ProductosController::class,"actualizarProd"]);
Router::post('/sucursales',[SucursalesController::class,"Insertarsucur"]);
Router::get('/sumatriz',[entrada_matriz::class,'EntMat']);
Router::get('/susucursal',[entrada_sucursal::class,'entradasu']);

Router::get('/prueba',[crearPersonaController::class,"prueba"]);
Router::get('/empleados',[empleados::class,'emplead']);
Router::post('/empleados',[empleados::class,'insertemplead']);
Router::get('/categorias',[categorias::class,'cate']);
Router::get('/sucursales',[sucursales::class,'sucu']);
Router::get('/productos',[productos::class,'prod']);
Router::get('/productosv',[productos::class,'produ']);
Router::get('/proveedores',[proveedores::class,'prov']); 
Router::get('/orden_compra',[orden_compra::class,'order']);
Router::get('/detalle_orden_compra',[detalle_orden_compra::class,'dorden']);
Router::get('/detalle_orden_salida',[detalle_orden_salida::class,'deorden']);
Router::get('/orden_salida',[orden_salida::class,'orden']); 
Router::get('/usuario',[User::class,'emp']); 
Router::get('/crearpersona', [crearPersonaController::class, "crearPersona"]);
Router::get('/usuario/buscar/$id', function ($id) {

    $user= User::find($id);
    if(!$user)
    {
        $r= new Failure(404,"no se encontro el usuario");
        return $r->Send();
    }
   $r= new Success($user);
    return $r->Send();


});
Router::get('/respuesta', [crearPersonaController::class, "response"]);
Router::any('/404', '../views/404.php');
