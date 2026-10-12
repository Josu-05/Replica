<?php


namespace App\Controllers;
use App\Models\VendedorModel;
use App\Models\ReglaModel;
use App\Models\VentaModel;

class ComisionController extends BaseController
{
    public function index()
    {
        $vendedorModel = new VendedorModel();
        $reglaModel = new ReglaModel();

        $datos['vendedores'] = $vendedorModel->findAll();
        $datos['reglas'] = $reglaModel->findAll();

        return view('comisiones/index', $datos);
    }

    public function calcular()
    {
        $inicio = $this->request->getPost('fecha_inicio');
        $fin = $this->request->getPost('fecha_fin');

        $db = \Config\Database::connect();

        $ventas = $db->table('ventas')
            ->where('fecha_venta >=', $inicio)
            ->where('fecha_venta <=', $fin)
            ->get()
            ->getResultArray();

        $resultado = [];

        foreach ($ventas as $venta) {

            $regla = $db->table('reglas')
                ->where('umbral_monto <=', $venta['monto'])
                ->orderBy('umbral_monto', 'DESC')
                ->get()
                ->getRowArray();

            $porcentaje = $regla['porcentaje'];

            $comision = $venta['monto'] * $porcentaje;

            $vendedor = $db->table('vendedores')
                ->where('id', $venta['vendedor_id'])
                ->get()
                ->getRowArray();

            $nombre = $vendedor['nombre'];

            if (!isset($resultado[$nombre])) {
                $resultado[$nombre] = 0;
            }

            $resultado[$nombre] += $comision;
        }

        $datos['resultado'] = $resultado;

        return view('comisiones/resultado', $datos);
    }
}