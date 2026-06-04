<?php

namespace App\Http\Requests;

use App\Enums\ProjectStatus;
use App\Services\ProjectRevenueService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $revenue = app(ProjectRevenueService::class)->calculate(
            (float) $this->input('total_price', 0),
            (int) $this->input('team_members', 2),
        );

        $this->merge([
            'percent_share' => $revenue['percent_share'],
            'share_amount' => $revenue['share_amount'],
        ]);
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'project_name' => ['required', 'string', 'max:255'],
            'client_name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'total_price' => ['required', 'numeric', 'min:0'],
            'team_members' => ['required', 'integer', 'min:1', 'max:100'],
            'date_created' => ['required', 'date'],
            'status' => ['required', Rule::enum(ProjectStatus::class)],
            'percent_share' => ['required', 'numeric'],
            'share_amount' => ['required', 'numeric'],
        ];
    }
}
