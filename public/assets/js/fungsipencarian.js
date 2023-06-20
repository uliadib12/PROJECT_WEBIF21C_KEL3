var pencarianInput = document.getElementById('pencarian');

// Menambahkan event listener pada perubahan nilai input pencarian
pencarianInput.addEventListener('input', function() {
  // Mengambil nilai keyword pencarian
  
  const keyword = pencarianInput.value;

  // Mengirimkan keyword pencarian ke controller menggunakan AJAX
  $.ajax({
    url: 'Home/search', // Ganti dengan URL controller pencarian Anda
    type: 'POST',
    data: { keyword: keyword },
    dataType: 'json',
    success: function(response) {
      // Mengupdate tampilan tabel dengan hasil pencarian
      $('#tableData').empty();
      var baseUrl = "uploads/";
        // Memasukkan data baru ke dalam <tbody>
        response.forEach(function(jadwal) {
          var row = '<tr class="pilih-data">';
          row += '<td class="No_Urut">' + jadwal.No + '</td>';
          row += '<td style="overflow: visible"><img src="'+ baseUrl + jadwal.gambar + '" alt="Gambar" style="max-width: 50px; height: auto;"></td>';
          row += '<td>' + jadwal.Nama_Event + '</td>';
          row += '<td>' + jadwal.Tanggal + '</td>';
          row += '<td>' + jadwal.Jam + '</td>';
          row += '<td>' + jadwal.Tempat + '</td>';
          row += '<td>';
          row += '<i class="bi bi-trash3" onclick="TombolHapus(event)"></i>';
          row += '<i class="bi bi-pencil-square"></i>';
          row += '</td>';
          row += '</tr>';
          $('#tableData').append(row);
        });
    }
  });
});



///mitrea
