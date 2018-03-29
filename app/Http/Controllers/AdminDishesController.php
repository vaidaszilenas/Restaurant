<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class AdminDishesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $dishes = Dish::paginate(6);
        // dd($dishes);
        return view('admin.dishes-admin', [
          'dishes' => $dishes
        ]);

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dishes-create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


      $this->validateData($request);

      $session = $request->session();
      $status = $session->flash('status', 'You created a new dish');
      // $validatedData = $request->validate([
      //   'file_name'=>'required',
      //   'title'=>'required|min:2',
      //   'description'=>'required|min:10',
      //   'price'=>'required|numeric'
      // ]);

        $path = $request->file('file_name')->storePublicly('public/photos');
        $post = [
          'file_name'=> $path,
          'title'=>$request['title'],
          'description'=>$request['description'],
          'price'=>$request['price']
        ];
        Dish::create($post);

        $post = $request->except('_token');


        return redirect()->route('dishes-admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $dishes = Dish::findOrFail($id);
      return view('admin.dishes-edit', [
        'dishes'=>$dishes
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      // $this->validateData($request);

      // $validatedData = $request->validate([
      //   'file_name'=>'required',
      //   'title'=>'required|min:2',
      //   'description'=>'required|min:10',
      //   'price'=>'required|numeric'
      // ]);




      $post = [
        'title'=>$request['title'],
        'description'=>$request['description'],
        'price'=>$request['price']
      ];
        $dish = Dish::findOrFail($id);
      if ($request->hasFile('file_name')){
        $path = $request->file('file_name')->storePublicly('public/photos');
        $post['file_name'] = $path;
      }


      $dish->update($post);
      return redirect()->to('dishes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $dish = Dish::findOrFail($id);
      $dish::destroy($id);
      Storage::disk('local')->delete($dish['file_name']);
      return redirect()->to('dishes');
    }

    private function validateData(Request $request)
    {
      $validatedData = $request->validate([
        'file_name'=>'required',
        'title'=>'required|min:2',
        'description'=>'required|min:10',
        'price'=>'required|numeric'
      ]);
    }

}
