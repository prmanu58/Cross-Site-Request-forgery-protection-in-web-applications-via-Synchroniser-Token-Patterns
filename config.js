var CSRF_token;

function loadDOC(method,url,htmlTag)
{
    var xhttp = new XMLHttpRequest(); 
    xhttp.onreadystatechange = function() //execute when recieve an answer from server side
    {
        if(this.readyState==4 && this.status==200)
        {
            console.log("CSRF token scuessfully fetched : "+this.responseText);
            document.getElementById(htmlTag).value = this.responseText;
            
        }
    };

    xhttp.open(method,url,true);
    xhttp.send();
}

