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
</div>
 
<div style="viewfilter" id="viewfilter">
    <div style="view_name" id="view_name"><p>ANZEIGEFILTER</p></div>
</div>
    <div id="contentarea">
<div>
<table id="filterlist">
<tbody>
<tr>
<td>Filter: &nbsp; <?php echo"Grobphase 01" ?> &diams; Grobphase 02 &diams; Gesetz &diams; Beratung</td>
</tr>
</tbody>
</table>
</div>    
<div id="accordion">
    <h3><div><div style="float: left;">Kunde bei Beraterwechsel auswählen</div><div style="float: right;">Grobphase 02</div></div></h3>
    <div>
        <div id="one">
                <ol>
                    <li>
                        <h2><span>Slide One</span></h2>
                        <div></div>
                    </li>
                    <li>
                        <h2><span>Slide Two</span></h2>
                        <div></div>
                    </li>
                    <li>
                        <h2><span>Slide Three</span></h2>
                        <div></div>
                    </li>
                    <li>
                        <h2><span>Slide Four</span></h2>
                        <div></div>
                    </li>
                    <li>
                        <h2><span>Slide Five</span></h2>
                        <div></div>
                    </li>
                </ol>
                <noscript>
                    <p>Please enable JavaScript to get the full experience.</p>
                </noscript>
            </div>
    </div>
    
    <h3><div><div style="float: left;">Kunde bei Empfang</div><div style="float: right;">Grobphase 05</div></div></h3>
        <div>
        <div id="two">
                <ol>
                    <li>
                        <h2><span>Slide One</span></h2>
                        <div></div>
                    </li>
                    <li>
                        <h2><span>Slide Two</span></h2>
                        <div></div>
                    </li>
                    <li>
                        <h2><span>Slide Three</span></h2>
                        <div></div>
                    </li>
                    <li>
                        <h2><span>Slide Four</span></h2>
                        <div></div>
                    </li>
                    <li>
                        <h2><span>Slide Five</span></h2>
                        <div></div>
                    </li>
                </ol>
                <noscript>
                    <p>Please enable JavaScript to get the full experience.</p>
                </noscript>
            </div>
    </div>
</div> 
      
        
    
<script>
    $( "#accordion" ).accordion();
</script>

<script>
    $("#one").liteAccordion();
</script>

<script>
    $("#two").liteAccordion();
</script>

</body>
</html>