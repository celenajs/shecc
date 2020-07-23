<?php

function get_titles($atts){
	/**
	 * Function Defination
	 */
	return get_the_title(get_the_ID());

}

add_shortcode('get_the_page_title','get_titles');

/**
 * this function for the search style 
 */

 function basic_search_style(){
     /**
      * initialise styles 
      */
      wp_enqueue_style( 'search_filter', get_stylesheet_directory_uri() . '/search_filter/search_styles.css' );
}


/**
 * this function is for searches all the listings available with basic filters
 */

 function get_search_result(){
    //echo '<pre>'. print_r($_POST, true) .'</pre>';
    // echo '<p>'.$_POST['listing_title'].'</p>';
    // echo $_POST['furnishing'];
    //checks what page is currently in
    $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
    
    
    $args = array(
        'post_type' => "listings", // the name of custom post type,it can be post, page, custom post type.
        'posts_per_page' => 6, // -1 is to display all 
        's' => $_GET['listing_title'], 
        'paged' => $paged,
        'orderby' => 'date', 
        'order' => 'DESC'
    );      
    $args['meta_query'][] = array(
        'key' => 'type_of_furnishing',
        'value' => $_GET['furnishing'],
        'compare' => '='
    );
    $args['meta_query'][] = array(
        'key' => 'number_of_bathrooms',// key is the name of your custom field 
        'value' => $_GET['number_of_bathrooms'],// name of your input field
        'compare' => '='
    );   
    $args['meta_query'][] = array(
        'key' => 'sizes',
        'value' => $_GET['sizes'],
        'compare' => '='
    );

    $the_query = new WP_Query($args);
    //$the_query = new WP_Query( array('post_type'=> 'listings', 'posts_per_page'=> -1,'s'=>$_POST['listing_title']) );

    //echo '<pre>'. print_r($the_query, true).'</pre>';
    if ( $_GET['basic_search']){

        // The Loop
        if ( $the_query->have_posts() ) {
            echo '<div class="search_results">';
            echo '<h2>Search Result:'.$_GET['listing_title'].'</h2>';
            echo '<ul class="search_result">';
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
                echo '<li>';
                echo '<div class= "thumbnail-container"> '.get_the_post_thumbnail().'</div>';
                echo '<a href="'.get_permalink().'">'.get_the_title() .'</a>';
                echo '<div class="text-description">'.wp_trim_words(get_the_content(), 15, '...').'</div>';
                echo '</li>';            
            }
            echo '</ul></div>';

           pagination($the_query); /** this is the pagination function previous-next */
         /* Restore original Post Data */
         //wp_reset_postdata(); 

        } else {
            echo 'no posts found';
        }

       
    }
}


  function pagination($page){
      ?>
      <!-- Pagination Section -->
        <div class="listing-pagination">
            <?php 
                $big = 999999999; //need an unlikely integer
                
                echo paginate_links( array(
                    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    'format' => '?paged=%#%',
                    'current' => max( 1, get_query_var('paged') ),
                    'total' => $page->max_num_pages
                ) );
              

            ?>
        </div>

      <?php

  }


 /**
  *  this function display search form
  */

  function get_filter_form(){
    
      basic_search_style();
      
      ob_start();

        ?>
            <form method="GET"> 
            <select name="Sizes">
                    <option value="">sizes</option>
                    <option value="furnished">small</option>
                    <option value="luxury">medium</option>
                    <option value="vintage">large</option>
            </select>
            <input type="number" name="number_of_bathrooms" placeholder="Number of bathroms">

            <input type="text" name="listing_title" placeholder="Search for keywords" required>
            <select name="furnishing">
                    <option value="">Type of Furnishing</option>
                    <option value="furnished">furnished</option>
                    <option value="luxury">luxury</option>
                    <option value="vintage">vintage</option>
                    <option value="unfurnished">unfurnished</option>
            </select>
            <input type="submit" name="basic_search" value="Search Listings">
            </form>
        <?php

      get_search_result(); // this function return the search result 
         
      return ob_get_clean();

  }
   
  add_shortcode('basic_search','get_filter_form');



