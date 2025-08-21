<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug,' . $this->product->id,
            'SKU' => 'required|string|max:100|unique:products,SKU,' .$this->product->id,
            'description' => 'nullable|string',
            'short_description' => 'nullable|string|max:500',
            'stock_status' => 'required|in:instock,outofstock',
            'is_featured' => 'boolean',
            'discount_price' => 'nullable|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ];
    }

    public function messages(): array
    {
        return [
        ];
    }
}
