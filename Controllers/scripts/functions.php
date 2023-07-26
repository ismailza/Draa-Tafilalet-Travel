<?php

function import_image($image, $target)
{
  $valid_extension = array("png", "jpeg", "jpg");
  $target_file = $target . "/" . $image['name'];
  $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
  $file_extension = strtolower($file_extension);
  if (in_array($file_extension, $valid_extension)) {
    if (move_uploaded_file($image['tmp_name'], $target_file)) return true;
    return false;
  }
  return false;
}
