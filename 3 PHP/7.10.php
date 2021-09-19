<?php
declare( strict_types=1 );
class CitiesParser
{
    public const MAX_FILE_SIZE = 10485760;
    protected string $_error_massage;
    protected string $_upload_file_input_name;
    protected string $_upload_file_tmpname;
    protected string $_selectrd_country;
    protected array $_array;
    protected string $_filepath_cicties_html;

    public function __construct(
        string $upload_file_input_name, string $selectrd_country, string $filepath_cicties_html
    )
    {
        $this->_upload_file_input_name = $upload_file_input_name;
        $this->_selectrd_country = $selectrd_country;
        $this->_filepath_cicties_html = $filepath_cicties_html;
    }

    protected function _initialize():self
    {
        if(empty ($_POST) )
        {
            throw new Exception( );
        } 
        return $this;
    }

    protected function _processUploadedFile():self
    {
        if( empty( $_FILES[$name] ) )
        {
            throw new Exception( );
        } 
        if( $_FILES[$name]['error'] !== UPLOAD_ERR_OK )
        {
            throw new Exception( );
        } 
        $valid_mimetypes = [ 'text/csv', 'application/vnd.ns-excel' ];
        if( !in_array( $_FILES[$name]['type'], $valid_mimetypes ) )
        {
            throw new Exception( );
        } 
        return $this;
    }

    public function execute() : void
    {
        try
        {
        $this->_initialize();
        $this->_processUploadedFile();
        $this->_getCitiesFromCSVFile();
        $this->_sortCitiesByName();
        $this->_createCitiesHTMLFile();
        $this->_redirectLocation();
        }
    catch( Exception $e )
    {
    $this->_error_message = $e->getMessage();
    }
}

    public function getError() : string
    {
    return $this->_error_message;
    }
}
$citiesParser = new CitiesParser(
 'userfile', // значення атрибута "name"
 'Ukraine', // значення країни для парсингу
 './data/cities_ukraine.html' // результуючий HTML-файл
);
$citiesParser->execute();
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