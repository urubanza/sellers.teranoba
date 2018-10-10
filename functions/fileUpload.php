<?php
include('ImageResize.php');
use \Gumlet\ImageResize;
class uploadImage{
    
    public $uploadOk;
    public $imageFileType;
    public $fileName;
    public $imageSize;
    public $imageData;
    public $newName;
    public $imageSizebytes;
    public $error;
    function __construct($nameOfTheform)
 	{
        if(isset($_FILES["$nameOfTheform"])){
 		$this->fileName = $_FILES["$nameOfTheform"]["name"];
        $this->imageData = $_FILES["$nameOfTheform"]["tmp_name"];
        $this->imageSize = getimagesize($this->imageData);
        $this->imageSizebytes = $_FILES["$nameOfTheform"]["size"];
        $this->imageFileType = strtolower(pathinfo($this->fileName,PATHINFO_EXTENSION));
            } 
        else 
        {
            $this->error = 'undefined index '.$nameOfTheform;
            $this->uploadOk = false;
        }
        
 	}
    
    function upload($locations,$maximumBytes,$WIDTH,$height){
        $cont = 0;
        $temp = $locations.md5($cont).'.'.$this->imageFileType;
        $tempxx = md5($cont).'.'.$this->imageFileType;
        $temp2 = $locations.'pipTemps2018101.'.$this->imageFileType;
        while(file_exists($temp)) {
               $cont++;
               $temp = $locations.md5($cont).'.'.$this->imageFileType;
               $tempxx = md5($cont).'.'.$this->imageFileType;
            }
        if($this->imageSizebytes > $maximumBytes) {
        $this->error = "Sorry, your file is too large. and must be less than ".$maximumBytes;
        $this->uploadOk = false;
               }
        
        if($this->imageFileType != "jpg" && $this->imageFileType != "png" && $this->imageFileType != "jpeg" && $this->imageFileType != "gif" && $this->imageFileType != "GIF" && $this->imageFileType != "JPEG" && $this->imageFileType != "PNG" && $this->imageFileType != "JPG") {
        $this->error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed";
        //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $this->uploadOk = false;     
         }
        if (move_uploaded_file($this->imageData,$temp2)){
           $image = new ImageResize($temp2);
           $image->resize($WIDTH,$height);
           $image->save($temp);
           unlink($temp2);
           $this->uploadOk = true;
           $this->newName = $tempxx;
        }
      return $this->uploadOk;
  }
}
?>