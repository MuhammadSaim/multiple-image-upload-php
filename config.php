<?php

    // include composer autoload
    require './vendor/autoload.php';


// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;



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



function getResizeImage($images, $sizes)
{
    $main_wrapper = [];
    foreach($images as $image){
        $inner_wrapper = [];
        foreach ($sizes as $key => $value) {
            $newname = md5(uniqid()) . "_" . time() . "_" . $key . "." . $image['ext'];
            try {
                $image_intervention = Image::make($image['file_name'])->resize($value['width'], $value['height']);
                $image_intervention->save("./uploads/images/" . $newname);
                $inner_wrapper[$key] = $newname;
            } catch (Exception $e) {
                $inner_wrapper[$key] = $newname;
            }
        }
        array_push($main_wrapper, $inner_wrapper);
    }
    return $main_wrapper;
}