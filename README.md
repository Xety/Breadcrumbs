<h1 align="center">Breadcrumbs</h1>

|Travis|Coverage|Stable Version|Downloads|PHP|License|
|:-------:|:------:|:-------:|:------:|:-------:|:-------:|
|[![Build Status](https://img.shields.io/travis/Xety/Breadcrumbs.svg?style=flat-square)](https://travis-ci.org/Xety/Breadcrumbs)|[![Coverage Status](https://img.shields.io/coveralls/Xety/Breadcrumbs/master.svg?style=flat-square)](https://coveralls.io/r/Xety/Breadcrumbs)|[![Latest Stable Version](https://img.shields.io/packagist/v/Xety/Breadcrumbs.svg?style=flat-square)](https://packagist.org/packages/xety/breadcrumbs)|[![Total Downloads](https://img.shields.io/packagist/dt/xety/breadcrumbs.svg?style=flat-square)](https://packagist.org/packages/xety/breadcrumbs)|[![Laravel 5.4](https://img.shields.io/badge/PHP->=7.0-brightgreen.svg?style=flat-square)](https://travis-ci.org/Xety/Breadcrumbs)|[![License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](https://github.com/Xety/Breadcrumbs/blob/master/LICENSE)|

A breadcrumbs generator that use the Fluent pattern. This library is inspired by [creitive/breadcrumbs](https://github.com/creitive/breadcrumbs) but was fully rewritten to be fully customizable.

# Requirement
![PHP](https://img.shields.io/badge/PHP->=7.0-brightgreen.svg?style=flat-square)

# Installation
```sh
composer require xety/breadcrumbs
```

# Usage

### Instance
To use the Breadcrumbs class, you just need to instance it :
```php
use Xety\Breadcrumbs\Breadcrumbs;

$breadcrumbs = new Breadcrumbs;

// Or with breadcrumbs and options:
$breadcrumbs = new Breadcrumbs(
    [
        [
            'name' => 'Home',
            'href' => '/home'
        ],
        [
            'name' => 'Blog',
            'href' => '/blog'
        ]
    ],
    [
        'divider' => '|',
        'position' => true
    ]
);
```

### Output
To render your breadcrumbs, you can onvoke the function `render()` or directly "echoing" it:
```php
echo $breadcrumbs->render();

// Or, since this class implement the magic method `__toString()`,
// you can directly echo the instance :
echo $breadcrumbs;
```

#### Output examples:
This class is configured **by default** to render witht the Bootstrap 4 style. So with the above configuration, the output will look like that :
```html
<nav class="breadcrumb">
    <a data-position="1" class="breadcrumb-item" href="/home">Home</a>
    <span class="divider">|</span>
    <span data-position="2" class="breadcrumb-item active" href="/blog">Blog</span>
</nav>
```

Full featured example :
```php
$breadcrumbs = new Breadcrumbs(
    [
        [
            'name' => 'Home',
            'href' => '/home'
        ],
        [
            'name' => 'Blog',
            'href' => 'blog' // Note there is no `slash` here.
        ],
        [
            'name' => 'Test',
            'href' => 'http://xeta.io/blog/test'
        ],
        [
            'name' => 'Article',
            'href' => '/article'
        ]
    ],
    [
        'position' => true,
        'divider' => '#',
        'dividerElement' => 'li',
        'dividerElementClasses'=> [
            'custom',
            'divider'
        ],
        'listElement' => 'ul',
        'listElementClasses' => [
            'custom',
            'container'
        ],
        'listItemElement' => 'li',
        'listItemElementClasses' => [
            'custom',
            'item'
        ],
        'listActiveElement' => 'li',
        'listActiveElementClasses' => [
            'custom',
            'active'
        ]
    ]
);
```
Output :
```html
<ul class="custom container">
    <li data-position="1" class="custom item" href="/home">Home</li>
    <li class="custom divider">#</li>
    <li data-position="2" class="custom item" href="/blog">Blog</li> <!-- The slash has been automaticaly set by the class -->
    <li class="custom divider">#</li>
    <li data-position="3" class="custom item" href="http://xeta.io/blog/test">Test</li>
    <li class="custom divider">#</li>
    <li data-position="4" class="custom active">Article</li>
</ul>
```

# Options
This is the list of all available options and also all default options :
```php
[
    // Whether to enable or not the `data-position` attribute.
    'position' => false,
    // The divider symbol between the crumbs or `null` to disable it.
    'divider' => null,
    // The DOM-Element used to generate the divider element.
    'dividerElement' => 'span',
    // Classes applied to the item `dividerElement` element.
    'dividerElementClasses'=> [
        'divider'
    ],
    // The DOM-Element used to generate the container element.
    'listElement' => 'nav',
    // Classes applied to the main `listElement` container element.
    'listElementClasses' => [
        'breadcrumb'
    ],
    // The DOM-Element used to generate the list item.
    'listItemElement' => 'a',
    // Classes applied to the list item `listItemElement` element.
    'listItemElementClasses' => [
        'breadcrumb-item'
    ],
    // The DOM-Element used to generate the active list item.
    'listActiveElement' => 'span',
    // Classes applied to the active item `listActiveElement` element.
    'listActiveElementClasses' => [
        'breadcrumb-item',
        'active'
    ]
]
```

# Documentation
You can find all methods available with their documentation [here](https://github.com/Xety/Breadcrumbs/blob/master/docs/Breadcrumbs.md).

# Contribute
If you want to contribute, please [follow this guide](https://github.com/Xety/Breadcrumbs/blob/master/.github/CONTRIBUTING.md).