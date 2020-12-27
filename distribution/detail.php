<?php
include('connection.php');
include('header.php');
$newitem = $_GET['newitem'];
?>

<div id="all">
  <div id="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
        </div>
        <div class="col-lg-3 order-2 order-lg-1">
          <div class="banner"><a href="#"><img src="img/banner.jpg" alt="sales 2014" class="img-fluid"></a></div>
        </div>
        <?php
        $query  = "SELECT * FROM product WHERE product_id='$newitem';";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <div class="col-lg-9 order-1 order-lg-2">
            <div id="productMain" class="row">
              <div class="col-md-6">
                <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                  <div class="item"> <img src="../admin/<?php echo $row['product_image']; ?>" alt="" class="img-fluid"></div>
                  <div class="item"> <img src="../admin/<?php echo $row['product_image']; ?>" alt="" class="img-fluid"></div>
                  <div class="item"> <img src="../admin/<?php echo $row['product_image']; ?>" alt="" class="img-fluid"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="box">
                  <h1 class="text-center"><?php echo $row['product_name']; ?></h1>
                  <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details, material &amp; care and sizing</a></p>
                  <p class="price"><?php echo $row['product_price']; ?></p>
                  <p class="text-center buttons"><a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a><a href="basket.html" class="btn btn-outline-primary"><i class="fa fa-heart"></i> Add to wishlist</a></p>
                </div>
                <div data-slider-id="1" class="owl-thumbs">
                  <button class="owl-thumb-item"><img src="../admin/<?php echo $row['product_image']; ?>" alt="" class="img-fluid"></button>
                  <button class="owl-thumb-item"><img src="../admin/<?php echo $row['product_image']; ?>" alt="" class="img-fluid"></button>
                  <button class="owl-thumb-item"><img src="../admin/<?php echo $row['product_image']; ?>" alt="" class="img-fluid"></button>
                </div>
              </div>
            </div>
            <div id="details" class="box">
              <p></p>
              <h4><?php echo $row['category_name']; ?></h4>
              <h4><?php echo $row['product_name']; ?></h4>
              <p><?php echo $row['product_description']; ?></p>
            <?php
          };
            ?>
            </div>
          </div>
          <!-- /.col-md-9-->
      </div>
    </div>
  </div>
</div>
<?php
include('footer.php');
?>