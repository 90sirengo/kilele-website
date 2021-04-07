<?php 
$conn = mysqli_connect('localhost', 'root', '', 'bliss');
//$adm = $_SESSION['username'];
$sql = "SELECT * FROM newsletter /*WHERE filename = $adm";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);
// Downloads files
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM newsletter WHERE filename = $adm";
    $result = mysqli_query($conn, $sql);

    $files = mysqli_fetch_assoc($result);
    $filepath = 'newsletter/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('newsletter/' . $file['name']));
        readfile('newsletter/' . $file['name']);

        
        exit;
    }

}







 ?>