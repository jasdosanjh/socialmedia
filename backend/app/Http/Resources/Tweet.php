<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Tweet extends JsonResource
{
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'tweet' => $this->tweet,
            'created_at' => $this->created_at->diffForHumans(),
            'updated_at' => $this->updated_at->diffforHumans(),
            'user' => $this->user,
            'comments' =>$this->comments,
        ];
    }
}
