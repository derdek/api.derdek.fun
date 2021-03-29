<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\ZIPModel;

class ZIPModelController extends Controller
{

    public function upload(Request $request){
        
        $validator = Validator::make($request->all(), [
            'zip_codes' => 'required|file|mimes:csv,txt|min:1|max:16000',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->getMessages()], 400);
        }
        
        $uploadedFile = $request->file('zip_codes');
        $filename = time()."_".$uploadedFile->getClientOriginalName();

        Storage::disk('local')->putFileAs(
            'codes/',
            $uploadedFile,
            $filename
        );
        
        $filepath = storage_path("app/codes/$filename");
        $reader = new \SpreadsheetReader($filepath);
        
        $headerFlag = true;
        
        foreach ($reader as $row) {
            if($headerFlag){
                $headerFlag = false;
                continue;
            }
            $tmp = new ZIPModel([
                "zip" => $row[0],
                "lat" => floatval($row[1]),
                "lng" => floatval($row[2]),
                "city" => $row[3],
                "state_id" => $row[4],
                "state_name" => $row[5],
                "zcta" => boolval($row[6]),
                "parent_zcta" => $row[7],
                "population" => $row[8],
                "density" => $row[9],
                "county_fips" => $row[10],
                "county_name" => $row[11],
                "county_weights" => $row[12],
                "county_names_all" => $row[13],
                "county_fips_all" => $row[14],
                "imprecise" => boolval($row[15]),
                "military" => boolval($row[16]),
                "timezone" => $row[17]
            ]);
            $tmp->save();
        }
        
        return response()->json("success",201);
        
    }
    
    public function getInfoByZIP($zip){
        
        $details = ZIPModel::where('zip', '=', $zip)->first();
        
        return response()->json($details);
        
    }
    
    public function getInfoByCity($city){
    
        $details = ZIPModel::where('city', 'like', "%$city%")->first();
        
        return response()->json($details);
        
    }
    
}
