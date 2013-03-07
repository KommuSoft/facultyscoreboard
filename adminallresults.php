<?php 
	error_reporting(-1);
	ini_set('display_errors', '1');
	include("pgconnection.php");
?>
<table class="table table-striped table-bordered" id="example" border="0" cellpadding="0" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th width="10%">#</th>
            <th width="23%">Student</th>
            <th width="24%">Discipline</th>
            <th width="23%">Punten</th>
            <th width="20%"></th>
        </tr>
    </thead>
<?
	$basa = "'points.php'";
	$prefa = "p";
	$pref = "'$prefa'";
	echo '<tr><td><input type="text" class="input" id="p_id" width="10%" style="width:25px;" readonly value="--"></td><td>
	<select id="p_sid" data-provide="typeahead" data-items="4"  name="direction">';
	$query = "SELECT id,name,snummer FROM studenten";
	$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
	while($row = pg_fetch_row($rs)) {
		echo "<option value=\"$row[0]\">$row[1] ($row[2])</option>";
	}
	echo '</select></td><td><select id="p_iid" data-provide="typeahead" data-items="4"  name="direction">';
	$query = "SELECT id,name FROM disciplines";
	$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
	while($row = pg_fetch_row($rs)) {
		echo "<option value=\"$row[0]\">$row[1]</option>";
	}
	echo '</select></td><td><input type="text" class="input" id="p_points"></td><td><input type="button" value="Leeg" class="btn" onclick="empty('.$pref.')">&nbsp;&nbsp;&nbsp;<input type="button" id="'.$prefa.'_btn" class="btn btn-primary" value="Toevoegen" onclick="submitModAdd('."$basa,$pref".')"></td></tr>';
	$query="SELECT p.id,s.name,d.name,p.points FROM punten AS p, disciplines AS d, studenten AS s WHERE p.student = s.id AND p.discipline = d.id";
	$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
	$buttons0 = '<td><input type="button" value="Bewerken" class="btn btn-warning" onclick="edit('."$pref,";
	$buttons1 = ')">&nbsp;&nbsp;&nbsp;<input type="button" value="Verwijderen" class="btn btn-danger" onclick="removeId('."$basa,$pref,";
	$buttons2 = ')"></td>';
while($row = pg_fetch_row($rs)) {
	$id = $row[0];
	$st = $row[1];
	$di = $row[2];
	$po = $row[3];
	echo "<tr><td>$id</td><td>$st</td><td>$di</td><td>$po</td>$buttons0$id$buttons1$id$buttons2</tr>";
}
pg_close($con);
?>
</table>
