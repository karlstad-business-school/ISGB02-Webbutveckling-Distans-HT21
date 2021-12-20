<!doctype html>
<html lang="sv">
	<head>
        <meta charset="utf-8" /> 
        <title>
			F10 - En komplett HTML5 sida med PHP inslag!
        </title>
	</head>
	<body>
		<div id="sitewrapper">
			<header>
				<h1>F10 - Kryptering och Dekryptering</h1>
			</header>
			<div id="sitecontent">
				<?php
				
					function dbConnect() {
						try {
							$dns = "mysql:dbname=demodice;host=localhost";
							$user = "root";
							$password = "";
							$options = array( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
							$db = new PDO($dns, $user, $password, $options);
							return $db;
						} catch( PDOException $e ) {
							throw $e;
						}
					}
					
					function mySHA2($db, $data) {
						try {
							
							$sql = "SELECT SHA2(:data, 256) AS 'ENCRYPTED'";
							$stmt = $db->prepare($sql);
							$stmt->bindValue(":data", $data);
							$stmt->execute();
                            $encryptedData = $stmt->fetchColumn();
                            $stmt = null;
							
							return $encryptedData;
						} catch( PDOException $e ) {
							throw $e;
						}
					}
					
					try {
						$db = dbConnect();
						
						$encryptedData = mySHA2($db, "hemligt");
						echo("<p>SHA2() i MariaDB " . $encryptedData . "</p>");
						echo("<p>Stänglängden är: " . strlen($encryptedData) . "</p>");
						
					} catch( PDOException $e ) {
						echo("<p>" . $e->getMessage() ."</p>");
					}	
                    $db = null;
                    
					$encryptedData = hash("SHA256", "hemligt");
					echo("<p>SHA256() i PHP " . $encryptedData . "</p>");
					echo("<p>Stänglängden är: " . strlen($encryptedData) . "</p>");
					
                    $hashalgos = hash_algos();
                    echo("<ol>" . PHP_EOL);
					foreach($hashalgos as $algo) {
						echo("<li>$algo</li>" . PHP_EOL);
					}	
                    echo("</ol>" . PHP_EOL);
                    
					$message = "hemligt";
					$key = "hemlig-nyckel";
					$method = "AES-128-ECB";
					
					$encrypted = openssl_encrypt($message, $method, $key);
					echo( "<p>Encrypted: $encrypted</p>");
					
					$decrypted = openssl_decrypt($encrypted, $method, $key);
					echo( "<p>Decrypted: $decrypted</p>");
						
                    $opensslalgos = openssl_get_cipher_methods();
                    echo("<ol>" . PHP_EOL);
					foreach($opensslalgos as $algo) {
						echo("<li>$algo</li>" . PHP_EOL);
                    }
                    echo("</ol>" . PHP_EOL);
				?>
			</div> 
			<footer><h1>Kryptering och Dekryptering</h1></footer>
		</div>
	</body>
</html>