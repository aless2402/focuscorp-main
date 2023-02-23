<?php
function corta_texto($texto, $longitud=400) { 
    if((mb_strlen($texto) > $longitud)) {
        $pos_espacios = mb_strpos($texto, ' ', $longitud) - 1;
        if($pos_espacios > 0) {
            $caracteres = count_chars(mb_substr($texto, 0, ($pos_espacios + 1)), 1);
            $texto = mb_substr($texto, 0, ($pos_espacios + 1)).'...';
        }
        if(preg_match_all("|(<([\w]+)[^>]*>)|", $texto, $buffer)) {
            if(!empty($buffer[1])) {
                preg_match_all("|</([a-zA-Z]+)>|", $texto, $buffer2);
                if(count($buffer[2]) != count($buffer2[1])) {
                    $cierrotags = array_diff($buffer[2], $buffer2[1]);
                    $cierrotags = array_reverse($cierrotags);
                    foreach($cierrotags as $tag) {
                            $texto .= '</'.$tag.'>';
                    }
                }
            }
        } 
    }
    return $texto; 
}

function encrypt($cadena){ 
    $key='c7850f98Tc0150Z2191Y29abb3f9fbc9i';
    $string = utf8_encode($cadena);
    $string = $key.$string.$key; //concateno la llave para encriptar la cadena
    $encrypted = base64_encode($string);//codifico la cadena
    return($encrypted);
}

function decrypt($cadena){
     $key='c7850f98Tc0150Z2191Y29abb3f9fbc9i';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
     $string = base64_decode($cadena); //decodifico la cadena
     $decrypted = str_replace($key, "", "$string"); //quito la llave de la cadena
     return $decrypted;  //Devuelve el string desencriptado
}

function convert_slug($url){
    $search  = array('á', 'é', 'í', 'ó', 'ú',' ','ñ','Á', 'É', 'Í', 'Ó', 'Ú');
    $replace = array('a', 'e', 'i', 'o', 'u','-','n','a', 'e', 'i', 'o', 'u');    
    return strtolower(str_replace($search, $replace, $url));
}

function convert_query($slug){
    $search  = array('-');
    $replace = array(' ');    
    return strtolower(str_replace($search, $replace, $slug));
}

function format_number_moneda_soles($number){
    $decimals ="2";
    $number = number_format($number, $decimals);
    return "S/.".$number;
}

function delete_last_caracter($string){
    $new_string = substr($string, 0, -1);
    return $new_string;
}

function format_number_dolar($number){
    $decimals ="2";
    $number = number_format($number, $decimals);
    return "$".$number;
}

function convert_mayuscula($string){
    $string = strtoupper($string);
    return $string;
}

function format_number_miles($number){
    $number = number_format($number, 0, '.', ',');
    return $number;
}

function format_number_miles_decimal($number){
    $number = number_format($number, 2, '.', ',');
    return $number;
}

function formato_fecha($fecha){    
    $dia=substr($fecha, 8, 2);
    $mes=substr($fecha, 5, 2);
    $anio=substr($fecha, 0, 4);
    
    $dia_semana = dia_semana($mes,$dia,$anio);
    $mostrar_mes = mostrar_mes($mes);
    return  $dia_semana." ".$dia." de ".$mostrar_mes." del ".$anio;
}

function formato_fecha_dia_mes($fecha){    
    $dia=substr($fecha, 8, 2);
    $mes=substr($fecha, 5, 2);
    $anio=substr($fecha, 0, 4);
    
    $dia_semana = dia_semana($mes,$dia,$anio);
    $mostrar_mes = mostrar_mes($mes);
    return  $dia."/".$mostrar_mes;
}

function first_month_day($month,$year){
      return date('Y-m-d', mktime(0,0,0, $month, 1, $year));
}

function last_month_day($month,$year){ 
      $day = date("d", mktime(0,0,0, $month+1, 0, $year));
      return date('Y-m-d', mktime(0,0,0, $month, $day, $year));
}

function last_month_day_actual(){ 
    //LUNES
      $month = date('m');
      $year = date('Y');
      $day = date("d", mktime(0,0,0, $month+1, 0, $year));
      return date('Y-m-d', mktime(0,0,0, $month, $day, $year));
}

function first_thu_month(){
    //PRIMER JUEVES DEL MES
      $date = strtotime('first thu of this month');
      return date('Y-m-d', $date);
}    

function first_week_actual(){
    //LUNES
      return date("Y-m-d", strtotime('monday this week'));
}

function last_week_actual(){
    //DOMINGO
      return date("Y-m-d", strtotime('sunday this week'));
}

function first_month_day_actual(){
      $month = date('m');
      $year = date('Y');
      return date('Y-m-d', mktime(0,0,0, $month, 1, $year));
}

function dia_semana($mes,$dia,$anio){
    $dia= date("w",mktime(0, 0, 0, $mes, $dia, $anio));
    switch ($dia) {
        case 0:
            $dia_semana = "Domingo";
            break;
        case 1:
            $dia_semana = "Lunes";
            break;
        case 2:
            $dia_semana = "Martes";
            break;
        case 3:
            $dia_semana = "Miercoles";
            break;
        case 4:
            $dia_semana = "Jueves";
            break;
        case 5:
            $dia_semana = "Viernes";
            break;
        case 6:
            $dia_semana = "Sabado";
            break;
    }
    return $dia_semana;
}

function formato_fecha_dia_mes_anio_abrev($fecha){    
    $dia=substr($fecha, 8, 2);
    $mes=substr($fecha, 5, 2);
    $anio=substr($fecha, 0, 4);
    
    $dia_semana = dia_semana($mes,$dia,$anio);
    $mostrar_mes = mostrar_mes_abrev($mes);
    return  $dia." ".$mostrar_mes. " ".$anio;
}

function mostrar_mes($mes){
	switch($mes){
		case 1:
		$nom_mes = "Enero";
		break;
		
		case 2: 
		$nom_mes = "Febrero";
		break;
		 
		case 3:
		$nom_mes = "Marzo";
		break;
		 
		case 4:
		$nom_mes = "Abril";
		break;
		 
		case 5:
		$nom_mes = "Mayo";
		break;
		 
		case 6:
		$nom_mes = "Junio";
		break;
		 
		case 7:
		$nom_mes = "Julio";
		break;
		 
		case 8:
		$nom_mes = "Agosto";
		break;
		 
		case 9:
		$nom_mes = "Septiembre";
		break;
		 
		case 10:
		$nom_mes = "Octubre";
		break;
		 
		case 11:
		$nom_mes = "Noviembre";
		break;
		 
		case 12:
		$nom_mes = "Diciembre";
		break;
		
	}
	return $nom_mes;
}

function mostrar_mes_abrev($mes){
	switch($mes){
		case 1:
		$nom_mes = "Ene";
		break;
		
		case 2: 
		$nom_mes = "Feb";
		break;
		 
		case 3:
		$nom_mes = "Mar";
		break;
		 
		case 4:
		$nom_mes = "Abr";
		break;
		 
		case 5:
		$nom_mes = "May";
		break;
		 
		case 6:
		$nom_mes = "Jun";
		break;
		 
		case 7:
		$nom_mes = "Jul";
		break;
		 
		case 8:
		$nom_mes = "Ago";
		break;
		 
		case 9:
		$nom_mes = "Sep";
		break;
		 
		case 10:
		$nom_mes = "Oct";
		break;
		 
		case 11:
		$nom_mes = "Nov";
		break;
		 
		case 12:
		$nom_mes = "Dic";
		break;
		
	}
	return $nom_mes;
}


function get_tag($list_tags, $tag){
    $tags = explode(",",$list_tags);        
    $retorno  = "";    
    foreach ($tags as $value) {
        if ($value==$tag){
            $retorno = "selected=''";
        }
    }    
    return $retorno;
}

function formato_fecha_barras($fecha){    
    $dia=substr($fecha, 8, 2);
    $mes=substr($fecha, 5, 2);
    $anio=substr($fecha, 0, 4);    
    return  $dia."/".$mes."/".$anio;
}

function formato_fecha_minutos($fecha){    
    $hora=substr($fecha, 11, 2);
    $minuto=substr($fecha, 14, 2);
    return  $hora.":".$minuto;
}

function convert_formato_fecha_db($day,$month,$year){    
    return $year."/".$month."/".$day;
}

function formato_fecha_db_time($fecha){   
    $dia=substr($fecha, 8, 2);
    $mes=substr($fecha, 5, 2);
    $anio=substr($fecha, 0, 4); 
    return $anio."/".$mes."/".$dia;
}

function formato_fecha_db_mes_dia_ano($fecha){   
    $dia=substr($fecha, 0, 2);
    $mes=substr($fecha, 3, 2);
    $anio=substr($fecha, 6, 4); 
    return $anio."/".$mes."/".$dia;
}

function formato_fecha_db($fecha){   
    $mes=substr($fecha, 0, 2);
    $dia=substr($fecha, 3, 2);
    $anio=substr($fecha, 6, 4); 
    return $anio."-".$mes."-".$dia;
}

function formato_fecha_datepicker_ano_mes_dia($fecha){   
    $mes=substr($fecha, 4, 2);
    $dia=substr($fecha, 0, 2);
    $anio=substr($fecha, 8, 4); 
    return $mes."/".$dia."/".$anio;
}

function get_day_number($fecha){    
    $dia=substr($fecha, 8, 2);
    return  $dia;
}

function get_month_number($fecha){    
    $mes=substr($fecha, 5, 2);
    return  $mes;
}

function get_year_number($fecha){    
    $anio=substr($fecha, 0, 4); 
    return  $anio;
}

function first_capital_letter($name){    
    $name = ucwords($name);
    return  $name;
}

function str_to_minuscula($str){
    $str = trim(strtolower($str));
    return  $str;
}

function get_semilla(){
    $semilla='ab513c75f48d82bcd30aa48e478d2e6e';
    return $semilla;
}

function replace_vocales_voculeshtml($str){
    $search  = array('á', 'é', 'í', 'ó', 'ú','Á', 'É', 'Í', 'Ó', 'Ú', '¿', 'ñ', 'Ñ');
    $replace = array('&aacute;', '&eacute;', '&iacute;', '&oacute;', '&uacute;','&Aacute;','&Eacute;', '&Iacute;', '&Oacute;', '&Uacute;', '&iquest;', '&ntilde;','&Ntilde;');    
    return str_replace($search, $replace, $str);
}

function replace_euacutes_vocales($str){
    $search  = array('á', 'é', 'í', 'ó', 'ú','Á', 'É', 'Í', 'Ó', 'Ú', '¿', 'ñ', 'Ñ');
    $replace = array('&aacute;', '&eacute;', '&iacute;', '&oacute;', '&uacute;','&Aacute;','&Eacute;', '&Iacute;', '&Oacute;', '&Uacute;', '&iquest;', '&ntilde;','&Ntilde;');    
    return str_replace($replace, $search, $str);
}

function str_to_mayusculas($string){
    $str = strtoupper($string);
    return $str;
}

function str_to_first_capital($string){
    $str = ucfirst($string);
    return $str;
}

function formato_fecha_dia_mes_v2($fecha){    
    $dia=substr($fecha, 8, 2);
    $mes=substr($fecha, 5, 2);
    $anio=substr($fecha, 0, 4);
    
    $dia_semana = dia_semana($mes,$dia,$anio);
    $mostrar_mes = mostrar_mes($mes);
    return  $dia." ".$mostrar_mes;
}

function get_session(){
    if (isset($_SESSION['customer'])){
        if($_SESSION['customer']['logged_customer']=="TRUE" && $_SESSION['customer']['status']=='1'){               
            return true;
        }else{
            redirect(site_url().'home');
        }
    }else{
        redirect(site_url().'home');
    }
}

function get_session_cms(){
    if (isset($_SESSION['usercms'])){
        if($_SESSION['usercms']['logged_usercms']=="TRUE" && $_SESSION['usercms']['active']==1){               
            return true;
        }else{
            redirect(site_url().'dashboard');
        }
    }else{
        redirect(site_url().'dashboard');
    }
}


?>