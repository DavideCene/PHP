<?php 
    if($_GET['azione'] == "inserimento" )
    {
        $name = $_POST["nome"];
        $email = $_POST["email"];
        $numero = $_POST["numero"];
    
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $email = filter_var($email, FILTER_SANITIZE_STRING);
        $numero = filter_var($numero, FILTER_SANITIZE_STRING);
    
        //collegare il database
        $mySqli = new mysqli("localhost","dbUser","password","anagrafica");
        //mi autentico
        //eseguo la queery (insert)
        $sql = "INSERT INTO rubrica (nome,email,numero) VALUES ('$name','$email','$numero')";
        //aggiungere il controllo sulla insert
        if($mySqli->query($sql) == TRUE)
            echo"Dati inseiti con successo";
        else
            echo "Dati non inseriti con successo";
        //chiudo la connessione
        $mySqli->close();

        header('Location: http://localhost/dashboard/leggi.php');
    }
    
    if($_GET['azione'] == "elimina")
    {
        $id = $_GET["id"];
    
        $id = filter_var($id, FILTER_SANITIZE_STRING);  
    
        //collegare il database
        $mySqli = new mysqli("localhost","dbUser","password","anagrafica");
        //mi autentico
        //eseguo la queery (insert)
        $queeryS = "DELETE FROM rubrica WHERE id = $id";
        //aggiungere il controllo sulla insert
        if($mySqli->query($queeryS) == TRUE)
            echo"Dati inseiti con successo";
        else
            echo "Dati non inseriti con successo";
        //chiudo la connessione
        $mySqli->close();
        header('Location: http://localhost/dashboard/leggi.php');

    }

?>