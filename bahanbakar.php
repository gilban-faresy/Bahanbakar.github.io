<?php 
// Sediakan kotak pembungkus yang akan digunakan (sesuai fitur)
class DataBahanBakar {
    private $HargaSSuper;
    private $HargaSVPower;
    private $HargaSVPowerDiesel;
    private $HargaSVPowerNitro;

    public $jenisYangDipilih;
    public $totalLiter;
    protected $totalPembayaran;

    public function setHarga($valSSuper, $valSVPower, $valSVPowerDiesel, $valSVPowerNitro) {
        $this->HargaSSuper = $valSSuper;
        $this->HargaSVPower = $valSVPower;
        $this->HargaSVPowerDiesel = $valSVPowerDiesel;
        $this->HargaSVPowerNitro = $valSVPowerNitro;
    }

    public function getHarga() {
        $semuaDataSolar["SSuper"] = $this->HargaSSuper;
        $semuaDataSolar["SVPower"] = $this->HargaSVPower;
        $semuaDataSolar["SVPowerDiesel"] = $this->HargaSVPowerDiesel;
        $semuaDataSolar["SVPowerNitro"] = $this->HargaSVPowerNitro;
        return $semuaDataSolar;
    }
}

class Pembelian extends DataBahanBakar {
    public function totalHarga() {
        $this->totalPembayaran = $this->getHarga()[$this->jenisYangDipilih] * $this->totalLiter;
    }

    public function cetakBukti() {
        echo "<div class='output'>";
        echo "---------------------------------------<br>";
        echo "Jenis Bahan bakar : " . $this->jenisYangDipilih . "<br>";
        echo "Total Liter : " . $this->totalLiter . "<br>";
        echo "Harga Bayar : Rp. " . number_format($this->totalPembayaran, 0, ',', '.') . "<br>";
        echo "---------------------------------------<br>";
        echo "</div>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['beli'])) {
    $liter = $_POST['liter'];
    $jenis = $_POST['jenis'];

    $pembelian = new Pembelian();
    $pembelian->setHarga(15000, 17000, 18000, 19000); // Contoh harga bahan bakar
    $pembelian->jenisYangDipilih = $jenis;
    $pembelian->totalLiter = $liter;
    $pembelian->totalHarga();
    ob_start();
    $pembelian->cetakBukti();
    $output = ob_get_clean();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menghitung Harga dengan konsep OOP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        .form-konten {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .form-jenis {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, select, button {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 200px;
        }
        button {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .output {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: left;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['beli'])) {
        echo $output;
    }
    ?>

    <div class="form-konten">
        <h2>Menghitung Harga Bahan Bakar</h2>
        <form action="" method="post">
            <div class="form-jenis">
                <label for="liter">Masukan jumlah Liter Pembelian</label>
                <input type="number" name="liter" id="liter" required>
            </div>    
            <div class="form-jenis">
                <label for="jenis">Pilih jenis bahan bakar</label>
                <select name="jenis" required>
                    <option value="SSuper">Shell Super</option>
                    <option value="SVPower">Shell V-Power</option>
                    <option value="SVPowerDiesel">Shell V-Power Diesel</option>
                    <option value="SVPowerNitro">Shell V-Power Nitro</option>
                </select>
            </div>
            <button type="submit" name="beli">Beli</button>
        </form>
    </div>

</body>
</html>