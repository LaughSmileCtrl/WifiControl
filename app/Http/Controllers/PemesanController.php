<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesan;
use App\Http\Requests\StorePemesanPost;

class PemesanController extends Controller
{
    private $idPemesan;

    public function storeName(StorePemesanPost $request)
    {
        $pemesan = new Pemesan();
        $pemesan->nama_pemesan = $request->nama_pemesan;
        $pemesan->save();

        $this->idPemesan = Pemesan::where('nama_pemesan', $request->nama_pemesan);

    }

    public function storeMakanan(Request $request)
    {

    }

    
    

    
}
