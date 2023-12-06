<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <?php
        if( isset($css) && !empty($css)){
            echo '<link rel="stylesheet" href="css/',$css,'">';
        }
        if( isset($script) && !empty($script)){
            echo $script;
        }
    ?>
    <title>檸檬堂販売サイト</title>
</head>
<body>
    <div id="app" class="has-background-grey-lighter">
        <div class="tabs is-left">
            <ul>
                <li
                v-for="(item, i) in menus"
                :key="i"
                class="menu-item"
                :class="item.highlighted"
                ><a :href="item.path">{{ item.label }}</a></li>
            </ul>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="script/nav.js"></script>
<?php require 'footer.php'; ?>
