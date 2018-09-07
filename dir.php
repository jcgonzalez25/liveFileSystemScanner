<?php
$web = "http://cs.indstate.edu/";
$path = isset($_REQUEST['dir'])?$_REQUEST['dir']:"";
function create_print_link($file,$color){
  echo "<td>";    
  echo "<a href='"."http://cs.indstate.edu/".$file."' style='color:".$color.";'>".$file."</a>";
}
function printInfo($file){
  $mtime = new DateTime();
  $mtime -> setTimeStamp(stat("/net/web/".$file)['mtime']);
  $time = $mtime->format('M d y H:i:s');
  echo "<td>".filesize("/net/web/".$file);
  echo "<td>".$time;
  
}
$files = scandir($path);

if($files == FALSE){
  echo "<tr><td>No Files Found </tr>";
}else{
  foreach($files as $file){
    if($file[0] == '.')
      continue;
    echo "<tr>";
    if( is_dir($path.$file) ){
      create_print_link($file,"blue");
    }else{
      create_print_link($file,"green");
    }
    printInfo($file);
    echo "</tr>"; 
  }
}

?>
 
