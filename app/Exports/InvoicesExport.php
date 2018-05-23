<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Customer;

class InvoicesExport implements FromCollection
{
   public function __construct($checkbox , $search)
    {
        $this->checkbox = $checkbox;
        $this->search = $search;

    }
    public function collection()
    {
    	if ($this->checkbox == '') {

    		if($this->search != ''){
                  return Customer::search($this->search);
    		}else{

    	     	return Customer::all();

    		}
    	}
    	else{

    		return Customer::query()->whereIn('id', $this->checkbox);
    	}

    }
}