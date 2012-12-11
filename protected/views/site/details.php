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

    <div class ="boxes ui-state-active" id="kopfzeile" style="text-align: center;">
        
            <button id="buttonFirst" style="float: left;"><span class="ui-icon ui-icon-seek-prev"></span></button>
        
            <button id="buttonPrevious" style="float: left;"><span class="ui-icon ui-icon-triangle-1-w"></span></button>
        
            <button id="close" style="float: left; color: #026890;" onclick="window.close()">schließen</button>
            
            <span id="Funktionsname" ><?php echo"[".$funktionsdaten['nummer']."] - ".$funktionsdaten['name'];?></span>
            
            <button style="float: right;"><span class="ui-icon ui-icon-seek-next"></span></button>
            
            <button style="float: right;"><span class="ui-icon ui-icon-triangle-1-e"></span></button>

    </div>
    
    <div class="boxes ui-state-active" id="zeile2">
        
        <span>Grobphase/Unterphase</span>
        
    </div>
    <?php
    if($funktionsdaten['beschreibung']!= null){?>
    <div class="boxes ui-state-active" id="Beschreibung" style="width: 45%; margin-left: 2%;">
        <div class="topline">Beschreibung</div>
        <div class="inhalt"><?php echo $funktionsdaten['beschreibung']; ?>
            <?php 
                if(isset($_GET['fktNr'])){
                    echo $_GET['fktNr'];
                }else{
                    echo 'Problem';
                }
            
             ?>
        </div>
    </div>
    
    <?php } ?>
    
    <div class="boxes ui-state-active" id="Beratung" style="width: 45%; margin-left: 5%; margin-right: 2%;">
        <div class="topline">Beratung</div>
        <div class="inhalt">
            <table>
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
    
    <?php
    if($funktionsdaten['weiterereg']!= null){?>
    <div class="boxes ui-state-active" id="Regulatorien">
        <div class="topline">Regulatorien</div>
        <div class="inhalt"><?php echo $funktionsdaten['weiterereg'] ?></div>
    </div>
    <?php } ?>
    
    
    <?php
    if($funktionsdaten['hsr_aktuell']!= null || $funktionsdaten['hsr_zukuenftig']!= null){?>
    <div class="boxes ui-state-active" id="Spielraum">
        <div class="topline">Spielraum</div>
        <div class="inhalt">
            <table>
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
    
    <?php
    if($funktionsdaten['hinweis']!= null){?>
    <div class="boxes ui-state-active" id="Hinweise">
        <div class="topline">Hinweise</div>
        <div class="inhalt"><?php echo $funktionsdaten['hinweis'] ?></div>
    </div>
    <?php } ?>
    
    <?php
    if($funktionsdaten['spezialist_vs_generalist']!= null){?>
    <div class="boxes ui-state-active" id="spezialist_vs_generalist">
        <div class="topline">Spezialist/Generalist</div>
        <div class="inhalt"><?php echo $funktionsdaten['spezialist_vs_generalist'] ?></div>
    </div>
    <?php } ?>
    
    <?php
    if($funktionsdaten['frontoffice_generalist']!= null){?>
    <div class="boxes ui-state-active" id="frontoffice_generalist">
        <div class="topline">Frontoffice Generalist</div>
        <div class="inhalt"><?php echo $funktionsdaten['frontoffice_generalist'] ?></div>
    </div>
    <?php } ?>
    
    <?php
    if($funktionsdaten['frontoffice_experte']!= null){?>
    <div class="boxes ui-state-active" id="frontoffice_experte">
        <div class="topline">Frontoffice Experte</div>
        <div class="inhalt"><?php echo $funktionsdaten['frontoffice_experte'] ?></div>
    </div>
    <?php } ?>
    
    <?php
    if($funktionsdaten['backoffice']!= null){?>
    <div class="boxes ui-state-active" id="backoffice">
        <div class="topline">Backoffice</div>
        <div class="inhalt"><?php echo $funktionsdaten['backoffice'] ?></div>
    </div>
    <?php } ?>
    
    <?php
    if($funktionsdaten['produktlieferant']!= null){?>
    <div class="boxes ui-state-active" id="produktlieferant">
        <div class="topline">Produklieferant</div>
        <div class="inhalt"><?php echo $funktionsdaten['produktlieferant'] ?></div>
    </div>
    <?php } ?>
    
    <?php
    if($funktionsdaten['bank']!= null){?>
    <div class="boxes ui-state-active" id="bank">
        <div class="topline">Bank</div>
        <div class="inhalt"><?php echo $funktionsdaten['bank'] ?></div>
    </div>
    <?php } ?>
    
    <?php
    if($funktionsdaten['kunde']!= null){?>
    <div class="boxes ui-state-active" id="kunde">
        <div class="topline">Kunde</div>
        <div class="inhalt"><?php echo $funktionsdaten['kunde'] ?></div>
    </div>
    <?php } ?>
    
    <?php
    if($funktionsdaten['verantwortlicher']!= null){?>
    <div class="boxes ui-state-active" id="verantwortlicher">
        <div class="topline">Verantwortlicher</div>
        <div class="inhalt"><?php echo $funktionsdaten['verantwortlicher'] ?></div>
    </div>
    <?php } ?>
    
    <?php
    if($funktionsdaten['ressourcen']!= null){?>
    <div class="boxes ui-state-active" id="ressourcen">
        <div class="topline">Ressourcen</div>
        <div class="inhalt"><?php echo $funktionsdaten['ressourcen'] ?></div>
    </div>
    <?php } ?>
    

</body>
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
