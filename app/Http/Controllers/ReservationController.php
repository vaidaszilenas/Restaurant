<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::paginate(30);
        return view('reservation.reservation', [
          'reservations' => $reservations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('reservation.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'name'=>'required|min:5',
        'phone'=>'required|min:9',
        'people_amount'=>'required|numeric',
        'date'=>'required|date_format:Y-m-d|after:yesterday'
      ]);
      // var_dump($reservations);
      $post = [
        'users_id' => auth()->id(),
        'user'=> auth()->user()->name,
        'name'=>$request['name'],
        'phone'=>$request['phone'],
        'people_amount'=>$request['people_amount'],
        'date'=>$request['date']
      ];

      $reservations = Reservation::create($post);
      // $post = $request->except('_token');

      return redirect()->route('reservations-index');
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
      $reservations = Reservation::findOrFail($id);
      return view('reservation.edit', [
        'reservations'=>$reservations
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
      $validatedData = $request->validate([
        'name'=>'required|min:5',
        'phone'=>'required|min:9',
        'people_amount'=>'required|numeric',
        'date'=>'required|date_format:Y-m-d'
      ]);

      // var_dump($reservations);
      $post = [
        'users_id' => auth()->id(),
        'user'=> auth()->user()->name,
        'name'=>$request['name'],
        'phone'=>$request['phone'],
        'people_amount'=>$request['people_amount'],
        'date'=>$request['date']
      ];
      $reservations = Reservation::findOrFail($id);
      $reservations->update($post);

      return redirect()->route('reservations-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $reservations = Reservation::findOrFail($id);
      $reservations::destroy($id);
      return redirect()->to('reservations');
    }
}
