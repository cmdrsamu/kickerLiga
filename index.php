<?php
// config files
include ('config.php');
error_reporting(E_ALL);

// header
include ('header.php');

include('kickerLib.php');

//now add the main area
echo "<div id='main'>";
echo "<div id='ueber'>Letzten 10 Spiele</div>";
$sql_te = mysql_query("SELECT id FROM games ORDER BY Id DESC LIMIT 10");
$check_name = mysql_num_rows($sql_te);
echo "<table><tr bgcolor='#ed8b00'><td width='300px'>Team 1</td><td width='100px'>Ergebnis</td><td width='300px'>Team 2</td><td width='200px'>Datum</td><td>Details</td></tr>";
 // we need some empty vars
$nickname2_2 = '';
$nickname1_1 = '';

for ($i=0;$i<$check_name;$i++)
{
		$gameID = mysql_result($sql_te,$i, "id");
		$data = getGameDetails($gameID);

		$date = $data[2];
		//load data team 1
		$player1 = $data[3];
		$player1_1 = $data[4];
		$nickname1 = getPlayerNick($player1);
		if ($player1_1 != 0)
		{
			$nickname1_1 = getPlayerNick($player1_1);	
		}
		//load data team 2
		$player2 = $data[5];
		$player2_2 = $data[6];
		
		$nickname2 = getPlayerNick($player2);
		if ($player2_2 != 0)
		{
			$nickname2_2 = getPlayerNick($player2_2);	
		}
	
		
		echo "<tr><td><a href='player.php?id=$player1'>$nickname1</a>";
		if ($nickname1_1 != '')
		{
			echo " / <a href='player.php?id=$player1_1'>$nickname1_1</a>";
		}
		echo "</td><td><img src='/img/$data[0]_small.png'><img src='/img/$data[1]_small.png'></td><td><a href='player.php?id=$player2'>$nickname2</a>";
		if ($nickname2_2 != '')
		{
			echo " / <a href='player.php?id=$player2_2'>$nickname2_2</a>";
		}
		echo "</td><td>$date</td><td><a href='game.php?id=$gameID'>[ Details ]</a></tr>";

		//reset the nicknames
		$nickname1_1 = '';
		$nickname2_2 = '';
		
}
echo "</table>";

echo "</div>";
//now add the left side panel
echo "<div id='rightSide'>";
echo "<div id='ueber'>Spieler</div>";
$sql_te = mysql_query("SELECT * FROM players");
$check_name = mysql_num_rows($sql_te);

for ($i=0;$i<$check_name;$i++)
{
		$v_id_sel = mysql_result($sql_te,$i, "id");
		$v_name_sel = getPlayerNick($v_id_sel);
		echo "<a href='player.php?id=$v_id_sel'>$v_name_sel</a><br>";

}
echo "</div>";

?>
