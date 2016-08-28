<!DOCTYPE html>

<html lang="de">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ProjektA</title>
    <link rel="stylesheet" href="jquery-ui.css" />
    <link rel="stylesheet" href="jquery-ui.theme.css" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

</head>
<body>
    <header>
        <img src="logo.jpg" />
    </header>
    <main>
        <?php include "navigationsleiste.php";  ?>  <!---->
        <?php include "neuer_plan_dialog.php";  ?>  <!--include freischalten_markieren_freunde.html + JS für Dialog-->
        <section>
        </section>
    </main>
    <footer>&copy; Copyright 2016 Hajir</footer>
</body>
        <script>
            //hole die autocomplete-input-Felder gebe ihnen eine unique ID
            var tagsArray = document.getElementsByClassName("tags");
            for (var i = 0; i < tagsArray.length; i++) {
                tagsArray[i].setAttribute("id","tags"+i);
            }
        </script>
</html>
