<?php
// 檔案位置

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Love', function (Blueprint $table) {
            $table->bigIncrements('Lid');
            $table->string('Lname');
            $table->string('Lemail')->unique();
            $table->timestamp('Lemail_verified_at')->nullable();
            $table->string('Lpassword');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Love');
    }
}

?>




<?php

// 檔案位置  app/Http/Controllers/LoveController.php


namespace App\Http\Controllers;

use App\Love;
use Illuminate\Http\Request;

class LoveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Love = Love::latest()->paginate(5);

        return compact('Love')
            ->with('i', (request()->input('page', 1) - 1) * 5);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Lname' => 'required',
            'Lemail' => 'required',
            'Lemail_verified_at' => 'required',
            'Lpassword' => 'required',

        ]);

        Love::create($request->all());

        return redirect()->route('Love.index')
            ->with('success', 'Love created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Love $love
     * @return \Illuminate\Http\Response
     */
    public function show(Love $love)
    {
        return compact('Love');

    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Love $love
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Love $love)
    {
        $request->validate([
            'Lname' => 'required',
            'Lemail' => 'required',
            'Lemail_verified_at' => 'required',
            'Lpassword' => 'required',
        ]);

        $love->update($request->all());

        return redirect()->route('Love.index')
            ->with('success', 'Love updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Love $love
     * @return \Illuminate\Http\Response
     */
    public function destroy(Love $love)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param \App\Love $love
     * @return \Illuminate\Http\Response
     */
    public function edit(Love $love)
    {
        //
    }


}

