</div>
<!-- END Page Container -->
<!--
      Codebase JS Core

      Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
      to handle those dependencies through webpack. Please check out codebase/assets/_es6/main/bootstrap.js for more info.

      If you like, you could also include them separately directly from the codebase/assets/js/core folder in the following
      order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

      codebase/assets/js/core/jquery.min.js
      codebase/assets/js/core/bootstrap.bundle.min.js
      codebase/assets/js/core/simplebar.min.js
      codebase/assets/js/core/jquery-scrollLock.min.js
      codebase/assets/js/core/jquery.appear.min.js
      codebase/assets/js/core/jquery.countTo.min.js
      codebase/assets/js/core/js.cookie.min.js
  -->
  <script src="<?php echo base_url('codebase/assets/js/codebase.core.min.js'); ?>"></script>

  <!--
      Codebase JS

      Custom functionality including Blocks/Layout API as well as other vital and optional helpers
      webpack is putting everything together at codebase/assets/_es6/main/app.js
  -->
  <script src="<?php echo base_url('codebase/assets/js/codebase.app.min.js'); ?>"></script>

  <!-- Page JS Plugins -->
  <script src="<?php echo base_url('codebase/assets/js/plugins/chartjs/Chart.bundle.min.js'); ?>"></script>
  <script src="<?php echo base_url('codebase/assets/js/plugins/slick/slick.min.js'); ?>"></script>

  <!-- Page JS Code -->
  <script src="<?php echo base_url('codebase/assets/js/pages/be_pages_dashboard.min.js'); ?>"></script>
</body>
</html>