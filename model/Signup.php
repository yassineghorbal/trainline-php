<?php

require_once "Connection.php";


class Signup
{
	private $table="users";
	private $nom;
	private $prenom;
	private $telephone;
	private $email;
    private $password;
	function __construct($nom,$prenom,$telephone,$email,$password)
	{
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->telephone=$telephone;
		$this->email=$email;
		$this->password=$password;
	}


	public function save()
	{
		$ctn=new Connection();
		$ctn->insert($this->table,["nom","prenom","telephone","email","password"],[$this->nom,$this->prenom,$this->telephone,$this->email,$this->password]);
	}

	public static function select()
	{
		$ctn=new Connection();
		return $ctn->selectAll("users");
	}

	public static function delete($id)
	{
		$ctn=new Connection();
		return $ctn->delete("users",$id);
	}


	public static function edit($id)
	{
		$ctn=new Connection();
		return $ctn->selectOne("users",$id);
	}

	public function update($id)
	{
		$ctn=new Connection();
		$ctn->update($this->table,["nom","prenom","telephone","email","password"],[$this->nom,$this->prenom,$this->telephone,$this->email,$this->password],$id);
	}

}
