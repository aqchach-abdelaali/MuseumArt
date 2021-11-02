<?php

use Symfony\Component\Dotenv\Dotenv;

require dirname(__DIR__).'/vendor/autoload.php';

if (file_exists(dirname(__DIR__).'/config/bootstrap.php')) {
    require dirname(__DIR__).'/config/bootstrap.php';
} elseif (method_exists(Dotenv::class, 'bootEnv')) {
    (new Dotenv())->bootEnv(dirname(__DIR__).'/.env');
}
echo "\n============================================\n";
echo "Reset database...\n\n";
passthru(sprintf(
    'php "%s/../bin/console" doctrine:database:drop --env=test --force --no-interaction',
    __DIR__
));
echo "---- Done----\n\n";
echo "=========================================\n";
echo "Creating database...\n\n";
passthru(sprintf(
    'php "%s/../bin/console" doctrine:database:create --env=test --no-interaction',
    __DIR__
));
echo "Executing migrations...\n\n";
passthru(sprintf(
    'php "%s/../bin/console" doctrine:migrations:migrate --env=test --no-interaction',
    __DIR__
));

echo "Loading fixtures...\n\n";
passthru(sprintf(
    'php "%s/../bin/console" doctrine:fixtures:load --env=test --no-interaction',
    __DIR__
));

echo "---- Done ----\n\n";
echo "======================\n";
echo "Run tests...\n\n";
