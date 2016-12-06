<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ProductImagesController extends Controller
{
    public function storeProductImages(Request $request)
    {
        $product = Product::find($request->product);
        $this->handleImageUpload($request, $product);
        return redirect()->back();
    }

    public function destroyImage($id)
    {
        $imagen = ProductImage::find($id);
        $location = public_path('/img/products/' . $imagen->image_name);
        //no me copa que este hardcodeada /img/products. Mejorar
        File::delete($location);
        $imagen->delete();
        return redirect()->back();
    }

    private function handleImageUpload(Request $request, Product $product)
    {
        //asi como esta, hace un insert into en la db por
        // cada vuelta del foreach
        //Mejorar: hacer que la funcion devuelva un array
        //asi cuando termina, hacer un solo update en la db
        //onda, cerrar la function con un return $array
        $images = $request->images;
        if (!empty($images)) {
            foreach ($images as $image) {
                $imagen = new ProductImage;
                $image_name = $product->name . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                //ojo aca arriba en el image_name con el tema de acentos y espacios del nombre del producto
                //Mejorar: sanitizar string
                $imagen->image_name = $image_name;
                $imagen->product_id = $product->id;
                $imagen->save();
                $location = public_path('/img/products/' . $image_name);
//                Image::make($image)->resize(300, 300)->save($location);
                Image::make($image)->widen(300)->save($location);
                $product->images()->save($imagen);
            }
        }
    }
}