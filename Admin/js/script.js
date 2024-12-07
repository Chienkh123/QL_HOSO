function confirmDelete(event) {
    event.preventDefault(); // Prevent the default link behavior
    const url = event.currentTarget.href; // Get the delete URL from the anchor tag
    Swal.fire({
      title: 'Bạn có muốn xóa không?',
      text: 'Sẽ không thể phục hồi lại!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'OK!'
    }).then((result) => {
      if (result.isConfirmed) {
        // Redirect to the delete URL
        window.location.href = url;
      }
    });
  }
  
 //Edit account, user
  $(document).ready(function () {
    $('.editBtn').click(function () {
        var masv = $(this).data('masv');
        var name = $(this).closest('tr').find('td:eq(2)').text();
        var email = $(this).closest('tr').find('td:eq(3)').text();
        var password = $(this).closest('tr').find('td:eq(4)').text();
        var isAdmin = $(this).closest('tr').find('td:eq(5)').text();

        $('#editMasv').val(masv);
        $('#editName').val(name);
        $('#editEmail').val(email);
        $('#editPassword').val(password);
        $('#editIsAdmin').val(isAdmin);

    });
});
//Edit Dân tộc
$(document).ready(function () {
  $('.editDantoc').click(function () {
      var madt = $(this).data('madt');
      var tendt = $(this).closest('tr').find('td:eq(2)').text();

      $('#editMadt').val(madt);
      $('#editTendt').val(tendt);
  });
});

function getStatusColor($value) {
  switch ($value) {
      case 'chưa nộp':
          return 'red';
      case 'đã nộp':
          return 'green';
      default:
          return 'black'; // Default color if val is not 0, 1, or 2
  }
}

//Eit Ngoại trú
$(document).ready(function () {
  $('.editNgoaitru').click(function () {
      var masv = $(this).data('masv');
      var tenchuho = $(this).closest('tr').find('td:eq(2)').text();
      var sonha = $(this).closest('tr').find('td:eq(3)').text();
      var sdt = $(this).closest('tr').find('td:eq(4)').text();
      var quanhe = $(this).closest('tr').find('td:eq(5)').text();
      var diachi = $(this).closest('tr').find('td:eq(6)').text();
      var ngaybatdau = $(this).closest('tr').find('td:eq(7)').text();
      var ngayketthuc = $(this).closest('tr').find('td:eq(8)').text();

      $('#masv').val(masv);
      $('#tenchuho').val(tenchuho);
      $('#sonha').val(sonha);
      $('#sdt').val(sdt);
      $('#quanhe').val(quanhe);
      $('#diachi').val(diachi);
      $('#ngaybatdau').val(ngaybatdau);
      $('#ngayketthuc').val(ngayketthuc);


  });
});







  