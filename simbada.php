<?php
$koneksi=mysqli_connect("localhost","root","","hijab_store")
?>
<!DOCTYPE html>
<html>
<head>
    <title>Arabel hijab store :)</title>
</head>
<body background="gambar1.PNG">


<center>
<h2>Registrasi Pembuatan Kartu Member ARABEL HIJAB STORE</h2>

<?php
    $dataEdit[1]="";
    $dataEdit[2]="";
    $dataEdit[3]="";
    $dataEdit[4]="";
    $dataEdit[5]="";
    $dataEdit[6]="";
    $tombol="registrasi";
    if(isset($_GET['aksi'])) {
        if($_GET['aksi']=='edit') {
            $edit="SELECT * FROM tabel_customers WHERE id='$_GET[id]'";
            $cekEdit= mysqli_query($koneksi,$edit);
            $dataEdit=mysqli_fetch_array($cekEdit);

            $tombol="edit";
        }
    }
?>
<form action="" method="post">
    <table bgcolor="pink">
        <tr>
            <td>TANGGAL</td>
            <td>:</td> 
            <td><input type="date" name="tanggal" value="<?=$dataEdit[1]?>"></td>
        </tr>
        <tr>
            <td>NAMA</td>
            <td>:</td> 
            <td><input type="text" name="nama" value="<?=$dataEdit[2]?>"></td>
        </tr>
        <tr>
            <td>UMUR</td>
            <td>:</td> 
            <td><input type="number" name="umur" value="<?=$dataEdit[3]?>"></td>
        </tr>
        <tr>
            <td>JENIS_KELAMIN</td>
            <td>:</td> 
            <td><input type="text" name="jenis_kelamin" value="<?=$dataEdit[4]?>"></td>
        </tr>
        <tr>
            <td>ALAMAT</td>
            <td>:</td> 
            <td><input type="text" name="alamat" value="<?=$dataEdit[5]?>"></td>
        </tr>
        <tr>
            <td>NO_HP</td>
            <td>:</td> 
            <td><input type="number" name="no_hp" value="<?=$dataEdit[6]?>"></td>
        </tr>
    </table>
    <input type="submit" value="<?=$tombol?>" name="<?=$tombol?>">
</form>


<table border="1" bgcolor="lightskyblue">
<thead>
    <th>NOMOR</th>
    <th>TANGGAL</th>
    <th>NAMA</th>
    <th>UMUR</th>
    <th>JENIS KELAMIN</th>
    <th>ALAMAT</th>
    <th>NO_HP</th>
    <th>Aksi</th>
</thead>
</body>

<?php
    $sqlView = "SELECT * FROM `tabel_customers`";
    $cekView = mysqli_query($koneksi, $sqlView);
        
    $nomor = 1;
    while ($data = mysqli_fetch_array($cekView)) {
?>
    <tr>
        <td><?=$nomor?></td>
        <td><?=$data[1]?></td>
        <td><?=$data[2]?></td>
        <td><?=$data[3]?></td>
        <td><?=$data[4]?></td>
        <td><?=$data[5]?></td>
        <td><?=$data[6]?></td>
        <td>
            <a href="pemrograman.php?id=<?=$data[0]?>&aksi=edit">Edit</a>
        </td>
    </tr>

<?php
    $nomor=$nomor+1;
    }
?>

</tbody>
</table>
</center>
</body>
</html>

<?php
    if(isset($_POST['registrasi'])) 
    {
        $sql = "INSERT INTO `tabel_customers` (`tanggal`,`nama`,`umur`,`jenis_kelamin`,`alamat`,`no_hp`) VALUES ('$_POST[tanggal]','$_POST[nama]', '$_POST[umur]', '$_POST[jenis_kelamin]', '$_POST[alamat]', '$_POST[no_hp]')";
        $cekInput = mysqli_query($koneksi, $sql);
        // var_dump($sql);
        // die;
        if($cekInput) {
            echo "<script> window.location = 'pemrograman.php'</script>";
        } else {    
            echo "Data belum masuk";
        }
    }
    else if (isset($_POST['edit']))
    {
        $edit = "UPDATE `tabel_customers` SET `tanggal` = '$_POST[tanggal]',`nama` = '$_POST[nama]', `umur` = '$_POST[umur]', `jenis_kelamin` = '$_POST[jenis_kelamin]', `alamat` = '$_POST[alamat]', `no_hp` = '$_POST[no_hp]'  WHERE `tabel_customers`.`id` = '$_GET[id]';";
        $cekEdit = mysqli_query($koneksi, $edit);  

        if($cekEdit) {
            echo "<script> window.location = 'pemrograman.php'</script>";
        } else {    
            echo "Data belum masuk";
        }
    }
?>