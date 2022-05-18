<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\models\UsuarioModel;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

use Config\Services;



class Auth extends ResourceController
{

  protected $format  = 'json';

  protected $token;



  protected $usuario;

  protected $tipoUsuario;

  public function __construct()
  {
  }

  public function create()
  {

    $user = $this->request->getPost("user");
    $password = $this->request->getPost("password");
    $tipo = $this->request->getPost("tipo");



    if ($tipo == "usuario") {
      $usuarioModel = model('App\Models\UsuarioModel');
      $this->usuario = $usuarioModel->login($user, $password);
      /////////////
      if ($this->usuario) {
        $now = time();
        $key =   Services::getSecretKey();
        $user_id = $this->usuario["id"];

        $payload = [
          'aud' => "http://SusVet.com",
          'iat' => $now, // cuando se creo
          'nbf' => $now, // cuando se empezara a utilizar, 
          'exp' => $now + (60 * 60 * 24 * 1),
          'data' => [
            "user_id" =>  $user_id,
            "tipo" =>  $tipo,
          ]
        ];

        $jwt = JWT::encode($payload, $key, "HS256");

        if ($this->usuario["tipo_usuario"] == 1){
          $tipo = "cliente";
          return $this->respond(["error" => "Su cuenta no esta autorizada para acceder"]);
        }else if($this->usuario["tipo_usuario"] == 2){
          $tipo = "empleado";
        }else if($this->usuario["tipo_usuario"] == 3){
          $tipo = "administrador";
        }


        return $this->respond(["token" => $jwt, "user" => $this->usuario, "tipo" => $tipo]);
      } else {
        return $this->respond(["error" => "usuario o contraseña incorrectos!"]);
      }
      ///////////////////

    }
  }




  public function verifyToken()
  {
    $key =   Services::getSecretKey();
    $token_str = $this->request->getHeader("token")->getValue();

    try {
      $token = JWT::decode($token_str, new key($key, 'HS256'));
    } catch (\Throwable $th) {
      $token = false;
    }

    if (!$token) {
      return false;
    } else {
      $usuarioModel = model('App\Models\UsuarioModel');
      $this->usuario =  $usuarioModel->find($token->data->user_id);
      $this->tipoUsuario = "usuario";

      return true;
    }
  }
}
