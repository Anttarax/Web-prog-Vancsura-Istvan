<h2>Hír beküldése</h2>
<form action="<?= SITE_ROOT ?>hirBekuldes" method="post">
<label for="username">Küldés, mint: </label><input type="text" name="username" id="username" value =<?= $_SESSION['username']?> required readonly><br>
<textarea name="szoveg" rows="8" cols="80"></textarea><br>
<input type="submit" value="Küldés">
</form>
<h2><br><?= (isset($viewData['uzenet']) ? $viewData['uzenet'] : "") ?><br></h2>
<h2>Hírek</h2>
<?php
$connection = Database::getConnection();
$sql = "SELECT id, bejelentkezes, ido, szoveg FROM hirek";
$stmt = $connection->query($sql);
$hirek = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($hirek as $hir ) {
  echo "<p> Írta: ".$hir['bejelentkezes'];
  echo "<p> Beküldés időpontja: <p>".$hir['ido'];
  echo "<p> Üzenet: <p>".$hir['szoveg'];
  echo "<p>---------------------<p>";
}

?>
