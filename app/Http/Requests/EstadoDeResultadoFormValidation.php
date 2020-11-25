<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstadoDeResultadoFormValidation extends FormRequest
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
                    'ingreso' => 'required|numeric|min:0.00',
                    'costodeventa' => 'required|numeric|min:0.00',
                    'gastodeoperacion' => 'required|numeric|min:0.00',
                    'gastodeadministracion' => 'required|numeric|min:0.00',
                    'gastodeventaymercadeo' => 'required|numeric|min:0.00',
                    'gastofinancieros' => 'required|numeric|min:0.00',
                    'otrosingresos' => 'required|numeric|min:0.00',
                    'reservalegal' => 'required|numeric|min:0.00',
                    'impuestosobrelarenta' => 'required|numeric|min:0.00',
                ];
            }
            case 'PUT': //Método para actualizar
            case 'PATCH':
            {
                return [
                    'ingreso' => 'required|numeric|min:0.00',
                    'costodeventa' => 'required|numeric|min:0.00',
                    'gastodeoperacion' => 'required|numeric|min:0.00',
                    'gastodeadministracion' => 'required|numeric|min:0.00',
                    'gastodeventaymercadeo' => 'required|numeric|min:0.00',
                    'gastofinancieros' => 'required|numeric|min:0.00',
                    'otrosingresos' => 'required|numeric|min:0.00',
                    'reservalegal' => 'required|numeric|min:0.00',
                    'impuestosobrelarenta' => 'required|numeric|min:0.00',
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
            'ingreso' => 'ingreso',
            'costodeventa' => 'costo de venta',
            'gastodeoperacion' => 'gastos de operación',
            'gastodeadministracion' => 'gastos de administración',
            'gastodeventaymercadeo' => 'gastos de venta y mercadeo',
            'gastofinancieros' => 'gastos financieros',
            'otrosingresos' => 'otros ingresos',
            'reservalegal' => 'reserva legal',
            'impuestosobrelarenta' => 'impuesto sobre la renta',
        ];
    } //Fin metodo que pone un nombre cuando ocurre un error
}
