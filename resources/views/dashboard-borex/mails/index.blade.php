<!doctype html>
<html lang="en">

<head>

   <meta charset="utf-8" />
   <title>PT. Makerindo Prima Solusi</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
   <meta content="Themesbrand" name="author" />
   <!-- App favicon -->
   <link rel="shortcut icon" href="{{ asset('icon.png') }}">

   <!-- Bootstrap Css -->
   <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
   <!-- Icons Css -->
   <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
   <!-- App Css-->
   <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

</head>


<body data-sidebar="dark">

   <!-- <body data-layout="horizontal"> -->

   <!-- Begin page -->
   <div id="layout-wrapper">

      <!-- ============================================================== -->
      <!-- Start right Content here -->
      <!-- ============================================================== -->
      <div class="main-content">

         <div class="page-content">
            <div class="container-fluid">

               <div class="row">
                  <div class="col-12">
                     <table class="body-wrap"
                        style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: transparent; margin: 0;">
                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                           <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
                           <td class="container" width="600"
                              style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;"
                              valign="top">
                              <div class="content"
                                 style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                                 <table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action" itemscope itemtype="http://schema.org/ConfirmAction"
                                    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; margin: 0; border: none;">
                                    <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                       <td class="content-wrap"
                                          style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; color: #495057; font-size: 14px; vertical-align: top; margin: 0;padding: 30px; box-shadow: 0 0.75rem 1.5rem rgba(18,38,63,.03); ;border-radius: 7px; background-color: #fff;"
                                          valign="top">
                                          <meta itemprop="name" content="Confirm Email"
                                             style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;" />
                                          <table width="100%" cellpadding="0" cellspacing="0"
                                             style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                             <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-block"
                                                   style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                                                   valign="top">
                                                   Yth. PT. Makerindo Prima Solusi,<br>
                                                   di tempat<br>
                                                   Dengan saya: {{ $nama_pengirim . ' sebagai ' . $jabatan_pengirim }}<br>

                                                   Ingin mengajukan proposal terkait magang di perusahaan PT. Makerindo Prima Solusi.
                                                   <br>
                                                   Dengan data : <br>
                                                   <ul>
                                                      <li>Dari Kelas : {{ $sekolah_kelas }}</li>
                                                      <li>Magang : {{ $magang_bidang }}</li>
                                                      <li>Email : {{ $email_pengirim }}</li>
                                                      <li>Telp : {{ $phone_pengirim }}</li>
                                                   </ul>
                                                   <br> Berikut pesan tambahan dari kami : <br
                                                   >
                                                   <br>

                                                   {!! $body !!}
                                                   {{-- {{  $message->pesan_utama  }} --}}
                                                   {{-- {{  $data['body']  }} --}}
                                                   <br>

                                                </td>
                                             </tr>
                                             <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-block" itemprop="handler" itemscope itemtype="http://schema.org/HttpActionHandler"
                                                   style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                                                   valign="top">
                                                   <a href="#" itemprop="url"
                                                      style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #63ad6f; margin: 0; border-color: #63ad6f; border-style: solid; border-width: 8px 16px;">APPROVE</a>
                                                </td>
                                             </tr>
                                             <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-block"
                                                   style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                                                   valign="top">
                                                   <b>PT. Makerindo Prima Solusi</b>
                                                   <p>HR Team</p>
                                                </td>
                                             </tr>

                                             <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-block"
                                                   style="text-align: center;font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0;"
                                                   valign="top">
                                                   © 2023 PT. Makerindo Prima Solusi
                                                </td>
                                             </tr>
                                          </table>
                                       </td>
                                    </tr>
                                 </table>
                              </div>
                           </td>
                        </tr>
                     </table>
                     <!-- end table -->
                  </div>
               </div>
               <!-- end row -->

            </div> <!-- container-fluid -->
         </div>
         <!-- End Page-content -->
         <footer class="footer">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <script>
                        document.write(new Date().getFullYear())
                     </script> &copy; PT. Makerindo Prima Solusi
                  </div>
               </div>
            </div>
         </footer>

      </div>
      <!-- end main content-->

   </div>
   <!-- END layout-wrapper -->

   <!-- JAVASCRIPT -->
   <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('assets/libs/metismenujs/metismenujs.min.js') }}"></script>
   <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
   <script src="{{ asset('assets/libs/eva-icons/eva.min.js') }}"></script>

   <script src="{{ asset('assets/js/app.js') }}"></script>

</body>

</html>
