<?php


include('../dbconnect.php');
if (isset($_POST['simpan'])) {
    
    // var_dump($_POST['simpan']);
    // die;

    $no = $_POST['no'];
    $metode= $_POST['metode'];
    $norek=$_POST['norek'];
    $logo = $_POST['logo'];
    $an=$_POST['an'];

    $sql = "UPDATE pembayaran SET no= '$no',metode='$metode' ,norek = '$norek',an='$an'
    WHERE no='$no'";
    $query = mysqli_query($conn, $sql);

    if ($query) {

        header('Location: index.php');
    } else {

        die("Gagal menyimpan perubahan...");
    }
} 
?>
<?php


$no = $_GET['no'];
$data = mysqli_query($conn, "SELECT * FROM pembayaran WHERE no='$no'");
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

        <form action="editpembayaran.php" method="POST">

            <fieldset>
                
                <input type="hidden" name="no" value="<?php echo $d['no']; ?>" />
                <p>
                    <label for="metode">metode : </label>
                    <input type="text" name="metode" placeholder="metode" value="<?php echo $d['metode']; ?>" />
                </p>
                
                <p>
                    <label for="norek">norek : </label>
                    <input type="text" name="norek" placeholder="norek" value="<?php echo $d['norek'] ?>" />
                </p>
                <p>
                    <label for="logo">logo : </label>
                    <input type="text" name="logo" placeholder="logo" value="<?php echo $d['logo'] ?>" />
                </p>
                <p>
                    <label for="an">an : </label>
                    <input type="text" name="an" placeholder="an" value="<?php echo $d['an'] ?>" />
                </p>
                <p>
                    <input type="submit" value="Simpan" name="simpan" />
                </p>

            </fieldset>


        </form>
        <?php } ?>

    </body>


    </html>