<?php
namespace Xety\Breadcrumbs;

use InvalidArgumentException;

trait BreadcrumbsTrait
{
    /**
     * A list of DOM Element allowed to set as divider Element.
     *
     * @var array
     */
    protected $allowedDividerElement = [
        'a', 'li', 'span', 'dt', 'dd'
    ];

    /**
     * A list of DOM Element allowed to set as container Element.
     *
     * @var array
     */
    protected $allowedListElement = [
        'nav', 'ul', 'ol', 'dl'
    ];

    /**
     * A list of DOM Element allowed to be set as item Element.
     *
     * @var array
     */
    protected $allowedListItemElement = [
        'a', 'li', 'span', 'dt', 'dd'
    ];

    /**
     * A list of DOM Element allowed to be set as active Element.
     *
     * @var array
     */
    protected $allowedListActiveElement = [
        'a', 'li', 'span', 'dt', 'dd'
    ];

    /**
     * Sets the divider which will be printed between the breadcrumbs.
     *
     * If set to `null`, the divider won't be printed at all.
     *
     * @param string|null $divider The divider used to separe the breadcrumbs.
     *
     * @return \Xety\Breadcrumbs\Breadcrumbs
     */
    public function setDivider($divider = '/'): Breadcrumbs
    {
        if (!is_string($divider) && !is_null($divider)) {
            throw new InvalidArgumentException('Breadcrumbs::setDivider() only accepts strings or NULL');
        }
        $this->setOption('divider', $divider);

        return $this;
    }

    /**
     * Get the divider currently in use.
     *
     * @return string|null
     */
    public function getDivider()
    {
        return $this->getOption('divider');
    }

    /**
     * Set the divider list DOM Element.
     *
     * @param string $element The Element to set.
     *
     * @return \Xety\Breadcrumbs\Breadcrumbs
     */
    public function setDividerElement(string $element): Breadcrumbs
    {
        $this->validateElement('allowedDividerElement', $element);

        $this->setOption('dividerElement', $element);

        return $this;
    }

    /**
     * Get the divider DOM Element.
     *
     * @return string
     */
    public function getDividerElement(): string
    {
        return $this->getOption('dividerElement');
    }

    /**
     * Set the divider DOM Element classes.
     *
     * @param array|string $classes The classes to set.
     *
     * @return \Xety\Breadcrumbs\Breadcrumbs
     */
    public function setDividerElementClasses($classes): Breadcrumbs
    {
        return $this->setElementClasses('dividerElementClasses', $classes);
    }

    /**
     * Get the divider DOM Element classes.
     *
     * @return array
     */
    public function getDividerElementClasses(): array
    {
        return $this->getElementClasses('dividerElementClasses');
    }

    /**
     * Add a list of classes to the divider DOM Element.
     *
     * @param array|string $classes The classes to add.
     *
     * @return \Xety\Breadcrumbs\Breadcrumbs
     */
    public function addDividerElementClasses($classes): Breadcrumbs
    {
        return $this->addElementClasses('dividerElementClasses', $classes);
    }

    /**
     * Remove a list of classes to the divider DOM Element.
     *
     * @param array|string $classes The classes to remove.
     *
     * @return \Xety\Breadcrumbs\Breadcrumbs
     */
    public function removeDividerElementClasses($classes): Breadcrumbs
    {
        return $this->removeElementClasses('dividerElementClasses', $classes);
    }

    /**
     * Set the container list DOM Element.
     *
     * @param string $element The Element to set.
     *
     * @return \Xety\Breadcrumbs\Breadcrumbs
     */
    public function setListElement(string $element): Breadcrumbs
    {
        $this->validateElement('allowedListElement', $element);

        $this->setOption('listElement', $element);

        return $this;
    }

    /**
     * Get the container DOM Element.
     *
     * @return string
     */
    public function getListElement(): string
    {
        return $this->getOption('listElement');
    }

    /**
     * Set the container DOM Element classes.
     *
     * @param array|string $classes The classes to set.
     *
     * @return \Xety\Breadcrumbs\Breadcrumbs
     */
    public function setListElementClasses($classes): Breadcrumbs
    {
        return $this->setElementClasses('listElementClasses', $classes);
    }

    /**
     * Get the container DOM Element classes.
     *
     * @return array
     */
    public function getListElementClasses(): array
    {
        return $this->getElementClasses('listElementClasses');
    }

    /**
     * Add a list of classes to the container DOM Element.
     *
     * @param array|string $classes The classes to add.
     *
     * @return \Xety\Breadcrumbs\Breadcrumbs
     */
    public function addListElementClasses($classes): Breadcrumbs
    {
        return $this->addElementClasses('listElementClasses', $classes);
    }

    /**
     * Remove a list of classes to the container DOM Element.
     *
     * @param array|string $classes The classes to remove.
     *
     * @return \Xety\Breadcrumbs\Breadcrumbs
     */
    public function removeListElementClasses($classes): Breadcrumbs
    {
        return $this->removeElementClasses('listElementClasses', $classes);
    }

    /**
     * Set the item DOM Element.
     *
     * @param string $element The Element to set.
     *
     * @return \Xety\Breadcrumbs\Breadcrumbs
     */
    public function setListItemElement(string $element): Breadcrumbs
    {
        $this->validateElement('allowedListItemElement', $element);

        $this->setOption('listItemElement', $element);

        return $this;
    }

    /**
     * Get the item DOM Element.
     *
     * @return array
     */
    public function getListItemElement(): string
    {
        return $this->getOption('listItemElement');
    }

    /**
     * Set the item DOM Element classes.
     *
     * @param array|string $classes The classes to set.
     *
     * @return \Xety\Breadcrumbs\Breadcrumbs
     */
    public function setListItemElementClasses($classes): Breadcrumbs
    {
        return $this->setElementClasses('listItemElementClasses', $classes);
    }

    /**
     * Get the item DOM Element classes.
     *
     * @return array
     */
    public function getListItemElementClasses(): array
    {
        return $this->getElementClasses('listItemElementClasses');
    }

    /**
     * Add a list of classes to the item DOM Element.
     *
     * @param array|string $classes The classes to add.
     *
     * @return \Xety\Breadcrumbs\Breadcrumbs
     */
    public function addListItemElementClasses($classes): Breadcrumbs
    {
        return $this->addElementClasses('listItemElementClasses', $classes);
    }

    /**
     * Remove a list of classes to the item DOM Element.
     *
     * @param array|string $classes The classes to remove.
     *
     * @return \Xety\Breadcrumbs\Breadcrumbs
     */
    public function removeListItemElementClasses($classes): Breadcrumbs
    {
        return $this->removeElementClasses('listItemElementClasses', $classes);
    }

    /**
     * Set the active DOM Element.
     *
     * @param string $element The Element to set.
     *
     * @return \Xety\Breadcrumbs\Breadcrumbs
     */
    public function setListActiveElement(string $element): Breadcrumbs
    {
        $this->validateElement('allowedListActiveElement', $element);

        $this->setOption('listActiveElement', $element);

        return $this;
    }

    /**
     * Get the active DOM Element.
     *
     * @return array
     */
    public function getListActiveElement(): string
    {
        return $this->getOption('listActiveElement');
    }

    /**
     * Set the active DOM Element classes.
     *
     * @param array|string $classes The classes to set.
     *
     * @return \Xety\Breadcrumbs\Breadcrumbs
     */
    public function setListActiveElementClasses($classes): Breadcrumbs
    {
        return $this->setElementClasses('listActiveElementClasses', $classes);
    }

    /**
     * Get the active DOM Element classes.
     *
     * @return array
     */
    public function getListActiveElementClasses(): array
    {
        return $this->getElementClasses('listActiveElementClasses');
    }

    /**
     * Add a list of classes to the active DOM Element.
     *
     * @param array|string $classes The classes to add.
     *
     * @return \Xety\Breadcrumbs\Breadcrumbs
     */
    public function addListActiveElementClasses($classes): Breadcrumbs
    {
        return $this->addElementClasses('listActiveElementClasses', $classes);
    }

    /**
     * Remove a list of classes to the active DOM Element.
     *
     * @param array|string $classes The classes to remove.
     *
     * @return \Xety\Breadcrumbs\Breadcrumbs
     */
    public function removeListActiveElementClasses($classes): Breadcrumbs
    {
        return $this->removeElementClasses('listActiveElementClasses', $classes);
    }

    /**
     * Set the classes to the given option type.
     *
     * @param string $option The option from where we must set the classes.
     * @param string|array $classes The classes to set.
     *
     * @return \Xety\Breadcrumbs\Breadcrumbs
     */
    protected function setElementClasses(string $option, $classes): Breadcrumbs
    {
        if (is_string($classes)) {
            $classes = explode(' ', $classes);
        }
        $this->validateClasses($classes);

        $this->setOption($option, array_unique($classes));

        return $this;
    }

    /**
     * Get the classes related to the option type.
     *
     * @param string $option The option from where we must get the classes.
     *
     * @return array
     */
    protected function getElementClasses(string $option): array
    {
        if ($this->hasOption($option)) {
            return $this->getOption($option);
        }

        return [];
    }

    /**
     * Add one or more CSS classes related to the option type.
     *
     * @param string $option The option from where we must add the classes.
     * @param string|array $classes The classes to add.
     *
     * @return \Xety\Breadcrumbs\Breadcrumbs
     */
    protected function addElementClasses(string $option, $classes): Breadcrumbs
    {
        if (is_string($classes)) {
            $classes = explode(' ', $classes);
        }
        $this->validateClasses($classes);

        $classes = array_merge(
            $this->getOption($option),
            $classes
        );
        $this->setOption($option, array_unique($classes));

        return $this;
    }

    /**
     * Remove one or more CSS classes related to the option type.
     *
     * @param string $option The option from where we must remove the classes.
     * @param string|array $classes The classes to remove.
     *
     * @return \Xety\Breadcrumbs\Breadcrumbs
     */
    protected function removeElementClasses(string $option, $classes): Breadcrumbs
    {
        if (is_string($classes)) {
            $classes = explode(' ', $classes);
        }
        $this->validateClasses($classes);

        $classes = array_diff(
            $this->getOption($option),
            $classes
        );
        $this->setOption($option, array_unique($classes));

        return $this;
    }

    /**
     * Validate an Element before saving it.
     *
     * @param string $type The type from where we must validate the Element.
     * @param string $element The Element to validate.
     *
     * @throws \InvalidArgumentException When the validation fail.
     *
     * @return void
     */
    protected function validateElement(string $type, string $element)
    {
        if (!in_array($element, $this->{$type})) {
            $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)[1]['function'];

            throw new InvalidArgumentException("Breadcrumbs::{$trace} was passed \"$element\", but " .
            "this is not a valid element. Allowed list : " . implode(' ', $this->{$type}));
        }
    }

    /**
     * Validate the classes to ensure they have the right format.
     *
     * @param array $classes The classes to validate.
     *
     * @throws \InvalidArgumentException When the classes is not an array or a string.
     *          Or when the class name is not a string.
     *
     * @return void
     */
    protected function validateClasses($classes)
    {
        if (!is_array($classes)) {
            $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 3)[2]['function'];

            throw new InvalidArgumentException("Breadcrumbs::{$trace}() only accepts strings or arrays.");
        }

        foreach ($classes as $key => $class) {
            if (!is_string($class)) {
                $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 3)[2]['function'];

                throw new InvalidArgumentException(
                    "Breadcrumbs::{$trace}() was passed an array, but at least one of the values " .
                    "was not a string: \$classes['{$key}'] = " . print_r($class, true)
                );
            }
        }
    }
}
