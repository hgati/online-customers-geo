<?php
class Cobay_OnlineCustomersGeo_Block_Widget_Grid_Column_Renderer_Ipcountry 
	extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Text
{
	public function render(Varien_Object $row){
		$retour = '';

		// geoip_contry_code, set by same variable name both Varnish and Nginx
		$countryCode = $_SERVER["HTTP_GEOIP_COUNTRY_CODE"] ?? null; // ?? php7 Null Coalesce Operator
		if($countryCode===null){
			$remote_addr = $row->getRemoteAddr();
			$geoIP = Mage::getSingleton('geoip/country'); // for Sandfox_GeoIP module
			$countryCode = $geoIP->getCountryByIp( long2ip($remote_addr) );  // for Sandfox_GeoIP module
		}
		if(empty($countryCode)) return $retour;

		$countryName = $_SERVER["HTTP_GEOIP_COUNTRY_NAME"] ?? null; // $username = isset($_GET['user']) ? $_GET['user'] : 'nobody';
		if($countryName===null){
			$countryName = Cobay_Common_Helper_Geo::$countries[$countryCode];
		}
		if(empty($countryCode)) return $retour;

		$image = $this->getSkinUrl('images/onlinecustomersgrid/' . strtolower($countryCode) . '.gif');
		$retour = '<img src="' . $image . '" /> ' . $countryName;

		return $retour;
	}
}
