<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Repositories\Models\PropertyModel as Property;
use App\Repositories\Models\FacilitiesModel as Facility;
use App\Repositories\Models\StateModel as State;
use App\Repositories\Models\PropertyFacilitiesModel as Propfat;
use Illuminate\Support\Facades\Validator;
use Input;

class PropertyController extends Controller
{
	public function __construct(Property $property, Facility $facilities, State $state, Propfat $propfat)
    {
        $this->property = $property;
        $this->facilities = $facilities;
        $this->state = $state;
        $this->propfat = $propfat;
    }
   public function index()
   {	try{
	   		$properties = $this->property->all();
	   		return view('Property.index',array('properties'=>$properties));
   		}catch(Exception $e){
   			$message = "toastr.error('no se puede ver la lista de propiedades en este momento', 'Error');";
   			Return Redirect::to('/')->with('message',$message);
   		}
   }
   public function create()
   {
   		try{
		   	$states = $this->state->all();
		   	$facilities = $this->facilities->all();
		   	return view('Property.new',array('states'=>$states,'facilities'=>$facilities));
		}catch(Exceptopn $e){
			$message = "toastr.error('no se pueden crear Propiedades en este momento', 'Error');";
   			Return Redirect::back()->with('message',$message);
		}
   }
   public function creator(Request $request) 
   {
	   	$rules = array(
		   		"title" => "required|min:3",
		        "address" => "required",
		        "town" => "required",
		        "county"=>"required",
		        "country"=>"required",
		        "state_id"=>"required"
				);
		$validator = Validator::make(Input::All(), $rules);
		if ($validator->passes()){
		   	$info= array('title'=>$request->input('title'),
		   		'description'=>$request->input('description'),
		   		'address'=>$request->input('address'),
		   		'town'=>$request->input('town'),
		   		'county'=>$request->input('county'),
		   		'country'=>$request->input('country'),
		   		'state_id'=>$request->input('state_id'));
		   	try{
		   		$newprop=$this->property->create($info);
		   		$facilities = $this->facilities->all();
		   		foreach ($facilities as $fat) 
		   		{
		   			if (null !== $request->input('facilities_'.$fat->id)) 
		   			{
		   				$name = array('property_id'=>$newprop->id,'facility_id'=>$fat->id);
		   				$this->propfat->create($name);
		   			}
		   		}
		   		$message = "toastr.success('Propiedad Creada Con Exito', 'Éxito');";
		   		Return Redirect::to('/Property')->with('message',$message);
		   	}catch(Exception $e){
		   		$message = "toastr.error('no se pudo Guardar la propiedad', 'Error');";
		   		Return Redirect::to('/Property')->with('message',$message);
		   	}
	    }else{
	    	$message = "toastr.error('No se ha podido Registrar la propiedad recuerda llenar todos los campos Obligatorios','Error');";
		   	return Redirect::back()->withInput()->withErrors($validator)->with('message',$message);
	    }
   	
   }
   public function deletor($id) 
   {
   		try{
   			$this->property->deleted($id);
   			$message="toastr.success('Propiedad Eliminada con Exito','Éxito');";
   			return redirect::back()->with('message',$message);
   		}catch(Exception $e){
   			$message="toastr.error('No se pudo eliminar la propiedad','Error');";
   			return Redirect::back()->with('message',$message);
   		}
   }
   public function edit($id) 
   {
   		try{
	   		$oldproperty = $this->property->find($id);
	   		$states = $this->state->all();
		   	$facilities = $this->facilities->all();
	   		return view('Property.edit',array('props'=>$oldproperty,'states'=>$states,'facilities'=>$facilities));
	   	}catch(Exception $e){
	   		$message="toastr.error('No se encontro una propiedad con ese id','Error');";
   			return Redirect::back()->with('message',$message);
	   	}	
   }
   public function editor(Request $request, $id) 
   {
   		$rules = array(
		   		"title" => "required|min:3",
		        "address" => "required|min:10",
		        "town" => "required",
		        "county"=>"required",
		        "country"=>"required",
		        "state_id"=>"required"
				);
		$validator = Validator::make(Input::All(), $rules);
		if ($validator->passes()) 
		{
	   		$info= array('title'=>$request->input('title'),
	   		'description'=>$request->input('description'),
	   		'address'=>$request->input('address'),
	   		'town'=>$request->input('town'),
	   		'county'=>$request->input('county'),
	   		'country'=>$request->input('country'),
	   		'state_id'=>$request->input('state_id'));
	   		try{
	   		$this->property->update($info,$id);
	   		$facilities = $this->facilities->all();
	   		$prop = $this->property->find($id);
	   		foreach ($prop->fac as $fac) {
	   			$this->propfat->delete($fac->id);
	   		}
	   		foreach ($facilities as $fat) 
	   		{
	   			if (null !== $request->input('facilities_'.$fat->id)) 
	   			{
	   				$name = array('property_id'=>$id,'facility_id'=>$fat->id);
	   				$this->propfat->create($name);
	   			}
	   		}
	   		$message="toastr.success('Propiedad Editada Con Exito','Éxito');";
	   		return Redirect::to('Property')->with('message',$message);
		   	}catch(Exception $e){
		   		$message="toastr.error('No se pudo editar esta propiedad','Error');";
		   		return Redirect::to('Property')->with('message',$message);
		   	}
	  	}else {
	  		$message = "toastr.error('No se ha podido Editar la propiedad recuerda llenar todos los campos Obligatorios','Error');";
		   	return Redirect::back()->withInput()->withErrors($validator)->with('message',$message);
	  	}
   }
}