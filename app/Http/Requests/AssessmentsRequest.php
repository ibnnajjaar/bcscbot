<?php

namespace App\Http\Requests;

use App\Enums\AssessmentTypes;
use App\Models\Subject;
use Illuminate\Foundation\Http\FormRequest;

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
            'assessment_at' => 'nullable|date',
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
}
