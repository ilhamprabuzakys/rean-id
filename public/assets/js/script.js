(function () {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }
  /**
   * Preloader
   */
  let preloader = select('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove()
    });
  }

  // let preloader = document.querySelector('#preloader');

  // function showPreloader() {
  //   preloader.style.display = 'block';
  // }

  // if (preloader) {
  //   // Tampilkan preloader saat tombol Ctrl+R ditekan
  //   window.addEventListener('keydown', function (event) {
  //     if ((event.ctrlKey || event.metaKey) && event.code === 'KeyR') {
  //       showPreloader();
  //     }
  //   });

  //   // Tampilkan preloader saat tombol refresh ditekan (F5)
  //   window.addEventListener('beforeunload', function () {
  //     showPreloader();
  //   });

  //   // Sembunyikan preloader saat halaman selesai dimuat
  //   window.addEventListener('load', function () {
  //     preloader.style.display = 'none';
  //   });
  // }


})()