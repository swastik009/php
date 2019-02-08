<?php
/**
 * Created by PhpStorm.
 * User: Swastik
 * Date: 2/6/2019
 * Time: 6:38 PM
 */
namespace AccessLayer\lib;
use AccessLayer\DAL;

class support extends DAL
{
    public function CleansedQueryForUpdate($ColName, $ColValues, $id)
    {

        $_Query = '';
        $Query = "UPDATE " . $this->tableName . " SET ";
        for ($i = 0; $i < sizeof($ColName); $i++) {

            $_Query .= $ColName[$i] . " = '" . $ColValues[$i] . "', ";

        }

        $Cleansed_Query = substr($_Query, 0, strlen($_Query) - 2);
        $Query = $Query . $Cleansed_Query . " WHERE id = " . $id;
        return $Query;
    }


    /**
     * @return string
     */
    public function CleanseCol()
    {
        $RawData = array_keys($this->data);
        $ActualData = implode(',', $RawData);
        return $ActualData;
    }

    /**
     * @return bool|string
     */
    public function CleanseValue()
    {

        $RawData = '';
        foreach ($this->data as $key => $value) {

            $RawData .= "'" . $value . "',";
        }

        $ActualData = substr($RawData, 0, strlen($RawData) - 1);
        return $ActualData;

    }



    public function Delete(){
        $query = "DELETE FROM " .$this->tableName. "WHERE id = ".$this->id;
        return (mysqli_query($query,$this->conn)) ? true : mysqli_error($this->conn);

    }



    /**
     * @return string
     */
    public function imgNameChange(){

        $fileOldName =$this->files[$this->fileHolder]['name'];
        $Temp = explode('.',$fileOldName);
        $RandName = round(microtime(true))."_".round(microtime(true)).rand(00000,99999);
        $newName = $Temp[0].$RandName. "." .end($Temp);
        return $newName;



    }

    /**
     * @param $imageName
     * @return bool
     */
    public function DeleteImg($imageName){
        return (file_exists($this->imgPath.$imageName)) ? unlink($this->imgPath.$imageName) : false;
    }



    /**
     * makes a new directory if directory doesn't exist
     */
    public function makeDir(){
        if(!file_exists($this->imgPath)){
            mkdir($this->imgPath,0777);
        }

    }


}