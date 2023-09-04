<style>
   @import url("https://font..googleapis.com/css?family=Rubik&display=swap");
   @import url("https://cegahnarkoba.bnn.go.id/wp-content/uploads/assets/css/font-awesome/all.min.css");
   
   .sidebar {
       position: fixed;
       width: 250px;
       top: 0;
       left: 0;
       bottom: 0;
       background: #fff;
       padding-top: 50px;
       z-index: 301;
       transition: 0.4s;
       border-right: 2px solid #949494;
       box-shadow: 6px 0 6px rgba(0, 0, 0, 0.2);
    }
   
    .sidebar h1 {
       display: block;
       padding: 5px 5px;
       color: #fff;
       text-decoration: none;
       font-family: "Rubik";
       letter-spacing: 2px;
       font-weight: 400;
       margin: 0 0 20px 0;
       font-size: 25px;
       text-transform: uppercase;
    }
   
    .sidebar a {
       display: block;
       padding: 10px 20px;
       color: #000;
       text-decoration: none;
       letter-spacing: 2px;
    }
   
    .sidebar a:hover {
       margin-left: 5px;
       transition: 0.2s;
    }
   
    .sidebar .toggle-button {
       font-size: 26px;
    }
   
    .sidebar.minimized {
       width: 55px;
       height: 20px;
       top: 50%;
       left: 0px;
       transition: 0.4s;
       border-top: 2px solid #949494;
       border-right: 2px solid #949494;
       border-bottom: 2px solid #949494;
       border-radius: 0 10px 10px 0;
       box-shadow: 4px 4px 6px rgba(0, 0, 0, 0.2);
    }
   
    .sidebar.minimized .toggle-button {
       position: fixed;
       top: 50.5%;
       left: -18px;
       color: black;
       font-size: 26px;
       border: 0;
       outline: none;
       transition: 0.4s;
    }
   
    .sidebar.minimized h1,
    .sidebar.minimized a,
    .sidebar.minimized iframe,
    .sidebar.minimized audio,
    .sidebar.minimized img {
       display: none;
    }
   
    .toggle-button {
       background-color: transparent;
       color: black;
       border: 0;
       margin: 5px 0px 0px 15px;
       cursor: pointer;
       outline: none;
       transition: 0.2s;
    }
   
    .toggle-button:active,
    .toggle-button:after,
    .toggle-button:hover,
    .toggle-button:focus {
       outline: none;
    }
   
    .sidebar .container {
       display: flex;
       align-items: center;
       margin-bottom: 20px;
    }
   
    .sidebar .container h1 {
       margin-right: 10px;
    }
   
    .sidebar .container img {
       margin-right: 90px;
    }
   
    .sidebar .container button.toggle-button {
       margin-bottom: 5px;
       transition: 0.2s;
    }
   
    .sidebar .container button.toggle-button:hover {
       margin-bottom: 8px;
       transition: 0.4s;
    }
   
    #sidebar-toggle::before {
       content: "🡸";
    }
   
    @keyframes delayedAppear {
       0% {
         opacity: 0;
       }
       100% {
         opacity: 1; 
       }
     }
   
     
    .sidebar.minimized #sidebar-toggle::before {
       content: url('https://cegahnarkoba.bnn.go.id/wp-content/uploads/assets/img/logo_cns.png');
       animation: delayedAppear 1.3s ease-in-out forwards;
    }
   
    @media only screen and (max-width: 768px) {
       #sidebar-toggle::before {
          content: "<";
       }
   
       .sidebar.minimized #sidebar-toggle::before {
          content: ">";
          transition: 0.3s;
       }
    }
   
    .sidebar-audio {
       background: #580931;
       border: 1px solid #fa5aaa;
       border-radius: 25px;
       width: 220px;
       padding: 5px;
       margin-top: 10px;
       margin-left: 10px;
       /* z-index: 3; */
       display: block;
    }
   
    .sidebar iframe.player {
       padding: 10px;
    }
   
    .sidebar iframe.playlist {
       padding: 15px;
       border: 0;
    }
   
    .sidebar iframe.playlist,
    .sidebar iframe.player {
       margin-top: 0px;
    }
   
   
   </style>
   <script>
       function toggleSidebar() {
           var sidebar = document.querySelector(".sidebar");
           var mainLayout = document.querySelector(".main-layout");
           var sidebarBTN = document.querySelector("button#sidebar-toggle");
   
           if (sidebar.classList.contains("minimized")) {
               sidebar.classList.remove("minimized");
               mainLayout.style.marginLeft = "250px";
               sidebarBTN.innerHTML = '<';
           } else {
               sidebar.classList.add("minimized");
               mainLayout.style.marginLeft = "100px";
               sidebarBTN.classList.add('arrow-left');
           }
       }
       
   </script>
   <div class="sidebar">
               <div class="container">
                   
                   <img src="https://cegahnarkoba.bnn.go.id/wp-content/uploads/assets/img/logo_cns_medium_for_sidebar.png" alt="" id="brand-name" class="img-sidebar">
                   <button class="toggle-button" id="sidebar-toggle">
                   </button>
                   
                   
               </div>
   
               <a href="#">Playing..</a>
   
               <audio controls="" autoplay="" loop="" class="sidebar-audio">
                   <source src="https://c3.siar.us/proxy/cnsradio/stream"/>
               </audio>
               
               <iframe
                 src="https://a5.siar.us/public/cnsradio/history?theme=light"
                 frameborder="0"
                allowtransparency="true"
                 style="width: 100%; min-height: 150px; border: 0;"
                 class="player"
               ></iframe>
   
   
   
               <a href="#">Playlist : </a>
   
               <iframe
                   src="https://a5.siar.us/public/cnsradio/history"
                   width="100%"
                   height="150"
                   allowfullscreen=""
                   loading="lazy"
                   class="playlist"
                   referrerpolicy="no-referrer-when-downgrade"
               ></iframe>
           </div>
   
   <script>
       document.getElementById("sidebar-toggle").addEventListener("click", function() {
      toggleSidebar();
    });
    
        document.addEventListener("DOMContentLoaded", function () {
           toggleSidebar();
       });
   </script>