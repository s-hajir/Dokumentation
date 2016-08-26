<!DOCTYPE html>
<!--Die Datei wurde mit .php-Endung gespeichert, da sonst <?php //include ?> nicht funktioniert. Aus Gewohnheit werden bei Attribut Wertzuweisungen Anführungszeichen benutzt --> 
<html lang="de">
<head>
  <meta charset="utf-8" />
  <title>ProjektA</title>
</head>
<body>
  <header> 
    <img src="logo.jpg">
  </header>
  <main>
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
      <label for="Vorname" >Vorname</label><br>                                           <!--Label für Vorname -->
      <input type="text" id="Vorname" name="Vorname" required="required"/><br>            <!--Input Vorname -->
      <label for="Nachname">Nachname</label><br>                                          <!--Label für Nachname -->
      <input type="text" id="Nachname" name="Nachname" required="required" /><br>         <!--Input Nachname -->
      <label for="r-Passwort">Passwort</label><br>                                        <!--Label für Passwort -->
      <input type="password" id="r-Passwort" name="r-Passwort" required="required"/><br>  <!--Input Passwort -->
      <label for="r-Passwort-wdh">Passwort wiederholen</label><br>                        <!--Label für Passwort-wdh -->
      <input type="password" id="r-Passwort-wdh" name="r-Passwort-wdh" required="required"/><br><br>  <!--Input Passwort-wdh -->
      
      <button type="submit">OK</button>                                                   <!--Submit Button -->
    </form>
  </section>
  <?php include "werbung.html"; ?>
</main>
  <script>    //Passwörter des Regeistrier-Formulars checken
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
      
      //Vorname und Nachname des Regeistrier-Formulars checken
      var vorname = document.getElementById("Vorname"), nachname = document.getElementById("Nachname");
      function validateVorname() {
          var re = /^[a-zA-Z]*$/;                      //Regulärer Ausdruck: Nur a-z und A-Z erlaubt, keine Leerzeichen erlaubt
          if (re.test(vorname.value)) {                //liefert true, wenn alles eingehalten wurde
              vorname.setCustomValidity('');
          } else { vorname.setCustomValidity("Bitte nur Gross/Kleinbuchstaben ohne Lehrzeichen"); }
      }
      function validateNachname() {
          var re = /^[a-zA-Z]*$/;                      
          if (re.test(nachname.value)) {                      
              nachname.setCustomValidity('');
          } else { nachname.setCustomValidity("Bitte nur Gross/Kleinbuchstaben ohne Lehrzeichen"); }
      }
      vorname.onkeyup = validateVorname;
      nachname.onkeyup = validateNachname;
  </script>
  
<footer>&copy; Copyright 2016 Hajir</footer>
</body>
</html>
