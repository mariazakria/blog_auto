<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
   <head>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.4.1/jquery-migrate.min.js" integrity="sha512-KgffulL3mxrOsDicgQWA11O6q6oKeWcV00VxgfJw4TcM8XRQT8Df9EsrYxDf7tpVpfl3qcYD96BpyPvA4d1FDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

      <script src="https://www.salvagereseller.com/blog/wp-includes/js/wp-emoji-release.min.js?ver=6.5.4" defer=""></script>

      <title>How to Find the Best Deals on Bank Auction Cars</title>
      
      <!-- Stylesheets -->
      <link rel="stylesheet" type="text/css" href="{{ asset('css/line-awesome.min.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('css/blog_index.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('css/bundle.min.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('css/end.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('css/blogs.css') }}">

      
      <!-- External stylesheets -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css" integrity="sha512-vebUliqxrVkBy3gucMhClmyQP9On/HAWQdKDXRaAlb/FKuTbxkjPKUyqVOxAcGwFDka79eTF+YXwfke1h3/wfg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/font-awesome-line-awesome/css/all.min.css" integrity="sha512-dC0G5HMA6hLr/E1TM623RN6qK+sL8sz5vB+Uc68J7cBon68bMfKcvbkg6OqlfGHo1nMmcCxO5AinnRTDhWbWsA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      
      <!-- Elementor plugin styles -->
      <link rel="stylesheet" id="exad-main-style-css" href="https://www.salvagereseller.com/blog/wp-content/plugins/exclusive-addons-for-elementor/assets/css/exad-styles.min.css?ver=6.5.4" type="text/css" media="all">
      
      <!-- jQuery script -->
      <script type="text/javascript" src="https://www.salvagereseller.com/blog/wp-includes/js/jquery/jquery.min.js?ver=3.7.1" id="jquery-core-js"></script>
      
      <!-- Bundle script -->
      <script type="text/javascript" src="{{ asset('js/bundle.min.js') }}"></script>
   </head>

<body aria-live="polite" aria-atomic="true" class="d-flex flex-column align-items-end h-100 e--ua-blink e--ua-chrome e--ua-webkit anwp-pg-ready" data-elementor-device-mode="desktop">
   

      @include('layouts.guest.nav')


      @yield('content')
      @yield('css')

      @include('layouts.guest.footer')

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="./js/bundle.min.js"></script>
   <script type="text/javascript">
      $(document).ready(function() {
          // Variable to hold the timeout ID
          var hoverTimer;
      
          // Flag to track whether the mouse is over any relevant element
          var isHovering = false;
      
          // Function to show the menu
          function showMenu(element, element2) {
              clearTimeout(hoverTimer); // Clear any existing timer
      
              document.querySelectorAll('.dropdown-toggle.text-nowrap').forEach(function(ele) {
                  var id_toggle_1 = ele.id;
                  var id_toggle_menu_1 = $(ele).next('.dropdown-sub-menu')[0].id;
      
                  $("#" + id_toggle_menu_1).css("display", "none");
                  $("#" + id_toggle_menu_1).css("top", "-1px");
              });
      
      
      
              var bottomOfElement1 = $('.top-navigation').offset().top - $('#' + element2).offset().top + 31.5;
      
              $("#" + element).css("display", "block");
              $("#" + element).css("top", bottomOfElement1 + 'px');
              isHovering = true;  // Set hovering flag
          }
      
          // Function to attempt hiding the menu
          function attemptHideMenu(element) {
              if (!isHovering) {  // Only hide if not hovering
                  $("#" + element).css("display", "none");
                  $("#" + element).css("top", "-1px");
              }
          }
      
          // Function to set up hiding with delay
          function hideMenu(element) {
              isHovering = false; // Reset hovering flag
              hoverTimer = setTimeout(attemptHideMenu(element), 300); // Set delay before hiding
          }
      
      
          document.querySelectorAll('.dropdown-toggle.text-nowrap').forEach(function(ele) {
              
              var id_toggle = ele.id;
              var id_toggle_menu = $(ele).next('.dropdown-sub-menu')[0].id;
      
      
      
              // Mouse enter events
              $("#" + id_toggle + "," + " #" + id_toggle_menu).on("mouseenter", function() {
                  showMenu(id_toggle_menu, id_toggle);
              });
      
              // Mouse leave events
              $("#" + id_toggle + "," + " #" + id_toggle_menu).on("mouseleave", function() {
                  // Delay hide, allow re-entry to cancel hide
      
                  hoverTimer = setTimeout(function() {
                      isHovering = false;  // Update flag after delay
                      attemptHideMenu(id_toggle_menu);  // Attempt to hide the menu
                  }, 200);
              });
      
          })
      });
      
   </script>
   <script>
      $(document).ready(function() {
        $('.elementskit-card-header a').click(function(e) {
          e.preventDefault();
          var $this = $(this);

          $this.closest('.elementskit-card-header').toggleClass('active');
          $($this.data('target')).slideToggle();

          $this.find('.ekit_accordion_normal_icon').toggle();
          $this.find('.ekit_accordion_active_icon').toggle();
        });
      });
   </script>
</body>
</html>