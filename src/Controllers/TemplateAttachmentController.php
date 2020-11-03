<?php


namespace DefStudio\Components\Controllers;


use DefStudio\Components\Excel\TemplateExcelExport;
use Illuminate\Http\Request;

class TemplateAttachmentController
{
    public function build_template(Request $request, string $filename)
    {
        $columns = $request->input('columns');
        $rows = $request->input('rows', []);

        if (empty($columns)) abort(404);

        return new TemplateExcelExport($filename, $columns, $rows);

    }
}
