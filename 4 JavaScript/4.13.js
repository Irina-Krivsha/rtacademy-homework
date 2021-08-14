function sum (a, b )
{
 if( a<b )
 {
 return a + sum(a, b - 1 );
 }
 return b=a;
}
console.log( sum( 1, 3 ) ); // 6
console.log( sum( 1, 10 ) ); // 55
console.log( sum( 100, 1000 ) ); // 495550