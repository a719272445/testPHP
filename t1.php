<?php
$conn = new MongoClient ( "192.168.16.54" );
$db =$conn->selectDB("Createdb");
$collection=$db->Equipment;
$array=array('EquName'=>'钻机','EquModel'=>'KD100-4','EquFacturer'=>'安徽马鞭山');
//$options=array('safe'=>true);
$rs=$collection->insert($array);
echo "ID:".$array['_id'];
var_dump($rs);
?>