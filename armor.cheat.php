<?php

//echo def(0x015A110,0x47D)."\n"; // weapons
//echo def(0x01633A8,0x1B3)."\n"; // helmet
//echo def(0x01677C8,0x1A3)."\n"; // plate
//echo def(0x016B968,0x19A)."\n"; // gauntlet
//echo def(0x016F9A0,0x198)."\n"; // waist
//echo def(0x0173988,0x1A3)."\n"; // legging

function def($start,$length=1,$begin=1){
  $res='';
  foreach(range($begin,$length) as $r){
    $s=$r-1;
    $t=0x28*$s;
    $u=dechex($start+$t);
    $v=sprintf('%07s',$u);
    $res.="_C0 Def $r\n";
    $res.="_L 0x8{$v} 0x00010028\n";
    $res.="_L 0x000000FF 0x00000000\n";
  }
  return file_put_contents('ULUS10391.ini',$res);
}
