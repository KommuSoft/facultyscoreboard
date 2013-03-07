<!DOCTYPE html>
<?php 
	error_reporting(-1);
	ini_set('display_errors', '1');
	$name = "Basis";
	$admin = 1;
	include("checkadminredirect.php");
?>
<html lang="nl"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>KULAK 24 uur - basis admin</title>
    <?php include("head.php"); ?>
  </head>

  <body>
  
<script language="javascript">
function removeId(base,pref,id) {
    var form = document.createElement("form");
    form.setAttribute("method","post");
    form.setAttribute("action","rem"+base);
    
	var hiddenField = document.createElement("input");
    hiddenField.setAttribute("type", "hidden");
    hiddenField.setAttribute("name", "r"+pref+"_id");
    hiddenField.setAttribute("value", id);
    form.appendChild(hiddenField);

    document.body.appendChild(form);
    form.submit();
}
function submitModAdd (base,pref) {
	var form = document.createElement("form");
    form.setAttribute("method","post");
    
    var mod;
    
	if(document.getElementById(pref+"_id").value == "--") {
		mod = "a";
	    form.setAttribute("action","add"+base);
	}
	else {
		mod = "m";
	    form.setAttribute("action","mod"+base);
	    
	    var hiddenField = document.createElement("input");
		hiddenField.setAttribute("type", "hidden");
		hiddenField.setAttribute("name", "m"+pref+"_id");
		hiddenField.setAttribute("value", document.getElementById(pref+"_id").value);
		form.appendChild(hiddenField);
	}
	
    var tgid, tgrest;
    var added = "";
   	var allTags = document.body.getElementsByTagName('*');
    for (var tg = 0; tg< allTags.length; tg++) {
    	var tag = allTags[tg];
		if (tag.id) {
	    	tgid = tag.id;
	    	tgres = tgid.substring(2);
			if(tgid.substring(0,2) == pref+"_" && tgres != "btn" && tgres != "id") {
				var hiddenField = document.createElement("input");
				hiddenField.setAttribute("type", "hidden");
				hiddenField.setAttribute("name", mod+tgid);
				hiddenField.setAttribute("value", document.getElementById(tgid).value);
				added = mod+tgid+"/"+document.getElementById(tgid).value+"\n";
				form.appendChild(hiddenField);
			}
		}
    }
	
	document.body.appendChild(form);
	form.submit();
}
function empty (pref) {
	document.getElementById(pref+"_id").value = "--";
	document.getElementById(pref+"_btn").value = "Toevoegen";
}
function edit (pref,id) {
	document.getElementById(pref+"_id").value = id;
	document.getElementById(pref+"_btn").value = "Bewerken";
}
</script>
  
  	<?php include("javascript.php"); ?>

    <div align="center" class="container">

      <?php include("masthead.php"); ?>

      <hr>

      <div class="jumbotron">
        <h1>KULAK 24 uur basis admin</h1>
		<!--<p class="lead">Tekst??</p>-->
      </div>

      <hr>

<ul id="MainTabs" class="nav nav-tabs">  
	<li><a data-target="#fac" data-toggle="tab" id="tabfac" href="/adminfaculteiten.php"><i class="icon-home"></i>Faculteiten</a></li>  
	<li><a data-target="#ric" data-toggle="tab" id="tabric" href="/adminrichtingen.php"><i class="icon-road"></i>Richtingen</a></li>   
	<li><a data-target="#dis" data-toggle="tab" id="tabdis" href="/admindisciplines.php"><i class="icon-flag"></i>Disciplines</a></li>   
	<li><a data-target="#use" data-toggle="tab" id="tabuse" href="/admingebruikers.php"><i class="icon-user"></i>Gebruikers</a></li>
	<li><a data-target="#stu" data-toggle="tab" id="tabstu" href="/adminallstudents.php"><i class="icon-list"></i>Studenten</a></li>
	<li><a data-target="#res" data-toggle="tab" id="tabres" href="/adminallresults.php"><i class="icon-th-list"></i>Uitslagen</a></li>
	<li><a data-target="#spo" data-toggle="tab" id="tabspo" href="/adminsponsors.php"><i class="icon-gift"></i>Sponsors</a></li>
	<li><a data-target="#tek" data-toggle="tab" id="tabtek" href="/admintekst.php"><i class="icon-pencil"></i>Teksten</a></li>
</ul>
<div class="tab-content">
  <div class="tab-pane" id="fac">Bezig met laden...</div>
  <div class="tab-pane" id="ric">Bezig met laden...</div>
  <div class="tab-pane" id="dis">Bezig met laden...</div>
  <div class="tab-pane" id="use">Bezig met laden...</div>
  <div class="tab-pane" id="stu">Bezig met laden...</div>
  <div class="tab-pane" id="res">Bezig met laden...</div>
  <div class="tab-pane" id="spo">Bezig met laden...</div>
  <div class="tab-pane" id="tek">Bezig met laden...</div>
</div>

      <hr>
      
      	<?php include("javascript.php"); ?>
	<script>
	$('[data-toggle="tab"]').click(function(e) {
	    e.preventDefault()
    	var loadurl = $(this).attr('href')
	    var targ = $(this).attr('data-target')
	    $.get(loadurl, function(data) {
	        $(targ).html(data)
		});
	    $(this).tab('show')
	});
	$(function() {
	  $("#MainTabs").tab();
	  $("#MainTabs").bind("show", function(e) {    
    	var contentID  = $(e.target).attr("data-target");
    	var contentURL = $(e.target).attr("href");
	    if (typeof(contentURL) != 'undefined')
    	  $(contentID).load(contentURL, function(){ $("#MainTabs").tab(); });
	    else
    	  $(contentID).tab('show');
  });
<?php
	$actab = "fac";
	if (array_key_exists("tab", $_GET)) {
		$actab = $_GET["tab"];
	}
  echo "$('#tab$actab').tab('show');";
?>
});
	</script>

      <?php
	  pg_close($con);
      include("footer.php");
      ?>

    </div> <!-- /container -->
    
    <script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('#tabs').tab();
    });
	</script>

</body></html>
