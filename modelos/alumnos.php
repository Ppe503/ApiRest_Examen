<?php
    class alumnos extends BaseDeDatosA
    {
        public function __construct(){
            $this->conectar();
        }

        public function mostrar(){
            $result=$this->conexion->query("SELECT idalu, nombre, direccion, telefono, laboratorio1, laboratorio2, parcial, Round((laboratorio1*0.25)+(laboratorio2*0.25)+(parcial*0.5),2) AS 'Nota Promedio' FROM alumnos");
            return $this->getArrayfromResult($result);
        }

        public function agregar($nombre,$direccion,$telefono,$laboratorio1,$laboratorio2,$parcial){
            $result=$this->conexion->query("INSERT INTO alumnos SET nombre='{$nombre}', direccion='{$direccion}', telefono='{$telefono}', laboratorio1='{$laboratorio1}', laboratorio2='{$laboratorio2}', parcial='{$parcial}'");
            return true;
        }
        
    }
    
?>
