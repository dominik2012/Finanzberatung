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
        $( "#draggable" ).draggable();
    });
</script>
</head>
<!----------------------------------------------------------------------------->   
<body>
    
<!-- FUNKTIONSFILTER ---------------------------------------------------------->   
<div style="function" id="function">
    <div style="function_name" id="function_name"><p>FUNKTIONSFILTER</p></div>

    <div class="form">
		<?php  $form = $this->beginWidget('CActiveForm', array(
			'id'=>'neu-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
			'validateOnSubmit'=>true,
                        ),
                )); ?>

		<?php  echo $form->errorSummary($model2); ?>

		<div class="row">
			<?php echo "Grobphasen: ".$form->checkBoxList($model2,'grobphase_id',array('0'=>'0','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10',),array('separator'=>'','template'=>'<li style="display:inline; padding-left:10px;">{label}{input}</li>',)); 
                        ?>
		</div>
		
		<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
		</div>

		<?php $this->endWidget(); ?>
	</div>
</div>
<!-- ENDE --------------------------------------------------------------------->   
    
<!-- VIEWFILTER --------------------------------------------------------------->    
<div style="viewfilter" id="viewfilter">
    <div style="view_name" id="view_name"><p>ANZEIGEFILTER</p></div>
</div>
    
<div id="draggable">
    <div id="dragbutton">FUNKTIONSFILTER</div>
    <div id="dragcontent">
		<form name="anzeigefilter" id="anzeigefilter">
		<select id="multiselect" data-placeholder="Anzeigefilter" style="width:350px;" multiple="multiple">
                <?php
			for ($i=0;$i<count($model5);$i++){
                            //Aussortieren von unnötigen Spalten
                            if($model6[$i] == "ID" || $model6[$i] == "Nummer" || $model6[$i] == "Name" || $model6[$i] == "Unterphase" || $model6[$i] == "Grobphase"){
                            
                            }else{
                                echo '<option value="'.$model5[$i].'" id="'.$model5[$i].'" name="'.$model5[$i].'");>'.$model6[$i].'</option>';
                            }	
			}    
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
                    <td>Filter: <?php if(isset($model4)){echo "Grobphase(n): ".($model4);}?></td>

                </tr>
            </tbody>
        </table>
    </div>
    
<!-- ACCORDION ---------------------------------------------------------------->    
<div id="multiAccordion">
   <?php
    if(isset($model3)){
	for($i=0;$i<count($model3);$i++){
            
            $fktNr = $model3[$i]["nummer"];
            $fktName = $model3[$i]["name"];
            $phaseName = $grobphase[$model3[$i]["grobphase_id"]]["name"];
            $phaseNr = $grobphase[$model3[$i]["grobphase_id"]]["grobphase_id"];
            $uphaseNr = $model3[$i]["unterphase_id"];
            
            //Ausgabe Accordion_________________________________________________
            echo 
            '<h3>
                <div>
                    <div style="float: left;">['.$fktNr.']&nbsp;'.$fktName.'</div>
                    <div id="grobphaseR">'.$phaseName.'&nbsp;['.$phaseNr.']['.$uphaseNr.']</div>
                </div>
            </h3>
                    
             <div style="height: 205px;">
                <div id="'.$i.'" style="width: 10000px;">';

			for($j=0;$j<count($model5);$j++){
                            $key = $model5[$j];
                            $key2 = $model6[$j];
                            
                            //Ausgabe Inhalt pro Accordion______________________
                            echo '
                            <li class="'.$key.'" id="'.$key.'" style="display: none;">
                                <div class="toggler" id="toggle'.$j.'"><p class="spalte_fct">'.$key2.'</p></div>
                                <div class="toggle toggle'.$j.'_content" id="toggle'.$j.'_content"><span>'.$model3[$i][$key].'</span></div>
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

<!-- Scripte ------------------------------------------------------------------>


<!-- MULTISELECT -------------------------------------------------------------->   
<script type="text/javascript"> 

    $("#multiselect").multiselect({
        selectedText: "# of # selected"
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

</body>
</html>