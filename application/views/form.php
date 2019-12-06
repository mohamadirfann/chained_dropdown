<html>

<head>
    <title>Chained Dropdown</title>
</head>

<body>
    <h1>Chained Dropdown</h1>
    <hr>

    <table cellpadding="8">
        <tr>
            <td><b>Provinsi</b></td>
            <td>
                <select name="provinsi" id="provinsi" style="width: 200px;">
                    <option value="" disabled>Pilih</option>

                    <?php
                    foreach ($provinsi as $data) { // Lakukan looping pada variabel siswa dari controller
                        echo "<option value='" . $data["id"] . "'>" . $data["nama"] . "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>

        <tr>
            <td><b>Kota</b></td>
            <td>
                <select name="kota" id="kota" style="width: 200px;">
                    <option value="" disabled>Pilih</option>
                </select>
                <div id="loading" style="margin-top: 15px;">
                    <img src="assets/images/loading.gif" width="18"> <small>Loading...</small>
                </div>
            </td>
        </tr>

        <tr>
            <td><b>Kecamatan</b></td>
            <td>
                <select name="kecamatan" id="kecamatan" style="width: 200px;">
                    <option value="" disabled>Pilih</option>
                </select>
                <div id="loading1" style="margin-top: 15px;">
                    <img src="assets/images/loading.gif" width="18"> <small>Loading...</small>
                </div>
            </td>
        </tr>

        <tr>
            <td><b>Kelurahan</b></td>
            <td>
                <select name="kelurahan" id="kelurahan" style="width: 200px;">
                    <option value="" disabled>Pilih</option>
                </select>
                <div id="loading2" style="margin-top: 15px;">
                    <img src="assets/images/loading.gif" width="18"> <small>Loading...</small>
                </div>
            </td>
        </tr>
    </table>

    <!-- Load librari/plugin jquery nya -->
    <script src="<?php echo base_url("assets/js/jquery-3.3.1.min.js"); ?>" type="text/javascript"></script>

    <script>
        $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
            // Kita sembunyikan dulu untuk loadingnya
            $("#loading").hide();

            $("#provinsi").change(function() { // Ketika user mengganti atau memilih data provinsi
                $("#kota").hide(); // Sembunyikan dulu combobox kota nya
                $("#loading").show(); // Tampilkan loadingnya

                $.ajax({
                    type: "POST", // Method pengiriman data bisa dengan GET atau POST
                    url: "<?php echo base_url("index.php/form/listKota"); ?>", // Isi dengan url/path file php yang dituju
                    data: {
                        id_provinsi: $("#provinsi").val()
                    }, // data yang akan dikirim ke file yang dituju
                    // dataType: "json",
                    beforeSend: function(e) {
                        console.log(e)
                    },
                    success: function(response) { // Ketika proses pengiriman berhasil
                        $("#loading").hide(); // Sembunyikan loadingnya
                        // // set isi dari combobox kota
                        // // lalu munculkan kembali combobox kotanya
                        $("#kota").html(JSON.parse(response).list_kota).show();
                    },
                    error: function(err) { // Ketika ada error
                        console.log(err)
                    }
                });
            });


            $("#loading1").hide();

            $("#kota").change(function() { // Ketika user mengganti atau memilih data kota
                $("#kecamatan").hide(); // Sembunyikan dulu combobox kecamatan nya
                $("#loading1").show(); // Tampilkan loadingnya

                $.ajax({
                    type: "POST", // Method pengiriman data bisa dengan GET atau POST
                    url: "<?php echo base_url("index.php/form/listKecamatan"); ?>", // Isi dengan url/path file php yang dituju
                    data: {
                        id_kota: $("#kota").val()
                    }, // data yang akan dikirim ke file yang dituju
                    // dataType: "json",
                    beforeSend: function(e) {
                        console.log(e)
                    },
                    success: function(response) { // Ketika proses pengiriman berhasil
                        $("#loading1").hide(); // Sembunyikan loadingnya
                        // // set isi dari combobox kecamatan
                        // // lalu munculkan kembali combobox kecamatannya
                        $("#kecamatan").html(JSON.parse(response).list_kecamatan).show();
                    },
                    error: function(err) { // Ketika ada error
                        console.log(err)
                    }
                });
            });

            $("#loading2").hide();

            $("#kecamatan").change(function() { // Ketika user mengganti atau memilih data kecamatan
                $("#kelurahan").hide(); // Sembunyikan dulu combobox kelurahan nya
                $("#loading2").show(); // Tampilkan loadingnya

                $.ajax({
                    type: "POST", // Method pengiriman data bisa dengan GET atau POST
                    url: "<?php echo base_url("index.php/form/listKelurahan"); ?>", // Isi dengan url/path file php yang dituju
                    data: {
                        id_kecamatan: $("#kecamatan").val()
                    }, // data yang akan dikirim ke file yang dituju
                    // dataType: "json",
                    beforeSend: function(e) {
                        console.log(e)
                    },
                    success: function(response) { // Ketika proses pengiriman berhasil
                        $("#loading2").hide(); // Sembunyikan loadingnya
                        // // set isi dari combobox kelurahan
                        // // lalu munculkan kembali combobox kecamatannya
                        $("#kelurahan").html(JSON.parse(response).list_kelurahan).show();
                    },
                    error: function(err) { // Ketika ada error
                        console.log(err)
                    }
                });
            });

        });
    </script>
</body>

</html>