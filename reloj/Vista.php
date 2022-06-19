<?php
	// Vista.php
	class Vista {
		public $img;
		public $blanco, $negro, $verdeclaro;
		public function dibujarReloj($modelo){
			$this->img = imagecreate($modelo->ancho, $modelo->alto);
			$this->blanco = imagecolorallocate($this->img, 255, 255, 255);
			$this->negro = imagecolorallocate($this->img, 0, 0, 0);
			$this->verdeclaro = imagecolorallocate($this->img, 196, 237, 220);
			$this->rojo=imagecolorallocate($this->img,255,0,0);
			imagefilledrectangle($this->img, 0, 0, $modelo->ancho, $modelo->alto, $this->blanco);
			imagefilledellipse($this->img, $modelo->centrox, $modelo->centroy, $modelo->ancho-30, $modelo->alto-30, $this->negro);
			imagefilledellipse($this->img, $modelo->centrox, $modelo->centroy, $modelo->ancho-40, $modelo->alto-40, $this->blanco);
			//imagestring($this->img, 3, 10, 300, $modelo->titulo, $this->negro);	
			$contador=0;
			$cont=0;
			$minutos=0;
			$segudos=0;
			for($i=0;$i<60; $i++)
			{
				
				if($i%5==0)
				{
					$contador+=1;
					imagesetthickness($this->img,3);
					//lineas pequeñas rojas
					imageline($this->img, $modelo->arrptosext[$i]->x, $modelo->arrptosext[$i]->y,$modelo->arrptosint[$i]->x,$modelo->arrptosint[$i]->y,$this->rojo);	
					//numeros
					imagestring($this->img, 5, $modelo->arrhrs[$i]->x, $modelo->arrhrs[$i]->y, $contador, $this->negro);
					//manecilla horas
					if($modelo->hora==$contador)
					{
						imagesetthickness($this->img,5);
						imageline($this->img, $modelo->centrox, $modelo->centroy,$modelo->arrh[$i]->x,$modelo->arrh[$i]->y,$this->negro);	
					}
				}
				else{
					
					$cont+=1;
					imagesetthickness($this->img,1);
					//imageline($this->img, $modelo->arrptosext[$i]->x, $modelo->arrptosext[$i]->y,$modelo->arrptosint[$i]->x,$modelo->arrptosint[$i]->y,$this->negro);
					//puntos
					imagefilledellipse($this->img, $modelo->arrptosext[$i]->x, $modelo->arrptosext[$i]->y, 5,5, $this->negro);
					
				}
				//minutos
				if($modelo->min==$i)
					{
						
						imagesetthickness($this->img,3);
						imageline($this->img, $modelo->centrox, $modelo->centroy,$modelo->arrm[$i]->x,$modelo->arrm[$i]->y,$this->negro);		
					}
					//segundos
				if($modelo->seg==$i)
					{
						
						imagesetthickness($this->img,1);
						imageline($this->img, $modelo->centrox, $modelo->centroy,$modelo->arrm[$i]->x,$modelo->arrm[$i]->y,$this->rojo);		
					}	
			}

			imagefilledellipse($this->img, $modelo->centrox, $modelo->centroy, 10, 10, $this->rojo);
			imagepng($this->img);
			imagedestroy($this->img);
		}
	}
?>