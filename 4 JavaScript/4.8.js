let cityName='стОКГольМ';
function capitalize (cityName)
{
return cityName[0].toUpperCase()+cityName.substring(1).toLowerCase();
}
let cityNameCapitalized = capitalize('стОКГольМ');
console.log(cityNameCapitalized);