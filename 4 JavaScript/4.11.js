function getRandomInt(min, max)
{
    return Math.floor(Math.random ()*(max)); 
}
let randomInt = getRandomInt( 1, 100 );
console.log('Випадкове число:' + randomInt );
