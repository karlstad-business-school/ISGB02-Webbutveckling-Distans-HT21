<?php

    /*
        1. Starta en session eller ge tillträde till en redan existerande session samt generera ett nytt sessionsid.
        2. Om sessionsvariablerna nickname och color finns på servern skall:
        a) En redirect skickas till klienten med instruktionen att istället anropa filen step22.php.  
        b) Därefter skall funktionen exit() anropas för att säkerställa att ingen försöker komma förbi redirect-anropet.

        3. Om sessionsvariablern inte finns på servern skall du kontrollera om användaren har tryckt på submit-knappen btnNext och om så är fallet skall du:
        a) Kontrollera om texten i nickname är mindre än tre tecken lång så är fallet skapa variabeln errorMsg och tilldela den värdet: 
            "Nickname skall vara minst tre tecken!".
        b) Om texen i nickname är minst tre tecken lång skall du kontrollera om color innehåller värdet "#ffffff" och så är fallet skapa variabeln errorMsg och tilldela den värdet:
            "Color får inte vara vit!"
        c) Om color inte innehåller värdet "#ffffff" skall du:
            1. Skapa sessionsvariabeln nickname med värdet i nickname.
            2. Skapa sessionsvariabeln color med värdet i color.
            3. Skicka en redirect till klienten med instruktionen att istället anropa filen step22.php.
            4. Anropa exit() funktionen.  

    */

?>
<!DOCTYPE html>
<html lang="sv">
    <head>
        <meta charset="utf-8">
        <title>Kodexempel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body class="container p-2">
        <main class="jumbotron text-center mb-5 pb-4">          
            <h1>Formulärvalidering</h1>
            
            <?php
                if( isset( $errorMsg ) ) {
                    echo( "<p>$errorMsg</p>" );
                }
            ?>

            <form method="POST" enctype="application/x-www-form-urlencoded" action="<?php echo($_SERVER["PHP_SELF"]); ?>">
                <div id="divInForm" class="mt-5 row">              
                    <div class="col-6">
                        <label for="nick_1">Välj nickname:</label>
                        <input type="text" placeholder="nickname" class="form-control" title="nickname" name="nickname">
                    </div>
                    <div class="col-6">
                        <label for="color_1">Välj färg:</label>
                        <input type="color"  value="#ffffff" class="form-control" title="färg för spelare" name="color">
                    </div>
                    <div class="col-12 text-right mt-5">
                        <button type="submit" class="btn btn-primary mr-0" name="btnNext">Gå vidare</button>
                    </div>               
                </div>
            </form>     
            
        </main>



    </body>
</html>