<?php

namespace Drupal\ckeditor_bootstrap_editor\Plugin\CKEditorPlugin;

use Drupal\ckeditor\CKEditorPluginBase;
use Drupal\ckeditor\CKEditorPluginConfigurableInterface;
use Drupal\ckeditor\CKEditorPluginContextualInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\editor\Entity\Editor;

/**
 * Defines the "CKEditor Bootstrap Editor" plugin.
 *
 * @CKEditorPlugin(
 *   id = "jsplusBootstrapEditor",
 *   label = @Translation("CKEditor Bootstrap Editor"),
 *   module = "ckeditor_bootstrap_editor"
 * )
 */
class ckeditor_bootstrap_editor extends CKEditorPluginBase implements CKEditorPluginConfigurableInterface, CKEditorPluginContextualInterface {

  public $plugins = array(
          'jsplusShowBlocks' => array(
         'buttons' => array(array('label' => 'Highlight Bootstrap blocks')),
         'urlDoc' => 'http://js.plus/products/bootstrap-tools/configuration'
     ),
     'jsplusBootstrapEditorSelected' => array(
        'buttons' => array(array('label' => 'Edit selected row with Bootstrap Editor')),
        'urlDoc' => 'http://js.plus/products/bootstrap-editor/configuration'
     ),
     'jsplusBootstrapEditor' => array(
        'buttons' => array(array('label' => 'Edit with Bootstrap Editor')),
        'urlDoc' => 'http://js.plus/products/bootstrap-editor/configuration',
        'params' => array(
            array(
                'name' => 'skin',
                'default' => 'be',
                'type' => 'str',
                'order' => 2005,
                'title' => 'CKEditor skin',
                'hint' => '',
                'widget' => 'text'
            ),
            array(
                'name' => 'createDefaultRow',
                'inside' => 'jsplusBootstrapEditor',
                'default' => TRUE,
                'type' => 'bool',
                'order' => 2020,
                'title' => 'Create default row',
                'hint' => '',
                'widget' => 'checkbox',
            ),
            array(
                'name' => 'width',
                'inside' => 'jsplusBootstrapEditor',
                'default' => '100%',
                'type' => 'str',
                'order' => 2030,
                'title' => 'Width',
                'hint' => '',
                'widget' => 'text',
            ),
            array(
                'name' => 'HTMLEditorConfig',
                'inside' => 'jsplusBootstrapEditor',
                'default' => '{}',
                'type' => 'json',
                'order' => 2050,
                'title' => 'Config for inner CKEditor',
                'hint' => 'Lines of format "key: value[,]"',
                'widget' => 'textarea',
            ),
        )
     )

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
                        'image' => '/libraries/jsplusBootstrapEditor' . $image
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
    return '/libraries/jsplusBootstrapEditor/plugin.js';
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
      $settings = $editor->getSettings()['plugins']['jsplusBootstrapEditor'];
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
    return file_exists($_SERVER['DOCUMENT_ROOT'] . '/libraries/jsplusBootstrapEditor');
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state, Editor $editor) {
    $editor_settings = $editor->getSettings();
    if (isset($editor_settings['plugins']['jsplusBootstrapEditor'])) {
      $settings = $editor_settings['plugins']['jsplusBootstrapEditor'];
    }

    $form['#attached']['library'][] = 'ckeditor_bootstrap_editor/ckeditor_bootstrap_editor.admin';

    if (!$this->isInstalled()) {
        $form['warning'] = array(
            '#markup' => 'Looks like CKEditor Bootstrap Editor (Drupal 8 module) is installed but CKEditor add-ons not found. In order to use this module please copy CKEditor add-ons into "libraries" forder in the root of your Drupal 8 installation (create the directory if it does not exist).'
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
