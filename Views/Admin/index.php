<section>
    <div class="container">
        <h1> Manager</h1>

        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home"
                    type="button" role="tab" aria-controls="nav-home" aria-selected="true">Product Management</button>
                <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button"
                    role="tab" aria-controls="nav-profile" aria-selected="false">Add product</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="d-flex justify-content-between p-3">
                    <?php if (isset($message)): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $message ?>
                    </div>
                    <?php endif; ?>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Img</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if (isset($products))
                            foreach ($products as $key => $product): ?>
                        <tr>
                            <td>
                                <?php echo $product['name'] ?>
                            </td>
                            <td><img src="./public/images/<?php echo $product['img'] ?>" alt="" width="100px"></td>
                            <td>
                                <?php echo $product['parent_id'] ?>
                            </td>
                            <td>
                                <?php echo
                                        number_format($product['price'], 0, ',', '.')
                                        ?>
                            </td>
                            <td>
                                <?php echo $product['description'] ?>
                            </td>
                            <td>
                                <a href="index.php?controller=admin&action=editProduct&id=<?php echo $product['id'] ?>"
                                    class="btn btn-primary">Sửa</a>
                                <a href="index.php?controller=admin&action=deleteProduct&id=<?php echo $product['id'] ?>"
                                    class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>


                    </tbody>
                </table>
            </div>

            <div class="tab-pane fade pt-3" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <!-- $name, $slug, $parent_id, $price, $ttnb, $bonho, $mau, $chitiet, $title, $keyword, $description -->
                <form action="index.php?controller=admin&action=addProductPost" method="post"
                    enctype="multipart/form-data">
                    <div class="mb-3 form-group">
                        <label for="name" class="form-label">Name Product: </label>
                        <input type="text" name="name" id="" class="form-control" placeholder=""
                            aria-describedby="helpId">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="title" class="form-label">Title: </label>
                        <input type="text" name="title" id="" class="form-control" placeholder=""
                            aria-describedby="helpId">
                    </div>
                    <div class="mb-3 form-group form-group">
                        <label for="img" class="form-label">Image: </label>
                        <input class="form-control-file" type="file" name="img" id="img" class="form-control"
                            placeholder="" aria-describedby="helpId">
                    </div>

                    <div class="row gap-3">
                        <div class="col-sm-4 mb-3 form-group">
                            <label for="parent_id" class="form-label">Category: </label>
                            <select class="form-control" name="parent_id">
                                <option value="1">Điện thoại</option>
                                <option value="2">Laptop</option>
                                <option value="3">Tablet</option>
                            </select>
                        </div>
                        <div class="col-sm-4 mb-3 form-group">
                            <label for="price" class="form-label">Price: </label>
                            <input type="text" name="price" class="form-control" placeholder=""
                                aria-describedby="helpId">
                        </div>
                        <div class="col-sm-4 mb-3 form-group">
                            <label for="ttnb" class="form-label">TTNB: </label>
                            <input type="text" name="ttnb" class="form-control" placeholder=""
                                aria-describedby="helpId">
                        </div>
                        <div class="col-sm-4 mb-3 form-group">
                            <label for="bonho" class="form-label">Bộ nhớ: </label>
                            <input type="text" name="bonho" class="form-control" placeholder=""
                                aria-describedby="helpId">
                        </div>
                        <div class="col-sm-4 mb-3 form-group">
                            <label for="mau" class="form-label">Màu: </label>
                            <input type="text" name="mau" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="col-sm-4 mb-3 form-group">
                            <label for="keyword" class="form-label">Keyword: </label>
                            <input type="text" name="keyword" class="form-control" placeholder=""
                                aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="description" class="form-label">Description: </label>
                        <textarea type="text" name="description" class="form-control" rows="2" placeholder=""
                            aria-describedby="helpId"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="add">Thêm</button>
                </form>
            </div>

        </div>
    </div>
    </div>
</section>