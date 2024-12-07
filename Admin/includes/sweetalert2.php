<?php
$status = $_GET['status'] ?? '';
switch ($status) {
    case 'success':
        echo "<script>
             Swal.fire({
                 title: 'Thành Công',
                 icon: 'success'
             }).then(function() {
                 window.location.href = window.location.href.split('?')[0]; 
             });
           </script>";
        break;

    case 'error':
        echo "<script>
                 Swal.fire({
                     title: 'Thất bại',
                     icon: 'error'
                 }).then(function() {
                     window.location.href = window.location.href.split('?')[0]; 
                 });
               </script>";
        break;

    case 'tontaidantoc':
        echo "<script>
                     Swal.fire({
                         title: 'Mã dân tộc đã tồn tại',
                         icon: 'error'
                     }).then(function() {
                         window.location.href = window.location.href.split('?')[0]; 
                     });
                   </script>";
        break;

    case 'tontaimasv':
        echo "<script>
                         Swal.fire({
                             title: 'Mã sinh viên đã tồn tại',
                             icon: 'error'
                         }).then(function() {
                             window.location.href = window.location.href.split('?')[0]; 
                         });
                       </script>";
        break;

    case 'tontaiusers':
        echo "<script>
                             Swal.fire({
                                 title: 'Tài khoản đã tồn tại',
                                 icon: 'error'
                             }).then(function() {
                                 window.location.href = window.location.href.split('?')[0]; 
                             });
                           </script>";
        break;

    case 'errortk' :
                echo "<script>
                Swal.fire({
                    title: 'Lỗi thêm vào tài khoản',
                    icon: 'error'
                }).then(function() {
                    window.location.href = window.location.href.split('?')[0]; 
                });
            </script>";
        break;


    default:
        break;
}
