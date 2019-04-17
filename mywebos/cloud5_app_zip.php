<?php
$uploaddir = 'publicapps';
$allowed = array('zip');
$max_size = 51200 * 1024;
while (list ($key, $val) = each ($_FILES))
{
   if ($_FILES[$key]['size'] <= $max_size) 
   {
      $file_ext  = pathinfo($_FILES[$key]['name'],PATHINFO_EXTENSION);
      $file_name = basename($_FILES[$key]['name'],'.'.$file_ext);
      if (in_array(strtolower($file_ext),$allowed)) 
      {
         $name = $_FILES[$key]['name'];
         $x = 1;
         while (file_exists($uploaddir.'/'.$name)) 
         {
            $name = $file_name.'['.$x.'].'.$file_ext;
            $x++;
         }
         if (move_uploaded_file($_FILES[$key]['tmp_name'],$uploaddir.'/'.$name)) 
         {
            chmod($uploaddir.'/'.$name, 0644);
         }
         else
         {
            die(error_get_last());
         }
      }
      else
      {
         die("Invalid file type");
      }
   }
   else
   {
      die("File size too big");
   }
}
echo "OK"; 
?>
