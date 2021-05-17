<?php

/*
Template Name: Шаблон Платформы
Template Post Type: post_platforms
*/
get_header();
?>
<div id="full">
    <?
    $thispost = get_the_ID();
    $menu_order = get_post_field( 'menu_order', $thispost->ID);
    ?>
    <section class="section s<?php echo $menu_order?>" style="background: url('<?php bloginfo('template_directory');?>/assets/img/main-bg.png')" data-ID="<?php echo $thispost; ?>">
        <div class="wrap">
            <div class="title">
                <?php
                if( have_rows('title_names') ):
                    while( have_rows('title_names') ) : the_row();

                    ?>
                    <p></p>
                        <div class="<?php if (get_sub_field('Monserat') == true) { echo 'tm';}else { echo '';}  ?>" style="font-size: <?php the_sub_field('title_size');?>">
                            <?php the_sub_field('title');?>
                        </div>
                    <? endwhile;
                endif;?>
                <p></p>
                <?php if(get_field('desc_block')):?>
                    <p><span><?php the_field('desc_block');?></span></p>
                <?php endif;?>
            </div>


        </div>

    </section>
    <?php
    global $post;
    $post_ID = get_the_ID();
    $args = array(
        'post_parent' => $post->ID,
        'posts_per_page' => -1,
        'post_type' => 'post_platforms', //you can use also 'any'
    );
    $the_query = new WP_Query( $args );
    $sectionID = 1;
    $classCount = 2;
    if ( $the_query->have_posts() ) :
        while ( $the_query->have_posts() ) : $the_query->the_post();?>
        <section class="section s<?php echo $classCount; $classCount++?>" id="ps<?php echo $sectionID; $sectionID++?>" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id()); ?>')"><?php the_content(); ?></section>
        <?
        endwhile;
    endif;
    // Reset Post Data
    wp_reset_postdata();?>
    <section class="section ps2">
        <div class="s-wrap">
            <div class="conteiner">
                <div class="s-title">История</div>
                <p>ИСТОРИЯ PAX Group – это комфортная среда для зарабатывания денег и продвижения
                    личных товаров и услуг, предусматривающая различные виды сотрудничества</p>

                <div class="double-tabs">
                    <ul class="change-tabs">
                        <?php
                        $categoryLists = get_field('category__list');
                        if($categoryLists):
                        foreach ($categoryLists as $categoryList):
                            ?>
                            <li class=""><?php echo $categoryList->name?></li>
                        <?php endforeach;
                        endif;
                        ?>
                    </ul>

                    <div class="tabs active">
                        <ul class="tabs__caption">
                        <? foreach ($categoryLists as $categoryList):
                            $subCategories = get_categories([
                                'parent' => $categoryList->term_id,
                                'hide_empty' => false
                            ]);
                            foreach ($subCategories as $subCategory):?>
                                <li><?= $subCategory->name?></li>
                         <?php endforeach;?>

                            <?php endforeach;?>
                        </ul>
                        <?php
                        foreach ($categoryLists as $categoryList):
                        $subCategories = get_categories([
                            'parent' => $categoryList->term_id,
                            'hide_empty' => false
                        ]);
                        foreach ($subCategories as $subCategory) :
                           global $news_id;
                            $news_id = $subCategory->term_id;
                            $catPosts = array(
                                'cat'=> $news_id,
                                'posts_per_page' => 1,
                                'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
                            );
                            $childPost = new WP_Query($catPosts);
                            ?>
                            <div class="tabs__content active">
                                <div class="news">
                            <?php if($childPost->have_posts()):
                                while ( $childPost->have_posts() ) : $childPost->the_post();?>

                                    <a href="" style="background-image: url('https://new.pax.group/catalog/view/theme/pax/assets/img/im1.jpg')">
                                        <p><?php the_title();?></p>
                                    </a>
                            <?php endwhile;
                            endif;
                            wp_reset_postdata();
                            ?>
                                    <nav class="pagination" style="display: flex">
                                        <?php
                                        $big = 999999999;
                                        echo paginate_links( array(
                                            'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                                            'format' => '?paged=%#%',
                                            'current' => max( 1, get_query_var('paged') ),
                                            'total' => $childPost->max_num_pages,
                                            'prev_next' => false,
                                        ) );
                                        ?>
                                    </nav>
                                    <?php wp_reset_postdata(); ?>
                                </div>
                            </div>
                        <?php endforeach;
                        endforeach;
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>
<div class="fixmenu s-menu2 " id="fixmenu-new">
    <?php if(get_field('blog_img')):?>
    <div class="menu-s2__top">
        <img src="<?php the_field('blog_img')?>">
        <span><?php the_title();?></span>
    </div>
    <?php endif;?>
    <ul class="s-list">
    <?php $args = array(
        'post_parent' => $post->ID,
        'posts_per_page' => -1,
        'post_type' => 'post_platforms', //you can use also 'any'
    );
    $the_query = new WP_Query( $args );

    if ( $the_query->have_posts() ) :
        $dataCount = 2;
        while ( $the_query->have_posts() ) : $the_query->the_post();?>
            <li><a href data-count="<?php echo $dataCount?> <?php $dataCount++ ?>"><?php echo $post->post_title?></a></li>
        <?
        endwhile;
    endif;
    // Reset Post Data
    wp_reset_postdata();?>
    </ul>




    <ul class="s-menu__bot">
        <li><a href="/">www.pax.group</a></li>
        <li><a href="mailto:info@pax.group">info@pax.group</a></li>
    </ul>
    <div class="schetchik">
        <?php if(get_field('google_link')):?>
        <div class="schetchik-item">
            <a href="<?php the_field('google_link')?>" target="_blank" onclick="UpdateCount(132)" class="googlebtn">
                <img src="<?php the_field('google_image')?>">
            </a>

            <span id="span-132"><?php the_field('google_number')?></span>
        </div>
        <?php endif; ?>
        <?php if(get_field('apple_link')):?>
        <div class="schetchik-item">
            <a href="<?php the_field('apple_link')?>" target="_blank" onclick="UpdateCount(131)" class="appbtn">
                <img src="<?php the_field('apple_image')?>">
            </a>
            <span id="span-131"><?php the_field('apple_count')?></span>
        </div>
        <?php endif; ?>
    </div>
    <div class="s-menu-btn">
        <button class="s-btb-zayvka">Оставить заявку</button>
        <button class="s-btb-callback">Свяжитесь со мной</button>
    </div>
</div>

<div id="openModal" class="modal">
    <div class="modal-dialog" style="top: 60%;">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Отправить запрос</h3>
                <a href="#close" title="Close" class="close">×</a>
            </div>
            <div class="modal-body">
                <form method="POST" action="/catalog/view/theme/pax/assets/ajax/mail.php" id="callback1" enctype="multipart/form-data">
                    <div class="modal_oc-form-in">
                        <input id="name" name="name" type="text" placeholder="Имя" required="">
                    </div>
                    <div class="modal_oc-form-in">
                        <input id="phone" name="phone" type="text" placeholder="+7 923 55" required="">
                    </div>
                    <div class="modal_oc-form-in">
                        <select id="select" name="select" type="select" required="">
                            <option value="Стать партнёром проектов PAX group">Стать партнёром проектов PAX group</option>
                            <option value="Стать поставщиком PAX Group">Стать поставщиком PAX Group</option>
                            <option value="Разместить комплексную рекламу в проектах PAX Group">Разместить комплексную рекламу в проектах PAX Group</option>
                            <option value="Создать систему управления в моей компании">Создать систему управления в моей компании</option>
                            <option value="Внедрить корпоративную соц сеть">Внедрить корпоративную соц сеть</option>
                            <option value="Внедрить корпоративный мессенджер">Внедрить корпоративный мессенджер</option>
                            <option value="Инвестиции в стартапы">Инвестиции в стартапы</option>
                        </select>
                    </div>
                    <div class="modal_oc-form-in">
                        <textarea id="comment" placeholder="Комментарий" name="comment" type="text"></textarea>
                    </div>
                    <div class="modal_oc-form-in">
                        <input id="file" name="file" type="file">
                    </div>
                    <div class="modal_oc-form-btn">
                        <button type="submit"><span>Отправить запрос</span></button>
                    </div>
                    <input id="button" name="button" type="hidden">
                    <input id="thread" name="thread" type="hidden" value="PAX Group">
                    <input id="block" name="block" type="hidden" value="PAX Group">
                    <input id="admin_mail" name="admin_mail" value="info@pax.group" type="hidden">
                </form>
                <div style="font-size: 18px;" id="thanks"></div>
            </div>
        </div>
    </div>
</div>
<script>
    var data = 1;
    $( ".page-numbers" ).each(function() {
        $( this ).attr('data-id', data);
        data++;
    });


</script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('.pagination a').click(function(e) {
            e.preventDefault(); // don't trigger page reload
            if($(this).hasClass('active')) {
                return; // don't do anything if click on current page
            }
            $.post(
                '<?php echo admin_url('admin-ajax.php'); ?>', // get admin-ajax.php url
                {
                    action: 'my_ajax_action',
                    page: parseInt($(this).attr('data-page')), // get page number for "data-page" attribute
                    posts_per_page: <?php echo get_option('posts_per_page', $catPosts); ?>,
                    post_id: <?php echo $news_id; ?>
                },
                function(data) {
                    console.log(data); // replace posts with new one
                });
        });
    });
</script>


<?php get_footer();?>
