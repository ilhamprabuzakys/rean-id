<script>
   // Cara mengatasi bug AOS di livewire itu pake INIT aja dan kaitkan ke render di komponen
   // document.addEventListener('DOMContentLoaded', function() {
   //     AOS.init();
   // });
   Livewire.on('refreshAOS', function() {
      console.log('AOS Refreshed');
      AOS.init();
      // AOS.refresh();
   });

   Livewire.on('swal:modal', data => {
      Swal.fire({
         title: data[0].title,
         text: data[0].text,
         icon: data[0].icon,
         confirmButtonText: 'Ok',
         timer: data[0].duration ?? 2500,
      })
   });

   Livewire.on('swal:confirmation', data => {
      Swal.fire({
         title: 'Apakah kamu yakin?',
         text: "Data " + data[0].title + " yang dihapus akan dipindahkan ke keranjang sampah!",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Ya, saya yakin.',
         cancelButtonText: 'Batalkan.'
      }).then((result) => {
         if (result.isConfirmed) {
            Livewire.dispatch('deleteConfirmed'); // emit event
            Swal.fire(
               'Data Berhasil Dihapus!',
               'Data yang kamu pilih berhasil dihapus.',
               'success'
            )
         }
      });
   });

   Livewire.on('swal:filepond', data => {
      Swal.fire({
         title: 'Apakah kamu yakin?',
         text: "Data " + data[0].title + " yang dihapus akan benar2 dihapus kamu tidak dapat mengembalikan file tersebut!",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Ya, saya yakin.',
         cancelButtonText: 'Batalkan.'
      }).then((result) => {
         if (result.isConfirmed) {
            Livewire.dispatch('filepondDeleteConfirmed'); // emit event
            Swal.fire(
               'File Berhasil Dihapus!',
               'Data yang kamu pilih berhasil dihapus.',
               'success'
            )
         }
      });
   });

   Livewire.on('alert', data => {
      toastr[data[0].type](data[0].message, data[0].title ?? ''), toastr.options = {
         "closeButton": true,
         "progressBar": true,
         "debug": true,
         "newest": true,
         "preventDuplicates": true,
      }
   });
</script>
{{-- <script>
   document.addEventListener('DOMContentLoaded', function() {
         AOS.init();
     });
     // Panggil AOS.init() kembali saat komponen Livewire dirender ulang
     Livewire.on('initAOS', function() {
         AOS.refresh();
         AOS.init();
     });
     Livewire.on('refreshAOS', function() {
         AOS.refresh();
     });
</script> --}}
<script>
   //    function shareToWhatsApp(message) {
//     const whatsappUrl = `https://wa.me/6285280800064?text=${encodeURIComponent(message)}`;

//     // Tentukan ukuran dan posisi window baru
//     const width = 600;
//     const height = 400;
//     const left = (window.screen.width - width) / 2;
//     const top = (window.screen.height - height) / 2;

//     // Buka window baru
//     window.open(whatsappUrl, 'shareToWhatsApp', `width=${width},height=${height},left=${left},top=${top}`);

//     return false;
// }
function shareToWhatsApp(message) {
    const phoneNumber = '6285280800064'; // CNS Radio 
    const encodedMessage = encodeURIComponent(message);
    const whatsappUrl = `https://web.whatsapp.com/send?phone=${phoneNumber}&text=${encodedMessage}`;

    // Tentukan ukuran dan posisi window baru
    const width = 600;
    const height = 400;
   //  const left = (window.innerWidth - width) / 2;
   //  const top = (window.innerHeight - height) / 2;
    // Hitung posisi tengah
    const left = window.screenX + (window.outerWidth - width) / 2;
    const top = window.screenY + (window.outerHeight - height) / 2.5; // Pengurangan dengan 2.5 agar sedikit lebih ke atas dari tengah

    // Buka window baru
    const newWindow = window.open(whatsappUrl, 'shareToWhatsApp', `toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=${width},height=${height},left=${left},top=${top}`);
    
    // Fokus ke window baru
    newWindow.focus();

    return false;
}

</script>