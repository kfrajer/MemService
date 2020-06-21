<?php

namespace App\Http\Controllers;

use App\MemObject;

use Illuminate\Http\Request;

class menuStorageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // This will also block access to unverified authenticated users.
        $this->middleware(['auth','verified']);
    } 
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobjs = MemObject::orderBy('created_at','desc')->paginate(8);
        return view('memManager.index',[
            'memobjs' => $mobjs,
        ]);

        /**
         * QUERY samples
         * --------------
         * Todo::where('completed',true)->take(8)->get(); // only take 8 todos from the database. <- just an example, we don't have completed column
         * Todo::where('title','LIKE',"{%}$search_keyword{%}")->get(); // with LIKE operator.
         * Todo::where('title','LIKE',"{%}$search_keyword{%}")->take(8)->get(); //retrieve only 8 results.
         * Todo::select(['title','body'])->findOrFail(id); // for specific columns, you can also chain where() with select().
         * Todo::where('title','value')->whereOr('body','value')->firstOrFail(); // with SQL OR operator
         * Todo::where('title','value')->whereAnd('body','value')->firstOrFail(); // with SQL AND operator.
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('memManager.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        return self::UpdateOrStore($request, 'create', -1);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mobj = MemObject::findOrFail($id);
        return view('memManager.show', [
            'memobj' => $mobj,
        ]);

        /**
         * SEARCHING for value in a specific column
         * --------------
         * $todo = Todo::where('title','this is title')->firstOrFail();
        */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mobj = MemObject::findOrFail($id);
        return view('memManager.edit',[
            'memobj' => $mobj,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {        
        return self::UpdateOrStore($request, 'update', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mobj = MemObject::findOrFail($id);
        $mobj->delete();
        
        return redirect()
            ->route('memManager.index')
            ->with('status','Item was deleted!');
    }


    /**
     * UpdateOrStore a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param String $op: Either create or update
     * @param numeric $id: For updating, -1 otherwise
     * @return \Illuminate\Http\Response
     */
    public function UpdateOrStore($request, $op, $id = NULL)
    {
        //validation rules and validation custom messages
        $rules = [
            'name' => "required|string|unique:mem_objects,name,{$id}|min:2|max:191",
            'description'  => 'required|string|min:5|max:1000',
            'ttl' => 'nullable|numeric|min:0|digits_between:0,8'
        ];
        $messages = [
            'title.unique' => 'Todo title should be unique', //syntax: field_name.rule
        ];
        $request->validate($rules,$messages);

        if ( $op == "create"){
            $item = new MemObject;          
            $strView='memManager.index';
            $strStatus='Created a new entry!';
            $arg='';
        }else{
            $item = MemObject::findOrFail($id);         
            $strView='memManager.show';
            $strStatus='The entry was updated!!';
            $arg=$id;
        }        
        
        $item->name = $request->name;
        $item->description = $request->description;
        $item->type = isset($request->type) ? $request->type : 'text/plain';
        $item->uri = isset($request->uri) ? $request->uri : '';
        $item->ttl = isset($request->ttl) ? $request->ttl : 0;
        $item->tags = isset($request->tags) ? $request->tags : '';
        $item->acl = isset($request->acl) ? $request->acl : 'allUsers';
        $item->useOnlyOnce = $request->has('useOnlyOnce') ? 1 : 0;
        $item->save(); 
        //Redirect to a specified route with flash message.
        return redirect()
            ->route($strView, $arg)
            ->with('status', $strStatus);

        /**
         * ACCESSING form values options
         * --------------
         * $request->input('field_name'); // access an input field
         * $request->has('field_name'); // check if field exists
         * $request->title; // dynamically access input fields
         * request('key') // you can use this global helper if needed inside a view
        */

        /**
         * REDIRECTION methods helpers
         * --------------
         * return redirect('/todos'); // to a specific url
         * return redirect(url('/todos')); // to a specific url with url helper
         * return redirect(url()->previous()); // to a previous url
         * return redirect()->back(); // redirect back (same as above) 
        */
    }
}
