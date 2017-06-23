<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Главная</title>
    <link href="/views/layouts/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">CRM</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="/">Главная</a></li>
            <li><a href="/worker/add">Добавить сотрудника</a></li>
            <li><a href="/salary/">Зарплата</a></li>
            <li><a href="/course/">Курс</a></li>
        </ul>
    </div>
</nav>
    <?php include 'views/' . $viewName . '.php'; ?>
</body>
</html>