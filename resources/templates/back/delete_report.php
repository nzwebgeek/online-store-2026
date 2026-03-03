<?php require_once("../../config.php")?>
<?php
if (isset($_GET['id'])) {
  $query = query("DELETE FROM reports WHERE  report_id = " .escape_string($_GET["id"]));
  confirm($query);
  set_message("Deleted Report");
  redirect("../../../public/admin/index.php?reports");
}
else{
  redirect("../../../public/admin/index.php?reports");
}
?>