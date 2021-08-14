function getSign (num)
{
    return (num>0)? "+" : (num<0 ? "-": "0")
}
let sign = getSign( 0 );
console.log( sign );
