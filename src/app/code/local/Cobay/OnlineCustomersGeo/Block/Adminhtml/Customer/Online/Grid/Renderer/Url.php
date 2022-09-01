<?php
class Cobay_OnlineCustomersGeo_Block_Adminhtml_Customer_Online_Grid_Renderer_Url extends Mage_Adminhtml_Block_Customer_Online_Grid_Renderer_Url {

	public function render(Varien_Object $row){
    	$url = htmlspecialchars($row->getData($this->getColumn()->getIndex()));
    	$link = '<a href="'.$url.'" target="_blank">'.$url.'</a>';

    	return $link;
    }
    
}
