<?php


include('../dbconnect.php');
if (isset($_POST['simpan'])) {
    
    // var_dump($_POST['simpan']);
    // die;

    $idkategori = $_POST['idkategori'];
    $namakategori = $_POST['namakategori'];
    $tgldibuat = $_POST['tgldibuat'];

    $sql = "UPDATE kategori SET idkategori = '$idkategori',namakategori='$namakategori' ,tgldibuat = '$tgldibuat'
    WHERE idkategori='$idkategori'";
    $query = mysqli_query($conn, $sql);

    if ($query) {

        header('Location: index.php');
    } else {

        die("Gagal menyimpan perubahan...");
    }
} 
?>
<?php


$idkategori = $_GET['idkategori'];
$data = mysqli_query($conn, "SELECT * FROM kategori WHERE idkategori='$idkategori'");
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

        <form action="editkategori.php" method="POST">

            <fieldset>
                
                <input type="hidden" name="idkategori" value="<?php echo $d['idkategori']; ?>" />
                <p>
                    <label for="namakategori">nama kategori: </label>
                    <input type="text" name="namakategori" placeholder="nama kategori" value="<?php echo $d['namakategori']; ?>" />
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