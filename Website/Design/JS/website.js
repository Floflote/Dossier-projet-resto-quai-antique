/* Product category switch

function showCategoryProduct(evt, categoryName) {
  var i, choice_category_content, choice_category_link;

  choice_category_content = document.getElementsByClassName(
    "choice_category_content"
  );
  choice_category_link = document.getElementsByClassName(
    "choice_category_link"
  );

  for (i = 0; i < choice_category_content.length; i++) {
    choice_category_content[i].style.display = "none";
  }

  for (i = 0; i < choice_category_link.length; i++) {
    choice_category_link[i].className = choice_category_link[
      i
    ].className.replace(" active_category", "");
  }

  document.getElementById(categoryName).style.display = "block";
  evt.currentTarget.className += " active_category";
} */

/* Check form Bootstrap */

(() => {
  "use strict";

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll(".needs-validation");

  // Loop over them and prevent submission
  Array.from(forms).forEach((form) => {
    form.addEventListener(
      "submit",
      (event) => {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add("was-validated");
      },
      false
    );
  });
})();

//Filter selection
filterSelection("all"); // Execute the function and show all columns
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("productscarte");
  if (c == "all") c = "";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {
    productRemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) productAddClass(x[i], "show");
  }
}

// Show filtered elements
function productAddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function productRemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}

// No-product
$(document).on("click", "body", function () {
  var $productexist = $(".productexist div");
  var $productnoexist = $("#productnoexist");
  if (!$productexist.hasClass("show")) {
    $productnoexist.addClass("show");
  } else {
    $productnoexist.removeClass("show");
  }
});

//Resa
let field = document.querySelector("#date");
// Handle date changes
$("#date").on("input", function () {
  var $days = [
    $(".sunday"),
    $(".monday"),
    $(".tuesday"),
    $(".wednesday"),
    $(".thursday"),
    $(".friday"),
    $(".saturday"),
  ];
  var $alldays = $(".weekday-display");

  // Get the date
  let date = new Date(field.value);
  let day = date.getDay();

  //Display schedules
  for (i = 0; i <= 6; i++) {
    if (day == i) {
      $alldays.removeClass("show");
      $days[i].addClass("show");
    }
  }
});
