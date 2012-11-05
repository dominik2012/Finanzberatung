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
			<?php echo $form->labelEx($model2,'grobphase_id'); ?>
			<?php echo $form->textField($model2,'grobphase_id'); ?>
			<?php echo $form->error($model2,'grobphase_id'); ?>
		</div>
		<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
		</div>

		<?php $this->endWidget(); ?>
	</div>
</div>
 
<div style="viewfilter" id="viewfilter">
    <div style="view_name" id="view_name"><p>ANZEIGEFILTER</p></div>
</div>
    <div id="contentarea">
<div>
<table id="filterlist">
<tbody>
<tr>
<td>Filter:</td>
</tr>
</tbody>
</table>
</div>    
<div id="accordion">
   <?php
    if(isset($model3)){
	for($i=0;$i<count($model);$i++){
                                
            echo 
            '<h3><div><div style="float: left;">'.$model3[$i]["name"].'</div><div style="float: right;">Grobphase '.$model3[$i]["grobphase_id"].'</div></div></h3>
            <div>
                <div id="'.$i.'">
                <ol>
                    <li>
                        <h2><span>Beschreibung</span></h2>
                        <div><table´class="table"><tr><td>'.$model3[$i]["beschreibung"].'</td></tr></table></div>
                    </li>
					<li>
                        <h2><span>Privat mit Beratung</span></h2>
                        <div><table´class="table"><tr><td>'.$model3[$i]["priv_mit_beratung"].'</td></tr></table></div>
                    </li>
                    </ol>
                <noscript>
                    <p>Please enable JavaScript to get the full experience.</p>
                </noscript>
              </div>
            </div>';
        }
    
    }?>
   
</div> 

    <?php       
        if(isset($model3)){      
            for($i=0;$i<count($model);$i++){
                echo '<script>';
                echo '$("#'.$i.'").liteAccordion({theme : "light"});';
                echo '</script>';      
    }}?>        
        
<script>
    $( "#accordion" ).accordion();
</script>

</body>
</html>