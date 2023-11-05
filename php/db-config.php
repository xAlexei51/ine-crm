<?php 

class Conexion {
    private $servername ="localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "ine_database";

    public function __constructor(){
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    public function getServername(){
        return $this->servername;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getdbName(){
        return $this->dbname;
    }    
}

class Militantes {

    private $nombre;
    private $apellido_paterno;
    private $apellido_materno;
    private $correo_electronico;
    private $genero;
    private $fecha_nacimiento;
    private $telefono;
    private $calle;
    private $numero_exterior;
    private $numero_interior;
    private $colonia;
    private $entidad_federativa;
    private $municipio;
    private $distrito_electoral;
    private $ocupacion;
    private $sector;
    private $medio_transporte;
    private $nivel_de_estudios;
    private $salario_promedio;

    public function __constructor(){
        $this->nombre = $nombre;
        $this->apellido_paterno = $apellido_paterno;
        $this->apellido_materno = $apellido_materno;
        $this->correo_electronico = $correo_electronico;
        $this->genero = $genero;
        $this->fecha_nacimiento = $fecha_nacimiento;
        $this->telefono = $telefono;
        $this->calle = $calle;
        $this->numero_exterior = $numero_exterior;
        $this->numero_interior = $numero_interior;
        $this->colonia = $colonia;
        $this->entidad_federativa = $entidad_federativa;
        $this->municipio = $municipio;
        $this->distrito_electoral = $distrito_electoral;
        $this->ocupacion = $ocupacion;
        $this->sector = $sector;
        $this->medio_transporte = $medio_transporte;
        $this->nivel_de_estudios = $nivel_de_estudios;
        $this->salario_promedio = $salario_promedio;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellidoPaterno($apellido_paterno) {
        $this->apellido_paterno = $apellido_paterno;
    }

    public function setApellidoMaterno($apellido_materno) {
        $this->apellido_materno = $apellido_materno;
    }

    public function setCorreoElectronico($correo_electronico) {
        $this->correo_electronico = $correo_electronico;
    }

    public function setGenero($genero) {
        $this->genero = $genero;
    }

    public function setFechaNacimiento($fecha_nacimiento) {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setCalle($calle) {
        $this->calle = $calle;
    }

    public function setNumeroExterior($numero_exterior) {
        $this->numero_exterior = $numero_exterior;
    }

    public function setNumeroInterior($numero_interior) {
        $this->numero_interior = $numero_interior;
    }

    public function setColonia($colonia) {
        $this->colonia = $colonia;
    }

    public function setEntidadFederativa($entidad_federativa) {
        $this->entidad_federativa = $entidad_federativa;
    }

    public function setMunicipio($municipio) {
        $this->municipio = $municipio;
    }

    public function setDistritoElectoral($distrito_electoral) {
        $this->distrito_electoral = $distrito_electoral;
    }

    public function setOcupacion($ocupacion) {
        $this->ocupacion = $ocupacion;
    }

    public function setSector($sector) {
        $this->sector = $sector;
    }

    public function setMedioTransporte($medio_transporte) {
        $this->medio_transporte = $medio_transporte;
    }

    public function setNivelEstudios($nivel_de_estudios) {
        $this->nivel_de_estudios = $nivel_de_estudios;
    }

    public function setSalarioPromedio($salario_promedio) {
        $this->salario_promedio = $salario_promedio;
    }

    // Métodos get
    public function getNombre() {
        return $this->nombre;
    }

    public function getApellidoPaterno() {
        return $this->apellido_paterno;
    }

    public function getApellidoMaterno() {
        return $this->apellido_materno;
    }

    public function getCorreoElectronico() {
        return $this->correo_electronico;
    }

    public function getGenero() {
        return $this->genero;
    }

    public function getFechaNacimiento() {
        return $this->fecha_nacimiento;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getCalle() {
        return $this->calle;
    }

    public function getNumeroExterior() {
        return $this->numero_exterior;
    }

    public function getNumeroInterior() {
        return $this->numero_interior;
    }

    public function getColonia() {
        return $this->colonia;
    }

    public function getEntidadFederativa() {
        return $this->entidad_federativa;
    }

    public function getMunicipio() {
        return $this->municipio;
    }

    public function getDistritoElectoral() {
        return $this->distrito_electoral;
    }

    public function getOcupacion() {
        return $this->ocupacion;
    }

    public function getSector() {
        return $this->sector;
    }

    public function getMedioTransporte() {
        return $this->medio_transporte;
    }

    public function getNivelEstudios() {
        return $this->nivel_de_estudios;
    }

    public function getSalarioPromedio() {
        return $this->salario_promedio;
    }

    
}

class Users {
    private $nombre;
    private $email;
    private $telefono;
    private $username;
    private $password;
    

    public function __constructor(){
        $this->nombre = $nombre;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->username = $username;
        $this->password = $password;
    }

    public function setNombre ($nombre){
        $this->nombre = $nombre;        
    }

    public function setEmail ($email){
        $this->email = $email;
    }

    public function setTelefono($telefono){
        $this->telefono = $telefono;        
    }

    public function setUsername ($username){
        $this->username = $username;
    }

    public function setPassword ($password){
        $this->password = $password;
    }
    
}



?>