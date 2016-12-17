# 👁 setara 🙈
🙈 Setara is a php class for hiding texts from simple view

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
$setara->enc($my_string);
```

## Reveal
```php
$setara->dec($my_string);
```
## Explanation
This simply uses `chr()` and `ord()` to convert letters to numbers, using a Pokemon name as seed for displacement.

I would use this *only* for standard and common ascii letters.

## Examples
For example, "Hallo" string using "Bulbasaur" as Pokemon seed reads as `73 98 109 109 112`

"Hallo" string using "Mew" as Pokemon seed reads as `223 248 259 259 262`

This way you can't read the string on simple viw. That's it!
