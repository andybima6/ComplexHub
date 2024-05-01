<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

if (!function_exists('getActivityDetailJson')) {
    function getActivityDetailJson($activity)
    {
        return json_encode([
            'id' => $activity->id,
            'name' => $activity->name,
            'description' => $activity->description,
            'status' => $activity->status,
            'document' => $activity->document,
            'rt_id' => $activity->rt_id,
        ]);
    }
}

if (!function_exists('uploadDocument')) {
    function uploadDocument($file, $prev = null)
    {
        if ($file) {
            // Remove prev document
            if ($prev) {
                $deletePath = public_path($prev);
                if (file_exists($deletePath)) {
                    File::delete($deletePath);
                }
            }

            $path = public_path('/contents/activities/');
            $filename = Str::random(32) . '.' . $file->getClientOriginalExtension();

            $file->move($path, $filename);
            $filename = '/contents/activities/' . $filename;
            return $filename;
        }
        return $prev;
    }
}
