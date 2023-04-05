<script>
  // Add active class to the current button (highlight it)
  var btnContainer = document.getElementById("btnContainer");
  var btns = btnContainer.getElementsByClassName("product_category_name");
  for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
      var current = document.getElementsByClassName("active_category");
      current[0].className = current[0].className.replace(" active_category", "");
      this.className += " active_category";
    });
  };
</script>