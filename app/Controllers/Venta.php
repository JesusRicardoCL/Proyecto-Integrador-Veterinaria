<?php

namespace App\Controllers;

use App\models\UsuarioModel;
use App\models\ProductoModel;
use CodeIgniter\RESTful\ResourceController;

class Venta extends ResourceController
{

    protected $modelName = 'App\Models\VentaModel';
    protected $format = 'json';



    public function index()
    {

        $usuarioModel = model('App\Models\UsuarioModel');
        $productoModel = model('App\Models\ProductoModel');

        $data = [
            "usuarios" => $usuarioModel->findAll(),
            "productos" => $productoModel->findAll(),
            "ventas" => $this->model->findAll()
        ];

        echo view('venta/index', $data);
    }

    public function add_cart(){

        //print_r('lol');

        $cart = \Config\Services::cart();

        
/*
        $data = [
            "id" => $this->request->getPost('idProducto'),
            "name" => $this->request->getPost('nombre'),
            "qty" => $this->request->getPost('cantidad'),
            "price" => $this->request->getPost('precio')
        ];
        */
        $data = [
            "id" => $this->request->getPost('idProducto'),
            "name" => $this->request->getPost('nombre'),
            "qty" => $this->request->getPost('cantidad'),
            "price" => $this->request->getPost('precio')
        ];

        $cart->insert($data);

        //print_r(cart()->contents());exit;

        return $this->respond($data);

    }

    public function show($id = NULL)
    {
        $data = [
            "venta" => $this->model->find($id)
        ];

        return $this->respond($data);
    }

    public function create()
    {

        $subtotal = floatval($this->request->getPost('precio')) * floatval($this->request->getPost('cantidad'));
        $total = $subtotal * 1.16;

        $data = [
            "productos" => $this->request->getPost('nombre'),
            "descripcion" => $this->request->getPost('descripcion'),
            "fecha" => $this->request->getPost('fecha'),
            "total" => $total
        ];

        $id = $this->model->insert($data);

        if ($id) {
            return $this->respond($this->model->find($id));
        } else {
            return $this->respond(["error" => "El producto no se agrego correctamente!"]);
        }
    }

    public function update($id = null)
    {

        $data = [];

        if (!empty($this->request->getPost('productos')))
            $data["productos"] = $this->request->getPost('productos');

        if (!empty($this->request->getPost('descripcion')))
            $data["descripcion"] = $this->request->getPost('descripcion');

        if (!empty($this->request->getPost('fecha')))
            $data["fecha"] = $this->request->getPost('fecha');

        if (!empty($this->request->getPost('total')))
            $data["total"] = $this->request->getPost('total');

        $result = $this->model->update($id, $data);

        if ($result) {
            $venta = $this->respond($this->model->find($id));
            return $this->respond(
                [
                    "result" => "El producto se edito correctamente!",
                    "data" => $venta
                ]
            );
        } else {
            return $this->respond(["error" => "El producto no se edito correctamente!"]);
        }
    }


    public function delete($id = null)
    {
        $result = $this->model->delete($id);

        if ($result) {
            return $this->respond(["result" => "El producto se elimino correctamente!"]);
        } else {
            return $this->respond(["error" => "El producto no se elimino correctamente!"]);
        }
    }
}
