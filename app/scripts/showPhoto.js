function showPhoto(albumId, photoCount, photoNo)
{
    if (albumId=="")
    {
        document.getElementById("picturebox").innerHTML="no photoalbum";
        return;
    }
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("picturebox").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","/modules/getPhoto.php?albumId="+albumId+"&photoCount="+photoCount+"&photoNo="+photoNo,true);
    xmlhttp.send();
}