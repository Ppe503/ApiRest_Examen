<?php
    class UsuariosController extends Controller
    {
        public function __construct($param1,$param2) {
            parent::__construct($param1, $param2);
        }

        public function  login() {
            if (!(isset($_GET["user"])) || !(isset($_GET["pass"]))) {
                new ErroresController("Parametros user y pass son obligatorios");
            }else{
                if ($registro=$this->user->validarlogin($_GET["user"],$_GET["pass"])){
                    $info=array('success'=>true,'msg'=>'Usuario correcto','token'=>$registro["token"]);
                }else{
                    $info=array('success'=>false,'msg'=>'Usuario o password incorrecto');
                };
            }
            echo json_encode($info);
        }

        public function add(){
            echo "Agregando Usuario";
        }
    }
?>