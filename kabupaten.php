<div class="mb-3">
    <label for="inputState" class="form-label">Alamat Asal Kabupaten/Kota</label>
    <select id="inputState2" class="form-select" name="alamatkabupaten">
	<option selected>Pilih Kabupaten/Kota</option>
	<?php
$con=mysqli_connect("Localhost","Raja","sim2282","sawit");
//Check connection
if(mysqli_connect_errno())
{
echo"Failed to connect to MySQL:".mysqli_connect_error();
}
$IdProv=$_POST["provinsi"];
?>

	<?php
$result=mysqli_query($con,"SELECT * FROM `kabupatenkota` WHERE IdProv=$IdProv ORDER BY Kabupaten ASC");
while($row = mysqli_fetch_array($result))
{
		//$cup=$row['IdProv'];
?>
      <option value="<?php echo $row['IdKab']; ?>"><?php echo $row['Kabupaten']; ?> </option>
	  <?php
}
?>
    </select>
</div>