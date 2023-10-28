<?php
$ini="
1=2
2=2
3=2
4=2
5=2
6=2

545=2
325=1

";

$req=parse_ini_string($ini);
echo item($req,801);
echo noitem(801,808);


function noitem(int $from=1,int $to=1){
  $to=$to>$from?$to:$from;
  $g=4;
  $c=$from-1;
  $s=0xd1c8;
  $t=$to-$c;
  $tt=$c+$t;
  $res="_C0 No Items -- {$t} blocks from {$from} to {$to} in Box\n";
  foreach(range($from,$to) as $k=>$d){
    $a=dx($s+($g*$c));
    $b=dx(($s+2)+($g*$c));
    $v=dx(0);
    $m=dx(0);
    $res.="_L 0x8119{$a} 0x00010002\n";
    $res.="_L 0x1000{$v} 0x00000001\n";
    $res.="_L 0x8119{$b} 0x00010004\n";
    $res.="_L 0x0000{$m} 0x00000000\n";
    $c++;
  }
  return $res;
}

function item(array $req,int $start=1){
  $g=4;
  $c=$start-1;
  $s=0xd1c8;
  $t=count($req);
  $tt=$c+$t;
  $res="_C0 {$t} Items -- Block {$start} to {$tt} in Box\n";
  foreach($req as $k=>$d){
    $a=dx($s+($g*$c));
    $b=dx(($s+2)+($g*$c));
    $v=dx($k);
    $m=dx($d);
    $res.="_L 0x8119{$a} 0x00010002\n";
    $res.="_L 0x1000{$v} 0x00000001\n";
    $res.="_L 0x8119{$b} 0x00010004\n";
    $res.="_L 0x0000{$m} 0x00000000\n";
    $c++;
  }
  return $res;
}

function dx(int $d,int $l=4){
  return strtoupper(sprintf('%0'.$l.'s',dechex($d)));
}


