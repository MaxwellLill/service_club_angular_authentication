<?php

/**
 * @file
 * CustomModalController class.
 */

namespace Drupal\custom_modal\Controller;

use Drupal\Component\Render\FormattableMarkup;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\OpenModalDialogCommand;
use Drupal\Core\Controller\ControllerBase;

class CustomModalController extends ControllerBase {


  public function modal() {

    /**
     * $content = '  <app-root></app-root>
     * <script type="text/javascript" src="runtime.a66f828dca56eeb90e02.js"></script>
     * <script type="text/javascript" src="polyfills.2f4a59095805af02bd79.js"></script>
     * <script type="text/javascript" src="main.b33fc2cb66966997fae8.js"></script>';
     **/

    $content['#theme'] = 'custom_modal';
    //$content['#markup'] = new FormattableMarkup('<script>window.APP_DATA = { jwtkey: "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9 . eyJpYXQiOjE1MzY3MjQxNjcsImV4cCI6MTUzNjcyNzc2NywiZHJ1cGFsIjp7InVpZCI6IjIifX0 . s - _tdfCTmv24ti8ruZ9rPkGiBHzQZTJCf3K - qorVifg}</script>', []);
    $content['#attached']['library'][] = 'custom_modal/custom_modal';
    //$content['#attached']['library'][] = 'runtime.a66f828dca56eeb90e02.js';
    //$content['#attached']['library'][] = 'polyfills.2f4a59095805af02bd79.js';
    //$content['#attached']['library'][] = 'main.b33fc2cb66966997fae8.js';

    $options = [
      'dialogClass' => 'popup-dialog-class',
      'width' => '80%',
    ];
    $response = new AjaxResponse();
    // $response->addCommand(new OpenModalDialogCommand(t('Modal title'), t('<iframe id="inlineFrameExample" src="http://local.tmp.com.au/"></iframe>'), $options));
    $response->addCommand(new OpenModalDialogCommand(t('Modal title'), $content, $options, '<app-root>'));
    // $response['#attached']['library'] = 'custom_modal/table';

    return $response;
  }



  /**
   * {@inheritdoc}
   */
  /**
   * public function render() {
   * $build = parent::render();
   * $build[]['#attached']['library'] = 'custom_modal/table';
   * return $build;
   * }
   */


}