<?php

namespace App\Http\Controllers;

require __DIR__ . '/../../../vendor/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;


use App\Models\Bill;
use App\Models\Companydata;
use App\Models\Kot;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysqli;

class billprintcontroller extends Controller
{

    public function index($table)
    {
        // dd($table);

        $companydata = $this->pull_company_data();
        $bill_num  = $this->bill_number();
        $bill_data = $this->pull_bill_data($bill_num);
        $table_name = $bill_data->table->table_name;
        $customer = $bill_data->customer->customer_username;
        $datentime = $bill_data->created_at;

        $total = [];
        $orderdata = Order::where('table_id',$table)->where('bill_status',0)->with('product')->get();
        foreach ($orderdata as $key => $value)
         {
         $total[] = $orderdata[$key]['order_subprice'];
         }

        if($total == null){

        }
        else{
            $total_price = array_sum($total);
            Order::where('table_id',$table)->where('bill_status',0)->update(['bill_status' => 1,'bill_id'=>$bill_num]);


        try {

            $connector = new WindowsPrintConnector("pos");

            $printer = new Printer($connector);

             //test data
             $title = array(new item('Product Name','Quantity','Sub Price'));

            // ($orderdata);
             foreach ($orderdata as $key => $value) {
               $product_id = $orderdata[$key]['product_id'];
                 $productname = DB::table('products')->where('product_id',$product_id)->first();

                 $items[] = new item ($productname->product_name,$orderdata[$key]['order_quantity'],$orderdata[$key]['order_subprice']) ;
             }

            //header of bill
             $printer->setJustification(Printer::JUSTIFY_CENTER);
             $printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
             $printer->text("Dotsoft Ltd.\n");
             $printer->selectPrintMode();
             $printer->text("Dhangadhi,Kailali.\n");
             $printer->feed();

            //Bill type
            $printer->setEmphasis(true);
            $printer->text("SALES INVOICE\n");
            $printer->setEmphasis(false);
            $printer->feed(2);

            //title of bill
            $printer->setJustification(Printer::JUSTIFY_LEFT);
            $printer->setEmphasis(true);
            foreach ($title as $item) {

                $printer->text($item->getAsString(32)); // for 58mm Font A
            }
            $printer->setEmphasis(false);
            $printer->feed();

            //bill body
            $printer->setJustification(Printer::JUSTIFY_LEFT);
            foreach ($items as $item) {
                $printer->text($item->getAsString(32)); // for 58mm Font A
            }

            //total
            $printer->feed(2);
            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
            $printer->setEmphasis(true);
            $printer->text("Total: ".$total_price."\n");
            $printer->selectPrintMode();
            $printer->setEmphasis(false);

            //footer
            $printer->feed(2);
             $printer->setJustification(Printer::JUSTIFY_CENTER);
             $printer->text("Thank you for shopping\n");
             $printer->text("at Dotsoft\n");
             $printer->text("For trading hours,\n");
             $printer->text("please visit\n");
             $printer->feed(2);

            //close and cut paper
            $printer->cut();
            $printer->pulse();


        }
        catch (Exception $e) {
            echo $e->getMessage();
        } finally {
            $printer->close();
        }
        return redirect()->back();
    }

    }

    public function kot_bill($table)
    {

        $kot_bill = Kot::where('table_id',$table)->where('status',0)->get();



        if (count($kot_bill) == 0) {

            // dd($kot_bill);
            session()->flash('message', 'Kot Done Already!');

            return redirect()->back();

        }
        else{

            try {

                $connector = new WindowsPrintConnector("pos");

                $printer = new Printer($connector);

                 //test data
                // ($orderdata);

                $time = Carbon::now();
                $title = array(new kit('Product Name','Place'));

                 foreach ($kot_bill as $key => $value) {
                   $product_id = $kot_bill[$key]['product_id'];
                   $table_id = $kot_bill[$key]['table_id'];
                     $productname = DB::table('products')->where('product_id',$product_id)->first();
                     $tablename = DB::table('tables')->where('table_id',$table_id)->first();

                     $items[] = new kit ($productname->product_name,$tablename->table_name) ;
                 }

                //Bill type
                $printer->setJustification(Printer::JUSTIFY_CENTER);
                $printer->setEmphasis(true);
                $printer->text("KOT\n");
                $printer->setEmphasis(false);
                $printer->feed(2);

                //time
                $printer->setEmphasis(true);
                $printer->text("Order Time:".$time."\n");
                $printer->setEmphasis(false);
                $printer->feed(2);

                //title of bill
                $printer->setJustification(Printer::JUSTIFY_LEFT);
                $printer->setEmphasis(true);
                foreach ($title as $item) {
                    $printer->text($item->getAsString(32)); // for 58mm Font A
                }
                $printer->setEmphasis(false);
                $printer->feed();
                //bill body
                $printer->setJustification(Printer::JUSTIFY_LEFT);
                foreach ($items as $item) {
                    $printer->text($item->getAsString(32)); // for 58mm Font A
                }


                //close and cut paper
                $printer->cut();
                $printer->pulse();

                Kot::where('table_id',$table)->where('status',0)->update(['status' => 1]);

            }
            catch (Exception $e) {
                echo $e->getMessage();
            } finally {
                $printer->close();
            }

            return redirect()->back();
        }

    }

    public function test()
    {
        $item = [];
        $orderdata = Order::where('table_id',1)->where('bill_status',0)->with('product')->get();
        die($orderdata);
    }

   private function pull_bill_data($id){
       $bill_data = Bill::find($id);
       return $bill_data;
   }
   private function bill_number(){
       $bill_num = Bill::max('bill_id');
      return $bill_num;
   }

   private function pull_company_data()
   {
       $companydata = DB::table('companydatas')->first();
       return $companydata;
   }



}



class item
{
    private $name;
    private $quantity;
    private $price;
    private $dollarSign;

    public function __construct($name = '',$quantity = '', $price = '', $dollarSign = false)
    {
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->dollarSign = $dollarSign;
    }

    public function getAsString($width = 58)
    {
        $rightCols = 10;

        $centerCols = 20 ;

        $leftCols = $width - 20;
        // if ($this->dollarSign) {
        //     $leftCols = $leftCols / 2 - $rightCols / 2;
        // }

        $center = str_pad($this->quantity,$centerCols,' ',STR_PAD_BOTH);

        $left = str_pad($this->name, $leftCols);


        $sign = ($this->dollarSign ? '$ ' : '');
        $right = str_pad($sign . $this->price, $rightCols, ' ', STR_PAD_LEFT);
        return "$left$center$right\n";
    }

    public function __toString()
    {
        return $this->getAsString();
    }

}

class kit
{
    private $name;
    private $price;
    private $dollarSign;

    public function __construct($name = '', $price = '', $dollarSign = false)
    {
        $this->name = $name;
        $this->price = $price;
        $this->dollarSign = $dollarSign;
    }

    public function getAsString($width = 48)
    {
        $rightCols = 10;
        $leftCols = $width - $rightCols;
        if ($this->dollarSign) {
            $leftCols = $leftCols / 2 - $rightCols / 2;
        }
        $left = str_pad($this->name, $leftCols);

        $sign = ($this->dollarSign ? '$ ' : '');
        $right = str_pad($sign . $this->price, $rightCols, ' ', STR_PAD_LEFT);
        return "$left$right\n";
    }

    public function __toString()
    {
        return $this->getAsString();
    }

}
