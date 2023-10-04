<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class MyData
{
    /*
        This function to get all data from selected table
        by inputing $dbName with table name. It will get out
        all data from that table.
    */
    public static function getAllData($dbName)
    {
        return DB::table($dbName)->get();
    }

    /*
        This function to get all data from selected table
        with where clause for spesific data need
        by inputing $dbName with table name, and the $where are an array with
        data need for an example $where = array('field_id' => value); . It will get out
        all data from that table.
    */
    public static function getSelectedData($dbName, $where)
    {
        return DB::table($dbName)->where($where)->get();
    }

    /*
        This function to get how many data available on the requested table.
    */
    public static function countData($dbName)
    {
        return DB::table($dbName)->count();
    }


    /*
        This function to get data from custom querying need,
        for an example get data with selected field from join
        table, by inputing $query with custom sql query need.
    */
    public static function getCustomQuerying($query)
    {
        return DB::select($query);
    }

    /*
        This function for inserting data to database, by inputing
        $dbName with selected table and $data with data that match with
        field on table. For the $data the type must be array for an example.
        $data = array(
            'field_name_1' => value_1,
            'field_name_2' => value_2,
            'field_name_n' => value_n
        );

        note: the value data type must same with data type in table field, for
        an example the field 'A' on the table have integer data type and the value
        data type must integer to.
    */
    public static function insertData($dbName, $data)
    {
        DB::table($dbName)->insert($data);
    }

    /*
        This function for update specific data in database, by inputing
        $dbName with selected table and $data with data that match with
        field on table, and $where for giving a spesific information
        about data that wants to updated with a new value.
        For the $data the type must be a array, for an example.
        $where = array('field_id' => value);
        $data = array(
            'field_name_1' => value_1,
            'field_name_2' => value_2,
            'field_name_n' => value_n
        );

        note: the value data type must same with data type in table field, for
        an example the field 'A' on the table have integer data type and the value
        data type must integer to.
    */
    public static function updateData($dbName, $where, $data)
    {
        DB::table($dbName)->where($where)->update($data);
    }

    /*
        This function for delete spesific data in database, by inputing $dbName
        with selected table and $where for giving a spesific information about data
        that wants to delete, for $where type must be a array, for an example.
        $where = array('field_id' => value);
    */
    public static function deleteData($dbName, $where)
    {
        DB::table($dbName)->where($where)->delete();
    }


    // Get ID After Insert
    public static function insertDataGetId($dbName, $data)
    {
       return DB::table($dbName)->insertGetId($data);
    }

}
