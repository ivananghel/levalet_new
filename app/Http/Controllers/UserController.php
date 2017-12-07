<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DataTables;
use Auth;
use DB;
class UserController extends Controller
{
    /**
    * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
    public function index(){
		
        return view('users.index', [
            'active_menu' => 'users',
            ]);
        }
        
        /**
        * @return mixed
        */
        public function datatable() {
            $currentUser = Auth::user();
            $query = User::select('users.*')->where('users.id', '!=', $currentUser->id);
            
            return DataTables::of($query)
            ->addColumn('action', function(User $user){
                return view('users.chunk.action', [
                    'id'        => $user->id,
                    'resource'  => 'users',
                    ]);
                })
                ->editColumn('created_at', function(User $user){
                    return $user->created_at->format(config('levalet.formatUI'));
                })
                ->make(true);
            }
            
            /**
            * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
            */
            public function create(){
                return view('users.create');
            }
            
            /**
            * @param Request $request
            * @return \Illuminate\Http\Response
            */
            public function store(Request $request){
                $input = $request->all();
                $rules = config('validations.web.user.create');
                $this->validate($request, $rules);
                
                $user			= User::create($input);
                $user->password =  bcrypt($input['password']);
                $user->save();
                
                
                return response()->view('message.success', array('message' => trans('User has been successfully created') ));
            }
            
            public function edit($id) {
                $user = User::findOrFail($id);
                
                return view('users.update', [
                    'user'          => $user,
                    ]);
                }
                
                /**
                * @param Request $request
                * @param $id
                * @return \Illuminate\Http\Response
                */
                public function update(Request $request, $id) {
                    $input = $request->only('first_name', 'last_name', 'email');
                    
                    $rules = config('validations.web.user.update');
                    $rules['email'] .= ','.$id;

                    $this->validate($request, $rules);
                    $user = User::findOrFail($id);
                    if (!empty($request->password) ) {
                        $user->password = bcrypt($request->password);
                    }
                    
                    $user->fill($input)->save();
                    
                    return response()->view('message.success', ['message' => trans('User has been updated successfully')]);
                }
                
                public function profileEdit() {
                    $user = User::findOrFail(Auth::user()->id);
                    
                    return view('users.profileUpdate', [
                        'user'          => $user
                        ]);
                    }
                    
                    /**
                    * @param Request $request
                    * @return \Illuminate\Http\Response
                    */
                    public function profileUpdate(Request $request) {
                        $user = User::findOrFail(Auth::user()->id);
                        $input = $request->all();
                        
                        $rules = config('validations.web.profileEdit.admin');  
                        $rules['email'] .= ','.$user->id;
                        $this->validate($request, $rules);
                        
                        if ( !empty($input['password']) ) {
                            $user->password = Hash::make($input['password']);
                        }
                        
                        $user->fill($input)->save();
                        
                        return response()->view('message.success', ['message' => trans('Profile has been updated successfully')]);
                    }
                    
                    public function destroy($id) {
                        $currentUser = Auth::user();
                        
                        
                        if ( $currentUser->id == $id ) {
                            return response( trans('You can\'t delete you\'r self'), 406 );
                        }
                        
                        User::destroy($id);
                        
                        return trans('User has been successfully deleted');
                        
                        
            
                    }
                    
                }
                