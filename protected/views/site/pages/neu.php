<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>accordion demo</title>
    <link rel="stylesheet" href="\Yii\newapp\protected\views\site\pages\jquery-ui\css\custom-theme/jquery-ui-1.9.0.custom.css">
    <script src="/Yii/newapp/protected/views/site/pages/jquery-ui/js/jquery-1.8.2.js"></script>
    <script src="/Yii/newapp/protected/views/site/pages/jquery-ui/js/jquery-ui-1.9.0.custom.js"></script>
    <script>
    $(function() {
        $( "#tabs" ).tabs();
    });
    </script>
    
    <script>
    // increase the default animation speed to exaggerate the effect
    $.fx.speeds._default = 1000;
    $(function() {
        $( "#dialog" ).dialog({
            autoOpen: false,
            show: "blind",
            hide: "explode"
        });
 
        $( "#opener" ).click(function() {
            $( "#dialog" ).dialog( "open" );
            return false;
        });
    });
    </script>
    
</head>
<body>
    <?php $name="Kunde bei Beraterwechsel"; ?>
<div id="tabs">
    <ul>
        <li><a href="#tabs-1">Allgemein</a></li>
        <li><a href="#tabs-2">Experte</a></li>
        <li><a href="#tabs-3">Testlauf</a></li>
    </ul>
<div id="tabs-1">    
<div style="function" id="function">
    <p>Platzhalter für Funktionsfilter!!!</p>
</div>
 
  

    
<div id="accordion">
    <h3><?php echo $name ?></h3>
    <div>

    

<table class="table">
<tbody>
<tr>
<th>MiFID II</th>
<th>Hinweise</th>
<th>Regulatorien</th>
</tr>
<tr>
<td>Artikel 9 Abs. 6</td>
<td>Orderannahme - Einzeltransaktionen Kapitalmaßnahmen
BR:#: [WpHG] Alle WP-Kundengeschäfte: Privatkunde: Produktspez. Informationen - Wesentliche Änderungen mitteilen
BR:#: [WpHG] Alle WP-Kundengeschäfte: Prof.Kunde: Produktspez. Informationen Wesentliche Änderungen mitteilen
Für Zeitspanne zwischen Beratung und Orderabschluss :
Erfolgen an den produktspezifischen Informationen, die dem Kunden bei der Anl.berat mitzuteilenden sind wesentliche Änderungen, müssen diese dem Kunden mitgeteilt werden.</td>
<td>§ 31 Abs. 8 WpHG i. V. § 8 WpDVerOV</td>
</tr>
</tbody>
</table>
</p>
<button style="float: right;">Details</button>
    </div>
    <h3>Begrüßung des Kunden</h3>
    <div>
        <table class="table">
<tbody>
<tr>
<th>MiFID II</th>
<th>Hinweise</th>
<th>Regulatorien</th>
</tr>
<tr>
<td></td>
<td></td>
<td></td>
</tr>
</tbody>
</table>
        <button style="float: right;">Details</button>
    </div>
    <h3>Aufteilung in Anlageklassen verifizieren</h3>
    <div>
        <table class="table">
<tbody>
<tr>
<th>MiFID II</th>
<th>Hinweise</th>
<th>Regulatorien</th>
</tr>
<tr>
<td></td>
<td></td>
<td></td>
</tr>
</tbody>
</table>
        <button style="float: right;">Details</button>
    </div>
</div>
 
      <div style="viewfilter" id="viewfilter">
    <p>Platzhalter für Anzeigefilter!!!</p>
</div>
    
<script>
$( "#accordion" ).accordion();
</script>
</div>
    <div id="tabs-2">
        <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
    </div>
    <div id="tabs-3">
        <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
        <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
    </div>
</div> 
</body>
</html>