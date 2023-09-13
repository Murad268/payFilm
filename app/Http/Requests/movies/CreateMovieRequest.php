<?php

namespace App\Http\Requests\movies;

use Illuminate\Foundation\Http\FormRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CreateMovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $supportedLanguages = LaravelLocalization::getSupportedLanguagesKeys();

        $rules = [];

        foreach ($supportedLanguages as $lang) {
            $rules["name.$lang"] = 'required|string|max:255';
            $rules["slug.$lang"] = 'required|string|max:255|regex:/^[a-zA-Z0-9\-_]+$/';
            $rules["poster"] = 'required|image|mimes:jpeg,jpg,png|max:2048';
            $rules["banner"] = 'required|image|mimes:jpeg,jpg,png|max:2048';
            $rules["length"] = 'required|numeric';
            $rules["link"] = 'required';
            $rules["ytrailer"] = 'required';
            $rules["quality"] = 'required';
            $rules["movie__categories"] = 'required';
            $rules["categories"] = 'required';
            $rules["categories"] = 'required';
            $rules['release'] = 'required';
            $rules['movie__categories'] = 'required';
            $rules['home__categories'] = 'required';
            $rules['countries'] = 'required';
            $rules['directors'] = 'required';
            $rules['scriptwriters'] = 'required';
            $rules['actors'] = 'required';
            $rules['release'] = 'required';
        }



        return $rules;
    }

    public function messages(): array
    {
        $supportedLanguages = LaravelLocalization::getSupportedLanguagesKeys();

        $customMessages = [];

        foreach ($supportedLanguages as $lang) {
            $customMessages["name.$lang.required"] = "The name field for language $lang is required.";
            $customMessages["slug.$lang.required"] = "The slug field for language $lang is required.";
            $customMessages["slug.$lang.regex"] = "The slug field for language $lang must not contain spaces.";
        }


        return $customMessages;
    }
}
