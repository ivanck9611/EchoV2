<?php
  require_once 'core/init.php';
  include'include/head.php';
  include'include/nevigation.php';
  include'include/headerfull.php';
  include'include/leftsidebar.php';

  $sql = "SELECT*FROM product WHERE featured = 1";
  $featured = $db -> query($sql);

  ?>
    <!--Main content-->
    <div class="col-md-8">
      <div class="row">
        <h2 class="text-center">Main Sale</h2>
        <?php while($product = mysqli_fetch_assoc($featured)): ?>
          <div class="col-md-3 text-center">
            <h4><?php echo $product['title']; ?></h4>
            <img src="<?php echo $product['image']; ?>"alt="<?php echo $product['title']; ?>" class="img-thumb" />
            <p class="list-price text-danger">List Price<s><?php echo $product['list_price']; ?></s></p>
            <p class="price">Our Pric <?php echo $product['price']; ?></p>
            <button type="button"class="btn but-sm btn-success" onclick="detailsmodal(<?php echo $product['id']; ?>)">Details</button>
          </div>
        <?php endwhile; ?>
      </div>
    </div>

<?php
  include'include/rightsidebar.php';    /*this order is important*/
  include'include/footer.php';
?>
