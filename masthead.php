<?php
$array = array(array("Start","index.php"),array("Scorebord","scorebord.php"),array("Uitslagen","uitslagen.php"),array("Activiteiten","activiteiten.php"),array("Sponsors","sponsors.php"),array("Over","about.php"));
$adminarray = array(array("Begin","admin.php"),array("Basis","adminbasic.php"),array("Studenten","adminstudents.php"),array("Uitslagen","adminuitslagen.php"));
echo('<div class="navbar"><div class="navbar-inner">');
echo('<ul class="nav pull-right">');
if(isset($admin)) {
	foreach($adminarray as $item){
		if($name === $item[0]){
			echo('<li class="active"><a href="#">'.$item[0].'</a></li>');
		}
		else {
			echo('<li><a href="'.$item[1].'">'.$item[0].'</a></li>');
		}
	}
	echo('</ul><a class="brand" href="#">KULAK 24 uur <span class="label label-important">admin</span></a>');
} else {
	foreach($array as $item){
		if($name === $item[0]){
			echo('<li class="active"><a href="#">'.$item[0].'</a></li>');
		}
		else {
			echo('<li><a href="'.$item[1].'">'.$item[0].'</a></li>');
		}
	}
	echo('</ul><a class="brand" href="#">KULAK 24 uur</a>');
}
echo('</div></div>');
?>
