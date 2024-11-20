<?php
abstract class Model
{
  public abstract function insertData($id);
  public abstract function getData();
  public abstract function getDataById($id);
  public abstract function updateData($id, $data);
  public abstract function deleteData($id);
}
