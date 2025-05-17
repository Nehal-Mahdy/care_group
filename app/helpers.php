<?php

use App\Exports\DynamicExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

// if (!function_exists('exportPDF')) {
//   function exportPDF($data)
//   {
//     $fileName = 'export_' . time() . '.pdf';
//     $filePath = storage_path('app/public/exports/' . $fileName);

//     // Ensure the directory exists
//     if (!file_exists(dirname($filePath))) {
//       mkdir(dirname($filePath), 0777, true);
//     }

//     // Generate and save the PDF
//     $pdf = Pdf::loadView('exports.pdf', ['data' => $data]);
//     $pdf->save($filePath);


//     return $fileName;
//   }
// }

// if (!function_exists('exportCSV')) {
//   function exportCSV($data)
//   {
//     $fileName = 'export_' . time() . '.csv';
//     $filePath = storage_path('app/public/exports/' . $fileName);

//     // Ensure the directory exists
//     if (!file_exists(dirname($filePath))) {
//       mkdir(dirname($filePath), 0777, true);
//     }
//     if (!is_array($data)) {
//       $data = $data->toArray();
//       if (isset($data['data'])) {
//         $data = $data['data'];
//       }
//     }
//     // Generate and save the CSV using Laravel Excel
//     Excel::store(new DynamicExport($data), 'public/exports/' . $fileName);

//     return $fileName;
//   }
// }

if (!function_exists('uploadImage')) {

  function uploadImage($model, $image)
  {
    //get current model name
    $modelName = get_class($model);
    if (!empty($image)) {
      $model->addMedia($image)->toMediaCollection($modelName);
    }
  }
}
if (!function_exists('updateImage')) {

  function updateImage($model, $image)
  {
    $modelName = get_class($model);
    if (!empty($image)) {
      //check if the image is already uploaded
      if ($model->hasMedia($modelName)) {
        $model->clearMediaCollection($modelName);
      }
      $model->addMedia($image)->toMediaCollection($modelName);
    }
  }
}
