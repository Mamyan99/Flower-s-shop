<?php

namespace App\Http\Requests\V1\Media;

use Illuminate\Foundation\Http\FormRequest;

class UploadMediaRequest extends FormRequest
{
    const FILE = 'file';

    public function rules(): array
    {
        return [
            self::FILE => [
                'required',
                'mimes:svg,png,jpeg',
            ]
        ];
    }

    public function getFilePath(): string
    {
        return $this->file(self::FILE)->getPathname();
    }

    public function getFileName(): string
    {
        return $this->file(self::FILE)->getFilename();
    }

    public function getUserId(): string
    {
        return $this->user()->id;
    }

    public function getOriginalFileName(): string
    {
        return pathinfo($this->file(self::FILE)->getClientOriginalName(), PATHINFO_FILENAME);
    }
}
