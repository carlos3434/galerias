<?php
namespace App\Repositories;
use App\Models\Galeria;

class GaleriaRepository extends BaseRepository {
    
    /**
     * Create a new ImageRepository instance.
     *
     * @param  App\Models\Galeria $galeria
     * @return void
     */
    public function __construct( Galeria $galeria) 
    {
        $this->model = $galeria;
    }

    /**
     * Create a new image.
     *
     * @param  App\Models\Galeria $galeria
     * @param  array  $inputs
     * @return App\Models\Galeria
     */
    public function nuevo( $galeria )
    {
        return $this->model::create($galeria);
    }

}