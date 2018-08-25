<?php

namespace Drupal\ajax_search_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'AJAX Search' Block.
 *
 * @Block(
 *   id = "ajax_search_block",
 *   admin_label = @Translation("AJAX search block"),
 * )
 */
class SearchBlock extends BlockBase {
    
    /**
     * {@inheritdoc}
     */
    public function build() {
        return array(
            '#theme' => 'block_ajax_search',
            '#block_title' => null,
            '#attached' => array(
                'library' => array(
                  'ajax_search_block/search-js',
                ),
            ),  
        );
    }
}
