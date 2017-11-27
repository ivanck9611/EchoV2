<?php
  require_once '../core/init.php';
  include 'includes/head.php';
  include 'includes/nevigation.php';

  $sql = "SELECT * FROM brand ORDER BY brand";
  $results = $db->query($sql);
  $errors = array();
  //if add form is submitted
  if(isset($_POST['add_submit'])){
    $brand = sanitize($_POST['brand']);
    //check if brand is blank
    if($_POST['brand']==''){
      $errors[] = 'You must enter a brand';
    }
    // check if brands exists in Database
    $sql = "SELECT * FROM brand WHERE brand = '$brand'";
    $result = $db->query($sql);
    $count = mysqli_num_rows($result);
    if($count>0){
      $errors[].=$brand.'That brand already exisits. Please Choose another brand Name';
    }

    //display odbc_errors
    if(!emtpy($errors)){
      echo display_errors($errors);
    }else{
      //Add brand to Database
      $sql3 = "INSERT INTO brand(brand)VALUES('brand')";
      $db->query($sql3);
      header('Location: brand.php');
    }

  }
?>
<h2 class="text-center">Brands</h2><hr>
<!--Brand from-->
<div class="text-center">
  <form class="form-inline" action="brands.php" method="post">
    <div class="form-group">
      <label for='brand'>Add a Brand</label>
      <input type="text" name="brand" id="brand" class="form-control" value="<?php echo ((isset($_POST['brand']))?$_POST['brand']:''); ?>">
      <input type="submit" name="add_sumbit" value="Add Brand" class="btn btn-success">
    </div>
  </form>
</div><hr>
<table class="table table-bordered table-striped table-auto table-condensed">
  <thead>
    <th></th><th>Brand</th><th></th>
  </thead>
  <tbody>
    <?php while($brand = mysqli_fetch_assoc($results)): ?>
      <tr>
        <td><a href="brans.php?edit=<?php echo $brand['id']?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></a></td>           <!--edit 1 is the ID-->
        <td><?php echo $brand['brand']?></td>
        <td><a href="brans.php?delete=<?php echo $brand['id']?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove-sign"></a></td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>





<?php include 'includes/footer.php' ?>
