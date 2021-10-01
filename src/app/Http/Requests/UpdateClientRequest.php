<?php 

namespace App\Http\Requests; 

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Cpf; 
use App\Rules\LicenseCar; 

class UpdateClientRequest extends FormRequest 
{ 
	public function authorize() 
	{ 
		return true; 
	} 

	public function messages() 
	{ 
		return [ 
			'name.required'=> 'O campo nome é obrigatório',
			'phone.required'=> 'O campo telefone é obrigatório',
			'cpf.required' => 'O campo CPF é obrigatório',
			'license.required' => 'O campo placa do carro é obrigatório',
		]; 
	} 

	public function rules() 
	{ 
		return [ 			
			'name' => 'required',
            'phone' => 'required',
            'cpf' => ['required', new Cpf],
            'license' => ['required', new LicenseCar],
		];
	} 
}