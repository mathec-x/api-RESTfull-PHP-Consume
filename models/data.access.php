<?php

# CREATE TABLE `veiculos` (
#  `idveiculos` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
#  `descMarca` varchar(45) COLLATE latin1_general_ci NOT NULL,
#  `ano` int(4) NOT NULL,
#  `descObs` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
#  `vendido` tinyint(1) NOT NULL,
#  `created` datetime NOT NULL,
#  `updated` datetime DEFAULT NULL,
#  PRIMARY KEY (`idveiculos`),
#  UNIQUE KEY `idveiculos_UNIQUE` (`idveiculos`)
#) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

class conecta {

	private static $instance = NULL;

	public static function getInstance() {
				
	if (!self::$instance) {

	try {
		self::$instance = new PDO("mysql:host=localhost;dbname=veiculos;charset=utf8", 'root', '');
		self::$instance-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

		} catch (Exception $e) {

			atma::getInstance();

		}
   }

	return self::$instance;
}

	public static function prepare($sql){
		return self::getInstance()->prepare($sql);
	}

	public static function close() {
	if (self::$instance) {
	    self::$instance = null;
	}


  }
}
?>