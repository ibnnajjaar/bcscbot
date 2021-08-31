<?php

namespace App\Http\Requests;

use App\Enums\Weekdays;
use App\Models\Subject;
use Illuminate\Foundation\Http\FormRequest;

class PeriodsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'start_at_hr' => 'numeric|between:0,24',
            'start_at_min' => 'numeric|between:0,59',
            'end_at_hr' => 'numeric|between:0,24|gte:start_at_hr',
            'end_at_min' => 'numeric|between:0,59',
            'weekday' => 'in:' . implode(',', Weekdays::toLabels()),
            'details' => 'nullable|string',
            'subject' => 'exists:subjects,id'
        ];

        if (! $this->route('period')) {
            $rules['start_at_hr'] .= '|required';
            $rules['start_at_min'] .= '|required';
            $rules['end_at_hr'] .= '|required';
            $rules['end_at_min'] .= '|required';
            $rules['weekday'] .= '|required';
            $rules['subject'] .= '|required';
        }

        return $rules;
    }

    public function subject(): ?Subject
    {
        return Subject::find($this->input('subject'));
    }

    public function startAt(): string
    {
        return $this->input('start_at_hr') . ':' . $this->input('start_at_min') . ':0';
    }

    public function endAt(): string
    {
        return $this->input('end_at_hr') . ':' . $this->input('end_at_min') . ':0';
    }
}
