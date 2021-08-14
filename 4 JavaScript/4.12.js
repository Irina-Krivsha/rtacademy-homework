let csvFileContent = `
Kyiv,50.4334,30.5166,Ukraine,2709000
Kharkiv,50.0000,36.2500,Ukraine,1461000
Dnipro,48.4800,35.0000,Ukraine,1050000
Odesa,46.4900,30.7100,Ukraine,991000
Donets’k,48.0000,37.8300,Ukraine,988000
L’viv,49.8350,24.0300,Ukraine,803880
Zaporizhzhya,47.8573,35.1768,Ukraine,788000
Kryvyy Rih,47.9283,33.3450,Ukraine,652380
Mykolayiv,46.9677,31.9843,Ukraine,510840
`;
function parseCSV(csvFileContent);
{
  return  {
    'city'          : item[0].toString(),
    'latitude'      : parseFloat(item[1]),
    'longitude'     : parseFloat(item[2]),
    'country'       : item[3].toString(),
    'population'    : parseInt(item[4]),
}
}


console.log( parseCSV( csvFileContent ) );

