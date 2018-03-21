<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_cronograma extends CI_Controller {

	//Created by Jose Jesus Salinas

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

	}

	public function calcular()
	{
		$numplaca= $this->input->post('placanumero');
		$tipo=$this->input->post('tipodecarro');
		$fabricac=$this->input->post('anofab');
		//echo $numplaca;
		//echo $tipo;
		//echo $fabricac;
		$ultdig=$this->findlastdigit($numplaca);
		//echo $ultdig;
		$res_array=$this->calcres($ultdig, $tipo, $fabricac);
		echo json_encode($res_array);
		//echo $res_array[1];

	}

	public function findlastdigit($placa)
	{
		$placa_arr=str_split($placa);
		$ultimo_car=$placa_arr[count($placa_arr)-1];
		return $ultimo_car;
	}

	public function calcres($ultdig, $tipo, $fabricac)
	{
		$res_ano=0;
		if ($tipo=='particular') {
			$res_ano=$fabricac+4;
		}else{
			$res_ano=$fabricac+3;
		}
		//echo $res_ano;
		$res_mes=$this->calcmes($ultdig);
		//echo $res_mes;
		if ($res_mes!='') {
			$res_array=array($res_mes, $res_ano);
		}else{
			$res_array=array($res_ano);
		}
		return $res_array;
	}

	public function calcmes($ultdig){
		$res_mes='';
		switch ($ultdig) {
			case '0':
				$res_mes='Enero o Febrero';
				break;
			case '1':
				$res_mes='Marzo';
				break;
			case '2':
				$res_mes='Abril';
				break;
			case '3':
				$res_mes='Mayo';
				break;
			case '4':
				$res_mes='Junio';
				break;
			case '5':
				$res_mes='Julio o Agosto';
				break;
			case '6':
				$res_mes='Setiembre';
				break;
			case '7':
				$res_mes='Octubre';
				break;
			case '8':
				$res_mes='Noviembre';
				break;
			case '9':
				$res_mes='Diciembre';
				break;
			default:
				break;
		}
		return $res_mes;
	}

}

 