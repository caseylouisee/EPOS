<?php

namespace App\Http\Controllers\Download;

use Illuminate\Http\Request;
use DB;
use Validator;
use Input;
use Illuminate\Support\Collection;
use App\Equipment;
use App\Contract;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class DownloadController extends Controller{
	
	public function equipments(){
		$todaysDate = Carbon::today()->toDateString();
		$equipments = Equipment::all();
		$pdf = \PDF::loadView('pdf.equipments', compact('equipments','todaysDate'))->setPaper('a4', 'landscape');
		//PDF::loadHTML($html)->setPaper('a4', 'landscape')->setWarnings(false)->save('myfile.pdf')
		//return $pdf->download('equipments.pdf');
		return $pdf->stream();
	}
	
	public function equipmentInternalWarrantyExpired(){
		$todaysDate = Carbon::today()->toDateString();

		$lists = Equipment::all();
		$collection = new Collection();
		$today = Carbon::today();

		foreach($lists as $equipment){
			if($equipment->customer()->first()!==null){
				$iwarrantyStart = Carbon::parse($equipment->customer()->first()->pivot->install_date);
				$numMonths = $equipment->customer()->first()->pivot->internal_warranty_period;
				$iwarrantyEnd = $iwarrantyStart->addMonth($numMonths);
				if($iwarrantyEnd->lt($today)){
					$collection->push($equipment);
				}
			}
		}
		$equipments = $collection->all(); 
		
		$pdf = \PDF::loadView('pdf.equipmentsinternalwarrantyexpired', compact('equipments','todaysDate'))->setPaper('a4', 'landscape');
		//return $pdf->download('equipmentsinternalwarranty.pdf');
	   return $pdf->stream(); 
	}
	
	public function equipmentInternalWarrantyExpiringThisWeek(){
		$todaysDate = Carbon::today()->toDateString();

		$lists = Equipment::all();
		$collection = new Collection();
		$today = Carbon::today();
		$weekToday = Carbon::today()->addWeek(1);

		foreach($lists as $equipment){
			if($equipment->customer()->first()!==null){
				$iwarrantyStart = Carbon::parse($equipment->customer()->first()->pivot->install_date);
				$numMonths = $equipment->customer()->first()->pivot->internal_warranty_period;
				$iwarrantyEnd = $iwarrantyStart->addMonth($numMonths);
				if($iwarrantyEnd->gte($today)&&$iwarrantyEnd->lt($weekToday)){
					$collection->push($equipment);
				}
			}
		}			
		$equipments = $collection->all(); 
			
		$pdf = \PDF::loadView('pdf.equipmentsinternalwarrantyexpiringthisweek', compact('equipments','todaysDate'))->setPaper('a4', 'landscape');
		//return $pdf->download('equipmentsinternalwarranty.pdf');
	   return $pdf->stream(); 
	}
	
	public function contracts(){
		$todaysDate = Carbon::today()->toDateString();

		$contracts = Contract::all();
		$pdf = \PDF::loadView('pdf.contracts', compact('contracts','todaysDate'))->setPaper('a4', 'landscape');
		//PDF::loadHTML($html)->setPaper('a4', 'landscape')->setWarnings(false)->save('myfile.pdf')
		//return $pdf->download('equipments.pdf');
		return $pdf->stream();
	}
	
	public function contractsExpired(){
		$todaysDate = Carbon::today()->toDateString();

		$lists = Contract::all();
		$collection = new Collection();
		$today = Carbon::today();

		foreach($lists as $contract){
			$contractStart = Carbon::parse($contract->start);
			$numMonths = $contract->length;
			$contractEnd = $contractStart->addMonth($numMonths);
			if($contractEnd->lt($today)){
				$collection->push($contract);
			}
		}
		$contracts = $collection->all(); 
		
		$pdf = \PDF::loadView('pdf.contractsexpired', compact('contracts','todaysDate'))->setPaper('a4', 'landscape');
		//return $pdf->download('equipmentsinternalwarranty.pdf');
	   return $pdf->stream(); 
	}
	
	public function contractsExpiringThisWeek(){
		$todaysDate = Carbon::today()->toDateString();

		$lists = Contract::all();
		$collection = new Collection();
		$today = Carbon::today();
		$weekToday = Carbon::today()->addWeek(1);

		foreach($lists as $contract){
			$contractStart = Carbon::parse($contract->start);
			$numMonths = $contract->length;
			$contractEnd = $contractStart->addMonth($numMonths);
			if($contractEnd->gte($today)&&$contractEnd->lt($weekToday)){
				$collection->push($contract);
			}
		}			
		$contracts = $collection->all(); 
				
		$pdf = \PDF::loadView('pdf.contractsexpiringthisweek', compact('contracts','todaysDate'))->setPaper('a4', 'landscape');
		//return $pdf->download('equipmentsinternalwarranty.pdf');
	   return $pdf->stream(); 
	}
	
}
