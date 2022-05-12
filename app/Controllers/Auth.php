<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\models\UsuarioModel;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

use Config\Services;


Class Auth extends ResourceController{

    protected $format = 'json';

    protected $token;

    protected $usuario;

    protected $tipoUsuario;

    public function create(){

        $user = $this->request->getPost("user");
        $password = $this->request->getPost("password");
        $tipo = $this->request->getPost("tipo");
        
        $usuarioModel = new UsuarioModel();
        $this->usuario = $usuarioModel->login($user,$password); 

        if($this->usuario){
            $now = time();
            $key = Services::getSecretKey();
            $user_id = $this->usuario["id"];
            $payload = [
                'aud' => "http://vetpet.site",
                'iat' => $now, //Cuando se creo
                'nbf' => $now, //Cuando se empezara a utilizar
                //'exp' => $now+(60*60*24*7),
                'exp' => $now+(60*60),
                'data' => [
                    "user_id" => $user_id,
                    "tipo" => $tipo,
                ]
            ];
            $jwt = JWT::encode($payload,$key,"HS256");
            return $this->respond(["token" => $jwt, "user" => $this->usuario, "tipo" => $tipo]);

            }else{
                return $this->respond(["error"=>"usuario o contraseña incorrectos!"]);
            }

    }

    public function verifyToken(){
        $key = Services::getSecretKey();
        $token_str = $this->request->getHeader("token")->getValue();
        
        try{
        $token = JWT::decode($token_str,new key($key,'HS256'));
        } catch(\Throwable $th){
        $token = false;
        }

        if(!$token){
            return false;
        }else{
            $usuarioModel = new usuarioModel();
            $this->usuario = $usuarioModel->find($token->data->user_id);

            if($token->data->tipo == '0'){

                $this->tipoUsuario = "0";
            
            }else if($token->data->tipo == '1'){
            
                $this->tipoUsuario = "1";
            
            }else if($token->data->tipo == '2'){

                $this->tipoUsuario = "2";

            }

            return true;
        }
    }

    /*public function validarEntrenador(){
        $user = $this->request->getHeader("user")->getValue();
        $password = $this->request->getHeader("password")->getValue();

        $userModel = new EntrenadorModel();
        $user = $userModel -> login($user, $password);


        return $user;
    }
    */

}
