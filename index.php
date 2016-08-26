<!DOCTYPE html>
<!--Die Datei wurde mit .php-Endung gespeichert, da sonst <?php include?> nicht funktioniert. Aus Gewohnheit werden bei Attribut Wertzuweisungen Anführungszeichen benutzt --> 
<html lang="de">
<head>
  <meta charset="utf-8" />
  <title>ProjektA</title>
</head>
<body>
  <header> 
    <?php include "navigation.php" ?>
  </header>
  <main>
    <?php include "neuer_plan_dialog.php" ?>
    
    <section>                                                                             <!--Bereich Login-Registrieren-Formular -->
    <form action="login.php" method="get">                                                <!--Login-Formular -->
      <h1 class="login-title">Login</h1>                                                  <!--Überschrift -->
      <label for="nutzername">Nutzername</label><br>                                      <!--Label für Nutzername -->
      <input type="text" id="nutzername" name="nutzername" required="required"/> <br><br> <!--Input Nutzername -->
      <label for="passwort">Passwort</label><br>                                          <!--Label für Passwort -->
      <input type="password" id="passwort" name="passwort" required="required"/><br><br>  <!--Input Passwort -->
      
      <button type="submit">OK</button>                                                   <!--Submit Button -->
    </form>
    
    <form action="register.php" method="get">                                             <!--Registrieren-Formular -->
      <h1 class="register-title">Registrieren</h1>                                        <!--Überschrift -->
      <label for="Nutzername">Nutzername</label><br>                                      <!--Label für Nutzername -->
      <input type="text" id="Nutzername" name="Nutzername" required="required"/> <br><br> <!--Input Nutzername -->
      <label for="r-Passwort">Passwort</label><br>                                        <!--Label für Passwort -->
      <input type="password" id="r-Passwort" name="r-Passwort" required="required"/><br>  <!--Input Passwort -->
      <label for="r-Passwort-wdh">Passwort wiederholen</label><br>                        <!--Label für Passwort-wdh -->
      <input type="password" id="r-Passwort-wdh" name="r-Passwort-wdh" required="required"/><br><br>  <!--Input Passwort-wdh -->
      
      <button type="submit">OK</button>                                                   <!--Submit Button -->
    </form>
  </section>
</main>
  <script>    //Passwörter des Regeistrieren-Formulars checken
      var password = document.getElementById("r-Passwort"), confirm_password = document.getElementById("r-Passwort-wdh");
      
      function validatePassword(){         
        if(checkPassword(password.value)){                                                 //check Passwortformat-und-Länge
            if(password.value != confirm_password.value) {                                 //check Passwort Gleichheit
              confirm_password.setCustomValidity("Passwoerter stimmen nicht ueberein");
            } else {confirm_password.setCustomValidity('');}
            
        }else {password.setCustomValidity("Passwortlänge muss 6 sein. Mindestens 1 Zahl, 1 Kleinbuchstabe, 1 Großbuchstabe");}
      }
      
      function checkPassword(str){
        var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;  //Regulärer Ausdruck: Mindestens 1 Zahl, 1 Kleinbuchstabe, 1 Großbuchstabe
        return re.test(str);                            // Länge mind. 6 Zeichen. test() liefert true/false
        }
      password.onchange = validatePassword;
      confirm_password.onkeyup = validatePassword;
  </script>
  
  <script>                                                  //öffnet und schließt Dialog für neue Plan-Erstellung
     var startbutton = document.getElementById("Neuer-Plan"),
      dialog = document.getElementById('dialog'),
      erstellebutton = document.getElementById("Erstelle"),
      zurueckbutton = document.getElementById("Zurueck");
     startbutton.addEventListener('click', zeigeFenster);
     erstellebutton .addEventListener('click', schließeFenster);
     zurueckbutton .addEventListener('click', schließeFenster);
    
     function zeigeFenster() {
      dialog.showModal();
     }
    
     function schließeFenster() {
      dialog.close();
     }
</script>
</body>
<footer>&copy; Copyright 2016 Hajir</footer>
</html>
