<?php
namespace Xety\Breadcrumbs;

use InvalidArgumentException;
use Xety\Configurator\Configurator;

class Breadcrumbs extends Configurator
{
    use BreadcrumbsTrait;

    /**
     * The array which will store all breadcrumbs.
     *
     * @var array
     */
    protected $breadcrumbs = [];

    /**
     * The default configuration.
     *
     * @var array
     */
    protected $defaultConfig = [
        // Whether to enable or not the `data-position` attribute.
        'position' => false,
        // The divider symbol between the crumbs or `null` to disable it.
        'divider' => null,
        'dividerElement' => 'span',
        'dividerElementClasses'=> [
            'divider'
        ],
        // The DOM-Element that wraps the breadcrumbs.
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
        // Classes applied to the current active breadcrumb.
        'listActiveElementClasses' => [
            'breadcrumb-item',
            'active'
        ]
    ];

    /**
     * The class constructor. Accepts an optional array of breadcrumbs, and an
     * optional array of options to configure the breadcrumbs.
     *
     * @param array $breadcrumbs The breadcrumbs to add.
     * @param array $options The option to set.
     */
    public function __construct(array $breadcrumbs = [], array $options = [])
    {
        $this->setConfig($this->defaultConfig);
        $this->addBreadcrumbs($breadcrumbs);

        if (!empty($options)) {
            $this->mergeConfig($options);
        }
    }

    /**
     * Add the breadcrumbs to the current list.
     *
     * @param array $breadcrumbs The breadcrumbs to add to the list.
     *
     * @throws \InvalidArgumentException When the breadcrumb is not well formated.
     *
     * @return \Xety\Breadcrumbs\Breadcrumbs
     */
    public function addBreadcrumbs(array $breadcrumbs = [])
    {
        foreach ($breadcrumbs as $breadcrumb) {
            $this->addCrumb(
                isset($breadcrumb['name']) ? $breadcrumb['name'] : '',
                isset($breadcrumb['href']) ? $breadcrumb['href'] : ''
            );
        }

        return $this;
    }

    /**
     * Add a crumb to the internal array.
     *
     * @param string $name The name of the crumb.
     * @param string $href The link of the crumb.
     *
     * @return \Xety\Breadcrumbs\Breadcrumbs
     */
    public function addCrumb(string $name = '', string $href = ''): Breadcrumbs
    {
        $breadcrumb = [
            'name' => $name,
            'href' => $href
        ];
        if (!$this->validateCrumb($breadcrumb)) {
            throw new InvalidArgumentException(
                'Breadcrumbs::addCrumb() only accepts correctly formatted arrays.'
            );
        }

        $crumb = [
            'name' => $name,
            'href' => $href
        ];

        $this->breadcrumbs[] = $crumb;

        return $this;
    }


    /**
     * Adds a crumb to the internal array.
     *
     * Alias for `Breadcrumbs::addCrumb` method.
     *
     * @param string $name The name of the crumb.
     * @param string $href The link of the crumb.
     *
     * @return \Xety\Breadcrumbs\Breadcrumbs
     */
    public function add($name = '', $href = ''): Breadcrumbs
    {
        return $this->addCrumb($name, $href);
    }


    /**
     * Check if the crumb is valide or not.
     *
     * @param array $crumb The crumb to validate.
     *
     * @return bool
     */
    protected function validateCrumb(array $crumb): bool
    {
        if (empty($crumb['name']) || empty($crumb['href'])) {
            return false;
        }

        return true;
    }

    /**
     * Get the currently breadcrumbs.
     *
     * @return array
     */
    public function getBreadcrumbs(): array
    {
        return $this->breadcrumbs;
    }

    /**
     * Gets the current amount of breadcrumbs.
     *
     * @return int
     */
    public function count(): int
    {
        return count($this->breadcrumbs);
    }

    /**
     * Get the first crumb.
     *
     * @return array
     */
    public function first(): array
    {
        if ($this->isEmpty()) {
            return [];
        }

        return reset($this->breadcrumbs);
    }

    /**
     * Get the first crumb formated.
     *
     * @return string
     */
    public function firstFormated(): string
    {
        if ($this->isEmpty()) {
            return '';
        }

        $crumb = reset($this->breadcrumbs);

        return $this->renderCrumb($crumb['name'], $crumb['href'], false, 1);
    }

    /**
     * Get the last crumb.
     *
     * @return array
     */
    public function last(): array
    {
        if ($this->isEmpty()) {
            return [];
        }

        return end($this->breadcrumbs);
    }

    /**
     * Get the last crumb formated.
     *
     * @return string
     */
    public function lastFormated(): string
    {
        if ($this->isEmpty()) {
            return '';
        }

        $crumb = end($this->breadcrumbs);

        return $this->renderCrumb($crumb['name'], $crumb['href'], false, 1);
    }

    /**
     * Checks whether there are any breadcrumbs added yet.
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->count() === 0;
    }

    /**
     * Removes all breadcrumbs.
     *
     * @return \Xety\Breadcrumbs\Breadcrumbs
     */
    public function clear()
    {
        $this->breadcrumbs = [];

        return $this;
    }

    /**
     * Render a crumb.
     *
     * @param string $name The text/HTML to render within the element.
     * @param string $href The link of the crumb.
     * @param bool $isLast Whether the crumb is the last item.
     * @param number $position The current position of the crumb.
     *
     * @return string
     */
    protected function renderCrumb($name, $href, $isLast = false, $position = null): string
    {
        $positionAttribute = '';
        if ($this->getOption('position')) {
            $positionAttribute = "data-position=\"{$position}\"";
        }

        if ($isLast) {
            $element = $this->getOption('listActiveElement');
            $classes = $this->getClasses('listActiveElementClasses');

            return "<{$element} {$positionAttribute} class=\"{$classes}\">{$name}</{$element}>";
        }
        $element = $this->getOption('listItemElement');
        $classes = $this->getClasses('listItemElementClasses');

        $divider = '';

        if ($this->getDivider() !== null) {
            $divider = $this->getDivider();
            $dividerElement = $this->getOption('dividerElement');
            $dividerClasses = $this->getClasses('dividerElementClasses');

            $divider = "<{$dividerElement} class=\"{$dividerClasses}\">{$divider}</{$dividerElement}>";
        }

        return "<{$element} {$positionAttribute} class=\"{$classes}\" href=\"{$href}\">{$name}</{$element}>{$divider}";
    }

    /**
     * Get the imploded classes for the given option.
     *
     * @param string $option The option where to get the classes from.
     * @param string $separator The separator used by the implode function.
     *
     * @return string
     */
    protected function getClasses(string $option, string $separator = ' '): string
    {
        return implode($separator, $this->getOption($option));
    }

    /**
     * Renders the crumbs.
     *
     * @return string
     */
    protected function renderCrumbs(): string
    {
        end($this->breadcrumbs);
        $lastKey = key($this->breadcrumbs);

        $output = '';

        $position = 1;

        foreach ($this->breadcrumbs as $key => $crumb) {
            $isLast = ($lastKey === $key);

            $href = $crumb['href'];

            // Add a slash when the URL is relative and does not contain a slash at the start.
            if (!preg_match('#^https?://.*#', $href) && mb_substr($href, 0, 1) !== '/') {
                $href = "/{$href}";
            }

            $output .= $this->renderCrumb($crumb['name'], $href, $isLast, $position);
            $position++;
        }

        return $output;
    }

    /**
     * Renders the complete breadcrumbs into HTML.
     *
     * @return string
     */
    public function render(): string
    {
        if (empty($this->breadcrumbs)) {
            return '';
        }

        $classes = $this->getClasses('listElementClasses');
        $element = $this->getOption('listElement');

        return "<{$element} class=\"{$classes}\">" . $this->renderCrumbs() . "</{$element}>";
    }

    /**
     * Can be used to render the breadcrumbs without using the function `render()` directly.
     *
     * Usage:
     * ```php
     * // Instead of:
     * echo $breadcrumbs->render();
     *
     * // It allow you to echo directly the instance:
     * echo $breadcrumbs;
     * ```
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->render();
    }
}
