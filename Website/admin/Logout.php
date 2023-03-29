<?php
session_start();

//Unset variables
session_unset();

//Destroy Session
session_destroy();

?>
<!DOCTYPE html>
<html lang="en">

<!-- Head -->

<head>

  <!-- Framework JS -->
  <script src="./Design/JS/sweetalert2.all.min.js"></script>

</head>

<!-- Body -->

<body>
  <script type="text/javascript">
    Swal.fire("Déconnecté", "Votre session administrateur a bien été fermée !", "info").then((value) => {
      window.location.replace("../index.php");
    });
  </script>
</body>

</html>

<?php
exit();
