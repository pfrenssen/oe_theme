<?php

namespace Drupal\Tests\oe_theme\Behat;

use Behat\Behat\Context\Context;

/**
 * Class TransformationContext.
 */
class TransformationContext implements Context {

  /**
   * Mapping between human readable element labels and CSS selectors.
   *
   * @var array
   */
  private $elements = [];

  /**
   * Mapping between human readable page names and relative URLs.
   *
   * @var array
   */
  private $pages = [];

  /**
   * TransformationContext constructor.
   *
   * @param array $elements
   *   Page elements mapping.
   * @param array $pages
   *   Page URLs mappings.
   */
  public function __construct(array $elements, array $pages) {
    $this->elements = $elements;
    $this->pages = $pages;
  }

  /**
   * Transform element label into an CSS selector, if any.
   *
   * @Transform :tag
   */
  public function transformElement($label) {
    return isset($this->elements[$label]) ? $this->elements[$label] : $label;
  }

  /**
   * Transform page name into relative URL, if any.
   *
   * @Transform /^the ([A-za-z ]+) page$/
   */
  public function transformPageLabel($name) {
    return isset($this->pages[$name]) ? $this->pages[$name] : $name;
  }

}
