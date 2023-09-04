@extends('dashboard.template.dashboard')
@section('content')
<livewire:dashboard.settings.setting-index />
@include('dashboard.template.partials.modal.reset-password')
@endsection
@push('scripts')
<script>
   document.addEventListener('DOMContentLoaded', function() {
      // Mendengarkan custom event 'close:modal'
      document.addEventListener('close:modal', function() {
         $('#resetPasswordModal').modal('hide'); // Menutup modal menggunakan jQuery dan Bootstrap
      });

      const resetPassword = document.querySelector("#sendResetPasswordLinkBTN");
      const sendEmail = document.querySelector("#sendEmailBTN");
      resetPassword.addEventListener("click", () => {
         Swal.fire({
               title: 'Sedang Diproses',
               html: 'Sedang mengirim link ke email anda...',
               timer: 7000,
               timerProgressBar: true,
               allowOutsideClick: false,
               didOpen: () => {
                  Swal.showLoading();
               }
         }).then((result) => {
               if (result.dismiss === Swal.DismissReason.timer) {
                  //  console.log('Modal ditutup oleh timer');
               }
         });
      });
      sendEmail.addEventListener("click", () => {
         Swal.fire({
               title: 'Sedang Diproses',
               html: 'Sedang mengirim OTP ke email anda...',
               timer: 7000,
               timerProgressBar: true,
               allowOutsideClick: false,
               didOpen: () => {
                  Swal.showLoading();
               }
         }).then((result) => {
               if (result.dismiss === Swal.DismissReason.timer) {
                  //  console.log('Modal ditutup oleh timer');
               }
         });
      });
   });
</script>
@endpush