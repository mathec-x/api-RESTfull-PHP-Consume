  <div class="container">
    <div class="row">
      <div class="col s12">
	       <blockquote class="center-align"><h4>Documentação</h4></blockquote>
      </div>

    <div class="col s12">
        <blockquote><h6>Framework</h6></blockquote>
    </div>

  <div class="col s12">
    <small>Comentário</small><br>
    Nenhum frameWork serverSide foi utilizado nessa aplicação.<br><br>

    ├─ Libs utilizidadas clientSide<br>
    ├─── <a target="_blank" href="https://materializecss.com/">Materialize</a><br>
    ├─── <a target="_blank" href="https://angularjs.org/">angular</a><br>

  </div>

    <div class="col s12">
        <blockquote><h6>Estrutura de dados</h6></blockquote>
    </div>

    <div class="col m4">
      
    </div>
    <div class="col m9">
    ├─ app/<br>
    ├─── classes/<br>
    ├────── Veic.class.php - a classe que conversa com o web service<br>
    ├─── controllers/<br>
    ├────── route.config.php - monitora os cliques nas views da aplicação,<br>
    ├─── models/<br>
    ├────── data.access.php - arquivo que faz a conexão com o banco de dados.<br>
    ├────── services.bll.php - Arquivo que monta a lógica e envia para o dto.<br>
    ├────── services.dto.php - arquivo com o retorno json baseado nos produtos do banco de dados.<br>
    ├─── services/<br>
    ├────── index.php - Arquivo que comanda as rotas de request da uri.<br>
    ├─── views/<br>
    ├────── home/<br>
    ├──────── startScreen.php<br>
    ├────── modal/ <br>
    ├──────── create.ui.php<br>
    ├──────── partialView.ui.php<br>
    ├────── veiculos/ <br>
    ├──────── partialView.ui.php<br>
    ├──────── view.ui.php<br>
  </div>

    <div class="col s12">
        <blockquote><h6>Banco de dados</h6></blockquote>
    </div>

    <div class="col m12">
      A criação do banco de dados, foi feita de forma simples como uma única tabela e sem amarração.<br><br>
    </div>
    <div class="col m12">
 CREATE TABLE `veiculos` (<br>
  `idveiculos` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,<br>
  `descMarca` varchar(45) COLLATE latin1_general_ci NOT NULL,<br>
  `ano` int(4) NOT NULL,<br>
  `descObs` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,<br>
  `vendido` tinyint(1) NOT NULL,<br>
  `created` datetime NOT NULL,<br>
  `updated` datetime DEFAULT NULL,<br>
  PRIMARY KEY (`idveiculos`),<br>
  UNIQUE KEY `idveiculos_UNIQUE` (`idveiculos`)) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
   </div>

    <div class="col s12">
        <blockquote><h6>Api RESTfull</h6></blockquote>
    </div>
    
  <div class="row">

      <div class="col m12">
        <blockquote><b>CREATE</b></blockquote>
      </div>
      <div class="col s12 m2">
        <p>key: post</p>
      </div>
      <div class="col s12 m5">
        <p>exemplo: http://<?php echo $_SERVER['HTTP_HOST'] ?>/app/services/post/veiculos/?marca=______&obs=______&ano=______</p>
      </div>
      <div class="col s12 m5">
        <p>Criação de veículos, deverá ser informado as varáveis marca, descrição e ano (com 4 dígitos)</p>
      </div>
  </div>

  
  <div class="row">

      <div class="col m12">
        <blockquote><b>READ</b></blockquote>
      </div>
      <div class="col s12 m2">
        <p>key: get</p>
      </div>
      <div class="col s12 m5">
        <p>exemplo: http://<?php echo $_SERVER['HTTP_HOST'] ?>/app/services/get/veiculos/</p>
      </div>
      <div class="col s12 m5">
        <p>Lista com todos veículos cadastrados no banco de dados</p>
      </div>
  </div>

  <div class="row">

      <div class="col m12">
        <blockquote><b>SEARCH</b></blockquote>
      </div>
      <div class="col s12 m2">
        <p>key: get</p>
      </div>
      <div class="col s12 m5">
        <p>exemplo: http://<?php echo $_SERVER['HTTP_HOST'] ?>/app/services/get/veiculos/<small><i>descrição_do_veiculo</i></small></p>
      </div>
      <div class="col s12 m5">
        <p>A busca não é necessário uma varável, basta passar o novo parâmetro na url, podendo ser nome, ou id</p>
      </div>
  </div>

  <div class="row">
      <div class="col m12">
        <blockquote><b>UPDATE</b></blockquote>
      </div>
      <div class="col s12 m2">
        <p>key: patch</p>
      </div>
      <div class="col s12 m5">
        <p>exemplo: http://<?php echo $_SERVER['HTTP_HOST'] ?>/app/services/patch/veiculos/?id=___&venda=S/N</p>
      </div>
      <div class="col s12 m5">
        <p>O patch atualiza a situação do veículo para vendido (S) ou não (N), para isso basta informar o id como variável</p>
      </div>
  </div>

  <div class="row">
      <div class="col m12">
        <blockquote><b>DELETE</b></blockquote>
      </div>
      <div class="col s12 m2">
        <p>key: delete</p>
      </div>
      <div class="col s12 m5">
        <p>exemplo: http://<?php echo $_SERVER['HTTP_HOST'] ?>/app/services/delete/veiculos/?id=____</p>
      </div>
      <div class="col s12 m5">
        <p>O delete busca pela variável id, que deve ser informada após a uri</p>
      </div>
  </div>

  <div class="row">
      <div class="col m12">
        <blockquote><b>PUT</b></blockquote>
      </div>
      <div class="col s12 m2">
        <p>key: put</p>
      </div>
      <div class="col s12 m5">
        <p>exemplo: http://<?php echo $_SERVER['HTTP_HOST'] ?>/app/services/put/veiculos/?id=__&newmarca=_____&newano=____&newdesc=____</p>
      </div>
      <div class="col s12 m5">
        <p>Atualiza os dados do veículo</p>
      </div>
  </div>

    </div>
  </div>