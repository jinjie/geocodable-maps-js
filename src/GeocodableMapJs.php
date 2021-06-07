<?php

/**
 * GeocodableMapJs
 *
 * @package SwiftDevLabs\GeocodableMaps
 * @author Kong Jin Jie <jinjie@swiftdev.sg>
 */

namespace SwiftDevLabs\GeocodableMaps;

use SilverStripe\Core\Config\Config;
use SilverStripe\Core\Environment;
use SilverStripe\ORM\DataExtension;
use SilverStripe\View\Requirements;
use Symbiote\Addressable\GoogleGeocodeService;

class GeocodableMapJs extends DataExtension
{
    /**
     * Render a Google Map JS version for the map
     */
    public function AddressMapJs($zoom = 12, $width = '100%', $height = 300)
    {
        $key = Environment::getEnv('GOOGLE_API_KEY')
            ?? Config::inst()->get(GoogleGeocodeService::class, 'google_api_key')
            ?? Config::inst()->get('Symbiote\\Addressable\\GeocodeService', 'google_api_key');

        if (!$key) {
            throw new \Exception("Please provide google_api_key");
        }

        Requirements::javascript("https://maps.googleapis.com/maps/api/js?key={$key}&callback=initMap{$this->owner->ID}&libraries=&v=weekly", [
            'async' => 'async'
        ]);

        Requirements::customScript(<<<EOF
            function initMap{$this->owner->ID}() {
                const marker{$this->owner->ID} = { lat: {$this->owner->Lat}, lng: {$this->owner->Lng} };
                const map{$this->owner->ID} = new google.maps.Map(document.getElementById("geocodable-map-{$this->owner->ID}"), {
                    zoom: {$zoom},
                    center: marker{$this->owner->ID}
                });
                const marker = new google.maps.Marker({
                    position: marker{$this->owner->ID},
                    map: map{$this->owner->ID}
                });
            }
        EOF);

        return $this
            ->owner
            ->customise([
                'Width'  => is_numeric($width) ? "{$width}px" : $width,
                'Height' => is_numeric($height) ? "{$height}px" : $height,
            ])
            ->renderWith('SwiftDevLabs/GeocodableMapJs/AddressMapJs');
    }
}
