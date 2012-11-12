<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>accordion demo</title>
    
    <link rel="stylesheet" href="/finanzberatung/jquery-ui/css/custom-theme/jquery-ui-1.9.0.custom.css">
    <script src="/finanzberatung/jquery-ui/js/jquery-1.8.2.js"></script>
    <script src="/finanzberatung/jquery-ui/js/jquery-ui-1.9.0.custom.js"></script>
    
    <link rel="stylesheet" href="/finanzberatung/jquery-horizontal/css/liteaccordion.css">
    <script src="/finanzberatung/jquery-horizontal/js/liteaccordion.jquery.js"></script>
    <script src="/finanzberatung/jquery-horizontal/js/jquery.easing.1.3.js"></script>

    
    
</head>
<body>

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
			<?php echo "Grobphasen: ".$form->checkBoxList($model2,'grobphase_id',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10',),array('separator'=>'','template'=>'<li style="display:inline; padding-left:10px;">{label}{input}</li>',)); 
                        ?>
		</div>
		
		<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
		</div>

		<?php $this->endWidget(); ?>
	</div>
</div>
 
<div style="viewfilter" id="viewfilter">
    <div style="view_name" id="view_name"><p>ANZEIGEFILTER</p></div>
	<div>
		<form name="anzeigefilter">
		<?php
			
			for ($i=0;$i<count($model5);$i++){
				echo '<label for="'.$model5[$i].'filter">'.$model5[$i].': </label>';
				echo '<input type="checkbox" id="'.$model5[$i].'filter" name="'.$model5[$i].'" onClick=showtab("'.$model5[$i].'");><br>';
			}
                ?>
		</form>
	</div>
</div>
    <div id="contentarea">
<div>
<table id="filterlist">
<tbody>
<tr>
<td>Filter: <?php if(isset($model4)){echo "Grobphase(n): ".($model4);}?></td>

</tr>
</tbody>
</table>
</div>    
<div id="accordion">
   <?php
    if(isset($model3)){
	for($i=0;$i<count($model3);$i++){
                                
            echo 
            '<h3><div><div style="float: left;">'.$model3[$i]["name"].'</div><div style="float: right;">Grobphase '.$model3[$i]["grobphase_id"].'</div></div></h3>
             <div style="overflow: scroll; min-height: 210px;">
                <div id="'.$i.'" style="width: 10000px;">';

			for($j=0;$j<count($model5);$j++){
					$key = $model5[$j];

                        echo '
                        <li class="'.$key.'" id="'.$key.'" style="display:none;">
                            <div class="toggler" id="toggle'.$j.'" style="float: left; height: 200px; width: 25px; background-color: #aaa;"><p style="-webkit-transform: rotate(90deg); margin-top: 10px;">'.$key.'</p></div>
                            <div class="toggle" id="toggle'.$j.'_content" style="float: left; width: 300px;"><span>'.$model3[$i][$key].'</span></div>
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

<script type="text/javascript">
    //<![CDATA[
    $(document).ready(function() {
        $('.toggle').hide();
        $('.toggler').click( function() {
          var target = this.id + '_content';
          // Use ID-selectors to toggle a single element.
          $('#' + target).toggle();
          // Use class-selectors to toggle groups of elements.
          $('.' + target).toggle();
          $('.toggle.always').toggle();
        });
        $('#toggle_everything').click( function() { $('.toggle').toggle(); });
    });
    //]]>
</script>        
        
<script>
    $( "#accordion" ).accordion({ heightStyle: "content", collapsible: true });
	
	function showtab(name){
		var current_vis = document.getElementById(name).style.display;
		if(current_vis!="none"){
			for(var i=0;$i<<?php echo count($model);?>;i++){
			document.getElementsByClassName(name)[i].style.display="none";
			}
			}
		else{
			for(var i=0;i<<?php echo count($model);?>;i++){
			document.getElementsByClassName(name)[i].style.display="block";
			}
			}
		}
</script>

</body>
</html>