# API

```php
$dot = new Bound1ess\Dot;


// This works perfectly.
$dot->add('path.to.element', 'some value');
// But this syntax is better:
$dot['another.path'] = 'another value';


// Here is what you can do.
isset ($dot['invalid.path']);
// But this works also:
$dot->exists('wrong.path');


// One way to do it.
$dot->get('path.to.element');
// Or just:
$dot['another.path'];


// Pretty readable.
unset ($dot['path.to.element']);
// But you can also write this:
$dot->remove('another.path');


// If you ever need the underlying array.
$dot->getArray();
```
