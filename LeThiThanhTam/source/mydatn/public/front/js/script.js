(function ($) {
  'use strict';

  $('.main-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
    dots: true,
    arrows: true,
    autoplay: true,
    autoplaySpeed: 6000,
    prevArrow: '<div class="slick-control-prev"><i class="tf-ion-android-arrow-back"></i></div>',
    nextArrow: '<div class="slick-control-next"><i class="tf-ion-android-arrow-forward"></i></div>'
  });


  // Count Down JS

  $('#simple-timer').syotimer({
    year: 2020,
    month: 5,
    day: 9,
    hour: 20,
    minute: 30
  });

  // overlay search

  $('.search_toggle').on('click', function (e) {
    e.preventDefault();
    //$(this).toggleClass('active');
    $('.search_toggle').toggleClass('active');
    $('.overlay').toggleClass('open');
    setTimeout(function () {
      $('.search-form .form-control').focus();
    }, 400);

  });

  // bootstrap slider range
  $('.range-track').slider({});
  $('.range-track').on('slide', function (slideEvt) {
    $('.value').text(slideEvt.value[0] + 'đ' + ' - ' + slideEvt.value[1] + 'đ');
    $('#start_price').val(slideEvt.value[0]);
    $('#end_price').val(slideEvt.value[1]);
  });

  // instafeed
  if (($('#instafeed').length) !== 0) {
    var userId = $('#instafeed').attr('data-userId');
    var accessToken = $('#instafeed').attr('data-accessToken');
    var userFeed = new Instafeed({
      get: 'user',
      userId: userId,
      resolution: 'low_resolution',
      accessToken: accessToken,
      limit: 6,
      template: '<div class="col-lg-2 col-md-3 col-sm-4 col-6 px-0 mb-4"><div class="instagram-post mx-2"><img class="img-fluid w-100" src="{{image}}" alt="instagram-image"><ul class="list-inline text-center"><li class="list-inline-item"><a href="{{link}}" target="_blank" class="text-white"><i class="ti-heart mr-2"></i>{{likes}}</a></li><li class="list-inline-item"><a href="{{link}}" target="_blank" class="text-white"><i class="ti-comments mr-2"></i>{{comments}}</a></li></ul></div></div>'
    });
    userFeed.run();
  }

  $('.widget-categories .has-children').on('click', function () {
    $('.widget-categories .has-children').removeClass('expanded');
    $(this).addClass('expanded');
  });

   /*-------------------
		Quantity change
	--------------------- */


  // var proQty = $('.pro-qty');
	// proQty.prepend('<span class="dec qtybtn">-</span>');
	// proQty.append('<span class="inc qtybtn">+</span>');
	// proQty.on('click', '.qtybtn', function () {
	// 	var $button = $(this);
	// 	var oldValue = $button.parent().find('input').val();
	// 	if ($button.hasClass('inc')) {
	// 		var newVal = parseFloat(oldValue) + 1;
	// 	} else {
	// 		// Don't allow decrementing below zero
	// 		if (oldValue > 0) {
	// 			var newVal = parseFloat(oldValue) - 1;
	// 		} else {
	// 			newVal = 0;
	// 		}
	// 	}
  //   console.log(newVal);
	// 	$button.parent().find('input').val(newVal);

  //   //update cart
  //   const rowId = $button.parent().find('input').data('rowid');
  //   console.log(rowId);

  //   updateCart(rowId, newVal);
	// });

  $(".detele-product").click(function () { 
		var rowId = $(this).attr('data-rowid');
    Swal.fire({
      title: 'Bạn chắc chắn muốn xóa?',
      text: "Bạn sẽ không thể hoàn tác điều này!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Đồng ý'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            type:'GET',
            url: "gio-hang/deleteProduct",
            data:{'rowId' : rowId,
        },
      success: function (result) {
          $('#rowCart-'+ rowId).remove();
          $('#subtotal').html(result.totalMoney + ' VND');
          $('#totalqty').html(result.totalQuantity);
          if(result.totalQuantity == 0){
            $('#tableCart').remove();
            $('.cart_inner').html('<h4 style="text-align: center">Không có sản phẩm trong giỏ hàng!!</h4>');
          }
      },
        })
        Swal.fire(
          'Đã xóa',
          'Sản phẩm của bạn đã bị xóa khỏi giỏ hàng.',
          'success'
        )
      }
    })
		
	  });

    $(".huy").click(function () { 
      var rowId = $(this).attr('data-rowid');
      Swal.fire({
        title: 'Bạn chắc chắn muốn hủy?',
        text: "Bạn sẽ không thể hoàn tác điều này!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Đúng!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              type:'GET',
              url: "tai-khoan/cancelOrder",
              data:{'rowId' : rowId,
          },
        success: function (result) {
          $('#rowOrder-'+ rowId).remove();

        },
          })
          Swal.fire(
            'Đã hủy đơn hàng!',
          )
        }
      })
      
      });

    $(".btn-buy").click(function () {
      var product_id = $(this).attr('data-id');
      // thiếu giá trị màu vs size
      var size = $(this).attr('data-size');
      var color = $(this).attr('data-color');
    $.ajax({
          type: "POST",
          url: "gio-hang/addProduct",
          data: { product_id: product_id,
                  size : size,
                  color: color,
          },
          success: function (response) {
          console.log(123);
          console.log(response);
          if(response.flag==1){
            $('#totalqty').html(response.totalQuantity);
            $("#totalqty").notify("Cập nhật thành công", "success");
          }else{
            $("#totalqty").notify("Số lượng tồn kho không đủ", "danger");
          }

          },
        });
    });

    $(".upQty").on('change keyup', function() {
      var qty = $(this).val();

      var rowId = $(this).attr('data-rowid');
      console.log(qty);
      console.log(rowId);
      updateCart(rowId, qty);
    });

      function updateCart(rowId, qty){
        if(qty != ''){
        $.ajax({
          type: "GET",
          url: "gio-hang/update",
          data: {rowId: rowId, qty: qty},
          success: function (response) {
            //alert('Update successful!');
            console.log(response);
            //location.reload();
            if(response.flag==1){
              $('#subtotal').html(response.totalMoney + ' VND');
              $('#totalProduct-'+ rowId).html(response.totalMoneyProduct + ' VND');
              $('#totalqty').html(response.totalQuantity);
              $("#totalqty").notify("Cập nhật thành công", "success");
            }else{
              $("#totalqty").notify("Số lượng tồn kho không đủ", "danger");
            }
           
          },
          
        });
        
      }
    }
  

})(jQuery);