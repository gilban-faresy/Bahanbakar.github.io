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
    // Include the process PHP file if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['beli'])) {
        include 'process.php';
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
