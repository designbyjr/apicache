<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Leads extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {       
           return    [
                'index' => $this->resource['index'],
                'First_Name' => $this->resource['First_Name'], //(mandatory)
                'Last_Name' => $this->resource['Last_Name'], //(mandatory)
                'Email' => $this->resource['Email'], //(mandatory)
                'Company' => $this->resource['Company'],//(optional)
                'Post_Code'  => $this->resource['Post_Code'],//(optional)
                'Accept_Terms' => $this->resource['Accept_Terms'],//(mandatory)
                'Date_created' => $this->resource['Date_created']
            ];
    }

}
