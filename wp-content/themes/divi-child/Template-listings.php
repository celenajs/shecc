<?php

/* 
  Template Name: All listing
*/

get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

global $wpdb;


?>

<div id="main-content">

<div class="container">


<?php

// echo '<pre>'. print_r($wpdb, true).'</pre>';

// The Query
$the_query = new WP_Query( array('post_type'=> 'listings', 'posts_per_page'=> -1) );

//echo '<pre>'. print_r($the_query, true).'</pre>';

// The Loop
if ( $the_query->have_posts() ) {
    echo '<ul class="content-listings">';
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        echo '<li> 

        <div class= "thumbnail-container"> '.get_the_post_thumbnail().'</div>
        <a href="'.get_permalink().'">'. get_the_title() . '</a>
        <div class="text-description">'.wp_trim_words(get_the_content(), 15, '...').'</div>
        <div class="moredetails"><a href="'.get_permalink().'"> read more <span>»</span></a> </div>
        
        </li>';
   
    }
    echo '</ul>';
} else {
    // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();

?> 
</div>
</div> <!-- #main-content -->



<?php

get_footer();
