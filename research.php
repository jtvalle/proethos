<?php
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
  * Protocol
  * @author Rene Faustino Gabriel Junior  (Analista-Desenvolvedor)
  * @copyright © Pan American Health Organization, 2013. All rights reserved.
  * @access public
  * @version v.0.13.46
  * @package Proethos
  * @subpackage Protocol
 */
 
/* mark active page to cabmenu */
$active_page = 'research';
 
require("cab.php");

require("_class/_class_cep.php");
$cep = new cep;

require("_class/_class_cep_submit.php");
require($include.'sisdoc_colunas.php');
require($include.'sisdoc_data.php');
 
require("_class/_class_resume.php");
$rs = new resume;

$proj = new submit;
/* Ajusta protocolos perdidos */
$sql = "update ".$proj->tabela." set doc_status = '@' where doc_status = '' ";
$rlt = db_query($sql);

/* Buscar projetos do pesquisador */
$proj->doc_autor_principal = $ss->user_codigo;
$pta = $proj->protocolos_todos($dd[1]);  

/* Search project form */
echo '<h1>'.msg('project_investigador').'</h1>';
echo $cep->form_search();

/* search form */
echo '<BR><BR>';
echo $rs->resume();

/* project in submission */
echo '<BR>';
echo '<h1>'.msg('caption_status_'.$dd[1]).'</h1>';

echo '<fieldset>';

echo '<table width="100%" class="lt1" border=0><TR><TD>';

echo '<font class="lt1">'.msg('caption_status_'.$dd[1].'_inf').'</font>';
echo '</table>';

echo '<table width="100%" border=0 >';

/* Protocol in submission */
echo $proj->protocolos_mostrar($pta);
echo '</table>';

/* Approved Research */
$cep->autor_principal = $ss->user_codigo;
echo $cep->protocol_in_investigation();

echo '</fieldset>';

echo '</div>';
echo $hd->foot();	
?>