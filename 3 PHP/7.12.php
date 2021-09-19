<?php 

function processUploadedFile(
    string $name, int $max_size = 10485760, int $min_width = 500, int $min_hight = 500 ) : bool
    {
            if( $_FILES[$name]['error'] !== UPLOAD_ERR_OK )
            {
                echo( 'Сталася помилка під час завантаження файлу.' );
                return false;
            }
            $valid_mimetypes = [ 'image/jpeg', 'image/png', 'image/gif' ];
            if( !in_array( $_FILES[$name]['type'], $valid_mimetypes ) )
            {
                echo( 'Помилка. Файл має недопустимий формат.' );
                return false;
            }
            if( $_FILES[$name]['size'] > $max_size )
            {
                echo( "Помилка. Файл повинен бути менше $max_size байт." );
                return false;
            }

    return true;
    }
 if(!empty ($_POST) )
{
    processUploadedFile( 'userfile' );
} 


function cropImage ($image_source)
{
    //$tmp_name = $_FILES['userfile']['tmp_name']
   // $file_path = /tmp/" $tmp_name"

    $file_contents = file_get_contents( $file_path );

   if( empty( $file_contents ) )
   {
    echo('Помилка: файл $file_path не існує');
       return null;
   }


    $image_source = imagecreatefromstring( $_FILES['userfile']['tmp_name'] );
    $image_width = imagesx( $image_source ); // визначаємо ширину зображення в пікселях
    $image_height = imagesy( $image_source ); // визначаємо висоту зображення в пікселях
    if($image_width < $min_width && $image_height < $min_hight)
    {
        echo( "Помилка. Розмір зображення повинен бути не менше $min_width х $min_hight px");
        return false;  
    }

    if( $image_width < $image_height )
    {
        $side_4 = $image_width;
        $side_5 = (int)($image_width / 4 * 5);
    }
    else       
    {
        $side_4 = (int)($image_height / 5 * 4);
        $side_5 = $image_height;
    }

    $image_result = imagecrop(
    $image_source,
        [   
            'x'      => (int)( $image_width / 2 - $side_4x / 2 ),
            'y'      => (int)( $image_height / 2 - $side_5x / 2 ),
            'width'  => $side_4x,
            'height' => $side_5x,
        ]
    );

    if( ! $image_result )
    {
        echo('Виникла помилка при вирізанні частини зображення');
        return null;
    }
    imagedestroy( $image_source );                    // звільняємо пам'ять, зайняту початковим зображенням
    return $image_result;
}   

function resizeImage( \GdImage $image_source, int $image_height = 300 ) : ?\GdImage
{
    $image_result = imagescale( $image_source, $image_height );
    if( ! $image_result )
    {
        echo('Виникла помилка при зменшенні частини зображення');
        return null;
    }
    return $image_result;
}

function saveImage( \GdImage $image_source ) : bool
{
    $new_image_path = './data/' . microtime( true ) . '.jpg';
    if( ! imagejpeg( $image_source, $new_image_path ) )
    {
        echo("Виникла помилка при збереженні нового зображення $new_image_path");
        $new_image_path = '';       // обнуляємо цю змінну, бо нижче спрацює створення елементу <img>
        return false;
    }

    imagedestroy( $image_source );                      // звільняємо пам'ять, зайняту зменшеним зображенням

    return true;
}

function main() : void
{
    if( empty( $_POST ) )
    {
        return;
    }

    $input_name = 'image';            // значення атрибута "name" для <input type="file">

    // перевірка на коректність надсилання файлу зображення
    if( ! processUploadedFile( $input_name ) )
    {
        // виникла помилка
        return;
    }

    $image = cropImage( $_FILES[ $input_name ]['tmp_name'] ?? '' );

    if( !$image )
    {
        // виникла помилка
        return;
    }

    $image = resizeImage( $image );

    if( !$image )
    {
        // виникла помилка
        return;
    }

    $image = saveImage( $image );

    if( !$image )
    {
        // виникла помилка
        return;
    }
}

// Запуск головної функції
main();
?>



<!DOCTYPE html>
<html lang="uk">
    <head>
        <meta charset="utf-8"/>
        <title>City UA</title>
    </head>
    <body>
        <form enctype="multipart/form-data" method="POST">
        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
        Файл: <input name="userfile" type="file" />
        <button type="submit">Надіслати</button>
        </form>
    </body>
</html>