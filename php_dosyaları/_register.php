<?php
require ('_mysqlbaglan.php');
if (isset($_POST['username']) && isset($_POST['password'])){
extract($_POST);
$password = hash('sha256', $password);
$sql="INSERT INTO `kullanicilar` (kullaniciadi,kullanicisoyadi,kullanicitc,kullanicicinsiyet,kullanicidogumtarihi,sifre)";
$sql = $sql . "VALUES ('$username','$soyad','$tc','$cinsiyet','$dogumtarihi','$password')";
$cevap = mysqli_query($baglanti, $sql);
if ($cevap){
$mesaj = "<h1>Uyarı: Kullanıcı oluşturuldu!</h1>";
}else{
$mesaj = "<h1>Uyarı: Kullanıcı oluşturulamadı!</h1>";
}
}
?>
<html>
<meta http-equiv="Content-Type" content="text/html;
charset=UTF-8" />
<head>
  <link rel="stylesheet" type="text/css" href="form.css" />
</head>
<body>
<?php
if (isset($mesaj)) echo $mesaj; ?>
    <div id="body_header">
      <h1>İNCİ DİŞ HASTANESİ RANDEVU SİSTEMİ</h1>
      <p>Kayıt Formu</p>
    </div>	
<form action="<?php $_PHP_SELF ?>" method="POST">
<font size='4'>Kullanıcı Adı:</font>
<input type="text" name="username"><br />
<font size='4'>Soyadı:</font> <input type="text" name="soyad" /> <br />
<font size='4'>Tc :</font> <input type="text" name="tc" /> <br />
<font size='4'>Cinsiyet : </font><input type="radio" name="cinsiyet" value="Erkek"/>
<font size='4'>Erkek </font>
<input type="radio" name="cinsiyet" value="Kadın"/>
<font size='4'>Kadın</form> <br />
<br /><br />
<font size='4'>Dogum Tarihi :</font> <input type="date" name="dogumtarihi" /> <br />
<font size='4'>Şifre:</font>
<input type="password" name="password"><br />
<input type="submit" value="KAYDET"/><br /><br />
<a href="_login.php"><font size='4'>Kullanıcı Girişi</font></a>
</form>
</body>
</html>