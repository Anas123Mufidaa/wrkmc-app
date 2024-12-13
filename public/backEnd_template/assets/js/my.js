//image preview
function displaySelectedImage(event, elementId) {
    const selectedImage = document.getElementById(elementId);
    const fileInput = event.target;

    if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            selectedImage.src = e.target.result;
        };

        reader.readAsDataURL(fileInput.files[0]);
    }
}
 /* Tanpa Rupiah */
 var rupiah1 = document.getElementById('rupiah1');
 rupiah1.addEventListener('keyup', function(e)
 {
     rupiah1.value = formatRupiah(this.value);
 });
 var rupiah2 = document.getElementById('rupiah2');
 rupiah2.addEventListener('keyup', function(e)
 {
    rupiah2.value = formatRupiah(this.value);
 });
 function formatRupiah(angka, prefix)
 {
     var number_string = angka.replace(/[^,\d]/g, '').toString(),
         split    = number_string.split(','),
         sisa     = split[0].length % 3,
         rupiah     = split[0].substr(0, sisa),
         ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
         
     if (ribuan) {
         separator = sisa ? '.' : '';
         rupiah += separator + ribuan.join('.');
     }
     
     rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
     return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
 }
//autonumeric
new AutoNumeric('#harga-beli', { 
    // currencySymbol : 'Rp.', 
    decimalPlaces : 0,
});
new AutoNumeric('#harga-jual', { 
    // currencySymbol : 'Rp.', 
    decimalPlaces : 0,
});
new AutoNumeric('#edit-harga-beli', {
    // currencySymbol : 'Rp.', 
    decimalPlaces : 0,
});
new AutoNumeric('#edit-harga-jual', {
    // currencySymbol : 'Rp.', 
    decimalPlaces : 0,
});