<h1 align="center">Welcome to jinjie/geocodable-maps-js 👋</h1>
<p>
  <img src="https://img.shields.io/badge/version-1.1.0-blue.svg" />
</p>

> Add Google Map JS to Addressable module in Silverstripe 4

### 🏠 [Homepage](https://github.com/jinjie/geocodable-maps-js)

## Overview

Use this module to add an Google Map JS to Silverstripe 4. This requires [Addressable](https://github.com/symbiote/silverstripe-addressable). 

## Install

```sh
composer require jinjie/geocodable-maps-js
```

## How to use

Since this depends on Lat and Lng that are provided by [Geocodable](https://github.com/symbiote/silverstripe-addressable/blob/master/src/Geocodable.php), please also apply Geocodable extension to your DataObject. This requires an [API key](https://github.com/symbiote/silverstripe-addressable/blob/master/docs/en/quick-start.md#transform-address-field-data-into-a-latitude-and-longitude)

You can also define `GOOGLE_API_KEY` in `.env`

```yml
MyDataObject:
  extensions:
    - Symbiote\Addressable\Addressable
    - Symbiote\Addressable\Geocodable
    - SwiftDevLabs\GeocodableMaps\GeocodableMapJs
```

### Template

Put `$AddressMapJs` to your template place the map into your template. There are 3 parameters available:

`public function AddressMapJs($zoom = 12, $width = '100%', $height = 300)`

## Author

👤 **Kong Jin Jie**


## 🤝 Contributing

Contributions, issues and feature requests are welcome!<br />Feel free to check [issues page](https://github.com/jinjie/geocodable-maps-js/issues).

## Show your support

Give a ⭐️ if this project helped you!

***
_This README was generated with ❤️ by [readme-md-generator](https://github.com/kefranabg/readme-md-generator)_
