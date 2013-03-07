<?php 
	error_reporting(-1);
	ini_set('display_errors', '1');
	include("pgconnection.php");
?>
<table class="table table-striped table-bordered" id="example" border="0" cellpadding="0" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th width="10%">#</th>
            <th width="17.5%">Naam</th>
            <th width="17.5%">Logo-URL</th>
            <th width="17.5%">Website</th>
            <th width="17.5%">Tekst</th>
            <th width="20%"></th>
        </tr>
    </thead>
<?
	$basa = "'sponsor.php'";
	$prefa = "o";
	$pref = "'$prefa'";
	echo '<tr><td><input type="text" class="input" id="o_id" width="10%" style="width:25px;" readonly value="--"></td><td><input type="text" class="input" id="o_name"></td><td><input type="text" class="input" id="o_logo"></td><td><input type="text" class="input" id="o_web"></td><td><input type="text" class="input" id="o_tekst"></td><td><input type="button" value="Leeg" class="btn" onclick="empty('.$pref.')">&nbsp;&nbsp;&nbsp;<input type="button" id="'.$prefa.'_btn" class="btn btn-primary" value="Toevoegen" onclick="submitModAdd('."$basa,$pref".')"></td></tr>';
	$query="SELECT id,name,urllogo,website,tekst FROM sponsors";
	$rs = pg_query($con, $query) or die("Cannot execute query: $query\n");
	$buttons0 = '<td><input type="button" value="Bewerken" class="btn btn-warning" onclick="edit('."$pref,";
	$buttons1 = ')">&nbsp;&nbsp;&nbsp;<input type="button" value="Verwijderen" class="btn btn-danger" onclick="removeId('."$basa,$pref,";
	$buttons2 = ')"></td>';
while($row = pg_fetch_row($rs)) {
	$id = $row[0];
	$name = $row[1];
	$logo = $row[2];
	$webs = $row[3];
	$teks = $row[4];
	echo "<tr><td>$id</td><td>$name</td><td>$logo</td><td>$webs</td><td>$teks</td>$buttons0$id$buttons1$id$buttons2</tr>\n";
}
pg_close($con);
?>
</table>
