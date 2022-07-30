<?php 
namespace App\Traits;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


trait UploadHandler {

    protected $path = "website/course";


    protected function set_upload_path($path = null) {
        
        if ( ! $path ) {
            $this->path = env("UPLOAD_PATH","website/course");
        } else {
            $this->path = $path;
        }
    }

    protected function get_upload_path() {
        return $this->path;
    }

    public function upload(Request $request , $filename = "file") {
        $file_detail = [
            "original_filename" => $request->file($filename)->getClientOriginalName(),
            "file_type" => $request->file($filename)->getMimeType(),
            "path" => Storage::putFile($this->get_upload_path(),$request->file($filename)->path()),
            "filename" => $request->file($filename)->hashName()
        ];

        return $file_detail;
    }



}