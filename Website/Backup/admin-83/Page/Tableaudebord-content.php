<div class="row">

  <!-- Card category -->

  <div class="col-sm-6 col-lg-3 mt-4">
    <div class="card card-category ">
      <div class="card-heading">
        <div class="row">
          <div class="col-3">
            <i class="fa-sharp fa-solid fa-square-poll-horizontal fa-4x"></i>
          </div>
          <div class="col-9 text-end">
            <div class="enlarge"><span><?php echo countItems("category_id", "category") ?></span></div>
            <div class="card-text">Catégories</div>
          </div>
        </div>
      </div>
      <a href="./Categories.php">
        <div class="card-footer">
          <span class="pull-left">Voir les détails</span>
          <span class="pull-right"><i class="fa-sharp fa-solid fa-circle-chevron-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>

  <!-- Card carte -->

  <div class="col-sm-6 col-lg-3 mt-4">
    <div class="card card-carte ">
      <div class="card-heading">
        <div class="row">
          <div class="col-3">
            <i class="fa-sharp fa-solid fa-burger fa-4x"></i>
          </div>
          <div class="col-9 text-end">
            <div class="enlarge"><span><?php echo countItems("product_id", "product") ?></span></div>
            <div class="card-text">Plats</div>
          </div>
        </div>
      </div>
      <a href="./Carterestaurant.php">
        <div class="card-footer">
          <span class="pull-left">Voir les détails</span>
          <span class="pull-right"><i class="fa-sharp fa-solid fa-circle-chevron-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>

  <!-- Card menu -->

  <div class="col-sm-6 col-lg-3 mt-4">
    <div class="card card-menu ">
      <div class="card-heading">
        <div class="row">
          <div class="col-3">
            <i class="fa-sharp fa-solid fa-utensils fa-4x"></i>
          </div>
          <div class="col-9 text-end">
            <div class="enlarge"><span><?php echo countItems("menu_id", "menu") ?></span></div>
            <div class="card-text">Menus</div>
          </div>
        </div>
      </div>
      <a href="AREMPLIR************">
        <div class="card-footer">
          <span class="pull-left">Voir les détails</span>
          <span class="pull-right"><i class="fa-sharp fa-solid fa-circle-chevron-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>

  <!-- Card galery -->

  <div class="col-sm-6 col-lg-3 mt-4">
    <div class="card card-galery ">
      <div class="card-heading">
        <div class="row">
          <div class="col-3">
            <i class="fa-sharp fa-solid fa-camera fa-4x"></i>
          </div>
          <div class="col-9 text-end">
            <div class="enlarge"><span><?php echo countItems("picture_id", "picture") ?></span></div>
            <div class="card-text">Images</div>
          </div>
        </div>
      </div>
      <a href="AREMPLIR************">
        <div class="card-footer">
          <span class="pull-left">Voir les détails</span>
          <span class="pull-right"><i class="fa-sharp fa-solid fa-circle-chevron-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>

  <!-- Card client -->

  <div class="col-sm-6 col-lg-3 mt-4">
    <div class="card card-client ">
      <div class="card-heading">
        <div class="row">
          <div class="col-3">
            <i class="fa-sharp fa-solid fa-address-card fa-4x"></i>
          </div>
          <div class="col-9 text-end">
            <div class="enlarge"><span><?php echo countItems("customer_id", "customer") ?></span></div>
            <div class="card-text">Clients</div>
          </div>
        </div>
      </div>
      <a href="AREMPLIR************">
        <div class="card-footer">
          <span class="pull-left">Voir les détails</span>
          <span class="pull-right"><i class="fa-sharp fa-solid fa-circle-chevron-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>

  <!-- Card reservation -->

  <div class="col-sm-6 col-lg-3 mt-4">
    <div class="card card-reservation ">
      <div class="card-heading">
        <div class="row">
          <div class="col-3">
            <i class="fa-sharp fa-solid fa-calendar-days fa-4x"></i>
          </div>
          <div class="col-9 text-end">
            <div class="enlarge"><span><?php echo countItems("reservation_id", "reservation") ?></span></div>
            <div class="card-text">Réservations</div>
          </div>
        </div>
      </div>
      <a href="AREMPLIR************">
        <div class="card-footer">
          <span class="pull-left">Voir les détails</span>
          <span class="pull-right"><i class="fa-sharp fa-solid fa-circle-chevron-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>

</div>