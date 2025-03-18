<?php
class Dbconnection //gestisce la connessione ad un database usando PDO
{
    // variabile accessibile solo dentro la classe
    // statica per evitare di creare più connesioni al database
    private static PDO $db;

    //array di $config prende i parametri di configurazione, ritorna un oggetto PDO
    //statico per poter chiamare il metodo senza creare un'istanza(famosa new) della classe
    public static function GETdb(array $config):PDO{
        //controlla se la connessione esiste già
        if(!isset(self::$db)){
            try {
                self::$db = new PDO($config['dsn'], $config['username'], $config['password'], $config['options']);
            }catch (Exception $e){
                echo $e->getMessage();
            }
        }
        //restituisce la connessione PDO, serve per le query sql
        return self::$db;
    }
}