<?php get_header();?>
    <div id="full">
        <?php
        $childArgs = array(
            'numberposts' => -1,
            'orderby'     => 'menu_order',
            'order'       => 'ASC',
            'post_type' => ['post_projects' , 'post_platforms'],
            'post_parent' => 0
        );

        $childList = get_posts($childArgs);
        $blockCount = 1;
        ?>
        <?php foreach ($childList as $child):
            ?>
        <section class="section s<?php echo $child->menu_order?>" style="background: url('<?php bloginfo('template_directory');?>/assets/img/main-bg.png')">


            <div class="wrap">
                <div class="title">
                    <?php
                    if( have_rows('title_names', $child->ID) ):
                        while( have_rows('title_names', $child->ID) ) : the_row();
                            ?>
                        <p></p>
                            <div class="<?php if (get_sub_field('Monserat' , $child->ID) == true) { echo 'tm';}else { echo '';}  ?>" style="font-size: <?php the_sub_field('title_size', $child->ID);?>">
                                <?php the_sub_field('title' , $child->ID);?>
                            </div>
                        <? endwhile;
                    endif;?>
                    <p></p>
                    <p><span><?php the_field('desc_block', $child->ID);?></span></p>
                    <a href="<?php the_permalink($child->ID);?>">Подробнее
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="8" viewBox="0 0 13 8" fill="none">
                            <path d="M12.3536 4.35355C12.5488 4.15829 12.5488 3.84171 12.3536 3.64645L9.17157 0.464466C8.97631 0.269204 8.65973 0.269204 8.46447 0.464466C8.2692 0.659728 8.2692 0.976311 8.46447 1.17157L11.2929 4L8.46447 6.82843C8.2692 7.02369 8.2692 7.34027 8.46447 7.53553C8.65973 7.7308 8.97631 7.7308 9.17157 7.53553L12.3536 4.35355ZM0 4.5H12V3.5H0V4.5Z"
                                  fill="white" />
                        </svg>
                    </a>
                </div>

                <div class="s-menu2">
                    <?php if(get_field('blog_img', $child->ID)):?>
                        <div class="menu-s2__top">
                            <img src="<?php the_field('blog_img', $child->ID)?>">
                            <span><?php echo $child->post_title?></span>
                        </div>
                    <?php endif;?>
                    <ul class="s-list">
                        <?php
                        $childsTax = get_posts([
                            'numberposts' => -1,
                            'post_type' => ['post_projects' , 'post_platforms'],
                            'orderby'     => 'menu_order',
                            'order'       => 'ASC',
                            'post_parent' => $child->ID
                        ]);
                        foreach ($childsTax as $childTax) {?>
                            <li>
                                <a href="<?= get_permalink($child)?>"><?= $childTax->post_title;?></a>
                            </li>
                        <?}
                        ?>
                    </ul>
                    <ul class="s-menu__bot">
                        <li><a href="/">www.pax.group</a></li>
                        <li><a href="mailto:info@pax.group">info@pax.group</a></li>
                    </ul>
                    <div class="schetchik">
                        <?php if(get_field('google_link', $child->ID)) :?>
                            <div class="schetchik-item">
                                <a href="<?php the_field('google_link',  $child->ID)?>" target="_blank" onclick="UpdateCount(132)" class="googlebtn">
                                    <img src="<?php the_field('google_image' , $child->ID)?>">
                                </a>

                                <span id="span-132"><?php the_field('google_number', $child->ID)?></span>
                            </div>
                        <?php endif; ?>
                        <?php if(get_field('apple_link', $child->ID)):?>
                            <div class="schetchik-item">
                                <a href="<?php the_field('apple_link', $child->ID)?>" target="_blank" onclick="UpdateCount(131)" class="appbtn">
                                    <img src="<?php the_field('apple_image', $child->ID)?>">
                                </a>
                                <span id="span-131"><?php the_field('apple_count', $child->ID)?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>


        </section>
        <?endforeach;?>
    </div>
<?php get_footer();?>