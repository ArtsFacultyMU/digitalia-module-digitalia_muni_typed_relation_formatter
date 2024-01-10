<?php

namespace Drupal\digitalia_muni_typed_relation_formatter\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\Plugin\Field\FieldFormatter\EntityReferenceLabelFormatter;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'SubjectFormatter'.
 *
 * @FieldFormatter(
 *   id = "typed_relation_subject",
 *   label = @Translation("Typed Relation Subject Keyword"),
 *   field_types = {
 *     "typed_relation"
 *   }
 * )
 */
class SubjectFormatter extends EntityReferenceLabelFormatter {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = parent::viewElements($items, $langcode);

    foreach ($items as $delta => $item) {

      $rel_types = $item->getRelTypes();
      $rel_type = isset($rel_types[$item->rel_type]) ? $rel_types[$item->rel_type] : $item->rel_type;
      if (!empty($rel_type)) {
        $elements[$delta]['#prefix'] =  '';

      }
    }

    return $elements;
  }
}
