<?php
/**
 * Displays User information
 */
?>
<html>
<head><title>View Users</title>
<style>
body {
  font: normal medium/1.4 sans-serif;
}
table {
  border-collapse: collapse;
  width: 20%;
  margin-left: auto;
  margin-right: auto;
}
tr > td {
  padding: 0.25rem;
  text-align: center;
  border: 1px solid #ccc;
}
tr:nth-child(even) {
  background: #FAE1EE;
}
tr:nth-child(odd) {
  background: #edd3ff;
}
tr#header{
background: #c1e2ff;
}
td#sync{
background: #fff;
}
div.header{
padding: 10px;
background: #e0ffc1;
width:30%;
color: #008000;
margin:5px;
}
div.refresh{
margin-top:10px;
width: 5%;
margin-left: auto;
margin-right: auto;
}
div#norecord{
margin-top:10px;
width: 15%;
margin-left: auto;
margin-right: auto;
}
img{
height: 32px;
width: 32px;
}
</style>
<script>
var val= setInterval(function(){
location.reload();
},2000);
</script>
</head>
<body>
<?php
    include_once 'db_functions.php';
    $db = new DatabaseFunction();
    $result = $db->getAllUsers();
    $users  = $result['data'];
        
    if ($result['flag'] != false)
        $no_of_users = count($users);
    else
        $no_of_users = 0;
 
?>
<center>
<div id="link_insert_user"><a href="http://ray-renaldi.com:44400/services/insert_user.php">Add New User</a></div>
<div class="header">
View Users
<h2>There's <?= $no_of_users ?> users</h2>
</div>
</center>
<?php
    if ($no_of_users > 0) {
?>

<table>
<tr id="header"><td>Id</td><td>Username</td><td>Sync Status</td></tr>
<?php
	for($i = 0; $i < $no_of_users; $i++) {    
?> 
<tr>
<td><span><?php echo $users[$i]['id'] ?></span></td>
<td><span><?php echo $users[$i]['name'] ?></span></td>
<td id="sync"><span>
<?php 
if($users[$i]['sync_status'])
{ 
echo "<img src='img/sync.png'/>"; 
}else { 
echo "<img src='img/unsync.png'/>";
} 
?></span></td>
</tr>
<?php } ?>
</table>
<?php }else{ ?>
<div id="norecord">
No records in MySQL DB
</div>
<?php } ?>
</body>
</html>