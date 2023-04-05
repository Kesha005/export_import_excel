<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TestImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        $data = [];
        
        foreach ($rows as $row) {
            if ($this->control_row($row)!=false) {

                $data[] = array(
                    'name' => $row['name'],
                    'email' => $row['email'],
                    'password' => $row['password'],
                );
            }
            continue;
        }
        DB::table('users')->insert($data);
    }


    protected function control_row($row)
    {
        if($row['name'] ==null and $row['email'] ==null and $row['password'] ==null){
            return false;
        }
        return true;
    }
}
