<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <!-- Useful meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Pax Group</title>
</head>
<?php wp_head();?>
<body unselectable="on">

<div class="preload">
    <img src="<?php bloginfo('template_directory');?>/assets/img/preload.gif">
</div>

<div id="arrow">
    <div class="arr-up">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="22" viewBox="0 0 16 22" fill="none">
            <path d="M7.29289 0.292892C7.68342 -0.0976314 8.31658 -0.0976315 8.70711 0.292892L15.0711 6.65685C15.4616 7.04738 15.4616 7.68054 15.0711 8.07107C14.6805 8.46159 14.0474 8.46159 13.6569 8.07107L8 2.41421L2.34315 8.07107C1.95262 8.46159 1.31946 8.46159 0.928932 8.07107C0.538407 7.68054 0.538407 7.04738 0.928932 6.65685L7.29289 0.292892ZM7 22L7 1L9 1L9 22L7 22Z"
                  fill="#A6A6A6" />
        </svg>
    </div>
    <div class="arr-d">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="22" viewBox="0 0 16 22" fill="none">
            <path d="M7.29289 21.7071C7.68342 22.0976 8.31658 22.0976 8.70711 21.7071L15.0711 15.3431C15.4616 14.9526 15.4616 14.3195 15.0711 13.9289C14.6805 13.5384 14.0474 13.5384 13.6569 13.9289L8 19.5858L2.34315 13.9289C1.95262 13.5384 1.31946 13.5384 0.928932 13.9289C0.538407 14.3195 0.538407 14.9526 0.928932 15.3431L7.29289 21.7071ZM7 -4.37121e-08L7 21L9 21L9 4.37121e-08L7 -4.37121e-08Z"
                  fill="black" />
        </svg>
    </div>
</div>
<div id="main">
    <div class="new-fon" style="background-image: url('<?php bloginfo('template_directory');?>/assets/img/fon.jpg')">
    </div>

    <div id="menu">
        <div class="logo">
            <a href="/">
                <img src="<?php bloginfo('template_directory');?>/assets/img/logo.svg" title="Pax Group" alt="Pax Group">
            </a>
        </div>
        <div class="burger">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="mob-sroll">
            <div class="menu-list">
                <ul>
                    <li><a href="/about" class="active">О PAX Group</a></li>
                </ul>
                <h2>Проекты</h2>
                <ul>
                    <?php
                    $projectsArgs = array(
                        'numberposts' => -1,
                        'orderby'     => 'menu_order',
                        'order'       => 'ASC',
                        'post_type' => 'post_projects',
                        'post_parent' => 0
                    );
                    $projectsList = get_posts($projectsArgs);
                    foreach ($projectsList as $projectList) {?>
                        <li>
                            <a href="<?php the_permalink($projectList);?>"><?= $projectList->post_title;?></a>
                        </li>
                    <?php } ?>
                </ul>
                <h2>Платформы</h2>
                <ul>
                    <?php
                    $childArgs = array(
                        'numberposts' => -1,
                        'orderby'     => 'menu_order',
                        'order'       => 'ASC',
                        'post_type' => 'post_platforms',
                        'post_parent' => 0
                    );

                    $childList = get_posts($childArgs);
                    foreach ($childList as $child) {?>
                        <li>
                            <a href="<?php the_permalink($child);?>"><?= $child->post_title;?></a>
                        </li>
                    <?php }?>
                </ul>
            </div>
            <div class="s-menu-btn">
                <button class="s-btb-zayvka">Оставить заявку</button>
                <button class="s-btb-callback">Свяжитесь со мной</button>
            </div>
            <div class="menu__bot">
                <div class="menu__soc">
                    <a href="https://vk.com/pax.group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="14" viewBox="0 0 21 14" fill="none">
                            <path d="M20.396 12.08a1.7 1.7 0 00-.07-.152c-.355-.727-1.035-1.62-2.039-2.68l-.02-.023-.011-.012-.011-.013h-.011c-.456-.493-.744-.824-.865-.994-.22-.323-.27-.65-.15-.982.086-.25.406-.78.961-1.588.292-.428.524-.772.694-1.03 1.232-1.86 1.766-3.048 1.602-3.565l-.064-.12c-.043-.074-.153-.14-.33-.2-.179-.061-.406-.071-.684-.031l-3.075.024c-.05-.02-.12-.018-.213.006l-.14.037-.053.03-.042.036a.505.505 0 00-.117.128.863.863 0 00-.107.212 21.104 21.104 0 01-1.143 2.728c-.263.5-.505.935-.726 1.303-.22.368-.405.638-.555.812-.15.174-.284.313-.405.418-.121.106-.214.15-.278.134a7.077 7.077 0 01-.181-.049.778.778 0 01-.24-.297A1.466 1.466 0 0112 5.74a5.878 5.878 0 01-.038-.49c-.003-.138-.002-.332.006-.583.007-.25.01-.42.01-.509 0-.307.006-.64.016-1l.027-.855c.007-.21.01-.432.01-.667 0-.234-.012-.418-.037-.551a2.08 2.08 0 00-.111-.388.638.638 0 00-.22-.291 1.156 1.156 0 00-.357-.164c-.377-.097-.858-.15-1.441-.157C8.54.067 7.69.164 7.313.374c-.15.09-.285.21-.406.364-.128.178-.146.275-.053.291.427.073.73.247.907.521l.064.146c.05.105.1.291.15.558.05.266.082.561.096.884.036.59.036 1.096 0 1.516a20.4 20.4 0 01-.101.982 2.171 2.171 0 01-.273.836.197.197 0 01-.053.061.716.716 0 01-.288.06c-.1 0-.221-.056-.363-.169a2.72 2.72 0 01-.443-.467 6.297 6.297 0 01-.518-.83 15.22 15.22 0 01-.598-1.261l-.17-.352a32.001 32.001 0 01-.438-.988c-.186-.432-.35-.85-.491-1.255a.797.797 0 00-.257-.388L4.025.847a1.03 1.03 0 00-.416-.182L.683.69C.384.69.182.766.075.92L.032.993A.438.438 0 000 1.186c0 .09.021.199.064.328.427 1.14.891 2.239 1.393 3.297A38.537 38.537 0 002.765 7.37a30.2 30.2 0 001.132 1.831c.384.574.638.942.763 1.103.125.162.222.283.294.364l.267.29c.17.195.421.427.752.698.331.27.698.538 1.1.8.402.263.87.477 1.404.643a4.306 4.306 0 001.558.2h1.228c.25-.024.438-.113.566-.267l.042-.06a.867.867 0 00.08-.225 1.39 1.39 0 00.038-.333 4.43 4.43 0 01.07-.94c.052-.278.113-.488.18-.63a1.56 1.56 0 01.23-.357.976.976 0 01.182-.176.67.67 0 01.085-.043c.17-.064.372-.002.603.188.232.19.449.425.652.704.203.279.446.592.731.94.285.347.534.605.747.775l.214.146c.142.097.327.186.555.266.227.081.427.101.598.06l2.733-.047c.27 0 .48-.051.63-.152.15-.101.238-.213.266-.334.03-.12.03-.258.006-.412a1.695 1.695 0 00-.075-.321z" fill="#101010"></path></svg>
                    </a>
                    <a href="https://www.instagram.com/pax.group/">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none">
                            <g clip-path="url(#clip0)" fill="#101010">
                                <path d="M11.044 0H2.039C1.011 0 .174.881.174 1.964v9.478c0 1.083.837 1.964 1.865 1.964h9.005c1.029 0 1.866-.881 1.866-1.964V1.964C12.91.88 12.073 0 11.044 0zM6.567 10.212c-1.852 0-3.358-1.586-3.358-3.535 0-1.95 1.506-3.535 3.358-3.535 1.851 0 3.358 1.586 3.358 3.535s-1.507 3.535-3.358 3.535zm3.73-6.284c-.616 0-1.119-.529-1.119-1.179s.503-1.178 1.12-1.178c.617 0 1.12.529 1.12 1.178 0 .65-.503 1.179-1.12 1.179z"></path>
                                <path d="M10.297 2.356a.384.384 0 00-.373.393c0 .217.167.393.373.393a.384.384 0 00.373-.393.384.384 0 00-.373-.393zm-3.73 1.571c-1.44 0-2.612 1.234-2.612 2.75s1.172 2.75 2.612 2.75c1.44 0 2.612-1.234 2.612-2.75s-1.172-2.75-2.612-2.75z"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0">
                                    <path fill="#fff" transform="translate(.174)" d="M0 0h12.736v13.406H0z"></path>
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                    <a href="https://www.youtube.com/channel/UCADf0ssyRKJruU7EoLuqIzQ/featured?view_as=subscriber">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="14" viewBox="0 0 18 14" fill="none">
                            <path d="M17.252 1.296C16.775.352 16.256.179 15.201.112 14.146.033 11.494 0 9.197 0 6.895 0 4.242.033 3.189.111 2.136.18 1.616.351 1.134 1.296.642 2.239.389 3.862.389 6.721v.01c0 2.846.253 4.482.745 5.415.482.944 1 1.115 2.054 1.194 1.054.069 3.707.11 6.009.11 2.297 0 4.95-.041 6.005-.108 1.055-.08 1.574-.251 2.051-1.195.497-.933.748-2.569.748-5.415v-.01c0-2.86-.251-4.483-.749-5.426zM6.993 10.393V3.056l5.504 3.668-5.504 3.668z" fill="#101010"></path></svg>
                    </a>
                </div>
                <form action="https://new.pax.group/index.php?route=common/language/language" method="post" enctype="multipart/form-data" id="form-language">
                    <div class="menu__lang">
                        <a href="" class="this" onclick="$('#code').val('ru-ru'); setTimeout(function(){$('#form-language').submit();}, 100);">RU</a>
                        <a href="" onclick="$('#code').val('en-gb'); setTimeout(function(){$('#form-language').submit();}, 100);">EN</a>
                    </div>
                    <input type="hidden" name="code" id="code" value="">
                    <input type="hidden" name="redirect" value="https://new.pax.group/index.php?route=common/home">
                </form>

            </div>

        </div>

    </div>
