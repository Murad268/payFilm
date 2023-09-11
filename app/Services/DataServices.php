<?php

namespace App\Services;

class DataServices
{

    public function save($model, $data, $proccess = 'create', $relation = '', $sync = false)
    {
      
        if ($proccess == 'create') {
            if (isset($data['status'])) {
                $data['status'] = (bool) $data['status'];
            } else {
                $data['status'] = 0;
            }

            $create = $model->create($data);

            if ($sync) {
                if ($create != false) {
                    $create->$relation()->sync($sync);
                }
            }
        } else {
            // Make sure $data is an array before calling update
            if (!is_array($data)) {
                $data = ['status' => $data]; // Assuming you want to update the 'status' field
            }

            $update = $model->update($data);

            if ($sync) {
                if ($update != false) {
                    $model->$relation()->sync($sync);
                }
            }
        }
    }
}
