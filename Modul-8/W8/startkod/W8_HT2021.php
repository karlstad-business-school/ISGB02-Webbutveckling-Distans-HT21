<?php
       /*
        I denna workshop skall ni skriva PHP-koden för tre funktioner:
        1. checkFormData() i vilken ni skall validera inkommande data från formuläret och använda er av 
        undantagshantering.

        Följande villkor gäller:

        Ingen av indatakomponenterna får vara utan värden.
        Färg får inte anta värdet #ff0000, #00ff00 eller #0000ff.
        Mil skall bestå av et numeriskt värde och vara större än noll (0).
        Om alla villkor utvärderas till sant returnerar funktionen sant annars falskt.
        Innan funktionen returnerar falskt skall ni i catch skriva ut en lämpligt felmeddelande.

        2. addCarToDatabase() i vilken ni skall lägga till en ny bil under förutsättningen att data är korrekt.
        Ni skall använda er av undantagshantering och det skall inte vara möjligt att genomföra en SQL-injection.

        3. I listCarData() listar ni bilarn på valfritt sätt. 
    */

    function checkFormData() {

    }

    function addCarToDatabase() {

    }

    function listCarData() {

    }
?>
<!DOCTYPE html>
<html lang="sv">
    <head>
        <meta charset="utf-8">
        <title>PHP F8</title>
    </head>
    <body>
        <main>
            <?php 
                if(isset($_POST["btnSend"])){
                    
                    if(checkFormData()) {
                        addCarToDatabase();
                    }
                }

                if(isset($_POST["btnShow"])) {
                    listCarData();
                }
            ?>
            <form action="W8_HT2021.php" method="post">
                <input type="text" name="fabrikat" />
                <input type="text" name="modell" />
                <input type="text" name="regnr" />
                <input type="color" name="farg" />
                <input type="mil" name="mil" />
                <input type="submit" name="btnSend" value="Skicka" />
                <input type="submit" name="btnShow" value="Visa alla bilar" />
            </form>
        </main>
    </body>
</html>