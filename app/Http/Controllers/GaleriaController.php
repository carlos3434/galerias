<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\GaleriaRepository;
use Validator;
//use App\Http\Requests\GaleriaRequest;

class GaleriaController extends Controller {

    /**
     * The BlogRepository instance.
     *
     * @var App\Repositories\BlogRepository
     */
    protected $galeria;

    /**
     * Create a new HomeController instance.
     *
     * @param  App\Repositories\GaleriaRepository $galeria
     * @return void
    */
    public function __construct(GaleriaRepository $galeria)
    {
        $this->galeria = $galeria;
    }

    public function home()
    {
        return view('home');
    }
    private function saveImage($file)
    {
        $image_name = $file->getClientOriginalName(); 
        $image_extension = $file->getClientOriginalExtension();

        $image_new_name = md5(microtime(true));
        $file->move( base_path() . '/public/images/upload/', strtolower($image_new_name . '.' . $image_extension) );
        return strtolower($image_new_name . '.' . $image_extension);
    }
    
    public function postImage(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'fecha'       =>  'required|date_format:"m/d/Y',
            'imagen_1'    =>  'required|image|mimes:png,jpg,jpeg,gif,bmp',
            'imagen_2'    =>  'required|image|mimes:png,jpg,jpeg,gif,bmp'
        ]);

        if ($validator->fails()) {
            return redirect('/')
                        ->withErrors($validator)
                        ->withInput();
        }

        $nombre_imagen_1 = $this->saveImage( $request->file('imagen_1') );
        $nombre_imagen_2 = $this->saveImage( $request->file('imagen_2') );
        $fecha = \Carbon\Carbon::parse($request->fecha)->format('Y-m-d');

        $galeria = array(
            'imagen_1'  =>  $nombre_imagen_1,
            'imagen_2'  =>  $nombre_imagen_2,
            'fecha'     =>  $fecha
        );

        $this->galeria->nuevo( $galeria );

        return redirect('/')->with('message', 'registro guardado!');
    }

}