<?php

namespace app\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\KategoriResource;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index() 
    {
        $kategoris = Kategori::all(); 
        return view('kategoris.index', compact('kategoris')); 
    }

    /**
     * store
     *
     * @param mixed $request
     * @return void
     */

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama'          => 'required',
            'slug'        => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $kategori = Kategori::create([
            'nama'          => $request->nama,
            'slug'        => $request->slug,

        ]);

        return new KategoriResource(true, 'Data Kategori berhasil ditambah', $kategori);
    }
    /**
* show
*
* @param mixed $id
* @return void
*/
public function show($id)
{
//find post by ID
$kategori = Kategori::find($id);
//return single post as a resource
return new KategoriResource(true, 'Detail Data Kategori!', $kategori);
}
/**
 * update
 *
 * @param  mixed $request
 * @param  mixed $id
 * @return void
 */
public function update(Request $request, $id)
{
    // Define validation rules
    $validator = Validator::make($request->all(), [
        'nama'   => 'required',
        'slug' => 'required',
    ]);

    // Check if validation fails
    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    // Find post by ID
    $kategori = Kategori::find($id);

    // Check if post exists
    if (!$kategori) {
        return response()->json([
            'success' => false,
            'message' => 'Data Kategori tidak ditemukan',
        ], 404);
    }

    // Update post
    $kategori->update([
        'nama'   => $request->nama,
        'slug' => $request->slug,
    ]);

    // Return response
    return new KategoriResource(true, 'Data Kategori Berhasil Diubah!', $kategori);
}
/**
 * destroy
 *
 * @param  mixed $id
 * @return void
 */
public function destroy($id)
{
    // Find post by ID
    $kategori = Kategori::find($id);

    // Check if post exists
    if (!$kategori) {
        return response()->json([
            'success' => false,
            'message' => 'Data Post tidak ditemukan',
        ], 404);
    }

    // Delete post
    $kategori->delete();

    // Return response
    return new KategoriResource(true, 'Data Kategori Berhasil Dihapus!', null);
}
}