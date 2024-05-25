<?php
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
    echo $output;
}
?>
