<script>
   $(document).ready(function() {
      $('#categories-table').DataTable({
         processing: true,
         serverside: true,
         ajax: "{{ route('api.categories.index') }}",
         columns: [{
               data: 'DT_RowIndex',
               name: 'DT_RowIndex',
               orderable: false,
            },
            {
               data: 'name',
               name: 'Nama',
               orderable: false,
            },
            {
               data: 'slug',
               name: 'Slug',
               orderable: false,
            },
            {
               data: 'created_at',
               name: 'Dibuat',
            },
            {
               data: 'action',
               name: '#',
            }
         ]
      });
   });

   $.ajaxSetup({
      headers: {
         // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         'X-CSRF-TOKEN': '{{ csrf_token() }}'
      }
   });

   // Multifungsi
   function simpanData(id = '') {
      // var url = '';
      // var type = '';
      if (id == '') {
         var var_url = 'categories';
         var var_type = 'POST';
      } else {
         var var_url = 'categories/' + id;
         // url = url.replace(':id', id);
         var var_type = 'PUT';
      }
      console.log(`URL : ${var_url} | TYPE : ${var_type}`);
      $.ajax({
         url: var_url,
         type: var_type,
         data: {
            name: $('#name').val()
         },
         success: function(response) {
            // console.log(response['errors']);
            if (response.errors) {
               console.log(response.errors);
               $('#name').addClass('is-invalid');
               $('.invalid-feedback').removeClass('d-none');
               // $('.invalid-feedback').append('')
               $.each(response.errors, function(key, value) {
                  $('.invalid-feedback').html(value);
               })
            } else {
               $('#name').removeClass('is-invalid');
               $('.invalid-feedback').addClass('d-none');
               $('#create-modal-alert-success').removeClass('d-none');
               $('#create-modal-alert-success').html(response.success);
               $('#categories-table').DataTable().ajax.reload();
               // setTimeout(function() {
               //    $('#tambahKategori').modal('hide');
               // }, 1000);
            }

         }
      });
   }

   $('body').on('click', '#btnTambahKategori', function(e) {
      e.preventDefault();
      //       $('#save-button').prop('disabled', true).addClass('not-allowed');
      $('#tambahKategori').modal('show');
      $('h3.modal-title').html('Tambah Kategori');
      // $('#name').on('input', function() {
      //    var nameValue = $(this).val().trim();
      //    if (nameValue !== '') {
      //       $('#save-button').prop('disabled', false).removeClass('not-allowed');
      //    } else {
      //       $('#save-button').prop('disabled', true).addClass('not-allowed');
      //    }
      // });
      $('#save-button').click(function() {
         simpanData();
      })
   });

   //  02_EDIT
   $('body').on('click', '#tombol-edit-kategori', function(e) {
      let id = $(this).data('id');
      console.log(`id : ${id}`);
      let url = '{{ route('categories.edit', ':id') }}';
      url = url.replace(':id', id);
      console.log(`url : ${url}`);
      $.ajax({
         // url: 'categories/' + id + '/edit',
         url: url,
         type: 'GET',
         // data: {
         //    name: $('#name').val()
         // },
         success: function(response) {
            console.log(response.result);
            $('#tambahKategori').modal('show');
            $('h3.modal-title').html('Edit Kategori');
            $('#name').val(response.result.name);
            $('#save-button').click(function() {
               simpanData(id);
            });
         }
      });
   })


   $('#tambahKategori').on('hidden.bs.modal', function() {
      $('#name').val('');
      $('#create-modal-alert-success').html('');
      $('#create-modal-alert-success').addClass('d-none');
      $('#name').removeClass('is-invalid');
      $('.invalid-feedback').addClass('d-none');
   })
</script>
