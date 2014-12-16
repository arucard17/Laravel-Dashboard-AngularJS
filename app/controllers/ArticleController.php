<?php

class ArticleController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Artículo Controller
    |--------------------------------------------------------------------------
    |
    */

    public function all()
    {
        $articles = Article::all();

        return Response::json($articles);
    }

    public function find($id)
    {
        $article = Article::find($id);

        return Response::json($article);
    }

    public function create()
    {
        $inputs = Input::all();

        $validation = Validator::make( $inputs, Article::$rules);

        if($validation->fails()){
            return Response::json(array( 'success' => false, 'errors' => $validation->messages()->toArray() ), 500);
        }else{

            $article = new Article();

            $article->title = $inputs['title'];
            $article->url = $inputs['url'];
            $article->text = $inputs['text'];

            $article->save();

            if($article)
                return Response::json(array( 'success' => true, 'article' => $article ));
            else
                return Response::json(array( 'success' => true, 'errors' => 'No se pudo crear el artículo.' ), 500);

        }
    }


    public function update($id)
    {
        $inputs = Input::all();

        $article = Article::find($id);

        if($article){

            $validation = Validator::make( $inputs, Article::$rules);

            if($validation->fails()){
                return Response::json(array( 'success' => false, 'errors' => $validation->messages()->toArray() ), 500);
            }else{
                try {

                    $article->title = $inputs['title'];
                    $article->url = $inputs['url'];
                    $article->text = $inputs['text'];

                    $article->save();

                } catch (Exception $e) {
                    return Response::json(array( 'success' => false, 'errors' => 'No se pudo actualizar la información del artículo.' ));
                }

            }
        }else{
            return Response::json(array( 'success' => false, 'errors' => 'No se encontró el artículo.' ), 500);
        }

    }


    public function delete($id)
    {
        $article = Article::find($id);

        if($article){
            $article->delete();
            return Response::json(array( 'success' => true ));
        }else{
            return Response::json(array( 'success' => false, 'errors' => 'No se encontró la artículo a eliminar' ));
        }
    }


}
