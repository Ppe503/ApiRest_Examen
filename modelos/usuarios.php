<?php
    class Usuarios extends BaseDeDatosA
    {
        public function __construct(){
            $this->conectar();
        }

        public function validarlogin($user,$pass){
            $result=$this->conexion->query("SELECT * FROM usuarios WHERE user='{$user}' and password=MD5('{$pass}')");
            if ($registro=$result->fetch_assoc()){
                $registro["token"]=$this->generarToken();
                $this->guardarToken($registro["token"],$user);
                return $registro;
            }else{
                return false;
            }
        }

        private function generarToken(){
            $letters="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $upper=str_split($letters);
            $number=range(0,9);
            shuffle($upper);
            shuffle($number);
            $arraytotal=array_merge($upper,$number);
            $ramdom_key=array_rand($arraytotal,1);
            $c=$arraytotal[$ramdom_key];
            $time=time();
            $token=sha1($c.$time);
            return $token;
        }

        private function guardarToken($token, $user){
            $this->conexion->query("INSERT INTO token SET token='{$token}', user='{$user}', ip='{$_SERVER['REMOTE_ADDR']}', fecha=now()");
        }

        public function validarToken($token){
            $result=$this->conexion->query("SELECT * FROM token WHERE token='{$token}'");
            $r=parent::getArrayfromResult($result);
            return (count($r)>0 ? true : false);
        }
    }
?>