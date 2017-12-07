<?php

namespace Modules\ColorGroup\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ColorGroup\Entities\ColorGroup;
use DataTables;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;

class ColorGroupController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
    * Display a listing of the resource.
    * @return Response
    */
    public function index()
    {
        
        return view('colorgroup::index', [
            'active_menu' => 'colorgroup',
            ]);
        }
        public function create()
        {
            return view('colorgroup::create');
        }
        
        public function table(){
            $query =  ColorGroup::select('group_color.*');
            return Datatables::of($query)
            ->addColumn('action', function(ColorGroup $color){
                return view('colorgroup::chunk.action', [
                    'id'        => $color->id,
                    'resource'  => 'parameters/colorgroup',
                    ]);
                })
                ->addColumn('status', function(ColorGroup $color){
                    return ($color->status == 1 ? trans('colorgroup::lang.active')  :  trans('colorgroup::lang.disable'));
                    //return ($color->status == 1 ? '<span class="padding-5 center-block label label-info">'.trans('colorgroup::lang.active').'</span>'  :  '<span class="padding-5 center-block label label-info">'.trans('colorgroup::lang.disable').'</span>');
                })
                ->make(true);
                
            }
            
            public function store(Request $request)
            {
                $input = $request->only('title');
                $rules = config('validations.web.colorgroup.create');
                $this->validate($request, $rules);
                $color			        = ColorGroup::create($input);
                $color->group_color     =  json_encode($request->group);
                $color->status          = ($request->status == "on" ? 1 : 0 );
                $color->save();
                return response()->view('message.success', array('message' => trans('colorgroup::lang.was_added') ));
            }

            public function edit($id)
            {
                $colorgroup = ColorGroup::findOrFail($id);
                return view('colorgroup::update', [
                            'color'          => $colorgroup,
                        ]);
            }


            public function update(Request $request, $id) {

                $rules = config('validations.web.colorgroup.create');
                $this->validate($request, $rules);
                $color = ColorGroup::findOrFail($id);
                $color->update([
                    'title' => $request->title,
                    'status' => ($request->status == "on" ? 1 : 0 ),
                    'group_color' => json_encode($request->group),
                    'updated_at' => time(),
                ]);

                return response()->view('message.success', array('message' => trans('colorgroup::lang.was_updated') ));
                
            }

            public function destroy($id)
            {
                    $color = ColorGroup::find($id);
                    $color->delete();
                   return trans('colorgroup::lang.was_deleted');
            
            }
        
            
        }
        