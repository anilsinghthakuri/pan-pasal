<?php

namespace App\Http\Controllers;

require_once __DIR__ . '../../../../vendor/autoload.php';
use Nilambar\NepaliDate\NepaliDate;

use App\Models\Expense;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    public function index()
    {
        $expense_list = $this->pull_expense_list();
        return view('expenselist',[
            'expense_list'=>$expense_list,
        ]);
    }

    public function show_expense_add()
    {
        $expense_category = $this->pull_expense_category();

        return view('add_expense',[
            'expense_category'=>$expense_category,
        ]);
    }

    public function add_expense_list(Request $request)
    {
        if (isset($request->expense_category_id) && isset($request->expensebill) && isset($request->expenseprice) && isset($request->expensevendor) && isset($request->expenseremark) ) {

            $expense = new Expense;
            $expense->expense_category_id = $request->expense_category_id;
            $expense->expense_bill = $request->expensebill;
            $expense->expense_price = $request->expenseprice;
            $expense->nepali_date = $this->nepalidate();
            $expense->expense_vendor = $request->expensevendor;
            $expense->expense_remark = $request->expenseremark;
            $expense->save();

            return redirect('/expense-list')->with('message', 'Expense upload');

        }

        elseif (isset($request->expense_category_id) && isset($request->expensebill) && isset($request->expenseprice) && isset($request->expensevendor)  ) {

            $expense = new Expense;
            $expense->expense_category_id = $request->expense_category_id;
            $expense->expense_bill = $request->expensebill;
            $expense->expense_price = $request->expenseprice;
            $expense->nepali_date = $this->nepalidate();
            $expense->expense_vendor = $request->expensevendor;
            $expense->save();

            return redirect('/expense-list')->with('message', 'Expense upload');

        }
        elseif (isset($request->expense_category_id) && isset($request->expensebill) && isset($request->expenseprice)  ) {

            $expense = new Expense;
            $expense->expense_category_id = $request->expense_category_id;
            $expense->expense_bill = $request->expensebill;
            $expense->nepali_date = $this->nepalidate();
            $expense->expense_price = $request->expenseprice;
            $expense->save();

            return redirect('/expense-list')->with('message', 'Expense upload');

        }
        elseif (isset($request->expense_category_id) && isset($request->expenseprice)  ) {

            $expense = new Expense;
            $expense->expense_category_id = $request->expense_category_id;
            $expense->nepali_date = $this->nepalidate();
            $expense->expense_price = $request->expenseprice;
            $expense->save();

            return redirect('/expense-list')->with('message', 'Expense upload');

        }
        else{
            return redirect('/expense-add')->with('message', 'Add every inputs upload');

        }

    }

    public function show_expense_category()
    {
        $categories_expense = [];
        $expense_category = $this->pull_expense_category();
        return view('add__expense_category',[
            'expense_category'=>$expense_category,
            'categories_expense'=>$categories_expense,
        ]);
    }

    public function add_expense_category(Request $request)
    {
        if (isset($request->categoryname)) {
            DB::table('categories_expense')->insert([
                'expense_category_name' => $request->categoryname,

            ]);
            return redirect('/expense-category')->with('message', 'Category  upload');

        }

    }

    public function edit_expense_category($id)
    {
        // dd('anil');
        $categories_expense = DB::table('categories_expense')->where('expense_category_id',$id)->first();
        // dd($categories_expense);
        $expense_category = $this->pull_expense_category();

        return view('add__expense_category',[
            'categories_expense'=>$categories_expense,
            'expense_category'=>$expense_category,

        ]);
    }
    public function update_expense_category(Request $request)
    {
        $id = $request->id;
        DB::table('categories_expense')
              ->where('expense_category_id',$id)
              ->update(['expense_category_name' => $request->categoryname]);
        return redirect('/expense-category')->with('message', 'Expense Category Updated');


    }

    public function delete_expense_category($id)
    {
        DB::table('categories_expense')->where('expense_category_id',$id)->delete();
        return redirect('/expense-category')->with('message', 'Expense Category Deleted');
    }

    private function pull_expense_category(){
        $expense_category = DB::table('categories_expense')->get();
        return $expense_category;
    }

    private function pull_expense_list(){
        $expense_list = Expense::all();
        return $expense_list;
    }

    public function nepalidate()
    {
        $endate = Carbon::now();
        $year = $endate->year;
        $month = $endate->month;
        $day = $endate->day;

        $obj = new NepaliDate();

        $date = $obj->convertAdToBs($year, $month, $day);

        $current_year = $date['year'];
        $current_month = $date['month'];
        $current_day = $date['day'];

        $current_date = $current_year.'/'.$current_month.'/'.$current_day;

        return $current_date;

    }
}
