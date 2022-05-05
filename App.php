<?php

class App
{
    public static function init(): void
    {
        spl_autoload_register(function ($class) {
            $file = str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';
            if (file_exists($file)) {
                require $file;
                return true;
            }
            return false;
        });

        set_exception_handler(['App', 'handleException']);
    }

    public static function handleException(Throwable $e): void
    {
        print 'ERROR: ' . $e->getMessage() . PHP_EOL
            . ' file ' . $e->getFile() . PHP_EOL
            . ' line ' . $e->getLine() . PHP_EOL;
    }
}
