<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Address;
use App\Models\PropertyLinks;
use App\Models\PropertyImages;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\Thumbnail;
use Validator;
use Session;
use Excel;
use App\Product;

class ProductController extends Controller
{
    public function products(){
    
    $products=Product::all();
    
    return view('admin.products',compact('products'));
    
    }
    
    
   public function import(Request $request)
	{
		if($request->file('imported-file')){
			$path = $request->file('imported-file')->getRealPath();
			$data = Excel::load($path, function($reader) {})->get();
			//return $data;
	  		if(!empty($data) && $data->count()){
				foreach ($data as $key => $value){ 
				if(!empty($value->lmk_key) && isset($value->lmk_key)){
					$address=$value->ADDRESS1.$value->ADDRESS2.$value->ADDRESS3;
                 	$dataImported[] = [
                       
 						  'address'        =>$address,
                          'lmk_key'                      =>$value->LMK_KEY,
                          'building_ref_number'          =>$value->BUILDING_REFERENCE_NUMBER,
                          'current_energy_rating'        =>$value->CURRENT_ENERGY_RATING,
                          'potential_energy_rating'      =>$value->POTENTIAL_ENERGY_RATING,
                          'current_energy_efficiency'    =>$value->CURRENT_ENERGY_EFFICIENCY,
                          'potential_energy_efficiency'  =>$value->POTENTIAL_ENERGY_EFFICIENCY,
                          'property_type'                =>$value->PROPERTY_TYPE,
                          'built_form'                   =>$value->BUILT_FORM,
                          'transaction_type'             =>$value->TRANSACTION_TYPE,
                          'environment_impact_current'   =>$value->ENVIRONMENT_IMPACT_CURRENT,
                          'environment_impact_potential' =>$value->ENVIRONMENT_IMPACT_POTENTIAL,
                          'energy_consumption_current'   =>$value->ENERGY_CONSUMPTION_CURRENT,
                          'energy_consumption_potential' =>$value->ENERGY_CONSUMPTION_POTENTIAL,
                           'co2_emissions_current'        =>$value->CO2_EMISSIONS_CURRENT,
                           'co2_emiss_current_per_flour_area'        =>$value->CO2_EMISS_CURR_PER_FLOOR_AREA,
                           'co2_emissions_potential'        =>$value->CO2_EMISSIONS_POTENTIAL,
                           'lighting_cost_current'        =>$value->LIGHTING_COST_CURRENT,
                           'lighting_cost_potential'        =>$value->LIGHTING_COST_POTENTIAL,
                           'heating_cost_current'        =>$value->HEATING_COST_CURRENT,
                           'heating_cost_potential'        =>$value->HEATING_COST_POTENTIAL,
                           'hot_water_cost_current'        =>$value->HOT_WATER_COST_CURRENT,
                           'hot_water_cost_potential'        =>$value->HOT_WATER_COST_POTENTIAL,
                           'total_floor_area'        =>$value->TOTAL_FLOOR_AREA,
                           'energy_tariff'        =>$value->ENERGY_TARIFF,
                           'mains_gas_flag'        =>$value->MAINS_GAS_FLAG,
                           'floor_level'        =>$value->FLOOR_LEVEL,
                           'flat_top_storey'        =>$value->FLAT_TOP_STOREY,
                           'flat_storey_count'        =>$value->FLAT_STOREY_COUNT,
                           'main_heating_controls'        =>$value->MAIN_HEATING_CONTROLS,
                           'multi_glaze_proportion'        =>$value->MULTI_GLAZE_PROPORTION,
                           'glazed_type'        =>$value->GLAZED_TYPE,
                           'glazed_area'        =>$value->GLAZED_AREA,
                           'extension_count'        =>$value->EXTENSION_COUNT,
                           'number_habitable_rooms'        =>$value->NUMBER_HABITABLE_ROOMS,
                           'number_heater_rooms'        =>$value->NUMBER_HEATED_ROOMS,
                           'low_energy_lighting'        =>$value->LOW_ENERGY_LIGHTING,
                           'number_open_fireplaces'        =>$value->NUMBER_OPEN_FIREPLACES,
                           'hotwater_description'        =>$value->HOTWATER_DESCRIPTION,
                           'hotwater_energy_efficiency'        =>$value->HOT_WATER_ENERGY_EFF,
                           'hotwater_env_eff'        =>$value->HOT_WATER_ENV_EFF,
                           'floor_description'        =>$value->FLOOR_DESCRIPTION,
                           'floor_energy_eff'        =>$value->FLOOR_ENERGY_EFF,
                           'floor_env_eff'        =>$value->FLOOR_ENV_EFF,
                           'windows_description'        =>$value->WINDOWS_DESCRIPTION,
                           'windows_energy_eff'        =>$value->WINDOWS_ENERGY_EFF,
                           'windows_env_eff'        =>$value->WINDOWS_ENV_EFF,
                           'walls_description'        =>$value->WALLS_DESCRIPTION,
                           'walls_energy_eff'        =>$value->WALLS_ENERGY_EFF,
                           'walls_env_eff'        =>$value->WALLS_ENV_EFF,
                           'secondheat_description'        =>$value->SECONDHEAT_DESCRIPTION,
                           'sheating_energy_eff'        =>$value->SHEATING_ENERGY_EFF,
                           'sheating_env_eff'        =>$value->SHEATING_ENV_EFF,
                           'roof_description'        =>$value->ROOF_DESCRIPTION,
                           'roof_energy_eff'        =>$value->ROOF_ENERGY_EFF,
                           'roof_env_eff'        =>$value->ROOF_ENV_EFF,
                           'mainheat_description'        =>$value->MAINHEAT_DESCRIPTION,
                           'mainheat_energy_eff'        =>$value->MAINHEAT_ENERGY_EFF,
                           'mainheat_env_eff'        =>$value->MAINHEAT_ENV_EFF,
                           'mainheat_count_description'        =>$value->MAINHEATCONT_DESCRIPTION,
                           'mainheat_count_energy_eff'        =>$value->MAINHEATC_ENERGY_EFF,
                           'mainheat_count_env_eff'        =>$value->MAINHEATC_ENV_EFF,
                           'lighting_description'        =>$value->LIGHTING_DESCRIPTION,
                           'lighting_energy_eff'        =>$value->LIGHTING_ENERGY_EFF,
                           'lighting_env_eff'        =>$value->LIGHTING_ENV_EFF,
                           'main_fuel'        =>$value->MAIN_FUEL,
                           'wind_turbine_count'        =>$value->WIND_TURBINE_COUNT,
                           'heat_loss_corridoor'        =>$value->HEAT_LOSS_CORRIDOOR,
                           'unheated_corridor_length'        =>$value->UNHEATED_CORRIDOR_LENGTH,
                           'floor_height'        =>$value->FLOOR_HEIGHT,
                           'photo_supply'        =>$value->PHOTO_SUPPLY,
                           'solar_water_heateing_flag'        =>$value->SOLAR_WATER_HEATING_FLAG,
                           'mechanical_ventilation'        =>$value->MECHANICAL_VENTILATION,
                           'local_authority_label'        =>$value->LOCAL_AUTHORITY_LABEL,
                           'constituency_label'        =>$value->CONSTITUENCY_LABEL,
                           'certificate_hash'        =>$value->CERTIFICATE_HASH
                       
                           
                     
                     
        ];
        }
		}
        //return $dataImported;
                if(!empty($dataImported)){
            		Address::insert($dataImported);               		         		   	
            	}
            return back();
        	}
		}
		return back();
	}
    
     
    
}
