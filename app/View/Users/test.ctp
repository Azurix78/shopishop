<?php
foreach ($users as $key => $user)
{
	echo $user['User']['firstname'] . '</BR>' . $user['Role']['name'];
}
?>