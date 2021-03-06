<!-- partial:partials/_header.html -->
<!-- partial -->
<div class="page has-sidebar-left">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-package"></i>
                        Products
                    </h4>
                </div>
            </div>
            <div class="row">
                <ul class="nav responsive-tab nav-material nav-material-white">
                    <li>
                        <a class="nav-link" href="admincp/product"><i class="icon icon-list"></i>All Products</a>
                    </li>
                    <li>
                        <a class="nav-link active" href="admincp/productcontrol"><i class="icon icon-plus-circle"></i> Add New Product</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
            <form id="needs-validation" method="POST" enctype="multipart/form-data" novalidate>
                <div class="row">
                    <?php
                    $prod_id = $prod_title = $prod_cat = $prod_brand = $prod_price = $prod_quantity = $prod_origin = $prod_tinydes = $prod_fulldes = '';
                    $prod_image = "avatar.png";
                    if (isset($_GET["product"])) {
                        $rows = mysqli_fetch_array($data["detailProduct"]);
                        $prod_id = $rows["prod_id"];
                        $prod_title = $rows["prod_title"];
                        $prod_cat = $rows["prod_cat"];
                        $prod_brand = $rows["prod_brand"];
                        $prod_price = $rows["prod_price"];
                        $prod_quantity = $rows["prod_quantity"];
                        $prod_origin = $rows["prod_origin"];
                        $prod_image = $rows["prod_image"];
                        $prod_tinydes = htmlspecialchars_decode($rows["prod_tinydes"]);
                        $prod_fulldes = htmlspecialchars_decode($rows["prod_fulldes"]);
                    }
                    ?>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom01">Product ID</label>
                                <input type="text" value="<?php echo $prod_id ?>" class="form-control" style="cursor: not-allowed;" id="productID" name="productID" placeholder="Product ID" readonly>
                            </div>
                            <div class="col-md-9 mb-3">
                                <label for="validationCustom01">T??n s???n ph???m</label>
                                <input type="text" value="<?php echo $prod_title ?>" class="form-control" id="productTitle" name="productTitle" placeholder="T??n s???n ph???m" required>
                                <div class="invalid-feedback">
                                    Vui l??ng cung c???p t??n s???n ph???m h???p l???.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="category">Lo???i</label>
                                <select id="category" name="category" class="custom-select form-control" required>
                                    <option value="">Ch???n lo???i ?????ng h???</option>
                                    <?php while ($rows = mysqli_fetch_array($data["listCategory"])) {
                                        $itemID = $rows['cat_id'];
                                        $itemTitle = $rows['cat_title'];
                                    ?>
                                        <option value="<?php echo $itemID ?>" <?php if ($itemID == $prod_cat) echo "selected" ?>><?php echo $itemTitle ?></option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    Vui l??ng cung c???p lo???i ?????ng h??? h???p l???.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="brand">Nh?? s???n xu???t</label>
                                <select id="brand" name="brand" class="custom-select form-control" required>
                                    <option value="">Ch???n nh?? s???n xu???t</option>
                                    <?php while ($rows = mysqli_fetch_array($data["listBrand"])) {
                                        $itemID = $rows['brand_id'];
                                        $itemTitle = $rows['brand_title'];
                                    ?>
                                        <option value="<?php echo $itemID ?>" <?php if ($itemID == $prod_brand) echo "selected" ?>><?php echo $itemTitle ?></option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">
                                    Vui l??ng cung c???p nh?? s???n xu???t h???p l???.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom04">Gi??</label>
                                <input type="number" class="form-control" min=0 name="price" id="price" placeholder="Gi?? b??n" value="<?php echo $prod_price ?>" required>
                                <div class="invalid-feedback">
                                    Vui l??ng cung c???p gi?? h???p l???.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="sku">S??? l?????ng</label>
                                <input type="number" class="form-control" min=0 name="qty" id="qty" placeholder="S??? l?????ng s???n ph???m" value="<?php echo $prod_quantity ?>" required>
                                <div class="invalid-feedback">
                                    Vui l??ng cung c???p s??? l?????ng h???p l???.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="origin">Xu???t x???</label>
                                <input type="text" class="form-control" name="origin" id="origin" placeholder="N??i xu???t x???" value="<?php echo $prod_origin ?>" required>
                                <div class="invalid-feedback">
                                    Vui l??ng cung c???p xu???t x??? h???p l???.
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="productDetails">M?? t??? r??t g???n</label>
                            <textarea id="editor" name="editor" placeholder="M?? t??? chi ti???t s???n ph???m" rows="17" required>
                            <?php echo $prod_tinydes ?>
                            </textarea>
                            <script>
                                ClassicEditor
                                    .create(document.querySelector('#editor'))
                                    .then(editor => {
                                        console.log(editor);
                                    })
                                    .catch(error => {
                                        console.error(error);
                                    });
                            </script>

                            <div class="invalid-feedback">
                                Vui l??ng cung c???p lo???i ?????ng h??? h???p l???.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="productDetails">M?? t??? chi ti???t</label>
                            <textarea id="editorFull" name="editorFull" placeholder="M?? t??? chi ti???t s???n ph???m" rows="17" required>
                            <?php echo $prod_fulldes ?>
                            </textarea>
                            <script>
                                ClassicEditor
                                    .create(document.querySelector('#editorFull'))
                                    .then(editor => {
                                        console.log(editor);
                                    })
                                    .catch(error => {
                                        console.error(error);
                                    });
                            </script>
                        </div>
                        <script>
                            (function() {
                                "use strict";
                                window.addEventListener("load", function() {
                                    var form = document.getElementById("needs-validation");
                                    form.addEventListener("submit", function(event) {
                                        if (form.checkValidity() == false) {
                                            event.preventDefault();
                                            event.stopPropagation();
                                        }
                                        form.classList.add("was-validated");
                                        var editorElement = document.getElementById("productDetails");
                                        if (editorElement.value == '') {
                                            editorElement.parentNode.classList.add("is-invalid");
                                            editorElement.parentNode.classList.remove("is-valid");
                                        } else {
                                            editorElement.parentNode.classList.remove("is-invalid");
                                            editorElement.parentNode.classList.add("is-valid");
                                        }

                                    }, false);
                                }, false);
                            }());
                        </script>
                        <label>Th??m ???nh v??o ablbum</label>
                        <div class="user-image mb-3 text-center">
                            <div class="imgGallery">
                                <!-- Image preview -->
                            </div>
                        </div>

                        <div class="custom-file">
                            <input type="file" name="fileUpload[]" class="custom-file-input" id="chooseFile" multiple <?php if (!isset($_GET["product"])) echo "required" ?>>
                            <label class="custom-file-label" for="chooseFile">Ch???n h??nh ???nh</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>???nh ?????i di???n s???n ph???m</label>

                            <div class="avatar-wrapper">
                                <img class="profile-pic" src="./public/assets/img/products/<?php echo $prod_image ?>" />
                                <div class="upload-button">
                                    <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                                </div>
                                <input class="file-upload" type="file" name="avatar" accept="image/*" <?php if (!isset($_GET["product"])) echo "required" ?> />
                            </div>
                        </div>
                        <?php if (isset($_GET["product"])) {
                        ?>
                            <div class="form-group">
                                <label>Album h??nh ???nh s???n ph???m</label>
                                <div id="uploaded_images">
                                    <?php while ($rows = mysqli_fetch_array($data["listAlbum"])) {
                                        $photo_id = $rows["photo_id"];
                                        $photo_name = $rows["photo_name"];
                                    ?>
                                        <div class="uploaded_image">
                                            <img src="./public/assets/img/products/<?php echo $photo_name ?>">
                                            <a id="<?php echo $photo_id ?>" class="img_rmv btn"><i class="icon-delete" style="font-size:48px;color:#2B78FB"></i></a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <select style="display: none;" id="deleted_images" name="deleted_images[]" multiple></select>
                        <?php }
                        ?>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <button type="submit" name="addProduct" id="addProduct" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>L??u Th??ng S???n ph???m</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- partial:partials/_foot.html -->
<!-- partial -->
<script>
    $(function() {
        // Multiple images preview with JavaScript
        var multiImgPreview = function(input, imgPreviewPlaceholder) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#chooseFile').on('change', function() {
            multiImgPreview(this, 'div.imgGallery');
        });
    });
</script>