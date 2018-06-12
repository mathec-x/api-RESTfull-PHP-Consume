<?php 
include_once 'data.access.php';

class serviceDto extends conecta
{
	
	public function create(){

		$query = "INSERT INTO `veiculos` (`descMarca`, `ano`, `descObs`, `created`) VALUES (:marca, :ano, :obs, :hoje)";
		$create = conecta::prepare($query);
		$create->bindValue(":marca", $this->getMarca());
		$create->bindValue(":ano"  , $this->getAno());
		$create->bindValue(":obs"  , $this->getObs());
		$create->bindValue(":hoje" , $this->getHoje());
		$create->execute(); 

	   if($create->rowCount() > 0) 
	   {
      	 return json_encode(1);
       }
       else
       {
       	return json_encode(0);
       }
	}

	public function read(){
		$query = "SELECT * FROM `veiculos`";
		$read = conecta::prepare($query);
		$read->execute(); 
		return json_encode($read->fetchAll(PDO::FETCH_ASSOC));
	}

	public function update(){

		$query = "UPDATE `veiculos` SET `vendido` = :venda, `updated` = :hoje WHERE `idveiculos` = :id";
		$update = conecta::prepare($query);
		$update->bindValue(":id", $this->getId());	
		$update->bindValue(":venda"  , $this->getVenda());
		$update->bindValue(":hoje" , $this->getHoje());
		$update->execute(); 

	   if($update->rowCount() > 0) 
	   {
      	 return json_encode(1);
       }
       else
       {
       	return json_encode(0);
       }
	}

	public function put(){

		$query = "UPDATE `veiculos` SET `descMarca` = :newmarca, `descObs` = :newdesc, `ano` = :newano, `updated` = :hoje WHERE `idveiculos` = :id";
		$update = conecta::prepare($query);
		$update->bindValue(":id", $this->getId());	
		$update->bindValue(":newmarca", $this->getMarca());
		$update->bindValue(":newdesc" , $this->getObs());
		$update->bindValue(":newano"  , $this->getAno());
		$update->bindValue(":hoje" , $this->getHoje());
		$update->execute(); 

	   if($update->rowCount() > 0) 
	   {
      	 return json_encode(1);
       }
       else
       {
       	return json_encode(0);
       }
	}

	public function delete(){
		$query = "DELETE FROM `veiculos` WHERE idveiculos = :id ";
		$delete = conecta::prepare($query);
		$delete->bindValue(":id", $this->getId());	
		$delete->execute(); 
		if($delete->rowCount() > 0) 
		   {
	      	 return json_encode(1);
	       }
	       else
	       {
	       	return json_encode(0);
	       }
	}

	public function search(){
		$marca = $this->getMarca();
		$query = "SELECT * FROM `veiculos` WHERE `descMarca` LIKE :marca OR `idveiculos` LIKE :marca";
		$search = conecta::prepare($query);
		$search->bindValue(":marca",'%'. $marca .'%' );
		$search->execute(); 

		return json_encode($search->fetchAll(PDO::FETCH_ASSOC));
	}

}

?>