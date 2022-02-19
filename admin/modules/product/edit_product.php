<!--main-->
<?php
include_once("/xampp/htdocs/Clothes_Shop_PHP/functions/slug.php");
include_once("/xampp/htdocs/Clothes_Shop_PHP/functions/list_category.php");

$prd_id = $_GET['prd_id'];
$sql = "SELECT * FROM products WHERE prd_id = $prd_id ";

$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
$cat_id_selected = $row['cat_id'];

if (isset($_POST['sbm'])) {
    $prd_name = $_POST['name'];
    $prd_code = $_POST['code'];
    $prd_slug = getSlug($prd_name);
    $prd_info = $_POST['info'];
    $prd_describer = $_POST['describer'];
    
    if ($_FILES['image']['name'] == "") {
        $prd_name_old = $row['image'];
        $prd_image = $prd_slug.'.jpg';
        rename("images/products/".$prd_name_old, "images/products/".$prd_image);
    } else {
        $prd_image = $prd_slug.'.jpg';
        $prd_image_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($prd_image_tmp, 'images/products/'.$prd_image);
    }
    $prd_price = $_POST['price'];
    if (isset($_POST['featured'])) {
        $prd_featured = 1;
    } else {
        $prd_featured = 0;
    }
    $prd_state = $_POST['state'];
    $cat_id = $_POST['cat_id'];
    $sql_update = "UPDATE products SET name= '$prd_name', code= '$prd_code', slug= '$prd_slug', info= '$prd_info', describer= '$prd_describer', image = '$prd_image',price = $prd_price, featured = $prd_featured ,state = $prd_state , cat_id = $cat_id WHERE prd_id = $prd_id";
    mysqli_query($conn, $sql_update); 

    header("location: index.php?page_layout=product");
}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sửa sản phẩm</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-xs-6 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Sửa sản phẩm</div>
                <div class="panel-body">
                    <form role="form" method="post" enctype="multipart/form-data">
                        <div class="row" style="margin-bottom:40px">

                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Danh mục</label>
                                    <select name="cat_id" class="form-control">
                                        <?php showCategories($categories, 0, "", $cat_id_selected) ?>
                                        <!-- <option value='1' selected>Nam</option>
                                    <option value='3'>---|Áo khoác nam</option>
                                    <option value='2'>Nữ</option>
                                    <option value='4'>---|Áo khoác nữ</option> -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Mã sản phẩm</label>
                                    <input required type="text" name="code" class="form-control" value="<?= $row['code'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input required type="text" name="name" class="form-control" value="<?= $row['name'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Giá sản phẩm (Giá chung)</label>
                                    <input type="number" name="price" class="form-control" value="<?= $row['price'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Sản phẩm có nổi bật</label>
                                    <select name="featured" class="form-control">
                                        <option <?php if ($row['featured'] == 0) {
                                                    echo "seclected";
                                                } ?>value="0">Không</option>
                                        <option <?php if ($row['featured'] == 1) {
                                                    echo "seclected";
                                                } ?> value="1">Có</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select name="state" class="form-control">
                                        <option <?php if ($row['state'] == 1) {
                                                    echo "selected";
                                                } ?> value="1">Còn hàng</option>
                                        <option <?php if ($row['state'] == 0) {
                                                    echo "selected";
                                                } ?> value="0">Hết hàng</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Ảnh sản phẩm</label>
                                    <input id="img" type="file" name="image" class="form-control hidden" onchange="changeImg(this)">
                                    <img id="avatar" class="thumbnail" width="100%" height="350px" src="images/products/<?= $row['image'] ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Thông tin</label>
                                    <textarea name="info" style="width: 100%;height: 100px;"> <?= $row['info'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Miêu tả</label>
                                    <textarea id="editor" name="describer" style="width: 100%;height: 100px;"><?= $row['describer'] ?></textarea>
                                </div>
                                <button class="btn btn-success" name="sbm" type="submit">Sửa sản phẩm</button>
                                <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!--/.row-->
</div>

<!--end main-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/chart-data.js"></script>



<script>
    function changeImg(input) {
        //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            //Sự kiện file đã được load vào website
            reader.onload = function(e) {
                //Thay đổi đường dẫn ảnh
                $('#avatar').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function() {
        $('#avatar').click(function() {
            $('#img').click();
        });
    });
</script>