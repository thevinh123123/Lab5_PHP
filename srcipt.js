$(document).ready(function() {
    // Select/Deselect checkboxes
    var checkbox = $('table tbody input[type="checkbox"]');
    $("#selectAll").click(function() {
        if(this.checked) {
            checkbox.each(function() {
                this.checked = true;                        
            });
        } else {
            checkbox.each(function() {
                this.checked = false;                        
            });
        } 
    });
    checkbox.click(function() {
        if(!this.checked) {
            $("#selectAll").prop("checked", false);
        }
    });

    // Xóa một nhân viên
    $('.delete').on('click', function() {
        if(confirm('Bạn có chắc chắn muốn xóa nhân viên này?')) {
            var id = $(this).data('id');
            $.post('delete_employee.php', { id: id }, function(response) {
                if(response === 'success') {
                    location.reload();
                } else {
                    alert('Lỗi khi xóa nhân viên.');
                }
            });
        }
    });

    // Xóa nhiều nhân viên
    $('#deleteSelected').on('click', function() {
        var ids = [];
        $('table tbody input[type="checkbox"]:checked').each(function() {
            ids.push($(this).val());
        });

        if(ids.length > 0 && confirm('Bạn có chắc chắn muốn xóa các nhân viên đã chọn?')) {
            $.post('delete_employee.php', { ids: ids }, function(response) {
                if(response === 'success') {
                    location.reload();
                } else {
                    alert('Lỗi khi xóa nhân viên.');
                }
            });
        } else if (ids.length === 0) {
            alert('Vui lòng chọn ít nhất một nhân viên để xóa.');
        }
    });
});