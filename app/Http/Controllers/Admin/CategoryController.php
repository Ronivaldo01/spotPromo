<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateCategoryFormRequest;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories')
                            ->orderBy('id', 'desc')
                            ->paginate();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateCategoryFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCategoryFormRequest $request)
    {
        DB::table('categories')->insert([
            'categorie'         => $request->categorie,
            'status'           => $request->status,
            'description'   => $request->description,
        ]);

        return redirect()
                    ->route('categories.index')
                    ->withSuccess('Cadastro realizado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();

        if (!$category)
            return redirect()->back();

        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        
        if (!$category)
            return redirect()->back();

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateCategoryFormRequest  $request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCategoryFormRequest $request, $id)
    {
        DB::table('categories')
                ->where('id', $id)
                ->update([
                    'categorie'         => $request->categorie,
                    'status'           => $request->status,
                    'description'   => $request->description,
                ]);
                
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('categories')->where('id', $id)->delete();

        return redirect()->route('categories.index');
    }

    public function search(Request $request)
    {
        $data = $request->except('_token');

        $categories = DB::table('categories')
                        ->where(function ($query) use ($data) {
                            if (isset($data['categorie'])) {
                                $query->where('categorie', $data['categorie']);
                            }

                            if (isset($data['status'])) {
                                $query->orWhere('status', $data['status']);
                            }

                            if (isset($data['description'])) {
                                $desc = $data['description'];
                                $query->where('description', 'LIKE', "%{$desc}%");
                            }
                        })
                        ->orderBy('id', 'desc')
                        ->paginate();
        
        return view('admin.categories.index', compact('categories', 'data'));
    }
}
