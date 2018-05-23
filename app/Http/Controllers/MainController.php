<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Charts\SampleChart;
use Charts;
use Illuminate\Support\Facades\Input;
use App\Exports\InvoicesExport;
use Excel;
use PDF;



use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory as Load;


class MainController extends Controller
{
    public function index(Request $request){

       
      $search = $request->input('search');
      $customer = Customer::latest()
                    ->search($search)
                    ->paginate(10);
      return view('home' , compact('customer' , 'search'));
    }
    public function input(){

        return view('input');
    }
    public function insert(Request $request){
    	$customer = new Customer;
    	$customer->firstname = $request->firstname;
    	$customer->lastname = $request->lastname;
    	$customer->Email = $request->Email;
    	$customer->phone = $request->phone;
    	$customer->save();
        return redirect()->route('user');
    }
    public function edit($id){
        $customer = Customer::find($id);
        return view('edit', compact('customer'));
    }
    public function update(Request $request , $id){

        $customer = Customer::find($id);
        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->Email = $request->lastname;
        $customer->phone = $request->phone;
        $customer->save();
        return redirect()->route('home');
    }
    public function delete($id){
        $customer = Customer::find($id);
        $customer->delete();
      return redirect()->route('table');
    }
    public function export(Request $request){
        // dd('x');     

           if($request->has('pdf')){

                if ($request->checkbox == '') {
                        if ($request->search != '') {

                            $customer = Customer::search($request->input('search'))->get();
                            $pdf = PDF::loadView('pdf', ['customer' => $customer]);
                            return $pdf->download('customer.pdf');
                        }else{

                            $customer =  Customer::all();
                            $pdf = PDF::loadView('pdf', ['customer' => $customer]);
                            return $pdf->download('customer.pdf');
                        }
                }
                else {
                    $customer = Customer::find($request->checkbox);
                    $pdf = PDF::loadView('pdf', ['customer' => $customer]);
                    return $pdf->download('customer.pdf');
                }       
               
           }elseif ($request->has('excel')) {
                // die('y');
                return Excel::download(new InvoicesExport($request->checkbox, $request->search), 'Customer.xlsx');
           }
          
    }

    public function show(Request $request){
       $search = $request->input('search');
       $customer = Customer::latest()
                    ->search($search)
                    ->paginate(5);
      return view('table' , compact('customer', 'search'));

    }

    public function inputUser(){
        return view('user');
    }

    public function import(Request $request){

       
        if ($request->hasFile('import')) {
                
            $import = $request->file('import');
            $spreadsheet = Load::load($import); 

             
              foreach ($spreadsheet->getWorksheetIterator() as $worksheetName) { 
                $highestRow = $worksheetName->getHighestRow(); 
                for($row=1; $row<=$highestRow; $row++){ 

                    $firstname = $worksheetName->getCellByColumnAndRow(1, $row); 
                    $lastname = $worksheetName->getCellByColumnAndRow(2, $row); 
                    $Email = $worksheetName->getCellByColumnAndRow(3, $row); 
                    $phone = $worksheetName->getCellByColumnAndRow(4, $row); 

                    // echo $firstname." "; 
                    // echo $lastname." "; 
                    // echo $Email." "; 
                    // echo $phone."<br>"; 
                    // echo $worksheetName->getCellByColumnAndRow(4, 12); 
                    $member = new Customer; 
                    $member->firstname = $firstname; 
                    $member->lastname = $lastname; 
                    $member->Email = $Email;
                    $member->phone = $phone; 
                    $member->save(); 
            } 
                return redirect()->route('table');

            }
        }
        else{
            echo "<script type='text/javascript'>alert('กรุณาเลือกไฟล์ก่อน');</script>";
            return view('user');
        }    
    }

    public function chart()
    {
        $chart = new SampleChart;
        // $chart->dataset('line', 'bar', [10,50,20,50,100])->color('#000000');

        $chart->dataset('Sample Test', 'bar', [5, 20, 15, 10, 30]);

        $chart->labels(['test1', 'test2', 'test3', 'test4', 'test5']);


                // $chart->color('#ff0000');

        // $chart = Charts::new('line', 'highcharts')
        //     ->setTitle('My nice chart')
        //     ->setLabels(['First', 'Second', 'Third'])
        //     ->setValues([5,10,20])
        //     ->setDimensions(1000,500)
        //     ->setResponsive(false);
     

        return view('chart', ['chart' => $chart]);

    }




}