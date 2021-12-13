local<!DOCTYPE html>
<html lang="sv">
    <head>
        <meta charset="utf-8">
        <title>PHP W6</title>

        <!-- 9. -->
        <style>
            img { height: 20%; widht: 20%; }
        </style>
    </head>

    <body>

        <main>    
            <?php

                /*
                    Bilder på tärningar (1-6):

                    <img src="https://openclipart.org/download/282132/Die6.svg" />
                    <img src="https://openclipart.org/download/282131/Die5.svg" />
                    <img src="https://openclipart.org/download/282130/Die4.svg" />
                    <img src="https://openclipart.org/download/282129/Die3.svg" />
                    <img src="https://openclipart.org/download/282128/Die2.svg" />
                    <img src="https://openclipart.org/download/282127/Die1.svg" />
                    
                    1. Slumpa ett tal mellan 1 och 6 och skriv ut resultatet.
                        se rand() funktionen på https://www.php.net/manual/en/function.rand.php
                    2. Skriv ut resultatet från punkt 1 i ett p-element.
                    3. Med iteration (for) slumpa 6 tal mellan 1 och 6 och skriv ut resultatet.
                    4. Skriv ut resultatet från punkt 3 i ett div-element och varje framslumpat tal i 
                        ett eget p-element.
                    5. Summera alla framslumpade tal och skriv ut summan i ett eget p-element.
                    6. För varje framslupat tal mellan 1 och 6 skriv ut ett img-element som pekar
                        (använd src-attributet) på en bild som matchar en tärning (se ovan).
                    7. Om tid finns! Skapa använd instruktionerna ovan för img-element och skapa en vektor där varje img-element
                        finns i ett eget index. Revidera sedan punkt 6 och använd vektorn och ett framslupat värde (=vektorindex)
                        för att skriva ut img-element instruktionerna.
                    8. Gör om punkt 3 och 4 med med while och do while iteration.
                    9. Använd CSS för att minska bilderna till en storlek där alla tre tärningar visas på samma rad.
                    
                */

                //1.
                $slumptal = rand(1, 6);
                echo($slumptal);

                //eller
                echo(rand(1,6));

                //2.
                echo("<p>$slumptal</p>"); 

                //eller
                echo("<p>" . $slumptal . "</p>");
                

                //3.
                for($i = 1; $i <= 6; $i++) {
                     echo(rand(1, 6));
                }

                //4.
                echo("<div>");
                for($i = 1; $i <= 6; $i++) {
                    echo("<p>" . rand(1, 6) . "</p>");
                }
                echo("</div>");

                //5.
                $sum = 0;
                $rnd = 0;
                echo("<div>");
                for($i = 1; $i <= 6; $i++) {
                    $rnd = rand(1,6);
                    $sum += $rnd;
                    echo("<p>" . $rnd . "</p>");
                }
                echo("</div>");
                echo("<p>Summan blev: $sum</p>");

                //6.
                $sum = 0;
                $rnd = 0;
                $img = "";
                echo("<div>");
                for($i = 1; $i <= 6; $i++) {
                    $rnd = rand(1,6);
                    $sum += $rnd;

                    switch($rnd) {
                        case 6:
                            $img = "<img src=\"https://openclipart.org/download/282132/Die6.svg\" />";
                            break;
                        case 5:
                            $img = "<img src=\"https://openclipart.org/download/282131/Die5.svg\" />";
                            break;
                        case 4:
                            $img = "<img src=\"https://openclipart.org/download/282130/Die4.svg\" />";
                            break;
                        case 3:
                            $img = "<img src=\"https://openclipart.org/download/282129/Die3.svg\" />";
                            break;
                        case 2:
                            $img = "<img src=\"https://openclipart.org/download/282128/Die2.svg\" />";
                            break;
                        case 1:
                            $img = "<img src=\"https://openclipart.org/download/282127/Die1.svg\" />";
                            break;
                    }

                    echo($img) . PHP_EOL;

                }
                echo("</div>");
                
                //7.
                $bilder = array(
                    6 => "<img src=\"https://openclipart.org/download/282132/Die6.svg\" />",
                    5 => "<img src=\"https://openclipart.org/download/282131/Die5.svg\" />",
                    4 => "<img src=\"https://openclipart.org/download/282130/Die4.svg\" />",
                    3 => "<img src=\"https://openclipart.org/download/282129/Die3.svg\" />",
                    2 => "<img src=\"https://openclipart.org/download/282128/Die2.svg\" />",
                    1 => "<img src=\"https://openclipart.org/download/282127/Die1.svg\" />"
                );

                echo("<div>");
                for($i = 1; $i <= 6; $i++) {
                    $rnd = rand(1,6);
                    $sum += $rnd;
                    echo($bilder[$rnd]) . PHP_EOL;
                }
                echo("</div>");

                //8.
                $i = 0;
                echo("<div>");
                while($i < 6) {
                    echo("<p>$i: " . rand(1, 6) . "</p>");
                    $i++;
                }
                echo("</div>");

                $i = 0;
                echo("<div>");
                do {
                    echo("<p>$i: " . rand(1, 6) . "</p>");
                    $i++;
                } while($i < 6);
                echo("</div>");

            ?>
               
        </main>

    </body>

</html>