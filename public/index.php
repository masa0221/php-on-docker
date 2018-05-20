<?php
// 
// Write code for bootstrap.
// 

require __DIR__.'/../vendor/autoload.php';

echo 'Hello PHP!'.PHP_EOL;

// MySQL
try {
    $handler = new PDO(
        sprintf(
            'mysql:host=%s;dbname=%s;charset=utf8',
            $_SERVER['DATABASE_HOST'],
            $_SERVER['MYSQL_DATABASE']
        ),
        $_SERVER['MYSQL_USER'],
        $_SERVER['MYSQL_PASSWORD']
    );
    $sql = 'SHOW TABLES;';
    $statement = $handler->prepare($sql);
    $statement->execute();
    echo "Executed SQL '$sql'. Results: ";
    var_dump($statement->fetchAll());
    echo PHP_EOL;
} catch (\PDOException $e) {
    exit($e->getMessage());
}

// Redis
try {
    $client = new Predis\Client([
        'scheme' => 'tcp',
        'host'   => $_SERVER['REDIS_HOST'],
        'port'   => 6379,
    ]);
    $redis_key = 'foo';
    $client->set($redis_key, 'Hello, Redis!');

    echo $client->get($redis_key).PHP_EOL;
} catch (Predis\PredisException $e) {
    exit($e->getMessage());
}
