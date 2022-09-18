$('#data-table').DataTable();
$('.select2').select2();
$('.datepicker-input').datepicker();
new Quill('#editor', {
    theme: 'snow'
});

$(document).ready(function () {
    setTimeout(function () {
        $("#infaq-santri").modal('show');
    }, 0);
})

var i = 100;

setTimeout(function () {
    $("#infaq-santri").modal('hide');
}, 5000);

var counterBack = setInterval(function () {
  i--;
  if (i > 0) {
    $('.progress-bar').css('width', i + '%');
  } else {
    clearInterval(counterBack);
  }

}, 45);

const activePage = window.location.pathname;
const navLink = document.querySelectorAll('.side-nav-inner a');

navLink.forEach(link => {
    if (link.href.includes(`${activePage}`)) {
        link.classList.add('active');
    }
});

function previewImg() {
    const sampul = document.querySelector('#gambar');
    const sampulLabel = document.querySelector('.custom-file-label');
    const imgPreview = document.querySelector('.img-preview');

    sampulLabel.textContent = sampul.files[0].name;

    const fileSampul = new FileReader();
    fileSampul.readAsDataURL(sampul.files[0]);

    fileSampul.onload = function(e) {
        imgPreview.src = e.target.result;
    }
}

const nisSantriDoc = () => {
	var nama =  $("#nama_santri").val()
	$.ajax({
        url: 'data-santri/json-data-auto-fill',
        data:"nama="+nama,
        success: function(data) {
            var json = data,
            obj = JSON.parse(json)
            
            if (obj.nis == 'null') {
                $('#nis').val('')
            } else {
                $('#nis').val(obj.nis)
            }
        },
    })
}

const mySubmit = () => {
    var html = document.getElementById('editor').innerHTML;
    document.getElementById('articelcontent').value = html;
}

const tampil = () => {
    const data = document.getElementById('data').value.replace(/\s/g, "").toLowerCase();
    const hasil = document.getElementById('hasil').value = data;

    return hasil;
};

var rupiah = document.getElementById('rupiah');
rupiah.addEventListener('keyup', function(e){
	rupiah.value = formatRupiah(this.value);
});

function formatRupiah(angka){
	var number_string = angka.replace(/[^,\d]/g, '').toString(),
	split   		= number_string.split(','),
	sisa     		= split[0].length % 3,
	rupiah     		= split[0].substr(0, sisa),
	ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
	if(ribuan){
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}
 
	return rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
}

const nisSantri = () => {
	var nama =  $("#nama_santri").val()
	$.ajax({
        url: 'data-santri/json-data-auto-fill',
        data:"nama="+nama,
        success: function(data) {
            var json = data,
            obj = JSON.parse(json)
            
            if (obj.nis == 'null') {
                $('#nis').val('')
            } else {
                $('#nis').val(obj.nis)
            }
        },
    })
}

