<?php

function antiSqlInjection($data)
{
  $data = stripslashes($data);
  $data = strip_tags($data);
  $data = htmlentities($data);
  $data = htmlspecialchars($data);
  $data = addslashes($data);
  return $data;
}
