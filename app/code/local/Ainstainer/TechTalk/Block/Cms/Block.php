<?php

class Ainstainer_TechTalk_Block_Cms_Block extends Mage_Core_Block_Abstract {

    /**
     * Initialize cache
     *
     * @return null
     */
    protected function _construct()
    {
        /*
        * setting cache to save the cms block
        */
        $this->setCacheTags(array(Mage_Cms_Model_Block::CACHE_TAG));
        $this->setCacheLifetime(false);
    }

    /**
     * Prepare Content HTML
     *
     * @return string
     */
    protected function _toHtml()
    {
        $blockId = $this->getBlockId();
        $html = '';
        if ($blockId) {
            $block = Mage::getModel('cms/block')
                ->setStoreId(Mage::app()->getStore()->getId())
                ->load($blockId);
            if ($block->getIsActive()) {
                /* @var $helper Mage_Cms_Helper_Data */
                $helper = Mage::helper('cms');
                $processor = $helper->getBlockTemplateProcessor();
                $html = $processor->filter($block->getContent());
                $this->addModelTags($block);
            }
        }

        /*
         * Start rewrite
         */

        return $html;

        /*
         * End rewrite
         */

    }

    /**
     * Retrieve values of properties that unambiguously identify unique content
     *
     * @return array
     */
    public function getCacheKeyInfo()
    {
        $blockId = $this->getBlockId();
        if ($blockId) {
            $result = array(
                'CMS_BLOCK',
                $blockId,
                Mage::app()->getStore()->getCode(),
            );
        } else {
            $result = parent::getCacheKeyInfo();
        }
        return $result;
    }

}