<footer id="footer" class="bg-body footer" style="font-family: Poppins; font-weight: 600">
    <div class="container pt-9 pt-lg-11 pb-5">
        <div class="row">
            <div class="col-lg-5 col-sm-7 mb-4 mb-sm-0">
                <h5 class="mb-0 text-body-secondary">JL.M.T. Haryono No. 11, Cawang, <br>
                    Kramat Jati, Jakarta Timur 13630,<br>
                    Indonesia</h5>
                <!--:Dark Mode:-->
                <div class="d-inline-flex width-13x align-items-center dropup mt-6">
                    <button class="btn border text-body py-2 px-2 d-flex align-items-center" id="assan-theme"
                        type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-display="static">
                        <span class="theme-icon-active d-flex align-items-center">
                            <i class="bx align-middle"></i>
                        </span>
                    </button>
                    <!--:Dark Mode Options:-->
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="assan-theme"
                        style="--bs-dropdown-min-width: 9rem;">
                        <li class="mb-1">
                            <button type="button" class="dropdown-item d-flex align-items-center active"
                                data-bs-theme-value="light">
                                <span class="theme-icon d-flex align-items-center">
                                    <i class="bx bx-sun align-middle me-2"> </i>
                                </span>
                                Light
                            </button>
                        </li>
                        <li class="mb-1">
                            <button type="button" class="dropdown-item d-flex align-items-center"
                                data-bs-theme-value="dark">
                                <span class="theme-icon d-flex align-items-center">
                                    <i class="bx bx-moon align-middle me-2"></i>
                                </span>
                                Dark
                            </button>
                        </li>
                        <li>
                            <button type="button" class="dropdown-item d-flex align-items-center"
                                data-bs-theme-value="auto">
                                <span class="theme-icon d-flex align-items-center">
                                    <i class="bx bx-color-fill align-middle me-2"></i>
                                </span>
                                Auto
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-sm-5">
                <img src="{{ asset('assets/img/rean-logo-brand.png')}}" alt="" style="width: -webkit-fill-available; height: -webkit-fill-available;">
            </div>
            <div class="col-lg-5 col-sm-7 text-sm-center text-lg-end">
                <a href="javascript:void()" class="fs-6 link-hover-underline">Hubungi Kami: 184</a><br><br>
                <a class="fs-6 link-hover-underline"><span class="__cf_email__"
                        data-cfemail="caa7aba3a68aaea5a7aba3a4e4abadafa4a9b3">callcenter@bnn.go.id</span></a>
            </div>
        </div>
        <hr class="my-4">
        <div class="row justify-content-between">
            <div class="col-sm-5 mb-3 mb-sm-0">
                <div class="d-flex align-items-center">
                    <a href="https://cegahnarkoba.bnn.go.id" target="_blank">
                        <h6 class="mb-2 text-body-secondary">Website Cegah Narkoba</h6>
                    </a>
                </div>
                <div class="d-flex align-items-center">
                    <!-- Social button -->
                    <a href="#" class="d-inline-block mb-1 me-2 si rounded-pill si-hover-facebook">
                        <i class="bx bxl-facebook fs-5"></i>
                        <i class="bx bxl-facebook fs-5"></i>
                    </a>
                    <!-- Social button -->
                    <a href="#" class="d-inline-block mb-1 me-2 si rounded-pill si-hover-twitter">
                        <i class="bx bxl-twitter fs-5"></i>
                        <i class="bx bxl-twitter fs-5"></i>
                    </a>
                    <!-- Social button -->
                    <a href="#" class="d-inline-block mb-1 me-2 si rounded-pill si-hover-linkedin">
                        <i class="bx bxl-linkedin fs-5"></i>
                        <i class="bx bxl-linkedin fs-5"></i>
                    </a>
                    <!-- Social button -->
                    <a href="#" class="d-inline-block mb-1 si rounded-pill si-hover-instagram">
                        <i class="bx bxl-instagram fs-5"></i>
                        <i class="bx bxl-instagram fs-5"></i>
                    </a>
                </div>
            </div>
            {{-- <div class="col-sm-2 d-flex justify-content-end align-items-center">
                <img src="{{ asset('assets/img/rean-text-logo-dark.png')}}" alt="" style="width: -webkit-fill-available; height: auto;">
            </div> --}}
            <div class="col-sm-5 small text-sm-end d-flex justify-content-end align-items-center">
                <span class="d-block lh-sm text-body-secondary">© Copyright
                    <script>
                        document.write(new Date().getFullYear())

                    </script>2023. REAN.ID
                </span>
            </div>
        </div>
    </div>
</footer>