<?php
/**
 * mhfu.name
 * ~ change avatar name
 * authored by 9r3i
 * https://girhub.com/9r3i/mhfu-code-trap
 * started at october 31at 2023
 */


/* get input name */
$name=$argv[1]??'';
/* get name key and value */
$dname=getName($name);
/* get the code */
$code=getCode($dname);
/* primt the result */
echo $code;


/* get code from object name */
function getCode(object $name):string{
  $res="_C0 Change Name to {$name->value}\n";
  $c=0;
  $b=0xA240;
  for($i=0;$i<8;$i++){
    $d=dx($b+(2*$i));
    $k=isset($name->key[$i])?$name->key[$i]:'00';
    $res.="_L 0x1119{$d} 0x000000{$k}\n";
  }
  $res.="_L 0x5119A240 0x00000010\n";
  $res.="_L 0x012014F8 0x00000000\n";
  return $res;
}

/* get name key and value */
function getName(string $name):object{
  /* get data */
  $data=getData();
  
  $dname=str_split($name,1);
  $new=[];
  $xname='';
  foreach($dname as $dn){
    if(in_array($dn,$data)){
      $new[]=array_search($dn,$data);
      $xname.=$dn;
    }
    if(count($new)>=8){
      break;
    }
  }
  return (object)[
    'key'=>$new,
    'value'=>$xname,
  ];
}

/* get data */
function getData():array{
  /* get legal characters */
  $txt=file_get_contents(__FILE__,false,null,
    __COMPILER_HALT_OFFSET__);
  /* convert into an array of data */
  preg_match_all('/([0-9A-F]{2})=(.)/',$txt,$akur);
  return array_combine($akur[1],$akur[2]);
}

/* decimal to hexa */
function dx(int $d,int $l=4):string{
  return strtoupper(sprintf('%0'.$l.'s',dechex($d)));
}

__halt_compiler();

21=!
22="
23=#
24=$
25=%
26=&
27='
28=(
29=)
2A=*
2B=+
2C=,
2D=-
2E=.
2F=/
30=0
31=1
32=2
33=3
34=4
35=5
36=6
37=7
38=8
39=9
3A=:
3B=;
3C=<
3D==
3E=>
3F=?
40=@
41=A
42=B
43=C
44=D
45=E
46=F
47=G
48=H
49=I
4A=J
4B=K
4C=L
4D=M
4E=N
4F=O
50=P
51=Q
52=R
53=S
54=T
55=U
56=V
57=W
58=X
59=Y
5A=Z
5B=[
5C=\
5D=]
5E=^
5F=_
60=`
61=a
62=b
63=c
64=d
65=e
66=f
67=g
68=h
69=i
6A=j
6B=k
6C=l
6D=m
6E=n
6F=o
70=p
71=q
72=r
73=s
74=t
75=u
76=v
77=w
78=x
79=y
7A=z
7B={
7C=|
7D=}
7E=~