<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>

<style>
    .container {
        width: 100%;
        height: 100%;
        background-image: url(" ../../assets/images/sertifikat.jpg");
        background-size: cover;
    }

    .container img {
        position: absolute;
        top: 65;
        left: 123;
    }

    .data {
        padding-top: 220px;
        text-align: center;
    }

    .data span:nth-child(6) {
        font-size: 50px;
        font-family: algerian;
    }

    span:nth-child(14) {
        font-weight: bold;
    }

    span:nth-last-child(3) {
        font-weight: bold;
        text-decoration: underline;
    }
</style>
<div class="container">
    <img src="../../assets/images/logo.png" alt="" width="120">
    <div class="data">
    <span id="nomor"></span><br>
    <span>Diberikan Kepada : </span><br><br>
    <span id="nama"></span><br>
    <span>_________________________________________________________________________________</span><br><br>
    <span>Sebagai Peserta</span><br><br>
    <span id="deskripsi"></span><br><br>
    <span id="tanggal"></span><br><br>
    <span id="institusi"></span><br>
    <span>Rektor Universitas Teknokrat Indonesia</span><br><br><br><br><br>
    <span>Dr. HM Nasrullah Yusuf, MBA.</span><br>
    <span><sub>Rektor</sub></span>
</div>


</div>
<script>
    var DataSert = "";
    DataSert = sessionStorage.getItem('DataPrint');

    var dataArray = DataSert.split(',');
    document.getElementById("nomor").innerHTML = "Nomor : "+ dataArray[0] +"/"+ dataArray[2];
    document.getElementById("nama").innerHTML = dataArray[1];
    document.getElementById("tanggal").innerHTML ="yang di selenggarakan oleh universitas teknokrat indoneisa pada tanggal "+ dataArray[3];
    document.getElementById("deskripsi").innerHTML = dataArray[4];
    document.getElementById("institusi").innerHTML ="Institusi Penerbit : "+ dataArray[5];

    var container = document.querySelector(".container");
    var formData = new FormData();

    html2canvas(container).then(function (canvas) {
        // Mengambil data gambar dari elemen canvas sebagai base64 string
        var imageData = canvas.toDataURL("image/png");

        // Menambahkan data gambar ke FormData
        formData.append("screenshotData", imageData);

        // Mengirimkan FormData ke URL endpoint di server
        fetch("../../PrintSertifikat/convertToPdf", {
            method: "POST",
            body: formData,
        })
            .then(function (response) {
                // Memeriksa status respons
                if (response.ok) {
                    // Mengarahkan pengguna ke URL unduhan PDF
                    response.blob().then(function (blob) {
                        var url = window.URL.createObjectURL(blob);
                        var a = document.createElement("a");
                        a.href = url;
                        a.download = "screenshot.pdf";
                        a.click();
                        window.history.back();
                    });
                } else {
                    console.error("Gagal mengonversi ke PDF.");
                }
            })
            .catch(function (error) {
                console.error("Terjadi kesalahan:", error);
            });
    });

</script>