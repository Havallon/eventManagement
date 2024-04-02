<?php

namespace App\DTO\Event;
use Illuminate\Http\Request;

class UpdateEventDTO
{
 public function __construct(
    public string $id,
    public string $name,
    public ?string $banner_url=NULL,
 ){}
 
 public static function makeDTO(Request $request, string $id, string $banner_url=NULL): self
 {
   return new self($id, $request->name, $banner_url);      
 }
}