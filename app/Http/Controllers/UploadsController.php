<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Redirect;
use Session;
use App\Document;
use Illuminate\Support\Facades\Input;
use DB;
use File;
// use smalot\PdfParser\Parser;
class UploadsController extends Controller
{
  public function index(){
    return view('upload');
  }

  public function uploadfile(Request $request) {

    //dd($request->all());
/*$validate = Validator::make($request->all(), Document::valid());
    if($validate->fails()) {
        return back()
        ->withErrors($validate)
        ->withInput();

    }else {
    $add= new Document();
    $add = $request->all();
    $file = $request->file('doc');
    $add->name_doc=$file->getClientOriginalName();
      $file_location=public_path().'upload/dokumen'.$add->id;
      $add->save($file_location);

    

    Document::create($add);
 */
  /* $input = $request->all();
    if($file = $request->hasFile('doc')){
      $file = array('doc' => Input::file('doc'));
      $destinationPath='dokumen';
      $extension = Input::file('doc')->getClientOriginalExtension();
        $name = $file->getClientOriginalName();
        Input::file('doc')->move($destinationPath,$name);
        $dokumen->name_doc=$name;
       $dokumen->save();

    }else{
        echo "Please Upload document!";
    }

       /* Document::create($input);
        return Redirect::to('/');

       /* $fileTempName = $request->file('doc')->getPathname();
        $filename = $request->file('doc')->getClientOriginalName();
        $path = base_path().'/public/dokumen';
        $request->file('doc')->move($path, $filename);
        Document::create($filename);*/

        $tambah = new Document();
        $tambah->name_doc = $request['doc'];

        // Disini proses mendapatkan judul dan memindahkan letak gambar ke folder image
        $file       = $request->file('doc');
        $fileName   = $file->getClientOriginalName();
        $request->file('doc')->move("dokumen/", $fileName);

        $tambah->name_doc = $fileName;
        $tambah->save();
        
        // $document_location = public_path().'/dokumen/'.$tambah->id;

        // if(!File::exists($document_location)) {
        //     File::makeDirectory($document_location, $mode=0777, true, true);
        // }

        // $data->save();
        Session::flash('notice', 'Success');
        return Redirect::to('/');
    }

        //$parserFactory = new \Smalot\PdfParser\Parser(); 
       // $dir=public_path().'\dokumen';
       // $path = $dir.$fileName;

       // $parser= $parserFactory->parseFile($request);
  // $pdf = $parser->parseFile('Document1_foxitreader.pdf'); 
  // Retrieve all pages from the pdf file. 
       // $pages = $parser->getPages(); 
  // Loop over each page to extract text. 
        //foreach ($pages as $page) { 
         // echo $path . $page->getText();
       // }


       //return redirect()->to('/');
     //} 
     public function delete($id){

      $dokumen = Document::findOrFail($id);
      $file_location=public_path().'upload/dokumen'.$add->id;
      unlink($file_location);
      $dir=public_path().'upload/dokumen'.$add->id;
      File::deleteDirectory($dir);
      if ($dokumen->delete()) {
        Session::flash('notice', 'Document success delete');
        return Redirect::to('/');
      } else {
        Session::flash('error', 'Document fails delete');
        return Redirect::to('/');
      }

    }

    public function getupload(){
      return view('upload');
    }
  public function konvertpdf(){
  // include 'vendor/autoload.php';
  //require_once __DIR__ . '../../../vendor/autoload.php';
  $parserFactory = new \Smalot\PdfParser\Parser(); 
   $dir=public_path().'\dokumen';
  $path = $dir.'\Jurnal_Ilmiah_4.pdf';
  
  $parser= $parserFactory->parseFile($path);
  // $pdf = $parser->parseFile('Document1_foxitreader.pdf'); // Retrieve all pages from the pdf file. 
  $pages = $parser->getPages(); // Loop over each page to extract text. 
  foreach ($pages as $page) { 
     echo $path . $page->getText();
  }
}
}