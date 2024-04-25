<?php
if (isset($_POST['submit']) && $_POST['liter'] && $_POST['jenis'] && $_POST['uang']) {
    $liter = $_POST['liter'];
    $jenis = $_POST['jenis'];
    $uang = $_POST['uang'];
    class shell
    {
        public
        $uang,
        $harga,
        $liter,
        $jenis,
        $ppn = 0.1;
        public function __construct($liter, $jenis, $uang)
        {
            $this->uang = $uang;
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
        public $kembalian;
        public function beli()
        {
            $total = number_format(($this->liter * $this->harga) + $this->harga * $this->liter * $this->ppn, 2, ',', '.');
            $this->kembalian = number_format($this->uang - ($this->liter * $this->harga) - ($this->harga * $this->liter * $this->ppn), 2, ',', '.');
            $str = "
            <form action='pembayaran.php' method='POST'>
                <div class='card my-3 bg-secondary text-white'>
                    <div class='card-body text-center'>
                    <h3>Shell V-$this->jenis</h3>
                        <p class=' ms-2 mb-0'> jumlah $this->liter liter</p> 
                        <p class=' ms-2 mb-0'>Kamu harus membayar Rp $total</p>
                        kamu membayar jumlah uang sebesar $this->uang dan kembaliannya Rp. $this->kembalian <br>
                        <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal' data-bs-whatever='@mdo'>Cetak Struk</button>
                    </div>
                    </div>
                    </form>";
            echo $str;
        }
    }
} //end if statement