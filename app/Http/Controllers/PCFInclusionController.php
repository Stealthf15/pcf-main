<?php

namespace App\Http\Controllers;

use App\Models\PCFInclusion;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\PCFInclusion\StorePCFInclusionRequest;

class PCFInclusionController extends Controller
{
    public function store(StorePCFInclusionRequest $request)
    {
        $this->authorize('psr_request_store');
        
        PCFInclusion::create($request->validated());

        alert()->success('Success','The item has been added.');

        return back();
    }

    public function destroy($foc_id)
    {
        $pcfInclusion = PCFInclusion::findOrFail($foc_id);
        $pcfInclusion->delete();

        return response()->json(['success' => 'success'], 200);
    }

    public function pcfFOCList(Request $request)
    {
        if ($request->ajax()) {
            $pcfInclusion = PCFInclusion::with('source')
                    ->select('p_c_f_inclusions.*')
                    ->get();

            return Datatables::of($pcfInclusion)
                ->addColumn('action', function ($data) {
                    if (auth()->user()->can('psr_request_delete')) {
                        return
                        '<a href="javascript:void(0)" class="badge badge-danger pcfInclusionDelete" data-id="' . $data->id . '">
                            <i class="fas fa-trash-alt"></i> Delete item</a>
                        ';
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

}
