<?php

namespace App\Http\Livewire;

use App\Models\Property;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

ini_set('max_execution_time', '300');

class Properties extends Component
{

    public $filter = null;
    public $search = "";
    public $statusOptions = array("for sale","sold", "under offer", "option owner s","owner r.");

    public function render()
    {
        return view('livewire.properties', [
            'properties' => $this->getProperties(),
            'statusOptions' => $this->statusOptions
        ]);
    }

    public function fetchProperties()
    {

        $this->loading = true;

        $body = [
            "filter"=> [
                "statusIds"=> [1],
                "DisplayStatusIds"=> [1,2,3,4,5],
                "estateIds"=> [],
                "IncludeGroupEstates"=> true,
                "LanguageId"=> "es-ES"
            ],
            "Page"=> [
                "Limit"=> 10
            ]
        ];
    
        $token = env("WHISE_TOKEN");


        $response = Http::withoutVerifying()
            ->withHeaders([
                'Content-Type' => 'application/json',
                "Authorization" => "Bearer " . $token
            ])->post(env("WHISE_URL"), [
            "body" => json_encode($body),
        ]);

        $estates = collect(json_decode($response->body())->estates);

        $filtered = $estates->filter( function ($value, $key){
           return $value->status->id = 1 && in_array($value->purposeStatus->id, [1, 3 ,5 ,12, 13, 15, 16, 17]) ;
        });

        foreach ($filtered->all() as $property) {
            
                if(!Property::find($property->id)){   
                    $values = [];
                    $values["id"] = $property->id;
                    $values["name"] = $property->address ?? "";
                    $values["purpose_status"] = $property->purposeStatus->id;
                    
                    $new = new Property($values);
                    $new->save();
                }     
        }
    }

    public function getProperties()
    {
        $properties = Property::orderBy('id', 'desc')->where('name', 'like', "%$this->search%");

        if($this->filter) $properties = Property::orderBy('id', 'desc')->where('name', 'like', "%$this->search%")
            ->whereIn("purpose_status", $this->getPurposeStatusId($this->statusOptions[$this->filter]));

        return $properties->paginate(6);           
    }

    public function getPurposeStatusName($purpose_status_id): string
    {
        if($purpose_status_id == 3 || $purpose_status_id == 17)
            return "sold";
        else if($purpose_status_id == 5 || $purpose_status_id == 16)
            return "under offer";
        else if($purpose_status_id == 1 || $purpose_status_id == 15)
            return "for sale";
        else if($purpose_status_id == 12)
            return "option owner s.";
        else 
            return "owner r.";
    }

    public function getPurposeStatusId($purpose_status_name): array
    {
        if($purpose_status_name == "sold")
            return [3, 17];
        else if($purpose_status_name == "under offer")
             return [5, 16];
        else if($purpose_status_name == "for sale")
             return [1, 15];
        else if($purpose_status_name == "option owner s.")
             return [12];
        else 
             return [13];
    }

    public function getPurposeStatusColor($purpose_status_id): string
    {
       if($purpose_status_id == 1 || $purpose_status_id == 15)
            return "green";
        else 
            return "red";
    }
}
