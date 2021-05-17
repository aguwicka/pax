<section class="section footer" id="<?php the_field('contacts_href');?>">
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
