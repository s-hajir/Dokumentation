<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ProjektA</title>
    <link rel="stylesheet" href="jquery-ui.css" />
    <link rel="stylesheet" href="jquery-ui.theme.css" />
    <link rel="stylesheet" href="style.css" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
</head>
<body>
    <header>
        <?php include "navigationsleiste.php";?>
    </header>
    <main>
        <?php include "neuer_plan_dialog.php";?>

        <section>
            <h1>Profil</h1>
            <figure id="profil-img-container">
                <img id="profil-img" src="" width="150" height="140" />
            </figure>
            <form id="uploadProfilbild">
                Wähle ein neues Profilbild:
                <input type="file" name="fileToUpload" />
                <br />
                <input type="submit" value="Bild Upload" name="submit" />
            </form><br />
            <h2>Name /Passwort ändern</h2>
            <form>
                <label for="vorname">Vorname</label><br />
                <input id="vorname" name="vorname" type="text" /><br /><br />
                <label for="nachname">Nachname</label><br />
                <input id="nachname" name="nachname" type="text" /><br />
                <input type="submit" value="Ändern" />
            </form><br /><br />
            <form>
                <label for="passwort">altes Passwort</label>
                <br />
                <input id="altes-passwort" name="altes-passwort" type="password" />
                <br />
                <br />
                <label for="neues-passwort">neues Passwort</label>
                <br />
                <input id="neues-passwort" name="neues-passwort" type="password" />
                <br />
                <label for="neues-passwort-wdh">neues Passwort wiederholen</label>
                <br />
                <input id="neues-passwort-wdh" name="neues-passwort-wdh" type="password" />
                <br />
                <input type="submit" value="Ändern" />
            </form>

        </section>

    </main>
    <br />
    <footer>&copy; Copyright 2016 Hajir</footer>
    <script>
//uploadProfilbild  AJAX
    $("#uploadProfilbild").on('submit', (function (e) {
        e.preventDefault();                    
        $.ajax({
            url: "form_eval_upload.php",
            type: "POST",
            data: new FormData(this), 
            contentType: false,
            cache: false,
            processData: false,
            success: function (data)    
            {
                $("#profil-img-container").html(data);
            },
            error: function ()        
            {
            }
        });
    }));
    </script>
