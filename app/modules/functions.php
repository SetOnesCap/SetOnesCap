<?php

include('./dbconf.php');


function __getSingleValue($returnValue, $table, $whereCol, $whereValue){


    $db = new DataBase();
    $sql = "SELECT DISTINCT " . $returnValue . " FROM " . $table . " WHERE " . $whereCol . " = '" . $whereValue . "'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $returnresult =  $row[$returnValue];
        }
    } else {
        $returnresult = 0;
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
        echo "0 results";
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
    } else {
        echo "0 results";
    }
//$db->close();
}



function __getTitle($pageId){

    $db = new DataBase();

    $sql = "SELECT * FROM pages WHERE idpages = " . $pageId;
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "- Title: " . $row["title"];
        }
    } else {
        echo "0 results";
    }
//$db->close();
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
                echo "<li><a href='/" . $db::ROOTURL . "'>" . $title . "</a><li>";
            }else{
                echo "<li><a href='" . $db::ROOTURL . "/" . $URLtitle . "'>" . $title . "</a><li>";
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
                    echo "<li><a href='" . $db::ROOTURL . "/" . $URLtitle . "'><i class='" . $row[$db::ADMINPAGES_ICONCOL] . "'></i>" . $title . "</a>";
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
                            echo "<li><a href='" . $db::ROOTURL . "/" . $URLtitle . "'><i class='" . $subrow[$db::ADMINPAGES_ICONCOL] . "'></i>" . $title . "</a></li>";
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
//$db->close();
}


function __getPhotoAlbum($albumId){
    $db = new DataBase();
    $albumTitle = __getSingleValue($db::PHOTOALBUMS_TITLECOL, $db::PHOTOALBUMS_TABLENAME, $db::PHOTOALBUMS_IDCOL, $albumId);
    //$albumDate = __getSingleValue($db::PHOTOALBUMS_DATECOL, $db::PHOTOALBUMS_TABLENAME, $db::PHOTOALBUMS_IDCOL, $albumId);

    $sql = "SELECT * FROM " . $db::PHOTOS_TABLENAME . " WHERE " . $db::PHOTOS_ALBUMIDCOL . " = " . $albumId;

    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $photoCount = $result->num_rows;
        echo "<a onclick='showPhoto($albumId, $photoCount, 1)'> $albumTitle </a>";
    } else {
        echo "0 results albun";
    }
    //$db->close();
}

function __getPhotoAlbums(){
    $db = new DataBase();
    $sql = "SELECT DISTINCT ". $db::PHOTOALBUMS_TITLECOL .", " . $db::PHOTOALBUMS_IDCOL . ", " . $db::PHOTOALBUMS_DATECOL . " FROM " . $db::PHOTOALBUMS_TABLENAME;

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

function __getPhoto($albumId, $photoNo){
    $db = new DataBase();

    $albumTitle = __getSingleValue($db::PHOTOALBUMS_TITLECOL, $db::PHOTOALBUMS_TABLENAME, $db::PHOTOALBUMS_IDCOL, $albumId);
    $albumDate = __getSingleValue($db::PHOTOALBUMS_DATECOL, $db::PHOTOALBUMS_TABLENAME, $db::PHOTOALBUMS_IDCOL, $albumId);

    $sql = "SELECT * FROM " . $db::PHOTOS_TABLENAME . " WHERE " . $db::PHOTOS_ALBUMIDCOL . " = " . $albumId . " AND " . $db::PHOTOS_NOCOL . " = " . $photoNo;
    $result = $db->query($sql);


    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            if ($photoNo < 10) {
                echo "<img src='" . $db::PHOTOS_ROOTURL . "/confusion-" . $albumTitle . "-" . $albumDate . "-0" . $photoNo . ".jpg'/>";
            }else{
                echo "<img src='" . $db::PHOTOS_ROOTURL . "/confusion-" . $albumTitle . "-" . $albumDate . "-" . $photoNo . ".jpg'/>";
            }
            echo "<p>" . $row[$db::PHOTOS_DESCRIPTIONCOL] . "</p>";
        }
    } else {
        echo "0 photos";
    }
//$db->close();
}

?>



