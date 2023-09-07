<?php

namespace App\views\pages; 

Class Inicio{
	public function __construct($datos){
		?>
		<h1><?php echo $datos["titulo"] ?></h1>
		<h1><?php echo RUTA_APP ?></h1>
		<?php	
	}
}
