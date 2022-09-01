<?php
class Cobay_OnlineCustomerGrid_Block_Adminhtml_Customer_Online_Grid extends Mage_Adminhtml_Block_Customer_Online_Grid {

    private function addBeforeColumn($columnId, $column,$indexColumn) {
    	$columns = array();
    	foreach ($this->_columns as $gridColumnKey => $gridColumn) {
    		if($gridColumnKey == $indexColumn) {
    			$columns[$columnId] = $this->getLayout()->createBlock('adminhtml/widget_grid_column')
    			->setData($column)
    			->setGrid($this);
    			$columns[$columnId]->setId($columnId);
    		}
    		$columns[$gridColumnKey] = $gridColumn;
    	}
    	$this->_columns = $columns;
    	return $this;
    }    

    private function addAfterColumn($columnId, $column,$indexColumn) {
    	$columns = array();
    	foreach ($this->_columns as $gridColumnKey => $gridColumn) {
    		$columns[$gridColumnKey] = $gridColumn;
    		if($gridColumnKey == $indexColumn) {
    			$columns[$columnId] = $this->getLayout()->createBlock('adminhtml/widget_grid_column')
    			->setData($column)
    			->setGrid($this);
    			$columns[$columnId]->setId($columnId);
    		}
    	}
    	$this->_columns = $columns;
    	return $this;
    }
        
    /**
     * Prepare columns
     *
     * @return Mage_Adminhtml_Block_Customer_Online_Grid
     */
    protected function _prepareColumns()
    {
        parent::_prepareColumns();

        $this->addBeforeColumn('ip_country', array(
            'header'    => Mage::helper('onlinecustomergrid')->__('Visitor Country'),
            'default'   => Mage::helper('onlinecustomergrid')->__('n/a'),
            'index'     => 'ip_country',
            'filter'    => false,
			'renderer'  => 'Cobay_OnlineCustomerGrid_Block_Widget_Grid_Column_Renderer_Ipcountry',
            'type'      => 'text',
            'sort'      => false
        ), 'ip_address');

        return $this;
    }
}
