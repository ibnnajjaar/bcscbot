<?php

namespace App\Http\Requests;

use App\Enums\AssessmentTypes;
use App\Models\Subject;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class AssessmentsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'name' => 'string',
            'assessment_at_year' => 'nullable|numeric|between:2020,3000',
            'assessment_at_month' => 'nullable|numeric|between:1,12',
            'assessment_at_day' => 'nullable|numeric|between:1,31',
            'assessment_at_hour' => 'nullable|numeric|between:0,23',
            'assessment_at_minutes' => 'nullable|numeric|between:0,59',
            'description' => 'nullable|string',
            'total_marks' => 'nullable|numeric|between:0,999999',
            'weight' => 'nullable|numeric|between:0,100',
            'type' => 'in:' . implode(',', AssessmentTypes::toLabels()),
            'subject' => 'exists:subjects,id'
        ];

        if (! $this->route('assessment')) {
            $rules['name'] .= '|required';
            $rules['subject'] .= '|required';
            $rules['type'] .= '|required';
        }

        return $rules;
    }

    public function subject(): ?Subject
    {
        return Subject::find($this->input('subject'));
    }

    public function assessmentAt(): string
    {
        $date =  $this->input('assessment_at_year') . '/' . $this->input('assessment_at_month') . '/' . $this->input('assessment_at_day') . ' '
            . $this->input('assessment_at_hour') . ':' . $this->input('assessment_at_minutes');
        return Carbon::parse($date);
    }
}
