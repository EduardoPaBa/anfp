<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClaseFormValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() //Inicio de las reglas
    {
        switch ($this->method()) {
            case 'POST': //Método de POST
            {
                return [
                    'nombre' => 'required',
                    'codigo' => 'required',
                ];
            }
            case 'PUT': //Método para actualizar
            case 'PATCH':
            {
                return [
                    'nombre' => 'required',
                    'codigo' => 'required',
                ];
            }
            default:
                break;
        }
    } //Fin de las reglas

    //Metodo que pone un nombre cuando ocurre un error
    public function attributes()
    {
        return [
            'nombre' => 'nombre de la clase',
            'codigo' => 'código de la clase',
        ];
    } //Fin metodo que pone un nombre cuando ocurre un error
}
