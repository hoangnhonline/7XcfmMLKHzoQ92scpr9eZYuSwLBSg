<?php
namespace App\Helpers;
use App\Helpers\simple_html_dom;
use App\Models\City;
use DB;

class Helper
{
    public static $privateKey = 'enilnohngnaoh';

    public static function shout(string $string)
    {
        return strtoupper($string);
    }

    public static function showImage($image_url, $type = 'original'){

        return strpos($image_url, 'http') === false ? config('icho.upload_url') . $type . '/' . $image_url : $image_url;        

    }
    public static function seo(){
        $seo = [];
        $arrTmpSeo = DB::table('info_seo')->get();
        $arrSeo = $arrUrl = [];
        foreach($arrTmpSeo as $tmpSeo){
          $arrSeo[$tmpSeo->url] = ['title' => $tmpSeo->title, 'description' => $tmpSeo->description, 'keywords' => $tmpSeo->keywords, 'image_url' => $tmpSeo->image_url];
          $arrUrl[] = $tmpSeo->url;

        }
        if(in_array(url()->current(), $arrUrl)){
          $seo = $arrSeo[url()->current()];
        }
        if(empty($seo)){
          $seo['title'] = $seo['description'] = $seo['keywords'] = "Trang chủ iCho.vn";
        }      
        return $seo;
    }
    public static function getDayFromTo($option){
        $arr = [];
        switch ($option) {
            case '7-ngay-qua': // 7 ngay qua
                $to_date = time();
                $from_date = time() - 6*24*3600;                
                break;
            case 'thang-nay' : //thang nay
                $to_date = time();
                $month_current = date('m', $to_date);
                $from_date = date('Y')."-".date('m')."-01";
                $from_date = strtotime($from_date);                
                break;
            case 'thang-truoc' : //thang truoc
                if( date('m') == '01' ){
                    $month = '12';
                    $year = date('Y')-1;
                }else{
                    $month = date('m')-1;
                    $year = date('Y');
                }
                $from_date = $year."-".$month."-01";
                $number = cal_days_in_month(CAL_GREGORIAN, $month, $year); // 31
                $to_date = $year."-".$month."-".$number;
                $from_date = strtotime($from_date);
                $to_date = strtotime($to_date);
                break;
            default:
                # code...
                break;
        }
        return $arr = ['date_from' => date('Y-m-d', $from_date), 'date_to' => date('Y-m-d', $to_date)];
    }
    public static function getName( $id, $table){
        $rs = DB::table($table)->where('id', $id)->first();

        return $rs ? $rs->name : "";
    }
    public static function calDayDelivery( $city_id ){
        
        $tmp = City::find($city_id);

        $region_id = $tmp->region_id;
      
        $endDay = $region_id == 1 ? time() + 3*3600*24 : time() + 4*3600*24;

        $arrDate = self::createDateRangeArray(date('Y-m-d'), date('Y-m-d', $endDay));
        
        return $arrDate;
    }

    public static function parseThuVN($time){
        $thu = '';
        $day = date('D', $time );
        switch ($day) {
            case 'Mon':
                $thu = "Thứ hai";
                break;
            case 'Tue':
                $thu = "Thứ ba";
                break;
            case 'Wed':
                $thu = "Thứ tư";
                break;
            case 'Thu':
                $thu = "Thứ năm";
                break;
            case 'Fri':
                $thu = "Thứ sáu";
                break;
            case 'Sat':
                $thu = "Thứ bảy";
                break;
            case 'Sun':
                $thu = "Chủ nhật";
                break;               
        }
        return $thu;
           
    }
    public static function getDateFromRange($strDateFrom,$strDateTo)
    {
        // takes two dates formatted as YYYY-MM-DD and creates an
        // inclusive array of the dates between the from and to dates.

        // could test validity of dates here but I'm already doing
        // that in the main script

        $aryRange=array();

        $iDateFrom=mktime(1,0,0,substr($strDateFrom,5,2),     substr($strDateFrom,8,2),substr($strDateFrom,0,4));
        $iDateTo=mktime(1,0,0,substr($strDateTo,5,2),     substr($strDateTo,8,2),substr($strDateTo,0,4));

        if ($iDateTo>=$iDateFrom)
        {
            array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry
            while ($iDateFrom<$iDateTo)
            {
                $iDateFrom+=86400; // add 24 hours
                array_push($aryRange,date('Y-m-d',$iDateFrom));
            }
        }
        return $aryRange;
    }
    public static function createDateRangeArray($strDateFrom, $strDateTo) {
    //var_dump($strDateFrom, $strDateTo);die;     
      $arrDate= $arrReturn = array();

      $iDateFrom= self::parseDate( $strDateFrom );
      $iDateTo= self::parseDate( $strDateTo );

      if ($iDateTo>=$iDateFrom) {
        $arrDate[] = date('Y-m-d',$iDateFrom);

        while ($iDateFrom<$iDateTo) {
          $iDateFrom += 86400; // add 24 hours
          $arrDate[] = date('Y-m-d',$iDateFrom);
        }
      }
      //var_dump($arrDate);die;
        unset( $arrDate[0] );
        $endDay = self::parseDate($arrDate[count($arrDate)]);

        foreach( $arrDate as $date){
            $day = date('D', strtotime($date) );
            if( $day == 'Sat' || $day == 'Sun'){
                    $endDay += 86400;                    
            }
            $fromDay = $endDay-86400;
        }
        $arrReturn['fromdate'] = self::parseThuVN($fromDay).", ".date('d/m/Y', $fromDay);
        $arrReturn['todate'] = self::parseThuVN($endDay).", ".date('d/m/Y', $endDay);
       
      return $arrReturn;
    }
    public static function parseDate($strDate){
        return mktime(1,0,0,substr($strDate,5,2), substr($strDate,8,2),substr($strDate,0,4));
    }
    public static function checkNgayNghi($arrDate){
        unset( $arrDate[0] );
        foreach( $arrDate as $date){
                echo $date;
                echo "<br>";
        }
    }
    public static function phiVanChuyen($kg, $city_id, $district_id){        
        $phi = 0;
        if( $city_id == 294){ // HCM => tinh theo 
            if(in_array($district_id, [492,495,496,502,503,504,505,506,507])){ // ngoai_thanh, huyen xa khac
                $phi = 20000;
            }else{
                $phi = 15000;
            }
            if( $kg > 2){
                $phi_them = 0;
                $kg_them = ceil($kg - 2);
                $phi_them = $kg_them*3000; // tren 2 kg moi kg tang 3000                
                $phi += $phi_them;
            }

        }else{ // cac tinh thanh khac ngoai HCM
            if( $kg > 3){
                $phi = 48000;
                $phi_them = 0;
                $kg_them = ceil($kg - 3);
                $region_type = self::checkRegion($city_id);

                if( $region_type == 1){//cung mien                    
                    $phi_them = $kg_them*5000;
                }elseif( $region_type == 2){ //lien mien
                    $phi_them = $kg_them*6000;
                }else{ // cach mien
                    $phi_them = $kg_them*8000;
                }
                $phi += $phi_them;
            }else{
                if( 0 < $kg && $kg <= 0.5 ){
                    $phi = 20000;
                }elseif( 0.5 < $kg && $kg <= 1 ){
                    $phi = 26000;
                }elseif( 1 < $kg && $kg <= 1.5){
                    $phi = 34000;
                }elseif( 1.5 < $kg && $kg <= 2){
                    $phi = 44000;
                }elseif( 2 < $kg && $kg <= 3){
                    $phi = 48000;
                }
            }
        }
        
        return $phi;
    }
    public static function checkRegion($city_id){
        $detailCity = City::find($city_id);
        return $detailCity->region_id;
    }
    public static function encodeLink($string){
        $returnString = "";
        $charsArray = str_split("e7NjchMCEGgTpsx3mKXbVPiAqn8DLzWo_6.tvwJQ-R0OUrSak954fd2FYyuH~1lIBZ");
        $charsLength = count($charsArray);
        $stringArray = str_split($string);
        $keyArray = str_split(hash('sha256',self::$privateKey));
        $randomKeyArray = array();
        while(count($randomKeyArray) < $charsLength){
            $randomKeyArray[] = $charsArray[rand(0, $charsLength-1)];
        }
        for ($a = 0; $a < count($stringArray); $a++){
            $numeric = ord($stringArray[$a]) + ord($randomKeyArray[$a%$charsLength]);
            $returnString .= $charsArray[floor($numeric/$charsLength)];
            $returnString .= $charsArray[$numeric%$charsLength];
        }
        $randomKeyEnc = '';
        for ($a = 0; $a < $charsLength; $a++){
            $numeric = ord($randomKeyArray[$a]) + ord($keyArray[$a%count($keyArray)]);
            $randomKeyEnc .= $charsArray[floor($numeric/$charsLength)];
            $randomKeyEnc .= $charsArray[$numeric%$charsLength];
        }
        return $randomKeyEnc.hash('sha256',$string).$returnString;
    }
    public static function decodeLink($string){
        $returnString = "";
        $charsArray = str_split("e7NjchMCEGgTpsx3mKXbVPiAqn8DLzWo_6.tvwJQ-R0OUrSak954fd2FYyuH~1lIBZ");
        $charsLength = count($charsArray);
        $keyArray = str_split( hash( 'sha256', self::$privateKey ));
        $stringArray = str_split(substr($string, ( $charsLength * 2 ) + 64));
        $sha256 = substr( $string, ( $charsLength * 2 ), 64);
        $randomKeyArray = str_split( substr( $string, 0, $charsLength*2 ));
        $randomKeyDec = array();
        if(count($randomKeyArray) < 132) return false;
        for ($a = 0; $a < $charsLength*2; $a+=2){
            $numeric = array_search($randomKeyArray[$a],$charsArray) * $charsLength;
            $numeric += array_search($randomKeyArray[$a+1],$charsArray);
            $numeric -= ord($keyArray[floor($a/2)%count($keyArray)]);
            $randomKeyDec[] = chr($numeric);
        }
        for ($a = 0; $a < count($stringArray); $a+=2){
            $numeric = array_search($stringArray[$a],$charsArray) * $charsLength;
            $numeric += array_search($stringArray[$a+1],$charsArray);
            $numeric -= ord($randomKeyDec[floor($a/2)%$charsLength]);
            $returnString .= chr($numeric);
        }
        if(hash('sha256',$returnString) != $sha256){
            return false;
        }else{
            return $returnString;
        }
    }
    public static function getVideoZing($url){
        $arrReturn = [];
        $ch = curl_init($url);    
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);        
        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        $result = curl_exec($ch);    

        curl_close($ch);   

              
            preg_match_all('/<source src\=\"(.*?)\" type\=\"video\/mp4\" data\-res\=\"480\"\/\>/',$result,$arr_preg);            
            $arrReturn['f480'] = isset($arr_preg[1][1]) ? $arr_preg[1][1] : ""; 
            
            preg_match_all('/<source src\=\"(.*?)\" type\=\"video\/mp4\" data\-res\=\"360\"\/\>/',$result,$arr_preg);            
            $arrReturn['f360'] = isset($arr_preg[1][1]) ? $arr_preg[1][1] : "";

        
        return $arrReturn;    
    }
    public static function curl($url) {
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, $url);
         $head[] = "Connection: keep-alive";
         $head[] = "Keep-Alive: 300";
         $head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
         $head[] = "Accept-Language: en-us,en;q=0.5";
         curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36');
         curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
         curl_setopt($ch, CURLOPT_TIMEOUT, 60);
         curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
         curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
         curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
         $page = curl_exec($ch);
         curl_close($ch);
         return $page;
    }
    public static function getPhotoGoogle($link){
        $get = self::curl($link);
        $data = explode('url\u003d', $get);
        $url = explode('%3Dm', $data[1]);
        $decode = urldecode($url[0]);
        $count = count($data);
        $linkDownload = array();
        if($count > 4) {
            $v1080p = $decode.'=m37';
            $v720p = $decode.'=m22';
            $v360p = $decode.'=m18';
            $linkDownload['1080p'] = $v1080p;
            $linkDownload['720p'] = $v720p;
            $linkDownload['360p'] = $v360p;
        }
        if($count > 3) {
            $v720p = $decode.'=m22';
            $v360p = $decode.'=m18';
            $linkDownload['720p'] = $v720p;
            $linkDownload['360p'] = $v360p;
        }
        if($count > 2) {
            $v360p = $decode.'=m18';
            $linkDownload['360p'] = $v360p;
        }
        return $linkDownload;
    }

    public static function uploadPhoto($file, $base_folder = '', $date_dir=false){
    
        $return = [];

        $basePath = '';

        $basePath = $base_folder ? $basePath .= $base_folder ."/" : $basePath = $basePath;

        $basePath = $date_dir == true ? $basePath .= date('Y/m/d'). '/'  : $basePath = $basePath;        
        
        $desPath = config('icho.upload_path'). $basePath;

        //set name for file
        $fileName = $file->getClientOriginalName();
        
        $tmpArr = explode('.', $fileName);

        // Get image extension
        $imgExt = array_pop($tmpArr);

        // Get image name exclude extension
        $imgNameOrigin = preg_replace('/(.*)(_\d+x\d+)/', '$1', implode('.', $tmpArr));        

        $imgName = str_slug($imgNameOrigin, '-');
        
        $imgName = $imgName."-".time();

        $newFileName = "{$imgName}.{$imgExt}";
       // var_dump($file->move($desPath, $newFileName));die;
        if( $file->move($desPath, $newFileName) ){
            $imagePath = $basePath.$newFileName;
            $return['image_name'] = $newFileName;
            $return['image_path'] = $imagePath;
        }

        return $return;
    }

    public static function changeFileName($str) {
        $str = self::stripUnicode($str);
        $str = str_replace("?", "", $str);
        $str = str_replace("&", "", $str);
        $str = str_replace("'", "", $str);
        $str = str_replace("  ", " ", $str);
        $str = trim($str);
        $str = mb_convert_case($str, MB_CASE_LOWER, 'utf-8');
        $str = str_replace(" ", "-", $str);
        $str = str_replace("---", "-", $str);
        $str = str_replace("--", "-", $str);
        $str = str_replace('"', '', $str);
        $str = str_replace('"', "", $str);
        $str = str_replace(":", "", $str);
        $str = str_replace("(", "", $str);
        $str = str_replace(")", "", $str);
        $str = str_replace(",", "", $str);
        $str = str_replace(".", "", $str);
        $str = str_replace(".", "", $str);
        $str = str_replace(".", "", $str);
        $str = str_replace("%", "", $str);
        return $str;
    }

    public static function stripUnicode($str) {
        if (!$str)
            return false;
        $unicode = array(
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd' => 'đ',
            'D' => 'Đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i' => 'í|ì|ỉ|ĩ|ị',
            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
            '' => '?',
            '-' => '/'
        );
        foreach ($unicode as $khongdau => $codau) {
            $arr = explode("|", $codau);
            $str = str_replace($arr, $khongdau, $str);
        }
        return $str;
    }
}