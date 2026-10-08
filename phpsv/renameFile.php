<?php 
include('../connectdata/cnectDB.php');
$_POST['data'] = '1';
if(isset($_POST['data'])){
	$data = $_POST['data'];

//echo $data;
     $mysqli = mysqli_query($con, 'select * from book_store_tb');
     while($result = mysqli_fetch_array($mysqli)){
        // echo $result['ISBN'];
        $path = "../COVERIMAGES/".$result['ISBN'].".jpg";
        // echo $path;
        if(file_exists($path))
        {
            // echo "test";
            $flgRename = rename($path, "../COVERIMAGES/".$result['IDLIKBOOK'].".jpg");
            if(!$flgRename){
                echo"<pre>";
                echo "error".$result['IDLIKBOOK'];
            }else{
                echo"<pre>";
                echo "success".$result['IDLIKBOOK'];
            }
            }else{
                // echo "test-2";
            }
            
    } 
}

?>