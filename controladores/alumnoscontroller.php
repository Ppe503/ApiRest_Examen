<?php
    require "modelos/alumnos.php";
    class alumnosController extends Controller
    { 
        private $alumnos;
        public function __construct($param1,$param2){
            $this->alumnos=new alumnos();
            parent::__construct($param1,$param2);
        }

        public function mostrar(){
            $info=array('success'=>true,'data'=>$this->alumnos->mostrar());
            echo json_encode($info);
        }   
        
        public function agregar(){
            if (isset($_POST['nombre']) && isset($_POST['direccion']) && isset($_POST['telefono']) && isset($_POST['laboratorio1']) && isset($_POST['laboratorio2']) && isset($_POST['parcial'])){
                $this->alumnos->agregar($_POST['nombre'],$_POST['direccion'],$_POST['telefono'],$_POST['laboratorio1'],$_POST['laboratorio2'],$_POST['parcial']);
                $info=array('success'=>true,'msg'=>'Alumno agregado con exito');
            }else{
                $info=array('success'=>false,'msg'=>'Los parametros nombre, direccion, telefono, laboratorio1, laboratorio2 son obligatorios');
            }
            echo json_encode($info);
        }   
    }
?>

