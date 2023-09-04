 <button class="btn btn-primary d-flex align-items-center" type="button" wire:click.prevent="sendResetPasswordLink" id="sendResetPasswordLinkBTN">
   <div wire:loading wire:target='sendResetPasswordLink'>
      <span class="spinner-border" role="status" aria-hidden="true"></span>
      <span class="visually-hidden">Loading...</span>
   </div>
   <span class="ms-2">Kirim Link</span>
</button>
 