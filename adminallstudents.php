<?php 
	error_reporting(-1);
	ini_set('display_errors', '1');
	include("pgconnection.php");
?>
<table class="table table-striped table-bordered" id="example" border="0" cellpadding="0" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th width="10%">#</th>
            <th width="23%">S-nummer</th>
            <th width="24%">Naam</th>
            <th width="23%">Richting</th>
            <th width="20%"></th>
        </tr>
    </thead>
<?
	$basa = "'student.php'";
	$prefa = "s";
	$pref = "'$prefa'";
	echo '<tr><td><input type="text" class="input" id="s_id" width="10%" style="width:25px;" readonly value="--"></td><td><input type="text" class="input" id="s_snummer"></td><td><input type="text" class="input" id="s_name"></td><td>
	<select id="s_dirid" data-provide="typeahead" data-items="4"  name="direction">';
	$query = "SELECT id,name FROM richtingen";
	$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
	while($row = pg_fetch_row($rs)) {
		echo "<option value=\"$row[0]\">$row[1]</option>";
	}
	echo '</select></td><td><input type="button" value="Leeg" class="btn" onclick="empty('.$pref.')">&nbsp;&nbsp;&nbsp;<input type="button" id="'.$prefa.'_btn" class="btn btn-primary" value="Toevoegen" onclick="submitModAdd('."$basa,$pref".')"></td></tr>';
	$query="SELECT s.id,s.snummer,s.name,r.name FROM studenten AS s, richtingen AS r WHERE s.richting = r.id";
	$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
	$buttons0 = '<td><input type="button" value="Bewerken" class="btn btn-warning" onclick="edit('."$pref,";
	$buttons1 = ')">&nbsp;&nbsp;&nbsp;<input type="button" value="Verwijderen" class="btn btn-danger" onclick="removeId('."$basa,$pref,";
	$buttons2 = ')"></td>';
while($row = pg_fetch_row($rs)) {
	$id = $row[0];
	$name = $row[2];
	$snum = $row[1];
	$rich = $row[3];
	echo "<tr><td>$id</td><td>$snum</td><td>$name</td><td>$rich</td>$buttons0$id$buttons1$id$buttons2</tr>";
}
pg_close($con);
?>
</table>
