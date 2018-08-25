<?php

namespace Drupal\ckeditor_bootstrap_table_tools\Plugin\CKEditorPlugin;

use Drupal\ckeditor\CKEditorPluginBase;
use Drupal\ckeditor\CKEditorPluginConfigurableInterface;
use Drupal\ckeditor\CKEditorPluginContextualInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\editor\Entity\Editor;

/**
 * Defines the "CKEditor Bootstrap Table Tools" plugin.
 *
 * @CKEditorPlugin(
 *   id = "jsplusBootstrapTableTools",
 *   label = @Translation("CKEditor Bootstrap Table Tools"),
 *   module = "ckeditor_bootstrap_table_tools"
 * )
 */
class ckeditor_bootstrap_table_tools extends CKEditorPluginBase implements CKEditorPluginConfigurableInterface, CKEditorPluginContextualInterface {

  public $plugins = array(
             'jsplus_bootstrap_table_new' => array(
        'buttons' => array(array('label' => 'Create new Bootstrap table')),
        'urlDoc' => 'http://js.plus/products/table-tools/configuration',
        'params' => array(
            array(
                'name' => 'jsplus_bootstrap_table_new_default_add_header',
                'default' => FALSE,
                'type' => 'bool',
                'order' => 2010,
                'title' => 'New table: add header subtag',
                'hint' => '',
                'widget' => 'checkbox'
            ),
            array(
                'name' => 'jsplus_bootstrap_table_new_default_striped',
                'default' => TRUE,
                'type' => 'bool',
                'order' => 2020,
                'title' => 'New table: create striped table',
                'hint' => '',
                'widget' => 'checkbox'
            ),
            array(
                'name' => 'jsplus_bootstrap_table_new_default_bordered',
                'default' => FALSE,
                'type' => 'bool',
                'order' => 2030,
                'title' => 'New table: create bordered table',
                'hint' => '',
                'widget' => 'checkbox'
            ),
            array(
                'name' => 'jsplus_bootstrap_table_new_default_condensed',
                'default' => FALSE,
                'type' => 'bool',
                'order' => 2040,
                'title' => 'Create condenced table',
                'hint' => '',
                'widget' => 'checkbox'
            ),
            array(
                'name' => 'jsplus_bootstrap_table_new_class',
                'default' => '',
                'type' => 'str',
                'order' => 2050,
                'title' => 'New table: classes for table',
                'hint' => 'Separated with space',
                'widget' => 'text'
            ),
            array(
                'name' => 'jsplus_bootstrap_table_new_style',
                'default' => '',
                'type' => 'str',
                'order' => 2060,
                'title' => 'New table: styles for table',
                'hint' => 'Syntax like in "style" attribute',
                'widget' => 'text'
            ),
        )
     ),
     'jsplus_bootstrap_table_conf' => array(
        'buttons' => array(array('label' => 'Configure Bootstrap table')),
        'urlDoc' => 'http://js.plus/products/table-tools/configuration',
     ),
     'jsplus_bootstrap_table_row_conf' => array(
        'buttons' => array(array('label' => 'Configure Bootstrap table row')),
        'urlDoc' => 'http://js.plus/products/table-tools/configuration',
     ),
     'jsplus_bootstrap_table_col_conf' => array(
        'buttons' => array(array('label' => 'Configure Bootstrap table column')),
        'urlDoc' => 'http://js.plus/products/table-tools/configuration',
     ),
     'jsplus_bootstrap_table_cell_conf' => array(
        'buttons' => array(array('label' => 'Configure Bootstrap table cell')),
        'urlDoc' => 'http://js.plus/products/table-tools/configuration',
     ),

     'jsplusTableRowAddBefore' => array(
       'buttons' => array(array('label' => 'Add table row before')),
       'urlDoc' => 'http://js.plus/products/table-tools/configuration',
     ),
     'jsplusTableRowAddAfter' => array(
        'buttons' => array(array('label' => 'Add table row after')),
        'urlDoc' => 'http://js.plus/products/table-tools/configuration',
     ),
     'jsplusTableRowMoveUp' => array(
        'buttons' => array(array('label' => 'Move table row up')),
        'urlDoc' => 'http://js.plus/products/table-tools/configuration',
     ),
     'jsplusTableRowMoveDown' => array(
        'buttons' => array(array('label' => 'Move table row down')),
        'urlDoc' => 'http://js.plus/products/table-tools/configuration',
     ),
     'jsplusTableRowDelete' => array(
       'buttons' => array(array('label' => 'Delete table row')),
       'urlDoc' => 'http://js.plus/products/table-tools/configuration',
     ),

     'jsplusTableColAddBefore' => array(
       'buttons' => array(array('label' => 'Add table column before')),
       'urlDoc' => 'http://js.plus/products/table-tools/configuration',
     ),
     'jsplusTableColAddAfter' => array(
        'buttons' => array(array('label' => 'Add table column after')),
        'urlDoc' => 'http://js.plus/products/table-tools/configuration',
     ),
     'jsplusTableColMoveLeft' => array(
        'buttons' => array(array('label' => 'Move table column left')),
        'urlDoc' => 'http://js.plus/products/table-tools/configuration',
     ),
     'jsplusTableColMoveRight' => array(
        'buttons' => array(array('label' => 'Move table column right')),
        'urlDoc' => 'http://js.plus/products/table-tools/configuration',
     ),
     'jsplusTableColDelete' => array(
       'buttons' => array(array('label' => 'Delete table column')),
       'urlDoc' => 'http://js.plus/products/table-tools/configuration',
     ),
     'jsplusTableCellMergeRight' => array(
        'buttons' => array(array('label' => 'Merge cell right')),
        'urlDoc' => 'http://js.plus/products/table-tools/configuration',
     ),
     'jsplusTableCellMergeDown' => array(
       'buttons' => array(array('label' => 'Merge cell down')),
       'urlDoc' => 'http://js.plus/products/table-tools/configuration',
     ),
     'jsplusTableCellSplit' => array(
       'buttons' => array(array('label' => 'Merge cell down')),
       'urlDoc' => 'http://js.plus/products/table-tools/configuration',
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
                        'image' => '/libraries/jsplusBootstrapTableTools' . $image
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
    return '/libraries/jsplusBootstrapTableTools/plugin.js';
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
      $settings = $editor->getSettings()['plugins']['jsplusBootstrapTableTools'];
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
    return file_exists($_SERVER['DOCUMENT_ROOT'] . '/libraries/jsplusBootstrapTableTools');
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state, Editor $editor) {
    $editor_settings = $editor->getSettings();
    if (isset($editor_settings['plugins']['jsplusBootstrapTableTools'])) {
      $settings = $editor_settings['plugins']['jsplusBootstrapTableTools'];
    }

    $form['#attached']['library'][] = 'ckeditor_bootstrap_table_tools/ckeditor_bootstrap_table_tools.admin';

    if (!$this->isInstalled()) {
        $form['warning'] = array(
            '#markup' => 'Looks like CKEditor Bootstrap Table Tools (Drupal 8 module) is installed but CKEditor add-ons not found. In order to use this module please copy CKEditor add-ons into "libraries" forder in the root of your Drupal 8 installation (create the directory if it does not exist).'
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
