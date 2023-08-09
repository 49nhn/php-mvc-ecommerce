<div class="container">
    <h2>Edit product </h2>
    <?php if (isset($message)): ?>
    <div class="alert alert-success" role="alert">
        <?php echo $message ?>
    </div>
    <?php endif; ?>
    <?php print_r($product) ?>
    <!-- $name, $slug, $parent_id, $price, $ttnb, $bonho, $mau, $chitiet, $title, $keyword, $description -->
    <form action="index.php?controller=admin&action=editProductSubmit&id=<?php echo $product['id'] ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3 form-group">
            <label for="name" class="form-label">Name Product: </label>
            <input type="text" name="name" class="form-control" value="<?php echo $product['name']?>" placeholder="" aria-describedby="helpId">
        </div>
        <div class="mb-3 form-group">
            <label for="title" class="form-label">Title: </label>
            <input type="text" name="title" id="" class="form-control" value="<?php echo $product['title']?>" placeholder="" aria-describedby="helpId">
        </div>
        <div class="mb-3 form-group form-group">
            <label for="img" class="form-label">Image: </label>
            <input class="form-control-file" type="text" name="img" id="img" class="form-control" value="<?php echo $product['img']?>" placeholder=""
                aria-describedby="helpId">
        </div>

        <div class="row gap-3">
            <div class="col-sm-4 mb-3 form-group">
                <label for="parent_id" class="form-label">Category: </label>
                <select class="form-control" value="<?php echo $product['parent_id']?>" name="parent_id">
                    <option value="1">Điện thoại</option>
                    <option value="2">Laptop</option>
                    <option value="3">Tablet</option>
                </select>
            </div>
            <div class="col-sm-4 mb-3 form-group">
                <label for="price" class="form-label">Price: </label>
                <input type="text" name="price" class="form-control" value="<?php echo $product['price']?>" placeholder="" aria-describedby="helpId">
            </div>
            <div class="col-sm-4 mb-3 form-group">
                <label for="ttnb" class="form-label">TTNB: </label>
                <input type="text" name="ttnb" class="form-control" value="<?php echo $product['ttnb']?>" placeholder="" aria-describedby="helpId">
            </div>
            <div class="col-sm-4 mb-3 form-group">
                <label for="bonho" class="form-label">Bộ nhớ: </label>
                <input type="text" name="bonho" class="form-control" value="<?php echo $product['bonho']?>" placeholder="" aria-describedby="helpId">
            </div>
            <div class="col-sm-4 mb-3 form-group">
                <label for="mau" class="form-label">Màu: </label>
                <input type="text" name="mau" class="form-control" value="<?php echo $product['mau']?>" placeholder="" aria-describedby="helpId">
            </div>
            <div class="col-sm-4 mb-3 form-group">
                <label for="keyword" class="form-label">Keyword: </label>
                <input type="text" name="keyword" class="form-control" value="<?php echo $product['keyword']?>" placeholder="" aria-describedby="helpId">
            </div>
        </div>
        <div class="mb-3 form-group">
            <label for="description" class="form-label">Description: </label>
            <textarea type="text" name="description" class="form-control" value="<?php echo $product['description']?>" rows="2" placeholder=""
                aria-describedby="helpId"><?php echo $product['description'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="add">Thêm</button>
    </form>

</div>