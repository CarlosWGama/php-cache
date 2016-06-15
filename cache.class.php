<?php
/**
* Classe para armazenar variaveis por um tempo determinado
* @author Carlos W. Gama (carloswgama@gmal.com)
* @license GPL 2
* @version 1.0.0
*/

class Cache {

	/**
	* Diretório onde será salvo os dados
	* @access private
	* @var string
	*/
	private $dirCache = "";


	/**
	* Construtor
	* @param $dir string | Onde será salvo os dados
	*/
	public function __construct($dir = "") {
		$this->dirCache = $dir;
	}

	/**
	* Salva as variaveis em cache
	* @access public
	* @param $variavel string
	* @param $dados mix
	* @param $minutos integer | Quantos mninutos a variavel ainda será válida
	*/
	public function setVar($variavel, $dados, $minutos = 5) {
		$conteudo['expira'] = date('Y-m-d H:i:s', mktime(date('H'), (date('i') + $minutos), date('s'), date('m'), date('d'), date('Y')));
		$conteudo['dados'] = $dados;
		file_put_contents($this->dirCache . $variavel . '.txt', json_encode($conteudo));
	}

	/**
	* Busca o dado salvo em Cache
	* @param $variavel string
	* @return mix
	*/
	public function getVar($variavel) {
		if (file_exists($this->dirCache . $variavel . '.txt')) {
			$conteudo = json_decode(file_get_contents($this->dirCache . $variavel . '.txt'), true);	
			$dataAtual = date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d'), date('Y')));
			if ($conteudo['expira'] > $dataAtual) 
				return $conteudo['dados'];
			unlink($this->dirCache . $variavel . '.txt');
		}
		
		return false;	
	}


}

