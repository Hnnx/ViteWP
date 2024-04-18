<?php
/**
 * The template for displaying search forms in Underscores.me
 *
 * @package understrap
 */

?>
<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search" aria-label="<?php esc_attr_e( 'SiteWide Search', 'understrap' ); ?>">

    <label class="assistive-text d-none" for="s"><?php esc_html_e( 'Iskanje po spletnem mestu', 'emigma' ); ?></label>
    
    <div class="input-group d-flex">
        <i class="fas fa-search align-self-center me-3" style="transform: rotate(90deg); font-size: 2.5rem"></i>
        <input class="field form-control" id="search-query-input" name="s" type="text" spellcheck="false"
               placeholder="<?php esc_attr_e( 'Vpiši iskani niz', 'emigma' ); ?>" value="<?php the_search_query(); ?>" autofocus="true">

        <div class="loading d-none rounded-pill">
            <div class="d-flex align-items-center flex-column flex-md-row position-relative">
                <span class="loader"></span>
                <span class="text-primary ms-1 d-none d-md-block"><?php _e('Iskanje ...', 'emigma'); ?></span>                
            </div>
        </div>
    </div>

    <div class="search-helper">
        <span class="search-waiting-input d-none">
            <?php _e('Da bi iskalnik začel poizvedbo, prosim vnesite vsaj 4 znake', 'emigma') ?>
        </span>
    </div>

</form>
