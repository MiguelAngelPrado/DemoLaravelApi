<?php
namespace App\Http\Repositories;

use App\Contactos;

class ContactoRepository{

    protected $modelContacto;

    public function __construct()
    {
        $this->modelContacto = new Contactos();
    }

    public function listContactos(){
        return $this->modelContacto->all();
    }

    public function saveContacto($data){
        $contacto = new $this->modelContacto;
        $contacto->S_Nombre = $data['S_Nombre'];
        $contacto->S_Puesto = $data['S_Puesto'];
        $contacto->S_Comentarios = $data['S_Comentarios'];
        $contacto->N_TelefonoFijo = $data['N_TelefonoFijo'];
        $contacto->N_TelefonoMovil = $data['N_TelefonoMovil'];
        $contacto->Email = $data['Email'];
        $contacto->tw_corporativos_id = $data['tw_corporativos_id'];
        $contacto->save();
        return $contacto->id;
    }

    public function updateContacto($data,$id){
        $contacto = $this->modelContacto::find($id);
        $contacto->S_Nombre = $data['S_Nombre'];
        $contacto->S_Puesto = $data['S_Puesto'];
        $contacto->S_Comentarios = $data['S_Comentarios'];
        $contacto->N_TelefonoFijo = $data['N_TelefonoFijo'];
        $contacto->N_TelefonoMovil = $data['N_TelefonoMovil'];
        $contacto->Email = $data['Email'];
        return $contacto->update();
    }

    public function verContacto($id){
        $contacto = $this->modelContacto::find($id);
        return $contacto;
    }

    public function eliminarContacto($id){
        $empresa = $this->modelContacto::find($id);
        if($empresa != null)
            return $empresa->delete();
        else 
            return null;
    }
}
