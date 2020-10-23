<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Lang;
use Exception;
use File;
use DB;
use Storage;
use Image;
use App\Models\User;
use App\Models\UserDetail;
use PragmaRX\Countries\Package\Countries;

class HomeController extends Controller
{

	private $profile_picture_display_path;
    private $profile_picture_upload_path;


    public function __construct(){
        $this->profile_picture_display_path = config('app.app_root').config('app.img_path.category_image');
        $this->profile_picture_upload_path = storage_path('images/category_images');
    }

    public function index(){
    	$countries = Countries::all();
     	return view('welcome',compact('countries'));
    }


    

    public function store(Request $request)
    {
    		
        try {
            $validator = Validator::make($request->all(), [
                'firstname' => 'required',
                'lastname' => 'required',
                'age' => 'required',
                'email' => 'required|email',
                ]);

            if ($validator->fails()) {
                foreach ($validator->messages()->getMessages() as $field_name => $messages) {
                    throw new Exception($messages[0], 1);
                }
            }
            $userscount = User::where([
               ['email', '=',  strtolower($request->email)],
            ])->count();

            if ($userscount > 1) {
                throw new Exception('User already registered with same email ID.', 1);
            }
            DB::beginTransaction();

            //Add user detail into user table
            
			$user = User::create(
                [
                    'firstname' => $request->firstname,
                    'lastname' => $request->lastname,
                    'email' => strtolower($request->email_id),
                ]
            );
           

    		$profile_image = $request->file('profile_image');

            $file_name = null;
            if ($profile_image) {
                 $image = Image::make($profile_image)->resize('400','400')->stream();
                 $file_name = uniqid().'.'.$profile_image->getClientOriginalExtension();
                 Storage::disk('public')->put($file_name, $image);

                
            }

             
            //User Detail Update
            $userDetail = UserDetail::create(
                [
                    'user_id' =>$user->id,
                    'age' => $request->age,
                    'address'=>$request->address,
                    'country'=>$request->country,
                    'profile_pic'=>$file_name != null ? $file_name:null,
                   ]
            );
			
			$profile =  User::with('user_details')
                ->where('users.id', $user->id)
                ->first();
            

           $otherData['image_path'] = $this->profile_picture_display_path;

           DB::commit();

            return redirect('/user_detail/'.Crypt::encrypt($user->id));
          
            
    } catch (\Exception $ex) {
         DB::rollback();

        return $this->sendError($ex->getMessage(),'on line : '.$ex->getLine().' on file : '.$ex->getFile());
            
        }
    }

     public function show($id)
    {
        try {
            
            $resultSet = User::with(['user_details'])
            ->where('users.id',Crypt::decrypt($id))
            ->first();
                
            
            if (is_null($resultSet)) {
                return $this->sendError(array(),Lang::get('messages.user_not_found'));
            }

            $otherData['image_path'] = $this->profile_picture_display_path;

            return view('user_details',compact('resultSet','otherData'));

        } catch (\Exception $ex) {
            return $this->sendError($ex->getMessage(),'on line : '.$ex->getLine().' on file : '.$ex->getFile());
        }
    }


}
