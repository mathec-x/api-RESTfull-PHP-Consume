<?php 
# erro-0 = caminho não encontrado
# erro-1 = Preencher dados para POST marca observação e Ano não podem faltar
# erro-2 = Apenas 'S' ou 'N'
# erro-3 = preencher com id & venda = S ou N
# 0 = nenhum dado alterado
# 1 = dados alterados com sucesso
# app/services/post/veiculos?marca=________________&ano=____&obs=_______
# app/services/put/veiculos?id=__&newmarca=____&newano=_____&newdesc=_____
error_reporting(0);
header("Connection: close\r\n");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('America/Sao_Paulo');
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

include_once '../models/services.bll.php';

$info = explode('/', $_SERVER['PATH_INFO']);  

$method = '/'.$info[1];
$file = '/'.$info[2];
$search = $info[3];

switch($method.$file.'/'.$search) {

    case '/get/veiculos/':	
        $obj = new service;
		print $obj->read();
        break;

    case '/get/veiculos/'.$search:
		$obj = new service;
		$obj->setMarca($search);	
		print $obj->search();
        break;

    case '/post/veiculos/':
    	if ($_GET['marca'] != "" AND $_GET['obs'] != "" AND strlen($_GET['ano']) == '4') {    		
    	$obj = new service;
    	$obj->setMarca($_GET['marca']);
    	$obj->setObs($_GET['obs']);
    	$obj->setAno($_GET['ano']);
    	print $obj->create();
    	}
        else 
        {
        	die(json_encode("erro-1"));
        }

        break;

    case '/put/veiculos/':
        if ($_GET['id'] != "" AND $_GET['newmarca'] != "" AND $_GET['newdesc'] != "" AND strlen($_GET['newano']) == '4') {          
        $obj = new service;
        $obj->setId($_GET['id']);
        $obj->setMarca($_GET['newmarca']);
        $obj->setObs($_GET['newdesc']);
        $obj->setAno($_GET['newano']);
        print $obj->put();
        }
        else 
        {
            die(json_encode("erro-1"));
        }

        break;

    case '/patch/veiculos/':
    	if ($_GET['id'] != "" AND ($_GET['venda'] == "S" OR $_GET['venda'] == "N")) {    		
       	$obj = new service;
    	$obj->setId($_GET['id']);
    	$obj->setVenda($_GET['venda']);
    	print $obj->update();
        break;
    	}
        else 
        {
        	die(json_encode("erro-3"));
        }

    case '/delete/veiculos/':
    	$obj = new service;
    	$obj->setId($_GET['id']);
    	print $obj->delete();
        break;

    default:
        die(json_encode("erro-0")) ;
}

 ?>