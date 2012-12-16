<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Detailansicht</title>
    <link rel="stylesheet" href="/finanzberatung/jquery-multi/css/jquery-ui-1.8.9.custom/jquery-ui-1.8.9.custom.css">
    <script src="/finanzberatung/jquery-ui/js/jquery-1.8.2.js"></script>
    <script src="/finanzberatung/jquery-ui/js/jquery-ui-1.9.0.custom.js"></script>
    
</head>
<body>
<?php   
    $fktNr=(int)($fktNr);
?>
    
    <?php
        $j=0;
        $sprung[$j] = 0;
        $temp = 1;
        $length = count($funktion);
        
        for($i=0;$i<$length;$i++){
            
            if($temp == $funktion[$i]['grobphase_id']){
                
            }else{
                $sprung[$j] = $funktion[$i]['nummer'];
                $j++;
            }
            
            $temp = $funktion[$i]['grobphase_id'];
            
        }
        
        $nr = 0;
        $length2 = count($sprung);
        for($i=1;$i<$length2;$i++){
            if($fktNr < $sprung[$i]){
                $nr = $i;
                break;
            }
        }
    ?>
    
    <div>
        <?php
        echo "Sprung-Nr:".$sprung[$nr];
        echo "   Fkt-Nr:".$fktNr;
        print_r($sprung);
        ?>
    </div>
    
    <div class ="kopfzeile" style="text-align: center;">
        
            <button id="buttonFirst" style="float: left; height: 25px;" onClick='window.location.href="http://localhost/Finanzberatung/index.php?r=site/details&fktNr=<?php echo ($sprung[$nr]); ?>"'><span class="ui-icon ui-icon-seek-prev"></span></button>
        
            <button id="buttonPrevious" style="float: left; height: 25px;" onClick='window.location.href="http://localhost/Finanzberatung/index.php?r=site/details&fktNr=<?php echo ($fktNr-1); ?>"'><span class="ui-icon ui-icon-triangle-1-w"></span></button>
        
            <button id="close" style="float: left; color: #026890; height: 25px;" onclick="window.close()">schließen</button>
            
            <span id="Funktionsname" ><?php echo"[".$funktionsdaten['nummer']."] - ".$funktionsdaten['name'];?></span>
            
            <button id="buttonLast" style="float: right; height: 25px;" onClick='window.location.href="http://localhost/Finanzberatung/index.php?r=site/details&fktNr=<?php echo ($sprung[$nr-1]); ?>"'><span class="ui-icon ui-icon-seek-next"></span></button>
            
            <button id="buttonNext" style="float: right; height: 25px;" onClick='window.location.href="http://localhost/Finanzberatung/index.php?r=site/details&fktNr=<?php echo ($fktNr+1); ?>"'><span class="ui-icon ui-icon-triangle-1-e"></span></button>

    </div>
    
    <div class="kopfzeile2">
    <?php
        $phaseName = $grobphase[$funktionsdaten["grobphase_id"]]["name"];
        $phaseNr = $funktionsdaten["grobphase_id"];
        $uphaseName = $unterphase[$funktionsdaten["unterphase_id"]]["name"];
        $uphaseNr = $funktionsdaten["unterphase_id"];
        
        echo '<span style="padding-right: 15px;"><b>Grobphase:</b> '.$phaseNr.'. '.$phaseName.'</span><span><b>Unterphase:</b> '.$uphaseNr.'. '.$uphaseName.'</span>';
    ?>
    </div>
   
    <div class="row">
    <?php
    if($funktionsdaten['beschreibung']!= null){?>
    <div class="beschreibung">
        <div class="topline">Beschreibung</div>
        <div class="inhalt2"><?php echo $funktionsdaten['beschreibung']; ?></div>
    </div>
    
    <?php } ?>
    
    <div class="beratung">
        <div class="topline">Beratung</div>
        <div class="inhalt">
            <table class="inhalte">
                <tr>
                    <td>Privat mit Beratung</td>
                    <td>Privat ohne Beratung</td>
                    <td>Professionell mit Beratung</td>
                    <td>Professionell ohne Beratung</td>
                    <td>Reines Ausführungsgeschäft</td>
                </tr>
                <tr>
                    <td>
                    <?php 
                        if($funktionsdaten['priv_mit_beratung']== 'gesetzFunktion'){
                            echo "<img title='Funktion bedingt durch Gesetz' src='/Finanzberatung/css/images/pfeile/gesetzFunktion.png'>";
                        }
                        elseif($funktionsdaten['priv_mit_beratung'] == 'funktionGesetz'){
                            echo "<img title='Gesetz bedingt durch Funktion'src='/Finanzberatung/css/images/pfeile/funktionGesetz.png'>";
                        }
                        else{ echo"";}
                    ?>
                    </td>
                    <td>
                    <?php 
                        if($funktionsdaten['prof_mit_beratung'] == 'gesetzFunktion'){
                            echo "<img title='Funktion bedingt durch Gesetz' src='/Finanzberatung/css/images/pfeile/gesetzFunktion.png'>";
                        }
                        elseif($funktionsdaten['prof_mit_beratung'] == 'funktionGesetz'){
                            echo "<img title='Gesetz bedingt durch Funktion'src='/Finanzberatung/css/images/pfeile/funktionGesetz.png'>";
                        }
                        else{ echo"";}
                    ?>                       
                    </td>
                    <td>
                    <?php 
                        if($funktionsdaten['priv_ohne_beratung'] == 'gesetzFunktion'){
                            echo "<img title='Funktion bedingt durch Gesetz' src='/Finanzberatung/css/images/pfeile/gesetzFunktion.png'>";
                        }
                        elseif($funktionsdaten['priv_ohne_beratung'] == 'funktionGesetz'){
                            echo "<img title='Gesetz bedingt durch Funktion'src='/Finanzberatung/css/images/pfeile/funktionGesetz.png'>";
                        }
                        else{ echo"";}
                    ?>
                    </td>
                    <td>
                    <?php 
                        if($funktionsdaten['prof_ohne_beratung'] == 'gesetzFunktion'){
                            echo "<img title='Funktion bedingt durch Gesetz' src='/Finanzberatung/css/images/pfeile/gesetzFunktion.png'>";
                        }
                        elseif($funktionsdaten['prof_ohne_beratung'] == 'funktionGesetz'){
                            echo "<img title='Gesetz bedingt durch Funktion'src='/Finanzberatung/css/images/pfeile/funktionGesetz.png'>";
                        }
                        else{ echo"";}
                    ?>
                    </td>
                    <td>
                    <?php 
                        if($funktionsdaten['r_ausf_geschaeft'] == 'gesetzFunktion'){
                            echo "<img title='Funktion bedingt durch Gesetz' src='/Finanzberatung/css/images/pfeile/gesetzFunktion.png'>";
                        }
                        elseif($funktionsdaten['r_ausf_geschaeft'] == 'funktionGesetz'){
                            echo "<img title='Gesetz bedingt durch Funktion'src='/Finanzberatung/css/images/pfeile/funktionGesetz.png'>";
                        }
                        else{ echo"";}
                    ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    </div>
    
    <div class="row">
    <?php
    if($funktionsdaten['weiterereg']!= null){?>
    <div class="regulatorien">
        <div class="topline">Regulatorien</div>
        <div class="inhalt"><?php echo $funktionsdaten['weiterereg'] ?></div>
    </div>
    <?php } ?>
    
    
    <?php
    if($funktionsdaten['hsr_aktuell']!= null || $funktionsdaten['hsr_zukuenftig']!= null){?>
    <div class="smallbox">
        <div class="topline">Spielraum</div>
        <div class="inhalt">
            <table class="inhalte">
                <tr>
                    <td>aktuell</td>
                    <td>zukünftig</td>
                </tr>
                <tr>
                    <?php if($funktionsdaten['hsr_aktuell'] == 'gruen') { ?>
                    <td style="background-color: #009000;">  </td>
                    <?php }
                    elseif($funktionsdaten['hsr_aktuell'] == 'gelb') { ?>
                    <td style="background-color: #ffff00;">  </td>
                    <?php }
                    elseif($funktionsdaten['hsr_aktuell'] == 'rot') { ?>
                    <td style="background-color: #009000;">  </td>
                    <?php }
                    else{ ?>
                    <td style="background-color: #ffffff;"> </td>
                    <?php }
                    if($funktionsdaten['hsr_zukuenftig'] == 'gruen') { ?>
                    <td style="background-color: #009000;">  </td>
                    <?php }
                    elseif($funktionsdaten['hsr_zukuenftig'] == 'gelb') { ?>
                    <td style="background-color: #ffff00;">  </td>
                    <?php }
                    elseif($funktionsdaten['hsr_zukuenftig'] == 'rot') { ?>
                    <td style="background-color: #009000;">  </td>
                    <?php } 
                    else{ ?>
                    <td style="background-color: #ffffff;"> </td>
                    <?php }} ?>
                    
                </tr>
            </table>
        </div>
    </div>
    

    <div class="smallbox">
        <div class="topline">Hinweise</div>
        <div class="inhalt"><?php echo $funktionsdaten['hinweis'] ?></div>
    </div>

    <div class="smallbox">
        <div class="topline">Spezialist/Generalist</div>
        <div class="inhalt"><?php echo $funktionsdaten['spezialist_vs_generalist'] ?></div>
    </div>


    <div class="smallbox">
        <div class="topline">Frontoffice Generalist</div>
        <div class="inhalt"><?php echo $funktionsdaten['frontoffice_generalist'] ?></div>
    </div>

    


    <div class="smallbox">
        <div class="topline">Frontoffice Experte</div>
        <div class="inhalt"><?php echo $funktionsdaten['frontoffice_experte'] ?></div>
    </div>

    <div class="smallbox">
        <div class="topline">Backoffice</div>
        <div class="inhalt"><?php echo $funktionsdaten['backoffice'] ?></div>
    </div>

    <div class="smallbox">
        <div class="topline">Produklieferant</div>
        <div class="inhalt"><?php echo $funktionsdaten['produktlieferant'] ?></div>
    </div>

    <div class="smallbox">
        <div class="topline">Bank</div>
        <div class="inhalt"><?php echo $funktionsdaten['bank'] ?></div>
    </div>

    <div class="smallbox">
        <div class="topline">Kunde</div>
        <div class="inhalt"><?php echo $funktionsdaten['kunde'] ?></div>
    </div>

    <div class="smallbox">
        <div class="topline">Verantwortlicher</div>
        <div class="inhalt"><?php echo $funktionsdaten['verantwortlicher'] ?></div>
    </div>

    <div class="smallboxLast">
        <div class="topline">Ressourcen</div>
        <div class="inhalt"><?php echo $funktionsdaten['ressourcen'] ?></div>
    </div>
  </div>

    
    

</body>
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
