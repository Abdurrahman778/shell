<?php
require 'bbm.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harga Bahan Bakar | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            height: 90vh;
            background-image: url(https://img.freepik.com/free-vector/abstract-background-design-dark-gray_53876-59277.jpg?t=st=1711683609~exp=1711687209~hmac=03fde7bf1f88de65defef90def1edc236038ba48a2c9a9897b842c2748ef746d&w=826);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body>
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 m-auto">
                <div class="card bg-dark text-white text-center">
                    <div class="card-body">
                        <form action="" method="POST" class="row d-flex align-items-center">
                            <div class="col">
                                <input placeholder="masukan jumlah liter" type="number" name="liter" id="liter"
                                    class="form-control my-3 py-2">
                            </div>
                            <div class="col">
                                <select name="jenis" id="bensin" class="form-select"
                                    aria-label="Default select example">
                                    <option value="Super">Shell Super</option>
                                    <option value="Power">Shell V-Power</option>
                                    <option value="Diesel">Shell V-Power Diesel</option>
                                    <option value="Nitro">Shell V-Power Nitro</option>
                                </select>
                            </div>
                            <input type='number' name='uang' class='form-control my-3 py-2'
                                placeholder='masukan jumlah uang'>
                            <div class="d-grid">
                                <button type="submit" name="submit" class="btn btn-success">Hitung</button>
                            </div>
                        </form>
                        <div>
                            <?php
                            if (isset($_POST['submit']) && $_POST['liter'] && $_POST['jenis'] && $_POST['uang']) {
                                $produk1 = new beli($liter, $jenis, $uang);
                                $produk1->beli();
                            } else {
                                echo "silahkan masukan input dengan benar ";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">STRUK</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <h5>Jenis BBM:</h5>
                        <p><?php echo $produk1->jenis; ?>
                        </p>
                        <h5>Jumlah:</h5>
                        <p><?php echo $produk1->liter . " liter"; ?>
                        </p>
                        <h5>Jumlah Uang:</h5>
                        <p><?php echo "Rp. " . $produk1->uang; ?>
                        </p>
                        <h5>Jumlah Kembalian:</h5>
                        <p><?php echo "Rp. " . $produk1->kembalian; ?>
                        </p>
                    </form>
                </div>
                <div class="modal-footer">
                    <?php 
                        echo '<button type="button" class="btn btn-secondary" onclick=window-print() name="cetak" data-bs-dismiss="modal">Print Struk</button>';
                    ?>
                    
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>