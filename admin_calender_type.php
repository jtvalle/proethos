<?
// This file is part of the ProEthos Software. 
// 
// Copyright 2013, PAHO. All rights reserved. You can redistribute it and/or modify
// ProEthos under the terms of the ProEthos License as published by PAHO, which
// restricts commercial use of the Software. 
// 
// ProEthos is distributed in the hope that it will be useful, but WITHOUT ANY
// WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
// PARTICULAR PURPOSE. See the ProEthos License for more details. 
// 
// You should have received a copy of the ProEthos License along with the ProEthos
// Software. If not, see
// https://raw.githubusercontent.com/bireme/proethos/master/LICENSE.txt


 /**
  * Admin Menu
  * @author Rene Faustino Gabriel Junior  (Analista-Desenvolvedor)
  * @copyright © Pan American Health Organization, 2013. All rights reserved.
  * @access public
  * @version v0.13.46
  * @package ProEthos-Admin
  * @subpackage calender
 */
require("cab.php");

/* Admin Common */
$ok = (($perfil -> valid('#ADM')) or ($perfil -> valid('#SCR')) or ($perfil -> valid('#COO')));
if ($ok==0) {
	redirecina('main.php');
}

require($include.'sisdoc_colunas.php');
require($include.'sisdoc_data.php');

	require("_class/_class_calender.php");
	$clx = new calendar;
	$tabela = $clx->tabela_type;
	
	$label = msg('tit_'.$tabela);
	$http_edit = 'admin_calender_type_ed.php'; 
	$editar = True;
	
	$http_ver = '';
	
	$http_redirect = page().'?dd98='.$dd[98].'&dd97='.$dd[97];
	
	$clx->row_type();
	$busca = true;
	$offset = 20;
	//$pre_where = " e_mailing = '".$cl->mail_codigo."' ";
	
	$order  = "";
	echo '<TABLE width="'.$tab_max.'" align="center"><TR><TD>';
	require($include.'sisdoc_row.php');	
	echo '</table>';	
	echo '</div>';

	echo $hd->foot(); 
?>