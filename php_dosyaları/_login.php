<?php
session_start();
require('_mysqlbaglan.php');
if (isset($_POST['tc']) and
isset($_POST['password'])){
extract($_POST);
$password = hash('sha256', $password);
$sql = "SELECT * FROM `kullanicilar` WHERE ";
$sql= $sql . "kullanicitc='$tc' and
sifre='$password'";
$cevap = mysqli_query($baglanti, $sql);
if(!$cevap ){
echo '<br>Hata:' . mysqli_error($baglanti);
}
$say = mysqli_num_rows($cevap);
if ($say == 1){
$_SESSION['tc'] = $tc;
}else{
$mesaj = "<h1> Hatalı TC veya Şifre!</h1>";
}
}
if (isset($_SESSION['tc'])){
header("Location: _uyesayfasi.php");
}else{
?>
<html>
<meta http-equiv="Content-Type" content="text/html;
charset=UTF-8" />
<head>
  <link rel="stylesheet" type="text/css" href="form.css" />
</head>
<body>
    <div id="body_header">
      <h1>İNCİ DİŞ HASTANESİ RANDEVU SİSTEMİ</h1>
      <p>Randevu İçin Lütfen Giriş Yapınız</p>
    </div>
<form action="<?php $_PHP_SELF ?>" method="POST">
<?php
if(isset($mesaj)){ echo $mesaj;}
?>
<font size='4'>Kullanıcı TC Kimlik Numarası:</font>
<input type="text" name="tc"><br />
<font size='4'>Şifre: </font>
<input type="password" name="password" ><br /><br />
<input type="submit" value="Giriş"/><br /><br />
<a href="_register.php"><font size='4'>Kayıt Ol</font></a>
</form>
</body>
</html>
<?php } ?>