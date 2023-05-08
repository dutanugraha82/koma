<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DirectoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'slug' => $this->slug,
            'author' => $this->author,
            'category' => $this->category->name,
            'title' => $this->title,
            'description' => $this->description,
            'thumbnail' => $this->thumbnail,
            'created_at' => $this->updated_at->format('d, F, Y')

        ];
    }
}
