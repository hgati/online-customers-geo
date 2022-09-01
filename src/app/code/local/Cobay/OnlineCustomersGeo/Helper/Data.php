<?php
class Cobay_OnlineCustomersGeo_Helper_Data extends Mage_Core_Helper_Data {

	public function geolocate($ip = '127.0.0.1'){
		$geolocation = Mage::helper('common/geo');
		$geolocation->setCityPrecision(true);
		$geolocation->setIP($ip);
		$locations = $geolocation->getGeoLocation();
		if (!empty($locations[0]) && is_array($locations[0])) {
			return $locations[0];
		}
		return null;
	}
	
}