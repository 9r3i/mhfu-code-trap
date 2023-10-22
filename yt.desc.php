<?php
$data=<<<EOD
usn_number=088
quest_name="Absolute Zero"
quest_name_hashtag="absolutezero"
quest_location="Snowy Mountain Peak"
quest_location_hashtag=snowymountainpeak
quest_level=G3
hunter_rank=9
monster_name="Ukanlos"
monster_name_hashtag="ukanlos"
status="Slayed"
notes=""
character=Grey
multiplayer_bool="No"
weapons="Dual Blades"
weapons_hashtag=dualblades
armor_set="Silent Master Trap"
used_cheat=0
disclaimer_a="This content of video game is used for entertainment purpose only and was played using cheats. There is no warranty if you do the same way will have the same result. And all of your issues are in your own personal matters only."
disclaimer_b="This content of video game is not best way to win the fight against the monster, there is many other ways to defeat it/them. Also there is no warranty if you do the same way will have the same result. And all of your issues are in your own personal matters only."
disclaimer="--"
EOD;
$txt=file_get_contents(__FILE__,false,null,__COMPILER_HALT_OFFSET__);
$ini=parse_ini_string($data);
$ptrn='/<([a-z_]+)>/';

/* replacing for new items */
$new=[];
foreach($ini as $k=>$v){
  if($k=='disclaimer'){
    $new['<'.$k.'>']=$new['<used_cheat>']
      ?$new['<disclaimer_a>']:$new['<disclaimer_b>'];
  }else{
    $new['<'.$k.'>']=$v;
  }
}

/* start replacing copy */
$res=strtr(trim($txt),$new)."\n\n";
$nkey=$new['<usn_number>'];
$file='mhfu-'.$nkey.'.txt';
if(!is_file($file)){
  echo 'File: '.$file."\n";
  /* writing */
  echo @file_put_contents($file,$res)."\n\n";
}else{
  echo "Error: File is already created.\n\n";
}
// star html 0x2605
// G★★★


__halt_compiler();


Monster Hunter Freedom Unite

MHFU: <quest_name> (<weapons>) - 1080p 60fps HD Texture

Quest: <quest_name>
Weapons: <weapons>
Armor Set: <armor_set> 
Level: <quest_level>
HR: <hunter_rank>
Location: <quest_location>
Monsters: <monster_name>
Status: <status>
Notes: <notes>
Character: <character>
USN: mhfu<usn_number>
Quality: Full HD Graphic Rendering, 1080p 60fps, i100mspbs
Texture: Replacement (HD Textures)
Multiplayer: <multiplayer_bool>

#mhfu 
#<weapons_hashtag> 
#<monster_name_hashtag> 
#<quest_location_hashtag> 
#<quest_name_hashtag> 
#grank 
#hdtexture 
#hdtextures 


DISCLAIMER
<disclaimer>


SOURCES
Game Source: https://www.capcom.co.jp/monsterhunter/P2ndG/
Emulator Source: https://www.ppsspp.org/
HD Texture Source: https://github.com/9r3i/mhfu-hd-texture


DESCRIPTION TAGS
mh
mhfu
mhp2g
mhp2ndg
monster hunter
monster hunter freedom unite
monster hunter portable 2nd g
monster hunter freedom unite g-rank
monster hunter freedom unite psp emulator
monster hunter freedom unite ppsspp
monster hunter freedom unite walkthrough
monster hunter freedom unite gameplay
monster hunter freedom unite android
monster hunter freedom unite vs <monster_name>
monster hunter freedom unite hd textures
monster hunter freedom unite psp gameplay
monster hunter freedom unite <weapons>
monster hunter freedom unite armor set
monster hunter freedom unite best armor set
<weapons>
<weapons> guide
<weapons> gameplay
<weapons> tutorial
<weapons> monster hunter
<weapons> monster hunter freedom unite
<armor_set> armor set
g-rank
g-rank monster hunter
g-rank monster hunter freedom unite
g-rank <monster_name>
hd texture
hd textures
the best monster hunter game
best monster hunter game
best monster hunter
freedom unite
psp emulator
ppsspp
emulator
android
gameplay
best
gaming
game
mhfu hd
mhfu hd texture
mhfu hd textures
mhfu ppsspp
mhfu android

