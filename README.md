# setara
Setara is a php class for hiding texts from simple view

__CAUTION: 
this is NOT strong encryption 
use this only for disabling simple view reading texts
not for encryption, this is not serious ^^__

## Instantiation
```pho
require __DIR__ . "/vendor/autoload.php";
use Novia713\Setara\Setara;

// Provide as argument a capitalized name of a 1st gen Pokemon
$setara = new Setara("Lapras");
```


## Hide

```php
$enc = $setara->enc($my_text);
```

## Reveal
```php
$setara->dec($my_text);
```
