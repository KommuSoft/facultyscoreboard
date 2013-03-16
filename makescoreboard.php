<?php
$glob = array();
function cmp($a, $b) {
	global $glob;
    $sa = $glob[$a['id']]['sum'];
    $sb = $glob[$b['id']]['sum'];
    return $sb-$sa;
}

function makescoreboard ($columns, $rowtypes, $rows, $values, $total) {
	echo '<table class="table table-striped table-hover table-condensed table-bordered"><thead><tr><th style="vertical-align:middle; text-align:center;">#</th><th>'.$rowtypes.'</th>';
	foreach($columns as $col) {
	  echo '<th class="numeric" style="vertical-align:middle; text-align:right;">'.$col['name'].'</th>';
	}
	echo '<th class="numeric" style="vertical-align:middle; text-align:right;"><img src="img/sigma.png" width="24" height="24" alt="som" title="som"></th></tr></thead>';#<th width=100></th>
	$rank = 1;
	$sum = 0;
	$rowi = 0;
	foreach($rows as $row) {
		$sum = 0;
		$ri = $row['id'];
		if(array_key_exists($ri, $values)) {
		  foreach($columns as $col) {
		  		$ci = $col['id'];
		  		if(array_key_exists($ci, $values[$ri])) {
		  			$sum = $sum+$values[$ri][$ci];
				}
		  }
		}
		$values[$ri]['sum'] = $sum;
		$rowi++;
	}
	global $glob;
	$glob = $values;
	uasort($rows,'cmp');
	foreach($rows as $row) {
		$sum = 0;
		$ri = $row['id'];
		echo '<tr><td valign="middle" style="vertical-align:middle; text-align:center;"><span class="label">'.$rank.'</span></td><td valign="middle" style="vertical-align:middle; text-align:left;">'.$row['name'].'</td>';
		if(array_key_exists($ri, $values)) {
		  foreach($columns as $col) {
		  		$ci = $col['id'];
		  		if(array_key_exists($ci, $values[$ri])) {
		  			$val = $values[$ri][$ci];
				}
				else {
					$val = 0;
				}
				echo '<td class="numeric" valign="middle" style="vertical-align:middle; text-align:right;">'.$val.'</td>';
				$sum = $sum+$val;
		  }
		  $sum = $values[$ri]['sum'];
		}
		else {
			foreach($columns as $col) {
				echo '<td class="numeric" valign="middle" style="vertical-align:middle; text-align:right;">0</td>';
			}
		}
		echo '<td align="right" valign="middle" class="numeric" style="vertical-align:middle; text-align:right;"><b>'.$sum.'</b></td></tr>';#<td valign="middle" style="vertical-align:middle;"><div class="progress" valign="middle" style="vertical-align:middle height:10px;"><div class="bar" style="width: '.floor(100*$sum/$total).'%;"/></div></td>
		$rank = $rank+1;
	}
	echo '</table><br>';
	if($total > 0) {
		echo '<div class="progress" id="prgbar" width="100%">';
		$colors = array('info','success','warning','danger');
		$i = 0;
		foreach($rows as $row) {
			$ri = $row['id'];
			if(array_key_exists($ri, $values)) {
				$sum = $values[$ri]['sum'];
				$rn = $row['name'];
				$p = 100*$sum/$total;
				$el = $colors[$i];
				$i = $i+1;
				if($i >= count($colors)) {
					$i = 0;
				}
				echo "<div title=\"$rn\" class=\"bar bar-$el\" style=\"width: $p%;\" id=\"prgwidth\">$rn</div>";
			}
		}
		echo '</div>';
	}
}
?>
