<?php

class hirBekuldes_Model
{
	public function get_data($vars)
	{
		$connection = Database::getConnection();
		$retData['eredmeny'] = "";

		$bejelentkezes = $vars['username'];
		$ido = date('Y-m-d H:i:s');
		$szoveg = $vars['szoveg'];

				$sql = "INSERT INTO hirek (id, bejelentkezes, ido, szoveg) VALUES('', '$bejelentkezes', '$ido', '$szoveg')";
				$stmt = $connection->query($sql);

		$retData['uzenet'] = "Sikeresen beküldve!";
		return $retData;
	}
}

?>
