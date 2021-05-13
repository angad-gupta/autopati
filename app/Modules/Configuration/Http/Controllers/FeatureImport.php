<?php

namespace App\Modules\Configuration\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use App\Modules\Spec\Entities\Spec;
use App\Modules\Configuration\Entities\Configuration;
use App\Modules\Configuration\Entities\ConfigurationValue;


class FeatureImport implements ToCollection
{


    public function collection(Collection $rows)
    {

        foreach ($rows as $key => $value) 
        {
            if($key>0){
                $check_spec_result = Spec::where('spec_title', 'like', '%' .$value[0].'%' )->first();
                if(empty($check_spec_result)){
          
                    $spec = new Spec;
                    $spec->spec_title = $value[0];
                    $spec->automobile = 'Car';
                    $spec->save();
                    $check_spec_result =  $spec;
                    $spec_count++;
                }

                $check_config_result = Configuration::where('title', 'like', '%' .$value[1].'%' )->where('spec_id','=',$check_spec_result->id)->first();
                if(empty($check_config_result)){

                    $config = new Configuration;
                    $config->spec_id = $check_spec_result->id;
                    $config->title = $value[1];
                    $config->save();
                    $check_config_result = $config;
                }

    
                $check_config_value_result = ConfigurationValue::where('config_value', 'like', '%' .$value[2].'%' )->where('configuration_id','=',$check_config_result->id)->first();
              
                if(empty($check_config_value_result)){
                    // dd('CV NotFound');
                    $config_value = new ConfigurationValue;
                    $config_value->configuration_id = $check_config_result->id;
                    $config_value->config_value = $value[2];
                    $config_value->save();
                }
            }
        
        }
    }
}