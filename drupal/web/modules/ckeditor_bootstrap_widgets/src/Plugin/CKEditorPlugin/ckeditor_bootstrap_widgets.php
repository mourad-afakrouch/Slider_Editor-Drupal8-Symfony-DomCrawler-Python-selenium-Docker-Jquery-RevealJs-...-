<?php

namespace Drupal\ckeditor_bootstrap_widgets\Plugin\CKEditorPlugin;

use Drupal\ckeditor\CKEditorPluginBase;
use Drupal\ckeditor\CKEditorPluginConfigurableInterface;
use Drupal\ckeditor\CKEditorPluginContextualInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\editor\Entity\Editor;

/**
 * Defines the "CKEditor Bootstrap Widgets" plugin.
 *
 * @CKEditorPlugin(
 *   id = "jsplusBootstrapWidgets",
 *   label = @Translation("CKEditor Bootstrap Widgets"),
 *   module = "ckeditor_bootstrap_widgets"
 * )
 */
class ckeditor_bootstrap_widgets extends CKEditorPluginBase implements CKEditorPluginConfigurableInterface, CKEditorPluginContextualInterface {

  public $plugins = array(
         'jsplus_bootstrap_button' => array(
         'buttons' => array(array('label' => 'Insert or edit Bootstrap buttons')),
         'urlDoc' => 'http://js.plus/products/bootstrap-widgets/configuration',
         'params' => array(
             array(
                 'name' => 'jsplus_bootstrap_button_default_style',
                 'default' => 'btn-primary',
                 'type' => 'str',
                 'order' => 3010,
                 'title' => 'Button: default type',
                 'hint' => '',
                 'widget' => 'select',
                 'widgetOptions' => array('btn-default' => 'Default', 'btn-primary' => 'Primary', 'btn-success' => 'Success', 'btn-info' => 'Information', 'btn-warning' => 'Warning', 'btn-danger' => 'Danger', 'btn-link' => 'Link'),
             ),
             array(
                 'name' => 'jsplus_bootstrap_button_default_size',
                 'default' => '',
                 'type' => 'str',
                 'order' => 3020,
                 'title' => 'Button: default size',
                 'hint' => '',
                 'widget' => 'select',
                 'widgetOptions' => array('btn-xs' => 'Extra small', 'btn-sm' => 'Small', '' => 'Normal', 'btn-lg' => 'Large'),
              ),
              array(
                 'name' => 'jsplus_bootstrap_button_default_tag',
                 'default' => 'a',
                 'type' => 'str',
                 'order' => 3030,
                 'title' => 'Button: default tag',
                 'hint' => '',
                 'widget' => 'select',
                 'widgetOptions' => array('a' => '<a>', 'input' => '<input>', 'button' => '<button>'),
              ),
              array(
                 'name' => 'jsplus_bootstrap_button_default_input_type',
                 'default' => 'button',
                 'type' => 'str',
                 'order' => 3040,
                 'title' => 'Button: input type',
                 'hint' => '',
                 'widget' => 'select',
                 'widgetOptions' => array('button' => 'Button', 'submit' => 'Submit button', 'cancel' => 'Cancel button'),
              ),
              array(
                 'name' => 'jsplus_bootstrap_button_default_enabled',
                 'default' => TRUE,
                 'type' => 'bool',
                 'order' => 3050,
                 'title' => 'Button: enabled by default',
                 'hint' => '',
                 'widget' => 'checkbox',
              ),
              array(
                 'name' => 'jsplus_bootstrap_button_default_width_100',
                 'default' => FALSE,
                 'type' => 'bool',
                 'order' => 3060,
                 'title' => 'Button: 100% width by default',
                 'hint' => '',
                 'widget' => 'checkbox',
              ),
              array(
                 'name' => 'jsplus_bootstrap_button_default_link',
                 'default' => 'http://',
                 'type' => 'str',
                 'order' => 3070,
                 'title' => 'Button: default link',
                 'hint' => '',
                 'widget' => 'text',
              ),
              array(
                 'name' => 'jsplus_bootstrap_button_default_text',
                 'default' => 'Download',
                 'type' => 'str',
                 'order' => 3080,
                 'title' => 'Button: default title',
                 'hint' => '',
                 'widget' => 'text',
              )
         )
     ),
     'jsplus_bootstrap_icons' => array(
         'buttons' => array(array('label' => 'Insert icons')),
         'urlDoc' => 'http://js.plus/products/bootstrap-widgets/configuration',
         'params' => array(
               array(
                  'name' => 'jsplus_bootstrap_icons_default_size',
                  'default' => 24,
                  'type' => 'int',
                  'order' => 4010,
                  'title' => 'Icon: default size',
                  'hint' => '',
                  'widget' => 'text',
               ),
               array(
                  'name' => 'jsplus_bootstrap_icons_default_color',
                  'default' => '#000',
                  'type' => 'str',
                  'order' => 4020,
                  'title' => 'Icon: default color',
                  'hint' => '',
                  'widget' => 'text',
               ),
               array(
                  'name' => 'jsplus_bootstrap_icons_default_add_size_to_style',
                  'default' => FALSE,
                  'type' => 'bool',
                  'order' => 4030,
                  'title' => 'Icon: add size to style',
                  'hint' => '',
                  'widget' => 'checkbox',
               ),
               array(
                  'name' => 'jsplus_bootstrap_icons_default_add_color_to_style',
                  'default' => FALSE,
                  'type' => 'bool',
                  'order' => 4040,
                  'title' => 'Icon: add color to style',
                  'hint' => '',
                  'widget' => 'checkbox',
               ),
               array(
                  'name' => 'jsplus_bootstrap_icons_bitmap_allowed',
                  'default' => TRUE,
                  'type' => 'bool',
                  'order' => 4050,
                  'title' => 'Icon: bitmap icon is allowed',
                  'hint' => '',
                  'widget' => 'checkbox',
               ),
               array(
                  'name' => 'jsplus_bootstrap_icons_default_use_bitmap',
                  'default' => FALSE,
                  'type' => 'bool',
                  'order' => 4060,
                  'title' => 'Icon: use bitmap by default',
                  'hint' => '',
                  'widget' => 'checkbox',
               ),
               array(
                  'name' => 'jsplus_bootstrap_icons_images_generator_url',
                  'default' => '',
                  'type' => 'str',
                  'order' => 4070,
                  'title' => 'Icon: bitmap generator URL',
                  'hint' => '',
                  'widget' => 'text',
               ),
         )
     ),
     'jsplus_bootstrap_gallery' => array(
         'buttons' => array(array('label' => 'Insert images galley in Bootstrap rows and cols')),
         'urlDoc' => 'http://js.plus/products/bootstrap-widgets/configuration',
         'params' => array(
            array(
                 'name' => 'jsplus_uploader_url',
                 'default' => '/libraries/jsplus_uploader/uploader.php',
                 'type' => 'str',
                 'order' => 5004,
                 'title' => 'Gallery: uploader URL',
                 'hint' => '',
                 'widget' => 'text',
            ),
            array(
                'name' => 'jsplus_bootstrap_gallery_col_count_show',
                'default' => TRUE,
                'type' => 'bool',
                'order' => 5005,
                'title' => 'Gallery: allow to change columns count',
                'hint' => '',
                'widget' => 'text',
             ),
             array(
                'name' => 'jsplus_bootstrap_gallery_default_col_count',
                'default' => 3,
                'type' => 'int',
                'order' => 5006,
                'title' => 'Gallery: columns count',
                'hint' => '',
                'widget' => 'text',
             ),
            array(
               'name' => 'jsplus_bootstrap_gallery_default_img_resize',
               'default' => TRUE,
               'type' => 'bool',
               'order' => 5010,
               'title' => 'Gallery: resize images by default',
               'hint' => '',
               'widget' => 'text',
            ),
            array(
               'name' => 'jsplus_bootstrap_gallery_default_img_resize_width',
               'default' => 800,
               'type' => 'int',
               'order' => 5020,
               'title' => 'Gallery: default image resize width',
               'hint' => '',
               'widget' => 'text',
            ),
            array(
               'name' => 'jsplus_bootstrap_gallery_default_img_resize_heigth',
               'default' => 600,
               'type' => 'int',
               'order' => 5030,
               'title' => 'Gallery: default image resize height',
               'hint' => '',
               'widget' => 'text',
            ),
            array(
               'name' => 'jsplus_bootstrap_gallery_default_img_enlarge',
               'default' => FALSE,
               'type' => 'bool',
               'order' => 5040,
               'title' => 'Gallery: enlarge image by default',
               'hint' => '',
               'widget' => 'text',
            ),
            array(
               'name' => 'jsplus_bootstrap_gallery_thumb_resize_show',
               'default' => TRUE,
               'type' => 'bool',
               'order' => 5050,
               'title' => 'Gallery: show resize thumbnail controls',
               'hint' => '',
               'widget' => 'text',
            ),
            array(
               'name' => 'jsplus_bootstrap_gallery_default_thumb_resize',
               'default' => TRUE,
               'type' => 'bool',
               'order' => 5060,
               'title' => 'Gallery: resize thumbnails by default',
               'hint' => '',
               'widget' => 'text',
            ),
            array(
               'name' => 'jsplus_bootstrap_gallery_default_thumb_resize_width',
               'default' => 800,
               'type' => 'int',
               'order' => 5070,
               'title' => 'Gallery: default thumbnails resize width',
               'hint' => '',
               'widget' => 'text',
            ),
            array(
               'name' => 'jsplus_bootstrap_gallery_default_thumb_resize_heigth',
               'default' => 600,
               'type' => 'int',
               'order' => 5080,
               'title' => 'Gallery: default thumbnails resize height',
               'hint' => '',
               'widget' => 'text',
            ),
            array(
               'name' => 'jsplus_bootstrap_gallery_default_thumb_enlarge',
               'default' => FALSE,
               'type' => 'bool',
               'order' => 5090,
               'title' => 'Gallery: enlarge thumbnails by default',
               'hint' => '',
               'widget' => 'text',
            ),
            array(
               'name' => 'jsplus_bootstrap_gallery_allowed_ext',
               'default' => 'jpg,jpeg,gif,png,bmp,tif,tiff',
               'type' => 'str',
               'order' => 5100,
               'title' => 'Gallery: allowed extensions',
               'hint' => 'Change server side option too',
               'widget' => 'text',
            ),
         )
     ),
     'jsplus_bootstrap_badge' => array(
         'buttons' => array(array('label' => 'Insert Bootstrap badge')),
         'urlDoc' => 'http://js.plus/products/bootstrap-widgets/configuration',
         'params' => array(
             array(
                 'name' => 'jsplus_bootstrap_badge_default_title',
                 'default' => '42',
                 'type' => 'str',
                 'order' => 7010,
                 'title' => 'Badge: default title',
                 'hint' => '',
                 'widget' => 'text'
             ),
         )
     ),
     'jsplus_bootstrap_label' => array(
         'buttons' => array(array('label' => 'Insert Bootstrap label')),
         'urlDoc' => 'http://js.plus/products/bootstrap-widgets/configuration',
         'params' => array(
             array(
                'name' => 'jsplus_bootstrap_label_default_style',
                'default' => 'label-primary',
                'type' => 'str',
                'order' => 6010,
                'title' => 'Label: default style',
                'hint' => '',
                'widget' => 'select',
                'widgetOptions' => array('label-default' => 'Default', 'label-primary' => 'Primary', 'label-success' => 'Success', 'label-info' => 'Information', 'label-warning' => 'Warning', 'label-danger' => 'Danger')
            ),
            array(
                'name' => 'jsplus_bootstrap_label_default_corners',
                'default' => 'none',
                'type' => 'str',
                'order' => 6020,
                'title' => 'Label: default corners smoothing',
                'hint' => '',
                'widget' => 'select',
                'widgetOptions' => array('none' => 'Default', 'radius' => 'Radius', 'rounded' => 'Rounded')
            ),
            array(
                'name' => 'jsplus_bootstrap_label_default_title',
                'default' => 'New',
                'type' => 'str',
                'order' => 6030,
                'title' => 'Label: default title',
                'hint' => '',
                'widget' => 'text'
            ),
         )
     ),
     'jsplus_bootstrap_breadcrumbs' => array(
         'buttons' => array(array('label' => 'Insert or edit Bootstrap breadcrumbs')),
         'urlDoc' => 'http://js.plus/products/bootstrap-widgets/configuration',
     ),
     'jsplus_bootstrap_alert' => array(
         'buttons' => array(array('label' => 'Insert alert (message) widget')),
         'urlDoc' => 'http://js.plus/products/bootstrap-widgets/configuration',
     ),

  );

    /**
     * {@inheritdoc}
     */
    public function getButtons() {
        if (!$this->isInstalled())
            return array();

        $buttons = array();
        foreach ($this->plugins as $pluginName => $pluginDef) {

            if (isset($pluginDef['buttons'])) {
                foreach($pluginDef['buttons'] as $buttonName => $buttonDef) {
                    $image = '/icons/' . $pluginName . '.png';
                    if (isset($buttonDef['image']))
                        $image = $pluginDef['image'];
                    $button = array(
                        'label' => $buttonDef['label'],
                        'image' => '/libraries/jsplusBootstrapWidgets' . $image
                    );
                    $buttons[$pluginName] = $button;
                }
            }

        }
        return $buttons;
    }

  /**
   * {@inheritdoc}
   */
  public function getFile() {
    return '/libraries/jsplusBootstrapWidgets/plugin.js';
  }

  /**
   * {@inheritdoc}
   */
  public function getDependencies(Editor $editor) {
    return array();
  }

  /**
   * {@inheritdoc}
   */
  public function getLibraries(Editor $editor) {
    return array();
  }

  /**
   * {@inheritdoc}
   */
  public function isInternal() {
    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  public function isEnabled(Editor $editor) {
    return TRUE;
  }

  function getConfigParam($settings, $param, $default, $type, $inside) {
    $name = $param;
    if (isset($settings[$name]) && strlen($settings[$name]) > 0)
        $value = $settings[$name];
    else
        $value = $default;
    if (isset($type) && $type == 'int') {
        $value = intval($value);
    } else if (isset($type) && $type == 'bool') {
        if ($value == '1')
            $value = true;
        else if ($value == '0')
            $value = false;
    } else if (isset($type) && $type == 'json') {
        $value = json_decode($value);
    }
    return $value;
  }

  /**
   * {@inheritdoc}
   */
  public function getConfig(Editor $editor) {
      $settings = $editor->getSettings()['plugins']['jsplusBootstrapWidgets'];
      $result = array();
      foreach ($this->plugins as $pluginName => $pluginDef) {
          if (isset($pluginDef['params'])) {
              foreach ($pluginDef['params'] as $paramDef) {
                  $value = $this->getConfigParam($settings, $paramDef['name'], $paramDef['default'], $paramDef['type'], isset($paramDef['inside']) ? $paramDef['inside'] : null);
                  if (!array_key_exists('inside', $paramDef))
                      $result[$paramDef['name']] = $value;
                  else {
                      if (!isset($result[$paramDef['inside']]))
                          $result[$paramDef['inside']] = array();
                      $result[$paramDef['inside']][$paramDef['name']] = $value;
                  }
              }
          }
      }
      return $result;
  }

  function addSelectToForm(& $form, $settings, $param, $title, $default, $options, $inside, $urlHelp) {
      $form[$param] = array(
        '#type' => 'select',
        '#title' => $title,
        '#options' => $options,
        '#default_value' => $this->getConfigParam($settings, $param, $default, 'str', $inside),
        '#attributes' => array('data-url-help' => $urlHelp == '' ? '' : ($urlHelp . '#' . $param), 'data-param-name' => $param)
      );
  }

  function addTextboxToForm(& $form, $settings, $param, $title, $default, $desc, $inside, $urlHelp) {
        $form[$param] = array(
          '#type' => 'textfield',
          '#title' => $title,
          '#default_value' => $this->getConfigParam($settings, $param, $default, 'str', $inside),
          '#description' => $desc,
          '#attributes' => array('data-url-help' => $urlHelp == '' ? '' : ($urlHelp . '#' . $param), 'data-param-name' => $param)
        );
  }

  function addTextareaToForm(& $form, $settings, $param, $title, $default, $desc, $inside, $urlHelp) {
        $form[$param] = array(
          '#type' => 'textarea',
          '#title' => $title,
          '#default_value' => $this->getConfigParam($settings, $param, $default, 'str', $inside),
          '#description' => $desc,
          '#attributes' => array('data-url-help' => $urlHelp == '' ? '' : ($urlHelp . '#' . $param), 'data-param-name' => $param)
        );
  }

  function addCheckboxToForm(& $form, $settings, $param, $title, $default, $desc, $inside, $urlHelp) {
        $form[$param] = array(
          '#type' => 'checkbox',
          '#title' => $title,
          '#default_value' => $this->getConfigParam($settings, $param, $default, 'bool', $inside),
          '#description' => $desc,
          '#attributes' => array('data-url-help' => $urlHelp == '' ? '' : ($urlHelp . '#' . $param), 'data-param-name' => $param)
        );
  }

  public function isInstalled() {
    return file_exists($_SERVER['DOCUMENT_ROOT'] . '/libraries/jsplusBootstrapWidgets');
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state, Editor $editor) {
    $editor_settings = $editor->getSettings();
    if (isset($editor_settings['plugins']['jsplusBootstrapWidgets'])) {
      $settings = $editor_settings['plugins']['jsplusBootstrapWidgets'];
    }

    $form['#attached']['library'][] = 'ckeditor_bootstrap_widgets/ckeditor_bootstrap_widgets.admin';

    if (!$this->isInstalled()) {
        $form['warning'] = array(
            '#markup' => 'Looks like CKEditor Bootstrap Widgets (Drupal 8 module) is installed but CKEditor add-ons not found. In order to use this module please copy CKEditor add-ons into "libraries" forder in the root of your Drupal 8 installation (create the directory if it does not exist).'
        );
        return $form;
    }

    $params = array();
    foreach ($this->plugins as $pluginName => $pluginDef) {
        if (isset($pluginDef['params']))
            foreach ($pluginDef['params'] as $paramDef) {
                $paramDef['urlDoc'] = $pluginDef['urlDoc'];
                $params[$paramDef['order']] = $paramDef;
            }
    }
    ksort($params); // sort by key (order)

    foreach ($params as $order => $paramDef) {
        $inside = isset($paramDef['inside']) ? $paramDef['inside'] : null;
        if ($paramDef['type'] == 'json')
            $paramDef['title'] = $paramHint['title'] . "<br/>\nImportant notice: this value needs to be in JSON format. So this is the must to use double quotes (not single ones) for all key names and all string values";
        if ($paramDef['widget'] == 'select') {
            $this->addSelectToForm($form, $settings, $paramDef['name'], t($paramDef['title']), $paramDef['default'], $paramDef['widgetOptions'], $inside, $paramDef['urlDoc']);
        } else if ($paramDef['widget'] == 'checkbox') {
            $this->addCheckboxToForm($form, $settings, $paramDef['name'], t($paramDef['title']), $paramDef['default'], $paramDef['hint'], $inside, $paramDef['urlDoc']);
        } else if ($paramDef['widget'] == 'textarea') {
            $this->addTextareaToForm($form, $settings, $paramDef['name'], t($paramDef['title']), $paramDef['default'], $paramDef['hint'], $inside, $paramDef['urlDoc']);
        } else {
            $this->addTextboxToForm($form, $settings, $paramDef['name'], t($paramDef['title']), $paramDef['default'], $paramDef['hint'], $inside, $paramDef['urlDoc']);
        }
    }

    return $form;
  }

}
