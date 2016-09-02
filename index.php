<!DOCTYPE html>
<!--Die Datei wurde mit .php-Endung gespeichert, da sonst <?php //include?> nicht funktioniert. Aus Gewohnheit werden bei Attribut Wertzuweisungen Anf�hrungszeichen benutzt -->
<html lang="de">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ProjektA</title>
    <link rel="stylesheet" href="jquery-ui.css" />
    <link rel="stylesheet" href="jquery-ui.theme.css" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
</head>
<body>
    <header>                                                                            <!--Kopfbereich des BODY-->
        <img src="logo.jpg" />                                                          <!--Logo der Applikation-->
    </header>
    <main>                                                                              <!--Hauptbereich des BODY-->
        <section>                                                                       <!--Bereich Login-Registrieren-Formular -->
            <form id="login_form" action="javascript:login();">                         <!--Formular ruft JS Methode auf -->
                                                                                        <!--Login-Formular -->
                <h1 class="login-title">Login</h1>                                      <!--Überschrift -->
                <label for="login_username">Nutzername</label>
                <br />                                                                  <!--Label für Nutzername -->
                <input type="text" id="login_username" name="login_username" required="required" />   <!--Input Nutzername -->
                <br />
                <label for="login_password">Passwort</label>
                <br />                                                                  <!--Label für Passwort -->
                <input type="password" id="login_password" name="login_password" required="required" /> <!--Input Passwort -->
                <button type="submit">Login</button>                                    <!--Submit Button -->
            </form>
            <section id="response_container"></section>                                 <!--wird als Container für die AJAX Antwort genutzt-->
            
            <form id="register_form" action="javascript:register();">                   <!--Registrieren-Formular -->
                <h1 class="register-title">Registrieren</h1>                            <!--Üerschrift -->
                <label for="r_username">Nutzername</label>
                <br />                                                                  <!--Label für Nutzername -->
                <input type="text" id="r_username" name="r_username" required="required" />
                <br />
                <br />                                                                  <!--Input Nutzername -->
                <label for="r_firstname">Vorname</label>
                <br />                                                                  <!--Label für Vorname-->
                <input type="text" id="r_firstname" name="r_firstname" required="required" />
                <br />                                                                  <!--Input Vorname-->
                <label for="r_lastname">Nachname</label>
                <br />
                <input type="text" id="r_lastname" name="r_lastname" required="required" />
                <br />
                <label for="r-password">Passwort</label>
                <br />                                                                  <!--Label für Passwort -->
                <input type="password" id="r-password" name="r-password" required="required" />
                <br />                                                                  <!--Input Passwort -->
                <label for="r-password-cnf">Passwort wiederholen</label>
                <br />                                                                  <!--Label für Passwort-wdh -->
                <input type="password" id="r-password-cnf" name="r-password-cnf" required="required" />
                <br />
                <br />                                                                  <!--Input Passwort-wdh -->
                <button type="submit">OK</button>                                       <!--Submit Button -->
            </form>
            <section id="response_container2"></section>                                <!--wird als Container für die AJAX Antwort genutzt-->
        </section>
        <?php include "werbung.php";  ?>                                                <!--Werbebereich-->
    </main>
 <footer>&copy; Copyright 2016 Hajir</footer>                                           <!--Fußbereich des BODY-->
     <script>
//********************JS Code sollte ausgelagert werden**************************
//Passwörter des Regeistrier-Formulars checken
      var password = document.getElementById("r-password"), confirm_password = document.getElementById("r-password-cnf");
      function validatePassword(){
        if(checkPassword(password.value)){                                                 //check Passwortformat-und-Länge
            if(password.value != confirm_password.value) {                                 //check Passwort Gleichheit
              confirm_password.setCustomValidity("Passwoerter stimmen nicht ueberein");
            } else {confirm_password.setCustomValidity('');}

        }else {password.setCustomValidity("Passwortlänge muss 6 sein. Mindestens 1 Zahl, 1 Kleinbuchstabe, 1 Großbuchstabe");}
      }
      function checkPassword(str){
        var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;  //Regulärer Ausdruck: Mindestens 1 Zahl, 1 Kleinbuchstabe, 1 Großbuchstabe
        return re.test(str);                             // Länge mind. 6 Zeichen. test() liefert true/false
        }
      password.onchange = validatePassword;
      confirm_password.onkeyup = validatePassword;
//Vorname und Nachname des Regeistrier-Formulars checken
      var r_firstname = document.getElementById("r_firstname"), r_lastname = document.getElementById("r_lastname"), r_username = document.getElementById("r_username");
      function validateVorname() {
          var re = /^[a-zA-Z]*$/;                      //Regulärer Ausdruck: Nur a-z und A-Z erlaubt, keine Leerzeichen erlaubt
          if (re.test(r_firstname.value)) {            //liefert true, wenn alles eingehalten wurde
              r_firstname.setCustomValidity('');
          } else { r_firstname.setCustomValidity("Bitte nur Gross/Kleinbuchstaben ohne Lehrzeichen"); }
      }
      function validateNachname() {
          var re = /^[a-zA-Z]*$/;
          if (re.test(r_lastname.value)) {
              r_lastname.setCustomValidity('');
          } else { r_lastname.setCustomValidity("Bitte nur Gross/Kleinbuchstaben ohne Lehrzeichen"); }
      }
      r_firstname.onkeyup = validateVorname;
      r_lastname.onkeyup = validateNachname;
//Nutzername des Regeistrier-Formulars checken
    function validateUsername() {
        var re = /^[a-zA-Z0-9*?!-]*$/;
        if (re.test(r_username.value)) {
            r_username.setCustomValidity('');
        } else { r_username.setCustomValidity("Bitte nur Gross/Kleinbuchstaben,Zahlen und Spezialzeichen(*-?!) ohne Leerzeichen"); }
    }
    r_username.onkeyup = validateUsername;

//AJAX: Login und Registrierung
      var login_username = document.getElementById("login_username"), login_password = document.getElementById("login_password");
      function login() {
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function () {
              if (xhttp.readyState == 4 && xhttp.status == 200) {
                  var serverResponse = xhttp.responseText;
                  if (serverResponse.includes("falsch")) {
                  } else {
                      //login_form leeren
                      var login_form = document.getElementById("login_form");
                      while (login_form.firstChild) {                                    //solange der Knoten ein 'firstChild' hat -> entferne 'firstChild'
                          login_form.removeChild(login_form.firstChild);
                      }
                      //register_form leeren
                      var register_form = document.getElementById("register_form");
                      while (register_form.firstChild) {                                 
                          register_form.removeChild(register_form.firstChild);
                      }                            
                  }
                //respnse_container füllen
                document.getElementById("response_container").innerHTML = serverResponse;
              }
          }
          xhttp.open("GET", "form_eval_login.php?password=" +login_password.value+"&username="+ login_username.value , true);
          xhttp.send();
      }
              function register() {
                  var xhttp = new XMLHttpRequest();
                  xhttp.onreadystatechange = function () {
                      if (xhttp.readyState == 4 && xhttp.status == 200) {
                          var serverResponse = xhttp.responseText;
                          if(serverResponse.includes("Fehler")){
                          } else {
                              //login_form leeren
                              var login_form = document.getElementById("login_form");
                              while (login_form.firstChild) {                                    
                                  login_form.removeChild(login_form.firstChild);
                              }
                              //register_form leeren
                              var register_form = document.getElementById("register_form");
                              while (register_form.firstChild) {                                 
                                  register_form.removeChild(register_form.firstChild);
                              }
                          }
                       //respnse_container füllen
                       document.getElementById("response_container2").innerHTML = serverResponse;
                      }
                  }
                  xhttp.open("GET", "form_eval_register.php?password=" + password.value + "&username=" + r_username.value+"&firstname="+r_lastname.value+"&lastname="+r_firstname.value, true);
                  xhttp.send();
              }
    </script>
</body>
</html>
