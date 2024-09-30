<?php
//require '../../config/conectar.php';
require $_SERVER['DOCUMENT_ROOT'].'/ping-scan/modules/administrar-dispositivos/modelo.php';




class ControladorDispositivos {
    private $model;
    private $conn;

    public function __construct($conn) {
        $this->model = new ModeloDispositivos($conn);
        $this->conn = $conn;
    }

    public function mostrarDispositivos() {
        return $this->model->mostrarDispositivos();
    }

    public function localDeDispositivo($ip_local){
        return $this->model->localDeDispositivo($ip_local);
    }
    public function comprobarEstado($ip){
        $resultado = shell_exec("ping -n 1 ".escapeshellarg($ip));
        if(strpos($resultado, "enviados = 1, recibidos = 1") !== false){
            
            if((strpos($resultado, "Host de destino inaccesible") !== false)){
                echo "offline";
            }else{
                echo"online";
            }
            
        }else{
            echo "offline";
            
        }    
    }
    public function añadirDispositivo($ip1,$ip2,$ip3,$ip4,$nombre_equipo){
        return $this->model->añadirDispositivo($ip1,$ip2,$ip3,$ip4,$nombre_equipo);    
    }

    public function getEditarDispositivo($id_dispositivos){
        return $this->model->getDispositivoID($id_dispositivos);
    }
    public function editarDispositivo($id_dispositivos,$ip1,$ip2,$ip3,$ip4,$nombre_equipo){
        return $this->model->updateDispositivo($id_dispositivos,$ip1,$ip2,$ip3,$ip4,$nombre_equipo);
    }
    public function eliminarDispositivo($id_dispositivos){
        return $this->model->eliminarDispositivo($id_dispositivos);
    }
}
?>