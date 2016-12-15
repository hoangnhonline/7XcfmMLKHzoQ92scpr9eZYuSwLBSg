<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi" lang="vi">
    <head>
        <title>@yield('title')</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="robots" content="index,follow"/>
        <meta http-equiv="content-language" content="en"/>
        <meta name="description" content="@yield('site_description')"/>
        <meta name="keywords" content="@yield('site_keywords')"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
        <link rel="shortcut icon" href="@yield('favicon')" type="image/x-icon"/>
        <link rel="canonical" href="{{ url()->current() }}"/>        
        <meta property="og:locale" content="vi_VN" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="@yield('title')" />
        <meta property="og:description" content="@yield('site_description')" />
        <meta property="og:url" content="{{ url()->current() }}" />
        <meta property="og:site_name" content="iCho.vn" />
        <?php $socialImage = isset($socialImage) ? $socialImage : $settingArr['banner']; ?>
        <meta property="og:image" content="{{ Helper::showImage($socialImage) }}" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:description" content="@yield('site_description')" />
        <meta name="twitter:title" content="@yield('title')" />        
        <meta name="twitter:image" content="{{ Helper::showImage($socialImage) }}" />
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/lib/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/lib/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/lib/select2/css/select2.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/lib/jquery.bxslider/jquery.bxslider.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/lib/owl.carousel/owl.carousel.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/lib/jquery-ui/jquery-ui.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/reset.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/responsive.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/custom.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/sweetalert2.min.css') }}">
        <link href="{{ URL::asset('assets/css/square/red.css') }}" rel="stylesheet">
        <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', '{{ $settingArr['google_analystic'] }}', 'auto');
        ga('send', 'pageview');

        </script>
    </head>
    <body {{ \Request::route()->getName() == "home" ? "class=home" : "" }}>
    <div class="tree-noel"></div>
<div class="home-noel"></div>
        @yield('header')
        @yield('slider')
        @yield('content')
        @yield('footer')

      <!--<a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>-->
      <!-- Script-->
      <input type="hidden" id="route-ajax-login-fb" value="{{route('ajax-login-by-fb')}}">
      <input type="hidden" id="route-cap-nhat-thong-tin" value="{{ route('cap-nhat-thong-tin') }}">
      <input type="hidden" id="fb-app-id" value="{{ env('FACEBOOK_APP_ID') }}">
      <input type="hidden" id="route-register-customer-ajax" value="{{ route('register-customer-ajax') }}">
      <input type="hidden" id="route-register-newsletter" value="{{ route('register.newsletter') }}">
      <input type="hidden" id="route-add-to-cart" value="{{ route('them-sanpham') }}" />
      <input type="hidden" id="route-cart" value="{{ route('gio-hang') }}" />

      <input type="hidden" id="route-auth-login-ajax" value="{{ route('auth-login-ajax') }}">
      <script type="text/javascript" src="{{ URL::asset('assets/lib/jquery/jquery-1.11.2.min.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('assets/lib/bootstrap/js/bootstrap.min.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('assets/lib/select2/js/select2.min.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('assets/lib/jquery.bxslider/jquery.bxslider.min.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('assets/lib/owl.carousel/owl.carousel.min.js') }}"></script>
      @if(\Request::route()->getName() == "chi-tiet")
      <script type="text/javascript" src="{{ URL::asset('assets/lib/jquery.elevatezoom.js') }}"></script>
      @endif
      <script type="text/javascript" src="{{ URL::asset('assets/js/jquery.actual.min.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('assets/lib/jquery-ui/jquery-ui.min.js') }}"></script>
      <script src="{{ URL::asset('assets/js/sweetalert2.min.js') }}"></script>
      @if(\Request::route()->getName() == "chi-tiet")
      <script type="text/javascript" src="{{ URL::asset('assets/lib/fancyBox/jquery.fancybox.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('assets/js/readmore.min.js') }}"></script>
      @endif
      <script src="{{ URL::asset('assets/js/icheck.min.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('assets/js/lazy.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('assets/js/theme-script.js') }}"></script>
      
      @if(\Request::route()->getName() == "home")
      <script type="text/javascript">
          $(document).ready(function(){
              $.ajax({
                type: "GET",
                url: '{{ route("load-slider")}}',              
                success: function(data) {
                    $('#home-slider').html(data);
                    var slider = $('#contenhomeslider').bxSlider(
                        {
                            nextText:'<i class="fa fa-angle-right"></i>',
                            prevText:'<i class="fa fa-angle-left"></i>',
                            auto: true,
                        }

                    );
                    
                }              
              });
              @if(Session::get('userId') > 0)
              $.ajax({
                type: "GET",
                url: '{{ route("count-message")}}',              
                success: function(count) {
                    if(parseInt(count) > 0){
                      $('#countNoti').html(count).show();
                    }
                }              
              });              
              @endif

          });

      </script>
      @endif
      <style>

  #flake {
    color: #333;
    position: absolute;
    font-size: 25px;
    top: -50px;
  }
  
  
</style>
  <div id = "flake">&#10052;</div>
  <script>jQuery(document).ready(function() {
$('.home-noel').animate({
bottom:'0px',
},10000);
setInterval(function(){   $('.tree-noel').css('top','inherit');

$(".tree-noel").animate({
opacity:'1'
},800);
},10000);
});

</script>

<script>


var t = setInterval(
  function(){
    var documentHeight    = $(document).height();
    var startPositionLeft   = Math.random() * $(document).width() - 100;
    var startOpacity    = 0.5 + Math.random();
    var sizeFlake     = 10 + Math.random() * 20;
    var endPositionTop    = documentHeight - 40;
    var endPositionLeft   = startPositionLeft - 100 + Math.random() * 200;
    var durationFall    = documentHeight * 10 + Math.random() * 5000;
    $('#flake')
      .clone()
      .appendTo('body')
      .css(
        {
          left: startPositionLeft,
          opacity: startOpacity,
          'font-size': sizeFlake
        }
      )
      .animate(
        {
          top: endPositionTop,
          left: endPositionLeft,
          opacity: 0.2
        },
        durationFall,
        'linear',
        function() {
          $(this).remove()
        }
      );
  }, 500);




  var snow = {};
  var snowflex = {};

  snowflex.create  = function(){
    var flex = document.createElement('div');
      flex.innerHTML      = "&#10052;";
      flex.style.fontSize   = 10 + Math.random() * 20 + 'px';
      flex.style.top      = - 50 + Math.random() * 20 + 'px';
      flex.style.left     = Math.random() * 1500 + 'px';
      flex.style.position   = "absolute";
      flex.style.color    = "#F3F3F3";
      flex.style.opacity    = Math.random();
      document.getElementsByTagName('body')[0].appendChild(flex);
      return flex;
  };


  snow.snowflex = function(){
    var flex = snowflex.create();
    var x = -1 + Math.random() * 2;
    var t = setInterval( 
          function(){
            flex.style.top  = parseInt(flex.style.top) +  5 + 'px';
            flex.style.left = parseInt(flex.style.left) +  x + 'px';
            if (parseInt(flex.style.top) > 1500) {
              clearInterval(t);
              document.getElementsByTagName('body')[0].removeChild(flex);
            }     
          }, 45 + Math.random() * 20);
  };
  
  snow.storm = function(){
    var t = setInterval(
          function(){
            snow.snowflex();
          }, 500);
  };

  //snow.storm();

  var fog = {};

  fog.draw = function(ctx, x, y){
    
      ctx.fillStyle = "rgba( 255, 255, 255, " + Math.random() + " )";
      ctx.arc( x, y, 10,0,Math.PI*2,true);
      ctx.closePath();
      ctx.fill();

  };


  fog.start = function(){
    var ctx = document.getElementById('canvas').getContext("2d");
    var x = 0;
    var y = 0;
    var t = setInterval( 
          function(){
            
            x = 300 + 300*Math.sin(x);
            y = 300 + 300* -Math.cos(x);
             
            x += 2;
            fog.draw(ctx, x, y);

          }, 100);
    
  };
  
  //fog.start();

var trailimage=["http://www.icare.com.vn/wp-content/themes/icare/images/mouse.gif", 40, 111] //image path, plus width and height
var offsetfrommouse=[-11,3] //image x,y offsets from cursor position in pixels. Enter 0,0 for no offset
var displayduration=0 //duration in seconds image should remain visible. 0 for always.

if (document.getElementById || document.all)
document.write('<div id="trailimageid" style="position:absolute;visibility:visible;left:0px;top:0px;"><img src="'+trailimage[0]+'" border="0" width="'+trailimage[1]+'px" height="'+trailimage[2]+'px"></div>')

function gettrailobj(){
if (document.getElementById)
return document.getElementById("trailimageid").style
else if (document.all)
return document.all.trailimagid.style
}

function truebody(){
return (!window.opera && document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

function hidetrail(){
gettrailobj().visibility="hidden"
document.onmousemove=""
}

function followmouse(e){
var xcoord=offsetfrommouse[0]
var ycoord=offsetfrommouse[1]
if (typeof e != "undefined"){
xcoord+=e.pageX
ycoord+=e.pageY
}
else if (typeof window.event !="undefined"){
xcoord+=truebody().scrollLeft+event.clientX
ycoord+=truebody().scrollTop+event.clientY
}
var docwidth=document.all? truebody().scrollLeft+truebody().clientWidth : pageXOffset+window.innerWidth-15
var docheight=document.all? Math.max(truebody().scrollHeight, truebody().clientHeight) : Math.max(document.body.offsetHeight, window.innerHeight)
if (xcoord+trailimage[1]+3>docwidth || ycoord+trailimage[2]> docheight)
gettrailobj().display="none"
else 
gettrailobj().display=""
gettrailobj().left=xcoord+"px"
gettrailobj().top=ycoord+"px"
}

document.onmousemove=followmouse
if (displayduration>0)
setTimeout("hidetrail()", displayduration*1000)
</script>

      @yield('javascript')      
      
       <!-- Hỗ trơ trực tuyến Facebook -->
  <div class="contact-face" style="">
          <div class="title_quancaog" style="background: #d0021b;color: #fff;padding: 3px 10px;cursor:pointer;">
          <p class="xclose" style="display: none;margin: 0;" onclick="closeface();"><i class="fa fa-minus" aria-hidden="true" style="margin-right: 10px;"></i>Hỗ trợ trực tuyến</p>
          <p class="xopen" style="margin: 0;" onclick="openface();"><i class="fa fa-envelope-o" style="margin-right: 10px;" aria-hidden="true"></i>Để lại lời nhắn</p>
      </div>
      <div class="fb-page" data-tabs="messages" data-href="https://www.facebook.com/www.icho.vn" data-width="320px" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false">
          <div class="fb-xfbml-parse-ignore">
              <blockquote cite="https://www.facebook.com/www.icho.vn">
                  <a href="https://www.facebook.com/www.icho.vn">iCho.vn</a>
              </blockquote>
          </div>
      </div>
  </div>
  </body>
</html>
