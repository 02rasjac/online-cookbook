<?php

namespace App\Http\Requests;

use App\Models\Recipie;
use App\Models\Tag;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UploadRecipieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->user() !== null) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'cooktime' => [
                'required',
                Rule::in(Recipie::COOKTIMES),
            ],
            'difficulty' => [
                'required',
                Rule::in(Recipie::DIFFICULTY_CHOICES),
            ],
            'tag_id' => 'exists:tags,id|array',
            'description' => 'required|max:1023|min:16',
            'instruction' => 'required|max:1023',
            'isPublic' => 'boolean',
            'portions' => 'required|integer|min:1|max:12',
            'groups' => 'array',
            'groups.*.title' => 'string|max:64|required',
            'groups.*.ingredients.*.name' => 'required|max:64|string',
            'groups.*.ingredients.*.quantity' => 'numeric',
            'groups.*.ingredients.*.measurement_id' => 'exists:measurement_units,id|required_unless:groups.*.ingredient.*.quantity,null',
        ];
    }
}
