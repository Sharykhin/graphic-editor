Requirements:
-------------

php 7.0

Installation:
-------------

Run generating autoload file:

```
php composer.phar dump-autoload
```

Usage:
------

To get available response type use --help option:

```
php app/index.php --help
```

For running a command *--output* parameter is required:  
There are 2 output formats available: *array* and *file*

Examples:
```
php app/index.php --output array
php app/index.php --output file
```