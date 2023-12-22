$(document).ready(function() {
    $(".cart-container").click(function() {
        $(this).toggleClass('cart-ordered');
        var masp = $(this).data('masp');
        addToCart(masp);
    });

    $('.num').on('change', function() {
        countPrice();
    });

    $('#loginBtn').click(function() {
        login();
    })

    $('.delPrd').click(function() {
        var cf = confirm('Xóa sản phẩm này khỏi giỏ hàng?');
        masp = $(this).data('masp');
        if (cf) {
            $(this).parent().closest('tr').remove();
            delPrd(masp);
            countPrice();
        }
    })

    $('#orderCompleteBtn').click(function() {
        orderComplete();
    })

    $('#edit-btn').click(function() {
        editUserInfo();
    })

    $('#edit-pw-btn').click(function() {
        editPw();
    })

    $('#searchBtn').click(function() {
        search();
    })

});

// function Display_PrdDetail(masp) {
//     $('#modal-id').attr('data-remote', 'product/PrdDetail/' + masp);
//     $('#modal-sanpham').empty();

//     $.ajax({
//         url: "product/PrdDetail/" + masp,
//         type: "post",
//         dataType: "text",
//         data: {
//             masp
//         },
//         success: function(result) {
//             $('#modal-sanpham').html(result);
//         }
//     });
// }

function login() {
    var username = $('#username').val();
    var password = $('#password').val();
    var rmbme = $('#rmbme').is(':checked');
    $.ajax({
        url: "user/login",
        type: "post",
        dataType: "text",
        data: {
            username,
            password,
            rmbme
        },
        success: function(result) {
            if (result == 'LoginSuccess') {
                /*$('.errorMes').html(result);*/
                window.location.replace("http://localhost/WBH_MVC/");
            } else {
                $('.errorMes')[0].style.display = "block";
                $('.errorMes').html(result);
            }
        }
    });
}

// function register() {
//     var name = $('#name').val();
//     var username = $('#username').val();
//     var password = $('#password').val();
//     var cpassword = $('#cpassword').val();
//     var addr = $('#addr').val();
//     var tel = $('#tel').val();
//     var email = $('#email').val();
//     $.ajax({
//         url: "user/register",
//         type: "post",
//         dataType: "text",
//         data: {
//             name,
//             username,
//             password,
//             cpassword,
//             addr,
//             tel,
//             email
//         },
//         success: function(result) {
//             if (result == 'RegisterSuccess') {
//                 alert('Tạo tài khoản thành công!');
//                 window.location.replace("http://localhost/WBH_MVC/");
//             } else {
//                 $('.errorMes')[0].style.display = "block";
//                 $('.errorMes').html(result);
//             }
//         }
//     });
// }

// function addToCart(masp) {
//     $.ajax({
//         url: "Client/addtocart",
//         type: "post",
//         dataType: "text",
//         data: {
//             masp
//         },
//         success: function(result) {
//             $('#cart_count').html(result);
//         }
//     });
// }

// function countPrice() {
//     var num = [];
//     var price = [];
//     $('.num').each(function() {
//         num.push($(this).val());
//     });
//     $(".prices").each(function() {
//         price.push(parseInt($(this).data('price').replace(/\s/g, '')));
//     });
//     var sum = 0;
//     for (var i = 0; i < num.length; i++) {
//         sum += num[i] * price[i];
//     }
//     sum = sum.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
//     $('#totalPrice').html(sum);
// }

// function delPrd(masp) {
//     $.ajax({
//         url: "Client/delPrd",
//         type: "post",
//         dataType: "text",
//         data: {
//             masp
//         },
//         success: function(result) {
//             $('#cart_count').html(result);
//         }
//     });
// }

// function orderComplete() {
//     var num = [];
//     var sp = [];
//     var ten = $('#ten').val();
//     var sdt = $('#order_tel').val();
//     var quan = $('#quan').val();
//     var dc = $('#addr').val();
//     var type = ' ';
//     $('.num').each(function() {
//         num.push($(this).val());
//         type = $(this).data('type');
//     });
//     $('.sanpham').each(function() {
//         sp.push($(this).data('masp'));
//     });
//     $.ajax({
//         url: "Client/orderComplete",
//         type: "post",
//         dataType: "text",
//         data: {
//             ten,
//             sdt,
//             quan,
//             dc,
//             sp,
//             num,
//             type
//         },
//         success: function(result) {
//             // if (result == 'Vui lòng điền đầy đủ thông tin!') {
//             //     $('#thieu-thong-tin').html(result);
//             //     return 0;
//             // } else {
//             //     $('body').html(result);
//             // }
//             if (result == 'Vui lòng điền đầy đủ thông tin!') {
//                 $('.errorMes')[0].style.display = "block";
//                 $('.errorMes').html(result);
//                 return 0;
//             } else {
//                 $('body').html(result);
//             }
//         }
//     });
// }

// function loadmore(start) {
//     var next = start + 8;
//     var q = $('#srch-val').val();
//     $('#loadmoreBtn').attr('onclick', 'loadmore(' + next + ')');
//     var type = $('#contentTitle').data('type');
//     $.ajax({
//         url: "Client/loadmore",
//         type: "get",
//         dataType: "text",
//         data: {
//             start,
//             type,
//             q
//         },
//         success: function(result) {
//             if (!result) { alert("Đã hết sản phẩm để hiển thị!"); return 0; }
//             $('#prdCtn').append(result);
//         }
//     });
// }

// function editUserInfo() {
//     var name = $('#name').val();
//     var addr = $('#addr').val();
//     var tel = $('#tel').val();
//     var email = $('#email').val();
//     $.ajax({
//         url: "user/editinfo",
//         type: "post",
//         dataType: "text",
//         data: {
//             name,
//             addr,
//             tel,
//             email
//         },
//         success: function(result) {
//             alert("Thay đổi thông tin thành công!");
//             location.reload();
//         }
//     });
// }

// function editPw() {
//     var opw = $('#oldpw').val();
//     var npw = $('#newpw').val();
//     var cnpw = $('#cnewpw').val();
//     $.ajax({
//         url: "user/editpassword",
//         type: "post",
//         dataType: "text",
//         data: {
//             opw,
//             npw,
//             cnpw
//         },
//         success: function(result) {
//             if (result == 'Mật khẩu cũ sai!' || result == 'Nhập lại mật khẩu không trùng khớp!') {
//                 $('#edit-info-error').html(result);
//                 return 0;
//             } else {
//                 alert("Đổi mật khẩu thành công!");
//                 location.reload();
//             }
//         }
//     });
// }

function search() {
    var q = $('#srch-val').val();
    $('#bodyContainer').empty();
    $.ajax({
        url: "client/search",
        type: "get",
        dataType: "text",
        data: {
            q
        },
        success: function(result) {
            $('#bodyContainer').html(result);
        }
    });
}