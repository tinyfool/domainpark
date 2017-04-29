<?php

function updateChannels() {


	$sql = "SELECT `id`,`rssurl` FROM `channels`;";
  $result=mysql_query($sql);

  if(!$result)
    return;
  
  while ($row = mysql_fetch_assoc($result)) {
    
  	updateChannel($row);
  }
}

function updateChannel($channel) {

	$rss = fetch_rss($channel["rssurl"]);
	$cid = $channel["id"];
	updateChannelInfo($cid,$rss->channel);
	foreach ($rss->items as $item) {
		updateItem($cid,$item);
	}
}

function updateItem($cid, $item) {

	$title = mysql_real_escape_string($item["title"]);
	$link = mysql_real_escape_string($item["link"]);
	$guid = mysql_real_escape_string($item["guid"]);
	$updatetime = $item["date_timestamp"];
	$sql = "INSERT INTO `contents`
 					(`title`,`guid`,`url`,`updatetime`,`cid`)
					VALUES(	'$title',
									'$guid',
									'$link',
									'$updatetime',
									$cid
								);";
	mysql_query($sql);
}

function updateChannelInfo($id, $info) {

	$title = mysql_real_escape_string($info["title"]);
	$link = mysql_real_escape_string($info["link"]);
	$sql = "UPDATE `channels`
					SET `title`='$title',`url`='$link'
					WHERE `id` = $id; ";
	mysql_query($sql);
}


function contents() {


	$sql = "SELECT `contents`.`url`, `contents`.`title`, `updatetime`, 
			`channels`.`title` as `ctitle`, `channels`.`url` as `curl`
			FROM `contents` 
			LEFT JOIN `channels` ON `contents`.`cid` = `channels`.`id`
			ORDER BY `updatetime` DESC
			";

  $result=mysql_query($sql);

  if(!$result)
    return;
  
  $data = array();
  while ($row = mysql_fetch_assoc($result)) {
    
    $data[] = $row;
  }
  return $data;
}