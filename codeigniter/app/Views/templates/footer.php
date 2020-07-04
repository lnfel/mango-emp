<!--
      Codebase JS Core

      Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
      to handle those dependencies through webpack. Please check out public/codebase/assets/_es6/main/bootstrap.js for more info.

      If you like, you could also include them separately directly from the public/codebase/assets/js/core folder in the following
      order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

      public/codebase/assets/js/core/jquery.min.js
      public/codebase/assets/js/core/bootstrap.bundle.min.js
      public/codebase/assets/js/core/simplebar.min.js
      public/codebase/assets/js/core/jquery-scrollLock.min.js
      public/codebase/assets/js/core/jquery.appear.min.js
      public/codebase/assets/js/core/jquery.countTo.min.js
      public/codebase/assets/js/core/js.cookie.min.js
  -->
  <script src="public/codebase/assets/js/codebase.core.min.js"></script>

  <!--
      Codebase JS

      Custom functionality including Blocks/Layout API as well as other vital and optional helpers
      webpack is putting everything together at public/codebase/assets/_es6/main/app.js
  -->
  <script src="public/codebase/assets/js/codebase.app.min.js"></script>

  <!-- Page JS Plugins -->
  <script src="public/codebase/assets/js/plugins/chartjs/Chart.bundle.min.js"></script>
  <script src="public/codebase/assets/js/plugins/slick/slick.min.js"></script>

  <!-- Page JS Code -->
  <script src="public/codebase/assets/js/pages/be_pages_dashboard.min.js"></script>
</body>
</html>