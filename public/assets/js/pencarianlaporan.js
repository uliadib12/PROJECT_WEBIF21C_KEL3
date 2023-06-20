var pencarianLaporan = document.getElementById('pencarian-laporan');

// Menambahkan event listener pada perubahan nilai input pencarian
pencarianLaporan.addEventListener('input', function() {
  // Mengambil nilai keyword pencarian
  const keywordLaporan = pencarianLaporan.value;

  // Mengirimkan keyword pencarian ke controller menggunakan AJAX
  $.ajax({
    url: 'Home/searchlaporan',
    type: 'POST',
    data: { keywordLaporan: keywordLaporan },
    dataType: 'json',
    success: function(response) {
      console.log(response); // Menampilkan response di console

      $('#tableBody').empty();
      var baseUrl = "uploads/";
      response.forEach(function (laporan) {
        var row = '<tr class="pilih-data">';
        row += '<td class="No_Urut">' + laporan.No + '</td>';
        row += '<td style="overflow: visible"><img src="'+ baseUrl + laporan.gambar + '" alt="Gambar" style="max-width: 50px; height: auto;"></td>';

        row += '<td>' + laporan.Judul + '</td>';
        row += '<td>' + laporan.Keterangan + '</td>';
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
