<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminSidebarController extends Controller
{

    public function index()
    {
        return view('admin.pages.index');
    }
    public function login()
    {
        return view('admin.pages.login');
    }
    public function orders()
    {
        return view('admin.pages.orders');
    }
    //objects
    public function objects_categories()
    {
        return view('admin.pages.objects.categories');
    }
    public function objects_types()
    {
        return view('admin.pages.objects.types');
    }
    public function objects_transport_types()
    {
        return view('admin.pages.objects.transport-types');
    }
    public function objects_transport()
    {
        return view('admin.pages.objects.transport');
    }
    //users
    public function users_list()
    {
        return view('admin.pages.users.list');
    }
    public function users_profiles()
    {
        return view('admin.pages.users.profiles');
    }
    public function users_roles()
    {
        return view('admin.pages.users.roles');
    }
    public function users_permissions()
    {
        return view('admin.pages.users.permissions');
    }

}
