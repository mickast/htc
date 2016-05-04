<?php
/**
 * Created by PhpStorm.
 * User: kmi
 * Date: 29.04.2016
 * Time: 15:58
 */
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
        <div class="title__title-text">
            <h1>Вывод таблицы товаров</h1>
        </div>

    </div>
    <div class="formResults">
        <label class="formResults__lbl">Выберите способ вывода данных</label>
        <form action="index1.php" method="post">
            <select size="1" name="change" class="formResults__change">
                <option>Вывести данные из CSV</option>
                <option>Вывести данные из БД</option>
            </select>
            <input type="submit" class="formResults__btn" name="formResults__btn" value="Вывести" />
        </form>
    </div>
    <div class="Results">
        <?php
        spl_autoload_register(function($class) {
            require $class.'.php';
        });
        if (!empty($_POST)){
            if($_POST['change'] == "Вывести данные из CSV"){
                $csv = new Csv("file.csv");
                $results = $csv->readCsv();
                $csv->printCsv($results);
                echo "ddd";
            }else{
                $db = new DB("localhost","intern_testmickast","intern_mickast","1234554321");
            }
        }
        ?>
    </div>
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