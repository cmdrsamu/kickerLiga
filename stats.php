<?php
// config files
include ('config.php');
error_reporting(E_ALL);

// header
include ('header.php');
include ('kickerLib.php');

echo "<div id='main'>tbd</div>";

//=========================
//===	rightSide	===
//=========================
echo "<div id='rightSide'>";
$foo = getOverallGames();
echo "<h4>Spiele gesamt:</h4>";
for ($i=0;$i<sizeof($foo);$i++)
{
	echo "<img src='img/$foo[$i]_small.png'>";
}
echo "</div>";

?>
