<?php
//include('/home/confuuaj/public_html/dbconf.php');
//$protocol = $_SERVER['HTTPS'] == '' ? 'http://' : 'https://';
include($_SERVER['DOCUMENT_ROOT'] . '/dbconf.php');

function __getSingleValue($returnValue, $table, $whereCol, $whereValue){
    $db = new DataBase();
    $sql = "SELECT DISTINCT " . $returnValue . " FROM " . $table . " WHERE " . $whereCol . " = '" . $whereValue . "'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $returnresult =  $row[$returnValue];
        }
    } else{
       header('HTTP/1.0 404 not found');
       include('/home/confuuaj/public_html/404.php');
        exit();
    }
    return $returnresult;

}




function __getPageList(){

    $db = new DataBase();

    $sql = "SELECT * FROM " . $db::PAGE_TABLENAME;
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>Id</th><th>Title</th><th></th><th></th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
        <td>" . $row[$db::PAGE_IDCOL] . "</td>
        <td>" . $db::PAGE_TITLECOL . "</td>
        <td><a href='/admin/editpage.php?page=" . $row[$db::PAGE_TITLECOL] . "'><i class='fa fa-edit'></i>Edit</a></td>
        <td><a href='#'><i class='fa fa-trash'></i>Delete</a></td>
        </tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
//$db->close();
}

function __getPageFile($pageId) {
    $db = new DataBase();
    $resultTitle = "";
    $sql = "SELECT " . $db::PAGE_TITLECOL . " FROM " . $db::PAGE_TABLENAME . " WHERE " . $db::PAGE_IDCOL  . " = " . $pageId;
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $resultTitle =  $row[$db::PAGE_TITLECOL];
        }
    } else {
        
    }
    $pageFileName = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($resultTitle)))) . ".php";
    return $pageFileName;


}



function __getContent($pageId){

    $db = new DataBase();

    $sql = "SELECT " . $db::PAGECONTENT_CONTENTCOL . " FROM " . $db::PAGECONTENT_TABLENAME . " WHERE " . $db::PAGECONTENT_PAGEIDCOL  . " = " . $pageId;

    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<p>" . $row[$db::PAGECONTENT_CONTENTCOL] . "<p>";
        }
    }
//$db->close();
}



function __getTitle($pageId)
{

    $db = new DataBase();

    $sql = "SELECT * FROM pages WHERE idpages = " . $pageId;
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row["title"] == "Home") {
                echo "Set One's Cap";
            } else {
                echo $row["title"];
            }
        }
    } else {
        echo "0 results";
    }
}




function __getLinkList(){
    $db = new DataBase();
    $sql = "SELECT " . $db::PAGE_TITLECOL . " FROM " . $db::PAGE_TABLENAME;
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $title = $row[$db::PAGE_TITLECOL];
            $URLtitle = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($row[$db::PAGE_TITLECOL]))));
            if($row[$db::PAGE_TITLECOL] == "Home"){
                echo "<li><a href='/" . $db::ROOTURL . "'>" . $title . "</a></li>";
            }else{
                echo "<li><a href='" . $db::ROOTURL . "/" . $URLtitle . "/'>" . $title . "</a></li>";
            }
        }
    } else {
        echo "0 results";
    }
//$db->close();
}


function __getAdminLinkList(){
    $db = new DataBase();
    $sql = "SELECT * FROM " . $db::ADMINPAGES_TABLENAME;
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($row[$db::ADMINPAGES_PARENTIDCOL] == null || $row[$db::ADMINPAGES_PARENTIDCOL] == ""){
                $title = $row[$db::ADMINPAGES_TITLECOL];
                $URLtitle = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($row[$db::ADMINPAGES_TITLECOL]))));
                if($row[$db::ADMINPAGES_TITLECOL] == "Home"){
                    echo "<li><a href='" . $db::ROOTURL . "'><i class='" . $row[$db::ADMINPAGES_ICONCOL] . "'></i>" . $title . "</a></li>";
                }else{
                    echo "<li><a href='" . $db::ROOTURL . "/admin/" . $URLtitle . "'><i class='" . $row[$db::ADMINPAGES_ICONCOL] . "'></i>" . $title . "</a>";
                    $sql2 = "SELECT * FROM " . $db::ADMINPAGES_TABLENAME;
                    $result2 = $db->query($sql2);
                    $ul = 0;
                    $ulSet = false;
                    while($subrow = $result2->fetch_assoc()) {
                        $ul++;
                        $title = $subrow[$db::ADMINPAGES_TITLECOL];
                        $URLtitle = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($subrow[$db::ADMINPAGES_TITLECOL]))));
                        if ($subrow[$db::ADMINPAGES_PARENTIDCOL] == $row[$db::ADMINPAGES_IDCOL]){
                            if ($ulSet == false){
                                echo "<ul>";
                                $ulSet = true;
                            }
                            echo "<li><a href='" . $db::ROOTURL . "/admin/" . $URLtitle . "'><i class='" . $subrow[$db::ADMINPAGES_ICONCOL] . "'></i>" . $title . "</a></li>";
                        }
                    }
                    if ($ulSet==true){
                        echo "</ul>";
                    }
                    echo "</li>";
                }
            }
        }
    }else {
        echo "0 results";
    }
}


function __getPhotographer($albumTitle, $albumDate, $photographerLink){
    $db = new DataBase();
    $photographerLinkShort = (substr($photographerLink, 0, 3));

    $sql = "SELECT * FROM " . $db::PHOTOALBUMS_TABLENAME .
        " WHERE " . $db::PHOTOALBUMS_TITLECOL . " = '" . $albumTitle .
        "' AND " . $db::PHOTOALBUMS_DATECOL . " = '" . $albumDate .
        "' AND " . $db::PHOTOALBUMS_PHOTOGRAPHERCOL . " LIKE '" . $photographerLinkShort . "%'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            return $row[$db::PHOTOALBUMS_PHOTOGRAPHERCOL];
        }
    }
}

function __getPhotoalbumId($albumTitle, $albumDate, $photographerLink){
    $db = new DataBase();
    $photographerLinkShort = (substr($photographerLink, 0, 3));

    $sql = "SELECT * FROM " . $db::PHOTOALBUMS_TABLENAME .
        " WHERE " . $db::PHOTOALBUMS_TITLECOL . " = '" . $albumTitle .
        "' AND " . $db::PHOTOALBUMS_DATECOL . " = '" . $albumDate .
        "' AND " . $db::PHOTOALBUMS_PHOTOGRAPHERCOL . " LIKE '" . $photographerLinkShort . "%'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            return $row[$db::PHOTOALBUMS_IDCOL];
        }
    }
}

function __getPhotoAlbumMetaDescription($albumTitle, $albumDate, $photographerLink){
    $db = new DataBase();
    $photographerLinkShort = (substr($photographerLink, 0, 3));

    $sql = "SELECT * FROM " . $db::PHOTOALBUMS_TABLENAME .
        " WHERE " . $db::PHOTOALBUMS_TITLECOL . " = '" . $albumTitle .
        "' AND " . $db::PHOTOALBUMS_DATECOL . " = '" . $albumDate .
        "' AND " . $db::PHOTOALBUMS_PHOTOGRAPHERCOL . " LIKE '" . $photographerLinkShort . "%'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            return $row[$db::PHOTOALBUMS_DESCRIPTIONCOL];
        }
    }
}

function __getPhotoAlbumSize($albumTitle, $albumDate, $photographerLink){
    $db = new DataBase();
    $photographerLinkShort = (substr($photographerLink, 0, 3));

    $sql = "SELECT * FROM " . $db::PHOTOALBUMS_TABLENAME .
        " WHERE " . $db::PHOTOALBUMS_TITLECOL . " = '" . $albumTitle .
        "' AND " . $db::PHOTOALBUMS_DATECOL . " = '" . $albumDate .
        "' AND " . $db::PHOTOALBUMS_PHOTOGRAPHERCOL . " LIKE '" . $photographerLinkShort . "%'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            return $row[$db::PHOTOALBUMS_ALBUMSIZECOL];
        }
    }
}



function __getPhotoAlbum($albumId){
    $db = new DataBase();
    $albumTitle = __getSingleValue($db::PHOTOALBUMS_TITLECOL, $db::PHOTOALBUMS_TABLENAME, $db::PHOTOALBUMS_IDCOL, $albumId);
    $albumTitleStripped = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($albumTitle))));
    $albumDate = __getSingleValue($db::PHOTOALBUMS_DATECOL, $db::PHOTOALBUMS_TABLENAME, $db::PHOTOALBUMS_IDCOL, $albumId);
    $albumDateString = date("F j, Y", strtotime($albumDate));
    $albumDescription = __getSingleValue($db::PHOTOALBUMS_DESCRIPTIONCOL, $db::PHOTOALBUMS_TABLENAME, $db::PHOTOALBUMS_IDCOL, $albumId);
    $photographer = __getSingleValue($db::PHOTOALBUMS_PHOTOGRAPHERCOL, $db::PHOTOALBUMS_TABLENAME, $db::PHOTOALBUMS_IDCOL, $albumId);
    $photographerStripped = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($photographer))));
    $photoCount = __getSingleValue($db::PHOTOALBUMS_ALBUMSIZECOL, $db::PHOTOALBUMS_TABLENAME, $db::PHOTOALBUMS_IDCOL, $albumId);
    $sql = "SELECT * FROM " . $db::PHOTOS_TABLENAME . " WHERE " . $db::PHOTOS_ALBUMIDCOL . " = " . $albumId;
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
    //TODO Description at all photos    $photoCount = $result->num_rows;

        echo "<div class='col-4 news-post photoalbum-link'>";
            echo "<div class='panel bg-white fg-black no-padding'>";
                echo "<div class='no-padding album-thumb'>";
                    echo "<a onclick='showPhoto($albumId, $photoCount, 1)' href='#photoalbum'><img src='/images/photoalbums/" . strtolower($albumTitleStripped) . "-" . $albumDate . "-" . $photographerStripped . ".jpg' width='587' height='330' alt='" . $albumTitle . "' class='' /></a>";
                echo "</div>";
                echo "<div>";
                    echo "<h3>" .  $albumTitle . "</h3>";
                    echo "<p class='album-date'>" . $albumDateString . "</p>";
                    echo "<p>" . $albumDescription . "</p>";
                    echo "<p>Photos by " . $photographer . "</p>";
                    echo "<a onclick='showPhoto($albumId, $photoCount, 1)' href='#photoalbum' rel='nofollow' class='button bg-setonescap-red' title='Watch " . $albumTitle . " photos'><span class='fa fa-photo'></span> Watch photos</a>";
                    echo "<a href='/photos/" . $albumTitleStripped . "/" . $albumDate . "/" . $photographerStripped . "/' class='button bg-setonescap-red' title='Watch " . $albumTitle . " gallery'><span class='fa fa-th'></span> Watch gallery</a>";
                echo "</div>";
            echo "</div>";

        echo "</div>";

    } else {
        echo "0 results albun";
    }
    //$db->close();
}

function __getPhotoAlbums($band){
    $db = new DataBase();
    $sql = "SELECT DISTINCT ". $db::PHOTOALBUMS_TITLECOL .", " . $db::PHOTOALBUMS_IDCOL . ", " . $db::PHOTOALBUMS_DATECOL .
           " FROM " . $db::PHOTOALBUMS_TABLENAME .
           " WHERE " . $db::PHOTOALBUMS_BANDCOL . " LIKE '" . $band .
           "' ORDER BY " . $db::PHOTOALBUMS_DATECOL . " DESC";

    $result = $db->query($sql);
    $photoCount = $result->num_rows;

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            __getPhotoAlbum($row[$db::PHOTOALBUMS_IDCOL]);
        }
    }else {
        echo "0 photoalbums";

    }
    //$db->close();
}

function __getPhotoDescription($albumId, $photoNo){
    $db = new DataBase();

    $albumTitle = __getSingleValue($db::PHOTOALBUMS_TITLECOL, $db::PHOTOALBUMS_TABLENAME, $db::PHOTOALBUMS_IDCOL, $albumId);
    $albumDate = __getSingleValue($db::PHOTOALBUMS_DATECOL, $db::PHOTOALBUMS_TABLENAME, $db::PHOTOALBUMS_IDCOL, $albumId);

    $sql = "SELECT * FROM " . $db::PHOTOS_TABLENAME . " WHERE " . $db::PHOTOS_ALBUMIDCOL . " = " . $albumId . " AND " . $db::PHOTOS_NOCOL . " = " . $photoNo;
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            return $row[$db::PHOTOS_DESCRIPTIONCOL];
        }
    }
}

function __getPhoto($albumId, $photoNo){
    $db = new DataBase();

    $albumTitle = __getSingleValue($db::PHOTOALBUMS_TITLECOL, $db::PHOTOALBUMS_TABLENAME, $db::PHOTOALBUMS_IDCOL, $albumId);
    $albumTitleStripped = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($albumTitle))));
    $albumDate = __getSingleValue($db::PHOTOALBUMS_DATECOL, $db::PHOTOALBUMS_TABLENAME, $db::PHOTOALBUMS_IDCOL, $albumId);
    $band = __getSingleValue($db::PHOTOALBUMS_BANDCOL, $db::PHOTOALBUMS_TABLENAME, $db::PHOTOALBUMS_IDCOL, $albumId);
    $photographer = __getSingleValue($db::PHOTOALBUMS_PHOTOGRAPHERCOL, $db::PHOTOALBUMS_TABLENAME, $db::PHOTOALBUMS_IDCOL, $albumId);
    $photographerStripped = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^a-zA-Z0-9 s]/', '', trim($photographer))));
    $photoDescription = __getPhotoDescription($albumId, $photoNo);

    if($photoDescription == '' || $photoDescription == null) {
        $altText = "Set One&#39;s Cap at " . $albumTitle;
    }else{
        $altText = "Picture of " . $photoDescription;
    }

    //$sql = "SELECT * FROM " . $db::PHOTOS_TABLENAME . " WHERE " . $db::PHOTOS_ALBUMIDCOL . " = " . $albumId . " AND " . $db::PHOTOS_NOCOL . " = " . $photoNo;
    //$result = $db->query($sql);


   /* if ($result->num_rows > 0) {


        while($row = $result->fetch_assoc()) { */
            echo "<span class='helper'></span>";
            if ($photoNo < 10) {
                echo "<img src='" . $db::PHOTOS_ROOTURL . "/small/" . $photographerStripped . "/" . $band . "-" . strtolower($albumTitleStripped) . "-" . $albumDate . "-0" . $photoNo . ".jpg' alt='" . $altText . "'/>";
            }else{
                echo "<img src='" . $db::PHOTOS_ROOTURL . "/small/" . $photographerStripped . "/" . $band . "-" . strtolower($albumTitleStripped) . "-" . $albumDate . "-" . $photoNo . ".jpg' alt='" . $altText . "'/>";
            }
    /*    }
    } else {
        echo "0 photos";
    }*/
}




?>