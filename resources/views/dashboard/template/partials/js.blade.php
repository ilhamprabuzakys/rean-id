<script>
   Livewire.on('swal:modal', data => {
      Swal.fire({
         title: data[0].title,
         html: data[0].text,
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
   
   Livewire.on('swal:postmedia', data => {
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
            Livewire.dispatch('mediaDeleteConfirmed'); // emit event
            Swal.fire(
               data[0].title + ' Berhasil Dihapus!',
               'Data yang kamu pilih berhasil dihapus.',
               'success'
            )
         }
      });
   });
   
   Livewire.on('swal:ebookpdf', data => {
      Swal.fire({
         title: 'Apakah kamu yakin?',
         text: "Data " + data[0].title + " yang dihapus akan benar2 dihapus kamu tidak dapat mengembalikan pdf tersebut!",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Ya, saya yakin.',
         cancelButtonText: 'Batalkan.'
      }).then((result) => {
         if (result.isConfirmed) {
            Livewire.dispatch('pdfDeleteConfirmed'); // emit event
            Swal.fire(
               data[0].title + ' Berhasil Dihapus!',
               'Data yang kamu pilih berhasil dihapus.',
               'success'
            )
         }
      });
   });

   Livewire.on('alert', data => {
      toastr.options = {
         "closeButton": false,
         "progressBar": false,
         "debug": false,
         "newest": true,
         "preventDuplicates": true,
         "positionClass": "toast-top-center",
         "timeOut": 2000,
      };

      // "showMethod": 'bounceIn',
      // "hideMethod": 'bounceOut',
      // "closeMethod": 'bounceOut',
      // "showEasing": 'swing',
      // "hideEasing": 'linear',
      // "closeEasing": 'linear',
      
      var message = data[0].message ?? data[0].text;
      var type = data[0].icon ?? data[0].type;
      var title = data[0].title;

      toastr[type](message, title);
   });
</script>