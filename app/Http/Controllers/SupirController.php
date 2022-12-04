<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SupirController extends Controller
{
    public function create() {
        return view('supir.add');
        }
    public function store(Request $request) {
        $request->validate([
        'ID_SUPIR' => 'required',
        'NAMA_SUPIR' => 'required',
        'NOPOL_KENDARAAN' => 'required',
        'NO_HP' => 'required',
        'JENIS_KENDARAAN' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya

        DB::insert('INSERT INTO SUPIR(ID_SUPIR, NAMA_SUPIR, NOPOL_KENDARAAN, NO_HP, JENIS_KENDARAAN, STATUS, HAPUS) VALUES (:ID_SUPIR, :NAMA_SUPIR, :NOPOL_KENDARAAN, :NO_HP, :JENIS_KENDARAAN, :STATUS, 0)',
        [
        'ID_SUPIR' => $request->ID_SUPIR,
        'NAMA_SUPIR' => $request->NAMA_SUPIR,
        'NOPOL_KENDARAAN' => $request->NOPOL_KENDARAAN,
        'NO_HP' => $request->NO_HP,
        'JENIS_KENDARAAN' => $request->JENIS_KENDARAAN,
        'STATUS' => $request->STATUS,
        ]
        );
        return redirect()->route('supir.index')->with('success', 'Data Supir berhasil disimpan');
        }
        public function index(Request $request) {
            if ($request->has('search')) {
                $datas = DB::select('SELECT * from SUPIR WHERE ID_SUPIR like :search AND HAPUS <> 1 ' ,[
                    'search' => $request->search,
                ]);
            }else{
                $datas = DB::select('SELECT * FROM SUPIR WHERE HAPUS <> 1');
            }
            
           
            return view('supir.index')->with('datas',$datas);
            }
    public function edit($id) {
        $data = DB::table('supir')->where('ID_SUPIR', $id)->first();
        return view('supir.edit')->with('data', $data);
        }
    public function update($id, Request $request) {
        $request->validate([
            'ID_SUPIR' => 'required',
            'NAMA_SUPIR' => 'required',
            'NOPOL_KENDARAAN' => 'required',
            'NO_HP' => 'required',
            'JENIS_KENDARAAN' => 'required',
            ]);
            // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
            DB::update('UPDATE SUPIR SET ID_SUPIR = :ID_SUPIR, NAMA_SUPIR = :NAMA_SUPIR, NOPOL_KENDARAAN = :NOPOL_KENDARAAN, 
           NO_HP = :NO_HP, JENIS_KENDARAAN = :JENIS_KENDARAAN, STATUS = :STATUS WHERE ID_SUPIR = :id',
            [
                'id' => $id,
                'ID_SUPIR' => $request->ID_SUPIR,
                'NAMA_SUPIR' => $request->NAMA_SUPIR,
                'NOPOL_KENDARAAN' => $request->NOPOL_KENDARAAN,
                'NO_HP' => $request->NO_HP,
                'JENIS_KENDARAAN' => $request->JENIS_KENDARAAN,
                'STATUS' => $request->STATUS,
            ]
            );
            return redirect()->route('supir.index')->with('success', 'Data Supir berhasil diubah');
            }
        public function delete($id) {
            // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
            //DB::delete('DELETE FROM SUPIR WHERE ID_SUPIR = :ID_SUPIR', ['ID_SUPIR' => $id]);
            DB::update('UPDATE SUPIR SET HAPUS = 1 WHERE ID_SUPIR = :ID_SUPIR', ['ID_SUPIR' => $id]);
            return redirect()->route('supir.indexDelete')->with('success', 'Data Supir berhasil dihapus');
            }
            public function hardDelete($id) {
                // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
                DB::delete('DELETE FROM SUPIR WHERE ID_SUPIR = :ID_SUPIR', ['ID_SUPIR' => $id]);
                return redirect()->route('supir.indexDelete')->with('success', 'Data Supir berhasil dihapus');
                }
                public function indexDelete(Request $request) {
                    if ($request->has('search')) {
                        $datasi = DB::select('SELECT * from SUPIR WHERE ID_SUPIR like :search AND HAPUS <> 0 ' ,[
                            'search' => $request->search,
                        ]);
                    }else{
                        $datasi = DB::select('SELECT * FROM SUPIR WHERE HAPUS <> 0');
                    }
                    
                    return view('supir.indexDelete')->with('datasi',$datasi);
                    }
                    public function restore($id) {
                        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
                        //DB::delete('DELETE FROM HASIL_PANEN WHERE ID_PANEN = :ID_PANEN', ['ID_PANEN' => $id]);
                        DB::update('UPDATE SUPIR SET HAPUS = 0 WHERE ID_SUPIR = :ID_SUPIR', ['ID_SUPIR' => $id]);
                        return redirect()->route('supir.indexDelete')->with('success', 'Data Supie berhasil dikembalikan');
                        }
}
