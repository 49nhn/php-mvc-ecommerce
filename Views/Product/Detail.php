<div class="container mt-5">
    <div class="row">
    <?php foreach ($product as $i): ?>  
        <div class="col-md-6 product-img p-3">
            <img src="\Public\images\<?php echo $i['img']; ?>" alt="">
        </div>
        <div class="col-md-6 product-desc p-5">
            <h3> <?php echo $i['name']; ?></h3>
            <p style="font-style:italic; font-size:150%;">Giá: <?php echo $i['price']; ?></p>
            <p><?php echo $i['ttnb']; ?></p>
            <p><?php echo $i['bonho']; ?></p>
            <select name="" id="">
                <?php 
                    $mau = $i['mau'];
                    $mau = explode(";",$mau);
                    foreach($mau as $color):
                ?>
                <option value="1"><p><?php echo $color; ?></p></option>
                <?php endforeach ?>
            </select>
            
            <p><?php echo $i['chitiet']; ?> : <?php echo $i['title']; ?></p>
            <p><?php echo $i['keyword']; ?></p>
            
            <a href="/index.php?controller=cart&action=addToCart&productID=<?php echo $i['id']; ?>" class="btn btn-primary" >Mua Ngay</a>

        </div>
        <?php endforeach ?>
    </div>
</div>