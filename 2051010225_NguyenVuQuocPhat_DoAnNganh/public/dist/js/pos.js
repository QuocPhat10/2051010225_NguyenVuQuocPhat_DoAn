$(document).ready(function(){
    $(".select2").select2();
    $("[data-mask]").inputmask();
    $(".datepicker").datepicker({
        dateFormat: 'dd/mm/yy',
        changeMonth: true, //Tùy chọn này cho phép người dùng chọn tháng
        changeYear: true //Tùy chọn này cho phép người dùng lựa chọn từ phạm vi năm
    });
    
    var minHeight = $(window).height() - 165;
    var mainHeight = $('.content-wrapper').height();
    $("#right").css('min-height', minHeight);
    var rightHeight = $('#right').height();
    $("#left").css('min-height', rightHeight);
    /*
    $(document).on('click', '#btnThemKhachHang', function (e) {
        $('#modelThemKhachHang').modal({backdrop:'static'});
    });
    */
});

