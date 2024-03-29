<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shell</title>
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
                            <div class="d-grid">
                                <button type="submit" name="submit" class="btn btn-success">Hitung</button>
                            </div>
                        </form>
                        <div>
                        <?php
if (isset($_POST['submit']) && $_POST['liter'] && $_POST['jenis']) {
    $liter = $_POST['liter'];
    $jenis = $_POST['jenis'];
    class shell
    {
        public
        $harga,
        $liter,
        $jenis,
        $ppn = 10 / 100;

        public function __construct($liter, $jenis)
        {
            $this->liter = $liter;
            $this->jenis = $jenis;
            switch ($this->jenis) {
                case "Super":
                    $this->harga = 15420;
                    break;
                case "Power":
                    $this->harga = 16130;
                    break;
                case "Diesel":
                    $this->harga = 18310;
                    break;
                case "Nitro":
                    $this->harga = 16250;
                    break;
            }
        }
    }

    class beli extends shell
    {
        public function beli()
        {
            $total = number_format(($this->liter * $this->harga) + $this->harga * $this->liter * $this->ppn, 2, ',', '.');

            $str = "<div class='card my-3 bg-secondary text-white'>
            <div class='card-body text-center'>
            <h3>Shell V-$this->jenis</h3>
                <p class=' ms-2 mb-0'> jumlah $this->liter liter</p> 
                <p class=' ms-2 mb-0'>Kamu harus membayar Rp $total</p> 
            </div>
            </div>";
            echo $str;
        }
    }

    $produk1 = new beli($liter, $jenis);
    $produk1->beli();

} else {
    echo '
    <div class="alert alert-danger my-3" role="alert">
        Silahkan Masukan Jumlah Liter dan Jenis Bensin
    </div>';
} //end if statement
?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>