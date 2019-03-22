<?php
include_once ('../controller/member.php');
$memberList = new memberController();
$memberlist = $memberList -> getMemberList('a');

?>