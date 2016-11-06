(function($){
    "use strict"; // Start of use strict
    /* ---------------------------------------------
     Scripts initialization
     --------------------------------------------- */
    $(window).load(function() {
        // auto width megamenu
        auto_width_megamenu();
        resizeTopmenu();
    });
    /* ---------------------------------------------
     Scripts ready
     --------------------------------------------- */
    $(document).ready(function(){
        if($('.countdown-lastest').length >0){
            var labels = ['năm', 'tháng', 'tuần', 'ngày', 'giờ', 'phút', 'giây'];
            var layout = '<span class="box-count">Còn <span class="countdown-amount">{dnn}</span> <span class="text">ngày </span></span><span class="box-count"><span class="countdown-amount">{hnn}</span> <span class="text">giờ </span></span><span class="box-count"><span class="countdown-amount">{mnn}</span> <span class="text">phút </span></span><span class="box-count"><span class="countdown-amount">{snn}</span> <span class="text">giây</span></span>';
            $('.countdown-lastest').each(function() {
                var austDay = new Date($(this).data('y'),$(this).data('m') - 1,$(this).data('d'),$(this).data('h'),$(this).data('i'),$(this).data('s'));
                $(this).countdown({
                    until: austDay,
                    labels: labels, 
                    layout: layout
                });
            });
        }
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-red',
        radioClass: 'iradio_square-red',
        increaseArea: '20%' // optional
      });
    });
    $(document).ready(function() {
        /* Resize top menu*/
        resizeTopmenu();
        /* Zoom image */
        if($('#product-zoom').length >0){
            $('#product-zoom').elevateZoom({
                zoomType: "inner",
                cursor: "crosshair",
                zoomWindowFadeIn: 500,
                zoomWindowFadeOut: 750,
                gallery:'gallery_01'
            }); 
        }
        /* Popup sizechart */
        if($('#size_chart').length >0){
            $('#size_chart').fancybox();
        }
        /** OWL CAROUSEL**/
        $(".owl-carousel").each(function(index, el) {
          var config = $(this).data();
          config.navText = ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'];
          config.smartSpeed="300";
          if($(this).hasClass('owl-style2')){
            config.animateOut="fadeOut";
            config.animateIn="fadeIn";    
          }
          $(this).owlCarousel(config);
        });
        $(".owl-carousel-vertical").each(function(index, el) {
          var config = $(this).data();
          config.navText = ['<span class="icon-up"></spam>','<span class="icon-down"></span>'];
          config.smartSpeed="900";
          config.animateOut="";
            config.animateIn="fadeInUp";
          $(this).owlCarousel(config);
        });

        /* Close top banner*/
        $(document).on('click','.btn-close',function(){
            $(this).closest('.top-banner').animate({ height: 0, opacity: 0 },1000);
            return false;
        })
        /** SELECT CATEGORY **/
        $('.select-category').select2();
        /* Toggle nav menu*/
        $(document).on('click','.toggle-menu',function(){
            $(this).closest('.nav-menu').find('.navbar-collapse').toggle();
            return false;
        })
        /** HOME SLIDE**/
        $('.main-header form').submit(function(){
            if($.trim($('input[name=keyword]').val()) == ''){
                return false;
            }
        });
        /** Custom page sider**/
        if($('#home-slider').length >0 && $('#contenhomeslider-customPage').length >0){
            var slider = $('#contenhomeslider-customPage').bxSlider(
                {
                    nextText:'<i class="fa fa-angle-right"></i>',
                    prevText:'<i class="fa fa-angle-left"></i>',
                    auto: true,
                    pagerCustom: '#bx-pager',
                    nextSelector: '#bx-next',
                    prevSelector: '#bx-prev',
                }

            );
        }

        if($('#home-slider').length >0 && $('#slide-background').length >0){
            var slider = $('#slide-background').bxSlider(
                {
                    nextText:'<i class="fa fa-angle-right"></i>',
                    prevText:'<i class="fa fa-angle-left"></i>',
                    auto: true,
                    onSlideNext: function ($slideElement, oldIndex, newIndex) {
                       var corlor = $($slideElement).data('background');   
                       $('#home-slider').css('background',corlor);     
                    },
                    onSlidePrev: function ($slideElement, oldIndex, newIndex) {
                       var corlor = $($slideElement).data('background');   
                       $('#home-slider').css('background',corlor);     
                    }
                }

            );
            slider.goToNextSlide();
        }
        
        /* elevator click*/ 
        $(document).on('click','a.btn-elevator',function(e){
            e.preventDefault();
            var target = this.hash;
            if($(document).find(target).length <=0){
                return false;
            }
            var $target = $(target);
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top-50
            }, 500);
            return false;
        })
        /* scroll top */ 
        $(document).on('click','.scroll_top',function(){
            $('body,html').animate({scrollTop:0},400);
            return false;
        })
        /** #brand-showcase */
        $(document).on('click','.brand-showcase-logo li',function(){
            var id = $(this).data('tab');
            $(this).closest('.brand-showcase-logo').find('li').each(function(){
                $(this).removeClass('active');
            });
            $(this).closest('li').addClass('active');
            $('.brand-showcase-content').find('.brand-showcase-content-tab').each(function(){
                $(this).removeClass('active');
            })
            $('#'+id).addClass('active');
            return false;
        })
        // CATEGORY FILTER 
        $('.slider-range-price').each(function(){
            var min             = $(this).data('min');
            var max             = $(this).data('max');
            var unit            = $(this).data('unit');
            var value_min       = $(this).data('value-min');
            var value_max       = $(this).data('value-max');
            var label_reasult   = $(this).data('label-reasult');
            var t               = $(this);
            $( this ).slider({
              range: true,
              min: min,
              max: max,
              values: [ value_min, value_max ],
              slide: function( event, ui ) {
                var result = label_reasult +" "+ unit + ui.values[ 0 ] +' - '+ unit +ui.values[ 1 ];
                console.log(t);
                t.closest('.slider-range').find('.amount-range-price').html(result);
              }
            });
        })
        /** ALL CAT **/
        $(document).on('click','.open-cate',function(){
            $(this).closest('.vertical-menu-content').find('li.cat-link-orther').each(function(){
                $(this).slideDown();
            });
            $(this).addClass('colse-cate').removeClass('open-cate').html('Đóng');
        })
        /* Close category */
        $(document).on('click','.colse-cate',function(){
            $(this).closest('.vertical-menu-content').find('li.cat-link-orther').each(function(){
                $(this).slideUp();
            });
            $(this).addClass('open-cate').removeClass('colse-cate').html('Xem tất cả');
            return false;
        })
        // bar ontop click
        $(document).on('click','.vertical-megamenus-ontop-bar',function(){
            $('#vertical-megamenus-ontop').find('.box-vertical-megamenus').slideToggle();
          //  $('#vertical-megamenus-ontop').toggleClass('active');
            return false;
        })
        // View grid list product 
        $(document).on('click','.display-product-option .view-as-grid',function(){
            $(this).closest('.display-product-option').find('li').removeClass('selected');
            $(this).addClass('selected');
            $(this).closest('#view-product-list').find('.product-list').removeClass('list').addClass('grid');
            return false;
        })
        // View list list product 
        $(document).on('click','.display-product-option .view-as-list',function(){
            $(this).closest('.display-product-option').find('li').removeClass('selected');
            $(this).addClass('selected');
            $(this).closest('#view-product-list').find('.product-list').removeClass('grid').addClass('list');
            return false;
        })
        /// tre menu category
        $(document).on('click','.tree-menu li span',function(){
            $(this).closest('li').children('ul').slideToggle();
            if($(this).closest('li').haschildren('ul')){
                $(this).toggleClass('open');
            }
            return false;
        })
        /* Open menu on mobile */
        $(document).on('click','.btn-open-mobile',function(){
            var width = $(window).width();
            if(width >1024){
                if($('body').hasClass('home')){
                    if($('#nav-top-menu').hasClass('nav-ontop')){
                        $('#small_logo').show();
                    }else{
                        return false;
                    }
                }
            }
            $(this).closest('.box-vertical-megamenus').find('.vertical-menu-content').slideToggle();
            $(this).closest('.title').toggleClass('active');
            return false;
        })
        /* Product qty */
        $(document).on('click','.btn-plus-down',function(){
            var value = parseInt($('#option-product-qty').val());
            value = value -1;
            if(value <=0) return false;
            $('#option-product-qty').val(value);
            return false;
        })
        $(document).on('click','.btn-plus-up',function(){
            var value = parseInt($('#option-product-qty').val());
            value = value +1;
            if(value <=0) return false;
            $('#option-product-qty').val(value);
            return false;
        })
        /* Close vertical */
        $(document).on('click','*',function(e){
            var container = $("#box-vertical-megamenus");
            if (!container.is(e.target) && container.has(e.target).length === 0){
                if($('body').hasClass('home')){
                    if($('#nav-top-menu').hasClass('nav-ontop')){
                        $('#small_logo').show();
                    }else{
                        return;
                    }
                }
                container.find('.vertical-menu-content').hide();
                container.find('.title').removeClass('active');
            }
        })
        /* Send conttact*/
        $(document).on('click','#btn-send-contact',function(){
            var subject = $('#subject').val(),
                email   = $('#email').val(),
                order_reference = $('#order_reference').val(),
                message = $('#message').val();
            var data = {
                subject:subject,
                email:email,
                order_reference:order_reference,
                message:message
            }
            $.post('ajax_contact.php',data,function(result){
                if(result.trim()=="done"){
                    $('#email').val('');
                    $('#order_reference').val('');
                    $('#message').val('');
                    $('#message-box-conact').html('<div class="alert alert-info">Your message was sent successfully. Thanks</div>');
                }else{
                    $('#message-box-conact').html(result);
                }
            })
        })
    });
    /* ---------------------------------------------
     Scripts resize
     --------------------------------------------- */
    $(window).resize(function(){
        // auto width megamenu
        auto_width_megamenu();
        // Remove menu ontop
        remove_menu_ontop();
        // resize top menu
        resizeTopmenu();
    });
    /* ---------------------------------------------
     Scripts scroll
     --------------------------------------------- */
    $(window).scroll(function(){
        /* Show hide scrolltop button */
        if( $(window).scrollTop() == 0 ) {
            $('.scroll_top').stop(false,true).fadeOut(600);
        }else{
            $('.scroll_top').stop(false,true).fadeIn(600);
        }
        /* Main menu on top */
        var h = $(window).scrollTop();
        var max_h = $('#header').height() + $('#top-banner').height();
        var width = $(window).width();
        if(width > 767){
            if( h > (max_h + vertical_menu_height)-50){
                // fix top menu
                $('#nav-top-menu').addClass('nav-ontop');
                $('#small_logo').show();
                //$('#nav-top-menu').find('.vertical-menu-content').hide();
                //$('#nav-top-menu').find('.title').removeClass('active');
                // add cart box on top menu
                $('#cart-block .cart-block').appendTo('#shopping-cart-box-ontop .shopping-cart-box-ontop-content');
                $('#shopping-cart-box-ontop').fadeIn();
                $('#user-info-top').appendTo('#user-info-opntop');
                $('#header .header-search-box form').appendTo('#form-search-opntop');
            }else{
                $('#nav-top-menu').removeClass('nav-ontop');
                $('#small_logo').hide();
                if($('body').hasClass('home')){
                    $('#nav-top-menu').find('.vertical-menu-content').removeAttr('style');
                    if(width > 1024)
                        $('#nav-top-menu').find('.vertical-menu-content').show();
                    else{
                        $('#nav-top-menu').find('.vertical-menu-content').hide();
                    }
                     $('#nav-top-menu').find('.vertical-menu-content').removeAttr('style');
                }
                ///
                $('#shopping-cart-box-ontop .cart-block').appendTo('#cart-block');
                $('#shopping-cart-box-ontop').fadeOut();
                $('#user-info-opntop #user-info-top').appendTo('.top-header .container');
                $('#form-search-opntop form').appendTo('#header .header-search-box');
            }
        }
    });
    var vertical_menu_height = $('#box-vertical-megamenus .box-vertical-megamenus').innerHeight();
    /**==============================
    ***  Auto width megamenu
    ===============================**/
    function auto_width_megamenu(){
        var full_width = parseInt($('.container').innerWidth());
        //full_width = $( document ).width();
        var menu_width = parseInt($('.vertical-menu-content').actual('width'));
        $('.vertical-menu-content').find('.vertical-dropdown-menu').each(function(){
            $(this).width((full_width - menu_width)-2);
        });
    }
    /**==============================
    ***  Remove menu on top
    ===============================**/
    function remove_menu_ontop(){
        var width = parseInt($(window).width());
        if(width < 768){
            $('#nav-top-menu').removeClass('nav-ontop');
            if($('body').hasClass('home')){
                if(width > 1024)
                    $('#nav-top-menu').find('.vertical-menu-content').show();
                else{
                    $('#nav-top-menu').find('.vertical-menu-content').hide();
                }
            }
            ///
            $('#shopping-cart-box-ontop .cart-block').appendTo('#cart-block');
            $('#shopping-cart-box-ontop').fadeOut();
            $('#user-info-opntop #user-info-top').appendTo('.top-header .container');
            $('#form-search-opntop form').appendTo('#header .header-search-box');
        }
    }
    /* Top menu*/
    function scrollCompensate(){
        var inner = document.createElement('p');
        inner.style.width = "100%";
        inner.style.height = "200px";
        var outer = document.createElement('div');
        outer.style.position = "absolute";
        outer.style.top = "0px";
        outer.style.left = "0px";
        outer.style.visibility = "hidden";
        outer.style.width = "200px";
        outer.style.height = "150px";
        outer.style.overflow = "hidden";
        outer.appendChild(inner);
        document.body.appendChild(outer);
        var w1 = parseInt(inner.offsetWidth);
        outer.style.overflow = 'scroll';
        var w2 = parseInt(inner.offsetWidth);
        if (w1 == w2) w2 = outer.clientWidth;
        document.body.removeChild(outer);
        return (w1 - w2);
    }

    function resizeTopmenu(){
        if($(window).width() + scrollCompensate() >= 768){
            var main_menu_w = $('#main-menu .navbar').innerWidth();
            $("#main-menu ul.mega_dropdown").each(function(){
                var menu_width = $(this).innerWidth();
                var offset_left = $(this).position().left;

                if(menu_width > main_menu_w){
                    $(this).css('width',main_menu_w+'px');
                    $(this).css('left','0');
                }else{
                    if((menu_width + offset_left) > main_menu_w){
                        var t = main_menu_w-menu_width;
                        var left = parseInt((t/2));
                        $(this).css('left',left);
                    }
                }
            });
        }

        if($(window).width()+scrollCompensate() < 1025){
            $("#main-menu li.dropdown:not(.active) >a").attr('data-toggle','dropdown');
        }else{
            $("#main-menu li.dropdown >a").removeAttr('data-toggle');
        }
    }
    
    /* Display user box in the header 
    
    $('body,html').append('<div class="global-overlay"></div>');
    $('.global-overlay').css('display', 'none'); */
    
    $(".header-user .user-name .user-name-box").hide();
    $(".header-user .user-name").hover(function(){
      $(this).children('.user-name-box').show();
      $('.global-overlay').css('display', 'block');
    }, function(){
      $(this).children('.user-name-box').hide();
      $('.global-overlay').css('display', 'none');
    });
    
    
    /* Display modal for user box 
    
    $('#modalResetPasswordFrom').on('shown.bs.modal', function () {
      $(this).css('padding-right','0px');
      $('body').css('padding-right','0px');
    })
    $('#modalRegisterFrom').on('shown.bs.modal', function () {
      $(this).css('padding-right','0px');
      $('body').css('padding-right','0px');
    })
    $('#modalLoginFrom').on('shown.bs.modal', function () {
      $(this).css('padding-right','0px');
      $('body').css('padding-right','0px');
    })*/
    
    /*$(".readmore").click(function () {
      open = !open;
      if (!open) {
        $(this).text("Thu gọn");
        $(".product-content-detail").css("max-height", "10000px");
      }
      else {
        $(this).text("Xem chi tiết");
        $('html, body').animate({
            scrollTop: $(".product-content-detail").offset().top
        });
        $(".product-content-detail").css("max-height", "500px");
        
      }
    });    
    if( $('.product-content-detail').height() >= 400){
        $('.box-readmore').show();        
    }else{
        $('.box-readmore').hide();
    }    
    */
    /*$('#btnEmptyCart').click(function(){
        var obj = $(this);
        swal({
          title: "",
          text: "Xóa tất cả sản phẩm trong giỏ hàng ?",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Xóa"          
        },
        function(isConfirm){
            if(isConfirm){
              $.ajax({
                url : obj.data('url'),
                type : 'GET',
                success : function(){
                    //window.location.reload();
                }
              });
            }
        });
    });
    */
    if($('#content-chitiet').length==1){
        $('#content-chitiet').readmore({
            speed: 100,
            collapsedHeight: 380,
            heightMargin: 16,
            moreLink: '<p class="box-readmore"><a href="javascript:;" class="readmore">Xem thêm</a></p>',        
            lessLink: '<p class="box-readmore"><a href="javascript:;" class="readmore">Rút gọn</a></p>',
            embedCSS: true,
            blockCSS: ' width: 100%;  background: #fff;  height: 65px;  bottom: 0; margin:0px;',
            startOpen: false,
            afterToggle: function(trigger, element, expanded) {
              if(! expanded) { // The "Close" link was clicked
                $('html, body').animate({scrollTop: $('.product-tab').offset().top}, {duration: 100});
              }
            }           
        });

        $('#content-thongso').readmore({
            speed: 100,
            collapsedHeight: 380,
            heightMargin: 16,
            moreLink: '<p class="box-readmore"><a href="javascript:;" class="readmore">Xem thêm</a></p>',        
            lessLink: '<p class="box-readmore"><a href="javascript:;" class="readmore">Rút gọn</a></p>',
            embedCSS: true,
            blockCSS: ' width: 100%;  background: #fff;  height: 65px;  bottom: 0; margin:0px;',
            startOpen: false,
            afterToggle: function(trigger, element, expanded) {
              if(! expanded) { // The "Close" link was clicked
                $('html, body').animate({scrollTop: $('.product-tab').offset().top}, {duration: 100});
              }
            }           
        });
    }
      
    $('img.lazy').lazyload();

})(jQuery); // End of use strict
function closeface() {
    jQuery('.xclose').css('display', 'none');
    jQuery('.xopen').css('display', 'block');
    jQuery('.contact-face').css('bottom', '-300px');
}
function openface() {
    jQuery('.xclose').css('display', 'block');
    jQuery('.xopen').css('display', 'none');
    jQuery('.contact-face').css('bottom', '0');
}
function e_friend() {
  var e_add= prompt('Nhập địa chỉ email:',' ');
  if ((e_add==" ") || (e_add==null)) {
    alert("Bạn chưa nhập địa chỉ email");
  } else {
    var subj= prompt('Tiêu đề:',' ');
    if ((subj==" ") || (subj==null))
      subj="Hi!";
    var mess= prompt('Nội dung:',' ');
    var title = document.title
    var url = document.location.href;
    window.location="mailto:" + e_add + "?subject=" + subj + "&body=" + mess + "%0A%0A" + title + "%0A" + url;
  }
}
//js home
if(window.location.hash && window.location.hash == '#_=_') {
window.location.hash = '';
}
$(document).on('keypress', '#popup-login-email, #popup-login-password', function(e){
if(e.keyCode==13){
  $('#login_popup_submit').click();
}
});
$(document).on('keypress', '#popup-register-email, #popup-register-password, #popup-register-name', function(e){
  if(e.keyCode==13){
    $('#register_popup_submit').click();
  }
});
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#newsletter_email').bind('keypress', function(e) {
      if(e.keyCode==13){
        $('.btn-get-newsletter').click();
      }
    });
    $('#reg_success').bind('keypress', function(e) {
      if(e.keyCode==13){
        $('#btnRegTin').click();
      }
    });
    $('#btnRegTin').click(function() {
        var email = $.trim($('#reg_success').val());        
        if(validateEmail(email)) {
            $.ajax({
              url: $('#route-register-newsletter').val(),
              method: "POST",
              data : {
                email: email,
              },
              success : function(data){
                if(+data){
                  swal('', 'Đăng ký nhận bản tin thành công.', 'success');
                }
                else {
                  swal('', 'Địa chỉ email đã được đăng ký trước đó.', 'error');
                }
                $('#reg_success').val("");
              }
            });
        } else {
            swal({ title: '', text: 'Vui lòng nhập địa chỉ email hợp lệ.', type: 'error' });
        }
    });
    $('.btn-get-newsletter').click(function() {
        var email = $.trim($('#newsletter_email').val());
        var $email = $(this).parent().prev();
        if(validateEmail(email)) {
            $.ajax({
              url: $('#route-register-newsletter').val(),
              method: "POST",
              data : {
                email: email,
              },
              success : function(data){
                if(+data){
                  swal('', 'Đăng ký nhận bản tin thành công.', 'success');
                }
                else {
                  swal('', 'Địa chỉ email đã được đăng ký trước đó.', 'error');
                }
                $email.val("");
              }
            });
        } else {
            swal({ title: '', text: 'Vui lòng nhập địa chỉ email hợp lệ.', type: 'error' });
        }
    });

    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    $('#login_popup_submit').click(function() {
        var $form = $(this).parents('form');
        var error = [];
        var list_check = ['popup-login-email', 'popup-login-password'];
        var login_email    = $form.find('#popup-login-email').val();
        var login_password = $form.find('#popup-login-password').val();
        if(!login_email) {
          error.push('popup-login-email');
        }

        if(!validateEmail(login_email))
        {
          error.push('popup-login-email');
        }

        if(!login_password) {
          error.push('popup-login-password');
        }

        for(i in list_check) {
          $('#'+list_check[i]).parent().removeClass('has-error');
          $('#'+list_check[i]).next().hide();
        }

        if(error.length) {
          for(i in error) {
            $('#'+error[i]).parent().addClass('has-error');
            $('#'+error[i]).next().show();
          }
          return false;
        }

        if(!error.length)
        {
            $.ajax({
              url: $('#route-auth-login-ajax').val(),
              method: "POST",
              data : {
                email: login_email,
                password: login_password
              },
              success : function(data){
               if(data.error == 1)
               {
                  $('#login_popup_form #error_captcha').html('Email hoặc mật khẩu không đúng.')
               }
               else {
                    location.reload();
               }
              }
            });
        }

    });

    $('#register_popup_submit').click(function(){
        var $form = $(this).parents('form');
        var error = [];
        var list_check = ['popup-register-email', 'popup-register-password', 'popup-register-name'];
        var email = $('#popup-register-email').val();
        var password = $('#popup-register-password').val();
        var full_name = $('#popup-register-name').val();

        if(!email) {
          error.push('popup-register-email');
        }

        if(password.length < 6 || password.length > 32) {
          error.push('popup-register-password');
        }

        if(!full_name) {
          error.push('popup-register-name');
        }

        for(i in list_check) {
          $('#'+list_check[i]).parent().removeClass('has-error');
          $('#'+list_check[i]).parent().find('.help-block').hide();
        }

        if(error.length) {
          for(i in error) {
            $('#'+error[i]).parent().addClass('has-error');
            $('#'+error[i]).next().show();
          }
          return false;
        }

        if(!error.length)
        {
            $.ajax({
              url: $('#route-register-customer-ajax').val(),
              method: "POST",
              data : {
                email: email,
                password: password,
                full_name: full_name
              },
              success : function(data){
                if(data.error == 'email')
                {
                    $('small[er=NOT_VALIDATED]').show();
                    $('small[er=notEmpty]').hide();
                }
                else {
                    location.reload();
                }
              }
            });
        }

    });


});
window.fbAsyncInit = function() {
  FB.init({
    appId      : $('#fb-app-id').val(),
    cookie     : true,  // enable cookies to allow the server to access
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.7' // use graph api version 2.7
  });
};

(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

$(document).ready(function() {
  $('.login-by-facebook-popup').click(function() {
    FB.login(function(response){
      if(response.status == "connected")
      {
         // call ajax to send data to server and do process login
        var token = response.authResponse.accessToken;
        $.ajax({
          url: $('#route-ajax-login-fb').val(),
          method: "POST",
          data : {
            token : token
          },
          success : function(data){
            if(!data.success) {
              location.reload();
            } else {
              location.href = $('#route-cap-nhat-thong-tin').val();
            }
          }
        });

      }
    }, {scope: 'public_profile,email'});
  });
  //mua hang
    $('.add_to_cart_button, .btnorder, .compare-buy-btn').click(function() {
        var product_id = $(this).attr('product-id');
        add_product_to_cart(product_id);
    });
});



function add_product_to_cart(product_id) {
  $.ajax({
    url: $('#route-add-to-cart').val(),
    method: "POST",
    data : {
      id: product_id
    },
    success : function(data){
      location.href = $('#route-cart').val();
    }
  });
}