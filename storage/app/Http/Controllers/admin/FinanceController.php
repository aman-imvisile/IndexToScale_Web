<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Finance;
use Validator;
use Session;

class FinanceController extends Controller
{
 	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
    	$financedata=Finance::select('*')->get();
    	return view('admin.finance.addfinance',array('finance_data'=>$financedata));
    }
	
	/**
	 * Show the form to add new propert
	 *
	 * @return Response
	 */
	public function addfinance(Request $request)
	{
		if(!empty($request->all())){
		
			$validator = Validator::make($request->all(),
											[											
											'finance_type'		=> 'required',
    										'main_title'		=> 'required',
    										'monthly_price'		=> 'required'//,
//     										'sub_title'			=> 'required',
//     										'yearly_price'		=> 'required' ,
//     										'indexes'			=> 'required',
//     										'updates'			=> 'required',
//     										'trackings'			=> 'required',
//     										'summary_chart'		=> 'required',
//     										'personalities'		=> 'required',
//     										'forecast_strategy'	=> 'required',
//     										'early_bird'		=> 'required'
    										
			]);
			
			if($validator->fails()){    		
				return redirect('admin/finance/create')->withErrors($validator)->withInput();	
			}
			
			$finance=Finance::create([											
										'finance_type'		=>	$request->finance_type,										
    									'main_title'		=>	$request->main_title,										
    									'sub_title'			=>	$request->sub_title,										
    									'monthly_price'		=>	$request->monthly_price,										
    									'yearly_price'		=>	$request->yearly_price,										
    									'indexes'			=>	$request->indexes,										
    									'updates'			=>	$request->updates,										
    									'trackings'			=>	$request->trackings,										
    									'summary_chart'		=>	$request->summary_chart,										
    									'personalities'		=>	$request->personalities,										
    									'forecast_strategy'	=>	$request->forecast_strategy,										
    									'early_bird'		=>	$request->early_bird									
			]);
        		
        	if(isset($finance)){
        	
				Session::flash('message', "New finance added successfully!"); 
				Session::flash('alert-class', 'alert-success'); 
				return redirect('admin/finance/list/'.$request->finance_type);	
			}
			Session::flash('message', "Some error occur!"); 
			Session::flash('alert-class', 'alert-danger'); 
			return redirect('admin/finance/create');
		}
	}
	
	
	/**
	 * to Display all finance prices according finance type 
	 *
	 * @return Response
	 */	   	
	public function financelist(Request $request,$finance_type)
	{
		$finance_type = $finance_type;
	   	$finance = Finance::select('*')->where('finance_type',$finance_type)->get();	
	   	return view('admin.finance.financelist', compact('finance','finance_type'));	
	}
	
	
	
	/**
	* To Alter table
	*
	* to delete finance type from database
	**/
	public function deleteFinancetype(Request $request){
	
		$finance = Finance::find($request->id);    
		$deletefinance = $finance->delete();
		
   		if($deletefinance){
			Session::flash('message', "Finance type deleted successfully!"); 
			Session::flash('alert-class', 'alert-success');
			return back();
	 	}
    }
    
    
    /**
	* To Alter table
	*
	* to delete admin finance from database
	**/
    public function editFinance(Request $request,$id)
	{
	   	$finance = Finance::select('*')->where('id','=', $id)->first();	   
	   	return view('admin.finance.edit_sp', array('finance'=>$finance));		
	}
	
	
	/**
	* To Alter table
	*
	* to Update admin finance Details
	**/
	public function updateFinance(Request $request)
	{
		if(!empty($request->all())){
		
			$validator = Validator::make($request->all(),[											
											// 'finance_type'		=> 'required',
    										// 'main_title'		=> 'required',
    										'monthly_price'		=> 'required'//,
//     										'sub_title'			=> 'required',
//     										'yearly_price'		=> 'required' ,
//     										'indexes'			=> 'required',
//     										'updates'			=> 'required',
//     										'trackings'			=> 'required',
//     										'summary_chart'		=> 'required',
//     										'personalities'		=> 'required',
//     										'forecast_strategy'	=> 'required',
//     										'early_bird'		=> 'required'
    		]);
    		
			if($validator->fails()){    		
				return redirect('admin/finance/editFinance/'.$request->id)->withErrors($validator)->withInput();	
			}
   			
            $updateArray = [											
							'finance_type'		=>	$request->finance_type,										
    						'main_title'		=>	$request->main_title,										
    						'sub_title'			=>	$request->sub_title,										
    						'monthly_price'		=>	$request->monthly_price,										
    						'yearly_price'		=>	$request->yearly_price,										
    						'indexes'			=>	$request->indexes,										
    						'updates'			=>	$request->updates,										
    						'trackings'			=>	$request->trackings,										
    						'summary_chart'		=>	$request->summary_chart,										
    						'personalities'		=>	$request->personalities,										
    						'forecast_strategy'	=>	$request->forecast_strategy,										
    						'early_bird'		=>	$request->early_bird
			];
			$finance=Finance::where('id',$request->id)->update($updateArray);
			
			if(isset($finance)){
			
				Session::flash('message', "Finance updated successfully!"); 
				Session::flash('alert-class', 'alert-success'); 
				return redirect('admin/finance/list/'.$request->finance_type);	
			}
			Session::flash('message', "Some error occur!"); 
			Session::flash('alert-class', 'alert-danger'); 
			return redirect('admin/finance/edit/'.$request->id);
		}
	}
	
	
	
	
//end class	
}