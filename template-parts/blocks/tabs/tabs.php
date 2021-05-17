
    <div class="s-wrap">
        <div class="conteiner">
            <?php if(get_field('block_name')):?>
                <div class="s-title"><?php the_field('block_name')?></div>
            <?php endif;?>
            <?php if(get_field('block_desc')):?>
                <p><?php the_field('block_desc')?></p>
            <?php endif;?>

            <div class="double-tabs">
                <ul class="change-tabs">
                    <?php

                    if( have_rows('tabs_repeator') ):
                        $tab_count=1;
                        while( have_rows('tabs_repeator') ) : the_row(); ?>
                            <li class="<?php if ($tab_count == 1) { echo 'active';}else { echo '';} $tab_count++ ?>"><?php the_sub_field('main_tabs')?></li>
                        <?php endwhile;
                    endif;?>
                </ul>
                <?php
                if( have_rows('test123') ):
                    $div_count=1;
                    while( have_rows('test123') ) : the_row();?>
                        <div class="tabs <?php if ($div_count == 1) { echo 'active';}else { echo '';} $div_count++ ?>">
                            <ul class="tabs__caption">
                                <?php
                                if( have_rows('tes1') ):
                                    $second__tabs = 1;
                                    while( have_rows('tes1') ) : the_row();?>
                                        <li class="<?php if ($second__tabs == 1) { echo 'active';}else { echo '';} $second__tabs++ ?>"><?php the_sub_field('t1');?></li>
                                    <?php endwhile;
                                endif;?>
                            </ul>

                            <?php
                            if( have_rows('test111') ):
                                $tabs_content = 1;
                                while( have_rows('test111') ) : the_row();?>
                                    <div class="tabs__content <?php if ($tabs_content == 1) { echo 'active';}else { echo '';} $tabs_content++ ?>">
                                        <div class="content-img">
                                            <img src="<?php the_sub_field('img');?>">
                                            <div class="content-text">
                                                <p>
                                                    <?php the_sub_field('desc');?>
                                                </p>
                                                <a href="<?php the_sub_field('link');?>">Скачать презентацию</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile;
                            endif;?>
                        </div>
                    <? endwhile;
                endif;?>
            </div>
        </div>
    </div>

