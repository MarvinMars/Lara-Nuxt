<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function upload(Request $request)
    {
        $this->authorize('admin.upload');

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $filePaths = [
                date('Y'),
                date('m'),
                date('d'),
            ];

            $path = implode('/', $filePaths);
            $filename = Str::slug($filename) . '_' . str_random(8) . '.' . strtolower($file->getClientOriginalExtension());

            $path = $request->file('file')->storeAs($path, $filename, ['disk' => 'public']);
            $url = \Storage::disk('public')->url($path);
            $relativeUrl = null;

            if ($url) {
                $urlParts = parse_url($url);
                $relativeUrl = $urlParts['path'];
            }

            return response()->json(['path' => $path, 'url' => $relativeUrl ?? $url, 'absolute_url' => $url,], 200);
        }

        return response()->json(trans('brackets/media::media.file.not_provided'), 422);
    }
}
