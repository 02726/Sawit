<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menambahkan Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
	  <style>
body {
	background-color: #20B2AA; 
}
}
  </style
  </head>
  <body>
  <nav class="navbar navbar-dark bg-success">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">Data Perkebunan Sawit</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="displays.php">Daftar Nama</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="adds.php">Pengisian Data</a>
        </li>
        <li class="nav-item ">
         <a class="nav-link" href="mydelete.php">Penghapusan Data</a>
        </li>
      </ul>
           </div>
  </div>
  
</nav>
  <h1>Form Pengisian Data Pemilik Sawit</h1>
<div class="container">
<?php

$servername = "localhost";
$username = "Raja";
$password = "sim2282";
$dbname = "sawit";

$mysqli = new mysqli($servername, $username, $password, $dbname);
# check connection
if ($mysqli->connect_errno) {
echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
exit();
}

if (isset($_POST['submit'])) {
	
echo "Data Anda Terinput";
$KodePe= $_POST["kodepe"];
$Nama= $_POST["nama"];
$NomorHp= $_POST["nomorhp"];
$AlamatProvinsi= $_POST["alamatprovinsi"];
$AlamatKabupaten= $_POST["alamatkabupaten"];
$LuasLahan= $_POST["luaslahan"];
$JenisBenih= $_POST["jenisbenih"];
$JarakTanam= $_POST["jaraktanam"];
$Harga= $_POST["harga"];
$Penyakit= $_POST["penyakit"];
$Pupuk= $_POST["pupuk"];
$sql ="INSERT INTO `pemilik`(`KodePe`, `Nama Pemilik`, `Nomor HP`, `Alamat Provinsi`, `Alamat Kabupaten`, `Luas Lahan`, `Jenis Benih`, `Jarak Tanam`, `Harga`, `Penyakit`, `Pupuk`) VALUES ('$KodePe','$Nama','$NomorHp','$AlamatProvinsi', '$AlamatKabupaten','$LuasLahan','$JenisBenih','$JarakTanam', '$Harga', '$Penyakit', '$Pupuk')";
$sql2= $mysqli->query($sql);
}
?>
<form class="" method="POST" action="">
  <div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">NAMA</label>
  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Tuliskan Nama Anda" name="nama">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">KodePe</label>
  <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="Tuliskan Kode Pemilik Anda" name="kodepe">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Nomor HP</label>
  <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="Tuliskan Nomor HP Anda" name="nomorhp">
  </div>
<div class="mb-3">
    <label for="inputState" class="form-label">Alamat Asal Provinsi</label>
    <select id="inputState1" class="form-select" name="alamatprovinsi">
	<option selected>Pilih Provinsi Anda</option>
	<?php
$con=mysqli_connect("Localhost","Raja","sim2282","sawit");
//Check connection
if(mysqli_connect_errno())
{
echo"Failed to connect to MySQL:".mysqli_connect_error();
}
$result=mysqli_query($con,"SELECT * FROM `provinsi` ORDER BY IdProv ASC");
while($row = mysqli_fetch_array($result))
{
		$cup=$row['IdProv'];
?>
      <option value="<?php echo $row['IdProv']; ?>"><?php echo $row['Provinsi']; ?> </option>
	  <?php
}
?>
    </select>
  </div>
  <script>
  $( "#inputState1" ).change(function() {
   //alert($('#inputState1').val());
   var nilai = $('#inputState1').val();
   $.ajax({
                            method: 'POST',
                            url	: "kabupaten.php",
                            data: {provinsi:nilai},
                            success	: function(data){
                           $('#kabupaten').html(data);
                            }
                        });
});
  </script>
  <?php
	//echo "<script>document.write(nilai);</script>";
	//echo "Buku";
	?>
<div id="kabupaten"></div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Luas Lahan</label>
  <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="Tuliskan Luas Lahan Anda" name="luaslahan">
</div>
<div class="mb-3">
     <label for="inputState" class="form-label">Jenis Benih</label>
    <select id="inputState" class="form-select" name="jenisbenih">
	<option selected>Pilih Jenis Benih Yang Anda Gunakan </option>
      <?php
$con=mysqli_connect("Localhost","Raja","sim2282","sawit");
//Check connection
if(mysqli_connect_errno())
{
echo"Failed to connect to MySQL:".mysqli_connect_error();
}
$result=mysqli_query($con,"SELECT * FROM `tsawit` ORDER BY KodeS ASC");
while($row = mysqli_fetch_array($result))
{
	?>
      <option value="<?php echo $row['KodeS']; ?>"><?php echo $row['Jenis Sawit']; ?> </option>
	  <?php
}
?>
    </select>
	</div>
<div class="mb-3">
   <label for="inputState" class="form-label">Jarak Tanam</label>
    <select id="inputState" class="form-select" name="jaraktanam">
	<option selected>Pilih Jarak Tanam Yang Anda Gunakan</option>
      <?php
$con=mysqli_connect("Localhost","Raja","sim2282","sawit");
//Check connection
if(mysqli_connect_errno())
{
echo"Failed to connect to MySQL:".mysqli_connect_error();
}
$result=mysqli_query($con,"SELECT * FROM `jaraktanam` ORDER BY KodeJ ASC");
while($row = mysqli_fetch_array($result))
{
	?>
      <option value="<?php echo $row['KodeJ']; ?>"><?php echo $row['Jarak Tanam']; ?> </option>
	  <?php
}
?>
    </select>
</div>
<div class="mb-3">
   <label for="inputState" class="form-label">Harga</label>
    <select id="inputState" class="form-select" name="harga">
	<option selected>Pilih Harga Jual Tandan Sawit Segar Anda Per Kg</option>
      <?php
$con=mysqli_connect("Localhost","Raja","sim2282","sawit");
//Check connection
if(mysqli_connect_errno())
{
echo"Failed to connect to MySQL:".mysqli_connect_error();
}
$result=mysqli_query($con,"SELECT * FROM `hargasawit` ORDER BY KodeH ASC");
while($row = mysqli_fetch_array($result))
{
	?>
      <option value="<?php echo $row['KodeH']; ?>"><?php echo $row['HargaPerKg']; ?> </option>
	  <?php
}
?>
    </select>
</div>
<div class="mb-3">
   <label for="inputState" class="form-label">Penyakit</label>
    <select id="inputState" class="form-select" name="penyakit">
	<option selected>Pilih Penyakit Yang Ada di Kebun Anda</option>
      <?php
$con=mysqli_connect("Localhost","Raja","sim2282","sawit");
//Check connection
if(mysqli_connect_errno())
{
echo"Failed to connect to MySQL:".mysqli_connect_error();
}
$result=mysqli_query($con,"SELECT * FROM `penyakit` ORDER BY KodePy ASC");
while($row = mysqli_fetch_array($result))
{
	?>
      <option value="<?php echo $row['KodePy']; ?>"><?php echo $row['Jenis Penyakit']; ?> </option>
	  <?php
}
?>
    </select>
</div>
<div class="mb-3">
   <label for="inputState" class="form-label">Pupuk</label>
    <select id="inputState" class="form-select" name="pupuk">
	<option selected>Pilih Jenis Pupuk Yang Anda Pakai</option>
      <?php
$con=mysqli_connect("Localhost","Raja","sim2282","sawit");
//Check connection
if(mysqli_connect_errno())
{
echo"Failed to connect to MySQL:".mysqli_connect_error();
}
$result=mysqli_query($con,"SELECT * FROM `pupuk` ORDER BY KodeP ASC");
while($row = mysqli_fetch_array($result))
{
	?>
      <option value="<?php echo $row['KodeP']; ?>"><?php echo $row['Jenis Pupuk']; ?> </option>
	  <?php
}
?>
    </select>
</div>
<div class="col-12">
    <button type="submit" class="btn btn-success" name="submit" >Konfirmasi</button>
  </div>
</form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
