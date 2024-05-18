<?php
// Kullanıcı adı ve şifre kontrolü
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Doğru kullanıcı adı ve şifre
    $correct_username = "g231210044@sakarya.edu.tr";
    $correct_password = "g231210044";

    // Kullanıcı adı ve şifre alınması
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kullanıcı adı ve şifre kontrolü
    if (!empty($username) && !empty($password)) {
        // Kullanıcı adı ve şifrenin doğruluğunun kontrolü
          if ($username === $correct_username && $password === $correct_password) {
            // Başarılı giriş durumunda
            $_SESSION['username'] = $username; // Kullanıcıyı oturumda sakla
            header("Location: index.html"); // Ana sayfaya yönlendir
            exit; // İşlem sonlandırılıyor
        } else {
            // Hatalı kullanıcı adı veya şifre durumunda
            echo "Kullanıcı adı veya şifre hatalı. Lütfen tekrar deneyiniz.";
        }
    } else {
        // Kullanıcı adı veya şifre boş bırakıldığında
        echo "Kullanıcı adı veya şifre boş bırakılamaz!";
    }
}
?>


<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kişisel Portfolio Website</title>
    <link rel="stylesheet" href="stylekaydol.css">
    <script src="https://kit.fontawesome.com/27c32d15b7.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="header">
        <div class="container"> 
            <nav>
                <img src="images/kyrie-irving-logo-kenneth-smith-transparent.png" class="logo">
                <ul id="sidemenu">
                    <li><a href="index.html">Hakkında</a></li>
                    <li><a href="hobilerim.html">Hobilerim</a></li>                    
                    <li><a href="cv.html">Özgeçmiş</a></li>
                    <li><a href="sehrimiz.html">Şehrim</a></li>
                    <li><a href="mirasımız.html">Mirasımız</a></li>
                    <li><a href="iletisim.html">İletişim</a></li>
                    <li><a href="kaydol.html">Giriş Yap / Kaydol</a></li>
                    <i class="fa-solid fa-xmark" onclick="closemenu()"></i>
                </ul>
                <i class="fa-solid fa-bars" onclick="openmenu()"></i>
            </nav>
        </div>
    </div>
    <div id="login-form">
        <h2>Giriş Yap</h2>
        <form id="login-form" action="login.php" method="post">
            <label for="username">Kullanıcı Adı:</label>
            <input type="email" id="username" name="username" required><br><br>
            <label for="password">Şifre:</label>
            <input type="password" id="password" name="password" required><br><br>
            <input type="submit" value="Giriş Yap">
        </form>
        <div id="notification"></div>
    </div>
    <script>
        var sidemeu = document.getElementById("sidemenu");

        function openmenu(){
            sidemeu.style.right="0";
        }
        function closemenu(){
            sidemeu.style.right="-200px";
        }

        // Başarılı giriş bildirimi ve yönlendirme
        var form = document.getElementById("login-form");
        form.addEventListener("submit", function(event) {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            if(username === "g231210044@sakarya.edu.tr" && password === "g231210044") {
                event.preventDefault(); // Formun otomatik gönderilmesini engelle
                var notification = document.getElementById("notification");
                notification.innerHTML = "Başarıyla giriş yaptınız! Ana sayfaya yönlendiriliyorsunuz.";
                notification.style.color = "green";
                setTimeout(function() {
                    notification.innerHTML = "";
                    window.location.href = "index.html"; // Ana sayfaya yönlendir
                }, 3000); // 3 saniye sonra bildirimi kaldır ve yönlendir
            } else {
                event.preventDefault(); // Formun otomatik gönderilmesini engelle
                var notification = document.getElementById("notification");
                notification.innerHTML = "Kullanıcı adı veya şifre hatalı. Lütfen tekrar deneyiniz.";
                notification.style.color = "red";
                setTimeout(function() {
                    notification.innerHTML = "";
                }, 3000); // 3 saniye sonra bildirimi kaldır
            }
        });
    </script>
</body>
</html>
