function controlloDati()
{
    //controllo nome che non ci siano numeri
    let nome = document.getElementById("inputNome").value;
    let mail = document.getElementById("inputEmail").value;
    let numero = document.getElementById("inputNumero").value;

    if(nome == "")
    {
        document.getElementById("divErrore").innerHTML = "Nome non inserito";
        return;
    }
    else if(mail == "")
    {
        document.getElementById("divErrore").innerHTML = "Email non inserita";
        return;
    }
    else if(numero =="")
    {
        document.getElementById("divErrore").innerHTML = "Numero non inserito";
        return;
    }


    for (let i = 0; i < nome.length; i++) {
        const element = nome.charCodeAt(i);

        if((element < 65 || element > 90) && (element <97 || element > 122))
        {
            document.getElementById("divErrore").innerHTML = "Errore nel nome";
            document.getElementById("inputNome").value ="";
            return;
        }
        
    }

    //controllo email, @ prima del punto

    let indexChiocciola = -1;
    let indexPunto = -1;

    for (let i = 0; i < mail.length; i++) {
        const element = mail[i];

        if(element == "@")
        {
            indexChiocciola = i;
        }

        if(element == ".")
        {
            indexPunto = i;
        }
        
    }

    if(indexChiocciola > indexPunto)
    {
        document.getElementById("divErrore").innerHTML = "Errore nella mail";
        document.getElementById("inputEmail").value ="";
        return;
    }

    //numero che sia positivo
    if(numero < 0)
    {
        document.getElementById("divErrore").innerHTML = "Errore nel numero";
        document.getElementById("inputNumero").value = "";
        return;
    }

    //se i parametri sono giusti invio alla pagina
    let form = document.getElementById("container");
    form.action = "rubrica.php?azione=inserimento";
    form.method = 'POST';
    form.submit();
}


function visualizzaPag()
{
    window.location = "leggi.php";
}
