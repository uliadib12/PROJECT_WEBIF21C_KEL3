
var pencarianMitra = document.getElementById('pencarian-mitra');

// Menambahkan event listener pada perubahan nilai input pencarian
pencarianMitra.addEventListener('input', function() {
  // Mengambil nilai keyword pencarian
  console.log(pencarianMitra.value);
  const keywordMitra = pencarianMitra.value;

  // Mengirimkan keyword pencarian ke controller menggunakan AJAX
  $.ajax({
    url: 'Home/searchMitra', // Ganti dengan URL controller pencarian Anda
    type: 'POST',
    data: { keywordMitra: keywordMitra },
    dataType: 'json',
    success: function (response) {
       // Menampilkan response di console

      $('#tableBody').empty();
      var baseUrl = "uploads/";
      response.datamitra.forEach(function (mitra) {
        var row = '<tr class="pilih-data">';
        row += '<td class="No_Urut">' + mitra.No + '</td>';
        row += '<td>' + mitra.Nama_Mitra + '</td>';
        row += '<td>' + mitra.Kontak + '</td>';
        row += '<td>' + mitra.Kategori_Mitra + '</td>';
        row += '<td>' + mitra.Deskripsi + '</td>';
        row += '<td style="overflow: visible"><img src="' + baseUrl + mitra.Dokumen_Terkait + '" alt="Gambar" style="max-width: 50px; height: auto;"></td>';
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