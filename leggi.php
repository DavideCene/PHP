<?php 
    //mi collego
    //mi autentico
    $mySqli = new mysqli("localhost","dbUser","password","anagrafica");
    //preparo la queery di select
    $queeryS = "SELECT id,nome,email,numero FROM rubrica";
    //leggo i valori dal dati
    $letti = $mySqli->query($queeryS);

    //mysqlfetcharay per castare a oggetto tutti i valori dalla tabella
    //salvo i valori in una vettore associativo
    $array = array();

    $k = 0;
    while($row = $letti->fetch_array(MYSQLI_ASSOC)) {
        $array[$k] = $row;
        $k++;
    }

    //fare una echo con la tabella vera e propria, e un pulsante che elimina il dato dal datbase
    $mySqli->close();

    
    function creaTabella($array)
    {
        $tabella =  "<table border='1'>";
        $tabella .= "<thead><tr>";

        //crea le celle di intestazione
        $tabella .= "<th>Nome</th>";
        $tabella .= "<th>Email</th>";
        $tabella .= "<th>Numero</th>";

        $tabella .= "<th>"."</th>";
        $tabella .= "</tr></thead>";
        $tabella .= "<tbody>";

        //creo le righe
        $j=0;
        foreach ($array as $row) {
            $tabella .= "<tr>";
            
            $tabella .= "<td>".$row['nome']."</td>";
            $tabella .="<td>".$row['email']."</td>";
            $tabella .= "<td>".$row['numero']."</td>";

            $bottone = '<a href = "http://localhost/dashboard/rubrica.php?azione=elimina&id='.$row['id'].'">elimina</a>';
            $tabella .= "<td>". $bottone."</td>";
            $tabella .= "</tr>";
            $j++;
        }
    
    
        $tabella .= "</tbody>";
        $tabella .= "</table>"; 
    
        return $tabella;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <script src="script.js"></script>
    <title>Document</title>
</head>
<body>
    <form id="container" name="myForm">

    <input id="inputNome" name="nome" type="text" placeholder="Aggiungi il nome">
    <br>
    <input id="inputEmail" name="email" class="InputSotto" type="text" placeholder="Aggiungi la email">
    <br>
    <input id="inputNumero" name="numero" type="number" class="InputSotto" type="text" placeholder="Aggiungi un numero">
    <br>
    <input type="button" value="Registrati" onclick="controlloDati()"/>

    </form>

    <div id="divErrore">

    </div>
        <?php echo creaTabella($array); ?>
    </body>
</html>