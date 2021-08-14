let num = -17;
let resultSign="0"; 
switch( true )
{
case (num>0): resultSign="+"; break;
case (num<0): resultSign="-"; break;
}
console.log( num, resultSign );