<?php

$client = CategoryMenuData::getById($_GET["id"]);
CategoryMenuData::delById_usergroups_categorias($_GET['id']);

$client->del();
Session::msg("s", "Draft correctly...");
//Core::redir("./?view=admincategorymenu");