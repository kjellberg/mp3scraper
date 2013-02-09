# mp3scraper

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum justo libero, venenatis vitae hendrerit at, vehicula vestibulum lectus. Duis mi neque, rutrum sit amet aliquam et, commodo ac dui. Fusce tellus mi, vulputate adipiscing ultrices at, ullamcorper id eros. Donec ultricies volutpat est, vitae bibendum purus sollicitudin eget.

## A Few Examples

### Start a new object and fetch a new URL.
```php
$mp3 = new mp3scraper('http://www.radiorecord.ru/radio/top100/detail.php?station=4901', true);
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
