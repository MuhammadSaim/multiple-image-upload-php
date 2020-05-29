<pre>
<?php

    require_once "./config.php";


    if(isset($_POST['btn'])){


        $images_temp_array = array();
        $extensions = array('jpg', 'png', 'jpeg', 'gif');

        $init_count = count($_FILES['images']['name']);
        $final_count = 0;


        if(!empty($_FILES['images']['name'][0]) && count($_FILES['images']) >= 1 && count($_FILES['images']) <= 12){
            foreach($_FILES['images']['tmp_name'] as $key => $file){
                if(getimagesize($_FILES["images"]["tmp_name"][$key]) !== false){
                    $ext = strtolower(pathinfo($_FILES['images']['name'][$key], PATHINFO_EXTENSION));
                    if(in_array($ext, $extensions)){
                        if ($_FILES['images']['size'][$key] > 2000000) {
                            $image_error = '<p style="color:red;">Your image should be in 2MB.</p>';
                            break;
                        }else{
                            array_push($images_temp_array, [
                                'file_name' => $file,
                                'ext' => $ext 
                            ]);
                            $final_count++;
                        }
                    }else{
                        $image_error = '<p style="color:red;">File should be png, jpg, jpeg or gif.</p>';
                        break;
                    }
                }else{
                    $image_error = '<p style="color:red;">File ' . $_FILES['images']['name'][$key] . ' is not an image.</p>';
                    break;
                }
            }

        }else{
            $image_error = '<p style="color:red;">Please select at least 1 or max 12 images.</p>';
        }


        if($init_count == $final_count){
            $images = getResizeImage($images_temp_array, $sizes);
            var_dump($images);
            $images = json_encode($images);
            var_dump($images);
        }

    } // main if ends here









?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo images</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="images[]" multiple>
        <br>
        <?php if(!empty($image_error)) echo $image_error; ?>
        <br>
        <input type="submit" name="btn">
    </form>
</body>
</html>