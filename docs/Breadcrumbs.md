# Xety\Breadcrumbs\Breadcrumbs


## Methods

| Name | Description |
|------|-------------|
|[__construct](#breadcrumbsconstruct)|The class constructor. Accepts an optional array of breadcrumbs, and anoptional array of options to configure the breadcrumbs.|
|[__toString](#breadcrumbstostring)|Can be used to render the breadcrumbs without using the function `render()` directly.|
|[add](#breadcrumbsadd)|Adds a crumb to the internal array.|
|[addBreadcrumbs](#breadcrumbsaddbreadcrumbs)|Add the breadcrumbs to the current list.|
|[addCrumb](#breadcrumbsaddcrumb)|Add a crumb to the internal array.|
|[addDividerElementClasses](#breadcrumbsadddividerelementclasses)|Add a list of classes to the divider DOM Element.|
|[addListActiveElementClasses](#breadcrumbsaddlistactiveelementclasses)|Add a list of classes to the active DOM Element.|
|[addListElementClasses](#breadcrumbsaddlistelementclasses)|Add a list of classes to the container DOM Element.|
|[addListItemElementClasses](#breadcrumbsaddlistitemelementclasses)|Add a list of classes to the item DOM Element.|
|[clear](#breadcrumbsclear)|Removes all breadcrumbs.|
|[count](#breadcrumbscount)|Gets the current amount of breadcrumbs.|
|[first](#breadcrumbsfirst)|Get the first crumb.|
|[firstFormated](#breadcrumbsfirstformated)|Get the first crumb formated as HTML.|
|[getBreadcrumbs](#breadcrumbsgetbreadcrumbs)|Get the currently breadcrumbs.|
|[getDivider](#breadcrumbsgetdivider)|Get the divider currently in use.|
|[getDividerElement](#breadcrumbsgetdividerelement)|Get the divider DOM Element.|
|[getDividerElementClasses](#breadcrumbsgetdividerelementclasses)|Get the divider DOM Element classes.|
|[getListActiveElement](#breadcrumbsgetlistactiveelement)|Get the active DOM Element.|
|[getListActiveElementClasses](#breadcrumbsgetlistactiveelementclasses)|Get the active DOM Element classes.|
|[getListElement](#breadcrumbsgetlistelement)|Get the container DOM Element.|
|[getListElementClasses](#breadcrumbsgetlistelementclasses)|Get the container DOM Element classes.|
|[getListItemElement](#breadcrumbsgetlistitemelement)|Get the item DOM Element.|
|[getListItemElementClasses](#breadcrumbsgetlistitemelementclasses)|Get the item DOM Element classes.|
|[isEmpty](#breadcrumbsisempty)|Checks whether there are any breadcrumbs added yet.|
|[last](#breadcrumbslast)|Get the last crumb.|
|[lastFormated](#breadcrumbslastformated)|Get the last crumb formated as HTML.|
|[removeDividerElementClasses](#breadcrumbsremovedividerelementclasses)|Remove a list of classes to the divider DOM Element.|
|[removeListActiveElementClasses](#breadcrumbsremovelistactiveelementclasses)|Remove a list of classes to the active DOM Element.|
|[removeListElementClasses](#breadcrumbsremovelistelementclasses)|Remove a list of classes to the container DOM Element.|
|[removeListItemElementClasses](#breadcrumbsremovelistitemelementclasses)|Remove a list of classes to the item DOM Element.|
|[render](#breadcrumbsrender)|Renders the complete breadcrumbs into HTML.|
|[setDivider](#breadcrumbssetdivider)|Sets the divider which will be printed between the breadcrumbs.|
|[setDividerElement](#breadcrumbssetdividerelement)|Set the divider list DOM Element.|
|[setDividerElementClasses](#breadcrumbssetdividerelementclasses)|Set the divider DOM Element classes.|
|[setListActiveElement](#breadcrumbssetlistactiveelement)|Set the active DOM Element.|
|[setListActiveElementClasses](#breadcrumbssetlistactiveelementclasses)|Set the active DOM Element classes.|
|[setListElement](#breadcrumbssetlistelement)|Set the container list DOM Element.|
|[setListElementClasses](#breadcrumbssetlistelementclasses)|Set the container DOM Element classes.|
|[setListItemElement](#breadcrumbssetlistitemelement)|Set the item DOM Element.|
|[setListItemElementClasses](#breadcrumbssetlistitemelementclasses)|Set the item DOM Element classes.|

### Breadcrumbs::__construct
```php
public __construct (array $breadcrumbs, array $options)
```

**Description**

The class constructor. Accepts an optional array of breadcrumbs, and an
optional array of options to configure the breadcrumbs.


**Parameters**

* `(array) $breadcrumbs` : The breadcrumbs to add.
* `(array) $options` : The options to set.

**Return Values**




### Breadcrumbs::__toString
```php
public __toString (void)
```

**Description**

Can be used to render the breadcrumbs without using the function `render()` directly.
Usage:
```php
// Instead of:
echo $breadcrumbs->render();

// It allow you to echo directly the instance:
echo $breadcrumbs;
```

**Parameters**

`This function has no parameters.`


**Return Values**

`string`





### Breadcrumbs::add
```php
public add (string $name, string $href)
```

**Description**

Adds a crumb to the internal array.
Alias for `Breadcrumbs::addCrumb` method.

**Parameters**

* `(string) $name` : The name of the crumb.
* `(string) $href` : The link of the crumb.

**Return Values**

`\Xety\Breadcrumbs\Breadcrumbs`





### Breadcrumbs::addBreadcrumbs
```php
public addBreadcrumbs (array $breadcrumbs)
```

**Description**

Add the breadcrumbs to the current list.


**Parameters**

* `(array) $breadcrumbs` : The breadcrumbs to add to the list.

**Return Values**

`\Xety\Breadcrumbs\Breadcrumbs`





### Breadcrumbs::addCrumb
```php
public addCrumb (string $name, string $href)
```

**Description**

Add a crumb to the internal array.


**Parameters**

* `(string) $name` : The name of the crumb.
* `(string) $href` : The link of the crumb.

**Return Values**

`\Xety\Breadcrumbs\Breadcrumbs`





### Breadcrumbs::addDividerElementClasses
```php
public addDividerElementClasses (array|string $classes)
```

**Description**

Add a list of classes to the divider DOM Element.


**Parameters**

* `(array|string) $classes` : The classes to add.

**Return Values**

`\Xety\Breadcrumbs\Breadcrumbs`





### Breadcrumbs::addListActiveElementClasses
```php
public addListActiveElementClasses (array|string $classes)
```

**Description**

Add a list of classes to the active DOM Element.


**Parameters**

* `(array|string) $classes` : The classes to add.

**Return Values**

`\Xety\Breadcrumbs\Breadcrumbs`





### Breadcrumbs::addListElementClasses
```php
public addListElementClasses (array|string $classes)
```

**Description**

Add a list of classes to the container DOM Element.


**Parameters**

* `(array|string) $classes` : The classes to add.

**Return Values**

`\Xety\Breadcrumbs\Breadcrumbs`





### Breadcrumbs::addListItemElementClasses
```php
public addListItemElementClasses (array|string $classes)
```

**Description**

Add a list of classes to the item DOM Element.


**Parameters**

* `(array|string) $classes` : The classes to add.

**Return Values**

`\Xety\Breadcrumbs\Breadcrumbs`





### Breadcrumbs::clear
```php
public clear (void)
```

**Description**

Remove all breadcrumbs.


**Parameters**

`This function has no parameters.`


**Return Values**

`\Xety\Breadcrumbs\Breadcrumbs`





### Breadcrumbs::count
```php
public count (void)
```

**Description**

Gets the current amount of breadcrumbs.


**Parameters**

`This function has no parameters.`


**Return Values**

`int`





### Breadcrumbs::first
```php
public first (void)
```

**Description**

Get the first crumb.


**Parameters**

`This function has no parameters.`


**Return Values**

`array`





### Breadcrumbs::firstFormated
```php
public firstFormated (void)
```

**Description**

Get the first crumb formated as HTML.


**Parameters**

`This function has no parameters.`


**Return Values**

`string`





### Breadcrumbs::getBreadcrumbs
```php
public getBreadcrumbs (void)
```

**Description**

Get the currently breadcrumbs.


**Parameters**

`This function has no parameters.`


**Return Values**

`array`





### Breadcrumbs::getDivider
```php
public getDivider (void)
```

**Description**

Get the divider currently in use.


**Parameters**

`This function has no parameters.`


**Return Values**

`string|null`





### Breadcrumbs::getDividerElement
```php
public getDividerElement (void)
```

**Description**

Get the divider DOM Element.


**Parameters**

`This function has no parameters.`


**Return Values**

`string`





### Breadcrumbs::getDividerElementClasses
```php
public getDividerElementClasses (void)
```

**Description**

Get the divider DOM Element classes.


**Parameters**

`This function has no parameters.`


**Return Values**

`array`





### Breadcrumbs::getListActiveElement
```php
public getListActiveElement (void)
```

**Description**

Get the active DOM Element.


**Parameters**

`This function has no parameters.`


**Return Values**

`array`





### Breadcrumbs::getListActiveElementClasses
```php
public getListActiveElementClasses (void)
```

**Description**

Get the active DOM Element classes.


**Parameters**

`This function has no parameters.`


**Return Values**

`array`





### Breadcrumbs::getListElement
```php
public getListElement (void)
```

**Description**

Get the container DOM Element.


**Parameters**

`This function has no parameters.`


**Return Values**

`string`





### Breadcrumbs::getListElementClasses
```php
public getListElementClasses (void)
```

**Description**

Get the container DOM Element classes.


**Parameters**

`This function has no parameters.`


**Return Values**

`array`





### Breadcrumbs::getListItemElement
```php
public getListItemElement (void)
```

**Description**

Get the item DOM Element.


**Parameters**

`This function has no parameters.`


**Return Values**

`array`





### Breadcrumbs::getListItemElementClasses
```php
public getListItemElementClasses (void)
```

**Description**

Get the item DOM Element classes.


**Parameters**

`This function has no parameters.`


**Return Values**

`array`





### Breadcrumbs::isEmpty
```php
public isEmpty (void)
```

**Description**

Checks whether there are any breadcrumbs added yet.


**Parameters**

`This function has no parameters.`


**Return Values**

`bool`





### Breadcrumbs::last
```php
public last (void)
```

**Description**

Get the last crumb.


**Parameters**

`This function has no parameters.`


**Return Values**

`array`





### Breadcrumbs::lastFormated
```php
public lastFormated (void)
```

**Description**

Get the last crumb formated as HTML.


**Parameters**

`This function has no parameters.`


**Return Values**

`string`





### Breadcrumbs::removeDividerElementClasses
```php
public removeDividerElementClasses (array|string $classes)
```

**Description**

Remove a list of classes to the divider DOM Element.


**Parameters**

* `(array|string) $classes` : The classes to remove.

**Return Values**

`\Xety\Breadcrumbs\Breadcrumbs`





### Breadcrumbs::removeListActiveElementClasses
```php
public removeListActiveElementClasses (array|string $classes)
```

**Description**

Remove a list of classes to the active DOM Element.


**Parameters**

* `(array|string) $classes` : The classes to remove.

**Return Values**

`\Xety\Breadcrumbs\Breadcrumbs`





### Breadcrumbs::removeListElementClasses
```php
public removeListElementClasses (array|string $classes)
```

**Description**

Remove a list of classes to the container DOM Element.


**Parameters**

* `(array|string) $classes` : The classes to remove.

**Return Values**

`\Xety\Breadcrumbs\Breadcrumbs`





### Breadcrumbs::removeListItemElementClasses
```php
public removeListItemElementClasses (array|string $classes)
```

**Description**

Remove a list of classes to the item DOM Element.


**Parameters**

* `(array|string) $classes` : The classes to remove.

**Return Values**

`\Xety\Breadcrumbs\Breadcrumbs`





### Breadcrumbs::render
```php
public render (void)
```

**Description**

Renders the complete breadcrumbs into HTML.


**Parameters**

`This function has no parameters.`


**Return Values**

`string`





### Breadcrumbs::setDivider
```php
public setDivider (string|null $divider)
```

**Description**

Sets the divider which will be printed between the breadcrumbs.
If set to `null`, the divider won't be printed at all.

**Parameters**

* `(string|null) $divider` : The divider used to separe the breadcrumbs.

**Return Values**

`\Xety\Breadcrumbs\Breadcrumbs`





### Breadcrumbs::setDividerElement
```php
public setDividerElement (string $element)
```

**Description**

Set the divider list DOM Element.


**Parameters**

* `(string) $element` : The Element to set.

**Return Values**

`\Xety\Breadcrumbs\Breadcrumbs`





### Breadcrumbs::setDividerElementClasses
```php
public setDividerElementClasses (array|string $classes)
```

**Description**

Set the divider DOM Element classes.


**Parameters**

* `(array|string) $classes` : The classes to set.

**Return Values**

`\Xety\Breadcrumbs\Breadcrumbs`





### Breadcrumbs::setListActiveElement
```php
public setListActiveElement (string $element)
```

**Description**

Set the active DOM Element.


**Parameters**

* `(string) $element` : The Element to set.

**Return Values**

`\Xety\Breadcrumbs\Breadcrumbs`





### Breadcrumbs::setListActiveElementClasses
```php
public setListActiveElementClasses (array|string $classes)
```

**Description**

Set the active DOM Element classes.


**Parameters**

* `(array|string) $classes` : The classes to set.

**Return Values**

`\Xety\Breadcrumbs\Breadcrumbs`





### Breadcrumbs::setListElement
```php
public setListElement (string $element)
```

**Description**

Set the container list DOM Element.


**Parameters**

* `(string) $element` : The Element to set.

**Return Values**

`\Xety\Breadcrumbs\Breadcrumbs`





### Breadcrumbs::setListElementClasses
```php
public setListElementClasses (array|string $classes)
```

**Description**

Set the container DOM Element classes.


**Parameters**

* `(array|string) $classes` : The classes to set.

**Return Values**

`\Xety\Breadcrumbs\Breadcrumbs`





### Breadcrumbs::setListItemElement
```php
public setListItemElement (string $element)
```

**Description**

Set the item DOM Element.


**Parameters**

* `(string) $element` : The Element to set.

**Return Values**

`\Xety\Breadcrumbs\Breadcrumbs`





### Breadcrumbs::setListItemElementClasses
```php
public setListItemElementClasses (array|string $classes)
```

**Description**

Set the item DOM Element classes.


**Parameters**

* `(array|string) $classes` : The classes to set.

**Return Values**

`\Xety\Breadcrumbs\Breadcrumbs`




