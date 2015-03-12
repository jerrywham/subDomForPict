<?php 
/**
 * Plugin logInMyPluxml
 *
 * @package	PLX
 * @version	1.0
 * @date	29/01/2014
 * @author	Cyril MAGUIRE
 **/
class subDomForPict extends plxPlugin {

	/**
	 * Constructeur de la classe subDomForPict
	 *
	 * @param	default_lang	langue par défaut utilisée par PluXml
	 * @return	null
	 * @author	Stephane F
	 **/
	public function __construct($default_lang) {

		# Appel du constructeur de la classe plxPlugin (obligatoire)
		parent::__construct($default_lang);

		# droits pour accèder à la page config.php du plugin
		$this->setConfigProfil(PROFIL_ADMIN);

		# Déclarations des hooks		
		$this->addHook('IndexEnd', 'IndexEnd');
	}
	/**
	 * Méthode de modification des url
	 *
	 * @return	stdio
	 * @author	Cyril MAGUIRE
	 **/
	public function IndexEnd() {
		if (!empty($this->getParam('subdom'))) {
			$string = '$output = str_replace(array(plxUtils::getRacine().\'data/images/\',\'data/images/\'), \''.$this->getParam('subdom').'\', $output);
			';
			echo "<?php ".$string."?>";
		}
	}
}
 ?>