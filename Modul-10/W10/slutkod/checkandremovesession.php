<?php

    /*
        1. Starta en session eller ge tillträde till en redan existerande session samt generera ett nytt sessionsid.
        2. Om inte sessionsvariablerna nickname och color finns på servern skall:
        a) En redirect skickas till klienten med instruktionen att istället anropa filen startsession.php.  
        b) Därefter skall funktionen exit() anropas för att säkerställa att ingen försöker komma förbi redirect-anropet.

        3. Om användaren har tryckt på submit-knappen btnDeleteSession skall du:
        a) Ta bort sessionsvariabeln nickname.
        b) Ta bort sessionsvariabeln color.
        c) Avsluta sessionen.
        d) Skicka en redirect till klienten med instruktionen att istället anropa filen startsession.php.
        e) Anropa exit() funktionen. 

    */

    //Steg 1
    session_start();
    session_regenerate_id( true );

    //Steg 2
    if( !isset($_SESSION["nickname"]) && !isset($_SESSION["color"]) ) {
        header("location: startsesssion.php");
        exit();
    }

    if( isset($_POST["btnDeleteSession"])) {

        if( session_status() === PHP_SESSION_ACTIVE) {
            $_SESSION = array();

            if( ini_get( "session.use_cookies" ) ) {

                $cookieData = session_get_cookie_params();

                $path = $cookieData["path"];
                $domain = $cookieData["domain"];
                $secure = $cookieData["secure"];
                $httponly = $cookieData["httponly"];
                $name = session_name();

                setcookie($name, "", time() - 3600, $path, $domain, $secure, $httponly);
            }


            session_destroy();
        }

        header("location: startsesssion.php");
        exit();
    }

?>
<!DOCTYPE html>
<html lang="sv">
    <head>
        <meta charset="utf-8">
        <title>Kodexempel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            body { background-color: <?php if(isset($_SESSION["color"]) ) { echo( $_SESSION["color"]); } ?>; }
        </style>

    </head>
    <body class="container p-2">
        <main class="jumbotron text-center mb-5 pb-4">          
            <h1>Steg 2</h1>
            
            <?php
                if(isset($_SESSION["nickname"]) ) {
                    echo("<h1>NickName är: " .  $_SESSION["nickname"] . "</h1>");
                }
            ?>

            <form method="POST" enctype="application/x-www-form-urlencoded" action="<?php echo($_SERVER["PHP_SELF"]); ?>">
                <div id="divInForm" class="mt-5 row">                 

                    <div class="col-6 text-right mt-5">
                        <button type="submit" class="btn btn-primary mr-0" name="btnDeleteSession">Delete Session</button>
                    </div>               

                </div>
            </form>    
            
        </main>

    </body>
</html>