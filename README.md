# mp3scraper


## A Few Examples

### Start a new object and fetch a new URL.
```php
$mp3 = new mp3scraper('http://history.radiorecord.ru/?station=club&day=today', true);
```

### Set download directory with trailing slash. (default: downloads/)
```php
$mp3->directory('downloads/');
```

### Do it..
```php
$mp3->download();
```

### All together..
```php
// Fetch a new URL.
$mp3 = new mp3scraper('http://www.radiorecord.ru/radio/top100/detail.php?station=4901', true);

// Set download directory with trailing slash. (default: downloads/)
$mp3->directory('downloads/');

// Do it..
$mp3->download();
```
