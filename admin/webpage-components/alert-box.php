<!-- Alert boxes -->
<?php
    // Errors
    if (isset($_GET['error'])):
        $error = $_GET['error'];
        switch ($error) {
            case 'create':
?>
                <div class="alert alert-warning alert-dismissable fade show" role="alert">
                    Dữ liệu đã tồn tại! Vui lòng nhập lại!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
<?php
                break;
            case 'update':
?>
                <div class="alert alert-warning alert-dismissable fade show" role="alert">
                    Có lỗi xảy ra! Dữ liệu không được cập nhật!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
<?php
                break;
            case 'delete':
?>
                <div class="alert alert-warning alert-dismissable fade show" role="alert">
                    Có lỗi xảy ra! Dữ liệu không được xóa!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
<?php
                break;
        }
    endif;
?>

<?php
    // Success
    if ($success = isset($_GET['success'])):
        $success = $_GET['success'];
        switch ($success) {
            case 'create':
?>
                <div class="alert alert-success alert-dismissable fade show" role="alert">
                    Thêm dữ liệu mới thành công!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
<?php
                break;
            case 'update':
?>
                <div class="alert alert-success alert-dismissable fade show" role="alert">
                    Cập nhật dữ liệu thành công!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
<?php
                break;
            case 'delete':
?>
                <div class="alert alert-success alert-dismissable fade show" role="alert">
                    Xóa dữ liệu thành công!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
<?php
                break;
        }
    endif;
?>