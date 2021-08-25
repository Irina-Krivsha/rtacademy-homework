<?php

$filepath = '../../../data/cities.csv';
if( file_exists( $filepath ) )
{    
    if( $handle = fopen( $filepath, 'r' ) )
    {
        while(( $row = fgetcsv( $handle, 0, ',' ))!==false)
            {                     
                $city_json_path = '../../../data/cities.json';
                if( $city_js = fopen( $city_json_path, 'w' ) )
                {
                    file_put_contents( $city_json_path, json_encode( $row) );
                    echo('Ok');
                }  
            }
            fclose( $handle );      
    }    
     else
    {
    echo( 'Помилка: файл не відкрито' );
    }  
}    
else
{
 echo( 'Помилка: файл не існує' );
}