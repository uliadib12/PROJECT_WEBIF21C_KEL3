var modal = document.getElementById("myModal");
var span = document.getElementsByClassName("close")[0];
var no_urut = "";

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
            modal.style.display = "block";

            var row = this.parentElement.parentElement;
            var cells = row.getElementsByTagName("td");

            for (var i = 1; i < cells.length - 1; i++) {
                formInputs[i - 1].value = cells[i].textContent.trim();
            }
        });
    });
});

$(document).ready(function () {
    $('.Tambah_Data').click(function (event) {
        event.preventDefault();
        var form = $('form.form-input-data');
        var url = form.attr('action') + 'tambahMitra';
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
        var url = form.attr('action') + 'updateMitra';
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

var acuanHapus = '';

function TombolHapus(event) {
    var confirmationPopup = document.getElementById("confirmation-popup");
    confirmationPopup.style.display = "block";
    acuanHapus = $(event.target).closest('tr').find('.No_Urut').text().trim();
};

function HapusData() {
    var data = {
        no: acuanHapus
    };

    $.ajax({
        type: 'POST',
        url: '/Home/hapusMitra',
        data: data,
        dataType: 'json',
        success: function (response) {
            // Handle response dari server setelah berhasil menghapus data
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
