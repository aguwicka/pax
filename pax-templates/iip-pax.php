<?php
/*
Template Name: iip-pax template
Template Post Type: post_projects
*/
get_header();
?>

    <div id="full">
        <section class="section s6" style="background: url('<?php bloginfo('template_directory');?>/assets/img/main-bg.png')">
            <div class="wrap">
                <div class="title">
                    <?php if(get_field('name1')):?>
                    <div>
                        <?php the_field('name1');?>
                    </div>
                    <?php endif;?>
                    <?php if(get_field('name2')):?>
                    <div class="tm"><?php the_field('name2');?></div>
                    <?php endif;?>
                    <?php if(get_field('desc_block')):?>
                    <span><?php the_field('desc_block');?></span>
                    <?php endif;?>
                    <a href="">Подробнее
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="8" viewBox="0 0 13 8" fill="none">
                            <path d="M12.3536 4.35355C12.5488 4.15829 12.5488 3.84171 12.3536 3.64645L9.17157 0.464466C8.97631 0.269204 8.65973 0.269204 8.46447 0.464466C8.2692 0.659728 8.2692 0.976311 8.46447 1.17157L11.2929 4L8.46447 6.82843C8.2692 7.02369 8.2692 7.34027 8.46447 7.53553C8.65973 7.7308 8.97631 7.7308 9.17157 7.53553L12.3536 4.35355ZM0 4.5H12V3.5H0V4.5Z"
                                  fill="white" />
                        </svg>
                    </a>
                </div>

                <div class="s-menu2">

                    <ul class="s-list">
                        <li><a href="" class="active">О нас</a></li>
                        <li><a href="">ИСТОРИЯ</a></li>
                        <li><a href="">ДЕЯТЕЛЬНОСТЬ</a></li>
                        <li><a href="">КАТАЛОГ/РЕШЕНИЯ для польз</a></li>
                        <li><a href="">КАТАЛОГ/РЕШЕНИЯ для ЮР ЛИЦ</a></li>
                        <li><a href="">УСЛУГИ для пользователей</a></li>
                        <li><a href="">УСЛУГИ для ЮР ЛИЦ</a></li>
                        <li><a href="">ИНВЕСТОРАМ</a></li>
                        <li><a href="">ПАРТНЕРАМ</a></li>
                        <li><a href="">РЕКЛАМА в проектах</a></li>
                        <li><a href="">НОВОСТИ/ПРЕСС ЦЕНТР</a></li>
                        <li><a href="">БИБИЛИОТЕКА/СПРАВОЧНАЯ</a></li>
                        <li><a href="">ЛИЦЕНЗИИ</a></li>
                        <li><a href="">ВАКАНСИИ</a></li>
                        <li><a href="">КОНТАКТЫ</a></li>
                    </ul>
                    <ul class="s-menu__bot">
                        <li><a href="">www.pax.group</a></li>
                        <li><a href="">info@pax.group</a></li>
                        <li><a href="">+79219100103</a></li>
                    </ul>
                </div>
            </div>

        </section>
        <section class="section ps1" >
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
            <div class="fixmenu s-menu2">
                <ul class="s-list">
                    <li><a href="" class="active">О нас</a></li>
                    <li><a href="">ИСТОРИЯ</a></li>
                    <li><a href="">ДЕЯТЕЛЬНОСТЬ</a></li>
                    <li><a href="">КАТАЛОГ/РЕШЕНИЯ для польз</a></li>
                    <li><a href="">КАТАЛОГ/РЕШЕНИЯ для ЮР ЛИЦ</a></li>
                    <li><a href="">УСЛУГИ для пользователей</a></li>
                    <li><a href="">УСЛУГИ для ЮР ЛИЦ</a></li>
                    <li><a href="">ИНВЕСТОРАМ</a></li>
                    <li><a href="">ПАРТНЕРАМ</a></li>
                    <li><a href="">РЕКЛАМА в проектах</a></li>
                    <li><a href="">НОВОСТИ/ПРЕСС ЦЕНТР</a></li>
                    <li><a href="">БИБИЛИОТЕКА/СПРАВОЧНАЯ</a></li>
                    <li><a href="">ЛИЦЕНЗИИ</a></li>
                    <li><a href="">ВАКАНСИИ</a></li>
                    <li><a href="">КОНТАКТЫ</a></li>
                </ul>

                <ul class="s-menu__bot">
                    <li><a href="">www.pax.group</a></li>
                    <li><a href="">info@pax.group</a></li>
                    <li><a href="">+79219100103</a></li>
                </ul>
            </div>
        </section>
        <section class="section ps2">
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
            <div class="fixmenu s-menu2">
                <ul class="s-list">
                    <li><a href="" class="active">О нас</a></li>
                    <li><a href="">ИСТОРИЯ</a></li>
                    <li><a href="">ДЕЯТЕЛЬНОСТЬ</a></li>
                    <li><a href="">КАТАЛОГ/РЕШЕНИЯ для польз</a></li>
                    <li><a href="">КАТАЛОГ/РЕШЕНИЯ для ЮР ЛИЦ</a></li>
                    <li><a href="">УСЛУГИ для пользователей</a></li>
                    <li><a href="">УСЛУГИ для ЮР ЛИЦ</a></li>
                    <li><a href="">ЛЕНТА</a></li>
                    <li><a href="">ПАРТНЕРАМ</a></li>
                    <li><a href="">БИБИЛИОТЕКА/СПРАВОЧНАЯ</a></li>
                    <li><a href="">ЛИЦЕНЗИИ</a></li>
                    <li><a href="">ВАКАНСИИ</a></li>
                    <li><a href="">КОНТАКТЫ</a></li>
                </ul>
                <ul class="s-menu__bot">
                    <li><a href="">www.pax.group</a></li>
                    <li><a href="">info@pax.group</a></li>
                    <li><a href="">+79219100103</a></li>
                </ul>
                <div class="s-menu-btn">
                    <button class="s-btb-zayvka">Оставить заявку</button>
                    <button class="s-btb-callback">Свяжитесь со мной</button>
                </div>
            </div>
        </section>
        <section class="section footer">
            <div class="s-wrap">
                <div class="conteiner">
                    <div class="s-title">контакты</div>
                    <div class="contact">
                        <div class="contact__left">
                            <div class="contact__item">
                                <div class="contact__t">E-mail</div>
                                <a href="mailto:<?php the_field('email');?>"><?php the_field('email');?></a>
                            </div>
                            <div class="contact__item">
                                <div class="contact__t">Телефон</div>
                                <a href="tel:<?php the_field('phone');?>"><?php the_field('phone');?></a>
                            </div>
                            <div class="contact__item">
                                <div class="contact__t">Адрес</div>
                                <a href=""><?php the_field('address');?></a>
                            </div>
                        </div>
                        <div class="contact__right">
                            <div class="contact__t">Реквизиты</div>
                            <?php
                            if( have_rows('rekz') ):
                                while( have_rows('rekz') ) : the_row();?>
                                    <span><?php the_sub_field('rekz_name')?></span>
                                <?php endwhile;
                            endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php get_footer(); ?>