<?php

namespace App\Services;

use App\Models\Movies;
use App\Services\DataServices;
use Exception;

class MovieService
{
    public function __construct(private ImageService $imageService, private DataServices $dataServices)
    {
    }

    public function create($request)
    {
        $result = $this->imageService->downloadImage($request, 'assets/front/images/', 'poster', 'notfound.png');
        $result1 = $this->imageService->downloadImage($request, 'assets/front/images/', 'banner', 'notfound.png');
        $data = $request->all();
        $data['poster'] = $result;
        $data['banner'] = $result1;
        $portfolio = new Movies();
        $this->dataServices->save($portfolio, $data, 'create');
    }


    public function update($request, $id)
    {

        try {
            $portfolio = Movies::findOrFail($id);
            $result = $this->imageService->updateImage($request, 'assets/front/images/', 'portfolio_item_img', $portfolio->portfolio_item_img);
            $result1 = $this->imageService->updateImage($request, 'assets/front/images/', 'banner_img', $portfolio->banner_img);
            $data = $request->all();
            $data['portfolio_item_img'] = $result;
            $data['banner_img'] = $result1;






            unset($data['portfolio__item__category_id']);
            $this->dataServices->save($portfolio, $data, 'update', 'services', $request->portfolio__item__category_id);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }



    public function delete($id)
    {
        try {
            $portfolio = Movies::findOrFail($id);
      
            $this->imageService->deleteImage('assets/front/images/', $portfolio->banner);
            $this->imageService->deleteImage('assets/front/images/', $portfolio->poster);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
