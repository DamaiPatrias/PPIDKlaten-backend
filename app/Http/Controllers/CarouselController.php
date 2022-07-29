<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('beranda/carousel/carousel', [
            'title' => 'Caraousel',
            'active' => 'carousel',
            'data_carousel' => Carousel::orderBy('id')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateCarousel = $request->validate([
            'nama_gambar' => 'required',
            // 'link_gambar' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|file|max:2048',
        ]);

        $hari = date('Y-m-d');
        $namaFile = $hari . '_' . $request->nama_gambar . '.' . $request->file('gambar')->getClientOriginalExtension();
        $namaDirektori = 'carousel';

        $validateCarousel['link_gambar'] = url('/') . '/storage' . '/' . $namaDirektori . '/' . $namaFile;

        $validateCarousel['nama_file_gambar'] = $namaFile;

        $validateCarousel['gambar'] = $request->file('gambar')->storeAs($namaDirektori, $namaFile);

        Carousel::create($validateCarousel);

        return redirect('/carousel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function show(Carousel $carousel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function edit(Carousel $carousel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carousel $carousel)
    {
        $validateCarousel = $request->validate([
            'nama_gambar' => 'required',
            // 'link_gambar' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|file|max:2048',
        ]);

        $hari = date('Y-m-d');
        $namaFile = $hari . '_' . $request->nama_gambar . '.' . $request->file('gambar')->getClientOriginalExtension();
        $namaDirektori = 'carousel';
        $namaFileLama = $request->nama_gambar_lama;

        Storage::delete($namaDirektori . '/' . $namaFileLama);

        $validateCarousel['link_gambar'] = url('/') . '/storage' . '/' . $namaDirektori . '/' . $namaFile;

        $validateCarousel['nama_file_gambar'] = $namaFile;

        $validateCarousel['gambar'] = $request->file('gambar')->storeAs($namaDirektori, $namaFile);

        Carousel::where('id', $carousel->id)
            ->update([
                'nama_gambar' => $request->nama_gambar,
                'link_gambar' =>  $validateCarousel['link_gambar'],
                'nama_file_gambar' => $validateCarousel['nama_file_gambar']
            ]);

        return redirect('/carousel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carousel $carousel)
    {
        $namaDirektori = 'carousel';

        Storage::delete($namaDirektori . '/' . $carousel->nama_file_gambar);
        Carousel::destroy($carousel->id);

        return redirect('/carousel');
    }

    public function getApiCarousel()
    {
        return Carousel::get('link_gambar');
    }
}
