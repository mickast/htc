<?php
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Сферический сайт</title>
    <link href="css/reset.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<header class="header">
    <div class="wrapp">
        <nav class="header__nav">
            <a href="index1.php" class="nav__a">Главная</a>
            <a href="#" class="nav__a">Не особо</a>
            <a href="#" class="nav__a">Вообще нет</a>
            <a href="addProduct.php" class="nav__a">Добавление товара</a>
        </nav>
        <div class="search search--header">
            <input class="search__input" type="text" placeholder="Поиск"/>
        </div>
    </div>

</header>
<div class="wrapper">
    <div class="name">
        <div class="name__logo">
            <img src="images/logo.png" alt="Логотип" class="name__logo--position"/>
        </div>
        <div class="name__title">
            <span class="name__title--text">
                Сферический <br/>
                Сайт<br/>
            </span>
                <span class="name__title--subtext">
                    в вакууме
                </span>
        </div>
    </div>
    <div class="title">
        <nav class="crumbs">
            <a href="#" class="crumbs__link"><span class="crumbs__text">Главная</span></a>
            <a href="#" class="crumbs__link"><span class="crumbs__text">Сферические товары</span></a>
        </nav>
        <div class="title__title-text">
            <h1>Добавление сферического товара</h1>
        </div>
        <div class="status">
            <?php

            if (!empty($_POST)) {

                if (!$_POST['named'] || !$_POST['code'] || !$_POST['category'] || !$_POST['check'] || !$_POST['area']){
                    echo "<p class=\"status__warning\">Не все поля заполнены!</p>";
                } else{
                    require_once "dataSaver.php";
                    echo "<p class=\"status__success\">Данные успешно добавлены!</p>";
                }
            }
            ?>
        </div>
    </div>
    <form action="/test/addProduct.php" method="post">
        <div class="form__name">
            <label class="form__lbl">Наименование</label><input type="text" name="named" class="form__name--inp"/>
        </div>
        <div class="form__code">
            <label class="form__lbl">Код товара</label><input type="text" name="code" class="form__code--inp"/>
        </div>
        <div class="form__category">
            <label class="form__lbl">Категория товара</label>
            <select size="1" name="category" class="form__category--inp">
                <option>Товары сферические вакуумные</option>
                <option>Твары сферические веселые</option>
                <option>Твары сферические скучные</option>
            </select>
        </div>
        <div class="form__check">
            <input type="hidden" name="check" value="No" />
            <input type="checkbox" id="check" name="check" class="form__check--inp"/><label for="check" class="form__lbl">Популярный
            товар</label>
        </div>
        <div class="form__area">
            <label class="form__lbl">Описание товара</label><textarea type="text" rows="11" cols="63"
                                                                                  style="resize: none;"
                                                                                  class="form__area--inp"
                                                                                  name="area"></textarea>
        </div>
        <input type="submit" class="form__btn" name="btn" value="Добавить" />
    </form>
</div>
<div class="footer">
    <div class="wrapp">
        <nav class="footer__nav">
            <a href="#">Поиск</a>
            <a href="#">Карта сайта</a>
        </nav>
        <div class="footer__copyright">
            © Horns & Hooves, 2014
        </div>
    </div>
</div>
</body>
</html>