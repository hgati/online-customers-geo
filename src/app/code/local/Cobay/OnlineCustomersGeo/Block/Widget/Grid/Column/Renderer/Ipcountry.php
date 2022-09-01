<?php
class Cobay_OnlineCustomersGeo_Block_Widget_Grid_Column_Renderer_Ipcountry 
	extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Text
{
	public function render(Varien_Object $row){
		$retour = '';

		// geoip_contry_code, set by same variable name both Varnish and Nginx
		$countryCode = $_SERVER["HTTP_GEOIP_COUNTRY_CODE"] ?? null; // ?? php7 Null Coalesce Operator
		if(empty($countryCode)) return $retour;

		$countryName = $_SERVER["HTTP_GEOIP_COUNTRY_NAME"] ?? null; // $username = isset($_GET['user']) ? $_GET['user'] : 'nobody';
		if(empty($countryCode)) return $retour;

		$image = $this->getSkinUrl('images/onlinecustomersgeo/' . strtolower($countryCode) . '.gif');
		$retour = '<img src="' . $image . '" /> ' . $countryName;

		return $retour;
	}
}
