<?php
// config files
include ('config.php');
error_reporting(E_ALL);

// header
include ('header.php');
include ('kickerLib.php');
//=========================
//===	rightSide	===
//=========================
echo "<div id='main'>";
//we generate a list with playerTopRank by Ratio
$playerList = getAllPlayerID();
$playerRatio = array();
for ($i=0;$i<sizeof($playerList);$i++)
{
	$playerRatio[$playerList[$i]] = getWinRatio($playerList[$i]);
}
arsort($playerRatio);
echo "<h2>TopSpieler bei Siegquote</h2><table><tr bgcolor='#ed8b00'><td width='300'>Player</td><td width='100'>Siegquote</td></tr>";	
foreach ($playerRatio as $key => $val) {
    $nick = getPlayerNick($key);
    echo "<tr><td><a href='player.php?id=$key'>$nick</a></td><td>$val %</td></tr>";
}

echo "</table></div>";

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
