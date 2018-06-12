<?php 

include_once 'services.dto.php';

class service extends serviceDto
{

  public $id;
  public $marca;
  public $obs;
  public $ano;
  public $venda;
  public $hoje;

  public function getId()
  {
      return $this->id;
  }

  public function setId($val)
  {
      return $this->id = $val;
  }
 
  public function getMarca()
  {
      return $this->marca;
  }

  public function setMarca($val)
  {
      return $this->marca = $val;
  }

  public function getObs()
  {
      return $this->obs;
  }

  public function setObs($val)
  {
      return $this->obs = $val;
  }

  public function setAno($val)
  {
      return $this->ano = $val;
  }

  public function getAno()
  {
      return $this->ano;
  }

  public function setVenda($val)
  {
  	switch ($val) {
  		case "S":
  			$newval = 1;
  			break;

  		case "N":
  			$newval = 0;
  			break;
  		
  		default:
  			die(json_encode("erro-2"));
  			break;
  	}
      return $this->venda = $newval;
  }

  public function getVenda()
  {
      return $this->venda;
  }
  
  public function getHoje()
  {
      return $this->hoje = date("Y-m-d H:i:s");
  }
		
}


 ?>