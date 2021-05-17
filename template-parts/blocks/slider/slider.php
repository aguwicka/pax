

    <div class="slider">
        <div class="slider-wrap">
            <?php
            if( have_rows('slider') ):
                while( have_rows('slider') ) : the_row();?>
                    <div class="slide-item">
                        <div class="slide-img"><img src="<?php the_sub_field('slider_img');?>"></div>
                        <div class="wraper">
                            <div class="s-title"><?php the_sub_field('slider_title');?></div>
                            <p><?php the_sub_field('slider_desc');?></p>
                        </div>
                    </div>
                <?php endwhile;
            endif;?>
        </div>

    </div>

