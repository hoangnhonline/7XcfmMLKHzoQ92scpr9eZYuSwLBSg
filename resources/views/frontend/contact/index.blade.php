@extends('frontend.layout')
@section('header')
@include('frontend.partials.main-header')
@include('frontend.partials.home-menu')
@endsection

@include('frontend.partials.meta')
@section('content')
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="{{ route('home') }}" title="Trở về trang chủ">Trang chủ</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Liên hệ</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- page heading-->
        <h1 class="page-heading">
            <span class="page-heading-title2">THÔNG TIN Liên hệ</span>
        </h1>
        <!-- ../page heading-->
        <div id="contact" class="page-content page-contact">
            <div id="message-box-conact"></div>
            <div class="row">
                
                <div class="col-sm-6">	               
                    
                    @if(Session::has('message'))
	                <p class="alert alert-info" >{{ Session::get('message') }}</p>
	                @endif
                    <form method="POST" action="{{ route('send-contact') }}">
                     @if (count($errors) > 0)
	                  <div class="alert alert-danger">
	                    <ul>	                       
	                        <li>Vui lòng nhập đầy đủ thông tin.</li>	                        
	                    </ul>
	                  </div>
	                @endif	
                    <div class="contact-form-box">
                        <div class="form-selector">
                            <label>Quý khách quan tâm <span class="required">*</span></label>
                            <select class="form-control input-sm" id="type" name="type">                                
                                <option value="1" {{ old('type') == 1 ? "selected" : "" }}>Tư vấn mua hàng</option>
                                <option value="2" {{ old('type') == 2 ? "selected" : "" }}>Phản ánh dịch vụ</option>
                                <option value="3" {{ old('type') == 3 ? "selected" : "" }}>Hợp tác</option>
                                <option value="4" {{ old('type') == 4 ? "selected" : "" }}>Góp ý</option>
                            </select>                            
                        </div>
                        <div class="form-selector">
                            <label>Tiêu đề <span class="required">*</span></label>
                            <input type="text" class="form-control input-sm" id="title" name="title" value="{{ old('title') }}" />
                        </div>
                       <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-selector">
                            <label>Họ và tên <span class="required">*</span></label>
                            <input type="text" class="form-control input-sm" id="full_name" name="full_name"  value="{{ old('full_name') }}"/>
                        </div>
                        <div class="form-selector">
                            <label>Email <span class="required">*</span></label>
                            <input type="email" class="form-control input-sm" id="email" name="email" value="{{ old('email') }}" />
                        </div>
                         <div class="form-selector">
                            <label>Số điện thoại <span class="required">*</span></label>
                            <input type="text" class="form-control input-sm" id="phone" name="phone" value="{{ old('phone') }}" />
                        </div>                  
                        <div class="form-selector">
                            <label>Nội dung <span class="required">*</span></label>
                            <textarea class="form-control input-sm" rows="10" id="content" name="content">{{ old('content') }}</textarea>
                        </div>
                        <div class="form-selector">
                            <button type="submit" id="btn-send-contact" class="btn">Gửi đi</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="col-xs-12 col-sm-6" id="contact_form_map">                    
                    <div class="content">
                        <h4 style="margin-bottom:10px">iCho.vn - Chợ Công Nghệ Giá Sỉ</h4>                        
                        <p>Hotline: <span class="tel">1900 63 69 75</span></p>                        
                        <p>Email: <a href="mailto:muahang@icho.vn">muahang@icho.vn</a></p>
                    </div>
                    <br/> 
                    <!--<div class="with-map clearfix">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.496143069247!2d106.7656088148014!3d10.849817992271774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x920ec32248472005!2zQ2jhu6MgY8O0bmcgbmdo4buHIGdpw6Egc-G7iQ!5e0!3m2!1sen!2s!4v1462593207422" height="450" frameborder="0" style="border:0" allowfullscreen width="100%"></iframe>
                    </div>-->
          
                    </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    span.required{
        color:red;
    }
</style>
@endsection

@include('frontend.partials.footer')
