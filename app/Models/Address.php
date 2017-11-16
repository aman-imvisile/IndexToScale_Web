<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';
	protected $fillable = ['id', 'admin_id', 'lmk_key', 'address', 'postcode', 'building_ref_number', 'current_energy_rating', 'potential_energy_rating', 'current_energy_efficiency', 'potential_energy_efficiency', 'property_type', 'built_form', 'transaction_type', 'environment_impact_current', 'environment_impact_potential', 'energy_consumption_current', 'energy_consumption_potential', 'co2_emissions_current', 'co2_emiss_current_per_flour_area', 'co2_emissions_potential', 'lighting_cost_current', 'lighting_cost_potential', 'heating_cost_current', 'heating_cost_potential', 'hot_water_cost_current', 'hot_water_cost_potential', 'total_floor_area', 'energy_tariff', 'mains_gas_flag', 'floor_level', 'flat_top_storey', 'flat_storey_count', 'main_heating_controls', 'multi_glaze_proportion', 'glazed_type', 'glazed_area', 'extension_count', 'number_habitable_rooms', 'number_heater_rooms', 'low_energy_lighting', 'number_open_fireplaces', 'hotwater_description', 'hotwater_energy_efficiency', 'hotwater_env_eff', 'floor_description', 'floor_energy_eff', 'floor_env_eff', 'windows_description', 'windows_energy_eff', 'windows_env_eff', 'walls_description', 'walls_energy_eff', 'walls_env_eff', 'secondheat_description', 'sheating_energy_eff', 'sheating_env_eff', 'roof_description', 'roof_energy_eff', 'roof_env_eff', 'mainheat_description', 'mainheat_energy_eff', 'mainheat_env_eff', 'mainheat_count_description', 'mainheat_count_energy_eff', 'mainheat_count_env_eff', 'lighting_description', 'lighting_energy_eff', 'lighting_env_eff', 'main_fuel', 'wind_turbine_count', 'heat_loss_corridoor', 'unheated_corridor_length', 'floor_height', 'photo_supply', 'solar_water_heateing_flag', 'mechanical_ventilation', 'local_authority_label', 'constituency_label', 'certificate_hash', 'created_at', 'updated_at'];

}
