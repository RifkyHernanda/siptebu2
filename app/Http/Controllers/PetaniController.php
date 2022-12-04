<?php

namespace App\Http\Controllers;

use App\Models\petani;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetaniController extends Controller
{
    public function create() {
        return view('petani.add');
        }
    public function store(Request $request) {
        $request->validate([
        'ID_PETANI' => 'required',
        'NAMA_PETANI' => 'required',
        'LOKASI_SAWAH' => 'required',
        'NO_REKENING' => 'required',
        'NO_HP' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya

        DB::insert('INSERT INTO petani(ID_PETANI, NAMA_PETANI, LOKASI_SAWAH, NO_REKENING, NO_HP, HAPUS) VALUES (:ID_PETANI, :NAMA_PETANI, :LOKASI_SAWAH, :NO_REKENING, :NO_HP, 0)',
        [
        'ID_PETANI' => $request->ID_PETANI,
        'NAMA_PETANI' => $request->NAMA_PETANI,
        'LOKASI_SAWAH' => $request->LOKASI_SAWAH,
        'NO_REKENING' => $request->NO_REKENING,
        'NO_HP' => $request->NO_HP,
        ]
        );
        return redirect()->route('petani.index')->with('success', 'Data Petani berhasil disimpan');
        }
        public function index(Request $request) {
            if ($request->has('search')) {
                $datas = DB::select('SELECT * from PETANI WHERE ID_PETANI like :search AND HAPUS <> 1 ' ,[
                    'search' => $request->search,
                ]);
            }else{
                $datas = DB::select('SELECT * FROM PETANI WHERE HAPUS <> 1');
            }
            
            return view('petani.index')->with('datas',$datas);
            }
    public function edit($id) {
        $data = DB::table('petani')->where('ID_PETANI', $id)->first();
        return view('petani.edit')->with('data', $data);
        }
    public function update($id, Request $request) {
        $request->validate([
        'ID_PETANI' => 'required',
        'NAMA_PETANI' => 'required',
        'LOKASI_SAWAH' => 'required',
        'NO_REKENING' => 'required',
        'NO_HP' => 'required',
            ]);
            // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
            DB::update('UPDATE PETANI SET ID_PETANI = :ID_PETANI, NAMA_PETANI = :NAMA_PETANI, LOKASI_SAWAH = :LOKASI_SAWAH, 
           NO_REKENING = :NO_REKENING, NO_HP = :NO_HP WHERE ID_PETANI = :id',
            [
            'id' => $id,
            'ID_PETANI' => $request->ID_PETANI,
            'NAMA_PETANI' => $request->NAMA_PETANI,
            'LOKASI_SAWAH' => $request->LOKASI_SAWAH,
            'NO_REKENING' => $request->NO_REKENING,
            'NO_HP' => $request->NO_HP,
            ]
            );
            return redirect()->route('petani.index')->with('success', 'Data petani berhasil diubah');
            }
        public function delete($id) {
            // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
            //DB::delete('DELETE FROM PETANI WHERE ID_PETANI = :ID_PETANI', ['ID_PETANI' => $id]);
            DB::update('UPDATE PETANI SET HAPUS = 1 WHERE ID_PETANI = :ID_PETANI', ['ID_PETANI' => $id]);
            return redirect()->route('petani.index')->with('success', 'Data Petani berhasil dihapus');
            }
            public function hardDelete($id) {
                // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
                DB::delete('DELETE FROM PETANI WHERE ID_PETANI = :ID_PETANI', ['ID_PETANI' => $id]);
                return redirect()->route('petani.indexDelete')->with('success', 'Data Petani berhasil dihapus permanen');
                }
                public function indexDelete(Request $request) {
                    if ($request->has('search')) {
                        $datasi = DB::select('SELECT * from PETANI WHERE ID_PETANI like :search AND HAPUS <> 0 ' ,[
                            'search' => $request->search,
                        ]);
                    }else{
                        $datasi = DB::select('SELECT * FROM PETANI WHERE HAPUS <> 0');
                    }
                    
                    return view('petani.indexDelete')->with('datasi',$datasi);
                    }
                    public function restore($id) {
                        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
                        //DB::delete('DELETE FROM HASIL_PANEN WHERE ID_PANEN = :ID_PANEN', ['ID_PANEN' => $id]);
                        DB::update('UPDATE PETANI SET HAPUS = 0 WHERE ID_PETANI = :ID_PETANI', ['ID_PETANI' => $id]);
                        return redirect()->route('petani.indexDelete')->with('success', 'Data Petani berhasil dikembalikan');
                        }
}
