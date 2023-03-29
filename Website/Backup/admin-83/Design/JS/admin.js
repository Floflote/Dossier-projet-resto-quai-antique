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

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $("#add_product_picturePreview").css(
        "background-image",
        "url(" + e.target.result + ")"
      );
      $("#add_product_picturePreview").hide();
      $("#add_product_picturePreview").fadeIn(650);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

$("#add_product_pictureUpload").change(function () {
  readURL(this);
});

/* Modification d'une image */

function readURL_Edit_Menu(input) {
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
  readURL_Edit_Menu(this);
});
