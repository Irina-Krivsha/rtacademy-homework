for( let i = 1; i <= 32; i++ )
{
    if (i % 10==0) 
    {
    console.log ("^"+i) 
    }
    else if( i % 4 == 0 ) 
        {
         console.log("*"+i)
        } 
    else if (i % 2==0)
        {
            console.log(i)
        }
}
