<?php

namespace App\Imports;

use App\Models\Equipment;
use App\Models\Zone;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EquipmentImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $zone=Zone::firstOrCreate(
            ['room_code' => explode("-", $row['code'])[1]],
            ['room' => 'Undefined', 'room_code' => explode("-", $row['code'])[1]]
        );

        return new Equipment([
            'zone_id'=>$zone->id,
            'name' => $row["equipement"],
            'code' => $row['code'],
            'serial_number' => $row['serial_number'],
            'model' => $row['model']
        ]);
    }
}
