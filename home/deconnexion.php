<?php
session_start();
session_destroy();
session_regenerate_id(true);
header("Location:login.php");
exit();
?>
<script>
  history.pushState(null, null, location.href);
  window.onpopstate = function () {
      history.go(1);
  };
</script>
