<?php


include('../dbconnect.php');
if (isset($_POST['simpan'])) {
    
    // var_dump($_POST['simpan']);
    // die;
    $idproduk = $_POST['idproduk'];
    $idkategori = $_POST['idkategori'];
    $namaproduk = $_POST['namaproduk'];
    $gambar =$_POST['gambar'];
    $deskripsi = $_POST['deskripsi'];
    $rate = $_POST['rate'];
    $hargabefore = $_POST['hargabefore'];
    $hargaafter = $_POST['hargaafter'];
    $tgldibuat = $_POST['tgldibuat'];

    $sql = "UPDATE produk SET idproduk = '$idproduk',idkategori = '$idkategori',namaproduk = '$namaproduk',gambar ='$gambar',
    deskripsi = '$deskripsi' ,rate = '$rate', hargabefore = '$hargabefore',hargaafter = '$hargaafter' ,tgldibuat = '$tgldibuat'
    WHERE idproduk='$idproduk'";
    $query = mysqli_query($conn, $sql);

    if ($query) {

        header('Location: index.php');
    } else {

        die("Gagal menyimpan perubahan...");
    }
} 
?>
<?php


$idproduk = $_GET['idproduk'];
$data = mysqli_query($conn, "SELECT * FROM produk WHERE idproduk='$idproduk'");
while ($d = mysqli_fetch_array($data)) {
?>



<!DOCTYPE html>
    <html>

    <head>
        <title>Belajar PHP | Edit Data</title>
    </head>

    <body>
        <header>
            <h3>Edit Identitas</h3>
        </header>

        <form action="editProduk.php" method="POST">

            <fieldset>
                <input type="hidden" name="idproduk" value="<?php echo $d['idproduk']; ?>" />
                <input type="hidden" name="idkategori" value="<?php echo $d['idkategori']; ?>" />
                <p>
                    <label for="nama">nama: </label>
                    <input type="text" name="namaproduk" placeholder="nama lengkap" value="<?php echo $d['namaproduk']; ?>" />
                </p>
                <p>
                    <label for="gambar">gambar: </label>
                    <textarea name="gambar"><?php echo $d['gambar'] ?></textarea>
                </p>
                <p>
                    <label for="deskripsi">deskripsi: </label>
                    <textarea name="deskripsi"><?php echo $d['deskripsi'] ?></textarea>
                </p>

                <p>
                    <label for="hargabefore">hargabefore: </label>
                    <input type="text" name="hargabefore" placeholder="hargabefore" value="<?php echo $d['hargabefore'] ?>" />
                </p>

                <p>
                    <label for="hargaafter">hargaafter: </label>
                    <input type="text" name="hargaafter" placeholder="hargaafter" value="<?php echo $d['hargaafter'] ?>" />
                </p>
                <p>
                    <label for="tgldibuat">tgldibuat: </label>
                    <input type="text" name="tgldibuat" placeholder="tgldibuat" value="<?php echo $d['tgldibuat'] ?>" />
                </p>
                <p>
                    <input type="submit" value="Simpan" name="simpan" />
                </p>

            </fieldset>


        </form>
        <?php } ?>

    </body>


    </html>