<?php

use Illuminate\Support\Facades\Config;
use Intervention\Image\Facades\Image;


function unique_file($fileName)
{
    return time() . uniqid().'-'.$fileName;
}

function Sendmailwithaction($message){
    
              $subscriber=App\Subscriber::all();
        if (isset($subscriber) && count($subscriber) > 0) {
        	   foreach ($subscriber as $onesubscriber) {
    \Mail::to($onesubscriber->email)->send(new \App\Mail\Sendmail($message));
        	   }
        }
}
function success()
{
    return 'success';
}


function error()
{
    return 'error';
}


function failed()
{
    return 'failed';
}


function res_msg($request,$status,$key)
{
    $msg['status'] = $status;
    $msg['msg'] = Config::get('response.'.$key.'.'.$request->header('lang'));

    return $msg;
}

function imagepath($path,$image){
  return url($path,$image);
}

function CpanelCss_path($filename = '')
{
    $path="resources/assets/cpanel/css/".$filename;
    return url($path);
}
function CpanelJs_path($filename = '')
{
    $path="resources/assets/cpanel/js/".$filename;
    return url($path);
}
function CpanelImages_path($filename = '')
{
    $path="resources/assets/cpanel/img/".$filename;
    return url($path);
}
function SiteCss_path($filename = '')
{
    $path="resources/assets/site/css/".$filename;
    return url($path);
}
function SiteJs_path($filename = '')
{
    $path="resources/assets/site/js/".$filename;
    return url($path);
}
function SiteImages_path($filename = '')
{
    $path="resources/assets/site/img/".$filename;
    return url($path);
}
function uploadimageapi($filetoupload,$pathtoupload){
    $image = base64_decode($filetoupload);
    $path = $pathtoupload;
    $file=$image;
    $img=Image::make($image);
    //////////////////////
    $extension ='jpg';
    $name = rand().substr(sha1(date('Hms')),rand(1,5),10);
    $imgname = date('y-m-d') . $name . "." . $extension;
    $completpath=$path."/".$imgname;
    /////////////////////////
    $img->save($completpath ,50);
    return $imgname;
}
function uploadimage($filetoupload,$pathtoupload){
    $path = $pathtoupload;
    $file=$filetoupload;
    $img=Image::make($filetoupload);
    //////////////////////
    $extension = $file->getClientOriginalExtension();
    $name = sha1($file->getClientOriginalName());
    $imgname = date('y-m-d-H-i-s') . $name . "." . $extension;
    $completpath=$path."/".$imgname;
    /////////////////////////
    $img->save($completpath ,50);
    return $imgname;
}
function autoinsert($model,$request,$arrayofindexes,$pathtoupload,$flag,$uploadimageflag){

    // unset($request['_token']);
    $insertmodalOB=new $model();
    foreach ($arrayofindexes as $value) {
        if(isset($request->$value)){
            $insertmodalOB->$value=$request->$value;
        }
    }
    if(isset($request->image)){
        if($uploadimageflag == "api"){
            $insertmodalOB->image=uploadimageapi($request->image,$pathtoupload);
        }elseif($uploadimageflag == "cpanel"){
            $insertmodalOB->image=uploadimage($request->image,$pathtoupload);
        }
    }

    if($flag == 1){
        $insertmodalOB->save();
        return $insertmodalOB;

    }
    return $insertmodalOB;
}
function autoupdate($model,$request,$arrayofindexes,$pathtoupload,$flag,$id,$uploadimageflag){
    $updatemodalOB=$model::find($id);
    foreach ($arrayofindexes as $value) {
        if(isset($request->$value)){
            $updatemodalOB->$value=$request->$value;
        }
    }

    if(isset($request->image)){
        deletefile($pathtoupload."/".$updatemodalOB->image);
        if($uploadimageflag == "api"){
            $updatemodalOB->image=uploadimageapi($request->image,$pathtoupload);
        }elseif($uploadimageflag == "cpanel"){
            $updatemodalOB->image=uploadimage($request->image,$pathtoupload);
        }
    }

    if($flag == 1){
        $updatemodalOB->save();
        return $updatemodalOB;

    }
    return $updatemodalOB;
}


function filterbylatlng($mylat,$mylng,$radius,$model,$flag,$conditionarray){

    $haversine = "(6371 * acos(cos(radians($mylat))
                       * cos(radians($model.lat))
                       * cos(radians($model.long)
                       - radians($mylng))
                       + sin(radians($mylat))
                       * sin(radians($model.lat))))";
    $datainradiusrange= DB::table($model)->select('*')
        ->selectRaw("{$haversine} AS distance")
        ->whereRaw("{$haversine} < ?", [$radius])->get() ;


    return $datainradiusrange;

    // $mylat="29.959984112596658";
    // $mylng="31.25217035884168";
    // $radius = 1;

}
function localization($languagekey){
    Session::put('sitelanguage', $languagekey);
}
function changelocale(){
    if(Session::get('sitelanguage')){
        App::setLocale(Session::get('sitelanguage'));
    }
    else{
        App::setLocale('en');
    }
}






//
//function autodelete($model,$imagepath,$id,$flag){
//    $deletemodalOB=$model::find($id);
//    if(isset($deletemodalOB->image)){
//        $path=$imagepath.'/'.$deletemodalOB->image;
//        deletefile($path);
//    }
//    if($flag == 1){
//        $deletemodalOB->delete();
//    }else{
//        return $deletemodalOB;
//    }
//}

//

//
function deletefile($path){
    $completpath=$path;
    \File::delete($completpath);
}
//
//function calculaterate($attribute_id,$attribute_type){
//    $ratesum=0;
//    $rateave=0;
//    $rate=App\Rate::where('attribute_id',$attribute_id)->where('attribute_type',$attribute_type)->get();
//
//    if(count($rate)>0){
//        foreach ($rate as $key => $value) {
//            $ratesum=$ratesum+$value->rate_value;
//        }
//        $rateave=$ratesum/count($rate);
//    }
//    return $rateave;
//}
//

//
//
//function sendnotification($url,$auth,$playerid,$appid,$notificationcontent,$notificationtitle){
//
//    $content = array("en" => $notificationcontent);
//    $headings = array("en" => $notificationtitle);
//    $fields = array('app_id' => $appid,'include_player_ids' => array($playerid),'contents' => $content,'headings' => $headings);
//    $fields = json_encode($fields);
//    return   $response=Curl($url,$auth,$fields);
//    $return["allresponses"] = $response;
//    $return = json_encode( $return);
//}
//function Curl($url,$auth,$fields){
//    $ch = curl_init();
//    curl_setopt($ch, CURLOPT_URL, $url);
//    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8','Authorization: $auth'));
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//    curl_setopt($ch, CURLOPT_HEADER, FALSE);
//    curl_setopt($ch, CURLOPT_POST, TRUE);
//    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
//    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
//
//    return $response = curl_exec($ch);
//    curl_close($ch);
//
//}
//function checkmobilenumber($mobilenumber){
//    $checkmobilenumberasuser=App\User::where('mobilenumber',$mobilenumber)->get();
//    if(count($checkmobilenumberasuser) > 0){
//        return "false";
//    }
//}
//function checkmobilenumberupdate($mobilenumber,$id){
//    $checkmobilenumberasuser=App\User::where('mobilenumber',$mobilenumber)->where('id','!=',$id)->get();
//    if(count($checkmobilenumberasuser) > 0){
//        return "false";
//    }
//}
//function checkemail($email){
//    $checkemailasuser=App\User::where('email',$email)->get();
//    if(count($checkemailasuser) > 0){
//        return "false";
//    }
//}
//
?>
