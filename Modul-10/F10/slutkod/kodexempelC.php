<!DOCTYPE html>
<html lang="sv">
    <head>
        <meta charset="utf-8">
        <title>Test..</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <body class="container p-2">
        <header class="jumbotron text-center">
            <h1>Test...</h1>
        </header>

        <main>    

            <?php

                if(isset($_POST["login"])) {
                
                    $userName = trim ( $_POST["username"] );
                    $passWord = trim ( $_POST["password"] );

                    if(strlen( $userName ) > 0 && strlen( $passWord) > 0) {

                        //Observera att detta är ett dåligt sätt att hantera indata i SQL-utsökningar!
                        $sql = "SELECT username, password FROM user ";
                        $sql .= "WHERE (user = '" . $userName . "') AND (password = '" . $passWord. "');";

                        //Här gör vi utsökningen i databasen...
                        echo("<p>$sql</p>");

                    } else {
                        echo("<p>Användarnamn och/eller lösenord saknar värde!</p>");
                    }

                }

            ?>

            <div>
                <form action="<?php echo($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="text" name="username" />
                    <input type="password" name="password" />
                    <input type="submit" name="login" value="Skicka" />
                    <input type="reset" name="rensa" value="Rensa" />
                </form>
            </div>

            <br />

            <?php

                if(isset($_POST["save"])) {

                    $story = trim( $_POST["story"] );

                    if(strlen( $story ) > 0) {
                        $stStory = strip_tags( $story );
                        $hscStory = htmlspecialchars( $story );
                        echo("<p>Indata helt utan några kontroller: <code>$story</code>" . PHP_EOL);
                        echo("<p>Indata kontollerad med strip_tags(): <code>$stStory</code></p>" . PHP_EOL);
                        echo("<p>Indata kontrollerad med htmlspecialchars(): <code>$hscStory</code></p>" . PHP_EOL);

                        //Här sparar vi till databasen...
                        $sql = "INSERT INTO story(story, stStory, hscStory) ";
                        $sql .= "VALUES('$story', '$stStory', '$hscStory');";

                        echo("<p><code>$sql</code></p>");
                    } else {
                        echo("<p>Story saknar värde!</p>");
                    }

                }
            ?>

            <div>
                <form action="<?php echo($_SERVER["PHP_SELF"]); ?>" method="post">
                    <textarea name="story" rows="10" cols="60"></textarea>
                    <input type="submit" name="save" value="Skicka" />
                    <input type="reset" name="rensa" value="Rensa" />
                </form>
            </div>

        </main>

    </body>

</html>