<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return dd(Auth::user());
        $reservation = Reservation::where('user_id', Auth::user()->id)->orderBy('rsvp_date', 'desc')->get();
        return view('reservation.index', ["reservationData" => $reservation]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $getDetailRes = Http::get('https://restaurant-api.dicoding.dev/detail/' . $id);

        return view(
            'reservation.create',
            [
                "data" => $getDetailRes->json(),
                "user_id" => Auth::user()->id,
                "user_name" => Auth::user()->name
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "chair" => "required",
            "rsvp_date" => "required",
            "rsvp_time" => "required",
        ]);

        $reservation = new Reservation;

        $reservation->user_id = Auth::user()->id;

        $reservation->restaurant_name = $request->input('restaurant_name');

        $reservation->restaurant_picture_id = $request->input('restaurant_pic_id');

        $reservation->restaurant_address = $request->input('restaurant_address');

        $reservation->reserved_chair = $request->input('chair');

        $reservation->rsvp_date = $request->input('rsvp_date');

        $reservation->rsvp_time = $request->input('rsvp_time');

        $reservation->save();

        $request->session()->flash('success_rsvp', 'Anda Telah RSVP di: ' . $reservation->restaurant_name);
        // $request->session()->flash('status', 'Task was successful!');

        return redirect()->route('home');

        // return dd($request->all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservationDetail = Reservation::find($id);

        return view('reservation.edit', [
            "data" => $reservationDetail,
            "user_name" => Auth::user()->name
        ]);
        // return "edit page";
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
        $request->validate([
            "chair" => "required",
            "rsvp_date" => "required",
            "rsvp_time" => "required",
        ]);

        $reservation = Reservation::find($id);

        $reservation->reserved_chair = $request->input('chair');

        $reservation->rsvp_date = $request->input('rsvp_date');

        $reservation->rsvp_time = $request->input('rsvp_time');

        $reservation->save();

        $request->session()->flash('success_rsvp', 'Anda Telah mengupdate RSVP di: ' . $reservation->restaurant_name);

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $reservation = Reservation::find($id);

        $reservation->delete();

        $request->session()->flash('success_rsvp', 'Anda Telah menghapus RSVP di: ' . $reservation->restaurant_name);

        return redirect()->route('home');

        return dd($id);
    }
}
