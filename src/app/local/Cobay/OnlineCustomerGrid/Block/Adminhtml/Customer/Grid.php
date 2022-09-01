<?php
class Cobay_OnlineCustomerGrid_Block_Adminhtml_Customer_Grid extends Mage_Adminhtml_Block_Customer_Grid {

    protected function _prepareColumns() {
    	parent::_prepareColumns();
    	
    	$this->addColumn('login_at', array(
    		'header'    => Mage::helper('onlinecustomergrid')->__('Last Login'),
    		'type'      => 'datetime',
    		'align'     => 'center',
    		'index'     => 'login_at',
    		'gmtoffset' => true
    	));
    	
    	return $this;    	
    }

}
