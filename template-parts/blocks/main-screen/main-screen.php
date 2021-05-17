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
