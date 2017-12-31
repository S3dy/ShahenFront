<?php
echo $users;
$json=json_decode($users,true);
echo $json[0]['pro_prop_count']['Python developer'];
echo $json[1]['jobs'][0]['name_your_job_posting'];
?>