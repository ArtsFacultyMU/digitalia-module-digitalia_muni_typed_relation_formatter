<?php

namespace Drupal\digitalia_muni_typed_relation_formatter\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\Plugin\Field\FieldFormatter\EntityReferenceLabelFormatter;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'ContributorFormatter'.
 *
 * @FieldFormatter(
 *   id = "typed_relation_contributor",
 *   label = @Translation("Typed Relation Contributor"),
 *   field_types = {
 *     "typed_relation"
 *   }
 * )
 */
class ContributorFormatter extends EntityReferenceLabelFormatter {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = parent::viewElements($items, $langcode);

    foreach ($items as $delta => $item) {

      $rel_types = $item->getRelTypes();
      $rel_type = isset($rel_types[$item->rel_type]) ? $rel_types[$item->rel_type] : $item->rel_type;
      if (!empty($rel_type)) {
        $elements[$delta]['#plain_text'] =  $elements[$delta]['#plain_text'] . ' (' . t($rel_type) . ')';

      }
    }

    return $elements;
  }
}
