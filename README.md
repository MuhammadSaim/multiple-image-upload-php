# Multiple Image Upload with PHP

Simple and reliable multi image uploader with PHP


## Dependencies 
- PHP >= 5.4
- [http://image.intervention.io/](http://image.intervention.io/)


## Configurations
```shell
$ composer install
```

Customize image size in <kbd>[config.php](./config.php#L13)</kbd> and or remove or edit the size here size should be in pixels.
```php
// sizes
$sizes = [
    "100x100" => [
        "width" => 100,
        "height" => 100,
    ],
    "150x150" => [
        "width" => 150,
        "height" => 150
    ],
    "250x250" => [
        "width" => 250,
        "height" => 250
    ]
];
```

All the images should be stored in <kbd>upload/images</kbd> you can change this path from <kbd>[config.php](./config.php#L39)</kbd>. Current file name will be like

```text
0d6663aa77d719954285d73d37f1c0e0_1590698324_x_100_100.jpg
```

You can also change this in <kbd>[config.php](./config.php#L36)</kbd>.

After that you have array like this you can do whatever you want store it in database with JSON String.

```php
array(5) {
  [0]=>
  array(3) {
    ["100x100"]=>
    string(55) "f5a78db13c51db68f5e64da442ee7234_1590722639_100x100.jpg"
    ["150x150"]=>
    string(55) "388b133b6ae46e858e25ff807fa059e6_1590722640_150x150.jpg"
    ["250x250"]=>
    string(55) "09ea1849e01fd9c64f71e36a4a6b2558_1590722640_250x250.jpg"
  }
  [1]=>
  array(3) {
    ["100x100"]=>
    string(55) "444afb279dba599f86d74d42df3c1efb_1590722640_100x100.jpg"
    ["150x150"]=>
    string(55) "8b710485501b37f73827caf510ae55cf_1590722640_150x150.jpg"
    ["250x250"]=>
    string(55) "323539daadfbb62404397c9f3a32b008_1590722640_250x250.jpg"
  }
  [2]=>
  array(3) {
    ["100x100"]=>
    string(55) "a6794989079587708f78db4f6538a9f6_1590722640_100x100.jpg"
    ["150x150"]=>
    string(55) "3ebec7afb567ca9d301cccacd8a9020e_1590722640_150x150.jpg"
    ["250x250"]=>
    string(55) "e6e80d0af359371dc034e79052301982_1590722640_250x250.jpg"
  }
  [3]=>
  array(3) {
    ["100x100"]=>
    string(55) "b76de744195c57f4d6cf773349959f1d_1590722640_100x100.jpg"
    ["150x150"]=>
    string(55) "fc21c7950b78f5e8d0e1a7a6ed7b85b9_1590722640_150x150.jpg"
    ["250x250"]=>
    string(55) "06f42563453b752eb7faeb16ff2f0ae2_1590722640_250x250.jpg"
  }
  [4]=>
  array(3) {
    ["100x100"]=>
    string(55) "d42345551c4f97687c8013c4e0f8fb82_1590722640_100x100.jpg"
    ["150x150"]=>
    string(55) "70f13f94af8cd4b2f4d473f964cf1b25_1590722640_150x150.jpg"
    ["250x250"]=>
    string(55) "4203400ad20152785e7c294cd5d08cbf_1590722640_250x250.jpg"
  }
}
```
After Converted this array into JSON you have JSON string like that.

```json
[
   {
      "100x100":"f5a78db13c51db68f5e64da442ee7234_1590722639_100x100.jpg",
      "150x150":"388b133b6ae46e858e25ff807fa059e6_1590722640_150x150.jpg",
      "250x250":"09ea1849e01fd9c64f71e36a4a6b2558_1590722640_250x250.jpg"
   },
   {
      "100x100":"444afb279dba599f86d74d42df3c1efb_1590722640_100x100.jpg",
      "150x150":"8b710485501b37f73827caf510ae55cf_1590722640_150x150.jpg",
      "250x250":"323539daadfbb62404397c9f3a32b008_1590722640_250x250.jpg"
   },
   {
      "100x100":"a6794989079587708f78db4f6538a9f6_1590722640_100x100.jpg",
      "150x150":"3ebec7afb567ca9d301cccacd8a9020e_1590722640_150x150.jpg",
      "250x250":"e6e80d0af359371dc034e79052301982_1590722640_250x250.jpg"
   },
   {
      "100x100":"b76de744195c57f4d6cf773349959f1d_1590722640_100x100.jpg",
      "150x150":"fc21c7950b78f5e8d0e1a7a6ed7b85b9_1590722640_150x150.jpg",
      "250x250":"06f42563453b752eb7faeb16ff2f0ae2_1590722640_250x250.jpg"
   },
   {
      "100x100":"d42345551c4f97687c8013c4e0f8fb82_1590722640_100x100.jpg",
      "150x150":"70f13f94af8cd4b2f4d473f964cf1b25_1590722640_150x150.jpg",
      "250x250":"4203400ad20152785e7c294cd5d08cbf_1590722640_250x250.jpg"
   }
]
```