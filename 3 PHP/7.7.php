<?php

$filepath = '../../../data/cities.csv';
if( file_exists( $filepath ) )
{    
    if( $handle = fopen( $filepath, 'r' ) )
    {
        while(( $row = fgetcsv( $handle, 0, ',' ))!==false)
            {                     
               var_dump($row);
            }
            fclose( $handle );   
            
                $city_json_path = '../../../data/cities.json';
                if( $city_js = fopen( $city_json_path, 'w' ) )
                {
                    foreach($row as $city)
                    {
                        fwrite($city_js, '
                            {
                                "city" : "' .string $city[0].'", 
                                "country" : "' .string $city[3].'", 
                                "population" : "' .int $city[4].'", 
                                "latitude" : "' .float $city[1].'", 
                                "longitude" : "' .float $city[2].'"
                            }');
                    }        
                    fclose( $city_js ); 

                    if(chmod('../../../data/cities.json', 0644)==true)
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
}