<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\FileDownloadPermission;
use Illuminate\Support\Facades\Storage; 
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use ZipArchive;
use Illuminate\Http\Request;


class FileController extends Controller
{
    public function updateDownloadPermission(Request $request, $id)
    {
      
        $user = Auth::user();
        if ($user->role !== 'Admin') {
            return redirect()->back()->with('error', 'Only directors can change permissions.');
        }
        $permission = FileDownloadPermission::where('user_id', $id)->first();
    
      
        if (!$permission) {
            $permission = FileDownloadPermission::create([
                'user_id' => $id,
                'can_download' => true, 
            ]);
        } else {
           
            $permission->can_download = !$permission->can_download;
            $permission->save();
        }
     
        return response()->json([
            'success' => true,
            'can_download' => $permission->can_download,
            'message' => 'Download permission updated successfully.'
        ]);
    }
    
    
    public function downloadAllFiles()
    {
        $files = Storage::allFiles('public/uploads');
    
        if (count($files) > 0) {
            $zipFileName = 'extension_all_files.zip';
            $zipFilePath = public_path($zipFileName);
    
            // Create a new ZipArchive instance
            $zip = new ZipArchive();
            if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
                // Add files to the ZIP with their relative paths to preserve folder structure
                foreach ($files as $file) {
                    $filePath = storage_path('app/' . $file);
                    $relativePath = str_replace('public/uploads/', '', $file); // Remove base directory from path
                    $zip->addFile($filePath, $relativePath);
                }
    
                // Close the ZIP file
                $zip->close();
    
                return response()->download($zipFilePath)->deleteFileAfterSend(true);
            } else {
                return redirect()->back()->with('warning', 'Failed to create zip file.');
            }
        }
    
        return redirect()->back()->with('warning', 'No files found to download.');
    }
}
