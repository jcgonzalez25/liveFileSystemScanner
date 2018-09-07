<!DOCTYPE html>
<html>
<head>
<style>
table{
  margin:auto;
}
thead{
  font-size:44px;
  display:inline-block;
  height:100px;
  text-align:left;
}
td,th{
  width:250px;
}
tbody{
  font-size:20px;
  display:block;
  height:500px;
  overflow-y:scroll;
}
#input_dir{
  display:block;
  width:100%;
  height:40px;
  font-size:90%;
}
</style>
</head>

<body>
<div>
  <table>
  <thead>
    <tr> 
    <th colspan="3">
     <input id="input_dir" type="text" oninput="dir_request(event);" autocomplete="off" autocorrect="off" spellcheck="false"></input></tr>
    <tr>
     <th>Name
     <th>Size
     <th>MTime</tr></thead>
  <tbody id="body">     
  </tbody> 
  </table>
</div>
<script>
  var init = 0;
  var st = "/net/web/";
  window.onload = function(){
    document.getElementById("input_dir").value=st;
    console.log(st);	 
    getFiles(st);
   
  }
  function getFiles(dir){
      var xml = new XMLHttpRequest();
      xml.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200){
	     
	      document.getElementById("body").innerHTML=this.responseText;
	}
      }
      xml.open("GET","dir.php?dir="+dir,false);
      xml.send();
  }
  
  function dir_request(ev){
    st = ev.target.value;
    getFiles(st);
    console.log(st);
  }
</script>

</body>
</html>

