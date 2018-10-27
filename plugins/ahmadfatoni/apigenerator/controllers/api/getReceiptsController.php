<?php namespace AhmadFatoni\ApiGenerator\Controllers\API;
header("Access-Control-Allow-Origin: *");

use DB;

use Cms\Classes\Controller;
use BackendMenu;

use Illuminate\Http\Request;
use AhmadFatoni\ApiGenerator\Helpers\Helpers;
use Illuminate\Support\Facades\Validator;
use AhmadFatoni\ApiGenerator\Models\ApiGenerator;
class getReceiptsController extends Controller
{
	protected $ApiGenerator;

    protected $helpers;

    public function __construct(ApiGenerator $ApiGenerator, Helpers $helpers)
    {
        parent::__construct();
        $this->ApiGenerator    = $ApiGenerator;
        $this->helpers          = $helpers;
    }

    public function index(Request $request){
		
		$id = $request->id;
		
       return Db::select('select * from sleepingsloth_posdata_receipts WHERE customer_id="'.$id.'" ');
    }

    public function show($id){

        $data = $this->ApiGenerator->where('id',$id)->first();

        if( count($data) > 0){

            return $this->helpers->apiArrayResponseBuilder(200, 'success', $data);

        }

        $this->helpers->apiArrayResponseBuilder(400, 'bad request', ['error' => 'invalid key']);

    }

    public function store(Request $request){

    	$arr = $request->all();

        while ( $data = current($arr)) {
            $this->ApiGenerator->{key($arr)} = $data;
            next($arr);
        }

        $validation = Validator::make($request->all(), $this->ApiGenerator->rules);
        
        if( $validation->passes() ){
            $this->ApiGenerator->save();
            return $this->helpers->apiArrayResponseBuilder(201, 'created', ['id' => $this->ApiGenerator->id]);
        }else{
            return $this->helpers->apiArrayResponseBuilder(400, 'fail', $validation->errors() );
        }

    }

    public function update($id, Request $request){

        $status = $this->ApiGenerator->where('id',$id)->update($data);
    
        if( $status ){
            
            return $this->helpers->apiArrayResponseBuilder(200, 'success', 'Data has been updated successfully.');

        }else{

            return $this->helpers->apiArrayResponseBuilder(400, 'bad request', 'Error, data failed to update.');

        }
    }

    public function delete($id){

        $this->ApiGenerator->where('id',$id)->delete();

        return $this->helpers->apiArrayResponseBuilder(200, 'success', 'Data has been deleted successfully.');
    }

    public function destroy($id){

        $this->ApiGenerator->where('id',$id)->delete();

        return $this->helpers->apiArrayResponseBuilder(200, 'success', 'Data has been deleted successfully.');
    }


    public static function getAfterFilters() {return [];}
    public static function getBeforeFilters() {return [];}
    public static function getMiddleware() {return [];}
    public function callAction($method, $parameters=false) {
        return call_user_func_array(array($this, $method), $parameters);
    }
    
}