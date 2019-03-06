<?php
if($user_level!=$thislevel)
{
	echo "<script> window.location = 'level$user_level.php?'; </script>";
	// header('Location: /NCS_Game/level'.$user_level.'.php');
	die();
}
?>