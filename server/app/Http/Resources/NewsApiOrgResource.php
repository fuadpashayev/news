<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsApiOrgResource extends JsonResource
{
    public function toArray($request): array
    {
//        dd($this, $request);
        return [
            'title' => $this->title,
        ];
    }
}
