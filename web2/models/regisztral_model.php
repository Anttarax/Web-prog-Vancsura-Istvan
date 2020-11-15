<?php

class Regisztral_Model
{
	public function get_data($vars)
	{
		$connection = Database::getConnection();
		$retData['eredmeny'] = "";

		$csaladi_nev = $vars['lastname'];
		$utonev = $vars['firstname'];
		$bejelentkezes = $vars['login'];
		$jelszo = sha1($vars['password']);

		$sql = "select id, csaladi_nev, utonev, jogosultsag from felhasznalok where bejelentkezes='".$vars['login']."' and jelszo='".sha1($vars['password'])."'";
		$stmt = $connection->query($sql);
		$felhasznalo = $stmt->fetchAll(PDO::FETCH_ASSOC);
		switch(count($felhasznalo)) {
			case 0:
				$sql = "INSERT INTO felhasznalok (id, csaladi_nev, utonev, bejelentkezes, jelszo, jogosultsag) VALUES('','$csaladi_nev','$utonev','$bejelentkezes','$jelszo','_1_')";
				$stmt = $connection->query($sql);
						$retData["uzenet"] = "Sikeres regisztráció";
				break;
			case 1:
			$retData["eredmeny"] = "ERROR";
			$retData["uzenet"] = "Már létezik ilyen felhasználó";
				break;
		}
		return $retData;
	}
}

?>
