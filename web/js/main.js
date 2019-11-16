
$(document).ready(function(){
    $('.slick').slick({
        mobileFirst: true,
        dots: false,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false,
        // prevArrow: $('.prev'),
        // nextArrow: $('.next')
    });
})

function openCart(event) {
    event.preventDefault();
    $.ajax({
        url:'/cart/open',
        type: 'GET',
        success: function(res){
            // console.log('ok');
            $('#cartModal .modal-content').html(res);
            $('#cartModal').modal('show');
        },
        error: function(err){
            alert('Error '+err);
        }
    })
}

function clearCart(event) {
    if (confirm('Точно очистить?')) {
        event.preventDefault();
        $.ajax({
            url: '/cart/clear',
            type: 'GET',
            success: function (res) {
                // console.log('ok');
                $('#cartModal .modal-content').html(res);
                if ($('.totalQty').html()) {
                    $('.menuQty').html('('+$('.totalQty').html()+')');
                } else {
                    $('.menuQty').html('(0)');
                }

            },
            error: function (err) {
                alert('Error ' + err);
            }
        })
    }
}

$('.product-button__add').on('click', function(event){
 event.preventDefault();
let name =$(this).data('name');
// console.log(name);
$.ajax({
    url:'/cart/add',
    data: {name:name},
    type: 'GET',
    success: function(res){
        // console.log(res);
        $('#cartModal .modal-content').html(res);
        if ($('.totalQty').html()) {
            $('.menuQty').html('('+$('.totalQty').html()+')');
        } else {
            $('.menuQty').html('(0)');
        }
    },
    error: function(res){
        alert('Error: ' + res);
    }
})
});

$('.delete__item').on('click', function(event){
    event.preventDefault();
    // console.log('ok');
    $(this).parent(td).remove();
})

$('.modal-content').on('click','.btn-close', function(){
    $('#cartModal').modal('hide');
})

$('.modal-content').on('click', '.delete', function(){
let id = $(this).data('id');
// console.log(id)
    $.ajax({
        url:'/cart/delete',
        data: {id:id}   ,
        type: 'GET',
        success: function(res){
            // console.log(res);
            $('#cartModal .modal-content').html(res);
            if ($('.totalQty').html()) {
                $('.menuQty').html('('+$('.totalQty').html()+')');
            } else {
                $('.menuQty').html('(0)');
            }

        },
        error: function(res){
            alert('Error: ' + res);
        }
    })
})

$('.modal-content').on('click', '.btn-next', function(){
// console.log('ok')

    $.ajax({
        url:'/cart/order',
        type: 'GET',
        success: function(res){
            // console.log(res);
            $('#orderModal .modal-content').html(res);
            $('#cartModal').modal('hide');
            $('#orderModal').modal('show');
        },
        error: function(res){
            alert('Error: ' + res);
        }
    })
})

function showLogin(event) {
    event.preventDefault();
    // $('#loginModal').modal('show');
    $.ajax({
        url:'/users/index',
        type: 'GET',
        success: function(res){
            // console.log(res);
            $('#loginModal .modal-content').html(res);
            // $('#cartModal').modal('hide');
            $('#loginModal').modal('show');
        },
        error: function(res){
            alert('Error: ' + res );

        }
    })
}

function showRegister(event) {
    event.preventDefault();
    // $('#loginModal').modal('show');
    $.ajax({
        url:'/users/reg',
        type: 'GET',
        success: function(res){
            console.log(res);
            $('#regModal .modal-content').html(res);
            $('#loginModal').modal('hide');
            $('#regModal').modal('show');
        },
        error: function(res){
            alert('Error: ' + res);
        }
    })
}

$('.modal-content').on('click', '.btn-login', function(event){
    event.preventDefault();
// console.log('ok')
    let name = $('input#name').val();
    let pass = $('input#pass').val();
// console.log(name+"="+pass);
    $.ajax({
        url:'/users/login',
        data:{name: name,
                pass: pass},
        type: 'POST',
        success: function(res){
            console.log(res);
            $('#orderModal .modal-content').html(res);
            $('#loginModal').modal('hide');
            $('#orderModal').modal('show');
        },
        // error: function(res){
        //     alert('Error: ' + res);
        // }
    })
})

$(document).ready(function() {
    siteFooter();
    $(window).resize(function() {
        siteFooter();
    });

    function siteFooter() {
        var siteContent = $('#site-content');
        var siteContentHeight = siteContent.height();
        // var siteContentWidth = siteContent.width();
        var siteFooter = $('#site-footer');
        var siteFooterHeight = siteFooter.height();
        // var siteFooterWidth = siteFooter.width();
        siteContent.css({
            "margin-bottom" : siteFooterHeight + 10
        });
    };
});