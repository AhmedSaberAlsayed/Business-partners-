<?php

namespace App\Http\Controllers\parteners;

use App\Http\Controllers\Controller;
use App\Http\Requests\partners\createrequist;
use App\Http\Requests\partners\updaterequist;
use App\Http\Traits\Api_designtrait;
use App\Http\Traits\ImagesTrait;
use App\Models\header;
use App\Models\partners;
use Illuminate\Http\Request;

class partnersController extends Controller
{
    use ImagesTrait;
    use Api_designtrait;
    public function index(){
        $index['header']= header::all();
        $index['partenrs']= partners::all();
        return $this->api_design(200,"my data",$index,null);

    }
    public function create( createrequist $createrequist){
        $fileName= time() . '_images.jpg';
        $this->uploadimg($createrequist->img_path, $fileName, 'images');
        $partners= partners::create([
            "img_path"=> $fileName,
            "describtion"=> $createrequist->describtion,
            "visit_our_website"=>  $createrequist->visit_our_website,
            "view_company_profile"=>  $createrequist->view_company_profile,
            "facebook_link"=>  $createrequist->facebook_link,
            "whatsApp_link"=> $createrequist->whatsApp_link,
            "viber_link"=>  $createrequist->viber_link,
            "instagram_link"=>  $createrequist->instagram_link,
        ]);
        return $this->api_design(200,"task create succsefully",$partners,null);
    
    }

    public function update( updaterequist $updaterequist ){
        $update=partners::where('id',$updaterequist->id)->first();
        $fileName= time() . '_images.jpg';
        $this->uploadimg($updaterequist->img_path, $fileName, 'images' ,$update->images);
        $update->update([
            "img_path"=> $fileName,
            "describtion"=> $updaterequist->describtion,
            "visit_our_website"=>  $updaterequist->visit_our_website,
            "view_company_profile"=>  $updaterequist->view_company_profile,
            "facebook_link"=>  $updaterequist->facebook_link,
            "whatsApp_link"=> $updaterequist->whatsApp_link,
            "viber_link"=>  $updaterequist->viber_link,
            "instagram_link"=>  $updaterequist->instagram_link,
        ]);
        return $this->api_design(200,"the user update succesfully",$update,null);
    }

    public function delete($id){
        $partners= partners::find($id);
        $path= "\images\images\\" ;
        unlink(public_path($path . $partners->img_path));
        $partners->delete();
        return $this->api_design(200,"partner delete succsefully",$partners,null);
    }
}
