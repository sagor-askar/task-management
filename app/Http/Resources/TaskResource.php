<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'task_name' => $this->task_name,
            'start_date' => $this->formatDate($this->start_date),
            'end_date' => $this->formatDate($this->end_date),
            'status' => $this->status,
            'user_id' => $this->user_id,
            'created_at' => $this->formatDate($this->created_at),
            'updated_at' => $this->formatDate($this->updated_at),
        ];
    }

    /**
     * Format a given date or return null if not a valid date.
     *
     * @param  mixed  $date
     * @return string|null
     */
    protected function formatDate($date)
    {
        return $date instanceof \DateTime
            ? $date->format('d/m/Y')
            : (is_string($date) && strtotime($date) ? date('d/m/Y', strtotime($date)) : null);
    }
}
