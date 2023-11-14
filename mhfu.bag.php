<?php
$items=<<<EOD
39=Powertalon
41=Armortalon
38=Powercharm
40=Armorcharm
6=Alchemy Book
5=Combo Book 5
4=Combo Book 4
3=Combo Book 3

2=Combo Book 2
1=Combo Book 1
152=Gourmet BBQ Spit
72=Farcaster

65=Flash Bomb
14=Mega Juice
153=Whetstone
32=Ancient Potion

74=Traq Bomb
79=Shock Trap
66=Sonic Bomb
59=Poison Knife

16=Mega Demondrug
19=Mega Armorskin

EOD;
$qt=[
  1,1,1,1,1,1,1,1,
  1,1,1,1,
  5,5,20,1,
  8,1,10,5,
  5,5,
];
$qk=0;
$bagitems=parse_ini_string($items);
//print_r($bagitems);
$res="_S ULUS-10391
_G Monster Hunter Freedom Unite (USA)

_C0 Bag Items Set 1 Combo\n";
$addr1a=0xE168;
$addr1b=0xE16A;
$addr2a=0x4C46;
$addr2b=0x4C48;
$gab=4;
$count=0;
foreach($bagitems as $k=>$v){
  $qv=$qt[$qk];
  $qk++;
  $cgab=$gab*$count;
  $addr1ax=tohex($addr1a+$cgab);
  $addr1bx=tohex($addr1b+$cgab);
  $addr2ax=tohex($addr2a+$cgab);
  $addr2bx=tohex($addr2b+$cgab);
  
  $val1a=tohex($k);
  $val1b=tohex($qv);
  
  $res.="_L 0x8119{$addr1ax} 0x00010004
_L 0x0000{$val1a} 0x00000000
_L 0x8119{$addr1bx} 0x00010004
_L 0x0000{$val1b} 0x00000000
_L 0x8120{$addr2ax} 0x00010004
_L 0x0000{$val1a} 0x00000000
_L 0x8120{$addr2bx} 0x00010004
_L 0x0000{$val1b} 0x00000000
";
  $count++;
}

$res.="
_C0 Empty Bag Items
_L 0x8119E168 0x00180004
_L 0x00000000 0x00000000
_L 0x8119E16A 0x00180004
_L 0x00000000 0x00000000
_L 0x81204C46 0x00180004
_L 0x00000000 0x00000000
_L 0x81204C48 0x00180004
_L 0x00000000 0x00000000
";


echo $res;
echo file_put_contents('ULUS10391.bag.set.ini',$res)."\n";

function tohex(int $n){
  return strtoupper(sprintf('%04s',dechex($n)));
}

/*
445,296,332,443,263,



*/