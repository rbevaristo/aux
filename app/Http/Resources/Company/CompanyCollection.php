<?php

namespace App\Http\Resources\Company;

use Illuminate\Http\Resources\Json\Resource;

class CompanyCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'name' => $this->name,
            'description' => $this->description,
            'href' => [
                'company' => url('http://localhost:8000/api/company/'.$this->id),
                'employees' => url('http://localhost:8000/api/company/'.$this->id.'/employee')
            ]
        ];
    }
}
