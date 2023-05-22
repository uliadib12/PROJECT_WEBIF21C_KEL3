var modal = document.getElementById("myModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
function openForm() {
    modal.style.display = "block";
    var formInputs = document.querySelectorAll('.input-data');
    for (var i = 1; i <= formInputs.length - 1; i++) {
        formInputs[i].value = "";
    }
}

// When the user clicks on <span> (x), close the modal

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


var no_urut = "";
document.addEventListener('DOMContentLoaded', function () {
    var editButtons = document.querySelectorAll('.bi-pencil-square');
    var formInputs = document.querySelectorAll('.input-data');

    editButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            no_urut = button.closest('tr').querySelector('.No_Urut').textContent.trim();
            modal.style.display = "block";

            var row = this.parentElement.parentElement;
            var cells = row.getElementsByTagName("td");

            for (var i = 1; i < cells.length - 1; i++) {
                formInputs[i - 1].value = cells[i].textContent.trim();
            }

            // Tambahkan logika lain yang Anda butuhkan di sini
        });
    });
});



$(document).ready(function () {
    $('.Tambah_Data').click(function (event) {
        event.preventDefault();
        var form = $('form.form-input-data');
        var url = form.attr('action') + 'tambahData';
        var formData = new FormData(form[0]);

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                // Handle response dari server setelah berhasil menyimpan data
                // Misalnya, tampilkan pesan sukses, perbarui tampilan, dll.
                location.reload();
            },
            error: function (xhr, status, error) {
                // Handle error jika terjadi kesalahan dalam AJAX request
            }
        });
    });


    $(document).ready(function () {
        $('.Edit_Data').click(function (event) {
            event.preventDefault();
            var form = $('form.form-input-data');
            var url = form.attr('action') + 'updateData';
            var formData = new FormData(form[0]);

            // Ambil nilai No dari variabel no_urut
            // Set nilai No ke input dengan name "no" dalam form
            formData.append('no', no_urut);

            $.ajax({
                type: 'POST',
                url: url,
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json', // Menambahkan dataType 'json'
                success: function (response) {
                    // Handle response dari server setelah berhasil menyimpan data
                    // Misalnya, tampilkan pesan sukses, perbarui tampilan, dll.
                    location.reload();
                },
                error: function (xhr, status, error) {
                    // Handle error jika terjadi kesalahan dalam AJAX request
                    console.log(xhr.responseText); // Menampilkan pesan kesalahan dalam respons server pada konsol
                }
            });
        });
    });

});

var acuanHapus = '';
function TombolHapus(event) {
    var confirmationPopup = document.getElementById("confirmation-popup");
    confirmationPopup.style.display = "block";
    acuanHapus = $(event.target).closest('tr').find('.No_Urut').text().trim();
    
    // Ambil elemen <td> dengan class No_Urut dari elemen terkait

    // Buat objek data yang berisi nilai No
    
};




var input = document.getElementById("pencarian");
function search(inputan) {
    var keyword = inputan;

    // Menggunakan AJAX untuk mengirim data ke controller
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/Home/search", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var data = JSON.parse(xhr.responseText);
            updateTable(data);
        }
    };
    xhr.send("keyword=" + keyword);
}

function updateTable(data) {
    var tableBody = document.getElementById("tableBody");
    tableBody.innerHTML = ""; // Bersihkan isi tabel sebelum memasukkan data baru

    data.forEach(function (row) {
        var newRow = document.createElement("tr");
        newRow.className = "pilih-data";

        var No_Urut = document.createElement("td");
        No_Urut.innerText = row.No;
        newRow.appendChild(No_Urut);

        var gambar = document.createElement("td");
        var img = document.createElement("img");
        img.src = window.location.origin + '/uploads/' + row.gambar;
        img.alt = "Gambar";
        img.style.maxWidth = "50px";
        img.style.height = "auto";
        gambar.appendChild(img);
        newRow.appendChild(gambar);

        var Nama_Event = document.createElement("td");
        Nama_Event.innerText = row.Nama_Event;
        newRow.appendChild(Nama_Event);

        var Tanggal = document.createElement("td");
        Tanggal.innerText = row.Tanggal;
        newRow.appendChild(Tanggal);

        var Jam = document.createElement("td");
        Jam.innerText = row.Jam;
        newRow.appendChild(Jam);

        var Tempat = document.createElement("td");
        Tempat.innerText = row.Tempat;
        newRow.appendChild(Tempat);

        var Opsi = document.createElement("td");
        var deleteIcon = document.createElement("i");
        deleteIcon.className = "bi bi-trash3";
        deleteIcon.addEventListener("click", function (event) {
            HapusData(event);
        });
        Opsi.appendChild(deleteIcon);

        var editIcon = document.createElement("i");
        editIcon.className = "bi bi-pencil-square";
        Opsi.appendChild(editIcon);

        newRow.appendChild(Opsi);

        tableBody.appendChild(newRow);
    });
}

input.addEventListener("input", function (event) {
    var key = this.value;
    // alert(key)
    search(key);
});

function HapusData() {
    
    var data = {
        no: acuanHapus
    };

    $.ajax({
        type: 'POST',
        url: '/Home/hapusData', // Ganti dengan URL controller yang sesuai
        data: data,
        dataType: 'json', // Menambahkan dataType 'json'
        success: function (response) {
            // Handle response dari server setelah berhasil menghapus data
            // Misalnya, tampilkan pesan sukses, perbarui tampilan, dll.

        },
        error: function (xhr, status, error) {
            // Handle error jika terjadi kesalahan dalam AJAX request
            console.log(xhr.responseText); // Menampilkan pesan kesalahan dalam respons server pada konsol
        }
    });
    location.reload();
  }
  
  function CloseConfirmation() {
    var confirmationPopup = document.getElementById("confirmation-popup");
    confirmationPopup.style.display = "none";
  }
  
  function ConfirmDeletion() {
    // Kode untuk menghapus data
    // Panggil fungsi atau lakukan aksi yang diperlukan untuk menghapus data
  
    CloseConfirmation();
  }
  