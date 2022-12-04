<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Panen;
class PanenController extends Controller
{
    public function create() {
        return view('panen.add');
        }
    public function store(Request $request) {
        $request->validate([
        'ID_PANEN' => 'required',
        'JUMLAH_PANEN' => 'required',
        'STATUS' => 'required',
        'ID_PETANI' => 'required',
        'ID_SUPIR' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya

        DB::insert('INSERT INTO hasil_panen(ID_PANEN, JUMLAH_PANEN, STATUS, HASIL_TERPROSES, ID_PETANI, ID_SUPIR, HAPUS) VALUES (:ID_PANEN, :JUMLAH_PANEN, :STATUS, :HASIL_TERPROSES, :ID_PETANI, :ID_SUPIR, 0)',
        [
        'ID_PANEN' => $request->ID_PANEN,
        'JUMLAH_PANEN' => $request->JUMLAH_PANEN,
        'STATUS' => $request->STATUS,
        'HASIL_TERPROSES' => $request->HASIL_TERPROSES,
        'ID_PETANI' => $request->ID_PETANI,
        'ID_SUPIR' => $request->ID_SUPIR,
        ]
        );
        DB::update('UPDATE SUPIR SET STATUS = "MEMBAWA HASIL PANEN" WHERE ID_SUPIR = :ID_SUPIR',
            [
                'ID_SUPIR' => $request->ID_SUPIR,]);
            
        return redirect()->route('panen.index')->with('success', 'Data Panen berhasil disimpan');
        }
    public function index(Request $request) {
        if ($request->has('search')) {
            $datas = DB::select('SELECT * from detailpanen WHERE ID_PANEN like :search AND HAPUS <> 1 ' ,[
                'search' => $request->search,
            ]);
        }else{
            $datas = DB::select('SELECT * FROM detailpanen WHERE HAPUS <> 1');
        }
        
       
        return view('panen.index')->with('datas',$datas);
        }
    public function edit($id) {
        $data = DB::table('hasil_panen')->where('ID_PANEN', $id)->first();
        return view('panen.edit')->with('data', $data);
        }
    public function update($id, Request $request) {
        $request->validate([
            'ID_PANEN' => 'required',
            'JUMLAH_PANEN' => 'required',
            'STATUS' => 'required',
            'ID_PETANI' => 'required',
            'ID_SUPIR' => 'required',
            ]);
            // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
            DB::update('UPDATE HASIL_PANEN SET ID_PANEN = :ID_PANEN, JUMLAH_PANEN = :JUMLAH_PANEN, STATUS = :STATUS, 
           HASIL_TERPROSES = :HASIL_TERPROSES, ID_PETANI = :ID_PETANI, ID_SUPIR = :ID_SUPIR, HAPUS = 0, WHERE ID_PANEN = :id',
            [
                'id' => $id,
                'ID_PANEN' => $request->ID_PANEN,
                'JUMLAH_PANEN' => $request->JUMLAH_PANEN,
                'STATUS' => $request->STATUS,
                'HASIL_TERPROSES' => $request->HASIL_TERPROSES,
                'ID_PETANI' => $request->ID_PETANI,
                'ID_SUPIR' => $request->ID_SUPIR,
            ]
            );
            return redirect()->route('panen.index')->with('success', 'Data Panen berhasil diubah');
            }
        public function delete($id) {
            // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
            //DB::delete('DELETE FROM HASIL_PANEN WHERE ID_PANEN = :ID_PANEN', ['ID_PANEN' => $id]);
            DB::update('UPDATE HASIL_PANEN SET HAPUS = 1 WHERE ID_PANEN = :ID_PANEN', ['ID_PANEN' => $id]);
            return redirect()->route('panen.indexDelete')->with('success', 'Data Panen berhasil dihapus');
            }
        public function hardDelete($id) {
                // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
                DB::delete('DELETE FROM HASIL_PANEN WHERE ID_PANEN = :ID_PANEN', ['ID_PANEN' => $id]);
                //DB::update('UPDATE HASIL_PANEN SET HAPUS = 1 WHERE ID_PANEN = :ID_PANEN', ['ID_PANEN' => $id]);
                return redirect()->route('panen.index')->with('success', 'Data Panen berhasil dihapus');
                }
                public function indexDelete(Request $request) {
                    if ($request->has('search')) {
                        $datasi = DB::select('SELECT * from detailpanen WHERE ID_PANEN like :search AND HAPUS <> 0 ' ,[
                            'search' => $request->search,
                        ]);
                    }else{
                        $datasi = DB::select('SELECT * FROM detailpanen WHERE HAPUS <> 0');
                    }
                    
                    return view('panen.indexDelete')->with('datasi',$datasi);
                    }
                    public function restore($id) {
                        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
                        //DB::delete('DELETE FROM HASIL_PANEN WHERE ID_PANEN = :ID_PANEN', ['ID_PANEN' => $id]);
                        DB::update('UPDATE HASIL_PANEN SET HAPUS = 0 WHERE ID_PANEN = :ID_PANEN', ['ID_PANEN' => $id]);
                        return redirect()->route('panen.indexDelete')->with('success', 'Data Panen berhasil dikembalikan');
                        }
                    
}
