<?php

/**
 * @file
 * CustomModalController class.
 */

namespace Drupal\custom_modal\Controller;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\OpenModalDialogCommand;
use Drupal\Core\Controller\ControllerBase;

class CustomModalController extends ControllerBase {

  public function modal($entityid) {

    dd($entityid);
    $content['#theme'] = 'custom_modal';
    $content['#attached']['library'][] = 'custom_modal/custom_modal';
    $content['entityId'] = $entityid;

    $options = [
      'dialogClass' => 'popup-dialog-class',
      'width' => '80%',
    ];
    $response = new AjaxResponse();
    $response->addCommand(new OpenModalDialogCommand(t('Modal title'), $content, $options, '<app-root>'));

    return $response;
  }
}