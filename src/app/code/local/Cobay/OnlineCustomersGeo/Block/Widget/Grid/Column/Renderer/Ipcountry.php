<?php
class Cobay_OnlineCustomersGeo_Block_Widget_Grid_Column_Renderer_Ipcountry 
	extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Text
{
	public function render(Varien_Object $row){
		$retour = '';

		// geoip_contry_code, Nginx의 fcgi_params로 넘겨준 데이터임.
		// ?? php7 Null Coalesce Operator, $username = isset($_GET['user']) ? $_GET['user'] : 'nobody';
		$countryCode = $_SERVER["GEOIP_COUNTRY_CODE"] ?? '';
		$countryName = $_SERVER["GEOIP_COUNTRY_NAME"] ?? '';
		$countryCity = $_SERVER["GEOIP_COUNTRY_CITY"] ?? '';

		$image = $this->getSkinUrl('images/onlinecustomersgeo/' . strtolower($countryCode) . '.gif');
		$retour = '<img src="' . $image . '" /> ' . $countryName . ' ' . $countryCity;

		return $retour;
	}
}
