var pencarianSertifikat = document.getElementById('pencarian-sertifikat');

// Menambahkan event listener pada perubahan nilai input pencarian
pencarianSertifikat.addEventListener('input', function () {
    // Mengambil nilai keyword pencarian
    const keywordSertifikat = pencarianSertifikat.value;

    // Mengirimkan keyword pencarian ke controller menggunakan AJAX
    $.ajax({
        url: 'Home/searchsertifikat', // Ganti dengan URL controller pencarian Anda
        type: 'POST',
        data: { keyword: keywordSertifikat },
        dataType: 'json',
        success: function (response) {
            console.log(response); // Menampilkan response di console

            $('#tableBody').empty();
            response.forEach(function (sertifikat) {
                var row = '<tr class="pilih-data">';
                row += '<td class="No_Urut">' + sertifikat.No + '</td>';
                row += '<td>' + sertifikat.Id_Sertifikat + '</td>';
                row += '<td>' + sertifikat.Nama_Pemilik + '</td>';
                row += '<td>' + sertifikat.Nomor_Sertifikat + '</td>';
                row += '<td>' + sertifikat.Tanggal_Terbit + '</td>';
                row += '<td>' + sertifikat.Deskripsi + '</td>';
                row += '<td>' + sertifikat.Institusi_Penerbit + '</td>';
                row += '<td>';
                row += '<i class="bi bi-trash3" onclick="TombolHapus(event)"></i>';
                row += '<i class="bi bi-pencil-square"></i>';
                row += '</td>';
                row += '</tr>';

                $('#tableBody').append(row);
            });
        }
    });

});
