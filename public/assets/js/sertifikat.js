var modal = document.getElementById("myModal");
var span = document.getElementsByClassName("close")[0];
var no_urut = "";
var Key = "";

function openForm() {
    modal.style.display = "block";
    var formInputs = document.querySelectorAll('.input-data');
    for (var i = 1; i < formInputs.length; i++) {
        formInputs[i].value = "";
    }
}

window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

document.addEventListener('DOMContentLoaded', function () {
    var editButtons = document.querySelectorAll('.bi-pencil-square');
    var formInputs = document.querySelectorAll('.input-data');

    editButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            no_urut = button.closest('tr').querySelector('.No_Urut').textContent.trim();
            Key = button.closest('tr').querySelector('.Id_Sertif').textContent.trim();

            modal.style.display = "block";

            var row = this.parentElement.parentElement;
            var cells = row.getElementsByTagName("td");

            for (var i = 1; i < cells.length - 1; i++) {
                formInputs[i - 1].value = cells[i].textContent.trim();
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {

    var PrintData = [];
var editButtons = document.querySelectorAll('.bi-printer');
editButtons.forEach(function (button) {
  button.addEventListener('click', function () {
    var no_urut = button.closest('tr').querySelector('.No_Urut').textContent.trim();
    var Key = button.closest('tr').querySelector('.Id_Sertif').textContent.trim();
    var row = this.parentElement.parentElement;
    var cells = row.getElementsByTagName("td");

    for (var i = 1; i < cells.length - 1; i++) {
      PrintData[i - 1] = cells[i].textContent.trim();
    }

    sessionStorage.setItem('DataPrint', PrintData);
    window.location.href = "../PrintSertifikat/index";
  });
});

});




$(document).ready(function () {
    $('.Tambah_Data').click(function (event) {
        event.preventDefault();
        var form = $('form.form-input-data');
        var url = form.attr('action') + 'tambahSertifikat';
        var formData = new FormData(form[0]);

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                location.reload();
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });

    $('.Edit_Data').click(function (event) {
        event.preventDefault();
        var form = $('form.form-input-data');
        var url = form.attr('action') + 'updateSertifikat';
        var formData = new FormData(form[0]);

        formData.append('no', no_urut);

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (response) {
                location.reload();
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });
});


function TombolHapus(event) {
    var confirmationPopup = document.getElementById("confirmation-popup");
    confirmationPopup.style.display = "block";
    Key = $(event.target).closest('tr').find('.Id_Sertif').text().trim();
};

function HapusData() {
    var data = {
        Keys: Key
    };

    $.ajax({
        type: 'POST',
        url: '/Home/hapusSertifikat',
        data: data,
        dataType: 'json',
        success: function (response) {
            console.log(response)// Handle response dari server setelah berhasil menghapus data
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
    location.reload();
}

function CloseConfirmation() {
    var confirmationPopup = document.getElementById("confirmation-popup");
    confirmationPopup.style.display = "none";
}

function ConfirmDeletion() {
    CloseConfirmation();
    // Panggil fungsi atau lakukan aksi yang diperlukan untuk menghapus data
}
