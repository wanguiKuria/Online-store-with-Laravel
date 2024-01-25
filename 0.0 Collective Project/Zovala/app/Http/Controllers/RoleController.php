<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Role;

class RoleController extends Controller
{
    //showing all the roles 
    public function all(){
        //call the role model
        $allRoles =Role ::paginate(7);


       return view('role.all',['roles'=>$allRoles]);
        //pass this data to the view file
    }

    //showing one role
    public function one(){}

    //showing the form to add a role
    public function add(){
        return view('role.add');
    }

    //process data
    public function save(Request $request){
        $validate=$request->validate([
            'role_name'=>'required|min:2|max:10|alpha'
        ]);
        $role_name=$request->get('role_name');
        $role=new Role();
        $role->name=$role_name;
        $role->save();

        return redirect('roles')->with('status',"$role_name role saved. ");
    }

    //show edit form
    public function edit($id){
        $role=Role::find('id');

        if($role)
        return view('role.edit',['role'=> $role]);
        else
        return redirect('roles');
    }

    //process new role data..update
    public function saveChanges($id,Request $request){
        $validate=$request->validate([
            'role_name'=>'required|min:2|max:10|alpha'
        ]);
        $role_name=$request->get('role_name');
       

        $role= Role::find($id); 
        if($role){
            $role->name=$role_name;
        $role->save();

        return redirect('roles')->with('status',"$role_name role updated. "); 
        }else{
        return redirect('roles');

        }

       

    }

    //destroy a role
    public function delete($id){
        $role=Role::find('id');
        if($role){

        $role->delete();
        return redirect('roles')->with('status',"$role deleted");
    }else{
        return redirect('roles')->with('status',"$role does not exist ");
    }
    }
}
