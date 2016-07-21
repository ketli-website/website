<?php
session_start();
include '../dbConnection.php';
function seoUrl($string) {
   $string = strtolower($string);
   $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
   $string = preg_replace("/[\s-]+/", " ", $string);
   $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
}
$aid=uniqid();
$title=$_POST['title'];
$college_id=$_POST['college_id'];
$branch_id=$_POST['branch_id'];
$year=$_POST['year'];
$user_id=$_SESSION['id'];
$user_name=$_SESSION['name'];
$flag='0';
$title = ucfirst(strtolower($title));
$branch_id=seoUrl($branch_id);
if(!file_exists("../assignment/".$college_id."/".$branch_id))
{
mkdir("../assignment/".$college_id."/".$branch_id);
}


$user_id=seoUrl($user_id);
if(!file_exists("../assignment/".$college_id."/".$branch_id."/".$user_id)){
mkdir("../assignment/".$college_id."/".$branch_id."/".$user_id);}


$temp=$aid;
$temp=seoUrl($temp);
if(!file_exists("../assignment/".$college_id."/".$branch_id."/".$user_id."/".$temp)){
mkdir("../assignment/".$college_id."/".$branch_id."/".$user_id."/".$temp);}

			mkdir("../assignment/".$college_id."/".$branch_id."/".$user_id."/".$temp."/thumb");

extract($_POST);
    $error=array();
    $extension=array("jpeg","jpg","png","gif","JPG","PNG");
    foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name)
        {
                $file_name=$_FILES["files"]["name"][$key];
                $file_tmp=$_FILES["files"]["tmp_name"][$key];
                $ext=pathinfo($file_name,PATHINFO_EXTENSION);
				$file_name = seoUrl($file_name);
				$filename=basename($file_name,$ext);
				$file_name = $filename.".".$ext;
				echo $file_name;
			if(!file_exists("../assignment/".$college_id."/".$branch_id."/".$user_id."/".$temp."/".$file_name))
			{ 
         		if (compress_image($file_tmp,"../assignment/".$college_id."/".$branch_id."/".$user_id."/".$temp."/".$file_name, 50)) 
				{
           			echo "<br>It's done!<br> Compressed <br>The file has been saved as: ../assignment/".$college_id."/".$branch_id."/".$user_id."/".$temp."/".$file_name."<br>";
		   			createThumbs("../assignment/".$college_id."/".$branch_id."/".$user_id."/".$temp,$file_name,200);
					if ($pic_url==Null){
						$pic_url='http://ketli.in/assignment/'.$college_id."/".$branch_id."/".$user_id."/".$temp."/thumb/".$file_name;
            	}}
				else { echo "Error!!! {$file_name} is not uploaded<br>"; }}
			else { echo "{$file_name} already exists<br>"; }
			
		}
			
			
			
//----------------------------------------------------------
			//compress function starts
function compress_image($source_url, $destination_url, $quality) 
	{

		$info = getimagesize($source_url);

    		if ($info['mime'] == 'image/jpeg')
        			$image = imagecreatefromjpeg($source_url);

    		elseif ($info['mime'] == 'image/gif')
        			$image = imagecreatefromgif($source_url);

   		elseif ($info['mime'] == 'image/png')
        			$image = imagecreatefrompng($source_url);
					
					elseif ($info['mime'] == 'image/JPG')
        			$image = imagecreatefromjpeg($source_url);

    		imagejpeg($image, $destination_url, $quality);
		return true;
	}
//Compress function ends
//----------------------------------------------------------

			
//Creating thumbnail starts
function createThumbs( $aname, $fname, $thumbWidth ) 
{
      echo "Creating thumbnail for {$aname}/{$fname} <br />";
      $img = imagecreatefromjpeg( "{$aname}/{$fname}" );
      $width = imagesx( $img );
      $height = imagesy( $img );
      $new_width = $thumbWidth;
      $new_height = floor( $height * ( $thumbWidth / $width ) );
      $tmp_img = imagecreatetruecolor( $new_width, $new_height );
      imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
      imagejpeg( $tmp_img, "{$aname}/thumb/{$fname}" );
}
//Creating thumbnail ends			

 $paper_folder_url='http://ketli.in/assignment/'.$college_id."/".$branch_id."/".$user_id."/".$temp;
 $txt='
<?php $aid=\''.$aid.'\' ; 
include \'../../../../temp.php\';?>
';

file_put_contents("../assignment/".$college_id."/".$branch_id."/".$user_id."/".$temp."/index.php", $txt, FILE_APPEND | LOCK_EX);


$q4=mysqli_query($con ,"INSERT INTO assignment(aid,title,college_id,year,user_id,user_name,photo,branch_id,paper_folder) VALUES('$aid','$title','$college_id','$year','$user_id','$user_name','$pic_url','$branch_id','$paper_folder_url')" ) or die ("Error 199");

echo 'Your Assignment has been Uploaded';

header("location:http://ketli.in/");







?>
