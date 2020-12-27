<?php
include('connection.php');
include('header.php');
?>
<body>

<?php
            $query  = "SELECT * FROM product WHERE category_name='Kids';";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="clearfix card" style="width: 30.5%; display:inline-block; margin:1%;">
                    <img class="w-100 p-3" src="../admin/<?php if($row['category_name']=="Kids"){ echo $row['product_image'];}elseif($row['category_name']=="Men"){die;};?>" alt="">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align:center;"><?php if($row['category_name']=="Kids"){ echo $row['category_name'];} ?></h4>
                        <p class="card-title" style="text-align:center;"><?php if($row['category_name']=="Kids"){ echo $row['product_name'];} ?></p>
                        <p class="card-title" style="text-align:center;"><?php if($row['category_name']=="Kids"){ echo $row['product_price'];} ?></p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="detail.php?newitem=<?php echo $row['product_id']; ?>" class="btn btn-primary">Find Out More!</a>
                    </div>
                </div>
            <?php
            };
            ?>



<?php
include('footer.php');
?>
