<?php
class Cobay_OnlineCustomersGeo_Block_Adminhtml_Customer_Grid extends Mage_Adminhtml_Block_Customer_Grid {

    protected function _prepareColumns() {
    	parent::_prepareColumns();

    	$this->removeColumn('middlename');
    	$this->addColumn('login_at', array(
    		'header'    => Mage::helper('onlinecustomersgeo')->__('Last Login'),
    		'type'      => 'datetime',
    		'align'     => 'center',
    		'index'     => 'login_at',
    		'gmtoffset' => true
    	));
    	
    	return $this;    	
    }

}
