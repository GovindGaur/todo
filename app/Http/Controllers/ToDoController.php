<?php

namespace App\Http\Controllers;
use App\ToDo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use GuzzleHttp\Client;
class ToDoController extends Controller
{
   public function index(){
    // $tododata = ToDo::all(); 
    $tododata = ToDo::orderBy('completed')->get(); 
    // $data['tododata'] =$tododata;
    return view('todo.index')->with(['tododata'=>$tododata]);
   }
   public function create(){
    return view("create");
    }
    
    public function edit(){
         $id = $_GET['id'];
        $todo = ToDo::find($id);
        // $updatetitle = $todo->title;
        return response()->json($todo);
        // return view('todo.edit')->with(['id'=>$id,'todo'=>$todo]);
    }
    public function upload(Request $req){
        // First Method
        // $todo = $req->title;
        // ToDo::create(['title'=>$todo]);
        
        //Second Method
        $req->validate(
            ['title'=>'required|max:255']);
        $todo = new ToDo;
       $todo->title = $req->title;
        $todo->save();
        return json_encode(array('statusCode'=>200));
        // return redirect()->back()->with('success',"TODO SuccessFully Created");
    }
    
    public function update(Request $req){   
        // $req->validate(
        //     ['title'=>'required|max:255']);     
        //     $updatetodo = ToDo::find($req->id);
           
        //     $updatetodo->update(['title'=>$req->title]);
            // dd($updatetodo);
            // return redirect('index')->with('update','ToDo Successfully Update'); 
            $data = ToDo::find($req->id );
            $data->title = $req->title;
            $data->save();
            return response()->json ($data);
     }
    public function completed($id){
            $todo = ToDo::find($id);
            if($todo->completed){
                $todo->update(['completed'=> false]);
                return redirect()->back();
            }
            else{
                $todo->update(['completed'=> true]);
                return redirect()->back();
            }
            // return $todo;
            // return view("create");
            }

    public function delete(){
           $id = $_GET['id']; 
           $todo = ToDo::find($id);
           $todo->delete();
           return redirect()->back();
        }

    public function profile(){
        
        $client = new \GuzzleHttp\Client();
        $response = json_decode($client->request('GET', 'https://restcountries.eu/rest/v2/all')->getBody());
    //    dd($response);
        return view('flag', ['clients' => $response]);
       
        // $body = $response->getBody();
        // echo $body;
        // echo $response;
        // $json = $response->getBody()->getContents();
        // echo $json;
        // echo $response->getStatusCode(); // 200
        // echo $response->getReasonPhrase(); // OK
       
        // return Http::get("https://api.postalpincode.in/pincode/110001");
        // return Http::get("https://jsonplaceholder.typicode.com/posts");
    }

    public function profile_lock(){
        $guzzle = new Client();
        try {
            $response = json_decode($guzzle->request('GET', 'https://restcountries.eu/rest/v2/all')->getBody());           
            return view('flag', ['clients' => $response]);
        } catch(ClientException $e){
             //Handling the exception
        }
    }
    // public function profile()
    // {
    //     $client = new \GuzzleHttp\Client();
    //     $request = $client->get('https://jsonplaceholder.typicode.com/posts');
    //     $response = $request->getBody();
    //     dd($response);

        
    // }
    }