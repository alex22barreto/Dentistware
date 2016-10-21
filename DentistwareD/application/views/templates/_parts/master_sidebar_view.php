<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
            <?php 
            
            $url = 'assets/img/avatar.png';
//             if($user_info['foto'] != NULL){
//             	$url = 'uploads/funcionario/' . $user_info['foto'];
//             } else {
//             	$url = 'assets/img/foto-default.png';
//             }               
            $data_input = array(
            		'id' => '',
            		'class' => 'img-circle',
            		'alt' => 'Imagen de Usuario',
            		'src' => base_url($url),
            );
            echo img($data_input);                        
            ?>
            </div>
            <div class="pull-left info">
            	<p>
            		Sinca ries
	          		<?php //echo $user_info['nombre_completo'];
// 		                $nombre = explode(" ", $user_info['nombre_completo']);
// 		                echo $nombre[0] . " ";
// 		                echo $nombre[1] . " ";
// 		                echo br(1);
// 		                echo $nombre[2] . " ";
// 		                echo $nombre[3] . " ";
	               		/*
	          			$tipo = '';
	                	switch ($user_info['tipo_tercero'])	{
	                		case 'ADM':
	                			$tipo = 'ADMINISTRADOR';
	                			break;
                			case 'AVO':
                				$tipo = 'ADMINISTRATIVO';
                				break;
                			case 'GER':
                				$tipo = 'GERENCIA';
                				break;
                			case 'TEC':
                				$tipo = 'TECNICO';
                				break;
	                	}
	                */
	           		?>
                </p>
                <small><?php //echo $tipo; ?></small>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header">MENÚ PRINCIPAL</li>
            <?php echo $menu_usuario; ?>
        </ul>
    </section>
</aside>