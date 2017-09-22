      <footer id="footer1" class="source-org vcard copyright">
        <div class="footer-slice fs-second">
          <div class="container footer-cnt">
            <div class="col-md-6">
              <?php if ( is_active_sidebar( 'footer_upper_left' ) ) : ?>
                <div id="footer_uppper_left">
                  <?php 
                    dynamic_sidebar( 'footer_upper_left' ); 
                  ?>
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-6">
              <?php if ( is_active_sidebar( 'footer_upper_right' ) ) : ?>
                <div id="footer_uppper_right">
                  <?php 
                    dynamic_sidebar( 'footer_upper_right' ); 
                  ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="footer-slice fs-default fs-small-text">
          <div class="container footer-cnt">
            <div class="col-md-6">
              <?php if ( is_active_sidebar( 'footer_left' ) ) : ?>
                <div id="footer_left">
                  <?php 
                    dynamic_sidebar( 'footer_left' ); 
                  ?>
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-6">
              <?php if ( is_active_sidebar( 'footer_right' ) ) : ?>
                <div id="footer_right">
                  <?php 
                    dynamic_sidebar( 'footer_right' ); 
                  ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <div class="uzk15__overlay"></div>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="<?php echo get_template_directory_uri(); ?>/js/functions.js"></script>
    <?php 
      wp_footer(); 
    ?>
  </body>
</html>
