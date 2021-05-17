    <?php
    /*
     * Paginate Advanced Custom Field repeater
     */

    if( ('page') ) {
    $page = get_query_var( 'page', 1);
    } else {
    $page = 1;
    }
    if($page < 2) {
    $page = 1;
    }
    // Variables
    $row              = 0;
    $posts_per_page   = 3;  // How many images to display on each page
    $content          = get_field( 'image_gallery' );
    $total            = count( $content );
    $pages            = ceil( $total / $posts_per_page );
    $min              = ( ( $page * $posts_per_page ) - $posts_per_page ) + 1;
    $max              = ( $min + $posts_per_page ) - 1;
    ?>
    <?php if( have_rows('image_gallery') ): ?>
        <div class="container-propositions" style="display: flex">
            <?php while( have_rows('image_gallery') ): the_row();
                $row++;
                // Ignore this row if $row is lower than $min
                if($row < $min) { continue; }

                // Stop loop completely if $row is higher than $max
                if($row > $max) { break; }
                $sub_field = get_sub_field('image');
                ?>
                <img class="img-news" src="<?php echo $sub_field; ?>" alt="" style="max-width: 30%">
            <?php endwhile; ?>
        </div>
        <div class="pagination" style="display: flex; justify-content: center">
            <?php
            // Pagination
            echo paginate_links( array(
                'base' => get_permalink() . '%#%' . '/',
                'format' => '?page=%#%',
                'current' => $page,
                'total' => $pages,
                'type' => 'plain'
            ) );
            ?>
        </div>
    <?php endif; ?>
    <script>
        $(document).on( 'click', 'div.pagination a.page-numbers', function( event ) {
            event.preventDefault();

            var ajaxurl = "<?php echo admin_url('admin-ajax.php')?>";

            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    'action': 'my_ajax_action',
                    'post_id': <?php echo get_queried_object_id(); ?>

                },
                success : function(data) {
                    $('html').append(data);
                    console.log(data);
                },
                function(data){
                    // console.log(data);
                }
            });
        });
    </script>


