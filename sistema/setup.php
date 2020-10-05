<!DOCTYPE html>
<html>
    <head>
        <title>Creando bases de datos</title>
    </head>
    <body>

        <h3>Configurando ...</h3>

<?php //Example 26-3: setup.php
    require_once 'functions.php';

    createTable('members',
                'user VARCHAR(16),
                pass VARCHAR(16),
                money INT(99),
                INDEX(user(6))');

    createTable('profiles',
                'user VARCHAR(16),
                text VARCHAR(4096),
                INDEX(user(6))');

    createTable('products',
                'code INT(10) NOT NULL AUTO_INCREMENT,
                name TEXT,
                price DOUBLE,
                stock INT(5),
                description TEXT,
                detalles TEXT,
                img TEXT,
                button TEXT,
                PRIMARY KEY (code),
                INDEX(name(6))');

    queryMysql("INSERT INTO products (name, price, stock, description, detalles, img, button)
    VALUES('Silla', '300', '3', 'Silla antigüa en buen estado',
    'Silla del siglo XIII en muy buen estado', 'silla.png', 'Aquí iría el botón')");

    queryMysql("INSERT INTO products (name, price, stock, description, detalles, img, button)
    VALUES('Objetos varios', '1000', '1', 'Objetos del siglo XV, se vende todo junto',
    'Hay jarrones, un escritorio, lámparas, una maquina de escribir y una pintura', 'anti.png', 'Aquí iría el botón')");

    queryMysql("INSERT INTO products (name, price, stock, description, detalles, img, button)
    VALUES('Sofa', '750', '3', 'Sofá antiguo del siglo XIII restaurado',
    'Es un sofá de 2 x 1.5 metros', 'sofa.png', 'Aquí iría el botón')");

?>

        <br>... listo!.
        <br>
        <a class='nav-link' data-transition='slide' href='index.php'>Ir al sistema</a>
    </body>
</html>