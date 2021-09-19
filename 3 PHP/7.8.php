<?php 

function processUploadedFile(
    string $name, int $max_size = 10485760 ) : bool
    {
            if( empty( $_FILES[$name] ) )
            {
            echo( 'Помилка. Необхідно завантажити файл.' );
            return false;
            }
            if( $_FILES[$name]['error'] !== UPLOAD_ERR_OK )
            {
            echo( 'Сталася помилка під час завантаження файлу.' );
            return false;
            }
            $valid_mimetypes = [ 'text/csv', 'application/vnd.ns-excel' ];
            if( !in_array( $_FILES[$name]['type'], $valid_mimetypes ) )
            {
            echo( 'Помилка. Файл повинен мати формат CSV.' );
            return false;
            }
    return true;
    }
 if(!empty ($_POST) )
{
    processUploadedFile( 'userfile' );
} 

            /*$filepath = '/tmp/cities.csv';
            if( file_exists( $filepath ) )
            {    
            if( $handle = fopen( $filepath, 'r' ) )
            {
                $city_ua = [];
                while(( $row = fgetcsv( $handle, 0, ',' ))!==false)
                {               
                    if($row[3] == 'Ukraine')
                        {                              
                        $city_ua [] = $row;
                        }
                }  
                fclose( $handle );
                var_dump($city_ua);
                    
                
        
                $site = '../../../data/cities_ukraine.html';
                if( $site_city = fopen( $site, 'w' ))
                    {
                        $html_header = '
                        <!DOCTYPE html>
                        <html lang="uk">
                            <head>
                                <meta charset="utf-8">
                                <title>7.6</title>
                            </head>
                            <body>
                                <table>
                                    <tr>
                                        <th>Місто</th>
                                        <th>Країна</th>
                                        <th>Населення</th>
                                        <th>Координати</th>
                                    </tr>';
        
                        $html_footer = '
                                </table>
                            </body>
                        </html>';
        
                        fwrite($site_city,  $html_header);
                        foreach( $city_million as $city )
                        {
                            fwrite($site_city, '
                                <tr>
                                    <td>' . $city[0] . '</td>
                                    <td>' . $city[3] . '</td>
                                    <td>' . $city[4] . '</td>
                                    <td>' . $city[1] . ', ' . $city[2] . '</td>
                                </tr>
                                ' );
                        }
                        fwrite($site_city, $html_footer);
                                
                        fclose($site_city);
        
                        header('Location: ../../../data/cities.html');
        
                        echo('OK');
                
                        if(chmod('../../../data/cities.html', 0644)==true)
                        {
                            echo( 'Встановлено права доступу: 644' );
                        }
                        else
                        {
                            echo( 'Помилка: немає доступу' );
                        }
                    } 
                    else
                    {
                    echo( 'Помилка: файл не відкрито' );
                    }  
            }   
            else
            {
            echo( 'Помилка: файл не відкрито' );
            } 
        }      
        else
        {
        echo( 'Помилка: файл не існує' );
        }*/

?>

<!DOCTYPE html>
<html lang="uk">
    <head>
        <meta charset="utf-8"/>
        <title>City UA</title>
    </head>
    <body>
        <form enctype="multipart/form-data" method="POST" >
        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
        Файл: <input name="userfile" type="file" />
        <button type="submit">Надіслати</button>
        </form>
    </body>
</html>
