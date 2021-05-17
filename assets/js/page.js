function slowScroll(id)
{
    var offset = 0;
    $('html, body').animate({
        scrollTop: $(id).offset().top - offset
    }, 1000);
    var dest = $(id).offset().top;
    $('body, html').animate({scrollTop: dest}, 300);

}


$(function () {

    if ($(window).width() < '961')
    {
        let menu = $('#fixmenu-new').html();

        $('.menu-list').html(menu);

        $('.s-list').removeClass('s-list');
        //$('.menu-list').addClass('mob-menu-page');
        // $('.menu-list').removeClass('menu-list');
        $(".menu-list li").click(function(){
            $('.burger').click()
        })
        let href = 1; let Datascroll = '';
        $('[data-count]').each(function(i,elem)
        {
            $(this).attr("href", location.protocol + "//" + location.hostname + location.pathname + location.search + "#ps" + href);

            /*	Datascroll = '#ps' + href;
                Datascroll = $(Datascroll).offset().top;
                $(this).attr("data-scroll", Datascroll);*/
            href++;
        });

        $('#openModalNews .modal-dialog').css('top', '0%');

        /*
        window.setInterval(function(){
        console.log($(window).scrollTop());
        }, 1000);
        */
    }

    $('.news a').click(function (event) {
        event.preventDefault();
        $('#openModalNews').fadeIn();
        let image = $(this).css('background-image');
        image = image.split('"')[1];
        $("#news_image").attr('src', image);

        let text = $(this).html();
        $("#news_text").html(text);
        $('#openModalNews').find('.full_text').show();

        let title = $(this).children('p:eq(0)').text();
        $("#news_title").text(block);
    });

    $('.closenews').click(function () {
        $('#openModalNews').fadeOut()
        return false;
    });

    $('#openModalNews').mouseup(function (e){
        var div = $(".modal-dialog");
        if (!div.is(e.target)
            && div.has(e.target).length === 0) {
            $('#openModalNews').fadeOut()
        }
    });


    $('.vakan__content a').click(function (event) {
        event.preventDefault();
        $('#openModalVac').fadeIn();

        let text = $(this).html();
        $("#vac_text").html(text);
        $('#openModalVac').find('.full_text').show();
    });

    $('.closevac').click(function () {
        $('#openModalVac').fadeOut()
        return false;
    });

    $('#openModalVac').mouseup(function (e){
        var div = $(".modal-dialog");
        if (!div.is(e.target)
            && div.has(e.target).length === 0) {
            $('#openModalVac').fadeOut()
        }
    });
    /*
        $('.tabs__caption li, .change-tabs li').click(function ()
        {
            let fon = $(this).attr('data-fon');
            if(fon != '' && fon != undefined)
            {
                $(this).parents('section').css('background-image', 'url('+fon+')');
            }
            else
            {
                let old_fon = $(this).parents('section').attr('data-oldfon');
                $(this).parents('section').css('background-image', 'url('+old_fon+')');
            }
        });
    */
});