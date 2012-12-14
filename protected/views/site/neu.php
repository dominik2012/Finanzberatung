<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>accordion demo</title>
    
    <link rel="stylesheet" href="/finanzberatung/jquery-multi/css/jquery-ui-1.8.9.custom/jquery-ui-1.8.9.custom.css">
    <link rel="stylesheet" href="/finanzberatung/multiselect/jquery.multiselect.css">
    <script src="/finanzberatung/jquery-ui/js/jquery-1.8.2.js"></script>
    <script src="/finanzberatung/jquery-ui/js/jquery-ui-1.9.0.custom.js"></script>
    <script src="/finanzberatung/jquery-multi/jquery.multi-accordion-1.5.3.js"></script>
    <script src="/finanzberatung/multiselect/src/jquery.multiselect.js"></script>
    
    <link rel="stylesheet" href="/finanzberatung/chosen-master/chosen/chosen.css">
    <script src="/finanzberatung/chosen-master/chosen/chosen.jquery.js"></script>
    
    <script type="text/javascript">
    //VIEWFILTER
    $(function() {
        $("#draggable" ).draggable();
    });
    </script>
    

</head>
<!----------------------------------------------------------------------------->   
<body>
    
<!-- FUNKTIONSFILTER ---------------------------------------------------------->   
<div style="function" id="function" class="function" onclick="togglestate(this); return false;">
    <div style="function_name" id="function_name"  title="anzeigen/verstecken des Filters"><p>FUNKTIONSFILTER</p></div>

    <div class="form">
	
		<form name="neu_form" id="neu_form" action="/Finanzberatung/index.php?r=site/neu" method="POST">
		
                <div style="margin-bottom: 10px;">
                <div id="functionoverview">ALLGEMEIN</div>
                <div id="functionfilters">    
		Grobphase:<br> 
                <select name="select_grobphase" id="select_grobphase" data-placeholder="Grobphase-Filter" style="width:465px;" multiple="multiple">
                <?php
			for ($i=0;$i<count($model2[1]["grobphase"]);$i++){
                            
                                $nummer = $i;
                                $inhalt = $model2[1]["grobphase"][$i]; 
                                $title = str_replace('"',"&#039;",  shortName($inhalt));
                            
                                echo '<option value="'.$i.'" id="grobphase'.$i.'" name="grobphase'.$i.'" title="'.$title.'");>'.$nummer.'. '.$inhalt.'</option>';
                            	
			}    
                ?>
                </select><br>
                </div>
                    
                <div id="functionfilters">   
		Unterphase:<br> 
                <select name="select_unterphase" id="select_unterphase" data-placeholder="Unterphase-Filter" style="width:465px;" multiple="multiple">
                <?php
			for ($i=0;$i<count($model2[1]["unterphase"]);$i++){
                           
                                $nummer = $i+1;
                                $inhalt = $model2[1]["unterphase"][$i]; 
                                $title = str_replace('"',"&#039;",  shortName($inhalt));
                                
                                echo '<option value="'.$i.'" id="unterphase'.$i.'" name="unterphase'.$i.'" title="'.$title.'");>'.$nummer.'.'.$inhalt.'</option>';
                            	
			}    
                ?>
                </select><br>
                </div>
                    
                
                </div>
                    
                <div style="margin-bottom: 10px; height: 160px;">
                <div id="functionoverview">TYP</div>
                <div style="float: left;">    
                <div id="functionfilters">   
		Privat mit Beratung:<br> 
                <select name="select_privmb" id="select_privmb" data-placeholder="Privmb-Filter" multiple="multiple">
                <?php
			for ($i=0;$i<count($model2[1]["privmb"]);$i++){
                                    
                                    $inhalt = $model2[1]["privmb"][$i]; 
                                    
                                    if($inhalt == "gesetzFunktion"){
                                        $inhalt = "Gesetz -> Funktion";
                                    }
                                    else if($inhalt == "funktionGesetz"){
                                        $inhalt = "Funktion -> Gesetz";
                                    }
                                    else{
                                        $inhalt = "Keine Abhängigkeit";
                                    }
                                        
                            
                                echo '<option value="'.$model2[1]["privmb"][$i].'" id="privmb'.$i.'" name="privmb'.$i.'");>'.$inhalt.'</option>';
                            	
			}    
                ?>
                </select><br>
                </div>
                    
                <div id="functionfilters">       
		Professionell mit Beratung:<br> 
                <select name="select_profmb" id="select_profmb" data-placeholder="Profmb-Filter" style="width:165px;" multiple="multiple">
                <?php
			for ($i=0;$i<count($model2[1]["profmb"]);$i++){
                                
                                    $inhalt = $model2[1]["profmb"][$i];    
                                    
                                    if($inhalt == "gesetzFunktion"){
                                        $inhalt = "Gesetz -> Funktion";
                                    }
                                    else if($inhalt == "funktionGesetz"){
                                        $inhalt = "Funktion -> Gesetz";
                                    }
                                    else{
                                        $inhalt = "Keine Abhängigkeit";
                                    }
                            
                                echo '<option value="'.$model2[1]["profmb"][$i].'" id="profmb'.$i.'" name="profmb'.$i.'");>'.$inhalt.'</option>';
                            	
			}    
                ?>
                </select><br>
                </div>
                    
                <div id="functionfilters" style="margin-bottom: 10px;">       
		Reines Ausf&uuml;hrungsgesch&auml;ft:<br> 
                <select name="select_rausfg" id="select_rausfg" data-placeholder="Rausfg-Filter" style="width:165px;" multiple="multiple">
                <?php
			for ($i=0;$i<count($model2[1]["rausfg"]);$i++){
                           
                                    $inhalt = $model2[1]["rausfg"][$i];   
                                    
                                    if($inhalt == "gesetzFunktion"){
                                        $inhalt = "Gesetz -> Funktion";
                                    }
                                    else if($inhalt == "funktionGesetz"){
                                        $inhalt = "Funktion -> Gesetz";
                                    }
                                    else{
                                        $inhalt = "Keine Abhängigkeit";
                                    }
                                    
                                echo '<option value="'.$model2[1]["rausfg"][$i].'" id="rausfg'.$i.'" name="rausfg'.$i.'");>'.$inhalt.'</option>';
                            	
			}    
                ?></select><br>
                </div>
                </div>
                
                <div style="float:left; margin-left: 22px; height: 160px;">
                <div id="functionfilters">   
		Privat ohne Beratung:<br> 
                <select name="select_privob" id="select_privob" data-placeholder="Privob-Filter" style="width:165px;" multiple="multiple">
                <?php
			for ($i=0;$i<count($model2[1]["privob"]);$i++){
                           
                                    $inhalt = $model2[1]["privob"][$i];   
                                    
                                    if($inhalt == "gesetzFunktion"){
                                        $inhalt = "Gesetz -> Funktion";
                                    }
                                    else if($inhalt == "funktionGesetz"){
                                        $inhalt = "Funktion -> Gesetz";
                                    }
                                    else{
                                        $inhalt = "Keine Abhängigkeit";
                                    }
                                    
                                echo '<option value="'.$model2[1]["privob"][$i].'" id="privob'.$i.'" name="privob'.$i.'");>'.$inhalt.'</option>';
                            	
			}    
                ?>
                </select><br>
                </div>               
                    
                <div id="functionfilters">       
		Professionell ohne Beratung:<br> 
                <select name="select_profob" id="select_profob" data-placeholder="Profob-Filter" style="width:165px;" multiple="multiple">
                <?php
			for ($i=0;$i<count($model2[1]["profob"]);$i++){
                                
                                    $inhalt = $model2[1]["profob"][$i];    
                                    
                                    if($inhalt == "gesetzFunktion"){
                                        $inhalt = "Gesetz -> Funktion";
                                    }
                                    else if($inhalt == "funktionGesetz"){
                                        $inhalt = "Funktion -> Gesetz";
                                    }
                                    else{
                                        $inhalt = "Keine Abhängigkeit";
                                    }
                                    
                                echo '<option value="'.$model2[1]["profob"][$i].'" id="profob'.$i.'" name="profob'.$i.'");>'.$inhalt.'</option>';
                            	
			}    
                ?>
                </select><br>
                </div>
                </div>
                </div>
                    
                <div style="margin-bottom: 10px; height: 80px;">    
                <div id="functionoverview">HANDLUNGSSPIELRAUM</div>  
                <div id="functionfilters" style="float: left;">       
		Handlungsspielraum aktuell:<br> 
                <select name="select_hsra" id="select_hsra" data-placeholder="Hsra-Filter" style="width:165px;" multiple="multiple">
                <?php
			for ($i=0;$i<count($model2[1]["hsra"]);$i++){
                           
                                    $inhalt = $model2[1]["hsra"][$i];    
                                
                                    if($inhalt == "gelb"){
                                        $inhalt = "eingeschränkt";
                                    }
                                    else if($inhalt == "gruen"){
                                        $inhalt = "offen";
                                    }
                                    else{
                                        $inhalt = "zukünftig eingeschränkt";
                                    }
                                    
                                echo '<option value="'.$model2[1]["hsra"][$i].'" id="hsra'.$i.'" name="hsra'.$i.'");>'.$inhalt.'</option>';
                            	
			}    
                ?>
                </select><br>
                </div>
                    
                <div id="functionfilters" style="float: left; margin-left: 22px;">       
		Handlungsspielraum zukuenftlich:<br> 
                <select name="select_hsrz" id="select_hsrz" data-placeholder="Hsrz-Filter" style="width:165px;" multiple="multiple">
                <?php
			for ($i=0;$i<count($model2[1]["hsrz"]);$i++){
                           
                                    $inhalt = $model2[1]["hsrz"][$i];    
                                
                                    if($inhalt == "gelb"){
                                        $inhalt = "eingeschränkt";
                                    }
                                    else if($inhalt == "gruen"){
                                        $inhalt = "offen";
                                    }
                                    else{
                                        $inhalt = "zukünft. eingeschränkter";
                                    }
                                    
                                echo '<option value="'.$model2[1]["hsrz"][$i].'" id="hsrz'.$i.'" name="hsrz'.$i.'");>'.$inhalt.'</option>';
                            	
			}    
                ?>
                </select><br>
                </div>
                </div>
                    
                <div style="margin-bottom: 10px;">    
                <div id="functionoverview">FUNKTIONSAUSWAHL</div>    
                <div id="functionfilters" style="margin-bottom: 15px;">   
		Funktionsname:<br> 
                <select name="select_name" id="select_name" data-placeholder="Name-Filter" style="width:465px;" multiple="multiple">
                <?php
			for ($i=0;$i<count($model2[1]["name"]);$i++){
                                
                                $inhalt = $model2[1]["name"][$i];
                                $title = str_replace('"',"&#039;",  shortName($inhalt));
                                    
                                echo '<option value="'.($i+1).'" id="name'.$i.'" name="name'.$i.'" title="'.$title.'");>'.$model2[1]["name"][$i].'</option>';
                            	
			}    
                ?>
                </select><br>  
                </div>
                </div>
				<input type="hidden" name="form_grobphase" value="">
				<input type="hidden" name="form_unterphase" value="">
				<input type="hidden" name="form_name" value="">
				<input type="hidden" name="form_privmb" value="">
				<input type="hidden" name="form_profmb" value="">
				<input type="hidden" name="form_privob" value="">
				<input type="hidden" name="form_profob" value="">
				<input type="hidden" name="form_rausfg" value="">
				<input type="hidden" name="form_hsra" value="">
				<input type="hidden" name="form_hsrz" value=""><br>
                                
                                <div style="float: right; margin-top: -30px; margin-right: 38px;">
				<button class="submit" type="button" name="submitbutton" value="submitbutton" onClick="toInput();"></button>
                                </div>
                                
                                
		</form>
		
	
		<?php /* $form = $this->beginWidget('CActiveForm', array(
			'id'=>'neu-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
			'validateOnSubmit'=>true,
                        ),
                )); */?>

		<?php // echo $form->errorSummary($model2[0]["filter"]); ?>

	<!--	<div class="row">
			<?php //echo "Grobphasen: ".$form->dropDownList($model2[0]["filter"],'grobphase_id',$model2[1]["grobphase"],array('separator'=>'','template'=>'<li style="display:inline; padding-left:10px;">{label}{input}</li>',)); 
                        ?>
		</div>
		
		<div class="row buttons">
		<?php //echo CHtml::submitButton('Submit'); ?>
		</div> -->

		<?php //$this->endWidget(); ?>
	</div>
</div>
<!-- ENDE --------------------------------------------------------------------->   
    
<!-- VIEWFILTER --------------------------------------------------------------->    
<div style="viewfilter" id="viewfilter" onclick="showdiv('draggable')" href="#" title="anzeigen/verstecken des Filters">
    <div style="view_name" id="view_name"><p>ANZEIGEFILTER</p></div>
</div>
    
<div id="draggable" style="display: none;">
    <div id="dragbutton">ANZEIGEFILTER</div>
    <div id="dragcontent">
		<form name="anzeigefilter" id="anzeigefilter">
		<select id="multiselect" data-placeholder="Anzeigefilter" style="width:350px;" multiple="multiple">
                <?php
                        //alter Code Viewfilter
			/*for ($i=0;$i<count($model5);$i++){
                            
                            $inhalt = $model6[$i]; 
                            $title = str_replace('"',"&#039;",  shortName($inhalt));
                            
                            //Aussortieren von unnötigen Spalten
                            if($model6[$i] == "ID" || $model6[$i] == "Nummer" || $model6[$i] == "Name" || $model6[$i] == "Unterphase" || $model6[$i] == "Grobphase"){
                                //do nothing
                            }else{
                                echo '<option value="'.$model5[$i].'" id="'.$model5[$i].'" name="'.$model5[$i].'" title="'.$title.'");>'.$inhalt.'</option>';
                            }*/
                            
                            //Beschreibung
                            echo '<optgroup label="Beschreibung">';            
                            for ($i=3;$i<4;$i++){
                                $inhalt = $model6[$i]; 
                                $title = str_replace('"',"&#039;",  shortName($inhalt));
                                echo '<option value="'.$model5[$i].'" id="'.$model5[$i].'" name="'.$model5[$i].'" title="'.$title.'");>'.$inhalt.'</option>';
                            }
                            echo '</optgroup>';
                            
                            //Beratung
                            echo '<optgroup label="Beratung">';            
                            for ($i=4;$i<8;$i++){
                                $inhalt = $model6[$i]; 
                                $title = str_replace('"',"&#039;",  shortName($inhalt));
                                echo '<option value="'.$model5[$i].'" id="'.$model5[$i].'" name="'.$model5[$i].'" title="'.$title.'");>'.$inhalt.'</option>';
                            }
                            echo '</optgroup>';
                            
                            //Gesetz
                            echo '<optgroup label="Gesetz">';            
                            for ($i=8;$i<10;$i++){
                                $inhalt = $model6[$i]; 
                                $title = str_replace('"',"&#039;",  shortName($inhalt));
                                echo '<option value="'.$model5[$i].'" id="'.$model5[$i].'" name="'.$model5[$i].'" title="'.$title.'");>'.$inhalt.'</option>';
                            }
                            echo '</optgroup>';
                            
                            //Handlungsspielraum
                            echo '<optgroup label="Handlungsspielraum">';            
                            for ($i=10;$i<12;$i++){
                                $inhalt = $model6[$i]; 
                                $title = str_replace('"',"&#039;",  shortName($inhalt));
                                echo '<option value="'.$model5[$i].'" id="'.$model5[$i].'" name="'.$model5[$i].'" title="'.$title.'");>'.$inhalt.'</option>';
                            }
                            echo '</optgroup>';
                            
                            //Personenbeteiligung
                            echo '<optgroup label="Personenbeteiligung">';            
                            for ($i=13;$i<22;$i++){
                                $inhalt = $model6[$i]; 
                                $title = str_replace('"',"&#039;",  shortName($inhalt));
                                echo '<option value="'.$model5[$i].'" id="'.$model5[$i].'" name="'.$model5[$i].'" title="'.$title.'");>'.$inhalt.'</option>';
                            }
                            echo '</optgroup>';
                            
                            //Funktionskopplung
                            echo '<optgroup label="Funktionskopplung">';            
                            for ($i=22;$i<27;$i++){
                                $inhalt = $model6[$i]; 
                                $title = str_replace('"',"&#039;",  shortName($inhalt));
                                echo '<option value="'.$model5[$i].'" id="'.$model5[$i].'" name="'.$model5[$i].'" title="'.$title.'");>'.$inhalt.'</option>';
                            }
                            echo '</optgroup>';
                                                          
			//}    
                ?>
                </select>
		</form>
    </div>
</div>
<!-- ENDE --------------------------------------------------------------------->       
    
<!-- CONTENT MIDDLE ----------------------------------------------------------->       
<div id="contentarea">
    <!-- Filterleiste mit Anzeige für gefilterte Phasen -->
    <div>
        <table id="filterlist">
            <tbody>
                <tr>
                    <td><!--SQL: <?php if(isset($fil)){echo $fil;}?></td>-->
                    
                    <td>GP: <?php if(isset($fil)){echo $model4;}?></td>
                    <td>UP: <?php if(isset($fil)){echo $unterphase;}?></td>
                    <td>Fkt: <?php if(isset($fil)){echo $name;}?></td>
                    <td>PmB: <?php if(isset($fil)){echo $privmb;}?></td>
                    <td>PoB: <?php if(isset($fil)){echo $privob;}?></td>
                    <td>PromB: <?php if(isset($fil)){echo $profmb;}?></td>
                    <td>PromB: <?php if(isset($fil)){echo $profob;}?></td>
                    <td>RAG: <?php if(isset($fil)){echo $rausfg;}?></td>
                    <td>HSR(z): <?php if(isset($fil)){echo $hsrz;}?></td>
                    <td>HSR(g): <?php if(isset($fil)){echo $hsra;}?></td>
                    
                </tr>
            </tbody>
        </table>
    </div>
    
<!-- ACCORDION ---------------------------------------------------------------->    
<div id="multiAccordion">
   <?php
    if(isset($model3) && $model3[0]["id"]!="leer"){
	for($i=0;$i<count($model3);$i++){
            
            $fktNr = $model3[$i]["nummer"];
            $fktName = $model3[$i]["name"];
            $phaseName = $grobphase[$model3[$i]["grobphase_id"]]["name"];
            $phaseNr = $grobphase[$model3[$i]["grobphase_id"]]["grobphase_id"];
            $uphaseNr = $model3[$i]["unterphase_id"];
            $uphaseName = $unterphase2[$uphaseNr]["name"]; 
            
            //keine Unterphase = X
            if($uphaseNr==0){
                $uphaseNr="X";
            }
            
            //Ausgabe Accordion_________________________________________________
            echo 
            '<h3>
                <div>
                    <div id="'.$fktNr.'" class="detail_button" title="Detailansicht der Funktion">
                        <form id="detailForm" name="detailForm" method="GET" action="/Finanzberatung/index.php?r=site/details">
                            <input type="hidden" name="fktNr" id="fktNr" value="'.$fktNr.'">
                        </form>
                    </div>
                    <div style="float: left; margin-left: 35px; font-size: 13px;" title="[Funktion-Nr] Funktion-Name">['.$fktNr.']&nbsp;'.$fktName.' </div>
                    <div id="unterphaseR" title="'.$uphaseName.'">['.$uphaseNr.']</div>                    
                    <div id="grobphaseR" title="Grobphase-Nr. Grobphase-Name">'.$phaseNr.'. '.$phaseName.'&nbsp;</div>
                    
                </div>
            </h3>
                    
             <div style="height: 200px; overflow-y: hidden;">
                <div id="'.$i.'" style="10000px">';

			for($j=0;$j<count($model5);$j++){
                            $key = $model5[$j];
                            $spaName = $model6[$j];
                            $spaInhalt = $model3[$i][$key];
                            $style = "";
                            $style1= " style='width: 52px; overflow: hidden;'";
                            
                            //Grafik Abfragen
                            if($spaInhalt == "gesetzFunktion"){
                                $spaInhalt = "<img title='Funktion bedingt durch Gesetz' src='/Finanzberatung/css/images/pfeile/gesetzFunktion.png' style='padding-top: 70px;'>";
                                $style = $style1;
                            }else if($spaInhalt == "funktionGesetz"){
                                $spaInhalt = "<img title='Gesetz bedingt durch Funktion'src='/Finanzberatung/css/images/pfeile/funktionGesetz.png' style='padding-top: 70px;'>";
                                $style = $style1;
                            }else if($spaInhalt == "keine Abhängig"){
                               if($spaName == "Privat mit Beratung" || $spaName == "Privat ohne Beratung" || $spaName == "Professionell mit Beratung" || $spaName == "Professionell ohne Beratung" || $spaName == "Reines Ausfuehrungsgeschaeft")
                                $spaInhalt = "<img title='Keine Regularien'src='/Finanzberatung/css/images/pfeile/null.png' style='padding-top: 70px;'>";
                                $style = $style1;
                            }else if($spaInhalt == "gelb"){
                                $spaInhalt = "<img title='Geringer Handlungsspielraum'src='/Finanzberatung/css/images/pfeile/gelb.png' style='padding-top: 70px;'>";
                                $style = $style1;
                            }else if($spaInhalt == "gruen"){
                                $spaInhalt = "<img title='Normaler Handlungsspielraum'src='/Finanzberatung/css/images/pfeile/gruen.png' style='padding-top: 70px;'>";
                                $style = $style1;
                            }
                            else if($spaInhalt == "gelbHoch"){
                                $spaInhalt = "<img title='Handlungsspielraum zukünftig weiter eingeschränkt'src='/Finanzberatung/css/images/pfeile/gelbHoch.png' style='padding-top: 70px;'>";
                                $style = $style1;
                            }
                            
                            
                            //Ausgabe Inhalt pro Accordion______________________
                            
                            echo '
                                <li class="'.$key.'" id="'.$key.'" style="display: none;">
                                    <div class="toggler" id="toggle'.$j.'"><p class="spalte_fct">'.$spaName.'</p></div>
                                    <div class="toggle toggle'.$j.'_content" id="toggle'.$j.'_content"'.$style.'><span>'.$spaInhalt.'</span></div>
                                </li>
                            ';
                            
			}
                        
                        
                        
            echo '
                <noscript>
                    <p>Please enable JavaScript to get the full experience.</p>
                </noscript>
              </div>
            </div>';
        }
    
    }?>
   
</div>
<!-- ACCORDION ENDE ----------------------------------------------------------->   


<!-- PHP FUNCTIONS ------------------------------------------------------------>
<?php
    //Bei zu langem Namen -> kürzen u. $title als vollen Namen
    function shortName($inhalt){
        $inhaltL = mb_strlen($inhalt);
        
        if($inhaltL > 55){
            $title = $inhalt;
        }else{
            $title = "";
        }
        
        return $title;
    }
?>
<!-- FUNCTIONS ENDE ----------------------------------------------------------->

<!-- Scripte ------------------------------------------------------------------>

<!-- DETAIL-BUTTON ------------------------------------------------------------>   
<?php if(isset($model3) && $model3[0]["id"]!="leer"){?>
<script type="text/javascript"> 
  $(document).ready(function() {               
        $('.detail_button').click( function(ev) {
          
          var fktNr = this.id;
          //alert(fktNr); //Bis hier her gehts
          
          ev.preventDefault();
          window.open('http://localhost/Finanzberatung/index.php?r=site/details&fktNr='+fktNr, 'Continue to Application');
          //document.details.fktNr.value = fktNr;
          
          //alert(fktNr);
          //alert(document.details.fktNr.value);
          //document.details.submit(); 
          
          return false;
        });
    });
</script>  
<?php } ?>

<!-- FUNKTIONSFILTER SHOW/HIDE ------------------------------------------------>   
<script type="text/javascript"> 
    var State1 = 'function';
    var State2 = State1 + ' functionhover';

    function togglestate(div){
        if (div.className == State1){
            div.className = State2;
        } else {
            div.className = State1;
        }
    }
 
</script>  

<!-- ANZEIGEFILTER SHOW/HIDE -------------------------------------------------->   
<script type="text/javascript"> 
    function showdiv(id){
        
        var current_vis = document.getElementById(id).style.display;
        
        if(current_vis != "none"){
            document.getElementById(id).style.display = "none";
        }
        else{
            document.getElementById(id).style.display = "block";
        }
        showdiv.stopPropagation();
    }
</script>  

<!-- MULTISELECT -------------------------------------------------------------->   
<script type="text/javascript"> 

    $("#multiselect").multiselect({
        header: false,
        height: 500,
        selectedText: "# von # ausgewählt",
        noneSelectedText: 'Wähle deine Spalten'
    });

    $("#multiselect").bind("multiselectclick", function(event, ui){
        
        var value = ui.value;

        var val = '.'+value;

        if($(val).is(':visible')){
            $(val).css('display','none');
        }
        else{
            $(val).css('display','block');
        }
    });
    
    $("#select_grobphase").multiselect({
        selectedText: "# von # ausgewählt",
        height: 344,
        noneSelectedText: 'Wähle deine Grobphase(n)'
    });
	$("#select_grobphase").bind("multiselectclick", function(event, ui){
		
		var value = ui.value;
		});
	$("#select_unterphase").multiselect({
        selectedText: "# von # ausgewählt",
        height: 345,
        noneSelectedText: 'Wähle deine Unterphase(n)'
    });
	$("#select_unterphase").bind("multiselectclick", function(event, ui){
		
		var value = ui.value;
		});	
	$("#select_name").multiselect({
        selectedText: "# von # ausgewählt",
        height: 295,
        noneSelectedText: 'Wähle deine Funktion(en)'
    });
	$("#select_name").bind("multiselectclick", function(event, ui){
		
		var value = ui.value;
		});
	$("#select_privmb").multiselect({
        header: false,
        height: 85,
        selectedText: "# von # ausgewählt",
        noneSelectedText: 'auswählen'        
    });
	$("#select_privmb").bind("multiselectclick", function(event, ui){
		
		var value = ui.value;
		});	
	$("#select_profmb").multiselect({
        header: false,
        height: 85,
        selectedText: "# von # ausgewählt",
        noneSelectedText: 'auswählen'
        
    });
	$("#select_profmb").bind("multiselectclick", function(event, ui){
		
		var value = ui.value;
		});	
	$("#select_privob").multiselect({
        header: false,
        height: 85,
        selectedText: "# von # ausgewählt",
        noneSelectedText: 'auswählen'
    });
	$("#select_privob").bind("multiselectclick", function(event, ui){
		
		var value = ui.value;
		});	
	$("#select_profob").multiselect({
        header: false,
        height: 85,
        selectedText: "# von # ausgewählt",
        noneSelectedText: 'auswählen'
    });
	$("#select_profob").bind("multiselectclick", function(event, ui){
		
		var value = ui.value;
		});
	$("#select_rausfg").multiselect({
        header: false,
        height: 85,
        selectedText: "# von # ausgewählt",
        noneSelectedText: 'auswählen'
    });
	$("#select_rausfg").bind("multiselectclick", function(event, ui){
		
		var value = ui.value;
		});
	$("#select_hsra").multiselect({
        header: false,
        height: 85,
        selectedText: "# von # ausgewählt",
        noneSelectedText: 'auswählen'
    });
	$("#select_hsra").bind("multiselectclick", function(event, ui){
		
		var value = ui.value;
		});
	$("#select_hsrz").multiselect({
        header: false,
        height: 85,
        selectedText: "# von # ausgewählt",
        noneSelectedText: 'auswählen'
    });
	$("#select_hsrz").bind("multiselectclick", function(event, ui){
		
		var value = ui.value;
		});
		
</script>        

<!-- ACCORDION INHALT --------------------------------------------------------->   
<script type="text/javascript">
    //<![CDATA[
    $(document).ready(function() {
        $('.toggle').hide();
        $('.toggler').click( function() {
          var target = this.id + '_content';
          // Use ID-selectors to toggle a single element.
          // $('#' + target).toggle();
          // Use class-selectors to toggle groups of elements.
          $('.' + target).toggle();
          // $('.toggle.always').toggle();
        });
        $('#toggle_everything').click( function() { $('.toggle').toggle(); });
    });
    //]]>
</script>        

<!-- ACCORDION ---------------------------------------------------------------->   
<script type="text/javascript">
	$(function(){
		$('#multiAccordion').multiAccordion();
	});
</script>

<script>
    $( "#accordion" ).accordion({ heightStyle: "content", collapsible: true });
</script>

<script> 
    function toInput(){
			//Zuweisung der Select-Input in Hidden-Textfields
			var bufferGrobphase = "";
			var bufferUnterphase ="";
			var bufferName ="";
			var bufferPrivMB ="";
			var bufferProfMB ="";
			var bufferPrivOB ="";
			var bufferProfOB ="";
			var bufferRausfg ="";
			var bufferHsra ="";
			var bufferHsrz ="";
			var len=document.neu_form.select_grobphase.options.length;
			var len2=document.neu_form.select_unterphase.options.length;
			var len3=document.neu_form.select_name.options.length;
			var len4=document.neu_form.select_profmb.options.length;
			var len5=document.neu_form.select_hsra.options.length;
			var len6=document.neu_form.select_hsrz.options.length;
			var j=0;
			for (var i=0; i<len; i++)
			{
				if (document.neu_form.select_grobphase.options[i].selected && j==0){
                   bufferGrobphase = bufferGrobphase +document.neu_form.select_grobphase.options[i].value;
				   j++;
				}
                else if (document.neu_form.select_grobphase.options[i].selected && j!=0){
                   bufferGrobphase = bufferGrobphase +","+document.neu_form.select_grobphase.options[i].value;
				}
			}
			j=0;
			//alert("hoho");
			for (var i=0; i<len2; i++)
			{
				if (document.neu_form.select_unterphase.options[i].selected && j==0){
                   bufferUnterphase = bufferUnterphase +document.neu_form.select_unterphase.options[i].value;
				   j++;
				}
                else if (document.neu_form.select_unterphase.options[i].selected && j!=0){
                   bufferUnterphase = bufferUnterphase +","+document.neu_form.select_unterphase.options[i].value;
				}
			}
			//alert("hehe");
			j=0;
			for (var i=0; i<len3; i++)
			{
				if (document.neu_form.select_name.options[i].selected && j==0){
                   bufferName = bufferName +document.neu_form.select_name.options[i].value;
				   j++;
				}
                else if (document.neu_form.select_name.options[i].selected && j!=0){
                   bufferName = bufferName +","+document.neu_form.select_name.options[i].value;
				}
			}
			j=0;
			for (var i=0; i<len4; i++)
			{
				if (document.neu_form.select_privmb.options[i].selected && j==0){
                   bufferPrivMB = bufferPrivMB +"'"+document.neu_form.select_privmb.options[i].value+"'";
				   j++;
				}
                else if (document.neu_form.select_privmb.options[i].selected && j!=0){
                   bufferPrivMB = bufferPrivMB +","+"'"+document.neu_form.select_privmb.options[i].value+"'";
				}
			}
			j=0;
			for (var i=0; i<len4; i++)
			{
				if (document.neu_form.select_profmb.options[i].selected && j==0){
                   bufferProfMB = bufferProfMB +"'"+document.neu_form.select_profmb.options[i].value+"'";
				   j++;
				}
                else if (document.neu_form.select_profmb.options[i].selected && j!=0){
                   bufferProfMB = bufferProfMB +","+"'"+document.neu_form.select_profmb.options[i].value+"'";
				}
			}
			j=0;
			for (var i=0; i<len4; i++)
			{
				if (document.neu_form.select_privob.options[i].selected && j==0){
                   bufferPrivOB = bufferPrivOB +"'"+document.neu_form.select_privob.options[i].value+"'";
				   j++;
				}
                else if (document.neu_form.select_privob.options[i].selected && j!=0){
                   bufferPrivOB = bufferPrivOB +","+"'"+document.neu_form.select_privob.options[i].value+"'";
				}
			}
			j=0;
			for (var i=0; i<len4; i++)
			{
				if (document.neu_form.select_profob.options[i].selected && j==0){
                   bufferProfOB = bufferProfOB +"'"+document.neu_form.select_profob.options[i].value+"'";
				   j++;
				}
                else if (document.neu_form.select_profob.options[i].selected && j!=0){
                   bufferProfOB = bufferProfOB +","+"'"+document.neu_form.select_profob.options[i].value+"'";
				}
			}
			j=0;
			for (var i=0; i<len4; i++)
			{
				if (document.neu_form.select_rausfg.options[i].selected && j==0){
                   bufferRausfg = bufferRausfg +"'"+document.neu_form.select_rausfg.options[i].value+"'";
				   j++;
				}
                else if (document.neu_form.select_rausfg.options[i].selected && j!=0){
                   bufferRausfg = bufferRausfg +","+"'"+document.neu_form.select_rausfg.options[i].value+"'";
				}
			}
			j=0;
			for (var i=0; i<len5; i++)
			{
				if (document.neu_form.select_hsra.options[i].selected && j==0){
                   bufferHsra = bufferHsra +"'"+document.neu_form.select_hsra.options[i].value+"'";
				   j++;
				}
                else if (document.neu_form.select_hsra.options[i].selected && j!=0){
                   bufferHsra = bufferHsra +","+"'"+document.neu_form.select_hsra.options[i].value+"'";
				}
			}
			j=0;
			for (var i=0; i<len6; i++)
			{
				if (document.neu_form.select_hsrz.options[i].selected && j==0){
                   bufferHsrz = bufferHsrz +"'"+document.neu_form.select_hsrz.options[i].value+"'";
				   j++;
				}
                else if (document.neu_form.select_hsrz.options[i].selected && j!=0){
                   bufferHsrz = bufferHsrz +","+"'"+document.neu_form.select_hsrz.options[i].value+"'";
				}
			}
			document.neu_form.form_grobphase.value= bufferGrobphase;
			document.neu_form.form_unterphase.value= bufferUnterphase;
			document.neu_form.form_name.value= bufferName;
			document.neu_form.form_profmb.value= bufferProfMB;
			document.neu_form.form_rausfg.value=bufferRausfg;
			document.neu_form.form_hsra.value=bufferHsra;
			document.neu_form.form_hsrz.value=bufferHsrz;
			//alert("hihi");
			document.neu_form.submit();
                        
	}
</script>

</body>
</html>