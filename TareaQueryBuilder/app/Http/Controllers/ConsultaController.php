<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Support\Facades\DB;

class ConsultaController extends Controller
{
    /**
     * Inserta al menos 5 registros en las tablas de usuarios y pedidos.
     */

    public function qb1(){
        DB::table('usuarios')->insert([
            ['nombre' => 'Roberto', 'correo' => 'roberto@test.com', 'telefono' => '1111-1111'],
            ['nombre' => 'Raúl', 'correo' => 'raul@test.com', 'telefono' => '2222-2222'],
            ['nombre' => 'Rosa', 'correo' => 'carla@test.com', 'telefono' => '3333-3333'],
            ['nombre' => 'Rocio', 'correo' => 'ernesto@test.com', 'telefono' => '4444-4444'],
            ['nombre' => 'Raiden', 'correo' => 'miriam@test.com', 'telefono' => '5555-5555'],
        ]);

        Pedido::create(['producto' => 'Tablet', 'cantidad' => 1, 'total' => 300.00, 'id_usuario' => 16]);
        Pedido::create(['producto' => 'Cargador', 'cantidad' => 2, 'total' => 30.00, 'id_usuario' => 17]);
        Pedido::create(['producto' => 'Webcam', 'cantidad' => 1, 'total' => 60.00, 'id_usuario' => 18]);
        Pedido::create(['producto' => 'Disco SSD', 'cantidad' => 1, 'total' => 80.00, 'id_usuario' => 19]);
        Pedido::create(['producto' => 'Parlantes', 'cantidad' => 2, 'total' => 70.00, 'id_usuario' => 20]);
    }

    /**
     * Recupera todos los pedidos asociados al usuario con ID 2.
     */
    public function qb2(){
        $allpedidos = DB::table('pedidos')
        ->where('id_usuario', 2)
        ->get();

        return response()->json($allpedidos);
    }

    /**
     * Obtén la información detallada de los pedidos, incluyendo el nombre
     * y correo electrónico de los usuarios.
     */
    public function qb3(){
        $info = DB::table('pedidos')
        ->join('usuarios', 'pedidos.id_usuario', '=', 'usuarios.id')
        ->select('pedidos.*', 'usuarios.nombre', 'usuarios.correo')
        ->get();

        return response()->json($info);
    }

    /**
     * Recupera todos los pedidos cuyo total esté en el rango de $100 a $250.
     */
    public function qb4(){
        $qb = DB::table('pedidos')
        ->whereBetween('total', [100, 250])
        ->get();

        return response()->json($qb);
    }

    /**
     *Encuentra todos los usuarios cuyos nombres comiencen con la letra "R".
     */
    public function qb5(){
        $users = DB::table('usuarios')
        ->where('nombre', 'like', 'R%')
        ->get();

        return response()->json($users);
    }

    /**
     * Calcula el total de registros en la tabla de pedidos para el usuario con ID 5.
     */
    public function qb6(){
        $qb1 = DB::table('pedidos')
        ->where('id_usuario', 5)
        ->count();

        return response()->json($qb1);
    }

    /**
     * Recupera todos los pedidos junto con la información de los usuarios,
     * ordenándolos de forma descendente según el total del pedido.
     */
    public function qb7(){
        $qb2 = DB::table('pedidos')
        ->join('usuarios', 'pedidos.id_usuario', '=', 'usuarios.id')
        ->select('pedidos.*', 'usuarios.nombre', 'usuarios.correo')
        ->orderBy('pedidos.total', 'desc')
        ->get();

        return response()->json($qb2);
    }

    /**
     * Obtén la suma total del campo "total" en la tabla de pedidos.
     */
    public function qb8(){
        $qb3 = DB::table('pedidos')
        ->sum('total');

        return response()->json($qb3);
    }

    /**
     * Encuentra el pedido más económico, junto con el nombre del usuario asociado.
     */
    public function qb9(){
        $qb4 = DB::table('pedidos')
        ->join('usuarios', 'pedidos.id_usuario', '=', 'usuarios.id')
        ->select('pedidos.*', 'usuarios.nombre')
        ->orderBy('pedidos.total', 'asc')
        ->first();

        return response()->json($qb4);
    }

    /**
     * Obtén el producto, la cantidad y el total de cada pedido, agrupándolos por usuario.
     */
    public function qb10(){
        $qb5 = DB::table('pedidos')
        ->join('usuarios', 'pedidos.id_usuario', '=', 'usuarios.id')
        ->select('usuarios.nombre', 'pedidos.producto', 'pedidos.cantidad', 'pedidos.total')
        ->orderBy('pedidos.id_usuario')
        ->get();

        return response()->json($qb5);
    }

    /**
     *
     */
    /*public function qb11(){}
    public function qb12(){}*/
}
