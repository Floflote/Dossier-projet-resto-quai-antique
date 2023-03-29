/* Page Categories */
/* Ajout d'une catégorie */

$("#add_category_bttn").click(function () {
  var category_name = $("#category_name_input").val();
  var dataDo = "Add";

  if ($.trim(category_name) == "") {
    $("#required_category_name").css("display", "block");
  } else {
    $.ajax({
      url: "./Conf/Function/categorie-button.php",
      method: "POST",
      data: { category_name: category_name, do: dataDo },
      dataType: "JSON",
      success: function (message) {
        if (message["alert"] == "Attention") {
          swal("Attention", message["message"], "warning").then((value) => {});
        }
        if (message["alert"] == "Valide") {
          swal("Validé", message["message"], "success").then((value) => {
            window.location.replace("Categories.php");
          });
        }
      },
      error: function (xhr, status, error) {
        alert(
          "Une erreur est survenue lors de la requête. Veuillez réessayer."
        );
      },
    });
  }
});

/* Suppression d'une catégorie */

$(".delete_category_btn").click(function () {
  var category_id = $(this).data("id");
  var dataDo = "Delete";

  $.ajax({
    url: "./Conf/Function/categorie-button.php",
    method: "POST",
    data: { category_id: category_id, do: dataDo },
    success: function (data) {
      swal("Supprimée", "La catégorie a bien été supprimée !", "success").then(
        (value) => {
          window.location.replace("Categories.php");
        }
      );
    },
    error: function (xhr, status, error) {
      alert("Une erreur est survenue lors de la requête. Veuillez réessayer.");
    },
  });
});

/* Page Carte du restaurant */
/* Suppression d'un produit */

$(".delete_product_bttn").click(function () {
  var product_id = $(this).data("id");
  var dataDo = "Delete";

  $.ajax({
    url: "./Conf/Function/carterestaurant-button.php",
    method: "POST",
    data: {
      product_id: product_id,
      do: dataDo,
    },
    success: function (message) {
      swal("Supprimé", "Le produit a bien été supprimé !", "success").then(
        (value) => {
          window.location.replace("Carterestaurant.php");
        }
      );
    },
    error: function (xhr, status, error) {
      alert("Une erreur est survenue lors de la requête. Veuillez réessayer.");
    },
  });
});

/* Ajout d'une image */

function readURL_Add_Product(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $("#add_product_pictPreview").css(
        "background-image",
        "url(" + e.target.result + ")"
      );
      $("#add_product_pictPreview").hide();
      $("#add_product_pictPreview").fadeIn(650);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

$("#add_product_pictUpload").change(function () {
  readURL_Add_Product(this);
});

/* Modification d'une image */

function readURL_Edit_Product(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $("#modify_product_picturePreview").css(
        "background-image",
        "url(" + e.target.result + ")"
      );
      $("#modify_product_picturePreview").hide();
      $("#modify_product_picturePreview").fadeIn(650);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

$("#modify_product_pictureUpload").change(function () {
  readURL_Edit_Product(this);
});

/* Page Menu du restaurant */
/* Suppression d'un menu */

$(".delete_menu_button").click(function () {
  var menu_id = $(this).data("id");
  var dataDo = "Delete";

  $.ajax({
    url: "./Conf/Function/menu-button.php",
    method: "POST",
    data: {
      menu_id: menu_id,
      do: dataDo,
    },
    success: function (message) {
      swal("Supprimé", "Le menu a bien été supprimé !", "success").then(
        (value) => {
          window.location.replace("Menu.php");
        }
      );
    },
    error: function (xhr, status, error) {
      alert("Une erreur est survenue lors de la requête. Veuillez réessayer.");
    },
  });
});

/* Page Galerie */
/* Suppression d'une image */

$(".delete_picture_bttn").click(function () {
  var picture_id = $(this).data("id");
  var dataDo = "Delete";

  $.ajax({
    url: "./Conf/Function/galerie-button.php",
    method: "POST",
    data: {
      picture_id: picture_id,
      do: dataDo,
    },
    success: function (message) {
      swal("Supprimée", "L'image' a bien été supprimée !", "success").then(
        (value) => {
          window.location.replace("Galerie.php");
        }
      );
    },
    error: function (xhr, status, error) {
      alert("Une erreur est survenue lors de la requête. Veuillez réessayer.");
    },
  });
});

/* Ajout d'une image */

function readURL_Gal(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $("#add_gallery_picturePreview").css(
        "background-image",
        "url(" + e.target.result + ")"
      );
      $("#add_gallery_picturePreview").hide();
      $("#add_gallery_picturePreview").fadeIn(650);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

$("#add_gallery_pictureUpload").change(function () {
  readURL_Gal(this);
});

/* Page Clients */
/* Suppression d'un client */

$(".delete_customer_btn").click(function () {
  var customer_id = $(this).data("id");
  var dataDo = "Delete";

  $.ajax({
    url: "./Conf/Function/clients-button.php",
    method: "POST",
    data: { customer_id: customer_id, do: dataDo },
    success: function (data) {
      swal(
        "Supprimé",
        "Le compte client a bien été supprimé !",
        "success"
      ).then((value) => {
        window.location.replace("Clients.php");
      });
    },
    error: function (xhr, status, error) {
      alert("Une erreur est survenue lors de la requête. Veuillez réessayer.");
    },
  });
});

/* Page Reservation */
/* Suppression d'une reservation */

$(".delete_reservation_btn").click(function () {
  var reservation_id = $(this).data("id");
  var dataDo = "Delete";

  $.ajax({
    url: "./Conf/Function/reservation-button.php",
    method: "POST",
    data: { reservation_id: reservation_id, do: dataDo },
    success: function (data) {
      swal(
        "Supprimée",
        "La réservation a bien été supprimée !",
        "success"
      ).then((value) => {
        window.location.replace("Reservation.php");
      });
    },
    error: function (xhr, status, error) {
      alert("Une erreur est survenue lors de la requête. Veuillez réessayer.");
    },
  });
});
