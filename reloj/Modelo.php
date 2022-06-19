<?php
	// Modelo.php 
	class Modelo {	// Reloj
		public $ancho, $alto;
		public $centrox, $centroy;
		public $arrptosext, $arrptosint;
		public $hora, $min, $seg;
		public function __construct($h, $m, $s, $ancho, $alto){
			$this->hora = $h;
			$this->min = $m;
			$this->seg = $s;
			$this->ancho = $ancho;
			$this->alto = $alto;
			$this->centrox = $ancho/2;
			$this->centroy = $alto/2;
			$this->radio=$ancho/2-30;
			$this->arrptosext= Array();
			$this->arrptsoint= Array();
			$this->arrhrs= Array();
			$this->arrh= Array();
			$this->arrm= Array();
			$this->arrs= Array();
		
			$ang_rad_ini= 0;
			$ang_rad_div=(2*M_PI)/60;

			for($i=0;$i<60; $i++)
			{
				$this->arrptosext[$i]=
				new Punto(
					$this->centrox+$this->radio*cos($ang_rad_ini),
					$this->centroy+$this->radio*sin($ang_rad_ini)
				);
				$this->arrptosint[$i]=
				new Punto(
					$this->centrox+($this->radio-10)*cos($ang_rad_ini),
					$this->centroy+($this->radio-10)*sin($ang_rad_ini)

				);
				//horas
				$this->arrhrs[$i]=
					new Punto(
						($this->centrox)+($this->radio-20)*cos($ang_rad_ini-20),
						($this->centroy)+($this->radio-25)*sin($ang_rad_ini-20)

				);
				//manecilla horas
				$this->arrh[$i]=
				new Punto(
					($this->centrox)+($this->radio-20)*cos($ang_rad_ini-20),
					($this->centroy)+($this->radio-25)*sin($ang_rad_ini-20)

				);
				//minutos
				$this->arrm[$i]=
					new Punto(
					($this->centrox)+($this->radio-20)*cos($ang_rad_ini+11),
					($this->centroy)+($this->radio-25)*sin($ang_rad_ini+11)
				);
				//sg
				$this->arrs[$i]=
					new Punto(
					($this->centrox)+($this->radio-20)*cos($ang_rad_ini+11),
					($this->centroy)+($this->radio-25)*sin($ang_rad_ini+11)
				);
					$ang_rad_ini+= $ang_rad_div;
			}
				
		}
	}

?>