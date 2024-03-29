<?php
namespace ChintakExtensions\Freelancer\Model\ResourceModel\Image;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'entity_id';
    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init(\ChintakExtensions\Freelancer\Model\Image::class, \ChintakExtensions\Freelancer\Model\ResourceModel\Image::class);
        $this->_map['fields']['entity_id'] = 'main_table.entity_id';
    }
}
