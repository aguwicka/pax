<?php

/*
Template Name: Шаблон Проекты
Template Post Type: post_projects
*/
get_header();
?>
<div id="full">
    <?
    $thispost = get_post($id);
    $menu_order = $thispost->menu_order;
    ?>
    <section class="section s<?php echo $menu_order?>" style="background: url('<?php bloginfo('template_directory');?>/assets/img/main-bg.png')">
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
        'post_type' => 'post_projects', //you can use also 'any'
    );
    $the_query = new WP_Query( $args );
    $classCount = 2;
    if ( $the_query->have_posts() ) :
        while ( $the_query->have_posts() ) : $the_query->the_post();?>
            <section class="section s<?php echo $classCount; $classCount++?>"  style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id()); ?>')"><?php the_content(); ?></section>
        <?
        endwhile;
    endif;
    // Reset Post Data
    wp_reset_postdata();?>

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
            'post_type' => 'post_projects', //you can use also 'any'
        );
        $the_query = new WP_Query( $args );
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post();?>
                <li><a href" ><?php echo $post->post_title?></a></li>
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
<?php get_footer();?>
