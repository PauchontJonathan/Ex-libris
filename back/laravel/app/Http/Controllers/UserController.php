<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;

class UserController extends Controller
{
    public function signup(Request $request) {

        $errors = [];
        $key = 0;

        $newName = $request->name;
        $newSurname = $request->surname;
        $newPassword = $request->password;
        $newTown = $request->town;
        $newAdress = $request->adress;
        $newEmail = $request->email;
        

        if(empty($newName) && empty($newSurname) && empty($newPassword) && empty($newTown) && empty($newAdress) && empty($newEmail)) {
            $object = new \stdClass();
            $object->key = $key++;
            $object->content = 'Les champs ne doivent pas être vides !';
            $errors[] = $object;    
        }

        if(empty($newName)) {
            $object = new \stdClass();
            $object->key = $key++;
            $object->content = 'Le nom ne peut pas être vide !';
            $errors[] = $object;    
        }

        if(empty($newSurname)) {
            $object = new \stdClass();
            $object->key = $key++;
            $object->content = 'Le nom de famille ne peut pas être vide !';
            $errors[] = $object;  
        }

        if(empty($newPassword)) {
            $object = new \stdClass();
            $object->key = $key++;
            $object->content = 'Le mot de passe ne peut pas être vide !';
            $errors[] = $object;  
        }

        if(empty($newTown)) {
            $object = new \stdClass();
            $object->key = $key++;
            $object->content = 'La ville ne peut pas être vide !';
            $errors[] = $object;           
        }

        if(empty($newAdress)) {
            $object = new \stdClass();
            $object->key = $key++;
            $object->content = 'L\'adresse ne peut pas être vide !';
            $errors[] = $object;        
        }
        
        if(empty($newEmail)) {
            $object = new \stdClass();
            $object->key = $key++;
            $object->content = 'L\'email ne peut pas être vide !';
            $errors[] = $object;   
        }


        if(preg_match("#[a-zA-Z0-9]#", $newPassword)) {
            
            if(filter_var($newEmail, FILTER_VALIDATE_EMAIL) === false) {
                $object = new \stdClass();
                $object->key = $key++;
                $object->content = 'L\'email n\'est pas valide !';
                $errors[] = $object;
    
            } else {
    
                $existEmail = User::where('email', '=', $newEmail)->first();  
    
                if($existEmail !== NULL) {
                    $object = new \StdClass();
                    $object->key = $key++;
                    $object->content = 'Veuillez choisir un autre email !';
                    $errors[] = $object;
                    
                    return response()->json($errors, 400);
    
                } else {
    
                    $newUser = new User;
    
                    $newUser->email = $newEmail;
                    $newUser->password = $newPassword;
                    $newUser->town = $newTown;
                    $newUser->adress = $newAdress;
                    $newUser->name = $newName;
                    $newUser->surname = $newSurname;
    
                    $newUser->save();

                    return response()->json("Le compte a bien été enregistré !");
                    
                    }
            }

        } else {

            $object = new \stdClass();
            $object->key = $key++;
            $object->content = 'Le mot-de-passe doit contenir au minimum 1 minuscule, 1 majuscule et 1 chiffre !';
            $errors[] = $object;
        }



        return response()->json($errors, 400);


    }
}
