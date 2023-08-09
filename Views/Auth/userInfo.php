
<div class="container">
    <div class="row">
        <h1 class="fw-bold display-2">Thông tin người dùng</h1>
        <div class="col-md-6">
            <h3>
                <span class="badge badge-light">Tên đăng nhập:</span>
                <?php echo $user['username'] ?>
            </h3>

            <h3>
                <span class="badge badge-light">Role:</span>
                <?php echo $user['role'] ?>
            </h3>
            <hr class="border border-primary border-2 opacity-75">
            <?php if (isset($success)): ?>
                <div class="alert alert-info" role="alert">
                    <?php echo $success ?>
                </div>
            <?php endif; ?>
            <?php if (isset($message)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $message ?>
                </div>
            <?php endif; ?>
            <form action="/index.php?controller=auth&action=updateUserInfo" method="POST">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" value="<?php echo $user['email'] ?>" class="form-control" id="email">
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
        <div class="col-md-6">
            <h1>Đổi mật khẩu</h1>
            <hr class="border border-primary border-2 opacity-75">
            <?php if (isset($success)): ?>
                <div class="alert alert-info" role="alert">
                    <?php echo $success ?>
                </div>
            <?php endif; ?>
            <?php if (isset($message)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $message ?>
                </div>
            <?php endif; ?>
            <form action="/index.php?controller=auth&action=changePassword" method="POST">
            <div class="form-group d-none">
                    <label for="username">Tên đăng nhập:</label>
                    <input type="text" name="username" value="<?php echo $user['username'] ?>" class="form-control" id="username">
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu cũ:</label>
                    <input type="password" name="password" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="newpassword">Mật khẩu mới:</label>
                    <input type="password" name="newpassword" value="" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>


        </div>
    </div>
</div>