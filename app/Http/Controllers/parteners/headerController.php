<?php

namespace App\Http\Controllers\parteners;

use App\Http\Controllers\Controller;
use App\Http\Requests\headers\createrequist;
use App\Http\Requests\headers\updaterequist;
use App\Models\header;
use Illuminate\Http\Request;
use App\Http\Traits\ImagesTrait;
use App\Http\Traits\Api_designtrait;

class headerController extends Controller
{
    use ImagesTrait;
    use Api_designtrait;
    // public function index(){
    //     $index= header::all();
    //     return $this->api_design(200,"my partners",$index,null);

    // }
    // public function create(createrequist $createrequist ){
    //     $fileName= time() . '_images.jpg';
    //     $this->uploadimg($createrequist->img_path, $fileName, 'images');

    //     $headers= header::create([
    //         "heading"=> $createrequist->heading,
    //         "img_path"=> $fileName,
    //     ]);
    //     return $this->api_design(200,"task create succsefully",$headers,null);
    // }

    public function update( updaterequist $updaterequist ){
        $update=header::where('id',$updaterequist->id)->first();
        $fileName= time() . '_images.jpg';
        $this->uploadimg($updaterequist->img_path, $fileName, 'images' ,$update->images);
        $update->update([
            "heading"=> $updaterequist->heading,
            "img_path"=> $fileName,
        ]);
        return $this->api_design(200,"the user update succesfully",$update,null);
    
    }

    // public function delete(request $request){
    //     $headers= header::where('id',$request->id)->first();
    //     $path= "\images\images\\" ;
    //     unlink(public_path($path . $headers->img_path));
    //      $headers->delete();
    //      return $this->api_design(200,"task delete succsefully",$headers,null);
    // }
}
