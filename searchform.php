<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div>
        <label for="s" class="screen-reader-text">
        	Suche nach:
        </label>
        <input type="search" id="s" name="s" value="" />
        <input type="submit" value="<?php _e('Suche','html5reset'); ?>" id="searchsubmit" />
    </div>
</form>