<?php

class hirBekuldes_Controller
{
	public $baseName = 'hirBekuldes';  //meghat�rozni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router �ltal tov�bb�tott param�tereket kapja
	{
		$hirBekuldesModel = new hirBekuldes_Model;  //az oszt�lyhoz tartoz� modell
		//a modellben bel�pteti a felhaszn�l�t
		$retData = $hirBekuldesModel->get_data($vars);
		if($retData['uzenet'] == "Sikeresen beküldve!")
			$this->baseName = "hirek";
		//bet�ltj�k a n�zetet
		$view = new View_Loader($this->baseName.'_main');
		//�tadjuk a lek�rdezett adatokat a n�zetnek
		foreach($retData as $name => $value)
			$view->assign($name, $value);
	}
}

?>
