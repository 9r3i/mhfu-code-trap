<?php
$ini="
; 42x Kelbi Horn
327=42
; 64x Genprey Fang
357=64
";

$req=parse_ini_string($ini);
$res=item($req,701);
$res.=noitem(701,702);

$out=file_put_contents('ULUS10391.item.ini',$res);
echo $out."\n";


/* bulk items */
function items(
  int $start,   // start of block
  int $len=1,   // length of block
  int $init=1,  // initial of item
  int $qt=1     // quantity of each item
  ){
  $s=0xd1c8;
  $g=4;
  $c=$start-1;
  $t=$len+$c;
  $a=dx($s+($g*$c));
  $b=dx(($s+2)+($g*$c));
  $l=dx($len);
  $v=dx($init);
  $m=dx($qt);
  /* activation code */
  $res="_C0 {$qt}x{$len}={$init} at {$start}-{$t} in Box\n";
  $res.="_L 0x8119{$a} 0x{$l}0002\n";
  $res.="_L 0x1000{$v} 0x00000001\n";
  $res.="_L 0x8119{$b} 0x{$l}0004\n";
  $res.="_L 0x0000{$m} 0x00000000\n";
  /* reverse codes */
  $res.="_C0 No Items at {$start}-{$t} in Box\n";
  $res.="_L 0x8119{$a} 0x{$l}0002\n";
  $res.="_L 0x10000000 0x00000001\n";
  $res.="_L 0x8119{$b} 0x{$l}0004\n";
  $res.="_L 0x00000000 0x00000000\n";
  return $res;
}

/* remove items */
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

/* specific items */
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

/* decimal to hexa */
function dx(int $d,int $l=4){
  return strtoupper(sprintf('%0'.$l.'s',dechex($d)));
}
