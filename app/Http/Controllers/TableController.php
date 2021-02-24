<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index()
    {
            $tablename = $this->tablelist();
            $table = [];
            return view('table',[
                'tablename'=>$tablename,
                'table'=>$table,
            ]);
    }

    public function table_edit($id)
    {
            $table = Table::Find($id);
            $tablename = $this->tablelist();
            return view('table',[
                'tablename'=>$tablename,
                'table'=>$table,

            ]);
    }

    public function table_update(Request $request)
    {
        $id = $request->id;
        $table = Table::Find($id);
        $table->table_name = $request->tablename;
        $table->save();
        return redirect('/table')->with('message', 'Table Updated');


    }

    public function tableadd(Request $request)
    {
        $table = new Table;
        $table->table_name = $request->tablename;
        $table->save();
        return redirect('/table')->with('message', 'Table inserted');
    }

    protected function tablelist(){
        $tablelist = Table::all();
        return $tablelist;
    }
    public function tabledelete($id)
    {
        Table::where('table_id',$id)->delete();
        return redirect('/table')->with('message', 'Table deleted');
    }
}
