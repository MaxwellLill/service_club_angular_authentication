<?php

namespace Drupal\custom_modal\Plugin\Block;

use Drupal\Component\Serialization\Json;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Link;
use Drupal\Core\Url;

/**
 * Provides a 'ModalBlock' block.
 *
 * @Block(
 *  id = "modal_block",
 *  admin_label = @Translation("Modal block"),
 * )
 */
class ModalBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $link_url = Url::fromRoute('custom_modal.modal');
    $link_url->setOptions([
      'attributes' => [
        'class' => ['use-ajax', 'button', 'button--small'],
        'data-dialog-type' => 'modal',
        'data-dialog-options' => Json::encode(['width' => 800]),
      ],
    ]);

    $returnArray =
      [
        '#type' => 'markup',
        '#markup' => Link::fromTextAndUrl(t('Open modal'), $link_url)
          ->toString(),
        '#attached' => [
          'library' => [
            'core/drupal.dialog.ajax',
            'custom_modal/table',
            'custom_modal/js/keyfile.js',
          ],
        ],
      ];
    return $returnArray;
  }

}
