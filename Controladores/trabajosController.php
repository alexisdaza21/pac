<?php 
//clase
require_once("Modelos/Trabajos.php");
require_once("Modelos/Clientes.php");
require_once("Modelos/Trabajadores.php");
class trabajosController{
	public static function main ($action){
		$_this = new trabajosController();
		switch ($action) {
			case 'create':
				$_this->create();
				break;
			case 'delete':
				$_this->delete();
				break;
			case 'update':
				$_this->update();
				break;
			case "admin":
				$_this->admin();
			break;
			case "admintra":
				$_this->admintra();
			break;
			case "pagos":
				$_this->pagos();
			break;
			default:
				throw new Exception("Accion no definido");
				break;
		}
	} 
private function admintra (){
	
		if ($_SESSION["sesion"]== "trabajador" ) {
		$trab = new Trabajos();
		$trabajos = $trab->admintra();
		$trab = new Trabajadores();
		$trabajadores = $trab->view();
		}
		if ($_SESSION["sesion"] == "cliente" ) {

		$id = $_SESSION["id"];

		$trab = new Clientes();
		$trabajos =  $trab->fkeyTra($id);
		$trab = new Trabajadores();
		$trabajadores = $trab->view();
		}
		require"Vistas/trabajos/admintra.php";
	}

		private function admin (){
		$trab = new Trabajos();
		$trabajos = $trab->admin();
		$trab = new Trabajadores();
		$trabajadores = $trab->view();

		require"Vistas/trabajos/admin.php";
	}
	private function pagos (){
		
	$pag = new Trabajos();
	$pagos = $pag->fkeyPagos($_GET["id"]);

		$clientes = new Clientes();
		$clientes->findByPk($_GET["id"]);

		require"vistas/pagos/admin.php";

	}

	private function create(){

		if(isset($_POST["Trabajos"])){

			
			//guardar en la BBDD
			$feIni = $_POST["Trabajos"]["fechaInicio"];
			$tip = $_POST["Trabajos"]["tipo"];
			$tra = $_POST["Trabajos"]["id_trabajadores"];
			$cli = $_POST["Trabajos"]["id_clientes"];
			$id = $_POST["Trabajos"]["id_clientes"];
			$trabajos = new Trabajos();
			
			$guardo = $trabajos->save($feIni,$tip,$tra,$cli);
			if ($guardo){
					header("Location:index.php?c=clientes&a=trabajos&id=".$id);
				}else{
					
					header("Location: index.php?c=trabajos&a=admin&error=true&id=".$id);
				}
			}else
				

				require "Vistas/trabajos/admin.php";
		}
		private function update(){
		$trabajos = new Trabajos();
		$trabajos->findByPk($_GET["up"]);
		$id = $_GET["id"];

		if(isset($_POST["Trabajos"])){
			$trabajos->fechaInicio = $_POST["Trabajos"]["fechaInicio"];
			$trabajos->tipo = $_POST["Trabajos"]["tipo"];
			$trabajos->id_trabajadores = $_POST["Trabajos"]["id_trabajadores"];
			$trabajos->id_clientes = $_POST["Trabajos"]["id_clientes"];
		
			
			$trabajos->update();
			header("Location: index.php?c=clientes&a=trabajos&id=".$id);
		}else{
			require "Vistas/trabajos/update.php";
		}
	}	
		
	 private function delete(){
        $trabajos = new Trabajos();
        $id = $_GET["id"];
        if(isset($_GET["de"])){
            $trabajos->delete($_GET["de"]);

            header("Location: index.php?c=clientes&a=trabajos&id=".$id);
        }

		}
}

 ?>