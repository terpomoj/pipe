# 🚇 `Terpomoj/Pipe`

This is an alternatives to the declined [PHP Pipe Operator RFC](https://wiki.php.net/rfc/pipe-operator-v2).

The idea was [first introduced by Taylor Otwell on Twitter](https://twitter.com/taylorotwell/status/1413133237250105344?s=21&t=di9D3ZFk5frnmdRlJ26OoA). I added some feature, such as directly call the function on the piping value, and directly accessing attribute of the piping value. 

## Usage Examples

### Basic Usage
```php
pipe('test@example.com')
    (md5(...))
    (fn ($md5) => 'https://gravatar.com/avatar/' . $md5)
    ->endpipe;
```

### Accessing Object Attribute
```php
pipe('test@example.com')
    (GravatarUrl::make(...))
    ->url // `url` is an attribute of GravatarUrl
    ->endpipe;
```

### Calling Object Method
```php
pipe('test@example.com')
    (GravatarUrl::make(...))
    ->size(200) // `size` is a method of GravatarUrl
    ->endpipe;
```

## License

MIT License
