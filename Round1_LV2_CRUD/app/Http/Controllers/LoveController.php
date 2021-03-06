<?php
namespace App\Http\Controllers;

use App\Love;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Loves = Love::latest()->paginate(5);

        return compact('Loves')
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
            'Lpassword' => 'required',

        ]);

        Love::create($request->all());

        return '用戶註冊成功。。。';
    }





    /**
     * Display the specified resource.
     *
     * @param \App\Love $love
     * @return \Illuminate\Http\Response
     */
    public function show(Love $lid)
    {
//        $request->validate([
//
//            'Lemail' => 'required',
//            'Lpassword' => 'required',
//
//        ]);
//
//        return [
//            ''
        //  Logger->info(request()->input());
////        ]
        return $lid;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Love $love
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Love $lid)
    {

//        return $love;
//        dd($lid);s
        $request->validate([
            'Lname' => 'required',
            'Lemail' => 'required|unique:users,email,' . $lid->Lid,
            'Lpassword' => 'required',
        ]);
//        $lid->update(
//            [
//                'Lname' => $request->Lname
//            ]
//        );
        $lid->update($request->all());

        return 'Love updated successfully';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Love $love
     * @return \Illuminate\Http\Response
     */
    public function destroy(Love $lid)
    {
        $lid->delete();

        return 'love deleted successfully';
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
